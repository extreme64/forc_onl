<?php
/**
* Plugin Name: Contact Form 7 Chechbox SVG
* Plugin URI: 
* Description: Change "Contact Form 7" chechbox UI with SVG icons
* Version: 1.0
* Author: MastG
* Author URI: https://forwardcreating.com/
**/






// define the mc4wp_form_content callback 
function filter_mc4wp_form_content( $content, $form, $element ) { 

	try {
		include dirname( __FILE__ ) . '/FrontUI.class.php';
	} catch (Exception $e) {}
	$checkbox_c_ui = new FrontUI(2);
	$ui_str =  $checkbox_c_ui->render();

	$dom = new DOMDocument();
	$dom->loadHTML($content);
	// get all inputs, alter sub/unsub ones, make SVG elem. for them
	$inputs = $dom->getElementsByTagName('input');

	// Anonymous func. for adding attes from an a setup. array
	$addAttrs = function($attrs_array, $element, &$dom)
	{
		$t_attr;
		foreach($attrs_array as $a) {
			// $dom as reference
			$t_attr = $dom->createAttribute($a['name']);
			$t_attr->value = $a['value'];
			// add attr. to the element
			$element->appendChild($t_attr);
		}
		// modified element passed back
		return $element;
	};
	
	foreach ($inputs as $input) {
		if($input->getAttribute('value') == 'subscribe' || $input->getAttribute('value') == 'unsubscribe') {
			// create SVG el. and attr. to add to first
			$svg_attrs_ary = array( 
				array("name"=>"class", "value"=>"rc-check"),	
				array("name"=>"version", "value"=>"1.1"), 
				array("name"=>"xmlns", "value"=>"http://www.w3.org/2000/svg"), 
				array("name"=>"xmlns:xlink", "value"=>"http://www.w3.org/1999/xlink"),
				array("name"=>"x", "value"=>"0px"),
				array("name"=>"y", "value"=>"0px"),
				array("name"=>"viewBox", "value"=>"0 0 360 360"),
				array("name"=>"style", "value"=>"enable-background:new 0 0 360 360;"),
				array("name"=>"xml:space", "value"=>"preserve")
			);
			$evg_e = $dom->createElement('svg');
			$evg_e = $addAttrs($svg_attrs_ary, $evg_e, $dom);
			
			// create PATH el. and path attrs. to add to first
			$path = $dom->createElement('path', "");
			$path_attr = $dom->createAttribute('class');
			$path_attr->value = 'cb-check hide-svg';
			$path->appendChild($path_attr);
			$path_attr = $dom->createAttribute('d');
			$path_attr->value = 'M249.844,106.585c-6.116,0-11.864,2.383-16.19,6.71l-84.719,84.857l-22.58-22.578c-4.323-4.324-10.071-6.706-16.185-6.706
c-6.115,0-11.863,2.382-16.187,6.705c-4.323,4.323-6.703,10.071-6.703,16.185c0,6.114,2.38,11.862,6.703,16.184l38.77,38.77
c4.323,4.324,10.071,6.706,16.186,6.706c6.112,0,11.862-2.383,16.19-6.71L266.03,145.662c8.923-8.926,8.922-23.448,0-32.374
C261.707,108.966,255.958,106.585,249.844,106.585z';
			$path->appendChild($path_attr);
			// add this element to SVg as child
			$evg_e->appendChild($path);
			
			// insert before first child (input radio btn)
			$firstSibling = $input->parentNode->firstChild;
			$input->parentNode->insertBefore( $evg_e, $firstSibling );
			// add attrs to existing INPUT element (hide it etc.)
			$attribute = $dom->createAttribute('class');
			$attribute->value = 'some-class';
			$input->appendChild($attribute);
			
		}
	}

	return $dom->saveHTML();

    return $content; 
}; 
         
// add the filter 
add_filter( 'mc4wp_form_content', 'filter_mc4wp_form_content', 10, 3 ); 









remove_action( 'wpcf7_init', 'wpcf7_add_form_tag_checkbox', 10, 0 );
add_action( 'wpcf7_init', 'custom_add_form_tag_datalist' );

function custom_add_form_tag_datalist() {
	wpcf7_add_form_tag( array( 'checkbox', 'checkbox*', 'radio' ),
	'custom_datalist_form_tag_handler',
	array(
		'name-attr' => true,
		'selectable-values' => true,
		'multiple-controls-container' => true,
		)
	);
}

/*TODO: optimised for when to load files */
// include .js for the UI stuff
add_action( 'wp_enqueue_scripts', 'cf7_cbox_alt_scripts' );
function cf7_cbox_alt_scripts() {
	wp_enqueue_script( 'cf7-cbox-alt-mix', plugin_dir_url( __FILE__ ) . '/mix.js', array(), '20151215', true );
}
// include .css for the UI stuff
add_action( 'wp_enqueue_scripts', 'cf7_cbox_alt_styles' );
function cf7_cbox_alt_styles() {
	wp_enqueue_style( 'cf7-cbox-alt-style', plugin_dir_url( __FILE__ ) . '/mix.css' );
}



