<?php

$styling_tab = esc_html__( 'Styling', 'atomlab' );

vc_remove_param( 'vc_row_inner', 'css' );
vc_remove_param( 'vc_row_inner', 'gap' );

vc_add_params( 'vc_row_inner', array_merge( Atomlab_VC::get_vc_spacing_tab(), array(
	array(
		'heading'     => esc_html__( 'Layer Index', 'atomlab' ),
		'description' => esc_html__( 'When content in row or row has negative margin then this controls layer ( z-index ) of row', 'atomlab' ),
		'type'        => 'number',
		'param_name'  => 'layer_index',
		'min'         => 0,
		'max'         => 100,
		'step'        => 1,
	),
	array(
		'heading'     => esc_html__( 'Gutter', 'atomlab' ),
		'type'        => 'number_responsive',
		'param_name'  => 'gutter',
		'min'         => 0,
		'max'         => 100,
		'step'        => 2,
		'suffix'      => 'px',
		'media_query' => array(
			'lg' => '',
			'md' => '',
			'sm' => '',
			'xs' => '',
		),
	),
	array(
		'heading'     => esc_html__( 'Width', 'atomlab' ),
		'description' => esc_html__( 'Input the width for this row.', 'atomlab' ),
		'type'        => 'textfield',
		'param_name'  => 'max_width',
	),
	array(
		'heading'    => esc_html__( 'Inner row Alignment Large Device', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'content_alignment',
		'value'      => array(
			esc_html__( 'Left', 'atomlab' )   => 'left',
			esc_html__( 'Center', 'atomlab' ) => 'center',
			esc_html__( 'Right', 'atomlab' )  => 'right',
		),
		'std'        => 'left',
	),
	array(
		'heading'    => esc_html__( 'Inner row Alignment Medium Device', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'md_content_alignment',
		'value'      => array(
			esc_html__( 'Inherit from larger device', 'atomlab' ) => '',
			esc_html__( 'Left', 'atomlab' )                       => 'left',
			esc_html__( 'Center', 'atomlab' )                     => 'center',
			esc_html__( 'Right', 'atomlab' )                      => 'right',
		),
		'std'        => '',
	),
	array(
		'heading'    => esc_html__( 'Inner row Alignment Small Device', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'sm_content_alignment',
		'value'      => array(
			esc_html__( 'Inherit from larger device', 'atomlab' ) => '',
			esc_html__( 'Left', 'atomlab' )                       => 'left',
			esc_html__( 'Center', 'atomlab' )                     => 'center',
			esc_html__( 'Right', 'atomlab' )                      => 'right',
		),
		'std'        => '',
	),
	array(
		'heading'    => esc_html__( 'Inner row Alignment Extra Small Device', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'xs_content_alignment',
		'value'      => array(
			esc_html__( 'Inherit from larger device', 'atomlab' ) => '',
			esc_html__( 'Left', 'atomlab' )                       => 'left',
			esc_html__( 'Center', 'atomlab' )                     => 'center',
			esc_html__( 'Right', 'atomlab' )                      => 'right',
		),
		'std'        => '',
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Border Radius', 'atomlab' ),
		'description' => esc_html__( 'Ex: 5px or 50%', 'atomlab' ),
		'type'        => 'textfield',
		'param_name'  => 'border_radius',
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Box Shadow', 'atomlab' ),
		'description' => esc_html__( 'Ex: 0 20px 30px #ccc', 'atomlab' ),
		'type'        => 'textfield',
		'param_name'  => 'box_shadow',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Row Effect', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'effect',
		'value'      => array(
			esc_html__( 'None', 'atomlab' )    => '',
			esc_html__( 'Firefly', 'atomlab' ) => 'firefly',
		),
		'std'        => '',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Firefly Color', 'atomlab' ),
		'type'             => 'colorpicker',
		'param_name'       => 'firefly_color',
		'dependency'       => array(
			'element' => 'effect',
			'value'   => array( 'firefly' ),
		),
		'std'              => '#fff',
		'edit_field_class' => 'vc_col-sm-3',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Firely Total', 'atomlab' ),
		'type'             => 'number',
		'param_name'       => 'firefly_total',
		'value'            => 100,
		'min'              => 0,
		'max'              => 100,
		'step'             => 1,
		'suffix'           => '%',
		'std'              => 30,
		'dependency'       => array(
			'element' => 'effect',
			'value'   => array( 'firefly' ),
		),
		'edit_field_class' => 'vc_col-sm-3',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Firely Min Width', 'atomlab' ),
		'type'             => 'number',
		'param_name'       => 'firefly_min_size',
		'value'            => 100,
		'min'              => 0,
		'max'              => 100,
		'step'             => 1,
		'suffix'           => '%',
		'std'              => 1,
		'dependency'       => array(
			'element' => 'effect',
			'value'   => array( 'firefly' ),
		),
		'edit_field_class' => 'vc_col-sm-3',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Firely Max Width', 'atomlab' ),
		'type'             => 'number',
		'param_name'       => 'firefly_max_size',
		'value'            => 100,
		'min'              => 0,
		'max'              => 100,
		'step'             => 1,
		'suffix'           => '%',
		'std'              => 3,
		'dependency'       => array(
			'element' => 'effect',
			'value'   => array( 'firefly' ),
		),
		'edit_field_class' => 'vc_col-sm-3',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Color', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'background_color',
		'value'      => array(
			esc_html__( 'None', 'atomlab' )            => '',
			esc_html__( 'Primary Color', 'atomlab' )   => 'primary',
			esc_html__( 'Secondary Color', 'atomlab' ) => 'secondary',
			esc_html__( 'Custom Color', 'atomlab' )    => 'custom',
			esc_html__( 'Gradient Color', 'atomlab' )  => 'gradient',
		),
		'std'        => '',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Custom Background Color', 'atomlab' ),
		'type'       => 'colorpicker',
		'param_name' => 'custom_background_color',
		'dependency' => array(
			'element' => 'background_color',
			'value'   => array( 'custom' ),
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Gradient', 'atomlab' ),
		'type'       => 'gradient',
		'param_name' => 'background_gradient',
		'dependency' => array(
			'element' => 'background_color',
			'value'   => array( 'gradient' ),
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Image', 'atomlab' ),
		'type'       => 'attach_image',
		'param_name' => 'background_image',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Hide Background Image', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'hide_background_image',
		'value'      => array(
			esc_html__( 'Always show', 'atomlab' )             => '',
			esc_html__( 'Medium Device Down', 'atomlab' )      => 'md',
			esc_html__( 'Small Device Down', 'atomlab' )       => 'sm',
			esc_html__( 'Extra Small Device Down', 'atomlab' ) => 'xs',
		),
		'std'        => '',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Repeat', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'background_repeat',
		'value'      => array(
			esc_html__( 'No repeat', 'atomlab' )         => 'no-repeat',
			esc_html__( 'Tile', 'atomlab' )              => 'repeat',
			esc_html__( 'Tile Horizontally', 'atomlab' ) => 'repeat-x',
			esc_html__( 'Tile Vertically', 'atomlab' )   => 'repeat-y',
		),
		'std'        => 'no-repeat',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Size', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'background_size',
		'value'      => array(
			esc_html__( 'Auto', 'atomlab' )    => 'auto',
			esc_html__( 'Cover', 'atomlab' )   => 'cover',
			esc_html__( 'Contain', 'atomlab' ) => 'contain',
		),
		'std'        => 'cover',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Background Position', 'atomlab' ),
		'description' => esc_html__( 'Ex: left center', 'atomlab' ),
		'type'        => 'textfield',
		'param_name'  => 'background_position',
		'dependency'  => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Scroll Effect', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'background_attachment',
		'value'      => array(
			esc_html__( 'Move with the content', 'atomlab' ) => 'scroll',
			esc_html__( 'Fixed at its position', 'atomlab' ) => 'fixed',
			esc_html__( 'Marque', 'atomlab' )                => 'marque',
		),
		'std'        => 'scroll',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Marque Direction', 'atomlab' ),
		'type'       => 'dropdown',
		'param_name' => 'marque_direction',
		'value'      => array(
			esc_html__( 'To Left', 'atomlab' )  => 'to-left',
			esc_html__( 'To Right', 'atomlab' ) => 'to-right',
		),
		'std'        => 'to-right',
		'dependency' => array(
			'element' => 'background_attachment',
			'value'   => 'marque',
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Marque Pause On Hover.', 'atomlab' ),
		'type'       => 'checkbox',
		'param_name' => 'marque_pause_on_hover',
		'value'      => array(
			esc_html__( 'Yes', 'atomlab' ) => '1',
		),
		'dependency' => array(
			'element' => 'background_attachment',
			'value'   => 'marque',
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Background Overlay', 'atomlab' ),
		'description' => esc_html__( 'Choose an overlay background color.', 'atomlab' ),
		'type'        => 'dropdown',
		'param_name'  => 'overlay_background',
		'value'       => array(
			esc_html__( 'None', 'atomlab' )            => '',
			esc_html__( 'Primary Color', 'atomlab' )   => 'primary',
			esc_html__( 'Secondary Color', 'atomlab' ) => 'secondary',
			esc_html__( 'Custom Color', 'atomlab' )    => 'overlay_custom_background',
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Custom Background Overlay', 'atomlab' ),
		'description' => esc_html__( 'Choose an custom background color overlay.', 'atomlab' ),
		'type'        => 'colorpicker',
		'param_name'  => 'overlay_custom_background',
		'std'         => '#000000',
		'dependency'  => array( 'element' => 'overlay_background', 'value' => array( 'overlay_custom_background' ) ),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Opacity', 'atomlab' ),
		'type'       => 'number',
		'param_name' => 'overlay_opacity',
		'value'      => 100,
		'min'        => 0,
		'max'        => 100,
		'step'       => 1,
		'suffix'     => '%',
		'std'        => 80,
		'dependency' => array(
			'element'   => 'overlay_background',
			'not_empty' => true,
		),
	),
) ) );