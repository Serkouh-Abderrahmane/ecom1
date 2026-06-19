<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Orders_model', 'History_model'));
    }

    public function index()
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Home';
        $head['description'] = '';
        $head['keywords'] = '';
        $data['newOrdersCount'] = $this->Orders_model->ordersCount(true);
        $data['lowQuantity'] = $this->Home_admin_model->countLowQuantityProducts();
        $data['lastSubscribed'] = $this->Home_admin_model->lastSubscribedEmailsCount();
        $data['activity'] = $this->History_model->getHistory(10, 0);
        $data['mostSold'] = $this->Home_admin_model->getMostSoldProducts();
        $data['byReferral'] = $this->Home_admin_model->getReferralOrders();
        $data['ordersByPaymentType'] = $this->Home_admin_model->getOrdersByPaymentType();
        $data['ordersByMonth'] = $this->Home_admin_model->getOrdersByMonth();
        $this->load->view('_parts/header', $head);
        $this->load->view('home/home', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to home page');
    }

    /*
     * Called from ajax
     */

    public function changePass()
    {
        $this->login_check();
        $result = $this->Home_admin_model->changePass($_POST['new_pass'], $this->username);
        if ($result == true) {
            echo 1;
        } else {
            echo 0;
        }
        $this->saveHistory('Password change for user: ' . $this->username);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }

    /**
     * Admin-protected database seeder
     * Run: /admin/db-setup
     * Seeds the database with demo products, categories, and settings.
     */
    public function db_setup()
    {
        $this->login_check();

        $output = [];
        $output[] = "<!DOCTYPE html><html><head><title>DB Setup</title>";
        $output[] = "<meta name='robots' content='noindex'>";
        $output[] = "<style>body{font-family:system-ui,sans-serif;padding:20px;max-width:700px;margin:0 auto;background:#f0fdf4;color:#166534}";
        $output[] = "h1{color:#0f172a}.ok{background:#f0fdf4;color:#166534;padding:8px;margin:4px 0;border-radius:6px}";
        $output[] = ".err{background:#fee2e2;color:#991b1b;padding:8px;margin:4px 0;border-radius:6px}";
        $output[] = ".info{background:#f8fafc;color:#334155;padding:8px;margin:4px 0;border-radius:6px}</style></head><body>";
        $output[] = "<h1>Admin Database Setup</h1>";
        $output[] = "<p class='info'>Logged in as: " . htmlspecialchars($this->username) . "</p>";

        try {
            // Connect directly to the same database
            $dbHost = getenv('DB_HOST') ?: 'localhost';
            $dbUser = getenv('DB_USERNAME') ?: 'root';
            $dbPass = getenv('DB_PASSWORD') ?: '';
            $dbName = getenv('DB_NAME') ?: 'shop';

            $mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            if ($mysqli->connect_error) {
                throw new Exception("MySQL connection failed: " . $mysqli->connect_error);
            }
            $output[] = "<div class='ok'>✅ Connected to MySQL: $dbName on $dbHost</div>";

            // 0. Drop all existing tables first
            $mysqli->query("SET FOREIGN_KEY_CHECKS = 0");
            $tables = $mysqli->query("SHOW TABLES");
            $dropped = 0;
            if ($tables) {
                while ($row = $tables->fetch_row()) {
                    $mysqli->query("DROP TABLE IF EXISTS `{$row[0]}`");
                    $dropped++;
                }
                $tables->free();
            }
            $mysqli->query("SET FOREIGN_KEY_CHECKS = 1");
            $output[] = "<div class='ok'>✅ Dropped $dropped existing tables</div>";

            // 1. Import database.sql (schema)
            $schemaFile = FCPATH . 'database.sql';
            if (!file_exists($schemaFile)) {
                throw new Exception("database.sql not found at: $schemaFile");
            }
            $sql = file_get_contents($schemaFile);
            if ($mysqli->multi_query($sql)) {
                do { if ($result = $mysqli->store_result()) $result->free(); } 
                while ($mysqli->more_results() && $mysqli->next_result());
                $output[] = "<div class='ok'>✅ Schema imported from database.sql</div>";
            } else {
                throw new Exception("Schema error: " . $mysqli->error);
            }

            // 2. Import seed_data.sql
            $seedFile = FCPATH . 'seed_data.sql';
            if (!file_exists($seedFile)) {
                throw new Exception("seed_data.sql not found at: $seedFile");
            }
            $sql = file_get_contents($seedFile);
            if ($mysqli->multi_query($sql)) {
                do { if ($result = $mysqli->store_result()) $result->free(); } 
                while ($mysqli->more_results() && $mysqli->next_result());
                $output[] = "<div class='ok'>✅ Seed data imported (12 products, 8 categories, brands, settings)</div>";
            } else {
                throw new Exception("Seed error: " . $mysqli->error);
            }

            // 3. Verify
            $count = $mysqli->query("SELECT COUNT(*) as c FROM products")->fetch_assoc()['c'];
            $catCount = $mysqli->query("SELECT COUNT(*) as c FROM shop_categories")->fetch_assoc()['c'];
            $output[] = "<div class='ok'>✅ Verification: $count products, $catCount categories in database</div>";

            $mysqli->close();
            $output[] = "<hr><div class='ok'><strong>✅ Database setup complete!</strong></div>";
            $output[] = "<p class='info'>Admin: <strong>admin</strong> / <strong>admin</strong></p>";
            $output[] = "<p class='info'><a href='" . base_url() . "'>Go to homepage →</a></p>";

            $this->saveHistory('Database seeded with demo data');
        } catch (Exception $e) {
            $output[] = "<div class='err'>❌ " . htmlspecialchars($e->getMessage()) . "</div>";
        }

        $output[] = "</body></html>";
        echo implode("\n", $output);
        exit;
    }

}
