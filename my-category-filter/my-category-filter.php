<?php
/*
Plugin Name: My Category Filter
Description: Shortcode to filter posts by category
Version: 1.0
Author: Samiksha Walia
*/

function category_filter_shortcode() {
    $categories = get_categories();
    $output = '<form method="GET"><select name="cat">';
    foreach ($categories as $cat) {
        $output .= '<option value="' . $cat->term_id . '">' . $cat->name . '</option>';
    }
    $output .= '</select><input type="submit" value="Filter"></form>';

    if (isset($_GET['cat'])) {
        $query = new WP_Query(['cat' => $_GET['cat']]);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $output .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            }
        } else {
            $output .= '<p>No posts found.</p>';
        }
        wp_reset_postdata();
    }

    return $output;
}

add_shortcode('category_filter', 'category_filter_shortcode');
