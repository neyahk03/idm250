<?php get_header(); ?>

<h1 class="page-title">
    <?php 
        echo get_the_title(); 
    ?>
</h1>

<?php if (has_post_thumbnail()) : ?>
    <div class="featured-image">
        <?php the_post_thumbnail(); ?>
    </div>
<?php endif; ?>

<div class="main-content">
    <?php 
    echo get_the_content(); 
    ?>
</div>


<?php get_footer(); ?>

