<?php get_header(); ?>
<div class="wrapper">
    <?php if (have_posts()) : ?>

    <section class="title-section">

        <h1>
        <?php echo preg_replace('/^\s*Archives:\s*/', '', get_the_archive_title()); ?>
        </h1>
    </section>

    <div class="grid grid-3">
        <?php
    while (have_posts()) : the_post(); ?>

        <div class="grid-item blog-card">
        <?php get_template_part('components/blog-card'); ?>
        </div>

        <?php endwhile; ?>
    </div>

    <?php the_posts_pagination(); ?>

    <?php else : ?>
    <p>No posts found.</p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>

