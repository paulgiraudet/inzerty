<?php
if ( ! function_exists( 'spiceb_innofit_about_customize_register' ) ) :
function spiceb_innofit_about_customize_register($wp_customize){
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

/* About section */
	$wp_customize->add_section( 'about_section' , array(
		'title'      => __('About settings', 'spicebox'),
		'panel'  => 'section_settings',
		'priority'   => 3,
	) );
		
		
		// Enable service more btn
		$wp_customize->add_setting( 'home_about_section_enabled' , array( 'default' => 'on') );
		$wp_customize->add_control(	'home_about_section_enabled' , array(
				'label'    => __( 'Enable About on homepage', 'spicebox' ),
				'section'  => 'about_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=>__('ON', 'spicebox'),
					'off'=>__('OFF', 'spicebox')
				)
		));
	
	//About section content
		if ( class_exists( 'Innofit_Page_Editor' ) ) {
		$about_image = SPICEB_PLUGIN_URL.'inc/innofit/images/about/about.jpg';
		$default = __('	<div class="row v-center">
						<div class="col-md-5 col-sm-5 col-xs-12">	
							<figure class="about-thumbnail mbottom-50">	
								<img src="'.$about_image.'" alt="About">
							</figure>
						</div>
						
						<div class="col-md-7 col-sm-7 col-xs-12">
							<div class="about-content mbottom-50">
								<h6 class="entry-subtitle">Welcome to <span class="text-default">Innofit</span></h6>
								<h1 class="entry-title">We have the right solutions</h1>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totame rems aperiam, eaque ipsa quae ab illo inventore veritatis quasi architecto beatae vitaes dicta sunt explicabo. Nemo enim ipsam voluptatem.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
								<div class="ptop-15"><a href="#" class="btn-ex-small btn-animate border">Our Story</a></div>
							</div>
						</div>
					</div>
					','spicebox');
		$wp_customize->add_setting(
			'about_section_content', array(
				'default'           => $default,
				'sanitize_callback' => 'wp_kses_post',
				'transport'         => $selective_refresh,
			)
		);

		$wp_customize->add_control(
			new Innofit_Page_Editor(
				$wp_customize, 'about_section_content', array(
					'label'    => esc_html__( 'About content', 'spicebox' ),
					'section'  => 'about_section',
					'priority' => 10,
					'needsync' => true,
				)
			)
		);
	}
	
	
	//About image
	$wp_customize->add_setting( 'innofit_about_section_background',array('default' => ''));
	
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'innofit_about_section_background',
			array(
				'label' => __('Image','spasalon'),
				'settings' =>'innofit_about_section_background',
				'section' => 'about_section',
				'type' => 'upload',
			)
		)
	);
	
}

add_action( 'customize_register', 'spiceb_innofit_about_customize_register' );
endif;


/**
 * Add selective refresh for Front page section section controls.
 */
function spiceb_innofit_register_home_about_section_partials( $wp_customize ){

	$wp_customize->selective_refresh->add_partial( 'about_section_content', array(
		'selector'            => '.about .entry-subtitle',
		'settings'            => 'about_section_content',
		
	) );
	
}

add_action( 'customize_register', 'spiceb_innofit_register_home_about_section_partials' );


function innofit_home_about_content_render_callback(){
	return get_theme_mod( 'about_section_content' );
}
?>