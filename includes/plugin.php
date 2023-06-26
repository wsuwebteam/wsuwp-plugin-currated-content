<?php namespace WSUWP\Plugin\Currated_Content;

class Plugin {


	public static function get( $property ) {

		switch ( $property ) {

			case 'version':
				return '0.0.1';

			case 'dir':
				return plugin_dir_path( dirname( __FILE__ ) );

			case 'url':
				return plugin_dir_url( dirname( __FILE__ ) );

			default:
				return '';

		}

	}

	public static function init() {

		add_action( 'after_setup_theme', array( __CLASS__, 'load_plugin' ) );

	}


	public static function load_plugin() {

		require_once __DIR__ . '/curated-news.php';
        require_once __DIR__ . '/content-defaults.php';
        require_once __DIR__ . '/shortcodes.php';

	}

}

Plugin::init();
