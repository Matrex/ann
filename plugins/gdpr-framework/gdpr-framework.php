<?php
/* The GDPR Framework support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'ann_gdpr_framework_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'ann_gdpr_framework_theme_setup9', 9 );
	function ann_gdpr_framework_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'ann_filter_tgmpa_required_plugins', 'ann_gdpr_framework_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'ann_gdpr_framework_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('ann_filter_tgmpa_required_plugins',	'ann_gdpr_framework_tgmpa_required_plugins');
	function ann_gdpr_framework_tgmpa_required_plugins( $list = array() ) {
		if ( ann_storage_isset( 'required_plugins', 'gdpr-framework' ) && ann_storage_get_array( 'required_plugins', 'gdpr-framework', 'install' ) !== false ) {
			$list[] = array(
				'name'     => ann_storage_get_array( 'required_plugins', 'gdpr-framework', 'title' ),
				'slug'     => 'gdpr-framework',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if this plugin installed and activated
if ( ! function_exists( 'ann_exists_gdpr_framework' ) ) {
	function ann_exists_gdpr_framework() {
		return defined( 'GDPR_FRAMEWORK_VERSION' );
	}
}
