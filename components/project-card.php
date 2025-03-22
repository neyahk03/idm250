<?php
/**
 * 🧩 Project Card Component
 * -------------------------------------------------
 * ✅ **Purpose:**
 * - Reusable card to display project details with image, date, tags, and title.
 *
 * 🎯 **Displays:**
 * - Featured image with overlay effect
 * - Project date
 * - Project tags (custom taxonomy: 'project-tags')
 * - Project title linked to the project page
 */
?>

<article class="project-card">
    <div class="image-wrapper">

        <a href="<?php the_permalink(); ?>">
            <!-- Feature Image -->
            
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large', ['class' => 'project-card__image']); ?>
                <?php endif; ?>
           
        </a>
    </div>

    <!-- Project Info -->
    <div class="project-card__content">
        <h2 class="project-card__title"><?php the_title(); ?></h2>
        

        <!-- Categories -->
        <?php 
        $categories = get_the_term_list(get_the_ID(), 'project-categories', '', ', ', '');
        if ($categories) {
            echo '<p class="project-card__categories">' . $categories . '</p>';
        } 
        ?>


        <!-- Excerpt -->
        <p class="project-card__excerpt"><?php echo get_the_excerpt(); ?></p>

        <!-- View Case Study Button -->
        <a href="<?php the_permalink(); ?>" class="project-card__button">View Project</a>
    </div>


</article>
