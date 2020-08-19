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
		include dirname( __FILE__ ) . '/ui/ui-basic.php';
	} catch (Exception $e) {}
	$checkbox_c_ui = new FrontUI(2);
	$ui_str =  $checkbox_c_ui->render();

	$domContent = new DOMDocument();
	$domContent->loadHTML($content);
	// get all inputs, alter sub/unsub ones, make SVG elem. for them
	$inputs = $domContent->getElementsByTagName('input');

	// Anonymous func. for adding attes from an a setup. array
	$addAttrs = function($attrs_array, $element, &$domContent)
	{
		$t_attr;
		foreach($attrs_array as $a) {
			// $domContent as reference
			$t_attr = $domContent->createAttribute($a['name']);
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
			$doHide = '';
			$attr_class_sel = 'rb-box';
			$attr_class_unsel = 'rb-check';
			if($input->getAttribute('value') == 'subscribe') {
				$svg_attrs_ary = array_merge(UIViews::SVG_CLASS_RB_SELECTED, UIViews::SVG_ATTRS);
				$attr_d_val = UIViews::CHECKBOX_BOX_D_VAL;
			}else{
				$svg_attrs_ary = array_merge(UIViews::SVG_CLASS_RB_UNSELECTED, UIViews::SVG_ATTRS);
				$attr_d_val = UIViews::CHECKBOX_CHECK_D_VAl;
				$doHide = ' hide-svg';
			}
			$evg_e = $domContent->createElement('svg'); 
			$evg_e = $addAttrs($svg_attrs_ary, $evg_e, $domContent);
			

			// create PATH el. and path attrs. to add to first
			$path = UIViews::make_checkbox_path_element($domContent, $attr_class_sel, UIViews::CHECKBOX_BOX_D_VAL);
			$evg_e->appendChild($path);

			$path = UIViews::make_checkbox_path_element($domContent, $attr_class_unsel.$doHide, UIViews::CHECKBOX_CHECK_D_VAl);
			$evg_e->appendChild($path);
				
			/** */
			// insert before first child (input radio btn)
			$firstSibling = $input->parentNode->firstChild;
			$input->parentNode->insertBefore( $evg_e, $firstSibling );


			// add attrs to existing INPUT element (hide it etc.)
			$attribute = $domContent->createAttribute('class');
			$attribute->value = 'cf7-cbrb-alt';
			$input->appendChild($attribute);


			//move span out of the label
			//hide original and add oen affter the svg
			// $parentLabel = $input->parentNode;
			// $removeSpan = $input->nextSibling;
			// $oldSpan = $parentLabel->removeChild($removeSpan);
			// $evg_e->parentNode->appendChild($oldSpan);
		}
	}
	return $domContent->saveHTML();
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
//TODO add click on text too
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