<?php

/**
 * Plugin Name: Retina WEB
 * Plugin URI: https://evertonm.com.br
 * Description: Plugin para gerenciamento do site Retina WEB
 * Author: EvM.
 * Version: 1.0
 * Text Domain: Retina WEB
 * Plugin Retina WEB
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// FUNCTIONS ************************************************
include ABSPATH . '/wp-content/plugins/retinaweb/includes/functions.php';

// SETTINGS ************************************************
include ABSPATH . '/wp-content/plugins/retinaweb/includes/settings.php';

// TYPES ************************************************
include ABSPATH . '/wp-content/plugins/retinaweb/includes/types/depoimento.php';
include ABSPATH . '/wp-content/plugins/retinaweb/includes/types/vantagem.php';


// OBJECTS *************************************************
$depoimento = new Depoimento();

register_activation_hook(__FILE__, array( 
    $depoimento, 'activate'
));

register_deactivation_hook(__FILE__, array(
    $depoimento, 'deactivate'   
));

$vantagem = new Vantagem();

register_activation_hook(__FILE__, array( 
    $vantagem, 'activate'
));

register_deactivation_hook(__FILE__, array(
    $vantagem, 'deactivate'   
));

// ***************** Add DB
function add_db_access()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'access';
    $sql = "CREATE TABLE $table_name (`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,`ipadress` text NOT NULL,`url` text NOT NULL,`time` datetime DEFAULT '0000-00-00 00:00:00' NOT NULL)$charset_collate;";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    $table_name2 = $wpdb->prefix . 'login';
    $sql = "CREATE TABLE $table_name2 (`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT, `user` text NOT NULL,`ipadress` text NOT NULL,`url` text NOT NULL,`time` datetime DEFAULT '0000-00-00 00:00:00' NOT NULL)$charset_collate;";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name2'") != $table_name2) {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    
    remove_role('subscriber');
    remove_role('contributor');
    remove_role('author');

    flush_rewrite_rules();
    
}
register_activation_hook(__FILE__, 'add_db_access');