<?php

function get_static_dir() {
	return get_template_directory_uri() . '/static';
}


/**
 * Prints HTML5 <time> tag 
 * Slightly modified understap function
 */
if ( ! function_exists( 'posted_on' ) ) :	
	function posted_on($post_id) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U', $post_id ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c', $post_id ) ),
			esc_html( get_the_date('', $post_id) ),
			esc_attr( get_the_modified_date( 'c', $post_id ) ),
			esc_html( get_the_modified_date('', $post_id) )
		);
		$posted_on = sprintf(
			esc_html_x( '%s', 'post date', 'understrap' ), $time_string 
		);

		echo '<span class="posted-on fw-medium fs-5 me-2">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;

// UNDERSTRAP PAGINATION
if ( ! function_exists( 'understrap_pagination' ) ) {
	/**
	 * Displays the navigation to next/previous set of posts.
	 *
	 * @param string|array $args {
	 *     (Optional) Array of arguments for generating paginated links for archives.
	 *
	 *     @type string $base               Base of the paginated url. Default empty.
	 *     @type string $format             Format for the pagination structure. Default empty.
	 *     @type int    $total              The total amount of pages. Default is the value WP_Query's
	 *                                      `max_num_pages` or 1.
	 *     @type int    $current            The current page number. Default is 'paged' query var or 1.
	 *     @type string $aria_current       The value for the aria-current attribute. Possible values are 'page',
	 *                                      'step', 'location', 'date', 'time', 'true', 'false'. Default is 'page'.
	 *     @type bool   $show_all           Whether to show all pages. Default false.
	 *     @type int    $end_size           How many numbers on either the start and the end list edges.
	 *                                      Default 1.
	 *     @type int    $mid_size           How many numbers to either side of the current pages. Default 2.
	 *     @type bool   $prev_next          Whether to include the previous and next links in the list. Default true.
	 *     @type bool   $prev_text          The previous page text. Default '&laquo;'.
	 *     @type bool   $next_text          The next page text. Default '&raquo;'.
	 *     @type string $type               Controls format of the returned value. Possible values are 'plain',
	 *                                      'array' and 'list'. Default is 'array'.
	 *     @type array  $add_args           An array of query args to add. Default false.
	 *     @type string $add_fragment       A string to append to each link. Default empty.
	 *     @type string $before_page_number A string to appear before the page number. Default empty.
	 *     @type string $after_page_number  A string to append after the page number. Default empty.
	 *     @type string $screen_reader_text Screen reader text for the nav element. Default 'Posts navigation'.
	 * }
	 * @param string       $class           (Optional) Classes to be added to the <ul> element. Default 'pagination'.
	 */
	function understrap_pagination( $args = array(), $class = 'pagination' ) {

		if ( ! isset( $args['total'] ) && $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}

		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 1,
				'prev_next'          => true,
				'prev_text'          => __( 'Nazaj', 'understrap' ),
				'next_text'          => __( 'Naprej', 'understrap' ),
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
				'screen_reader_text' => __( 'Posts navigation', 'understrap' ),
			)
		);

		$links = paginate_links( $args );
		if ( ! $links ) {
			return;
		}

		?>

		<nav aria-labelledby="posts-nav-label">

			<h2 id="posts-nav-label" class="sr-only">
				<?php echo esc_html( $args['screen_reader_text'] ); ?>
			</h2>

			<ul class="<?php echo esc_attr( $class ); ?> d-flex gap-1">

				<?php foreach ( $links as $key => $link ) :?>
					<li class="page-item <?php echo strpos( $link, 'current' ) ? 'active' : ''; ?>">
						<?php echo str_replace( 'page-numbers', 'page-number tdn', $link ); ?>
					</li>
				<?php endforeach; ?>

			</ul>

		</nav>

		<?php
	}
}

// Search fix
function __search_by_title_only( $search, $wp_query ) {
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);