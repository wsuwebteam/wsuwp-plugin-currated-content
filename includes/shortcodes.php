<?php namespace WSUWP\Plugin\Currated_Content;

class Shortcodes {


	public static function init() {

		add_shortcode( 'curated_content', array( __CLASS__, 'render_curated_content' ) );

	}


	public static function render_curated_content( $attrs, $content ) {

		$content = $content ?? '';

		$args = array(
			'post_type'      => 'curated_news',
			'posts_per_page' => 1,
		);

		$the_query = new \WP_Query( $args );

		// The Loop.
		if ( $the_query->have_posts() ) {

			ob_start();

			while ( $the_query->have_posts() ) {

				$the_query->the_post();

				the_content();
				
			}

			$content .= ob_get_clean();

		} 
		// Restore original Post Data.
		wp_reset_postdata();

		return $content;

	}

}

Shortcodes::init();
