<?php
$section  = 'blog_archive';
$priority = 1;
$prefix   = 'blog_archive_';

Atomlab_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => $prefix . 'style',
	'label'       => esc_html__( 'Blog Style', 'atomlab' ),
	'description' => esc_html__( 'Select blog style that display for archive pages.', 'atomlab' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__( 'Large Image', 'atomlab' ),
		'2' => esc_html__( 'Grid Classic', 'atomlab' ),
		'3' => esc_html__( 'Grid Masonry', 'atomlab' ),
	),
) );

Atomlab_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => $prefix . 'columns',
	'label'       => esc_html__( 'Grid Layout Columns', 'atomlab' ),
	'description' => esc_html__( 'Select columns for blog.', 'atomlab' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '2',
	'choices'     => array(
		'2' => esc_html__( '2 Columns', 'atomlab' ),
		'3' => esc_html__( '3 Columns', 'atomlab' ),
		'4' => esc_html__( '4 Columns', 'atomlab' ),
	),
) );
