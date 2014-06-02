<?php

//
//  Custom Child Theme Functions
//

// I've included a "commented out" sample function below that'll add a home link to your menu
// More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
// http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
//function childtheme_menu_args($args) {
//    $args = array(
//        'show_home' => 'Home',
//        'sort_column' => 'menu_order',
//        'menu_class' => 'menu',
//        'echo' => true
//    );
//	return $args;
//}
//add_filter('wp_page_menu_args','childtheme_menu_args');

// Unleash the power of Thematic's dynamic classes
// 
// define('THEMATIC_COMPATIBLE_BODY_CLASS', true);
// define('THEMATIC_COMPATIBLE_POST_CLASS', true);

// Unleash the power of Thematic's comment form
//
// define('THEMATIC_COMPATIBLE_COMMENT_FORM', true);

// Unleash the power of Thematic's feed link functions
//
// define('THEMATIC_COMPATIBLE_FEEDLINKS', true);

define('SYNVED_PACKAGE_INCLUDE_PATH', str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, stripefolio_directory() . '/synved-package/synved-package.php'));
define('SYNVED_STRIPEFOLIO_ADDON_PATH', str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, stripefolio_directory() . '/addons'));

include(SYNVED_PACKAGE_INCLUDE_PATH);


$stripefolio_options = array(
'page_appearance' => array(
	'label' => 'Stripefolio',
	'parent' => 'appearance',
	'role' => 'edit_theme_options',
	'tip' => stripefolio_option_callback('stripefolio_page_appearance_tip'),
	'sections' => array(
		'section_general' => array(
			'label' => __('General', 'stripefolio'),
			'tip' => __('General settings for the theme', 'stripefolio'),
			'settings' => array(
				'wpautop_remove' => array(
					'default' => false, 'label' => __('Disable WordPress Paragraphs', 'stripefolio'), 
					'tip' => __('Prevents WordPress from adding paragraphs automatically in posts and pages', 'stripefolio')
				),
				'form_style' => array(
					'default' => 'modern', 'label' => __('Forms Display Style', 'stripefolio'),
					'set' => 'classic=Classic,modern=Modern',
				),
				'custom_tooltips' => array(
					'default' => true, 'label' => __('Use Custom Tooltips', 'stripefolio'), 
					'tip' => __('Enables automatic display of fancy custom tooltips', 'stripefolio')
				),
				'google_cdn' => array(
					'hidden' => true,
					'default' => true, 'label' => __('Use Google CDN for jQuery', 'stripefolio')
				),
				'background_image' => array(
					'type' => 'image', 'label' => __('Background Image', 'stripefolio')
				),
				'credit_generic' => array(
					'default' => false, 'label' => __('Display Generic Credit', 'stripefolio'),
					'tip' => __('Display a more generic theme credit in the footer instead of the explicit theme name', 'stripefolio')
				),
				'footer_site_info' => array(
					'style' => 'extend',
					'default' => 'Copyright &copy; %year% %site_name% / %credit%', 'label' => __('Footer Site Info', 'stripefolio'),
					'tip' => stripefolio_option_callback('stripefolio_footer_site_info_tip', __('Accepted fields: %site_name%, %credit%, %year%', 'stripefolio'))
				),
				'addon_extra_options' => array(
					'type' => 'addon',
					'target' => SYNVED_STRIPEFOLIO_ADDON_PATH,
					'folder' => 'extra-options',
					'style' => 'addon-important',
					'label' => __('Extra Options', 'stripefolio'),
					'tip' => stripefolio_option_callback('stripefolio_addon_extra_options_tip', __('Click the button to install Stripefolio\'s "Extra Options" addon, get it <a target="_blank" href="http://synved.com/product/stripefolio-extra-options/">here</a>.', 'stripefolio'))
				)
			)
		),
		'section_header' => array(
			'label' => __('Header', 'stripefolio'),
			'tip' => __('Header settings for the theme', 'stripefolio'),
			'settings' => array(
				'header_display_decoration' => array(
					'default' => true, 'label' => __('Display Decoration', 'stripefolio')
				),
				'header_display_style' => array(
					'default' => 'name_descr', 'label' => __('Header Display Style', 'stripefolio'),
					'set' => 'name=Site Name,name_descr=Name and Description,logo=Logo,name_logo=Name and Logo,all="Name, Logo and Description"',
					'tip' => __('Select what content must be displayed in the header', 'stripefolio')
				),
				'header_logo_image' => array(
					'type' => 'image', 'label' => __('Logo Image', 'stripefolio'),
					'tip' => __('Maximum size is 1024x125 pixels', 'stripefolio')
				)
			)
		),
		'section_gallery_stripe' => array(
			'label' => __('Gallery Stripe', 'stripefolio'),
			'tip' => stripefolio_option_callback('stripefolio_section_gallery_stripe_tip', __('Settings for the gallery stripe at the bottom', 'stripefolio')),
			'settings' => array(
				'gallery_stripe_show' => array(
					'default' => true, 'label' => __('Show Gallery Stripe', 'stripefolio')
				),
				'gallery_stripe_opaque' => array(
					'default' => true, 'label' => __('Gallery Stripe always visible', 'stripefolio'),
					'tip' => __('Make the gallery stripe always visible instead of fading it in and out', 'stripefolio')
				),
				'gallery_stripe_loader' => array(
					'default' => 'none',
					'set' => stripefolio_option_callback('stripefolio_gallery_stripe_loader_set', 'none=None'),
					'label' => __('Image Loader/Spinner', 'stripefolio'), 
					'tip' => stripefolio_option_callback('stripefolio_gallery_stripe_loader_tip',__('Select which image loader/spinner to display when a fullscreen image is being loaded after clicking a thumbnail.', 'stripefolio'))
				),
				'addon_pretty_loader' => array(
					'type' => 'addon',
					'target' => SYNVED_STRIPEFOLIO_ADDON_PATH,
					'folder' => 'pretty-loader',
					'style' => 'addon-important',
					'label' => __('Pretty Loader', 'stripefolio'),
					'tip' => stripefolio_option_callback('stripefolio_addon_pretty_loader_tip', __('Click the button to install Stripefolio\'s "Pretty Loader" addon, get it <a target="_blank" href="http://synved.com/product/stripefolio-pretty-loader/">here</a>.', 'stripefolio'))
				),
				'gallery_stripe_page' => array(
					'type' => 'page', 'label' => __('Gallery Stripe Page', 'stripefolio'),
					'tip' => __('Only show the gallery stripe on this page', 'stripefolio')
				),
				'gallery_stripe_color' => array(
					'type' => 'color', 'label' => __('Gallery Color', 'stripefolio'), 'default' => '#888'
				),
				'gallery_stripe_hide_site' => array(
					'default' => 'fade_move', 'label' => __('Hide Site Content', 'stripefolio'),
					'set' => 'never=Never,fade=Fade Away,move=Move Away,fade_move=Fade and Move',
					'tip' => __('Select when and how to hide website content whilst browsing the gallery stripe', 'stripefolio')
				),
				'gallery_stripe_hide_site_mode' => array(
					'default' => 'over_stripe', 'label' => __('Move Site Content Away', 'stripefolio'),
					'set' => 'over_stripe=On Stripe Hovering,while_moving=On Mouse Move',
					'tip' => __('Select the user interaction for hiding website content', 'stripefolio')
				),
				'gallery_stripe_thumb_size' => array(
					'default' => 60, 'label' => __('Thumbnail Size', 'stripefolio'),
					'tip' => __('Size in pixels for the small thumbnails in the stripe', 'stripefolio')
				),
				'gallery_stripe_thumb_size_zoom' => array(
					'default' => 100, 'label' => __('Zoomed Thumbnail Size', 'stripefolio'),
					'tip' => __('Size in pixels for the larger zoomed thumbnail in the stripe', 'stripefolio')
				),
				'gallery_stripe_show_none' => array(
					'default' => true, 'label' => __('Empty thumbnail', 'stripefolio'),
					'tip' => __('Show a thumbnail to reset the background image to be empty/transparent', 'stripefolio')
				)
			)
		),
		'section_gallery_sources' => array(
			'label' => __('Gallery Sources', 'stripefolio'),
			'tip' => stripefolio_option_callback('stripefolio_section_gallery_sources_tip', __('Select what images must be shown in the gallery stripe', 'stripefolio')),
			'settings' => array()
		)
	)
)
);

