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
	add_action('widgets_init', 'bdevs_logo_info_widget');
	function bdevs_logo_info_widget() {
		register_widget('bdevs_logo_info_widget');
	}
	
	
	class Bdevs_Logo_Info_Widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('bdevs_logo_info_widget',esc_html__('Logo Info','bdevs-toolkit'),array(
				'description' => esc_html__('Ekagoz Logo Info Widget','bdevs-toolkit'),
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

                <div class="footer-wrapper mb-30">
                    <div class="footer-logo">
                        <a href="<?php  print home_url(); ?>"><img src="<?php print $image_box_image; ?>" alt=""></a>
                    </div>
                    <div class="header-02-info header-3-info">
                        <span><i class="far fa-clock"></i> <a href="#"><?php echo date('l,'); ?></a> <?php echo date('d M Y'); ?></span>
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
			$author_img  = isset($instance['image_box_image'])? $instance['image_box_image']:'';

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

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

			$instance['image_box_image'] = ( ! empty( $new_instance['image_box_image'] ) ) ? strip_tags( $new_instance['image_box_image'] ) : '';

			return $instance;
		}
	}