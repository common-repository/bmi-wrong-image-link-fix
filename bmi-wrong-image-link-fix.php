<?php
/*
Plugin Name: BMI Wrong Image Link Fix
Plugin URI: http://www.websupporter.net/bmi/
Description: If you're Image Sourcelinks lead to a wrong address like http://1.1.1.1/bmi/[my-url]/, this Plugin will help you to restore the right addresses
Version: 0.2
Author: Websupporter
Author URI: http://www.websupporter.net/
*/

/*  Copyright 2014  David Remer (email : webmaster@websupporter.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	add_action( 'save_post', 'bmi_remove' );	
	function bmi_remove( $post_id ) {
		/*
		 * These are the known IP-Addresses, which ByteMobile Inc. uses.
		 * Maybe it needs to be extended.
		 */
		$rewrite_bmi = array(
								'1.1.1.1/bmi/',
								'1.1.1.2/bmi/',
								'1.1.1.3/bmi/',
								'1.1.1.4/bmi/',
								'1.1.1.5/bmi/',
								'1.2.3.4/bmi/',
								'1.2.3.9/bmi/',
								'1.2.3.10/bmi/',
								'1.2.3.11/bmi/',
					);
		$rewrite = array();
		foreach( $rewrite_bmi as $key => $val ) {
			$rewrite_bmi[ $key ] = '^' . preg_quote( 'src="http://' . $val ) . '^';
			$rewrite[] = 'src="http://';
		}

		/*
		 * Lets get the post
		 */
		$current_post = get_post( $post_id );
		
		/*
		 * We replace post_content and excerpt with the replaced content
		 */
		$content = preg_replace( $rewrite_bmi, $rewrite, $current_post->post_content );
		$excerpt = preg_replace( $rewrite_bmi, $rewrite, $current_post->post_excerpt );
		
		/*
		 * We remove the action, in order to avoid infinite loop, update the post and rehook the function
		 */
		remove_action( 'save_post', 'bmi_remove' );
		wp_update_post( array( 
				'ID' => $post_id, 
				'post_content' => $content, 
				'post_excerpt' => $excerpt
			) 
		);
		add_action( 'save_post', 'bmi_remove' );
	}
?>