if (function_exists('synved_option_register'))
{
	synved_option_register('stripefolio', $stripefolio_options);
	
	synved_option_include_addon_list(SYNVED_STRIPEFOLIO_ADDON_PATH);
}
	

function stripefolio_option($name, $default = null)
{
	if (function_exists('synved_option_get'))
	{
		return synved_option_get('stripefolio', $name, $default);
	}
	
	$options = get_option('stripefolio_settings');
	
	if (isset($options[$name]))
	{
		return $options[$name];
	}
	
	return $default;
}

function stripefolio_option_callback($cb, $default = null)
{
	if (function_exists('synved_option_callback'))
	{
		return synved_option_callback($cb, $default);
	}
	
	return $default;
}

function stripefolio_page_appearance_tip($tip, $item)
{
	if (!function_exists('synved_shortcode_version'))
	{
		$tip .= ' <div style="background:#f2f2f2;font-size:110%;color:#444;padding:10px 15px;"><b>' . __('Note', 'stripefolio') . '</b>: ' . __('The Stripefolio theme is fully compatible with our <a target="_blank" href="http://synved.com/wordpress-shortcodes/">WordPress Shortcodes</a> plugin!</span>', 'stripefolio') . '</div>'; 
	}
	
	return $tip;
}

function stripefolio_addon_extra_options_tip($tip, $item)
{
	if (synved_option_addon_installed('stripefolio', 'addon_extra_options'))
	{
		$tip .= ' <span style="background:#eee;padding:5px 8px;">' . __('The "Extra Options" addon is already installed! You can use the button to re-install it.', 'stripefolio') . '</span>';
	}
	
	return $tip;
}

