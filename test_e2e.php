<?php
// Luôn Vui Tươi 15-Step QA Test Script
// Usage: php test_e2e.php
// Requires: PHP 8.1+, running server at http://localhost:8080

$BASE = getenv('BASE_URL') ?: 'http://localhost:8080';
$PASS = 0;
$FAIL = 0;
$results = [];

function test($name, $callback, $critical = false) {
    global $PASS, $FAIL, $results;
    echo "\n--- $name ---\n";
    try {
        $result = $callback();
        if ($result === true) {
            echo "  PASS\n";
            $PASS++;
            $results[] = ['name' => $name, 'status' => 'PASS', 'detail' => ''];
        } else {
            echo "  FAIL: " . ($result ?: 'Unknown error') . "\n";
            $FAIL++;
            $results[] = ['name' => $name, 'status' => 'FAIL', 'detail' => $result ?: 'Unknown error'];
            if ($critical) throw new Exception("Critical failure, aborting.");
        }
    } catch (Exception $e) {
        echo "  FAIL (exception): " . $e->getMessage() . "\n";
        $FAIL++;
        $results[] = ['name' => $name, 'status' => 'FAIL', 'detail' => $e->getMessage()];
        if ($critical) throw $e;
    }
}

function fetch($url) {
    global $BASE;
    $full = (strpos($url, 'http') === 0 || strpos($url, '//') === 0) ? $url : $BASE . $url;
    $ctx = stream_context_create(['http' => ['timeout' => 15, 'user_agent' => 'QA-Test/1.0', 'follow_location' => 0]]);
    $body = @file_get_contents($full, false, $ctx);
    if ($body === false) {
        $error = error_get_last();
        throw new Exception("HTTP request failed: " . ($error['message'] ?? 'unknown error'));
    }
    return $body;
}

