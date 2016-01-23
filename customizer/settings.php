<?php
/**
 * Register customizer settings.
 */
function bc_customize_register( $wp_customize ) {

	/**
	 * Custom class for textarea
	*/
	class BC_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
	 
		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}

	/* Add General setting section on customizer */
	$wp_customize->add_section('bc_general_section', array(
		'title'       => __( 'General settings', 'bc-lite' ),
	  	'priority'    => 30,
	  	'description' => __('Section for general settings','bc-lite'),
	));

	/* image	*/
	$wp_customize->add_setting('bc_image', array('sanitize_callback' => 'esc_url_raw'));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bc_image', array(
	  	'label'    => __('Image', 'bc-lite'),
	  	'section'  => 'bc_general_section',
	  	'settings' => 'bc_image',
		'priority'    => 1,
	)));

	/* input */
	$wp_customize->add_setting('bc_input');
	$wp_customize->add_control('bc_input', array(
		'label'    => __('Input', 'bc-lite'),
	  	'section'  => 'bc_general_section',
	  	'settings' => 'bc_input',
		'priority'    => 2,
	));

	/* textarea */
	$wp_customize->add_setting('bc_textarea');
    $wp_customize->add_control(new BC_Customize_Textarea_Control($wp_customize, 'bc_textarea', array(
		'label'   => __('Textarea', 'bc-lite'),
		'section' => 'bc_general_section',
		'settings'   => 'bc_textarea',
		'priority' => 3
    )));
}

add_action( 'customize_register', 'bc_customize_register' );