function stripefolio_footer_site_info_tip($tip, $item)
{
	$value = stripefolio_option('footer_site_info');
	$default = synved_option_item_default($item);
	
	if (strpos($value, '%credit%') === false)
	{
		$tip = '<img src="' . stripefolio_directory_uri() . '/image/sad.png" />' . '<b><u>' . __('If you like the theme, why not give %credit% to the developer? :\'&#40;') . '</u></b> [' . $tip . ']';
	}
#	
#	if ($value != $default)
#	{
#		$tip .= ' <br/><u>' . __('Default was') . ': ' . $default . '</u>';
#	}
	
	return $tip;
}

function stripefolio_section_gallery_stripe_tip($tip, $item)
{
	if (isset($_GET['stripefolio_hide_photocrati']) && $_GET['stripefolio_hide_photocrati'] == 'yes')
	{
		update_option('stripefolio_hide_photocrati', true);
	}
	
	$hide_photocrati = get_option('stripefolio_hide_photocrati', false);
	
	if ($hide_photocrati == false && function_exists('synved_connect_sponsor_item_by_id'))
	{
		$sponsor_item = synved_connect_sponsor_item_by_id('photocrati');
		
		if ($sponsor_item != null)
		{
			$url = synved_option_item_page_link_url('stripefolio', 'section_gallery_stripe');
			$url = add_query_arg('stripefolio_hide_photocrati', 'yes', $url);
			$dismiss = '<span class="wp-pointer-buttons"><a class="close" style="font-weight:bold;" href="' . $url . '">Dismiss</a></span>';
			
			$sponsor_item['markup'] = '<div class="%%class%%">%%content%% ' . $dismiss . '</div>';
 			
			$content = synved_connect_sponsor_content($sponsor_item);
			
			$tip .= $content;
		}
	}
	
	return $tip;
}

function stripefolio_gallery_stripe_loader_set($set, $item) 
{
	if ($set != null && !is_array($set))
	{
		$set = synved_option_item_set_parse($item, $set);
	}
	
	if (synved_option_addon_installed('stripefolio', 'addon_pretty_loader'))
	{
		$set[]['prettyLoader'] = 'Pretty Loader';
	}
	
	return $set;
}

function stripefolio_gallery_stripe_loader_tip($tip, $item) 
{
	if (!synved_option_addon_installed('stripefolio', 'addon_pretty_loader'))
	{
		$tip .= ' <a target="_blank" href="http://synved.com/product/stripefolio-pretty-loader/">GET A COOL LOADER</a>';
	}
	
	return $tip;
}

function stripefolio_addon_pretty_loader_tip($tip, $item)
{
	if (synved_option_addon_installed('stripefolio', 'addon_pretty_loader'))
	{
		$tip .= ' <span style="background:#eee;padding:5px 8px;">' . __('The "Pretty Loader" addon is already installed! You can use the button to re-install it.', 'stripefolio') . '</span>';
	}
	
	return $tip;
}

function stripefolio_section_gallery_sources_tip($tip, $item)
{
	if (!isset($item['settings']) || $item['settings'] == null)
	{
		$tip .= '<p style="font-size:120%;"><b>Get all of the settings you see below with the <a target="_blank" href="http://synved.com/product/stripefolio-extra-options/">Extra Options addon</a></b>:</p> <img src="' . stripefolio_directory_uri() . '/image/addon-extras.png" />';
	}
	
	return $tip;
}

function stripefolio_parent_check()
{
	$current = dirname(__FILE__);
	$name = basename($current);
	$stylesheet = get_stylesheet();
	$dir = get_stylesheet_directory();
	$t_dir = get_template_directory();
	
	if (strtolower($dir) != strtolower($t_dir))
	{
		if (strpos(strtolower($t_dir), strtolower($current)) === 0 || strtolower($name) != strtolower($stylesheet))
		{
			return true;
		}
	}
	
	return false;
}

function stripefolio_directory()
{
	if (stripefolio_parent_check())
	{
		return get_template_directory();
	}
	
	return get_stylesheet_directory();
}

function stripefolio_directory_uri($path = null)
{
	$uri = null;
	
	if (stripefolio_parent_check())
	{
		$uri = get_template_directory_uri();
	}
	else
	{
		$uri = get_stylesheet_directory_uri();
	}
	
	if ($path != null)
	{
		if (substr($uri, -1) != '/' && $path[0] != '/')
		{
			$uri .= '/';
		}
		
		$uri .= $path;
	}
	
	return $uri;
}

