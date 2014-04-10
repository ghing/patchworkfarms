<?php
/**
 * Custom functions
 */

/**
 * Create Location post type.
 */
function patchworkfarms_create_post_type() {
    register_post_type('pw_location',
        array(
            'description' => "A physical farm location",
            'labels' => array(
                'name' => _x('Locations', 'post type general name', 'patchworkfarms'),
                'singular_name' => _x('Location', 'post type singular name', 'patchworkfarms'),
            ),
            'show_in_nav_menus' => true,
            'public' => true,
            'supports' => array('title', 'editor', 'revisions', 'author', 'thumbnail', 'custom-fields', 'page-attributes'),
            'has_archive' => false,
            'exclude_from_search' => true,
            'menu_position' => 5,
        )
    );
}
add_action('init', 'patchworkfarms_create_post_type');

/**
 * Meta box for location.
 */
add_action('add_meta_boxes', 'patchworkfarms_location_fields_box');
function patchworkfarms_location_fields_box() {
    add_meta_box(
        'patchworkfarms_location_fields_box',
        __('Location Information', 'patchworkfarms'),
        'patchworkfarms_location_fields_box_content',
        'pw_location',
        'side',
        'high'
    );
}

function patchworkfarms_location_fields_box_content($post) {
    wp_nonce_field(plugin_basename(__FILE__), 'patchworkfarms_location_fields_box_content_nonce');
    echo('<div>');
    echo('<label for="map_image">Map Image</label><br>');
    echo('<input type="text" id="map_image" name="map_image" style="width: 100%;" value="' . esc_attr(get_post_meta($post->ID, "map_image", true))) . '"/>';
    echo('</div>');

    echo('<div>');
    echo('<label for="address">Address</label><br>');
    echo('<textarea id="address" name="address" rows="8" style="width: 100%;">' . esc_attr(get_post_meta($post->ID, "address", true)) . '</textarea>');
    echo('</div>');

    echo('<div>');
    echo('<label for="hours">Hours</label><br>');
    echo('<textarea id="hours" name="hours" rows="8" style="width: 100%;">' . esc_attr(get_post_meta($post->ID, "hours", true)) . '</textarea>');
    echo('</div>');
}

add_action('save_post', 'patchworkfarms_location_fields_box_save');
function patchworkfarms_location_fields_box_save($post_id) {
	if (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) { 
        return;
    }

	if (!wp_verify_nonce( $_POST['patchworkfarms_location_fields_box_content_nonce'], plugin_basename( __FILE__ ))) {
        return;
    }

	if ('page' == $_POST['post_type']) {
		if (!current_user_can( 'edit_page', $post_id )) {
            return;
        }
	} else {
		if (!current_user_can( 'edit_post', $post_id)) {
            return;
        }
	}

    $fields = array('map_image', 'address', 'hours');
    foreach ($fields as $field) {
        $data = sanitize_text_field($_POST[$field]);
        update_post_meta($post_id, $field, $data);
    }
}

function patchworkfarms_scripts() {
  wp_register_script('patchwork', get_template_directory_uri() . '/assets/js/jquery.patchwork.js', array('jquery'), null, true);
  wp_enqueue_script('patchwork');
}
add_action('wp_enqueue_scripts', 'patchworkfarms_scripts', 101);
