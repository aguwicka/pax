<?php
/*
Template Post Type: post_projects
*/
get_header();?>

<div id="<?php echo get_the_ID();?>">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content();?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer();?>
