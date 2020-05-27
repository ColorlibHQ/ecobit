<?php
function ecobit_portfolio_metabox( $meta_boxes ) {

	$ecobit_prefix = '_ecobit_';
	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Portfolio Single Metabox', 'ecobit' ),
		'post_types'=> array( 'portfolio' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'         => $ecobit_prefix . 'project_start_time',
				'name'       => esc_html__( 'Project Start Time', 'ecobit' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $ecobit_prefix . 'project_start_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project Start Date', 'ecobit' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'         => $ecobit_prefix . 'project_end_time',
				'name'       => esc_html__( 'Project End Time', 'ecobit' ),
				'type'       => 'time',
				'js_options' => array(
					'stepMinute'      => 10,
					'controlType'     => 'select'
				),
			),
			array(
				'id'    => $ecobit_prefix . 'project_end_date',
				'type'  => 'date',
				'name'  => esc_html__( 'Project End Date', 'ecobit' ),
				'js_options' => array(
					'dateFormat'      => 'DD, M dd, yy   ',
					'showButtonPanel' => false,
				),
			),
			array(
				'id'    => $ecobit_prefix . 'project_location',
				'type'  => 'text',
				'name'  => esc_html__( 'Project Location', 'ecobit' ),
				'placeholder' => esc_html__( 'Project Location', 'ecobit' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'ecobit_portfolio_metabox' );