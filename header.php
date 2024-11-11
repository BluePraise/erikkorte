<?php
    get_template_part('template-parts/header/head');
?>
    <body <?php body_class(); ?>>
    <div class="site-wrapper">

        <header>
        <?php get_template_part('template-parts/header/topbar');?>
            <h1><?php bloginfo('name'); ?></h1>
            <nav>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu'
                        )
                    );
                ?>
            </nav>
        </header>
        <main>

