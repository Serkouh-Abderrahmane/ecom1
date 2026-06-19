<?php
/**
 * Database Setup & Seed Script
 * 
 * Run this script once to initialize the database with tables and demo data.
 * 
 * Usage:
 *   CLI: php setup_db.php
 *   Web: http://your-site.com/setup_db.php
 * 
 * WARNING: This will wipe existing data and re-import everything.
 */

// Detect environment
$isCLI = (php_sapi_name() === 'cli');

// Load environment variables from Railway (getenv works on Railway)
$dbHost = getenv('DB_HOST') ?: 'localhost';
$dbUser = getenv('DB_USERNAME') ?: 'root';
$dbPass = getenv('DB_PASSWORD') ?: '';
$dbName = getenv('DB_NAME') ?: 'shop';

$output = function($msg, $type = 'info') use ($isCLI) {
    if ($isCLI) {
        echo $msg . PHP_EOL;
    } else {
        echo '<div style="padding:8px;margin:4px 0;border-radius:6px;background:' . ($type === 'error' ? '#fee2e2' : '#f0fdf4') . ';color:' . ($type === 'error' ? '#991b1b' : '#166534') . ';font-family:monospace">' . htmlspecialchars($msg) . '</div>';
    }
};

if (!$isCLI) {
    echo '<!DOCTYPE html><html><head><title>Database Setup</title><meta name="robots" content="noindex"><style>body{font-family:system-ui,sans-serif;padding:20px;max-width:700px;margin:0 auto;background:#f8fafc}</style></head><body>';
    echo '<h1 style="color:#0f172a">Database Setup</h1>';
}

try {
    $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if ($mysqli->connect_error) {
        $output("❌ Connection failed: " . $mysqli->connect_error, 'error');
        exit(1);
    }
    $output("✅ Connected to MySQL database: $dbName on $dbHost");
    
    // Clear all existing data first (disable FK checks to avoid order issues)
    $mysqli->query("SET FOREIGN_KEY_CHECKS = 0");
    $tables = $mysqli->query("SHOW TABLES");
    $tableCount = 0;
    while ($row = $tables->fetch_row()) {
        $table = $row[0];
        $mysqli->query("TRUNCATE TABLE `$table`");
        $tableCount++;
    }
    $tables->free();
    $mysqli->query("SET FOREIGN_KEY_CHECKS = 1");
    $output("✅ Cleared $tableCount existing tables");
    
    // Import database.sql (schema + default data)
    $schemaFile = __DIR__ . '/database.sql';
    if (!file_exists($schemaFile)) {
        $output("❌ database.sql not found!", 'error');
        exit(1);
    }
    
    $sql = file_get_contents($schemaFile);
    if ($mysqli->multi_query($sql)) {
        do {
            if ($result = $mysqli->store_result()) $result->free();
        } while ($mysqli->more_results() && $mysqli->next_result());
        $output("✅ Database schema imported successfully");
    } else {
        $output("❌ Schema import error: " . $mysqli->error, 'error');
    }
    
    // Import seed_data.sql (demo data)
    $seedFile = __DIR__ . '/seed_data.sql';
    if (!file_exists($seedFile)) {
        $output("⚠️ seed_data.sql not found - no demo data imported", 'error');
    } else {
        $sql = file_get_contents($seedFile);
        if ($mysqli->multi_query($sql)) {
            do {
                if ($result = $mysqli->store_result()) $result->free();
            } while ($mysqli->more_results() && $mysqli->next_result());
            $output("✅ Demo data imported successfully (12 products, 8 categories, brands, SEO)");
        } else {
            $output("❌ Seed data import error: " . $mysqli->error, 'error');
        }
    }
    
    $output("✅ Database setup complete! You can now access your site.");
    $output("📝 Admin login: username = admin, password = admin");
    
    $mysqli->close();
    
} catch (Exception $e) {
    $output("❌ Error: " . $e->getMessage(), 'error');
}

if (!$isCLI) {
    echo '<hr style="margin-top:20px;border-color:#e2e8f0">';
    echo '<p style="color:#64748b">Delete this file after successful setup.</p>';
    echo '</body></html>';
}
