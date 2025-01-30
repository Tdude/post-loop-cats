<?php
/*
Plugin Name: Custom Post Loop Filter
Description: A plugin to display posts of a specific category on a certain page using a shortcode. How is this not in Wordpress?
To display posts from multiple categories, use the shortcode. Simply add the following code to a page: `[post_loop_cats cat="slug1,slug2" posts_per_page="5"]`, where:
	* `slug1`, `slug2`, `slug3` are the slugs of the categories you want to loop through (comma separated).
	* 5 is the number of posts you want to display (optional).

Author: Tibor Berki
Version: 0.2
*/

// Function to register the shortcode
function post_loop_cats_shortcode( $atts ) {
  // Attributes
  $atts = shortcode_atts(
    array(
      'cat' => '', // category slugs (comma separated)
      'posts_per_page' => '5', // number of posts to display
    ),
    $atts
  );

  // Explode the category slugs into an array
  $cat_slugs = explode( ',', $atts['cat'] );

  // Trim the category slugs to remove any leading or trailing spaces
  $cat_slugs = array_map( 'trim', $cat_slugs );

  // Get the category IDs from the slugs
  $cat_ids = array();
  foreach ( $cat_slugs as $slug ) {
    $term = get_term_by( 'slug', $slug, 'category' );
    if ( $term ) {
      $cat_ids[] = $term->term_id;
    }
  }

  // Query arguments
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $atts['posts_per_page'],
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'id',
        'terms' => $cat_ids,
        'operator' => 'IN',
      ),
    ),
  );

  // Query the posts
  $query = new WP_Query( $args );

  // The loop
  $output = '<div class="missedslider d-grid column4">';
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();

      // Get the featured image
      $featured_image = get_the_post_thumbnail_url();

      // Get the category
      $categories = get_the_category();
      $category = $categories[0];
      $output .= '<style>.title a, btn-wrap a {text-decoration: none}:</style>';
      $output .= '<div class="bs-blog-post three md back-img bshre mb-0" style="background-image: url(\'' . $featured_image . '\');">';
      $output .= '<a class="link-div" href="' . get_permalink() . '"></a>';
      $output .= '<div class="bs-blog-category one">';
      $output .= '<a href="' . get_category_link( $category->term_id ) . '" style="" id="category_' . $category->term_id . '_color">';
      $output .= $category->name;
      $output .= '</a>';
      $output .= '</div>';
      $output .= '<div class="inner">';
      $output .= '<div class="title-wrap">';
      $output .= '<h4 class="title bsm"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
      $output .= '<div class="btn-wrap">';
      $output .= '<a href="' . get_permalink() . '"><i class="fas fa-arrow-right"></i></a>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '</div>';
    }
  } else {
    $output .= '<p>No posts found.</p>';
  }

  $output .= '</div>';

  // Reset the query
  wp_reset_postdata();

  return $output;
}

// Register the shortcode
add_shortcode( 'post_loop_cats', 'post_loop_cats_shortcode' );