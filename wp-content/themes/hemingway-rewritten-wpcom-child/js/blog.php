<?php
/*
Template Name: blog
*/
/**
 * @package Hemingway Rewritten Child
 */

get_header(); ?>

    <div id="primary" class="content-area blog">
        <main id="main" class="site-main" role="main">

        <?php
        $id = get_cat_id( 'home-page' );
        $query_str = 'cat=-' . $id;
        query_posts( $query_str ); ?>
        <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                    $contentpart = get_post_format();
                    if ( 'image' == $contentpart || 'video' == $contentpart )
                        $contentpart = 'media'; ?>
                <?php
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', $contentpart );
                ?>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() ) :
                        comments_template();
                    endif;
                ?>

            <?php endwhile; ?>

            <?php hemingway_rewritten_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>