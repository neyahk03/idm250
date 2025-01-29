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

?>

