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
            <h3><?php the_field("service_slogan"); ?></h3>
        </div>
    </div>
</section>

<section class="section-padding" id="about">
    <div class="main-wrapper">
        <?php the_content(); ?>
    </div>
</section>
<?php 
// function has_children() {
// 	global $post;
// 	return count( get_posts( array('post_parent' => $post->ID, 'post_type' => $post->post_type) ) );
// }
if ( has_children() ) {
    ?> <section class="section-padding" id="products">
    <div class="main-wrapper">
        <h2 class="white-header"><?php the_title(); ?></h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php 
            $childrenPages = new WP_Query(array(
                "posts_per_page" => null,
                "post_type" => "service",
                'post_parent' => $post->ID,
            ));

            while($childrenPages->have_posts()) {
                $childrenPages->the_post(); ?>
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
<?php }
    }
get_footer();
?>