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
	

	add_action('widgets_init', 'medinet_profile_number_widget');
	function medinet_profile_number_widget() {
		register_widget('medinet_profile_number_widget');
	}
	
	
	class medinet_profile_number_widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('medinet_profile_number_widget',esc_html__('Medinet Contact Support','bdevs-toolkit'),array(
				'description' => esc_html__('Medinet Contact Support','bdevs-toolkit'),
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

                    <div class="opening-hour-box contact-support-info" data-overlay="100">
                        <div class="opening-hour-top">
                        	<?php if(!empty( !empty($dark_logo) )): ?>
                            <div class="icon">
                                <img src="<?php print $dark_logo; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="content">
                            	<?php if(!empty( $support_title )): ?>
                                <h5 class="title"><?php print $support_title; ?></h5>
                                <?php endif; ?>

                                <?php if(!empty( $description )): ?>
                                <p><?php print $description; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="opening-hour-support-info">
                            <div class="single-support-info">
                            	<?php if(!empty( $phone_label )): ?>
                                <h4 class="title"><?php print $phone_label; ?></h4>
                                <?php endif; ?>
                                <div class="content">
                                	<?php if(!empty( $phone_number )): ?>
                                    <a href="tel:<?php print $phone_number; ?>"><?php print $phone_number; ?></a>
                                    <?php endif; ?>
                                    <?php if(!empty( $phone_number_2 )): ?>
                                    <a href="tel:<?php print $phone_number_2; ?>"><?php print $phone_number_2; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="single-support-info">
                            	<?php if(!empty( $mail_label )): ?>
                                <h4 class="title"><?php print $mail_label; ?></h4>
                                <?php endif; ?>
                                <div class="content">
                                	<?php if(!empty( $email_address )): ?>
                                    <a href="mailto:<?php print $email_address; ?>"><?php print esc_html($email_address); ?></a>
                                    <?php endif; ?>

                                    <?php if(!empty( $email_address_2 )): ?>
                                    <a href="mailto:<?php print $email_address_2; ?>"><?php print $email_address_2; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
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

			$logo_dark  = isset($instance['dark_logo'])? $instance['dark_logo']:'';
			$support_title  = isset($instance['support_title'])? $instance['support_title']:'';
			// $inner_title_test  = isset($instance['inner_title_test'])? $instance['inner_title_test']:'';
			$description  = isset($instance['description'])? $instance['description']:'';

			$mail_label  = isset($instance['mail_label'])? $instance['mail_label']:'';
			$email_address  = isset($instance['email_address'])? $instance['email_address']:'';
			$email_address_2  = isset($instance['email_address_2'])? $instance['email_address_2']:'';
			$phone_label  = isset($instance['phone_label'])? $instance['phone_label']:'';
			$phone_number  = isset($instance['phone_number'])? $instance['phone_number']:'';
			$phone_number_2  = isset($instance['phone_number_2'])? $instance['phone_number_2']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('Support Title:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('support_title')); ?>"  name="<?php print esc_attr($this->get_field_name('support_title')); ?>" value="<?php print esc_attr($support_title); ?>">		


			<p>
				<button type="submit" class="button button-secondary" id="dark_logo_info">Upload Logo</button>
				<input type="hidden" name="<?php print esc_attr($this->get_field_name('dark_logo')); ?>" class="dark_logo_link" value="<?php print $logo_dark ; ?>">
				<div class="dark-logo-show">
					<img src="<?php print $logo_dark ; ?>" alt="" width="70" height="auto">
				</div>	
			</p>



			<p>
				<label for="title"><?php esc_html_e('Short Description:','bdevs-toolkit'); ?></label>
			</p>

			<textarea class="widefat" rows="5" cols="5" id="<?php print esc_attr($this->get_field_id('description')); ?>" value="<?php print esc_attr($description); ?>" name="<?php print esc_attr($this->get_field_name('description')); ?>"><?php print esc_attr($description); ?></textarea>

			<!-- phone -->
			<p>
				<label for="title"><?php esc_html_e('Phone Label:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('phone_label')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_label')); ?>" value="<?php print esc_attr($phone_label); ?>">				


			<p>
				<label for="title"><?php esc_html_e('Phone Number:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('phone_number')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_number')); ?>" value="<?php print esc_attr($phone_number); ?>">

			<p>
				<label for="title"><?php esc_html_e('Phone Number 2:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('phone_number_2')); ?>"  name="<?php print esc_attr($this->get_field_name('phone_number_2')); ?>" value="<?php print esc_attr($phone_number_2); ?>">

			<!-- mail -->
			<p>
				<label for="title"><?php esc_html_e('Email Label:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('mail_label')); ?>"  name="<?php print esc_attr($this->get_field_name('mail_label')); ?>" value="<?php print esc_attr($mail_label); ?>">			

			<p>
				<label for="title"><?php esc_html_e('Email Address:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('email_address')); ?>"  name="<?php print esc_attr($this->get_field_name('email_address')); ?>" value="<?php print esc_attr($email_address); ?>">

			<p>
				<label for="title"><?php esc_html_e('Email Address 2:','bdevs-toolkit'); ?></label>
			</p>
			<input type="text" class="widefat" id="<?php print esc_attr($this->get_field_id('email_address_2')); ?>"  name="<?php print esc_attr($this->get_field_name('email_address_2')); ?>" value="<?php print esc_attr($email_address_2); ?>">

			<p></p>

			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			$instance['support_title'] = ( ! empty( $new_instance['support_title'] ) ) ? strip_tags( $new_instance['support_title'] ) : '';
			$instance['dark_logo'] = ( ! empty( $new_instance['dark_logo'] ) ) ? strip_tags( $new_instance['dark_logo'] ) : '';
			$instance['inner_title_test '] = ( ! empty( $new_instance['inner_title_test '] ) ) ? strip_tags( $new_instance['inner_title_test '] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

			// mail
			$instance['mail_label'] = ( ! empty( $new_instance['mail_label'] ) ) ? strip_tags( $new_instance['mail_label'] ) : '';
			$instance['email_address'] = ( ! empty( $new_instance['email_address'] ) ) ? strip_tags( $new_instance['email_address'] ) : '';
			$instance['email_address_2'] = ( ! empty( $new_instance['email_address_2'] ) ) ? strip_tags( $new_instance['email_address_2'] ) : '';

			// phone
			$instance['phone_label'] = ( ! empty( $new_instance['phone_label'] ) ) ? strip_tags( $new_instance['phone_label'] ) : '';
			$instance['phone_number'] = ( ! empty( $new_instance['phone_number'] ) ) ? strip_tags( $new_instance['phone_number'] ) : '';
			$instance['phone_number_2'] = ( ! empty( $new_instance['phone_number_2'] ) ) ? strip_tags( $new_instance['phone_number_2'] ) : '';


			return $instance;
		}
	}