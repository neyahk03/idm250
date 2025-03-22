<?php get_header(); ?>

<main class="post-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="post">
            <h1 class="post-title"><?php the_title(); ?></h1>

            <p class="post-meta"><strong>Project Categories:</strong>
                <?php echo get_the_term_list(
                    get_the_ID(), // 204
                    'project-categories', // taxonomy name
                    '', // before
                    ', ', // separator
                    '' // after
                ); ?>
            </p>
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            
            <div class="post-tags">
                <?php the_tags('Tags: ', ', '); ?>
            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<section class="wrapper related-post">
  <?php get_template_part('components/related-projects'); ?>
</section>

<?php get_footer(); ?>



