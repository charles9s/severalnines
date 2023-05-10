<?php

class severalnines_CLI {

	public function match_user() {

		$posts = get_posts(
			array(
				'post_type'   => 'post',
				'numberposts' => -1,
				'fields'      => 'ids',
			)
		);
		foreach ( $posts as $post ) {
			WP_CLI::line( '** Processing id #' . $post . '**' );
			WP_CLI::line( 'Saving data' );

			$user_meta = get_field( 'drupal_author_id', $post );

			$users = get_users(
				array(
					'meta_key'   => 'drupal_id',
					'meta_value' => $user_meta,
				)
			);

			foreach ( $users as $user ) {

				$my_post = array(
					'ID'          => $post,
					'post_author' => $user->id,
				);
			}

			wp_update_post( $my_post );

		}
		WP_CLI::success( 'I\'m done. Processed ' . count( $posts ) );
	}

	public function set_product_tax() {

		$posts = get_posts(
			array(
				'post_type'   => 'post',
				'numberposts' => -1,
				'fields'      => 'ids',
			)
		);
		foreach ( $posts as $post ) {
			WP_CLI::line( '** Processing id #' . $post . '**' );
			WP_CLI::line( 'Saving data' );

			if ( has_term( 'ccx', 'related-technology', $post ) || has_term( 'ccx', 'category', $post ) || has_term( 'ccx', 'post_tag', $post ) ) {
				// Assign a term to our post
				wp_set_object_terms( $post, 'ccx', 'related-product' );
			}
			if ( has_term( 'clustercontrol', 'related-technology', $post ) || has_term( 'clustercontrol', 'category', $post ) || has_term( 'clustercontrol', 'post_tag', $post ) ) {
				// Assign a term to our post
				wp_set_object_terms( $post, 'clustercontrol', 'related-product' );
			}
		}
		WP_CLI::success( 'I\'m done. Processed ' . count( $posts ) );
	}

}

if ( class_exists( 'WP_CLI' ) ) {
	WP_CLI::add_command( 'seve9', 'severalnines_CLI' ); // phpcs:ignore
}