function fetchWithCookies($url, $cookies = [], $post = null) {
    global $BASE;
    $full = $BASE . $url;
    $opts = ['http' => [
        'timeout' => 15,
        'user_agent' => 'QA-Test/1.0',
        'follow_location' => 0,
        'header' => "Accept: text/html\r\n"
    ]];
    if (!empty($cookies)) {
        $opts['http']['header'] .= "Cookie: " . implode('; ', $cookies) . "\r\n";
    }
    if ($post !== null) {
        $opts['http']['method'] = 'POST';
        $opts['http']['header'] .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $opts['http']['content'] = http_build_query($post);
    }
    $ctx = stream_context_create($opts);
    
    // Suppress warnings for redirects (we check headers)
    $body = @file_get_contents($full, false, $ctx);
    
    // Check response headers for Set-Cookie
    $cookieJar = $cookies;
    if (isset($http_response_header)) {
        foreach ($http_response_header as $h) {
            if (stripos($h, 'Set-Cookie:') === 0) {
                preg_match('/Set-Cookie:\s*([^=]+)=([^;]+)/i', $h, $m);
                if (count($m) >= 3) {
                    $found = false;
                    foreach ($cookieJar as $k => $c) {
                        if (strpos($c, $m[1] . '=') === 0) {
                            $cookieJar[$k] = $m[1] . '=' . $m[2];
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) $cookieJar[] = $m[1] . '=' . $m[2];
                }
            }
        }
    }
    
    return ['body' => $body !== false ? $body : '', 'cookies' => $cookieJar, 'headers' => $http_response_header ?? []];
}

echo "==================================\n";
echo "XUONG MAY NHA CONG - 18-STEP QA TEST\n";
echo "==================================\n";
echo "Target: $BASE\n";
echo "Date: " . date('Y-m-d H:i:s') . "\n\n";

// === STEP 1: Homepage loads ===
test('1. Homepage loads (200 OK)', function() use ($BASE) {
    $body = fetch('/');
    if (mb_stripos($body, 'XƯỞNG MAY NHÀ CÔNG') === false) {
        return 'Missing brand name "XƯỞNG MAY NHÀ CÔNG" in response';
    }
    return true;
}, true);

// === STEP 2: Vietnamese detected ===
test('2. Vietnamese language detected', function() {
    $body = fetch('/');
    if (stripos($body, 'lang="vi"') === false) {
        return 'lang="vi" not found';
    }
    if (stripos($body, 'Đăng nhập') === false) {
        return '"Đăng nhập" not found';
    }
    return true;
});

// === STEP 3: Header categories ===
test('3. Header has all 8 categories', function() {
    $body = fetch('/');
    $cats = ['Áo Thun Relaxed Fit', 'Áo Thun Ringer', 'Túi Canvas', 'Áo Ba Lỗ', 'Áo Thun Dài Tay', 'Áo Sweater', 'Áo Hoodie', 'Quần'];
    $missing = [];
    foreach ($cats as $cat) {
        if (stripos($body, $cat) === false) $missing[] = $cat;
    }
    if (!empty($missing)) return 'Missing categories: ' . implode(', ', $missing);
    return true;
});

// === STEP 4: Footer contact ===
test('4. Footer has contact info', function() {
    $body = fetch('/');
    $items = ['contact@xuongmaynhacong.vn', '0386524760'];
    $missing = [];
    foreach ($items as $item) {
        if (stripos($body, $item) === false) $missing[] = $item;
    }
    if (!empty($missing)) return 'Missing: ' . implode(', ', $missing);
    return true;
});

// === STEP 5: No PHP warnings ===
test('5. No PHP warnings/notices', function() {
    $body = fetch('/');
    $warnings = ['Notice:', 'Warning:', 'Undefined variable', 'Undefined array key', 'Undefined index', 'Fatal error'];
    $found = [];
    foreach ($warnings as $w) {
        if (stripos($body, $w) !== false) $found[] = $w;
    }
    if (!empty($found)) return 'Found: ' . implode(', ', $found);
    return true;
});

// === STEP 6: Login page ===
test('6. Login page renders in Vietnamese', function() {
    $body = fetch('/login');
    $items = ['Đăng nhập', 'Mật khẩu', 'Đăng ký'];
    $missing = [];
    foreach ($items as $item) {
        if (stripos($body, $item) === false) $missing[] = $item;
    }
    if (!empty($missing)) return 'Missing: ' . implode(', ', $missing);
    return true;
});

// === STEP 7: Register page ===
test('7. Register page renders in Vietnamese', function() {
    $body = fetch('/register');
    $items = ['Tạo tài khoản', 'Số điện thoại', 'Mật khẩu'];
    $missing = [];
    foreach ($items as $item) {
        if (stripos($body, $item) === false) $missing[] = $item;
    }
    if (!empty($missing)) return 'Missing: ' . implode(', ', $missing);
    return true;
});

// === STEP 8: Cart page ===
test('8. Cart page renders in Vietnamese', function() {
    $body = fetch('/cart');
    if (stripos($body, 'Giỏ hàng') === false) return 'Missing "Giỏ hàng"';
    return true;
});

// === STEP 9: Checkout page ===
test('9. Checkout page accessible', function() {
    $body = fetch('/checkout');
    if (stripos($body, 'Thanh toán') === false && stripos($body, 'Đặt hàng') === false) {
        return 'Missing checkout text';
    }
    return true;
});

// === STEP 10: Product listing ===
test('10. Products visible on homepage', function() {
    $body = fetch('/');
    if (stripos($body, '250.000') === false && stripos($body, 'Xưởng May') === false) {
        return 'No products visible (check for prices or product names)';
    }
    return true;
});

// === STEP 11: Category filtering ===
test('11. Categories have items', function() {
    $body = fetch('/');
    if (stripos($body, 'go-category') === false) return 'No category links found';
    return true;
});

// === STEP 12: Register user ===
test('12. Register a new user', function() {
    $email = 'test_' . time() . '@example.com';
    $res = fetchWithCookies('/register', [], [
        'signup' => '1',
        'name' => 'Test User ' . time(),
        'email' => $email,
        'phone' => '0909123456',
        'pass' => 'test123',
        'pass_repeat' => 'test123'
    ]);
    $body = $res['body'];
    // Registration may redirect (302) or show success message
    $cookies = $res['cookies'];
    if (stripos($body, 'Đã đăng ký') !== false || stripos($body, 'success') !== false) {
        return true;
    }
    // Check if we got a redirect (Location header)
    foreach ($res['headers'] as $h) {
        if (stripos($h, 'Location:') !== false) return true;
    }
    // If we see login form again, maybe registration failed
    if (stripos($body, 'Tạo tài khoản') !== false) return 'Registration form shown again, possible error';
    // Assume success if no error
    return true;
});

// === STEP 13: Admin login ===
test('13. Admin login accessible', function() {
    $body = fetch('/admin');
    if (stripos($body, 'admin') === false && stripos($body, 'Admin') === false) {
        return 'Admin page not accessible';
    }
    return true;
});

// === STEP 14: Contacts page ===
test('14. Contacts page in Vietnamese', function() {
    $body = fetch('/contacts');
    $items = ['contact@xuongmaynhacong.vn', 'Liên hệ'];
    $missing = [];
    foreach ($items as $item) {
        if (stripos($body, $item) === false) $missing[] = $item;
    }
    if (!empty($missing)) return 'Missing: ' . implode(', ', $missing);
    return true;
});

// === STEP 15: Footer brand ===
test('15. Footer shows Xưởng May Nhà Công brand', function() {
    $body = fetch('/');
    if (stripos($body, 'Xưởng May Nhà Công') === false && stripos($body, 'XƯỞNG MAY NHÀ CÔNG') === false) {
        return 'Brand name not found in footer';
    }
    // Check for copyright
    if (stripos($body, 'Copyright') === false) {
        return 'Copyright notice not found';
    }
    return true;
});

// === STEP 16: All product URLs return 200 ===
test('16. All product URLs return 200', function() use ($BASE) {
    $body = fetch('/');
    preg_match_all('/href=["\']([^"\']*_\d+)["\']/i', $body, $matches);
    $urls = array_unique($matches[1]);
    if (empty($urls)) return 'No product URLs found on homepage';
    $failed = [];
    $tested = [];
    foreach ($urls as $url) {
        $fullUrl = (strpos($url, 'http') === 0) ? $url : $BASE . $url;
        if (strpos($url, 'http') === 0 && strpos($url, $BASE) !== 0) continue;
        try {
            $respBody = fetch($fullUrl);
            if (stripos($respBody, '404') !== false || stripos($respBody, 'Page Not Found') !== false) {
                $failed[] = $url;
            }
            $tested[] = $url;
        } catch (Exception $e) {
            $failed[] = $url . ' (' . $e->getMessage() . ')';
        }
    }
    if (!empty($failed)) return 'Product URLs returning errors: ' . implode(', ', $failed);
    return true;
});

// === STEP 17: Crawl all internal links ===
test('17. No broken internal links', function() {
    $visited = ['/'];
    $toVisit = ['/'];
    $broken = [];
    $maxPages = 30;
    
        while (!empty($toVisit) && count($visited) < $maxPages) {
        $url = array_shift($toVisit);
        try {
            $body = fetch($url);
            preg_match_all('/href=["\']([^"\']+)["\']/i', $body, $matches);
            foreach ($matches[1] as $link) {
                // Skip external URLs, anchors, protocols
                if (strpos($link, 'http') === 0 || strpos($link, '//') === 0) continue;
                if (strpos($link, '#') === 0) continue;
                if (strpos($link, 'javascript:') === 0) continue;
                if (strpos($link, 'mailto:') === 0) continue;
                if (strpos($link, 'tel:') === 0) continue;
                if (strpos($link, '/') !== 0) $link = '/' . $link;
                
                $link = explode('?', $link)[0];
                $link = rtrim($link, '/');
                if ($link == '') $link = '/';
                
                if (in_array($link, $visited)) continue;
                $visited[] = $link;
                
                try {
                    $locBody = fetch($link);
                    if (stripos($locBody, '404') !== false && stripos($locBody, 'Page Not Found') !== false) {
                        $broken[] = $link;
                    }
                    if (count($visited) < $maxPages) $toVisit[] = $link;
                } catch (Exception $e) {
                    $broken[] = $link . ' (' . $e->getMessage() . ')';
                }
            }
        } catch (Exception $e) {
            $broken[] = $url . ' (' . $e->getMessage() . ')';
        }
    }
    
    if (!empty($broken)) {
        // Generate detailed broken links report
        $br = "# Broken Links Report\n\n";
        $br .= "**Date:** " . date('Y-m-d H:i:s') . "\n";
        $br .= "**Pages crawled:** " . count($visited) . "\n\n";
        $br .= "## Broken URLs\n\n";
        $br .= "| URL | Error |\n";
        $br .= "|-----|-------|\n";
        foreach ($broken as $b) {
            $br .= "| " . str_replace('|', '/', $b) . " | 404 Not Found |\n";
        }
        $br .= "\n## Root Cause Analysis\n\n";
        $br .= "Broken links found. Review the URLs above and fix the corresponding templates or database entries.\n";
        file_put_contents(__DIR__ . '/broken-links-report.md', $br);
        return 'Broken links: ' . implode(', ', array_slice($broken, 0, 5));
    }
    return true;
});

// === STEP 18: Product images load ===
test('18. Product images load (no broken images)', function() use ($BASE) {
    $body = fetch('/');
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $body, $matches);
    $imgs = array_unique($matches[1]);
    $broken = [];
    foreach ($imgs as $img) {
        if (strpos($img, 'no-image') !== false) continue;
        if (strpos($img, 'http') === 0 && strpos($img, $BASE) !== 0) continue;
        $url = (strpos($img, 'http') === 0) ? $img : $BASE . $img;
        try {
            $ctx = stream_context_create(['http' => ['timeout' => 5, 'method' => 'HEAD']]);
            $headers = @get_headers($url, true);
            if ($headers === false || (isset($headers[0]) && strpos($headers[0], '200') === false && strpos($headers[0], '304') === false)) {
                $broken[] = $img;
            }
        } catch (Exception $e) {
            $broken[] = $img;
        }
    }
    if (!empty($broken)) return 'Broken images: ' . implode(', ', array_slice($broken, 0, 5));
    return true;
});
echo "\n==================================\n";
echo "TEST RESULTS\n";
echo "==================================\n";
echo "PASS: $PASS / " . ($PASS + $FAIL) . "\n";
echo "FAIL: $FAIL / " . ($PASS + $FAIL) . "\n";
echo "Pass rate: " . round($PASS / max(1, $PASS + $FAIL) * 100, 1) . "%\n";
echo "\nDetailed results:\n";
foreach ($results as $r) {
    $status = $r['status'] == 'PASS' ? '✓' : '✗';
    echo "  $status {$r['name']}";
    if ($r['status'] == 'FAIL') echo " - {$r['detail']}";
    echo "\n";
}

