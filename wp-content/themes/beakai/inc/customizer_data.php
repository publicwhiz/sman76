<?php
/** 
 * beakai Customizer data
 */
function _customizer_data( $data ) {
	return array(
		'panel' => array ( 
			'id' => 'beakai',
			'name' => esc_html__('Beakai Customizer','beakai'),
			'priority' => 10,
			'section' => array(
				'header_setting' => array(
					'name' => esc_html__( 'Header Topbar Setting', 'beakai' ),
					'priority' => 10,
					'fields' => array(
						array(
							'name' => esc_html__( 'Topbar Swicher', 'beakai' ),
							'id' => 'beakai_topbar_switch',
							'default' => true,
							'type' => 'switch',
							'transport'	=> 'refresh'
						),		
						// Show Search						
						array(
							'name' => esc_html__( 'Show Search', 'beakai' ),
							'id' => 'beakai_show_header_search',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),						
						// Show Language
						array(
							'name' => esc_html__( 'Show Language', 'beakai' ),
							'id' => 'beakai_header_lang',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						// Show Cart
						array(
							'name' => esc_html__( 'Show Cart', 'beakai' ),
							'id' => 'beakai_cart_hide',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						// topbar left
						array(
							'name' => esc_html__( 'Mail ID', 'beakai' ),
							'id' => 'beakai_mail_id',
							'default' => esc_html__('info@example.com','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// Phone 
						array(
							'name' => esc_html__( 'Phone Number', 'beakai' ),
							'id' => 'beakai_phone',
							'default' => esc_html__('+1 800 833 9780','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// address
						array(
							'name' => esc_html__( 'Address', 'beakai' ),
							'id' => 'beakai_address',
							'default' => esc_html__('58 Howard Street #2 San Francisco','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Address Top', 'beakai' ),
							'id' => 'beakai_address_top',
							'default' => esc_html__('58 Howard Street New','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Address Bottom', 'beakai' ),
							'id' => 'beakai_address_bottom',
							'default' => esc_html__('San Francisco','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

						// Support 
						array(
							'name' => esc_html__( 'Support Label', 'beakai' ),
							'id' => 'beakai_support_label',
							'default' => esc_html__('Online 24/7','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Support Phone', 'beakai' ),
							'id' => 'beakai_support_phone',
							'default' => esc_html__('+444 32152','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),								

						// cta
						array(
							'name' => esc_html__( 'Header Right', 'beakai' ),
							'id' => 'beakai_header_right',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),

						// Show Button						
						array(
							'name' => esc_html__( 'Show Button', 'beakai' ),
							'id' => 'beakai_show_button',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Text', 'beakai' ),
							'id' => 'beakai_button_text',
							'default' => esc_html__('Get A Quote','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Text RTL', 'beakai' ),
							'id' => 'beakai_button_text_rtl',
							'default' => esc_html__('Get A Quote','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Button Link', 'beakai' ),
							'id' => 'beakai_button_link',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
					) 
				),
				'header_social_setting'=> array(
					'name'=> esc_html__('Header Social','beakai'),
					'priority'=> 11,
					'description' => esc_html__('To hide the field please use blank in text field.', 'beakai'),
					'fields'=> array(
						/** social profiles **/
						array(
							'name' => esc_html__( 'Facebook Url', 'beakai' ),
							'id' => 'beakai_topbar_fb_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Twitter Url', 'beakai' ),
							'id' => 'beakai_topbar_twitter_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Instagram Url', 'beakai' ),
							'id' => 'beakai_topbar_instagram_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Linkedin Url', 'beakai' ),
							'id' => 'beakai_topbar_linkedin_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Youtube Url', 'beakai' ),
							'id' => 'beakai_topbar_youtube_url',
							'default' => '#',
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						
					)
				),
				'header_main_setting' => array(
					'name' => esc_html__( 'Header Setting', 'beakai' ),
					'priority' => 12,
					'fields' => array(
						array(
							'name' => esc_html__( 'Choose Header Style', 'beakai' ),
							'id' => 'choose_default_header',
							'type'     => 'select',
							'choices'  => array(
								'header-style-1' => esc_html__( 'Header Style 1', 'beakai' ),
								'header-style-2' => esc_html__( 'Header Style 2', 'beakai' ),
								'header-style-3' => esc_html__( 'Header Style 3', 'beakai' ),
							),
							'default' => 'header-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Header Logo', 'beakai' ),
							'id' => 'logo',
							'default' => get_template_directory_uri() . '/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header White Logo', 'beakai' ),
							'id' => 'seconday_logo',
							'default' => get_template_directory_uri() . '/img/logo/logo-light.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Header Sticky Logo', 'beakai' ),
							'id' => 'logo_sticky',
							'default' => get_template_directory_uri() . '/img/logo/logo.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Favicon', 'beakai' ),
							'id' => 'favicon_url',
							'default' => get_template_directory_uri() . '/img/logo/favicon.png',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Show Sticky', 'beakai' ),
							'id' => 'sticky_header_switch',
							'default' => 0,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
					) 
				),	
				'page_title_setting'=> array(
					'name'=> esc_html__('Breadcrumb Setting','beakai'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name'=>esc_html__('Breadcrumb BG Color','beakai'),
							'id'=>'beakai_breadcrumb_bg_color',
							'default'=> esc_html__('#f4f9fc','beakai'),
							'transport'	=> 'refresh'  
						),						
						array(
							'name'=>esc_html__('Breadcrumb Padding Top','beakai'),
							'id'=>'beakai_breadcrumb_spacing',
							'default'=> esc_html__('160px','beakai'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),						
						array(
							'name'=>esc_html__('Breadcrumb Bottom Top','beakai'),
							'id'=>'beakai_breadcrumb_bottom_spacing',
							'default'=> esc_html__('160px','beakai'),
							'transport'	=> 'refresh',  
							'type' => 'text',
						),
						array(
							'name' => esc_html__( 'Breadcrumb Background Image', 'beakai' ),
							'id' => 'breadcrumb_bg_img',
							'default' => get_template_directory_uri() . '/img/bg/page-title.jpg',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Breadcrumb Archive', 'beakai' ),
							'id' => 'breadcrumb_archive',
							'default' => esc_html__('Archive for category','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb Search', 'beakai' ),
							'id' => 'breadcrumb_search',
							'default' => esc_html__('Search results for','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),	
						array(
							'name' => esc_html__( 'Breadcrumb tagged', 'beakai' ),
							'id' => 'breadcrumb_post_tags',
							'default' => esc_html__('Posts tagged','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb posted by', 'beakai' ),
							'id' => 'breadcrumb_artitle_post_by',
							'default' => esc_html__('Articles posted by','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page Not Found', 'beakai' ),
							'id' => 'breadcrumb_404',
							'default' => esc_html__('Page Not Found','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),		
						array(
							'name' => esc_html__( 'Breadcrumb Page', 'beakai' ),
							'id' => 'breadcrumb_page',
							'default' => esc_html__('Page','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),				
						array(
							'name' => esc_html__( 'Breadcrumb Home', 'beakai' ),
							'id' => 'breadcrumb_home',
							'default' => esc_html__('Home','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),					
					)
				),
				'blog_setting'=> array(
					'name'=> esc_html__('Blog Setting','beakai'),
					'priority'=> 14,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Show Blog BTN', 'beakai' ),
							'id' => 'beakai_blog_btn_switch',
							'default' => 1,
							'type' => 'switch',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text', 'beakai' ),
							'id' => 'beakai_blog_btn',
							'default' => esc_html__('Read More','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Blog Button text RTL', 'beakai' ),
							'id' => 'beakai_blog_btn_rtl',
							'default' => esc_html__('Read More','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),													
						array(
							'name' => esc_html__( 'Blog Title', 'beakai' ),
							'id' => 'breadcrumb_blog_title',
							'default' => esc_html__('Blog','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Blog Details Title', 'beakai' ),
							'id' => 'breadcrumb_blog_title_details',
							'default' => esc_html__('Blog Details','beakai'),
							'type' => 'text',
							'transport'	=> 'refresh' 
						),

					)
				),
				'beakai_footer_setting'=> array(
					'name'=> esc_html__('Footer Setting','beakai'),
					'priority'=> 16,
					'fields'=> array(
						array(
							'name' => esc_html__( 'Choose Footer Style', 'beakai' ),
							'id' => 'choose_default_footer',
							'type'     => 'select',
							'choices'  => array(
								'footer-style-1' => esc_html__( 'Footer Style 1', 'beakai' ),
								'footer-style-2' => esc_html__( 'Footer Style 2', 'beakai' ),
								'footer-style-3' => esc_html__( 'Footer Style 3', 'beakai' ),
							),
							'default' => 'footer-style-1',
							'transport'	=> 'refresh'
						),
						array(
							'name' => esc_html__( 'Widget Number', 'beakai' ),
							'id' => 'footer_widget_number',
							'type'     => 'select',
							'choices'  => array(
								'4' => esc_html__( 'Widget Number 4', 'beakai' ),
								'3' => esc_html__( 'Widget Number 3', 'beakai' ),
								'2' => esc_html__( 'Widget Number 2', 'beakai' ),
							),
							'default' => '4',
							'transport'	=> 'refresh'
						),

						array(
							'name'=>esc_html__('Footer Style 2 On/Off','beakai'),
							'id'=>'footer_style_2_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Footer Style 3 On/Off','beakai'),
							'id'=>'footer_style_3_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),

						array(
							'name' => esc_html__( 'Footer Background Image', 'beakai' ),
							'id' => 'beakai_footer_bg',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),						
						array(
							'name' => esc_html__( 'Footer Logo White', 'beakai' ),
							'id' => 'beakai_footer_logo',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),
						array(
							'name' => esc_html__( 'Footer Logo Black', 'beakai' ),
							'id' => 'beakai_footer_logo_black',
							'default' => '',
							'type' => 'image',
							'transport'	=> 'refresh' 
						),					
						array(
							'name'=>esc_html__('Footer BG Color','beakai'),
							'id'=>'beakai_footer_bg_color',
							'default'=> esc_html__('#f4f9fc','beakai'),
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Copy Right','beakai'),
							'id'=>'beakai_copyright',
							'default'=> esc_html__('Copyright &copy;2020 BasicTheme. All Rights Reserved','beakai'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Copy Right RTL','beakai'),
							'id'=>'beakai_copyright_rtl',
							'default'=> esc_html__('Copyright &copy;2020 BasicTheme. All Rights Reserved','beakai'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Scrollup Hide','beakai'),
							'id'=>'beakai_scrollup_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Footer Style 2 Switch','beakai'),
							'id'=>'footer_style_2_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Footer Style 3 Switch','beakai'),
							'id'=>'footer_style_3_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Footer Social Switch','beakai'),
							'id'=>'footer_social_switch',
							'default'=> false,
							'type'=>'switch',
							'transport'	=> 'refresh'  
						),
					)
				),
				'color_setting'=> array(
					'name'=> esc_html__('Color Setting','beakai'),
					'priority'=> 17,
					'fields'=> array(
						array(
							'name'=>esc_html__('Theme Color','beakai'),
							'id'=>'beakai_color_option',
							'default'=> esc_html__('#086AD8','beakai'),
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Secondary Color','beakai'),
							'id'=>'beakai_sec_color_option',
							'default'=> esc_html__('#d2a98e','beakai'),
							'transport'	=> 'refresh'  
						)													
					)
				),
				'typography_setting'=> array(
					'name'=> esc_html__('Typography Setting','beakai'),
					'priority'=> 18,
					'fields'=> array(
						array(
							'name'=>esc_html__('Google Font URL','beakai'),
							'id'=>'beakai_fonts_url',
							'description' => esc_html__( 'Example: Poppins:200,300,400,500,600,700|Rubik:400,500,700', 'beakai' ),
							'default'=> esc_html__("Poppins:200,300,400,500,600,700|Rubik:400,500,700",'beakai'),
							'transport'	=> 'refresh',
							'type'=>'textarea' 
						),	
						array(
							'name'=>esc_html__('Body Font','beakai'),
							'id'=>'beakai_body_font',
							'default'=> esc_html__("'Rubik', sans-serif",'beakai'),
							'transport'	=> 'refresh',
							'type'=>'text' 
						),							
						array(
							'name'=>esc_html__('Heading Font','beakai'),
							'id'=>'beakai_heading_font',
							'default'=> esc_html__("'Poppins', sans-serif",'beakai'),
							'transport'	=> 'refresh',
							'type'=>'text'  
						),	

						array(
							'name'=>esc_html__('Google Font RTL URL ','beakai'),
							'id'=>'beakai_fonts_url_rtl',
							'description' => esc_html__( 'Example: Poppins:200,300,400,500,600,700|Rubik:400,500,700', 'beakai' ),
							'default'=> esc_html__("Poppins:200,300,400,500,600,700|Rubik:400,500,700",'beakai'),
							'transport'	=> 'refresh',
							'type'=>'textarea' 
						),	
						array(
							'name'=>esc_html__('Body RTL Font','beakai'),
							'id'=>'beakai_body_font_rtl',
							'default'=> esc_html__("'Rubik', sans-serif",'beakai'),
							'transport'	=> 'refresh',
							'type'=>'text' 
						),							
						array(
							'name'=>esc_html__('Heading RTL Font','beakai'),
							'id'=>'beakai_heading_font_rtl',
							'default'=> esc_html__("'Poppins', sans-serif",'beakai'),
							'transport'	=> 'refresh',
							'type'=>'text'  
						),												
					)
				),
				'error_page_setting'=> array(
					'name'=> esc_html__('404 Setting','beakai'),
					'priority'=> 19,
					'fields'=> array(
						array(
							'name'=>esc_html__('400 Text','beakai'),
							'id'=>'beakai_error_404_text',
							'default'=> esc_html__('404','beakai'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('Not Found Title','beakai'),
							'id'=>'beakai_error_title',
							'default'=> esc_html__('Page not found','beakai'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Description Text','beakai'),
							'id'=>'beakai_error_desc',
							'default'=> esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted','beakai'),
							'type'=>'textarea',
							'transport'	=> 'refresh'  
						),
						array(
							'name'=>esc_html__('404 Link Text','beakai'),
							'id'=>'beakai_error_link_text',
							'default'=> esc_html__('Back To Home','beakai'),
							'type'=>'text',
							'transport'	=> 'refresh'  
						)
						
					)
				),
			),
		)
	);

}

add_filter('_customizer_data', '_customizer_data');


