<?php
/**
 * Template Name: Full Width, No Sidebar
 *
 * @package Hemingway Rewritten
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main nosidebar" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php $id_from_title = titleToUrl(get_the_title());?>

				<div id="<?=$id_from_title?>">

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					// if ( comments_open() || '0' != get_comments_number() ) :
					// 	comments_template();
					// endif;
				?>

				</div> <!-- #post-tittle -->
			<?php endwhile; // end of the loop. ?>

<!--//////////////// Hidden Contact Form ///////////////////////////////////-->
        <div id="contact" class="hidden-form">
          <h2 class="form-title" style="text-align: center;">Contact</h2>
          <div id='form-wrapper'>
            <div id="form-messages">
            </div><!--#form-messages-->
            <form enctype="multipart/form-data" method="post" id="contact-form" name="contact-form" action="<?php echo get_stylesheet_directory_uri();?>/mailer.php" class="contact-form">
              <p>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" >
              </p>
              <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" >
              </p>
              <p>
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="10" ></textarea>
              </p>
              <br/>
              <p>
                <!--<label for="file" class="file-upload">Type (or select) Filename:</label>-->
                <input type="hidden" name="MAX_FILE_SIZE" value="2500000" />
                <input type="file" id="userfile" name="userfile" />
                <p>You may upload plans here by selecting file on your computer.<br/>
                <small><b>Note:</b> Files must be pdf's and be less 2 megabytes in size.</small></p>
              </p>
                <div id="form-message-bottom"></div>
              <p>
                <input type="submit" value="Submit »" class="pushbutton-wide">
              </p>
            </form>
          </div> <!-- form-wrapper -->
        </div> <!-- hidden-form -->
<!--//////////////// Hidden Contact Form END ///////////////////////////////-->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

