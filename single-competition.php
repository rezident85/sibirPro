<?php get_header(); 
while(have_posts()) {
    the_post(); ?>
<div class="container">
<section class="single-competition">
    <h1 class="single-competition__title"><?php the_title(); ?></h1>
    <div class="row justify-content-center">
        <div class="single-competition__image col-8">
            <img src="<?php the_post_thumbnail_url(); ?>">
        </div>
        <div class="single-competition__content col-8">
                <?php the_content(); ?>
        </div>
    </div>
</section>
</div>

<?php } ?>


<?php get_footer(); ?>