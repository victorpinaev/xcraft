<?php 
	global $post, $query_string, $SMTheme;
	

	
	
	
	if (have_posts()) :
	
	
	
	
	if (!isset($_GET['ajaxpage'])) {?> <div class='articles'> <?php }
	
	
	
	
	while (have_posts()) : the_post(); ?>
		<div class='one-post'>
			<div id="post-<?php the_ID(); ?>" <?php post_class("post-caption"); ?>>
			<?php  //Title
			if (!is_single()&&!is_page()) { ?>
				<h2><a href="<?php the_permalink(); ?>" title="<?php printf( $SMTheme->_( 'permalink' ), the_title_attribute( 'echo=0' ) ); ?>" class='post_ttl'><?php the_title(); ?></a></h2>
			<?php } else { ?>
				<h1><?php the_title(); ?></h1>
			<?php } ?>
			
			
			
			</div>
			<div class='post-body'>
			
<?php // Post featured image
	if(has_post_thumbnail())  {
		if (!is_single()){ ?><a href="<?php the_permalink(); ?>" title="<?php printf( $SMTheme->_( 'permalink' ), the_title_attribute( 'echo=0' ) ); ?>"> <?php }
			the_post_thumbnail(
				'post-thumbnail',
				array("class" => $SMTheme->get( 'layout','imgpos' ) . " featured_image")
			);
		if (!is_single()){ ?></a><?php }
	}

				?>
				
			
			<?php
				//Post content
				if (!is_single()&&!is_page()) { 
					smtheme_excerpt('echo=1');
					wp_link_pages();
				} else {
					the_content('');
				}
				 ?>
				
			
			</div>
			<div class="bottom-block">
				<?php
			//Post meta (comments, date, categories)
			if (!is_page()) {?><div class='post-meta'>
			
				<img alt="" src="<?php echo get_template_directory_uri(); ?>/images/smt/date.png"> <span class='post-date'><?php echo get_the_date(); ?></span>
				
				<span class="post-category"><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/smt/category.png"> <?php the_category(', ');?></span>
				<?php
				if(comments_open( get_the_ID() ))  {
                    ?><img alt="" src="<?php echo get_template_directory_uri(); ?>/images/smt/comments.png"> <span class='post-comments'><?php comments_popup_link( $SMTheme->_( 'noresponses' ), $SMTheme->_( 'oneresponse' ), $SMTheme->_( 'multiresponse' ) ); ?></span>
				<?php } 
				edit_post_link( $SMTheme->_( 'edit' ), '     |     <span class="edit-link">', '</span>' );
				?>
			</div><?php } ?>
				<?php 
					if (!is_single()&&!is_page()) { ?>
					<div class='block-readmore'><a href='<?php the_permalink(); ?>' class='readmore'><?php echo $SMTheme->_( 'readmore' ); ?></a></div>
					<?php 
					}
				?>
			</div>
		</div>
		
		
		
		
	<?php endwhile; ?>
	
	
	
	
	
	<?php if (!isset($_GET['ajaxpage'])) {?></div><?php } ?>
	
	
	
	
	
	
<?php endif; ?>