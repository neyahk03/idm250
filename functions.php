<?php

function theme_styles_and_scripts() 

{
    wp_enqueue_style(
        'idm-normalize',
        'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css',
        [],
        '8.0.1'
    ); 

    wp_enqueue_style(
        'google-fonts',
        "https://fonts.googleapis.com/css2?family=Archivo+Black&family=Archivo:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap",
        [], 
        filemtime(get_template_directory() . '/asset/styles/main.css')
    );
    
    wp_enqueue_style(
        'idm250-main',
        get_template_directory_uri() . '/asset/styles/main.css',
        [],
        filemtime(get_template_directory() . '/asset/styles/main.css')
    );

    wp_enqueue_script(
        'idm250-yl3434-script',
        get_template_directory_uri() . '/asset/scripts/main.js',
        [],
        filemtime(get_template_directory() . '/asset/scripts/main.js'),
        true
    );

}

add_action('wp_enqueue_scripts', 'theme_styles_and_scripts');



function login_page_custom_logo()

{
    echo '<style>
        body.login { background-color: #f1f1f1; }
        .login h1 a { background-image: url(' . get_template_directory_uri() . '/asset/images/logo.png) !important; }
        </style>';
}

add_action('login_enqueue_scripts', 'login_page_custom_logo');



function theme_setup()
{
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus([
        'primary-menu' => 'Primary Menu',
    ]);
}

add_action('after_setup_theme', 'theme_setup');



function mytheme_customize_register($wp_customize)
{
    // Add a section for theme colors
    $wp_customize->add_section('theme_colors', [
        'title' => __('Theme Colors', 'mytheme'),
        'priority' => 30,
    ]);

    // Define color settings
    $colors = [
        'primary_color' => [
            'label' => __('Primary Color', 'mytheme'),
            'default' => '#FFCBD4'
        ],
        
        'secondary_color' => [
            'label' => __('Secondary Color', 'mytheme'),
            'default' => '#dedede'
        ]
    ];

    // Loop through colors to add settings and controls
    foreach ($colors as $color_id => $color) {
        $wp_customize->add_setting($color_id, [
            'default' => $color['default'],
            'sanitize_callback' => 'sanitize_hex_color'
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            $color_id,
            [
                'label' => $color['label'],
                'section' => 'theme_colors',
                'settings' => $color_id
            ]
        ));
    }

    // Add support for custom logo upload
    add_theme_support('custom-logo', [
        'height' => 100,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => ['site-title', 'site-description']
    ]);
}
add_action('customize_register', 'mytheme_customize_register');

function mytheme_custom_css() 
{ 
    ?>

    <style>
        :root {
            --primary-color: 
                <?php echo esc_attr(get_theme_mod('primary_color', '#FFCBD4')); 
            
            ?>;

            --secondary-color:
                <?php echo esc_attr(get_theme_mod('secondary_color', '#DEDEDE'));
    ?>
        ;
        
}
    </style>
    <?php
}

add_action ('wp_head', 'mytheme_custom_css');

function register_custom_post_types()
{
    $post_type_name = 'projects';

    $args = [
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new' => 'Add New Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'new_item' => 'New Project',
            'view_item' => 'View Project',
            'search_items' => 'Search Projects',
            'not_found' => 'No Projects found',
            'not_found_in_trash' => 'No Projects found in Trash',
        ],
        'public' => true,             // Makes it accessible on the front and back end
        'has_archive' => true,             // Enables an archive page
        'rewrite' => ['slug' => 'projects'], // URL slug
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'], // Enabled post features
        'menu_position' => 5,                // Position in WP admin menu
        'menu_icon' => 'dashicons-portfolio', // Optional: Custom icon for the post type
        'show_in_rest' => true,             // Enables Gutenberg support
        'taxonomies'  => ['project-categories'], // Uncomment if you have a custom taxonomy
    ];

    register_post_type($post_type_name, $args);
}

add_action('init', 'register_custom_post_types');


// custom taxonomy
function register_custom_project_category()
{
    $taxonomy_name = 'project-categories'; // Taxonomy slug (lowercase, no spaces)
    $post_types = ['projects']; // Post types associated with this taxonomy

    $args = [
        'labels' => [
            'name' => 'Project Categories',
            'singular_name' => 'Project Category',
            'search_items' => 'Search Project Categories',
            'all_items' => 'All Project Categories',
            'parent_item' => 'Parent Project Category',
            'parent_item_colon' => 'Parent Project Type:',
            'edit_item' => 'Edit Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Category',
            'new_item_name' => 'New Project Type Name',
            'menu_name' => 'Categories',
        ],
        'hierarchical' => true,  // True = categories, False = tags (non-hierarchical)
        'show_ui' => true,  // Show in admin UI
        'show_admin_column' => true,  // Show taxonomy in post type admin list
        'query_var' => true,  // Allow custom queries via URL
        'rewrite' => ['slug' => 'project-categories'], // Custom URL structure
        'show_in_rest' => true,  // Enables Gutenberg support
    ];

    register_taxonomy($taxonomy_name, $post_types, $args);
}

add_action('init', 'register_custom_project_category');
?>