function stripefolio_enqueue_scripts()
{
	$dir = stripefolio_directory_uri();
	
	wp_register_style('google-fonts-droid_sans', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700', false, '1.0.0');
	wp_register_style('google-fonts-ubuntu', 'http://fonts.googleapis.com/css?family=Ubuntu', false, '1.0.0');
	wp_register_style('theme-font-league_gothic', $dir . '/font/League_Gothic/stylesheet.css', false, '1.0.0');
	//wp_register_style('stripefolio-ivory-clear', $dir . '/style/ivory-clear.css', false, '1.0.0');
	wp_register_style('formalize', $dir . '/formalize/stylesheets/formalize.css', false, '1.0.0');
	wp_register_style('tipsy', $dir . '/tipsy/src/stylesheets/tipsy.css', false, '1.0.0a');
	wp_register_style('jquery-jBreadCrumb', $dir . '/style/BreadCrumb.css', false, '1.1.0');
	wp_register_style('jquery-prettyPhoto', $dir . '/prettyPhoto/css/prettyPhoto.css', false, '3.0.3');
	wp_register_style('jquery-ui', $dir . '/jqueryUI/css/custom/jquery-ui-1.8.11.custom.css', false, '1.8.11');
	
	wp_register_script('formalize', $dir . '/formalize/javascripts/jquery.formalize.js', array('jquery'), '1.0.0');
	wp_register_script('tipsy', $dir . '/tipsy/src/javascripts/jquery.tipsy.js', array('jquery'), '1.0.0a');
	wp_register_script('jquery-easing', $dir . '/script/jquery.easing.1.3.js', array('jquery'), '1.3.0');
	wp_register_script('jquery-unselectable', $dir . '/script/jquery-unselectable.js', array('jquery'), '1.0.0');
	wp_register_script('jquery-jBreadCrumb', $dir . '/script/jquery.jBreadCrumb.1.1.js', array('jquery'), '1.1.0');
	wp_register_script('jquery-prettyPhoto', $dir . '/prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'), '3.0.3');
	wp_register_script('stripefolio-custom', $dir . '/script/custom.js', array('jquery'), '1.0.0', true);
	
	wp_enqueue_style('google-fonts-droid_sans');
	wp_enqueue_style('google-fonts-ubuntu');
	wp_enqueue_style('theme-font-league_gothic');
	//wp_enqueue_style('stripefolio-ivory-clear');
	
	if (stripefolio_option('form_style') == 'modern')
	{
		wp_enqueue_style('formalize');
	}
	
	if (stripefolio_option('custom_tooltips'))
	{
		wp_enqueue_style('tipsy');
	}
	
	wp_enqueue_style('jquery-jBreadCrumb');
	wp_enqueue_style('jquery-prettyPhoto');
	wp_enqueue_style('jquery-ui');
	
	if (stripefolio_option('form_style') == 'modern')
	{
		wp_enqueue_script('formalize');
	}
	
	if (stripefolio_option('custom_tooltips'))
	{
		wp_enqueue_script('tipsy');
	}
	
	wp_enqueue_script('jquery-easing');
	wp_enqueue_script('jquery-unselectable');
	wp_enqueue_script('jquery-jBreadCrumb');
	wp_enqueue_script('jquery-prettyPhoto');
	wp_enqueue_script('stripefolio-custom');
	
	wp_localize_script('stripefolio-custom', 'stripefolio', 
		array('encoded_json' => json_encode(
			array(
				'path' => stripefolio_directory_uri(), 
				'options' => array(
					'customTooltips' => stripefolio_option('custom_tooltips'),
					'hide' => stripefolio_option('gallery_stripe_hide_site'), 
					'hideMode' => stripefolio_option('gallery_stripe_hide_site_mode')
				), 
				'stripe' => array(
					'opaque' => stripefolio_option('gallery_stripe_opaque'),
					'loader' => stripefolio_option('gallery_stripe_loader'),
					'size' => stripefolio_option('gallery_stripe_thumb_size'),
					'sizeZoom' => stripefolio_option('gallery_stripe_thumb_size_zoom')
				)
			)
		)));
}

function stripefolio_print_style()
{
	$size = stripefolio_option('gallery_stripe_thumb_size');
	$size_zoom = stripefolio_option('gallery_stripe_thumb_size_zoom');
	$header_decoration = stripefolio_option('header_display_decoration');
	$bg_image = stripefolio_option('background_image');
	
	echo 
	'
<style type="text/css">';

	if ($bg_image != null)
	{
		echo "\n" . '#bg-tile {background-image:url(\'' . stripefolio_option('background_image') . '\');}';
	}
	
	if ($header_decoration == false)
	{
		echo "\n" . '#header {background-image:none;}';
	}
	
	if (stripefolio_stripe_show())
	{
		echo "\n" . '#footer {margin-bottom:' . ($size + 35 + 10) . 'px;}';
	}

	echo
'
#gallery-stripe, #gallery-stripe-bg, .gallery-playback {height:' . ($size + 35) . 'px;}
.gallery-list-pad {margin:0 ' . (($size_zoom - $size) / 2 + 10) . 'px;}
ul.gallery-stripe {height:' . ($size + 10) . 'px;}
ul.gallery-stripe li {width:' . $size . 'px;}
ul.gallery-stripe li a {width:' . $size . 'px; height:' . $size . 'px;}
</style>
';
}

