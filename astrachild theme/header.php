<?php

/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>

<head>
	<?php astra_head_top(); ?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<?php wp_head(); ?>
	<?php astra_head_bottom(); ?>
	<style>
		.top_btn {
			background-image: none;
		}
	</style>
</head>

<body <?php astra_schema_body(); ?> <?php body_class((!is_front_page()) ? 'inner-page' : ''); ?>>
	<?php astra_body_top(); ?>
	<?php wp_body_open(); ?>
	<div>
		<?php
		//astra_header_before(); 

		//astra_header(); 

		//astra_header_after();

		//astra_content_before(); 
		?>
		