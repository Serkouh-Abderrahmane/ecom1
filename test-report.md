# Luôn Vui Tươi - QA Test Report

**Date:** 2026-06-19 09:53:40
**Server:** http://localhost:8080
**Result:** ⚠️ 5 failures

## Summary

| Result | Count |
|--------|-------|
| PASS   | 13 |
| FAIL   | 5 |
| Total  | 18 |
| Rate   | 72.2% |

## Test Details

| # | Test | Status | Detail |
|---|------|--------|--------|
| 1 | 1. Homepage loads (200 OK) | ✅ PASS |  |
| 2 | 2. Vietnamese language detected | ✅ PASS |  |
| 3 | 3. Header has all 8 categories | ✅ PASS |  |
| 4 | 4. Footer has contact info | ✅ PASS |  |
| 5 | 5. No PHP warnings/notices | ✅ PASS |  |
| 6 | 6. Login page renders in Vietnamese | ✅ PASS |  |
| 7 | 7. Register page renders in Vietnamese | ✅ PASS |  |
| 8 | 8. Cart page renders in Vietnamese | ❌ FAIL | HTTP request failed: file_get_contents(http://localhost:8080/cart): Failed to open stream: HTTP request failed! HTTP/1.1 404 Not Found
 |
| 9 | 9. Checkout page accessible | ✅ PASS |  |
| 10 | 10. Products visible on homepage | ✅ PASS |  |
| 11 | 11. Categories have items | ✅ PASS |  |
| 12 | 12. Register a new user | ❌ FAIL | Registration form shown again, possible error |
| 13 | 13. Admin login accessible | ✅ PASS |  |
| 14 | 14. Contacts page in Vietnamese | ✅ PASS |  |
| 15 | 15. Footer shows Luôn Vui Tươi brand | ✅ PASS |  |
| 16 | 16. All product URLs return 200 | ❌ FAIL | Product URLs returning errors: http://localhost:8080/Áo_Ba_Lỗ_Luôn_Vui_Tươi_Sọc_13 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Ba_Lỗ_Luôn_Vui_Tươi_Sọc_13): Failed to open stream: HTTP request failed!), http://localhost:8080/Quần_Ống_Suông_Nỉ_Bông_Luôn_Vui_Tươi_Basic_21 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Quần_Ống_Suông_Nỉ_Bông_Luôn_Vui_Tươi_Basic_21): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Thun_Dài_Tay_Luôn_Vui_Tươi_Basic_14 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Thun_Dài_Tay_Luôn_Vui_Tươi_Basic_14): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Thun_Relaxed_Fit_Luôn_Vui_Tươi_Premium_22 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Thun_Relaxed_Fit_Luôn_Vui_Tươi_Premium_22): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Thun_Relaxed_Fit_Luôn_Vui_Tươi_Basic_6 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Thun_Relaxed_Fit_Luôn_Vui_Tươi_Basic_6): Failed to open stream: HTTP request failed!), http://localhost:8080/Quần_Jogger_Nỉ_Bông_Luôn_Vui_Tươi_Premium_25 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Quần_Jogger_Nỉ_Bông_Luôn_Vui_Tươi_Premium_25): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Hoodie_Nỉ_Bông_Luôn_Vui_Tươi_Oversize_24 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Hoodie_Nỉ_Bông_Luôn_Vui_Tươi_Oversize_24): Failed to open stream: HTTP request failed!), http://localhost:8080/Túi_Canvas_Luôn_Vui_Tươi_Large_23 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Túi_Canvas_Luôn_Vui_Tươi_Large_23): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Thun_Dài_Tay_Luôn_Vui_Tươi_Sọc_15 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Thun_Dài_Tay_Luôn_Vui_Tươi_Sọc_15): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Thun_Relaxed_Fit_Luôn_Vui_Tươi_Sọc_7 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Thun_Relaxed_Fit_Luôn_Vui_Tươi_Sọc_7): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Sweater_Nỉ_Bông_Luôn_Vui_Tươi_Basic_16 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Sweater_Nỉ_Bông_Luôn_Vui_Tươi_Basic_16): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Thun_Ringer_Luôn_Vui_Tươi_Basic_8 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Thun_Ringer_Luôn_Vui_Tươi_Basic_8): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Sweater_Nỉ_Bông_Luôn_Vui_Tươi_Trơn_17 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Sweater_Nỉ_Bông_Luôn_Vui_Tươi_Trơn_17): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Thun_Ringer_Luôn_Vui_Tươi_Sọc_Ngang_9 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Thun_Ringer_Luôn_Vui_Tươi_Sọc_Ngang_9): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Hoodie_Nỉ_Bông_Luôn_Vui_Tươi_Basic_18 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Hoodie_Nỉ_Bông_Luôn_Vui_Tươi_Basic_18): Failed to open stream: HTTP request failed!), http://localhost:8080/Túi_Canvas_Luôn_Vui_Tươi_Basic_10 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Túi_Canvas_Luôn_Vui_Tươi_Basic_10): Failed to open stream: HTTP request failed!), http://localhost:8080/Túi_Canvas_Luôn_Vui_Tươi_Mini_11 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Túi_Canvas_Luôn_Vui_Tươi_Mini_11): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Hoodie_Nỉ_Bông_Luôn_Vui_Tươi_Trơn_19 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Hoodie_Nỉ_Bông_Luôn_Vui_Tươi_Trơn_19): Failed to open stream: HTTP request failed!), http://localhost:8080/Áo_Ba_Lỗ_Luôn_Vui_Tươi_Basic_12 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Áo_Ba_Lỗ_Luôn_Vui_Tươi_Basic_12): Failed to open stream: HTTP request failed!), http://localhost:8080/Quần_Jogger_Nỉ_Bông_Luôn_Vui_Tươi_Basic_20 (HTTP request failed: file_get_contents(http://localhost:8080http://localhost:8080/Quần_Jogger_Nỉ_Bông_Luôn_Vui_Tươi_Basic_20): Failed to open stream: HTTP request failed!) |
| 17 | 17. No broken internal links | ❌ FAIL | Broken links: /http://localhost:8080/assets/css/font-awesome.min.css (HTTP request failed: file_get_contents(http://localhost:8080/http://localhost:8080/assets/css/font-awesome.min.css): Failed to open stream: HTTP request failed! HTTP/1.1 404 Not Found
), /http://localhost:8080/templatecss/custom.css (HTTP request failed: file_get_contents(http://localhost:8080/http://localhost:8080/templatecss/custom.css): Failed to open stream: HTTP request failed! HTTP/1.1 404 Not Found
), /http://localhost:8080/cssloader/theme.css (HTTP request failed: file_get_contents(http://localhost:8080/http://localhost:8080/cssloader/theme.css): Failed to open stream: HTTP request failed! HTTP/1.1 404 Not Found
), /https://fonts.googleapis.com (HTTP request failed: file_get_contents(http://localhost:8080/https://fonts.googleapis.com): Failed to open stream: HTTP request failed! HTTP/1.1 404 Not Found
), /https://fonts.gstatic.com (HTTP request failed: file_get_contents(http://localhost:8080/https://fonts.gstatic.com): Failed to open stream: HTTP request failed! HTTP/1.1 404 Not Found
) |
| 18 | 18. Product images load (no broken images) | ❌ FAIL | Broken images: http://localhost:8080/attachments/lang_flags/vi.jpg |
