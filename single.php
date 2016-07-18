<?php get_header(); ?>

<div class="row" id="single">
  <div class="span8">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<h1>NO HAY NADA</h1>
	  	<?php the_content(); ?>
<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p><?php _e('Lo siento, la página no existe.'); ?></p>
	<?php endif; ?>
	
	
  </div>
  <div class="span4">
    <?php get_sidebar(); ?>	
  </div>
</div>

<?php get_footer(); ?>