<?php
get_template_part('template-parts/header/head');
?>

<body <?php body_class(); ?>>
    <div class="site-wrapper">

        <header class="site-header sticky-top">
            <?php get_template_part('template-parts/header/topbar'); ?>
            <nav class="main-nav d-flex justify-content-between bg-white p-3 pt-3">
                <?php
                // logo
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
                echo '<button class="mobile_menubtn" aria-label="Menu" aria-expanded="false" type="button"><i class="fa-solid fa-bars"></i></button>';
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => 'ul',
                    'menu_class' => 'main-menu'
                ));
                ?>
            </nav>
        </header>
        <main>