<?php get_header(); ?>
<div class="wrapper">

    <h1><?php single_term_title(); ?></h1>

    <?php if (have_posts()) : ?>
    <ul class="grid grid-3">
        <?php while (have_posts()) : the_post(); ?>
        <div class="grid-item">
        <?php get_template_part('components/blog-card'); ?>
        </div>
        <?php endwhile; ?>
    </ul>
    <?php the_posts_pagination(); ?>
    <?php else : ?>
    <p>No projects found in this category.</p>
    <?php endif; ?>

</div>
<?php get_footer(); ?>