<?php
	/**
	 * Ekagoz Footer full Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	Ekagoz/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'bdevs_download_info_widget');
	function bdevs_download_info_widget() {
		register_widget('bdevs_download_info_widget');
	}
	
	
	class Bdevs_download_Info_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('bdevs_download_info_widget',esc_html__('Download Info','bdevs-toolkit'),array(
				'description' => esc_html__('Ekagoz Download Info Widget','bdevs-toolkit'),
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

                <div class="footer-img mt-15">
                    <a href="<?php  print home_url(); ?>"><img src="<?php print $image_box_image; ?>" alt=""></a>
                    <a href="#"><img src="<?php print $download_image_box_image; ?>" alt=""></a>
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
			$download_image_box_image  = isset($instance['download_image_box_image'])? $instance['download_image_box_image']:'';
			$author_img  = isset($instance['image_box_image'])? $instance['image_box_image']:'';

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<div class="widget_field">
				<button type="submit" class="button button-secondary" id="download_info_image">Upload Media</button>
				<input type="text" name="<?php print esc_attr($this->get_field_name('download_image_box_image')); ?>" class="download_image_er_link" value="<?php print $download_image_box_image ; ?>">
				<div class="author-image-show">
					<img src="<?php print $download_image_box_image ; ?>" alt="" width="150" height="auto">
				</div>	
			</div>

			<div class="widget_field">
				<button type="submit" class="button button-secondary" id="author_info_image">Upload Media</button>
				<input type="text" name="<?php print esc_attr($this->get_field_name('image_box_image')); ?>" class="image_er_link" value="<?php print $author_img ; ?>">
				<div class="author-image-show">
					<img src="<?php print $author_img ; ?>" alt="" width="150" height="auto">
				</div>	
			</div>

		
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			$instance['download_image_box_image'] = ( ! empty( $new_instance['download_image_box_image'] ) ) ? strip_tags( $new_instance['download_image_box_image'] ) : '';
			$instance['image_box_image'] = ( ! empty( $new_instance['image_box_image'] ) ) ? strip_tags( $new_instance['image_box_image'] ) : '';

			return $instance;
		}
	}