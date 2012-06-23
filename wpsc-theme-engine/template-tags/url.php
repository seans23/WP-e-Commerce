<?php

function wpsc_catalog_url() {
	echo wpsc_get_catalog_url();
}

function _wpsc_get_page_url( $page, $slug = '' ) {
	$slugs = wpsc_get_page_slugs();

	if ( ! get_option( 'permalink_structure' ) ) {
		$uri = add_query_arg( 'wpsc_page', $page, home_url( '/' ) );
		if ( $slug )
			$uri = add_query_arg( 'wpsc_callback', $slug, $uri );
		return $uri;
	}

	$prefix = ( ! got_mod_rewrite() && ! iis7_supports_permalinks() ) ? 'index.php/' : '';

	$uri = $prefix . $slugs[$page];
	if ( $slug )
		$uri = trailingslashit( $uri ) . ltrim( $slug, '/' );
	return user_trailingslashit( home_url( $uri ) );
}

/**
 * Return the main catalog URL based on the settings in Settings->Store->Pemalinks
 *
 * @since 4.0
 * @uses  home_url()
 * @uses  wpsc_get_option() Gets WPEC 'catalog_slug' option.
 * @return [type]
 */
function wpsc_get_catalog_url() {
	$uri = get_post_type_archive_link( 'wpsc-product' );
	return $uri;
}

function wpsc_cart_url( $slug = '' ) {
	echo wpsc_get_cart_url( $slug );
}

function wpsc_get_cart_url( $slug = '' ) {
	return _wpsc_get_page_url( 'cart', $slug );
}

function wpsc_checkout_url( $slug = '' ) {
	echo wpsc_get_checkout_url( $slug );
}

function wpsc_get_checkout_url( $slug = '' ) {
	return _wpsc_get_page_url( 'checkout', $slug );
}

function wpsc_login_url( $slug = '' ) {
	echo wpsc_get_login_url( $slug );
}

function wpsc_get_login_url( $slug = '' ) {
	return _wpsc_get_page_url( 'login', $slug );
}

function wpsc_register_url( $slug = '' ) {
	echo wpsc_get_register_url( $slug );
}

function wpsc_get_register_url( $slug = '' ) {
	return _wpsc_get_page_url( 'register', $slug );
}

function wpsc_password_reminder_url( $slug = '' ) {
	echo wpsc_get_password_reminder_url( $slug );
}

function wpsc_get_password_reminder_url( $slug = '' ) {
	return _wpsc_get_page_url( 'password-reminder', $slug );
}

function wpsc_password_reset_url( $username, $key) {
	echo wpsc_get_password_reset_url( $username, $key );
}

function wpsc_get_password_reset_url( $username, $key ) {
	return wpsc_get_password_reminder_url( "reset/{$username}/{$key}" );
}

function wpsc_page_get_current_slug() {
	global $wpsc_page_instance;
	if ( ! isset( $wpsc_page_instance ) )
		return '';

	return $wpsc_page_instance->get_slug();
}

function wpsc_customer_account_url( $slug = '' ) {
	echo wpsc_get_customer_account_url( $slug );
}

function wpsc_get_customer_account_url( $slug = '' ) {
	$uri = wpsc_get_option( 'customer_account_page_slug' );
	if ( $slug )
		$uri = trailingslashit( $uri ) . ltrim( $slug, '/' );
	return user_trailingslashit( home_url( $uri ) );
}