function stripefolio_branding_content()
{
	$header_style = stripefolio_option('header_display_style');
	$header_logo = stripefolio_option('header_logo_image');
	$show_logo = $header_logo != null && in_array($header_style, array('logo', 'name_logo', 'all'));
	
	echo '<div class="branding-content-background"';
	
	if ($show_logo)
	{
		echo ' style="background-image:url(\'' . $header_logo . '\');"';
	}
	
	echo '> ' . "\n";
	
	if ($header_style != 'logo')
	{
		echo '<div class="branding-content-text">' . "\n";
	}
	else
	{
		echo '<a href="' . home_url() . '" style="display:block;width:100%;height:100%;border:0;text-decoration:none;">&nbsp;</a>' . "\n";
	}
	
	if (in_array($header_style, array('name', 'name_descr', 'name_logo', 'all')))
	{
		thematic_blogtitle();
	}
	
	if (in_array($header_style, array('name_descr', 'all')))
	{
		thematic_blogdescription();
	}
	
	if ($header_style != 'logo')
	{
		echo '</div> <!-- .branding-content-text -->' . "\n";
	}
	
	echo '</div> <!-- .branding-content-background -->' . "\n";
}

function stripefolio_background_tile()
{
	echo '<div id="bg-tile">&nbsp;</div>';
	
	//echo '<div id="bg-one">&nbsp;</div>';
}

function stripefolio_image_list()
{
	$count = stripefolio_option('gallery_stripe_count', 4 + 7 - 1);
	$sort = stripefolio_option('gallery_stripe_sort');
	$order = stripefolio_option('gallery_stripe_sort_order');
	$author = stripefolio_option('gallery_stripe_author');
	$cat = stripefolio_option('gallery_stripe_category');
	$tags = stripefolio_option('gallery_stripe_tags');
	$status_list = explode(',', stripefolio_option('gallery_stripe_status'));
	$post_args = array('post_type' => 'post', 'post_status' => 'publish');
	$media_args = array('post_type' => 'attachment', 'post_status' => 'publish');
	$image_list = array();
	$image_exclude = array();

	$post_args['post_status'] = $status_list;
	$media_args['post_status'] = array_merge($status_list, array('inherit'));
	
	if (current_user_can('administrator') || current_user_can('editor'))
	{
		$post_args['post_status'] = array_merge($post_args['post_status'], array('private'));
		$media_args['post_status'] = array_merge($media_args['post_status'], array('private'));
	}
	
	if ($count != null)
	{
		$post_args['numberposts'] = $count;
		$media_args['numberposts'] = $count;
	}
	
	if ($author != null)
	{
		$media_args['author'] = $author;
		$post_args['author'] = $author;
	}
	
	if ($cat != null)
	{
		$media_args['cat'] = $cat;
		$post_args['cat'] = $cat;
	}
	
	if ($tags != null)
	{
		$media_args['tag'] = $tags;
		$post_args['tag'] = $tags;
	}
	
	if ($sort != null)
	{
		$media_args['orderby'] = $sort;
		$post_args['orderby'] = $sort;
	}
	
	if ($order != null)
	{
		$media_args['order'] = strtoupper($order);
		$post_args['order'] = strtoupper($order);
	}
	
	if (stripefolio_option('gallery_stripe_fetch_posts', true))
	{
		$post_list = get_posts($post_args);
		
		foreach ($post_list as $post)
		{
			$thumb_id = get_post_thumbnail_id($post->ID);
			
			if ($thumb_id != null)
			{
				$image = new stdClass();
				$image->ID = $thumb_id;
				
				$image_list[] = $image;
				$image_exclude[] = $thumb_id;
			}
		}
	}
	
	if ($count != null)
	{
		$count -= count($image_list);
		$media_args['numberposts'] = $count;
	}
	
	if ($image_exclude != null)
	{
		$media_args['post__not_in'] = $image_exclude;
	}
	
	if (stripefolio_option('gallery_stripe_fetch_media', true))
	{
		$image_list = array_merge($image_list, get_posts($media_args));
	}
	
	return $image_list;
}

function stripefolio_stripe_show()
{
	$gallery_page = stripefolio_option('gallery_stripe_page');
	
	if (stripefolio_option('gallery_stripe_show') && 
			($gallery_page == '-1' || $gallery_page == null || $gallery_page == get_the_ID()))
	{
		return true;
	}
	
	return false;
}

