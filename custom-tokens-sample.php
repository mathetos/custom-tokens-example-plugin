<?php
/**
 * Plugin Name: Custom Tokens Sample
 * Description: Registers a sample design token to validate the Design Token Extensibility API in Global Styles.
 * Version:     0.1.0
 * Author:      WPPT
 * License:     GPL-2.0-or-later
 * Requires at least: 6.7
 * Requires PHP: 7.4
 *
 * @package custom-tokens-sample
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Registers sample design tokens once the API is available.
 */
function custom_tokens_sample_register() {
	if ( ! function_exists( 'register_design_token' ) ) {
		return;
	}

	register_design_token(
		'custom-tokens-sample/card-radius',
		array(
			'label'   => __( 'Card Border Radius', 'custom-tokens-sample' ),
			'type'    => 'border-radius',
			'default' => '8px',
			'scope'   => 'global',
		)
	);

	register_design_token(
		'custom-tokens-sample/accent-color',
		array(
			'label'   => __( 'Accent Color', 'custom-tokens-sample' ),
			'type'    => 'color',
			'default' => '#0073aa',
			'scope'   => 'global',
		)
	);

	register_design_token(
		'custom-tokens-sample/section-spacing',
		array(
			'label'   => __( 'Section Spacing', 'custom-tokens-sample' ),
			'type'    => 'spacing',
			'default' => '2rem',
			'scope'   => 'global',
		)
	);
}
add_action( 'after_setup_theme', 'custom_tokens_sample_register' );
add_action( 'rest_api_init', 'custom_tokens_sample_register', 1 );
