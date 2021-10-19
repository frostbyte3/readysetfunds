<?php

/**
 * Ready Set Funds functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage ReadySetFunds
 * @since 1.0.0
 */

require_once 'nav.php';

/**
 * Ready Set Funds only works in WordPress 4.7 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.7', '<')) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if (!function_exists('readysetfunds_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function readysetfunds_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Ready Set Funds, use a find and replace
		 * to change 'readysetfunds' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('readysetfunds', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568, 9999);

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'readysetfunds'),
				'footer' => __('Footer Menu', 'readysetfunds'),
				'social' => __('Social Links Menu', 'readysetfunds'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __('Small', 'readysetfunds'),
					'shortName' => __('S', 'readysetfunds'),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __('Normal', 'readysetfunds'),
					'shortName' => __('M', 'readysetfunds'),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __('Large', 'readysetfunds'),
					'shortName' => __('L', 'readysetfunds'),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __('Huge', 'readysetfunds'),
					'shortName' => __('XL', 'readysetfunds'),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __('Primary', 'readysetfunds'),
					'slug'  => 'primary',
					'color' => readysetfunds_hsl_hex('default' === get_theme_mod('primary_color') ? 199 : get_theme_mod('primary_color_hue', 199), 100, 33),
				),
				array(
					'name'  => __('Secondary', 'readysetfunds'),
					'slug'  => 'secondary',
					'color' => readysetfunds_hsl_hex('default' === get_theme_mod('primary_color') ? 199 : get_theme_mod('primary_color_hue', 199), 100, 23),
				),
				array(
					'name'  => __('Dark Gray', 'readysetfunds'),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __('Light Gray', 'readysetfunds'),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __('White', 'readysetfunds'),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');
	}
endif;
add_action('after_setup_theme', 'readysetfunds_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function readysetfunds_widgets_init()
{

	register_sidebar(
		array(
			'name'          => __('Footer', 'readysetfunds'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'readysetfunds'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'readysetfunds_widgets_init');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function readysetfunds_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('readysetfunds_content_width', 640);
}
add_action('after_setup_theme', 'readysetfunds_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function readysetfunds_scripts()
{
	wp_enqueue_style('readysetfunds-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

	wp_style_add_data('readysetfunds-style', 'rtl', 'replace');

	if (has_nav_menu('menu-1')) {
		wp_enqueue_script('readysetfunds-priority-menu', get_theme_file_uri('/js/priority-menu.js'), array(), '1.1', true);
		wp_enqueue_script('readysetfunds-touch-navigation', get_theme_file_uri('/js/touch-keyboard-navigation.js'), array(), '1.1', true);
	}

	wp_enqueue_style('readysetfunds-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get('Version'), 'print');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'readysetfunds_scripts');

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function readysetfunds_skip_link_focus_fix()
{
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
		/(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
			var t, e = location.hash.substring(1);
			/^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
		}, !1);
	</script>
<?php
}
add_action('wp_print_footer_scripts', 'readysetfunds_skip_link_focus_fix');

/**
 * Enqueue supplemental block editor styles.
 */
function readysetfunds_editor_customizer_styles()
{

	wp_enqueue_style('readysetfunds-editor-customizer-styles', get_theme_file_uri('/style-editor-customizer.css'), false, '1.1', 'all');

	if ('custom' === get_theme_mod('primary_color')) {
		// Include color patterns.
		require_once get_parent_theme_file_path('/inc/color-patterns.php');
		wp_add_inline_style('readysetfunds-editor-customizer-styles', readysetfunds_custom_colors_css());
	}
}
add_action('enqueue_block_editor_assets', 'readysetfunds_editor_customizer_styles');

/**
 * Display custom color CSS in customizer and on frontend.
 */
