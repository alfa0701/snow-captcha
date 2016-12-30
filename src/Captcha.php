<?php
/**
 * Created by PhpStorm.
 * User: VEMEDYA
 * Date: 30.12.2016
 * Time: 14:25
 */

namespace Snowsoft;


class Captcha
{
    protected static $Defaultsettings = [
        'min_length' => 5,
        'max_length' => 5,
        'characters' => 'ABCDEFGHJKLMNPRSTUVWXYZabcdefghjkmnprstuvwxyz23456789',
        'min_font_size' => 28,
        'max_font_size' => 28,
        'color' => '#666',
        'angle_min' => 0,
        'angle_max' => 10,
        'shadow' => true,
        'shadow_color' => '#fff',
        'shadow_offset_x' => -1,
        'shadow_offset_y' => 1
    ];

    protected  static $settings;

    public  static $bg_path = '';

    public  static $font_path = '';

    public static $custom_bg = [];


    public function __construct($settings)
    {
        if( !function_exists('gd_info') ) {
            throw new Exception('Required GD library is missing');
        }

      self::$settings  = $settings;
      self::$bg_path   = dirname(__FILE__) . '/media/backgrounds/';
      self::$font_path = dirname(__FILE__) . '/media/fonts/';
    }

    public static function backgrounds()
    {
      $defaultbg = array(
          '45-degree-fabric.png',
          'cloth-alike.png',
          'grey-sandbag.png',
          'kinda-jean.png',
          'polyester-lite.png',
          'stitched-wool.png',
          'white-carbon.png',
          'white-wave.png'
      );

      return (isset(self::$custom_bg) and count(self::$custom_bg)>0) ? self::$custom_bg : $defaultbg;

    }

    public static function fonts()
    {
        $defaultFont = array(
            'times_new_yorker.ttf'
        );

     return (isset(self::$custom_font) and count(self::$custom_font)>0) ? self::$custom_font : $defaultFont;
    }

    public static function config()
    {
        $captcha_config = array();

        if( is_array(self::$settings) ) {
            foreach(self::$settings as $key => $value ) $captcha_config[$key] = $value;
        }

        // Restrict certain values
        if( $captcha_config['min_length'] < 1 ) $captcha_config['min_length'] = 1;
        if( $captcha_config['angle_min'] < 0 ) $captcha_config['angle_min'] = 0;
        if( $captcha_config['angle_max'] > 10 ) $captcha_config['angle_max'] = 10;
        if( $captcha_config['angle_max'] < $captcha_config['angle_min'] ) $captcha_config['angle_max'] = $captcha_config['angle_min'];
        if( $captcha_config['min_font_size'] < 10 ) $captcha_config['min_font_size'] = 10;
        if( $captcha_config['max_font_size'] < $captcha_config['min_font_size'] ) $captcha_config['max_font_size'] = $captcha_config['min_font_size'];
    }


    public static function Create()
    {


    }



}