<?php
/**
 * Plugin Name: Acast Embeds
 * Description: This plugin provides oEmbed support for Acast podcasts.
 * Version: 1.0.0
 * Author: Human Made Limited
 * Author URI: https://humanmade.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: acast-embeds
 *
 * @package acast-embeds
 */

// Enable oEmbed for Acast.
wp_oembed_add_provider(
	'/https?:\/\/(shows|player)\.acast\.com\/([a-z0-9]+)\/.*/',
	'https://shows.acast.com/api/oembed/',
	true
);

wp_embed_register_handler(
	'acast',
	'/https?:\/\/(?:shows|embed|player)\.acast\.com\/(?:\$\/)?([a-z0-9-]+)\/(?:episodes\/)?(.*)$/',
	function ( $args ) {
		return sprintf(
			'<iframe src="https://embed.acast.com/$/%s/%s?" frameBorder="0" width="100%%" height="110px" allow="autoplay"></iframe>',
			urlencode( $args[1] ),
			urlencode( $args[2] )
		);
	}
);
