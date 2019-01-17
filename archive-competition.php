<?php get_header(); ?>
<div class="container">
        <section class="competition-news">
            <h1 class="competition-news__title">Новости конкурса</h1>
            <div class="row">
                <?php while(have_posts()) {
                            the_post(); ?>
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
                <?php } ?>
            </div>
        </section>
</div>
<?php
    $pagination = paginate_links([
      'type' => 'array'
    ]);

    if ($pagination) {
      echo '<ul class="pagination">';
      foreach ($pagination as $link) {
        echo '<li class="pagination__item">';
        echo $link;
        echo '</li>';
      }
      echo '</ul>';
    }
?>
<?php get_footer(); ?>