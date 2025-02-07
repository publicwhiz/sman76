<?php
	/**
	 * torun Social Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	torun/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'author_profile_widget');
	function author_profile_widget() {
		register_widget('author_profile_widget');
	}
	
	
	class Author_Profile_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('author_profile_widget',esc_html__('Author Profile','bdevs-toolkit'),array(
				'description' => esc_html__('Author Profile Widget','bdevs-toolkit'),
			));
		}
		
		public function widget($args, $instance){
			extract($args);
			extract($instance);
			

			 print $before_widget; 
			 	if ( ! empty( $title ) ) {
					print $before_title . apply_filters( 'widget_title', $title ) . $after_title;
				}
		?>
                <div class="about-me text-center">
                    <img src="<?php print esc_url($image_box_image); ?>" alt="<?php print esc_attr( $title ); ?>">
                    <h4>Zulia Maron Duo</h4>
                    <p><?php print esc_html($description); ?></p>
                    <div class="widget-social-icon">
                        <?php if($facebook): ?>
                        	<a href="<?php print esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a>
                    	<?php endif; ?>

						<?php if($twitter): ?>
                        	<a href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>

						<?php if($behance): ?>
                        	<a href="<?php print esc_url($behance); ?>"><i class="fab fa-behance"></i></a>
						<?php endif; ?>

						<?php if($youtube): ?>	
                        	<a href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a>
                    	<?php endif; ?>

						<?php if($pinterest): ?>	
                        	<a href="<?php print esc_url($pinterest); ?>"><i class="fab fa-pinterest-p"></i></a>
                    	<?php endif; ?>
                    </div>
                </div>
                 

              	<?php print $after_widget; ?>
			<?php 
		}
		

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){

			$title  = isset($instance['title'])? $instance['title']:'';
			$author_name  = isset($instance['author_name'])? $instance['author_name']:'';
			$description  = isset($instance['description'])? $instance['description']:'';
			$author_img  = isset($instance['image_box_image'])? $instance['image_box_image']:'';

			$twitter  = isset($instance['twitter'])? $instance['twitter']:'';
			$facebook  = isset($instance['facebook'])? $instance['facebook']:'';
			$behance  = isset($instance['behance'])? $instance['behance']:'';
			$youtube  = isset($instance['youtube'])? $instance['youtube']:'';
			$pinterest  = isset($instance['pinterest'])? $instance['pinterest']:'';

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>

			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">
			<p>

			<p>
				<label for="author_name"><?php esc_html_e('Name:','bdevs-toolkit'); ?></label>
			</p>

			<input type="text" id="<?php print esc_attr($this->get_field_id('author_name')); ?>"  name="<?php print esc_attr($this->get_field_name('author_name')); ?>" value="<?php print esc_attr($author_name); ?>">
			<p>	

			<p>
				<button type="submit" class="button button-secondary" id="author_info_image">Upload Media</button>
				<input type="hidden" name="<?php print esc_attr($this->get_field_name('image_box_image')); ?>" class="image_er_link" value="<?php print $author_img ; ?>">
				<div class="author-image-show">
					<img src="<?php print $author_img ; ?>" alt="" width="150" height="auto">
				</div>	
			</p>


				<label for="title"><?php esc_html_e('Short Description:','bdevs-toolkit'); ?></label>
			</p>

			<input type="text" id="<?php print esc_attr($this->get_field_id('description')); ?>"  name="<?php print esc_attr($this->get_field_name('description')); ?>" value="<?php print esc_attr($description); ?>">
			<p>



			<p>
				<label for="title"><?php esc_html_e('Facebook:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('facebook')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook')); ?>" value="<?php print esc_attr($facebook); ?>">


			<p>
				<label for="title"><?php esc_html_e('Twitter:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('twitter')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter')); ?>" value="<?php print esc_attr($twitter); ?>">

			<p>
				<label for="title"><?php esc_html_e('Behance:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('behance')); ?>"  name="<?php print esc_attr($this->get_field_name('behance')); ?>" value="<?php print esc_attr($behance); ?>">
			<p>
				<label for="title"><?php esc_html_e('Youtube:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('youtube')); ?>"  name="<?php print esc_attr($this->get_field_name('youtube')); ?>" value="<?php print esc_attr($youtube); ?>">

			<p>
				<label for="title"><?php esc_html_e('Pinterest:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('pinterest')); ?>"  name="<?php print esc_attr($this->get_field_name('pinterest')); ?>" value="<?php print esc_attr($pinterest); ?>">
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['author_name'] = ( ! empty( $new_instance['author_name'] ) ) ? strip_tags( $new_instance['author_name'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';

			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';

			$instance['behance'] = ( ! empty( $new_instance['behance'] ) ) ? strip_tags( $new_instance['behance'] ) : '';

			$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';

			$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';


			$instance['image_box_image'] = ( ! empty( $new_instance['image_box_image'] ) ) ? strip_tags( $new_instance['image_box_image'] ) : '';

			return $instance;
		}
	}