<?php
/**
 * This component is responsible for generating pagination links.
 * It provides a method to create pagination links for navigating through pages.
 *
 * Key functionalities include:
 * - Generating pagination links based on the current page and total pages
 * - Customizing the pagination format and base URL
 *
 * Usage:
 * - Call the paginate_links function with the necessary parameters to generate pagination links.
 *
 * Example:
 * $big = 999999999; // need an unlikely integer
 * echo paginate_links([
 *     'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
 *     'format' => '?paged=%#%',
 *     'current' => max(1, get_query_var('paged')),
 *     'total' => $query->max_num_pages
 * ]);
 */

 $query = $args['query'];

echo paginate_links([
    'base'    => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
    'format'  => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total'   => $query->max_num_pages
]);
?>