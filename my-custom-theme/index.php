<?php get_header(); ?>
<div class="container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_excerpt(); ?></p>
        <?php endwhile;
    else :
        echo '<p>No content found.</p>';
    endif;
    ?>
</div>
<?php get_footer(); ?>
