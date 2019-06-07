<?php
/**
   * Spyc -- A Simple PHP YAML Class
   * @version 0.6.2
   * @author Vlad Andersen <vlad.andersen@gmail.com>
   * @author Chris Wanstrath <chris@ozmm.org>
   * @link https://github.com/mustangostang/spyc/
   * @copyright Copyright 2005-2006 Chris Wanstrath, 2006-2011 Vlad Andersen
   * @license http://www.opensource.org/licenses/mit-license.php MIT License
   * @package Spyc
   */

use Spyc\Spyc;

if(!function_exists('spyc_load')) {
  /**
   * Parses YAML to array.
   * @param string $string YAML string.
   * @return array
   */
  function spyc_load($string) {
    return Spyc::YAMLLoadString($string);
  }
}

if(!function_exists('spyc_load_file')) {
  /**
   * Parses YAML to array.
   * @param string $file Path to YAML file.
   * @return array
   */
  function spyc_load_file($file) {
    return Spyc::YAMLLoad($file);
  }
}

if(!function_exists('spyc_dump')) {
  /**
   * Dumps array to YAML.
   * @param array $data Array.
   * @return string
   */
  function spyc_dump($data) {
    return Spyc::YAMLDump($data, false, false, true);
  }
}
