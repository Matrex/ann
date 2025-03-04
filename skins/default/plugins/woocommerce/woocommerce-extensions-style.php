<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'ann_woocommerce_extensions_get_css' ) ) {
	add_filter( 'ann_filter_get_css', 'ann_woocommerce_extensions_get_css', 10, 2 );
	function ann_woocommerce_extensions_get_css( $css, $args ) {

		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS

.woocommerce-accordion.ann_accordion .woocommerce-accordion-title {
	{$fonts['h5_font-family']}
	{$fonts['h5_font-weight']}
	{$fonts['h5_text-transform']}
	{$fonts['h5_letter-spacing']}
}
.single_product_custom_text_style {
	{$fonts['h5_font-family']}
}
.single_product_custom_text_style .custom_icons_3 {
	{$fonts['p_font-family']}
}

CSS;
		}

		return $css;
	}
}