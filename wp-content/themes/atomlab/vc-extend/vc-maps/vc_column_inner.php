<?php

$styling_tab = esc_html__( 'Styling', 'atomlab' );

vc_remove_param( 'vc_column_inner', 'css' );

vc_add_params( 'vc_column_inner', array_merge( Atomlab_VC::get_vc_spacing_tab(), array(
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
		),
		'std'        => 'scroll',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
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
		'dependency'  => array(
			'element' => 'overlay_background',
			'value'   => array( 'overlay_custom_background' ),
		),
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
	array(
		'heading'     => esc_html__( 'Layer Index', 'atomlab' ),
		'description' => esc_html__( 'Controls z-index of this column', 'atomlab' ),
		'type'        => 'number',
		'param_name'  => 'layer_index',
		'min'         => 0,
		'max'         => 100,
		'step'        => 1,
	),
	array(
		'heading'     => esc_html__( 'Column Order', 'atomlab' ),
		'type'        => 'number_responsive',
		'param_name'  => 'order',
		'min'         => 0,
		'max'         => 100,
		'step'        => 1,
		'media_query' => array(
			'lg' => '',
			'md' => '',
			'sm' => '',
			'xs' => '',
		),
	),
	array(
		'heading'     => esc_html__( 'Width', 'atomlab' ),
		'description' => esc_html__( 'Controls the width of the column on large device. For Ex: 570px.', 'atomlab' ),
		'type'        => 'textfield',
		'param_name'  => 'max_width',
	),
	array(
		'heading'    => esc_html__( 'Content Alignment Large Device', 'atomlab' ),
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
		'heading'    => esc_html__( 'Content Alignment Medium Device', 'atomlab' ),
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
		'heading'    => esc_html__( 'Content Alignment Small Device', 'atomlab' ),
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
		'heading'    => esc_html__( 'Content Alignment Extra Small Device', 'atomlab' ),
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
) ) );
