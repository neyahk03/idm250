<header>
        <h1 class="logo">Yen Luong</h1>

        <div class="header__logo">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo">
                <?php the_custom_logo(); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- <div class="navbar">
            <div class="navlink">
                <a href="index.php">Home</a>

            </div>

            <div class="navlink">
            <a href="index.php">Project</a>

            </div>

            <div class="navlink">
            <a href="index.php">About</a>

            </div>

            
        </div> -->

        <?php 
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                ]);
            ?>


    </header>