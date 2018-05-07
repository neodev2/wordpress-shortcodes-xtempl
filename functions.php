function shortcode_xtempl($atts){
	
	$_atts = shortcode_atts(array(
	    'id' => 'default value'
	), $atts);
	
	$post = get_page_by_path($_atts['id']);
	
	$content = $post->post_content; // supposed to contain visual-editor's shortcodes
	//echo '<pre>', print_r( $content ), '</pre>';
	
	//return do_shortcode($content); // outputs incorrectly: e.g. no <br>s
	return apply_filters('the_content', $content);
	
}

function register_shortcodes_xtempl(){
	
	add_shortcode('xtempl', 'shortcode_xtempl');
	
}
add_action('init', 'register_shortcodes_xtempl');
