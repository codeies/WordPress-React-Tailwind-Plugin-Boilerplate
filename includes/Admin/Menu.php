<?php

namespace EventMaster\Admin;

/**
 * The Menu handler class
 */
class Menu
{

    /**
     * Initialize the class
     */
    function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts']);
    }

    /**
     * Enqueue scripts and styles.
     *
     * @return void
     */
    public function admin_enqueue_scripts()
    {
        wp_enqueue_style('eventmaster-style',  EVENTMASTER_URL . '/build/index.css');
        wp_enqueue_script('eventmaster-script', EVENTMASTER_URL . '/build/index.js', array('wp-element'), '1.0.0', true);
    }

    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu()
    {
        add_menu_page(__('Quiz Bit', 'eventmaster'), __('Quiz Bit', 'eventmaster'), 'manage_options', 'eventmaster', [$this, 'admin_page'], 'dashicons-admin-post', '2.1');
    }

    /**
     * Render the plugin page
     *
     * @return void
     */
    public function admin_page()
    {
        // echo EVENTMASTER_VERSION;
        // echo "<br>";
        // echo EVENTMASTER_FILE;
        // echo "<br>";
        // echo EVENTMASTER_PATH;
        // echo "<br>";
        // echo EVENTMASTER_URL;
        // echo "<br>";
        // echo EVENTMASTER_ASSETS;
        // echo "<br>";
        //echo plugin_dir_url(__FILE__) . '/build/index.js';

        require_once EVENTMASTER_PATH . '/template/app.php';
    }
}
