<!DOCTYPE html>
<html lang="en">
<!-- Designed and Developed by Thomas Brettell // thomasbrettell.com // thomas.a.brettell@gmail.com -->
<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid main-wrapper">
                <a href="<?php echo site_url(); ?>" class="navbar-brand">
                    <img src=<?php echo get_theme_file_uri("assets/cazna-navbar-logo.svg"); ?> alt="" height="40"
                        class="d-inline-block align-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-menu" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="navbar-nav nav-fill w-100">
                        <li class="nav-item">
                            <a href="<?php echo site_url(); ?>" class="nav-link">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url()."#about"; ?>" class="nav-link">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url()."#contact"; ?>" class="nav-link">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url()."#products"; ?>" class="nav-link">PRODUCTS</a>
                            <ul class="nav-drop-menu-1">
                            <?php 
                            $productPosts = new WP_Query(array(
                                "posts_per_page" => null,
                                "post_type" => "product",
                                'post_parent' => 0 //only show the products that dont have children products(pages)
                            ));

                            while($productPosts->have_posts()) {
                                $productPosts->the_post(); ?>
                                <li> <?php the_title();
                                global $post;
                                if ( count( get_posts( array('post_parent' => $post->ID, 'post_type' => $post->post_type) ) ) ) {
                                    ?> <ul class="nav-drop-menu-2">
                                    <?php 
                                    $childrenPages = new WP_Query(array(
                                        "posts_per_page" => null,
                                        "post_type" => "product",
                                        'post_parent' => $post->ID,
                                    ));
                                    while($childrenPages->have_posts()) {
                                        $childrenPages->the_post();?>
                                        <li> <?php the_title(); ?></li>
                                        <?php } ?>
                                    </ul><?php
                                }
                                ?>
                                </li>
                            <?php } wp_reset_postdata(); ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url()."#services"; ?>" class="nav-link">SERVICES</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>