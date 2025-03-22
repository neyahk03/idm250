<?php
// Gets the categories for the current project
$terms = wp_get_post_terms(get_the_ID(), 'project-categories', ['fields' => 'ids']);
if ($terms) :
    $query = new WP_Query([
        'post_type' => 'projects',
        'posts_per_page' => 2,               // Display 2 related projects
        'post__not_in' => [get_the_ID()],  // Exclude the current project
        'orderby' => 'rand',                // Randomize the order
        // Query by project categories
        'tax_query' => [
            [
                'taxonomy' => 'project-categories',
                'field' => 'term_id',
                'terms' => $terms,
            ],
        ],
    ]);
    ?>

<?php if ($query->have_posts()) : ?>
<section class="related-projects">
  <h2>Related Projects</h2>
  <div class="grid grid-3 flex">
    <?php
     // Loop through the query results
     while ($query->have_posts()) : $query->the_post();
         // For each post, render this component
         get_template_part('components/project-card');
     endwhile;
    ?>
  </div>
</section>
<?php endif;
    wp_reset_postdata();
endif;
?>