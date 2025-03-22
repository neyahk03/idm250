<header>
        <!-- <h1 class="logo">Yen Luong</h1> -->

        <div class="header__logo">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo">
                <?php the_custom_logo(); ?>
                </div>
            <?php endif; ?>
        </div>

        

        <nav class="nav">
        <?php 
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    
                ]);
            ?>

        </nav>


    </header>