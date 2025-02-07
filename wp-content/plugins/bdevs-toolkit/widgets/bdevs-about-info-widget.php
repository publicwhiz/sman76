<?php
	/**
	 * ekagoz Footer full Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	ekagoz/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'bdevs_about_info_widget');
	function bdevs_about_info_widget() {
		register_widget('bdevs_about_info_widget');
	}
	
	
	class Bdevs_About_Info_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('bdevs_about_info_widget',esc_html__('About Info','bdevs-toolkit'),array(
				'description' => esc_html__('Ekagoz About Info Widget','bdevs-toolkit'),
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


                <div class="footer-text">
                    <p><?php print $description; ?></p>
                </div>
                <div class="social-icon footer-icon">
                    <?php 
                	if($facebook): ?>
                		<a class="fb" href="<?php print esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a>
                	<?php 
                	endif; ?>

                	<?php 
					if($twitter): ?>
						<a class="twit" href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a>
                    <?php 
                	endif; ?>

                	<?php 
					if($instagram): ?>
						<a class="insta" href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a>
					<?php 
					endif; ?>

					<?php 
					if($pinterest): ?>	
						<a class="pin" href="<?php print esc_url($pinterest); ?>"><i class="fab fa-pinterest-p"></i></a>
                	<?php 
                	endif; ?>

					<?php 
					if($google_plus): ?>
						<a class="google" href="<?php print esc_url($google_plus); ?>"><i class="fab fa-google-plus-g"></i></a>
                	<?php 
                	endif; ?>

					<?php 
					if($dribbble): ?>
						<a class="dribbble" href="<?php print esc_url($dribbble); ?>"><i class="fab fa-dribbble"></i></a>	
                	<?php 
                	endif; ?>

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
			$description  = isset($instance['description'])? $instance['description']:'';
			$author_img  = isset($instance['image_box_image'])? $instance['image_box_image']:'';

			$facebook  		= isset($instance['facebook'])? $instance['facebook']:'';
			$twitter  		= isset($instance['twitter'])? $instance['twitter']:'';
			$instagram  	= isset($instance['instagram'])? $instance['instagram']:'';
			$pinterest  	= isset($instance['pinterest'])? $instance['pinterest']:'';
			$dribbble  		= isset($instance['dribbble'])? $instance['dribbble']:'';
			$google_plus  		= isset($instance['google_plus'])? $instance['google_plus']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">
			<p>
				<label for="title"><?php esc_html_e('Short Description:','bdevs-toolkit'); ?></label>
			</p>

			<textarea class="widefat" rows="7" cols="15" id="<?php print esc_attr($this->get_field_id('description')); ?>" value="<?php print esc_attr($description); ?>" name="<?php print esc_attr($this->get_field_name('description')); ?>"><?php print esc_attr($description); ?></textarea>

			<div class="widget_field">
				<button type="submit" class="button button-secondary" id="author_info_image">Upload Media</button>
				<input type="text" name="<?php print esc_attr($this->get_field_name('image_box_image')); ?>" class="image_er_link" value="<?php print $author_img ; ?>">
				<div class="author-image-show">
					<img src="<?php print $author_img ; ?>" alt="" width="150" height="auto">
				</div>	
			</div>

			<p>
				<label for="title"><?php esc_html_e('Facebook:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('facebook')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook')); ?>" value="<?php print esc_attr($facebook); ?>">

			<p>
				<label for="title"><?php esc_html_e('Twitter:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('twitter')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter')); ?>" value="<?php print esc_attr($twitter); ?>">

			<p>
				<label for="title"><?php esc_html_e('Instagram:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('instagram')); ?>"  name="<?php print esc_attr($this->get_field_name('instagram')); ?>" value="<?php print esc_attr($instagram); ?>">

			<p>
				<label for="title"><?php esc_html_e('Pinterest:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('pinterest')); ?>"  name="<?php print esc_attr($this->get_field_name('pinterest')); ?>" value="<?php print esc_attr($pinterest); ?>">


			<p>
				<label for="title"><?php esc_html_e('Dribbble:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('dribbble')); ?>"  name="<?php print esc_attr($this->get_field_name('dribbble')); ?>" value="<?php print esc_attr($dribbble); ?>">

			<p>
				<label for="title"><?php esc_html_e('Google Plus:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('google_plus')); ?>"  name="<?php print esc_attr($this->get_field_name('google_plus')); ?>" value="<?php print esc_attr($google_plus); ?>">



			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
			$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
			$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
			$instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? strip_tags( $new_instance['dribbble'] ) : '';
			$instance['google_plus'] = ( ! empty( $new_instance['google_plus'] ) ) ? strip_tags( $new_instance['google_plus'] ) : '';

			$instance['image_box_image'] = ( ! empty( $new_instance['image_box_image'] ) ) ? strip_tags( $new_instance['image_box_image'] ) : '';

			return $instance;
		}
	}