<?php get_header(); ?>

<main class="page__main index-page"> 
    <div class="container">
        <section class="competition-news">
            <h1 class="competition-news__title">Новости конкурса</h1>
            <a href="<?php echo get_post_type_archive_link('competition') ?>" class="competition-news__archive-link archive-link">Все новости конкурса</a>
            <div class="row">
                <?php 
                    $competitionNews = new WP_Query(array(
                        'posts_per_page' => 12,
                        'post_type' => 'competition'
                    )); 
                    while($competitionNews->have_posts()){
                        $competitionNews->the_post(); ?>
                        <div class="competition-news__item col-4">
                            <a href="<?php the_permalink(); ?>" class="competition-news__image logo-image logo-image--small">
                                <img src="<?php the_post_thumbnail_url(); ?>" class="logo-image__image">
                            </a>
                            <div class="competition-news__caption">
                                <span class="competition-news__date">
                                    <?php echo get_the_date('d.m.Y'); ?>
                                </span>
                                <a href="<?php the_permalink(); ?>" class="link">
                                    <?php echo wp_trim_words(get_the_title(), 18); ?>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </section>

    </div>
</main>

<?php get_footer(); ?>