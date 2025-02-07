<?php
	/**
	 * pohat Social Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	pohat/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'social_profiles_widget');
	function social_profiles_widget() {
		register_widget('social_profiles_widget');
	}
	
	
	class Social_Profiles_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('social_profiles_widget',esc_html__('KingFact Social Profile','bdevs-toolkit'),array(
				'description' => esc_html__('Social Profile Widget by KingFact','bdevs-toolkit'),
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

     		<?php 
			if( $choose_style === 'style_1'): ?>


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

			<?php 
			elseif( $choose_style === 'style_2' ): ?>


			<?php 
			elseif( $choose_style === 'style_3' ): ?>

			<?php 
			endif; ?>	

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
			$twitter  = isset($instance['twitter'])? $instance['twitter']:'';
			$facebook  = isset($instance['facebook'])? $instance['facebook']:'';
			$dribbble  = isset($instance['dribbble'])? $instance['dribbble']:'';
			$google_plus  = isset($instance['google_plus'])? $instance['google_plus']:'';
			$pinterest  = isset($instance['pinterest'])? $instance['pinterest']:'';
			$instagram  = isset($instance['instagram'])? $instance['instagram']:'';


			$choose_style = ! empty( $instance['choose_style'] ) ? $instance['choose_style'] : esc_html__( 'style_1', 'bdevs-toolkits' );

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>

			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" class="widefat" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="<?php echo $this->get_field_id('choose_style'); ?>">Choose Style</label>
				<select name="<?php echo $this->get_field_name('choose_style'); ?>" id="<?php echo $this->get_field_id('choose_style'); ?>" class="widefat">
					<option value="" disabled="disabled">Select Style</option>
					<option value="style_1" <?php if($choose_style === 'style_1'){ echo 'selected="selected"'; } ?>>Style 1</option>
					<option value="style_2" <?php if($choose_style === 'style_2'){ echo 'selected="selected"'; } ?>>Style 2</option>
					<option value="style_3" <?php if($choose_style === 'style_3'){ echo 'selected="selected"'; } ?>>Style 3</option>
				</select>
			</p>

			<p>
				<label for="title"><?php esc_html_e('Facebook:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('facebook')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook')); ?>" class="widefat" value="<?php print esc_attr($facebook); ?>">


			<p>
				<label for="title"><?php esc_html_e('Twitter:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('twitter')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter')); ?>" class="widefat" value="<?php print esc_attr($twitter); ?>">

			<p>
				<label for="title"><?php esc_html_e('Behance:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('dribbble')); ?>"  name="<?php print esc_attr($this->get_field_name('dribbble')); ?>" class="widefat" value="<?php print esc_attr($dribbble); ?>">

			<p>
				<label for="title"><?php esc_html_e('Google Plus:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('google_plus')); ?>"  name="<?php print esc_attr($this->get_field_name('google_plus')); ?>" class="widefat" value="<?php print esc_attr($google_plus); ?>">

			<p>
				<label for="title"><?php esc_html_e('Pinterest:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('pinterest')); ?>"  name="<?php print esc_attr($this->get_field_name('pinterest')); ?>" class="widefat" value="<?php print esc_attr($pinterest); ?>">
			
			<p>
				<label for="title"><?php esc_html_e('Instagram:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('instagram')); ?>"  name="<?php print esc_attr($this->get_field_name('instagram')); ?>" class="widefat" value="<?php print esc_attr($instagram); ?>">
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['choose_style'] = ( ! empty( $new_instance['choose_style'] ) ) ? strip_tags( $new_instance['choose_style'] ) : '';


			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
			$instance['dribbble'] = ( ! empty( $new_instance['dribbble'] ) ) ? strip_tags( $new_instance['dribbble'] ) : '';
			$instance['google_plus'] = ( ! empty( $new_instance['google_plus'] ) ) ? strip_tags( $new_instance['google_plus'] ) : '';
			$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
			$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';

			return $instance;
		}
	}