<?php
	/**
	 * Medidove Social Widget
	 *
	 *
	 * @author 		Nilartstudio
	 * @category 	Widgets
	 * @package 	medidove/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	

	add_action('widgets_init', 'medinet_time_schedule_widget');
	function medinet_time_schedule_widget() {
		register_widget('medinet_time_schedule_widget');
	}
	
	
	class medinet_time_schedule_widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('medinet_time_schedule_widget',esc_html__('Medinet Time Schedule','bdevs-toolkit'),array(
				'description' => esc_html__('Medinet Time Schedule','bdevs-toolkit'),
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

				<?php if( !empty($choose_style) && $choose_style  === 'style_2'): ?>
                    <div class="opening-hour-box bg_img ml-none-10" data-overlay="94" data-background="<?php print $bg_image_src; ?>">
                        <div class="opening-hour-top">
							<?php if(!empty( !empty($dark_logo) )): ?>
                            <div class="icon">
                                <img src="<?php print $dark_logo; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="content">
                            	<?php if(!empty( $schedule_title )): ?>
                                <h5 class="title"><?php print $schedule_title; ?></h5>
                                <?php endif; ?>

                                <?php if(!empty( $description )): ?>
                                <p><?php print $description; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="opening-hour-list">
                            <ul>
                            	<?php if(!empty( $date_schedule_1 )): ?>
                                <li><?php print $date_label; ?><span><?php print $date_schedule_1; ?></span></li>
                                <?php endif; ?>

                                <?php if(!empty( $date_schedule_2 )): ?>
                                <li><?php print $date_label_2; ?><span><?php print $date_schedule_2; ?></span></li>
                                <?php endif; ?>

                                <?php if(!empty( $date_schedule_3 )): ?>
                                <li><?php print $date_label_3; ?><span><strong><?php print $date_schedule_3; ?></strong></span></li>
                                <?php endif; ?>

                            	<?php if(!empty( $date_schedule_4 )): ?>
                                <li><?php print $date_label_4; ?><span><?php print $date_schedule_4; ?></span></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <?php elseif( !empty($choose_style) && $choose_style  === 'style_3'): ?>

					<div class="opening-hour-list">
                        <ul>
                            <li>Monday - Friday<span>8:00 - 16:00</span></li>
                            <li>Saturday<span>8:00 - 12:00</span></li>
                            <li>Sunday<span><strong>Closed</strong></span></li>
                            <li>Lunch Break<span>9:15 - 22:45</span></li>
                        </ul>
                    </div>

                    <?php else: ?>
                    <div class="opening-hour-box opening-hour-box-3 bg_img ml-none-5" data-overlay="94" data-background="<?php print $bg_image_src; ?>">
                        <div class="opening-hour-top">
                        	<?php if(!empty( !empty($dark_logo) )): ?>
                            <div class="icon">
                                <img src="<?php print $dark_logo; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="content">
                            	<?php if(!empty( $schedule_title )): ?>
                                <h5 class="title"><?php print $schedule_title; ?></h5>
                                <?php endif; ?>

                                <?php if(!empty( $description )): ?>
                                <p><?php print $description; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="opening-hour-list">
                            <ul>
                            	<?php if(!empty( $date_schedule_1 )): ?>
                                <li><?php print $date_label; ?><span><?php print $date_schedule_1; ?></span></li>
                                <?php endif; ?>

                                <?php if(!empty( $date_schedule_2 )): ?>
                                <li><?php print $date_label_2; ?><span><?php print $date_schedule_2; ?></span></li>
                                <?php endif; ?>

                                <?php if(!empty( $date_schedule_3 )): ?>
                                <li><?php print $date_label_3; ?><span><strong><?php print $date_schedule_3; ?></strong></span></li>
                                <?php endif; ?>

                            	<?php if(!empty( $date_schedule_4 )): ?>
                                <li><?php print $date_label_4; ?><span><?php print $date_schedule_4; ?></span></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <?php endif; ?>  	



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

			$choose_style = isset( $instance['choose_style'] ) ? $instance['choose_style'] : esc_html__( 'style_1', 'bdevs-toolkits' );

			$title  = isset($instance['title'])? $instance['title']:'';

			// $bg_image  = isset($instance['bg_image_src'])? $instance['bg_image_src']:'';
			$bg_image  = isset($instance['bg_image_src'])? $instance['bg_image_src']:'';
			$logo_dark  = isset($instance['dark_logo'])? $instance['dark_logo']:'';

			$schedule_title  = isset($instance['schedule_title'])? $instance['schedule_title']:'';
			$description  = isset($instance['description'])? $instance['description']:'';

			$date_label  = isset($instance['date_label'])? $instance['date_label']:'';
			$date_schedule_1  = isset($instance['date_schedule_1'])? $instance['date_schedule_1']:'';

			$date_label_2  = isset($instance['date_label_2'])? $instance['date_label_2']:'';
			$date_schedule_2  = isset($instance['date_schedule_2'])? $instance['date_schedule_2']:'';

			$date_label_3  = isset($instance['date_label_3'])? $instance['date_label_3']:'';
			$date_schedule_3  = isset($instance['date_schedule_3'])? $instance['date_schedule_3']:'';			

			$date_label_4  = isset($instance['date_label_4'])? $instance['date_label_4']:'';
			$date_schedule_4  = isset($instance['date_schedule_4'])? $instance['date_schedule_4']:'';

			?> 

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
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('Support Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('schedule_title')); ?>"  name="<?php print esc_attr($this->get_field_name('schedule_title')); ?>" value="<?php print esc_attr($schedule_title); ?>">		


			<p>
				<button type="submit" class="button button-secondary" id="dark_logo_info">Upload Logo</button>
				<input type="hidden" name="<?php print esc_attr($this->get_field_name('dark_logo')); ?>" class="dark_logo_link" value="<?php print $logo_dark ; ?>">
				<div class="dark-logo-show">
					<img src="<?php print $logo_dark ; ?>" alt="" width="70" height="auto">
				</div>	
			</p>

			<p>
				<button type="submit" class="button button-secondary" id="primary_logo_info">Upload BG Image</button>
				<input type="hidden" name="<?php print esc_attr($this->get_field_name('bg_image_src')); ?>" class="primary_logo_link" value="<?php print $bg_image ; ?>">
				<div class="primary-logo-show">
					<img src="<?php print $bg_image ; ?>" alt="" width="150" height="auto">
				</div>	
			</p>			





			<p>
				<label for="title"><?php esc_html_e('Short Description:','bdevs-toolkit'); ?></label>
			</p>
			<textarea class="widefat" rows="5" cols="5" id="<?php print esc_attr($this->get_field_id('description')); ?>" value="<?php print esc_attr($description); ?>" name="<?php print esc_attr($this->get_field_name('description')); ?>"><?php print esc_attr($description); ?></textarea>


			<p>
				<label for="title"><?php esc_html_e('Date Label 1:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('date_label')); ?>"  name="<?php print esc_attr($this->get_field_name('date_label')); ?>" value="<?php print esc_attr($date_label); ?>">				

			<p>
				<label for="title"><?php esc_html_e('Date Schedule 1:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('date_schedule_1')); ?>"  name="<?php print esc_attr($this->get_field_name('date_schedule_1')); ?>" value="<?php print esc_attr($date_schedule_1); ?>">

			<p>
				<label for="title"><?php esc_html_e('Date Label 2:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('date_label_2')); ?>"  name="<?php print esc_attr($this->get_field_name('date_label_2')); ?>" value="<?php print esc_attr($date_label_2); ?>">			

			<p>
				<label for="title"><?php esc_html_e('Date Schedule 2:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('date_schedule_2')); ?>"  name="<?php print esc_attr($this->get_field_name('date_schedule_2')); ?>" value="<?php print esc_attr($date_schedule_2); ?>">


			<p>
				<label for="title"><?php esc_html_e('Date Label 3:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('date_label_3')); ?>"  name="<?php print esc_attr($this->get_field_name('date_label_3')); ?>" value="<?php print esc_attr($date_label_3); ?>">
			<p>
				<label for="title"><?php esc_html_e('Date Schedule 3:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('date_schedule_3')); ?>"  name="<?php print esc_attr($this->get_field_name('date_schedule_3')); ?>" value="<?php print esc_attr($date_schedule_3); ?>">			

			<p>
				<label for="title"><?php esc_html_e('Date Label 4:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('date_label_4')); ?>"  name="<?php print esc_attr($this->get_field_name('date_label_4')); ?>" value="<?php print esc_attr($date_label_4); ?>">
			<p>
				<label for="title"><?php esc_html_e('Date Schedule 4:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('date_schedule_4')); ?>"  name="<?php print esc_attr($this->get_field_name('date_schedule_4')); ?>" value="<?php print esc_attr($date_schedule_4); ?>">

			<p></p>

			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();



			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			$instance['choose_style'] = ( ! empty( $new_instance['choose_style'] ) ) ? strip_tags( $new_instance['choose_style'] ) : '';


			$instance['schedule_title'] = ( ! empty( $new_instance['schedule_title'] ) ) ? strip_tags( $new_instance['schedule_title'] ) : '';
			$instance['bg_image_src'] = ( ! empty( $new_instance['bg_image_src'] ) ) ? strip_tags( $new_instance['bg_image_src'] ) : '';
			$instance['dark_logo'] = ( ! empty( $new_instance['dark_logo'] ) ) ? strip_tags( $new_instance['dark_logo'] ) : '';
			$instance['inner_title_test '] = ( ! empty( $new_instance['inner_title_test '] ) ) ? strip_tags( $new_instance['inner_title_test '] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';


			// field 1
			$instance['date_label'] = ( ! empty( $new_instance['date_label'] ) ) ? strip_tags( $new_instance['date_label'] ) : '';
			$instance['date_schedule_1'] = ( ! empty( $new_instance['date_schedule_1'] ) ) ? strip_tags( $new_instance['date_schedule_1'] ) : '';

			// field 2
			$instance['date_label_2'] = ( ! empty( $new_instance['date_label_2'] ) ) ? strip_tags( $new_instance['date_label_2'] ) : '';
			$instance['date_schedule_2'] = ( ! empty( $new_instance['date_schedule_2'] ) ) ? strip_tags( $new_instance['date_schedule_2'] ) : '';			
			// field 3
			$instance['date_label_3'] = ( ! empty( $new_instance['date_label_3'] ) ) ? strip_tags( $new_instance['date_label_3'] ) : '';
			$instance['date_schedule_3'] = ( ! empty( $new_instance['date_schedule_3'] ) ) ? strip_tags( $new_instance['date_schedule_3'] ) : '';			
			// field 4
			$instance['date_label_4'] = ( ! empty( $new_instance['date_label_4'] ) ) ? strip_tags( $new_instance['date_label_4'] ) : '';
			$instance['date_schedule_4'] = ( ! empty( $new_instance['date_schedule_4'] ) ) ? strip_tags( $new_instance['date_schedule_4'] ) : '';


			return $instance;
		}
	}