function readysetfunds_colors_css_wrap()
{

	// Only include custom colors in customizer or frontend.
	if ((!is_customize_preview() && 'default' === get_theme_mod('primary_color', 'default')) || is_admin()) {
		return;
	}

	require_once get_parent_theme_file_path('/inc/color-patterns.php');

	$primary_color = 199;
	if ('default' !== get_theme_mod('primary_color', 'default')) {
		$primary_color = get_theme_mod('primary_color_hue', 199);
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint($primary_color) . '"' : ''; ?>>
		<?php echo readysetfunds_custom_colors_css(); ?>
	</style>
<?php
}
add_action('wp_head', 'readysetfunds_colors_css_wrap');

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-readysetfunds-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-readysetfunds-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

function my_login_logo()
{ ?>
	<style type="text/css">
		#login h1 a,
		.login h1 a {
			background: center no-repeat url(http://stage.readysetfunds.com/wp-content/themes/readysetfunds/assets/images/logo_g+name.png);
			height: 70px;
			width: 264px;
			padding-bottom: 30px;
		}
	</style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');

function auto_copyright($year = 'auto')
{
	if (intval($year) == 'auto') {
		$year = date('Y');
	}
	if (intval($year) == date('Y')) {
		echo intval($year);
	}
	if (intval($year) < date('Y')) {
		echo intval($year) . ' - ' . date('Y');
	}
	if (intval($year) > date('Y')) {
		echo date('Y');
	}
}


/***IP geotracking***/

function validate_ip($ip)
{
	return filter_var($ip, FILTER_VALIDATE_IP);
}

function getRemoteIPAddress()
{
	// Check for shared Internet/ISP IP
	if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	}

	// Check for IP addresses passing through proxies
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

		// Check if multiple IP addresses exist in var
		if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
			$iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
			foreach ($iplist as $ip) {
				if (validate_ip($ip))
					return $ip;
			}
		} else {
			if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
	}
	if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
		return $_SERVER['HTTP_X_FORWARDED'];
	if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
		return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
	if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
		return $_SERVER['HTTP_FORWARDED_FOR'];
	if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
		return $_SERVER['HTTP_FORWARDED'];

	// Return unreliable IP address since all else failed
	return $_SERVER['REMOTE_ADDR'];
}

function getGeoByIp()
{
	/*get user's ip*/
	$ip = getRemoteIPAddress();
	if ($ip === '172.27.0.1' || $ip === "172.20.0.1" || $ip == '172.18.0.1')      //manually change local ip for testing.
		$ip = '108.185.158.176';

	/*get geo data*/
	$key = getenv('IP_STACK');
	$url = "http://api.ipstack.com/$ip?access_key=$key";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	$data = json_decode(curl_exec($ch));
	curl_close($ch);

	if (empty($data->region_code)) //if no location data could be found, return the ip address for debugging/future parsing
		return 'NO';
	return $data->region_code;
}

function state_to_region($state)
{
	$US_regions = array(
		'AL' => 'SouthEast',
		'AK' => 'NorthWest',
		'AZ' => 'SouthWest',
		'AR' => 'SouthEast',
		'CA' => 'SouthWest',
		'CO' => 'SouthWest',
		'CT' => 'Connecticut',
		'DE' => 'NorthEast',
		'DC' => 'NorthEast',
		'FL' => 'Florida',
		'GA' => 'SouthEast',
		'HI' => 'SouthWest',
		'ID' => 'NorthWest',
		'IL' => 'MidWest',
		'IN' => 'MidWest',
		'IA' => 'MidWest',
		'KS' => 'MidWest',
		'KY' => 'MidWest',
		'LA' => 'SouthEast',
		'ME' => 'NorthEast',
		'MD' => 'NorthEast',
		'MA' => 'NorthEast',
		'MI' => 'MidWest',
		'MN' => 'MidWest',
		'MS' => 'SouthEast',
		'MO' => 'MidWest',
		'MT' => 'NorthWest',
		'NE' => 'MidWest',
		'NV' => 'SouthWest',
		'NH' => 'NorthEast',
		'NJ' => 'NorthEast',
		'NM' => 'SouthWest',
		'NY' => 'NorthEast',
		'NC' => 'SouthEast',
		'ND' => 'MidWest',
		'OH' => 'MidWest',
		'OK' => 'SouthWest',
		'OR' => 'NorthWest',
		'PA' => 'NorthEast',
		'RI' => 'NorthEast',
		'SC' => 'SouthEast',
		'SD' => 'MidWest',
		'TN' => 'SouthEast',
		'TX' => 'SouthWest',
		'UT' => 'SouthWest',
		'VT' => 'NorthEast',
		'VA' => 'NorthEast',
		'WA' => 'NorthWest',
		'WV' => 'NorthEast',
		'WI' => 'MidWest',
		'WY' => 'NorthWest',
		'NO' => 'NorthEast'
	);

	return $US_regions[$state] ?? 'NorthEast';
}

function get_home_header_image()
{
	$img_map = array(
		'NorthEast' => get_template_directory_uri() . '/assets/images/state_headers/downtown-NY.png',
		//'SouthEast' => get_template_directory_uri().'/assets/images/state_headers/downtown-GA.jpg',
		'Florida' => get_template_directory_uri() . '/assets/images/state_headers/downtown-FL.jpg',
		'SouthWest' => get_template_directory_uri() . '/assets/images/state_headers/downtown-CA.jpg'
	);
	return $img_map[state_to_region(getGeoByIp())] ?? get_template_directory_uri() . '/assets/images/state_headers/downtown-NY.jpg';
}

add_filter('the_content', 'remove_empty_p', 20, 1);

function remove_empty_p($content)
{
	$content = force_balance_tags($content);
	return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

function hook_analytics()
{
	?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo getenv('google_analytics_UA'); ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', '<?php echo getenv('google_analytics_UA'); ?>');
	</script>

	<!-- Facebook Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '1247609312115265');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1247609312115265&ev=PageView&noscript=1" /></noscript>
	<!-- End Facebook Pixel Code -->

<?php
}
add_action('wp_head', 'hook_analytics');


function get_new_user_id()
{
	list($usec, $sec) = explode(" ", microtime());
	$full_num = ((float)$usec + (float)$sec) * 10000;
	return substr($full_num, -9);
}

function sanatize_vals_from_post($val_keys)
{
    $arr_store = array();

    foreach ($val_keys as $val_key) {
        if ($val_key == 'email') {
            $arr_store[$val_key] = filter_var($_POST[$val_key] ?? 'Not Collected', FILTER_SANITIZE_EMAIL);
        } else {
            $arr_store[$val_key] = filter_var($_POST[$val_key] ?? 'Not Collected', FILTER_SANITIZE_STRING);
        }
    }

    return $arr_store;
}

function format_data_for_post($vals) {
    $str = '';
    $counter = 0;
    $keys = array_keys($vals);

    foreach ($keys as $key) {
		if($counter > 0) {
			$str .= '&';
		}

        $str .= $key . '=' . $vals[$key];
        $counter = $counter + 1;
    }

    return $str;
}

function format_keys_for_query($keys)
{
    $str = '';

    $counter = 0;
    foreach ($keys as $key) {
        $str .= $key;
        if ($counter != count($keys) - 1) {
            $str .= ", ";
        }
        $counter = $counter + 1;
    }

    return $str;
}

function format_vals_for_query($vals)
{
    $str = '';
    $counter = 0;
    $keys = array_keys($vals);

    foreach ($keys as $key) {
        $str .= "'" . $vals[$key] . "'";
        if ($counter != count($vals) - 1) {
            $str .= ", ";
        }
        $counter = $counter + 1;
    }

    return $str;
}

function format_duplicate_vals($keys, $vals) {

    $str = '';
    $counter = 0;

    foreach ($keys as $key) {
        $str .= $key . "='" . $vals[$key] . "'";
        if ($counter != count($vals) - 1) {
            $str .= ", ";
        }
        $counter = $counter + 1;
    }

    return $str;
}

function getPostFromAjax() {
	return json_decode(array_keys($_POST)[0], true);
}