<?php

/**
 * Add support for querying posts by attribute with GET params
 */
add_action( 'pre_get_posts', 'pre_get_posts_filter_by_attributes' );
function pre_get_posts_filter_by_attributes( $query ) {
	// Only on frontend product query
	if ( ! is_admin() && $query->is_main_query() ) {

		if ( isset( $_GET['filter-category'] ) || isset( $_GET['filter-related-product'] ) || isset( $_GET['filter-related-technology'] ) ) {
			// Get original tax query
			$tax_query = $query->get( 'tax_query' );

			$tax_query = is_array( $tax_query ) ? $tax_query : array();

			if ( isset( $_GET['filter-category'] ) ) {
				$tax_query[] = array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $_GET['filter-category'],
				);
			}

			if ( isset( $_GET['filter-related-product'] ) ) {
				$tax_query[] = array(
					'taxonomy' => 'related-product',
					'field'    => 'slug',
					'terms'    => $_GET['filter-related-product'],
				);
			}

			if ( isset( $_GET['filter-related-technology'] ) ) {
				$tax_query[] = array(
					'taxonomy' => 'related-technology',
					'field'    => 'slug',
					'terms'    => $_GET['filter-related-technology'],
				);
			}

			$query->set( 'tax_query', $tax_query );

		}
	}
}