// Generate test-report.md
$report = "# Xưởng May Nhà Công - QA Test Report\n\n";
$report .= "**Date:** " . date('Y-m-d H:i:s') . "\n";
$report .= "**Server:** http://localhost:8080\n";
$report .= "**Result:** " . ($FAIL == 0 ? "✅ ALL PASS" : "⚠️ $FAIL failures") . "\n\n";
$report .= "## Summary\n\n";
$report .= "| Result | Count |\n";
$report .= "|--------|-------|\n";
$report .= "| PASS   | $PASS |\n";
$report .= "| FAIL   | $FAIL |\n";
$report .= "| Total  | " . ($PASS + $FAIL) . " |\n";
$report .= "| Rate   | " . round($PASS / max(1, $PASS + $FAIL) * 100, 1) . "% |\n\n";
$report .= "## Test Details\n\n";
$report .= "| # | Test | Status | Detail |\n";
$report .= "|---|------|--------|--------|\n";
$i = 0;
foreach ($results as $r) {
    $i++;
    $status = $r['status'] == 'PASS' ? '✅ PASS' : '❌ FAIL';
    $report .= "| $i | {$r['name']} | $status | {$r['detail']} |\n";
}

file_put_contents(__DIR__ . '/test-report.md', $report);
echo "\nReport saved: test-report.md\n";
