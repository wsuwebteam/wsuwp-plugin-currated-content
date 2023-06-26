<?php namespace WSUWP\Plugin\Currated_Content;

class Content_Defaults {

	public static function get_content_from_latest_post( $slug ) {

		$args = array(
			'numberposts' => 1,
			'post_type'   => $slug,
		);

		$recent_posts = wp_get_recent_posts( $args );

		$latest_post = array_shift( $recent_posts );

		$content = $latest_post['post_content'];

		return $content;

	}

	public static function set_default_content( $content, $post ) {

		switch ( $post->post_type ) {
			case 'curated_news':
				$content = self::get_content_from_latest_post( 'curated_news' );
				break;
		}

		return $content;

	}

	public static function set_default_title( $title, $post ) {

		$date_time = new \DateTime();
		$date      = $date_time->format( 'm-d-Y' );

		switch ( $post->post_type ) {
			case 'curated_news':
				$title = 'Curated Content — ' . $date;
				break;
		}

		return $title;

	}

	public static function init() {

		add_filter( 'default_title', __CLASS__ . '::set_default_title', 10, 2 );
		add_filter( 'default_content', __CLASS__ . '::set_default_content', 10, 2 );

	}

}

Content_Defaults::init();