function stripefolio_thematic_after()
{
	$image_list = array();
	$out = null;
	
	if (stripefolio_stripe_show())
	{
		$image_list = stripefolio_image_list();
		
		$out .= '<div id="gallery-pic">&nbsp;</div>';
		$out .= '<div id="stripe-info" style="background:rgba(255,255,255,0.4);position:fixed;top:40px;left:20px;width:200px;height:80px;padding:15px;display:none">info</div>';
	
		$out .= '<div id="gallery-stripe"><div id="gallery-stripe-bg" style="background-color:' . stripefolio_option('gallery_stripe_color') . ';">&nbsp;</div>';
		
		//$out .= '<div class="gallery-playback">&nbsp;</div>';
		$out .= '<div class="gallery-list">';
		$out .= '<div class="gallery-list-pad">';
		$out .= '<ul class="gallery-stripe">';
	
		if (stripefolio_option('gallery_stripe_show_none'))
		{
			$out .= '<li class="gallery-item"><a class="strip" href="#" style="background:transparent url(\'' . stripefolio_directory_uri() . '/image/none.png' . '\') 50% 50% no-repeat;text-decoration:none;">&nbsp;</a></li>';
		}
		
		foreach ($image_list as $image)
		{
			$src = wp_get_attachment_image_src($image->ID, 'original');
			
			if (isset($src[0]) && $src[0] != null )
			{
				$out .= '<li class="gallery-item"><a class="strip" href="' . $src[0] . '">' . wp_get_attachment_image($image->ID, 'thumbnail', false, array('class' => 'noselect')) . '</a></li>';
			}
		}
	
		$out .= '</ul>';
		$out .= 
'<div class="scroll-bar-wrap gallery-stripe-scroll">
		<div class="scroll-bar"></div>
</div>';
		$out .= '</div>';
		$out .= '</div>';

		$out .= '</div>';
	}
	
	echo $out;
}

function stripefolio_theme_footer_text($thm_footertext = null) 
{
	$credit_generic = stripefolio_option('credit_generic');
	$site_info = stripefolio_option('footer_site_info');

	$site_info = str_replace(
		array('%site_name%', '%year%'), 
		array(get_bloginfo('name'), date('Y')), $site_info);
	
	$credit_content = '<a href="http://synved.com/stripefolio-free-wordpress-portfolio-theme/" target="_blank" title="Stripefolio Theme">Stripefolio</a> by Synved';
	
	if ($credit_generic && function_exists('synved_connect_credit_item'))
	{
		$credit_item = synved_connect_credit_item('stripefolio_credit');
		
		if ($credit_item == null)
		{
			$credit_item = synved_connect_credit_item_pick();
		
			if ($credit_item != null)
			{
				synved_connect_id_set('stripefolio_credit', $credit_item['id']);
			}
		}
	
		if ($credit_item != null)
		{
			$credit_content = synved_connect_credit_content($credit_item);
		}
	}
	
	if (strpos($site_info, '%credit%') !== false)
	{
		$site_info = str_replace('%credit%', $credit_content, $site_info);
	}
	
	return $site_info;
}

function childtheme_override_siteinfo()
{
	echo stripefolio_theme_footer_text();
}

function stripefolio_remove_thematic_panel()
{
  remove_action('admin_menu', 'mytheme_add_admin');
  remove_action('admin_menu', 'thematic_opt_add_page');
}

function stripefolio_prefix_untitled_posts($title) 
{
	if (in_the_loop() && !is_page() && empty($title)) 
	{
	  $title = "(Untitled)";
	}
	
	return $title;
}
	
function stripefolio_init()
{
	if (!is_admin())
	{
		add_action('wp_enqueue_scripts', 'stripefolio_enqueue_scripts');
		add_action('wp_head', 'stripefolio_print_style');
		add_action('thematic_before', 'stripefolio_background_tile', 10);
		add_action('thematic_after', 'stripefolio_thematic_after', 10);
	
		remove_action('thematic_header', 'thematic_blogtitle', 3);
		remove_action('thematic_header', 'thematic_blogdescription', 5);
		
		add_action('thematic_header', 'stripefolio_branding_content', 4);
	
		add_filter('thematic_footertext', 'stripefolio_theme_footer_text');
		add_action('thematic_footer', 'thematic_siteinfo', 30);
		
		if (stripefolio_option('wpautop_remove'))
		{
			remove_filter( 'the_content', 'wpautop' );
			remove_filter( 'the_excerpt', 'wpautop' );
		}
	}
	
	add_filter('the_title', 'stripefolio_prefix_untitled_posts');
}

add_action('init', 'stripefolio_init');
add_action('init', 'stripefolio_remove_thematic_panel', 999);

