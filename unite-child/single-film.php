<?php
/**
 * Template Name: Single Film page
 * Template Post Type: film
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>


            <div><h3><?php echo get_the_title() ?></h3></div>
            <div>
                    <?php echo strip_tags(get_the_term_list(get_the_ID(), 'film-year')) ?>
                    |
                    <?php echo strip_tags(get_the_term_list(get_the_ID(), 'film-genre', '', ' ')) ?>
            </div>
            <div style="margin-top: 1rem;" class="content"><?php echo get_the_content() ?></div>
            <div style="margin-top: 1rem;"><b>Ticket Price: </b> $<?php echo get_field( "ticket_price", get_the_ID() ); ?></div>
            <div style="margin-top: 1rem;"><b>Release Date: </b> <?php echo get_field( "release_date", get_the_ID() ); ?></div>
            <div style="margin-top: 1rem;"><b>Country: </b> <?php echo strip_tags(get_the_term_list(get_the_ID(), 'film-country', '', ' ')); ?></div>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>