
<?php get_header();?>
<div id="primary" class="site-content">
    <div id="content" role="main">

<?php while (have_posts()):the_post();?>

			          <article id="post-<?php the_ID();?>" <?php post_class();
	?>>

			            <header class="entry-header">
			              <h1 class="entry-title"><?php the_title();?></h1>
			            </header>

			            <div class="entry-content">
	<?php the_content();?>

			              <div id="form-messages">
			              </div><!--#form-messages-->
			              <form id="ajax-contact" enctype="multipart/form-data" method="post" action="<?php echo get_stylesheet_directory_uri();?>/mailer.php" class="contact-form">
			                <div class="field">
			                    <label for="name">Name:</label>
			                    <input type="text" id="name" name="name" required>
			                </div>

			                <div class="field">
			                    <label for="email">Email:</label>
			                    <input type="email" id="email" name="email" required>
			                </div>

			                <div class="field">
			                    <label for="message">Message:</label>
			                    <textarea id="message" name="message" rows="20" required></textarea>
			                </div>
			                <br/>
			                <div class="field">
			                  <!--<label for="file" class="file-upload">Type (or select) Filename:</label>-->
			                  <input id="file" type="file" name="file">
			                  <p>You may upload pdf of plans here by selecting file on your computer.<br/>
			                  <small><b>Note:</b> Files must be pdf's and be less 2 megabytes in size.</small></p>
			                  <!-- <input type="hidden" name="MAX_FILE_SIZE" value="2500000" /> -->
			                </div>
			                <br/>
			                <div class="field">
			                    <button type="submit">Send</button>
			                </div>
			              </form>

			            </div><!-- .entry-content -->

			          </article><!-- #post -->

	<?php endwhile;// end of the loop. ?>
</div><!-- #content -->
  </div><!-- #primary -->

<?php get_footer();?>