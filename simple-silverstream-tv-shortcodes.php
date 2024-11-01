<?php
/*
Plugin Name: Simple Silverstream TV Shortcodes
Plugin URI:  https://bitbucket.org/lighthouseuk/simple-silverstream-tv-shortcodes
Description: Adds shortcode for Silverstream TV videos
Version:     1.4
Author:      Mike Manger
License:     GNU General Public License v2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

function ssts_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'video_key'      => '',
		'player_key'     => '',
		'bespoke_player' => '',
		'width'          => '853px',
		'height'         => '480px',
	), $atts, 'silverstream' );

	if ( ! empty( $atts['bespoke_player'] ) ) {
		$output = ssts_get_bespoke_player( $atts['bespoke_player'], $atts );
	} else {
		$output = ssts_get_player( $atts['video_key'], $atts['player_key'], $atts );
	}
	return $output;
}
add_shortcode( 'silverstream', 'ssts_shortcode' );

/**
 * Returns HTML to render the requested Silverstream video
 *
 * @since 1.2
 *
 * @param string $video_key Unique key for video.
 * @param string $player_key Unique key for player interface.
 * @param array $atts An array of additional arguments.
 */
function ssts_get_player( $video_key, $player_key, $atts ) {
	if ( empty( $player_key ) ) {
		return '';
	}

	// Generate unique id if not set
	if ( empty( $video_key ) ) {
		$video_key = uniqid();
	}

	$script_height = (int) str_replace( 'px', '', $atts['height'] );

	$iframe_url = esc_url( 'https://video.silverstream.tv/player/' . esc_attr( $player_key ) );
	$script_url = esc_url( 'https://video.silverstream.tv/themes/default/js/responsive.js.php?uid=sstv_' . $video_key . '&height=' . $script_height . '&aspect_ratio=1.7771' );
	$html = '<iframe id="sstv_' . esc_attr( $video_key ) . '" class="sstv_embed" src="' . $iframe_url . '" style="border:none;overflow:hidden;width:' . esc_attr( $atts['width'] ) . ';max-width:100%;height:' . esc_attr( $atts['height'] ) . ';" frameborder="0" seamless allowfullscreen webkitAllowFullScreen></iframe>';
	$html .= '<script src="' . $script_url . '"></script>';
	return $html;
}

/**
 * Returns HTML to render a bespoke Silverstream video.
 *
 * @since 1.2
 *
 * @param string $bespoke_player_uri Path to the bespoke video on Silverstreams server.
 * @param array $atts An array of additional arguments.
 */
function ssts_get_bespoke_player( $bespoke_player_uri, $atts ) {
	if ( empty( $bespoke_player_uri ) ) {
		return '';
	}
	$iframe_url = esc_url( 'https://www.silverstream.tv/' . $bespoke_player_uri );

	return '<iframe src="' . $iframe_url . '" width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" scrolling="no" frameborder="0"></iframe>';
}
