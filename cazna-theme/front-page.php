<?php 
get_header();
?>

<section id="introduction">
    <div class="page-image-cover">
        <div class="page-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" ></div>   
    </div>
    <div class="main-wrapper introduction-section-height">
        <div class="intro-text">
            <h1>Welcome to <?php echo get_bloginfo( 'name' ); ?>.</h1>
            <h3><?php echo get_bloginfo( 'description' ); ?></h3>
        </div>
    </div>
</section>

<section class="section-padding" id="about">
    <div class="main-wrapper">
        <h2> <?php echo get_the_title(5); ?> </h2>
        <div class="about-text">
            <?php echo apply_filters('the_content', get_post(5)->post_content) ?>
        </div>
        <div class="manager-div">
            <a href="<?php the_permalink(59); ?>"><button class="btn-lg manager-btn">Message from the General Manager</button></a>
        </div>
    </div>
</section>

<section class="section-padding" id="contact">
    <div class="main-wrapper">
        <h2>Contact Us</h2>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div>
                    <h4>Head Office</h4>
                    <p><a href="tel:0297484414">02 9748 4414</a></p>
                    <p><a href="email:info@cazna.com.au">info@cazna.com.au</a></p>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div>
                    <h4>General Manager</h4>
                    <p><a href="tel:0415825558">0415 825 558</a></p>
                    <p><a href="email:robert@cazna.com.au">robert@cazna.com.au</a></p>
                </div>
            </div>
        </div>
</section>
<section id="address">
    <div class="main-wrapper">
        <div class="row row-cols-12 address-row">
            <div class="col-12 col-md-4 address-col">
                <div>
                    <h4>Address</h4>
                    <p>61-63 Carnarvon St, <br>
                        Silverwater, Sydney, <br>
                        NSW 2128, Australia
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-8 map-col">
                <div class="google-maps">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13256.101846704021!2d151.042115!3d-33.837454!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf5c8ad7deacaa6cd!2sCazna%20Australia%20Pty%20Ltd!5e0!3m2!1sen!2sau!4v1609668736603!5m2!1sen!2sau"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding" id="products">
    <div class="main-wrapper">
        <h2 class="white-header">Our Products</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php 
            $productPosts = new WP_Query(array(
                "posts_per_page" => null,
                "post_type" => "product",
                'post_parent' => 0 //only show the products that dont have children products(pages)
            ));

            while($productPosts->have_posts()) {
                $productPosts->the_post(); ?>
            <div class="col d-flex align-items-stretch">
                <div class="card drop-shadow">  
                    <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>">              
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?php the_permalink(); ?>">Learn more about <?php the_title(); ?></a>
                    </div>
                </div>
            </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<section class="section-padding" id="services">
    <div class="main-wrapper">
        <h2>Our Services</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php 
            $servicePosts = new WP_Query(array(
                "posts_per_page" => null,
                "post_type" => "service",
                'post_parent' => 0 //only show the products that dont have children products(pages)
            ));

            while($servicePosts->have_posts()) {
                $servicePosts->the_post(); ?>
            <div class="col d-flex align-items-stretch">
                <div class="card drop-shadow">  
                    <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>">              
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?php the_permalink(); ?>">Learn more about <?php the_title(); ?></a>
                    </div>
                </div>
            </div>
            <?php } wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<?php 
get_footer();
?>