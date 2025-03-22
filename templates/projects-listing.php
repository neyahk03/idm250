<?php
/**
 * Template Name: Project Listing
 */

get_header(); ?>


<div class="project-listing">
  <h1>Projects</h1>
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'projects',
    'posts_per_page' => 3,
    'paged' => $paged,
];
$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        get_template_part('components/project-card');
    endwhile; ?>

    <div class="pagination">
    <?php get_template_part('components/pagination', null, ['query' => $query]); ?>
      
    </div>

    <?php
    wp_reset_postdata();
else : ?>
  <p>
    <?php esc_html_e('No projects found.', 'idm250-2025'); ?>
  </p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>