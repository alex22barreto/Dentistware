<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * JavaScript Plugins Helper, helper para ayudar al manejo de los archivos css y js
 *
 * @package HTML
 * @category Helper
 * @author Alberto Cardenas
 * @link http://albertocardenas.co
 * @version 1.5
 */

if ( ! function_exists('plugin_js')) {
	
	function plugin_js($library = 'jquery', $render = false)
	{
		$CI =& get_instance();
                static $js;

		if ( ! is_array($js))
		{
			if (file_exists(APPPATH.'config/jsplugins.php'))
			{
				include(APPPATH.'config/jsplugins.php');
			}
                        
			if (empty($_js) OR ! is_array($_js))
			{
				$js = array();
				return FALSE;
			}

			$js = $_js;
		}
                if( $render == true){
                    return '<script src="' . $CI->config->site_url($library) . '"></script>';
                }
                if (preg_match('#^https://.*#s', $js[$library])){
                    $string = $js[$library];
                } else {
                    $string = $CI->config->site_url($js[$library]);
                }
		return isset($js[$library]) ? '<script src="' . $string . '"></script>' : false;
	}
}

if ( ! function_exists('plugin_css')){
	
	function plugin_css($style = 'style', $render = false)
	{
                $CI =& get_instance();
		static $css;

		if ( ! is_array($css))
		{
			if (file_exists(APPPATH.'config/jsplugins.php'))
			{
				include(APPPATH.'config/jsplugins.php');
			}
                        
			if (empty($_js) OR ! is_array($_js))
			{
				$js = array();
				return FALSE;
			}

			$css = $_css;
		}
                if( $render == true){
                    return '<link rel="stylesheet" href="' . $CI->config->site_url($style) . '">';
                }
                if (preg_match('#^https://.*#s', $css[$style])){
                    $string = $css[$style];
                } else {
                    $string = $CI->config->site_url($css[$style]);
                }
		return isset($css[$style]) ? '<link rel="stylesheet" href="' . $string . '">' : FALSE;
	}
}
