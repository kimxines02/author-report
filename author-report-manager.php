<?php
/*
Plugin Name: Author Report Manager
Description: A WordPress plugin to manage author report data.
Version: 1.0
Author: Chris Y.
*/

// Hook to run plugin's initialization function
add_action('init', 'author_report_manager_init');

// Plugin initialization
function author_report_manager_init() {
    register_activation_hook(__FILE__, 'author_report_manager_create_table');
    add_shortcode('author_report_manager', 'author_report_manager_display');
}

// Function to create the custom database table
function author_report_manager_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cb_author_report';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        author_id INT,
        book_id INT,
        category VARCHAR(255),
        isbn VARCHAR(255),
        format_s VARCHAR(255),
        retail_price DECIMAL(10, 2),
        printing_cost DECIMAL(10, 2),
        royalty DECIMAL(10, 2),
        units_sold INT,
        date_published DATE,
        quartercb VARCHAR(255),
        user_payment_method VARCHAR(255),
        payment_info TEXT,
        country VARCHAR(255)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Add menu items to the admin menu
function author_report_manager_menu() {
  add_menu_page(
      'Author Report Manager', 
      'Author Report Manager', 
      'manage_options',       
      'author-report-manager', 
      'author_report_manager_page', 
      'dashicons-book',       
      20                      
  );
}

// add a function for embedding script and style
function author_report_manager_scripts() {
  wp_enqueue_script('jquery');
  
  wp_enqueue_script('author-report-manager-datatable-jquery', 'https://code.jquery.com/jquery-3.7.0.js', array('jquery'), '1.0', true);
  wp_enqueue_script('author-report-manager-datatable-scripts', 'https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js', array('jquery'), '1.0', true);
  wp_enqueue_script('author-report-manager-select-scripts', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), '1.0', true);
  
  wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array('jquery'), '1.16.0', true);
  wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery', 'popper'), '4.5.2', true);

  wp_enqueue_script('author-report-manager-scripts', plugin_dir_url(__FILE__) . 'assets/arm.js', array('jquery'), '1.0', true);

  wp_enqueue_style('author-report-manager-styles', plugin_dir_url(__FILE__) . 'assets/styles.css');
  wp_enqueue_style('author-report-manager-datatable-styles', 'https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css');
  wp_enqueue_style('author-report-manager-bootstrap-styles', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
  wp_enqueue_style('author-report-manager-select-styles', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');

  // use the datatable function with the table ID tableDisplay
  wp_add_inline_script('author-report-manager-scripts', 'jQuery(document).ready(function() {jQuery("#tableDisplay").DataTable();});');
  wp_add_inline_script('author-report-manager-scripts', 'jQuery(document).ready(function() {jQuery(".authors-list").select2();});');
  wp_add_inline_script('author-report-manager-scripts', 'jQuery(document).ready(function() {jQuery(".books-list").select2();});');
  wp_add_inline_script('author-report-manager-scripts', 'jQuery(document).ready(function() {jQuery(".category-list").select2();});');
  wp_add_inline_script('author-report-manager-scripts', 'jQuery(document).ready(function() {jQuery(".quarter-list").select2();});');
  wp_add_inline_script('author-report-manager-scripts', 'jQuery(document).ready(function() {jQuery(".format-list").select2();});');
}

// Function to display the CRUD interface
function author_report_manager_display() {
    ob_start(); 
    $authors = author_report_manager_read();
    $allBooks = get_all_products();
    $allUsers = get_all_users();
    include(plugin_dir_path(__FILE__) . 'dashboard.php');
    return ob_get_clean(); 
}

// Create a function to Implement code to add new records to the custom table
function author_report_manager_create() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'cb_author_report';

  $wpdb->insert(
    $table_name,
    array(
      'author_id' => $_POST['author_id'],
      'book_id' => $_POST['book_id'],
      'category' => $_POST['category'],
      'isbn' => $_POST['isbn'],
      'format_s' => $_POST['format_s'],
      'retail_price' => $_POST['retail_price'],
      'printing_cost' => $_POST['printing_cost'],
      'royalty' => $_POST['royalty'],
      'units_sold' => $_POST['units_sold'],
      'date_published' => $_POST['date_published'],
      'quartercb' => $_POST['quartercb'],
      'user_payment_method' => $_POST['user_payment_method'],
      'payment_info' => $_POST['payment_info'],
      'country' => $_POST['country']
    )
  );
}

// Create a function that Implement code to display all data
function author_report_manager_read() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'cb_author_report';

  $rows = $wpdb->get_results("SELECT * FROM $table_name");
  return $rows;
}

// Update function to Implement code to edit existing records in the custom table
function author_report_manager_update() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'cb_author_report';

  $wpdb->update(
    $table_name,
    array(
      'author_id' => $_POST['author_id'],
      'book_id' => $_POST['book_id'],
      'category' => $_POST['category'],
      'isbn' => $_POST['isbn'],
      'format_s' => $_POST['format_s'],
      'retail_price' => $_POST['retail_price'],
      'printing_cost' => $_POST['printing_cost'],
      'royalty' => $_POST['royalty'],
      'units_sold' => $_POST['units_sold'],
      'date_published' => $_POST['date_published'],
      'quartercb' => $_POST['quartercb'],
      'user_payment_method' => $_POST['user_payment_method'],
      'payment_info' => $_POST['payment_info'],
      'country' => $_POST['country']
    ),
    array('id' => $_POST['id'])
  );
}

// Delete: Implement code to delete records from the custom table
function author_report_manager_delete() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'cb_author_report';

  $wpdb->delete(
    $table_name,
    array('id' => $_POST['id'])
  );
}

// Display table in the dashboard
add_action('admin_menu', 'author_report_manager_menu');
function author_report_manager_page() {
  echo author_report_manager_display();
}

// get all woocommerce product function
function get_all_products() {
  $args = array(
    'post_type' => 'product',
    'posts_per_page' => -1
  );
  $products = get_posts($args);
  return $products;
}

// get all user type users function in wordpress
function get_all_users() {
  $args = array(
    'role__in' => array('author', 'administrator')
  );
  $users = get_users($args);
  return $users;
}
