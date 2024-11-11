<?php
    get_template_part('template-parts/header/head');
?>
    <body <?php body_class(); ?>>
    <div class="site-wrapper">

        <header class="site-header">
        <?php get_template_part('template-parts/header/topbar');?>
            <nav class="main-nav">
                <?php
                // logo
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    echo '<h1>'.get_bloginfo('name').'</h1>';
                }
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => 'ul',
                    'menu_class' => 'main-menu'
                ));
                ?>
            </nav>
        </header>
        <main>

