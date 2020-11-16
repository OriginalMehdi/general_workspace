<?php
$section  = 'general';
$priority = 1;
$prefix   = 'general_';

Atomlab_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'maintenance_page',
	'label'    => esc_html__( 'Page', 'atomlab' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'choices'  => Atomlab_Maintenance::get_maintenance_pages(),
) );
