<?php
    get_template_part('template-parts/header/head');
?>


    <body <?php body_class(); ?>>
        <header>
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

