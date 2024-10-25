<?php

/**
 * Plugin Name:       Last Login Display
 * Description:       Shows the last login time of users in the admin dashboard.
 * Plugin URI:        https://robiul.net
 * Version:           1.0.0
 * Author:            Robiul Islam
 * Author URI:        https://robiul.net/about
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:       last-login-display
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// track the user's last login
add_action( 'wp_login', 'ri_lld_track_last_login', 10, 2 );

/**
 * user last login callback
 *
 * @param mixed $user_login
 * @param object $user
 *
 * @return void
 * @since 1.0.0
 */
function ri_lld_track_last_login( $user_login, $user ) {
    update_user_meta( $user->ID, 'last_login', current_time( 'mysql' ) );
}

// Add a new column in the users table as a last item
add_filter( 'manage_users_columns', 'ri_lld_add_last_login_column' );

/**
 * column added callback function
 *
 * @param array $columns
 *
 * @return array
 * @since 1.0.0
 */
function ri_lld_add_last_login_column( $columns ) {
    $columns['last_login'] = 'Last Login';
    return $columns;
}

// Display the last login time
add_action( 'manage_users_custom_column', 'ri_lld_show_last_login_data', 10, 3 );

/**
 * last login time display callback
 *
 * @param string $value
 * @param string $column_name
 * @param int $user_id
 *
 * @return string
 * @since 1.1.0
 */
function ri_lld_show_last_login_data( $value, $column_name, $user_id ) {
    // set format
    $date_format = get_option('date_format'). ' - ' . get_option('time_format');

    if ( $column_name == 'last_login' ) {
        $last_login = get_user_meta( $user_id, 'last_login', true );
        return $last_login ? date( $date_format, strtotime( $last_login ) ) : 'Never';
    }
    return $value;
}

// Make the "Last Login" column sortable
add_filter( 'manage_users_sortable_columns', 'ri_lld_make_last_login_sortable' );

/**
 * last login column sort able callback
 *
 * @param array $columns
 *
 * @return array
 * @since 1.0.0
 */
function ri_lld_make_last_login_sortable( $columns ) {
    $columns['last_login'] = 'last_login';
    return $columns;
}