#<div class="breadCrumbHolder module">
#                <div class="breadCrumb module" id="breadCrumb2">
#                    <div style="overflow: hidden; position: relative; width: 990px;"><div><ul style="width: 5000px;">
#                        <li class="first">
#                            <a href="#">Home</a>
#                        </li>
#                        <li style="background: none repeat scroll 0% 0% transparent;">
#                            <span style="width: 5px; display: block; overflow: hidden;"><a href="#" style="width: 100px;">Biocompare Home</a></span>
#                        <div class="chevronOverlay" style="display: block;"></div></li>
#                        <li style="background: none repeat scroll 0% 0% transparent;">
#                            <span style="width: 5px; display: block; overflow: hidden;"><a href="#" style="width: 101px;">Product Discovery</a></span>
#                        <div class="chevronOverlay" style="display: block;"></div></li>
#                        <li style="background: none repeat scroll 0% 0% transparent;">
#                            <span style="width: 5px; display: block; overflow: hidden;"><a href="#" style="width: 222px;">Life Science Products / Laboratory Supplies</a></span>
#                        <div class="chevronOverlay" style="display: block;"></div></li>
#                        <li style="background: none repeat scroll 0% 0% transparent;">
#                            <span style="width: 5px; display: block; overflow: hidden;"><a href="#" style="width: 89px;">Kits and Assays</a></span>
#                        <div class="chevronOverlay" style="display: block;"></div></li>
#                        <li style="background: none repeat scroll 0% 0% transparent;">
#                            <span style="width: 5px; display: block; overflow: hidden;"><a href="#" style="width: 93px;">Mutagenesis Kits</a></span>
#                        <div class="chevronOverlay" style="display: block;"></div></li>
#                        <li class="last" style="background: none repeat scroll 0% 0% transparent;">
#                            Mutation Generation System&trade; Kit (MGS&trade; Kit) from Finnzymes Oy. Ok, let's get ridiculously long here, we all know it happens.
#                        </li>
#                    </ul></div></div>
#                </div>
#            </div>

?>
<?php
/**
 * Theme Functions
 *
 * This file is used by WordPress to initialize the theme.
 * Thematic is designed to be used as a theme framework and this file should not be modified.
 * You should use a Child Theme to make your customizations. A sample child theme is provided
 * as an example in root directory of this theme. You can move it into the wp-content/themes to
 * enable activation of the child theme. <br>
 *
 * Reference:  {@link http://codex.wordpress.org/Child_Themes Codex: Child Themes}
 * 
 * @package Stripefolio
 * @subpackage ThemeInit
 */


/** 
 * Legacy options global variables likely not needed anymore…
 * Can these be removed safely?
 */
$themename = "Thematic";
$shortname = "thm";


/**
 * Registers action hook: thematic_init 
 * 
 * @since Thematic 1.0
 */
function thematic_init() {
	do_action('thematic_init');
}


/**
 * thematic_theme_setup & childtheme_override_theme_setup
 *
 * Override: childtheme_override_theme_setup
 *
 * @since Thematic 1.0
 */