/* clone of a function from CF7, altered to have SVG code, for the input checkbox element */
function custom_datalist_form_tag_handler( $tag ) {	
    
    
    if ( empty( $tag->name ) ) {
		return '';
	}

	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type );

	if ( $validation_error ) {
		$class .= ' wpcf7-not-valid';
	}

	$label_first = $tag->has_option( 'label_first' );
	$use_label_element = $tag->has_option( 'use_label_element' );
	$exclusive = $tag->has_option( 'exclusive' );
	$free_text = $tag->has_option( 'free_text' );
	$multiple = false;

	if ( 'checkbox' == $tag->basetype ) {
		$multiple = ! $exclusive;
	} else { // radio
		$exclusive = false;
	}

	if ( $exclusive ) {
		$class .= ' wpcf7-exclusive-checkbox';
	}

	$atts = array();

	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();

	$tabindex = $tag->get_option( 'tabindex', 'signed_int', true );

	if ( false !== $tabindex ) {
		$tabindex = (int) $tabindex;
	}

	$html = '';
	$count = 0;

	if ( $data = (array) $tag->get_data_option() ) {
		if ( $free_text ) {
			$tag->values = array_merge(
				array_slice( $tag->values, 0, -1 ),
				array_values( $data ),
				array_slice( $tag->values, -1 ) );
			$tag->labels = array_merge(
				array_slice( $tag->labels, 0, -1 ),
				array_values( $data ),
				array_slice( $tag->labels, -1 ) );
		} else {
			$tag->values = array_merge( $tag->values, array_values( $data ) );
			$tag->labels = array_merge( $tag->labels, array_values( $data ) );
		}
	}

	$values = $tag->values;
	$labels = $tag->labels;

	$default_choice = $tag->get_default_option( null, array(
		'multiple' => $multiple,
	) );

	$hangover = wpcf7_get_hangover( $tag->name, $multiple ? array() : '' );

	foreach ( $values as $key => $value ) {
		if ( $hangover ) {
			$checked = in_array( $value, (array) $hangover, true );
		} else {
			$checked = in_array( $value, (array) $default_choice, true );
		}

		if ( isset( $labels[$key] ) ) {
			$label = $labels[$key];
		} else {
			$label = $value;
		}

		$item_atts = array(
			'type' => $tag->basetype,
			'name' => $tag->name . ( $multiple ? '[]' : '' ),
			'value' => $value,
			'checked' => $checked ? 'checked' : '',
			'tabindex' => false !== $tabindex ? $tabindex : '',
		);

		$item_atts = wpcf7_format_atts( $item_atts );



        try {
            include dirname( __FILE__ ) . '/FrontUI.class.php';
        } catch (Exception $e) {}
        $checkbox_c_ui = new FrontUI(1);
        $ui_str =  $checkbox_c_ui->render();
        
		if ( $label_first ) { // put label first, input last
			$item = sprintf(
				'<span class="sadam1 wpcf7-list-item-label">%1$s</span><input %2$s />',
				esc_html( $label ), $item_atts
			);
		} else {
			$item = sprintf(
                $ui_str.'<input %2$s /><span class="wpcf7-list-item-label">%1$s</span>',
				esc_html( $label ), $item_atts
			);
		}

		if ( $use_label_element ) {
			$item = '<label>' . $item . '</label>';
		}

		if ( false !== $tabindex
		and 0 < $tabindex ) {
			$tabindex += 1;
		}

		$class = 'wpcf7-list-item';
		$count += 1;

		if ( 1 == $count ) {
			$class .= ' first';
		}

		if ( count( $values ) == $count ) { // last round
			$class .= ' last';

			if ( $free_text ) {
				$free_text_name = sprintf(
					'_wpcf7_%1$s_free_text_%2$s', $tag->basetype, $tag->name
				);

				$free_text_atts = array(
					'name' => $free_text_name,
					'class' => 'wpcf7-free-text',
					'tabindex' => false !== $tabindex ? $tabindex : '',
				);

				if ( wpcf7_is_posted()
				and isset( $_POST[$free_text_name] ) ) {
					$free_text_atts['value'] = wp_unslash(
						$_POST[$free_text_name] );
				}

				$free_text_atts = wpcf7_format_atts( $free_text_atts );

				$item .= sprintf( ' <input type="text" %s />', $free_text_atts );

				$class .= ' has-free-text';
			}
		}

		$item = '<span class="' . esc_attr( $class ) . '">' . $item . '</span>';
		$html .= $item;
	}

	$atts = wpcf7_format_atts( $atts );

	$html = sprintf(
		'<span class="wpcf7-form-control-wrap %1$s"><span %2$s>%3$s</span>%4$s</span>',
		sanitize_html_class( $tag->name ), $atts, $html, $validation_error
	);

	return $html;
}