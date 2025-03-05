<a href="<?php the_permalink(); ?>" class="blog-card__link">
 
 <?php if (has_post_thumbnail()) : ?>
            <div class="blog-card__image-wrapper">
            <?php the_post_thumbnail('large', ['class' => 'blog-card__image']); ?>
            </div>
            <?php endif; ?>


 </a>
        <div class="blog-card__content">
            <div class="blog-card__meta">
                
                <?php
                $categories = get_the_category();
                if (!empty($categories)) :
                    ?>
                <a href="<?php echo get_category_link($categories[0]->term_id); ?>" class="blog-card__category">
                <?php echo $categories[0]->name; ?>
                </a>
                <?php endif; ?>
            </div>

            <a href="<?php the_permalink(); ?>" class="blog-card__link">

                <h3 class="blog-card__title"><?php the_title(); ?></h3>

            </a>
                
            <p class="blog-card__category-name">
    
                <?php echo get_the_term_list(
                        get_the_ID(), // 204
                        'project-categories', // taxonomy name
                        '', // before
                        ', ', // separator
                        '' // after
                    ); ?>
            </p>
        </div>