if ( function_exists('childtheme_override_theme_setup') ) {
	/**
	 * @ignore
	 */
	function thematic_theme_setup() {
		childtheme_override_theme_setup();
	}
} else {
	/**
	 * thematic_theme_setup
	 *
	 * @todo review for impact of deprecations on child themes & fix comment blocks?
	 * @since Thematic 1.0?
	 */
	function thematic_theme_setup() {
		global $content_width;

		/**
		 * Set the content width based on the theme's design and stylesheet.
		 *
		 * Used to set the width of images and content. Should be equal to the width the theme
		 * is designed for, generally via the style.css stylesheet.
		 *
		 * @todo deprecate constant THEMELIB in favor of get_template_directory() and note that get_theme_data() will be deprecated in WP 3.4
		 * @since Thematic 1.0
		 */
		if ( !isset($content_width) )
			$content_width = 540;

		/**
		 * Get Theme and Child Theme Data.
		 * Credits: Joern Kretzschmar
		 * 
		 * Used to get title, version, author, URI of the parent and the child theme.
		 */
		 
		$themeData = get_theme_data(  get_template_directory() . '/style.css' );
		$thm_version = trim( $themeData['Version'] );
		
		if (!$thm_version)
			$thm_version = "unknown";

		$ct = get_theme_data(  get_stylesheet_directory() . '/style.css' );
		$templateversion = trim( $ct['Version'] );
		
		if ( !$templateversion )
			$templateversion = "unknown";

		if ( !defined('THEMENAME') )
			define('THEMENAME', $themeData['Title']);

		if ( !defined('THEMEAUTHOR') )
			define('THEMEAUTHOR', $themeData['Author']);

		if ( !defined('THEMEURI') )
			define('THEMEURI', $themeData['URI']);

		if ( !defined('THEMATICVERSION') )
			define('THEMATICVERSION', $thm_version);

		define( 'TEMPLATENAME', $ct['Title'] );
		define( 'TEMPLATEAUTHOR', $ct['Author'] );
		define( 'TEMPLATEURI', $ct['URI'] );
		define( 'TEMPLATEVERSION', $templateversion );

		// set feed links handling
		// If you set this to TRUE, thematic_show_rss() and thematic_show_commentsrss() are used instead of add_theme_support( 'automatic-feed-links' )
		if ( !defined('THEMATIC_COMPATIBLE_FEEDLINKS') ) {
			if ( function_exists('comment_form') ) {
				define('THEMATIC_COMPATIBLE_FEEDLINKS', false); // WordPress 3.0
			} else {
				define('THEMATIC_COMPATIBLE_FEEDLINKS', true); // below WordPress 3.0
			}
		}

		// set comments handling for pages, archives and links
		// If you set this to TRUE, comments only show up on pages with a key/value of "comments"
		if ( !defined('THEMATIC_COMPATIBLE_COMMENT_HANDLING') )
			define('THEMATIC_COMPATIBLE_COMMENT_HANDLING', false);

		// set body class handling to WP body_class()
		// If you set this to TRUE, Thematic will use thematic_body_class instead
		if ( !defined('THEMATIC_COMPATIBLE_BODY_CLASS') )
			define('THEMATIC_COMPATIBLE_BODY_CLASS', false);

		// set post class handling to WP post_class()
		// If you set this to TRUE, Thematic will use thematic_post_class instead
		if ( !defined('THEMATIC_COMPATIBLE_POST_CLASS') )
			define('THEMATIC_COMPATIBLE_POST_CLASS', false);

		// which comment form should be used
		if ( !defined('THEMATIC_COMPATIBLE_COMMENT_FORM') ) {
			if ( function_exists('comment_form') ) {
 				define('THEMATIC_COMPATIBLE_COMMENT_FORM', false); // WordPress 3.0
			} else {
				define('THEMATIC_COMPATIBLE_COMMENT_FORM', true); // below WordPress 3.0
			}
		}

		// Check for WordPress mu or WordPress 3.0
		define( 'THEMATIC_MB', function_exists('get_blog_option') );

		// Create the feedlinks
		if ( !(THEMATIC_COMPATIBLE_FEEDLINKS) )
 			add_theme_support('automatic-feed-links');
 
		if ( apply_filters('thematic_post_thumbs', true) )
			add_theme_support('post-thumbnails');
 
		add_theme_support('thematic_superfish');

		// Path constants
		define( 'THEMELIB',  get_template_directory() .  '/library' );

		// Create Theme Options Page
		require_once (THEMELIB . '/extensions/theme-options.php');
		
		// Load legacy functions
		require_once (THEMELIB . '/legacy/deprecated.php');

		// Load widgets
		require_once (THEMELIB . '/extensions/widgets.php');

		// Load custom header extensions
		require_once (THEMELIB . '/extensions/header-extensions.php');

		// Load custom content filters
		require_once (THEMELIB . '/extensions/content-extensions.php');

		// Load custom Comments filters
		require_once (THEMELIB . '/extensions/comments-extensions.php');

		// Load custom discussion filters
		require_once (THEMELIB . '/extensions/discussion-extensions.php');

		// Load custom Widgets
		require_once (THEMELIB . '/extensions/widgets-extensions.php');

		// Load the Comments Template functions and callbacks
		require_once (THEMELIB . '/extensions/discussion.php');

		// Load custom sidebar hooks
		require_once (THEMELIB . '/extensions/sidebar-extensions.php');

		// Load custom footer hooks
		require_once (THEMELIB . '/extensions/footer-extensions.php');

		// Add Dynamic Contextual Semantic Classes
		require_once (THEMELIB . '/extensions/dynamic-classes.php');

		// Need a little help from our helper functions
		require_once (THEMELIB . '/extensions/helpers.php');

		// Load shortcodes
		require_once (THEMELIB . '/extensions/shortcodes.php');

		// Adds filters for the description/meta content in archives.php
		add_filter('archive_meta', 'wptexturize');
		add_filter('archive_meta', 'convert_smilies');
		add_filter('archive_meta', 'convert_chars');
		add_filter('archive_meta', 'wpautop');

		// Remove the WordPress Generator - via http://blog.ftwr.co.uk/archives/2007/10/06/improving-the-wordpress-generator/
		function thematic_remove_generators() {
 			return '';
 		}
 		if ( apply_filters('thematic_hide_generators', true) )
 			add_filter('the_generator', 'thematic_remove_generators');
 
		// Translate, if applicable
		load_theme_textdomain('thematic', THEMELIB . '/languages');

		$locale = get_locale();
		$locale_file = THEMELIB . "/languages/$locale.php";
		if ( is_readable($locale_file) )
			require_once ($locale_file);
	}
}

add_action('after_setup_theme', 'thematic_theme_setup', 10);


/**
 * Registers action hook: thematic_child_init
 * 
 * @since Thematic 1.0
 */
function thematic_child_init() {
	do_action('thematic_child_init');
}

add_action('after_setup_theme', 'thematic_child_init', 20);


if ( function_exists('childtheme_override_init_navmenu') )  {
	/**
	 * @ignore
	 */
	 function thematic_init_navmenu() {
    	childtheme_override_init_navmenu();
    }
} else {
	/**
	 * Register primary nav menu
	 * 
	 * Override: childtheme_override_init_navmenu
	 * Filter: thematic_primary_menu_id
	 * Filter: thematic_primary_menu_name
	 */
    function thematic_init_navmenu() {
		register_nav_menu( apply_filters('thematic_primary_menu_id', 'primary-menu'), apply_filters('thematic_primary_menu_name', __( 'Primary Menu', 'thematic' ) ) );
	}
}
add_action('init', 'thematic_init_navmenu');