<?php

class WPBakeryShortCode_TM_Timeline extends WPBakeryShortCode {

}

vc_map( array(
	'name'                      => esc_html__( 'Timeline', 'atomlab' ),
	'base'                      => 'tm_timeline',
	'category'                  => ATOMLAB_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-timeline',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'group'      => esc_html__( 'Items', 'atomlab' ),
			'heading'    => esc_html__( 'Items', 'atomlab' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'    => esc_html__( 'Image', 'atomlab' ),
					'type'       => 'attach_image',
					'param_name' => 'image',
				),
				array(
					'heading'     => esc_html__( 'Title', 'atomlab' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Time', 'atomlab' ),
					'type'       => 'textfield',
					'param_name' => 'time',
				),
				array(
					'heading'    => esc_html__( 'Text', 'atomlab' ),
					'type'       => 'textarea',
					'param_name' => 'text',
				),
			),

		),
	),
) );
