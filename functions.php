<?php

// Initialize Startbox (custom theme options will break without this)
require_once( get_template_directory() . '/includes/functions/startbox.php' );
Startbox::init();

// Load default scripts and styles
function child_scripts_and_styles() {
	wp_enqueue_style( 'reset' );
	wp_enqueue_style( 'typography' );
	wp_enqueue_style( 'images' );
	wp_enqueue_style( 'comments' );
	wp_enqueue_style( 'colorbox' );
	wp_enqueue_style( 'shortcodes' );
	wp_enqueue_style( 'startbox' );
	wp_enqueue_script( 'hovercards' );
	wp_enqueue_script( 'startbox' );
}
add_action( 'template_redirect', 'child_scripts_and_styles', 9 );

/**
 * Sample Theme Settings Class -- activate by uncommenting sb_register_settings() at bottom (line 96)
 *
 * This example below extends the base sb_settings class. Follow the link below for help
 * with using this class.
 *
 * @since Startbox 2.4.2
 * @link http://docs.wpstartbox.com/child-themes/theme-options/ Using Theme Options
 *
 * @uses sb_get_option()
 * @uses sb_add_option()
 * @uses add_meta_box()
 * @uses add_action()
 *
 * @param string $name Name of the options panel for use as metabox title
 * @param string $slug Nice-name of options panel, used for identifying when creating metabox
 * @param string $location The column in which to add the metabox, primary or secondary. Default is secondary
 * @param string $priority Priority for displaying the metabox, high, default or low. Default is default.
 * @param array $options The options to be added.
 */
class my_new_settings extends sb_settings {

    public $name = 'My New Settings'; 	// The title for your options panel
    public $slug = 'new_settings'; 		// A unique, nice-name for registering everything
    public $location = 'primary'; 		// The column in which the panel should appear (primary/secondary)
    public $priority = 'default'; 		// Set the priority for ordering this panel (high/low/default)
    public $options = array( 			// Your multi-dimensional array() of options, see http://docs.wpstartbox.com/child-themes/theme-options/
			'sample_text' => array(
					'type'		=> 'text',				// The type of option you're creating
					'label'		=> 'A Textbox',			// A label indicating what this option is/does
					'size'		=> 'medium',			// The size of this option (small, medium, large), only for text/select
					'align'		=> 'left',				// Option alignment (left/right), default is left
					'desc'		=> 'Brief description.',// A brief description
					'default'	=> 'Some Text.'			// Default value
				),
			'sample_textarea' => array(
					'type'		=> 'textarea',
					'label'		=> 'A textarea'
				),
			'sample_select' => array(
					'type'		=> 'select',
					'label'		=> 'Select Box',
					'options'	=> array(				// Instead of an array, you could also use 'categories', 'posts' or 'pages'
							'opt1' => 'Option 1',
							'opt2' => 'Option 2',
							'opt3' => 'Option 3'
						),
					'default'	=> 'opt3'
				),
			'sample_color' => array(
					'type'		=> 'color',
					'label'		=> 'Color Picker',
					'default'	=> '#ffffff'
				),
			'sample_upload' => array(
					'type'		=> 'upload',
					'label'		=> 'An Image Uploader'
				)
		);

	// Use this method to control output. Note: you can add as many other functions as you need.
	public function output() {}

	// Use this method to hook all your functions somewhere. Uncomment the line below to hook 'output' to 'sb_header'.
	public function hooks() {
		// add_action( 'sb_header', array( $this, 'output' ) ); // 'output' is the name of the function we want to add from above.
	}

}
// sb_register_settings('my_new_settings');

?>