<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package beakai
 */

$gallery_images =  function_exists('acf_photo_gallery') ? acf_photo_gallery('gallery_images', get_the_id()) : ''; 
$categories = get_the_terms( $post->ID, 'category' );
if( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox post format-image mb-50'); ?>>
        <?php if (!empty($gallery_images)) : ?>
            <div class="post_gallery owl-carousel mb-30">
                <?php foreach( $gallery_images as $key => $image ) :  ?>
                <div class="single-postbox-gallery">
                    <img src="<?php echo  esc_url($image['full_image_url']); ?>" alt="<?php print esc_attr__('gallery image','beakai'); ?>">
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="postbox__text">
            <div class="post-meta mb-15">
                <span><i class="far fa-calendar-check"></i> <?php the_time( get_option('date_format') ); ?> </span>
                <span><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>"><i class="far fa-user"></i> <?php print get_the_author(); ?></a></span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php echo esc_html($categories[0]->name); ?></a></span>
            </div>
            <h3 class="blog-title">
                <?php the_title(); ?>
            </h3>
            <div class="post-text mb-20">
               <?php the_content(); ?> 
                <?php
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'beakai' ),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
            <?php print beakai_get_tag(); ?>
        </div>
    </article>

<?php
else: ?>



    <article id="post-<?php the_ID(); ?>" <?php post_class('postbox post format-image mb-50'); ?>>
        <?php if (!empty($gallery_images)) : ?>
            <div class="postbox__gallery">
                <?php foreach( $gallery_images as $key => $image ) :  ?>
                <img src="<?php echo  esc_url($image['full_image_url']); ?>" alt="<?php print esc_attr__('gallery image','beakai'); ?>">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="postbox__text p-50">
            <div class="post-meta mb-15">
                <span><i class="far fa-calendar-check"></i> <?php the_time(get_option('date_format')); ?> </span>
                <span><a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="far fa-user"></i> <?php print get_the_author(); ?></a></span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php comments_number(); ?></a></span>
                <span><a href="<?php comments_link(); ?>"><i class="far fa-comments"></i> <?php echo esc_html($categories[0]->name); ?></a></span>
            </div>
            <h3 class="blog-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="post-text mb-20">
                <?php the_excerpt(); ?>
            </div>
            <!-- blog btn -->
            <?php
                $beakai_blog_btn = get_theme_mod('beakai_blog_btn',__('Read More','beakai'));
                $beakai_blog_btn_switch     = get_theme_mod('beakai_blog_btn_switch', true);  
            ?>

            <?php if(!empty($beakai_blog_btn_switch)) : ?>
            <div class="read-more mt-30">
                <a href="<?php the_permalink(); ?>" class="bt-btn"><?php print esc_html($beakai_blog_btn); ?></a>
            </div>
            <?php endif; ?>

        </div>
    </article>

<?php
endif; ?>


