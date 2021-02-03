<?php 
get_header();

while(have_posts()) {
    the_post();
?>
<section id="introduction">
    <div class="page-image-cover">
        <div class="page-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" ></div>   
    </div>
    <div class="main-wrapper introduction-section-height">
        <div class="intro-text">
            <h1><?php the_title(); ?>.</h1>
            <h3><?php the_field("product_slogan"); ?></h3>
        </div>
    </div>
</section>

<section class="section-padding" id="about">
    <div class="main-wrapper">
        <?php the_content(); ?>
    </div>
    <div>
        <div class="row manager-div div-width-set">
            <div class="col-12 col-sm-6 center-col-evenly">
                <a href="<?php echo site_url()."#products"; ?>"><button class="btn-lg manager-btn">See our products</button></a>
            </div>
            <div class="col-12 col-sm-6 center-col-evenly">
                <a href="<?php echo site_url()."#services"; ?>"><button class="btn-lg manager-btn">See our services</button></a>
            </div>
        </div>
    </div>
</section>
<?php 
}
get_footer();
?>