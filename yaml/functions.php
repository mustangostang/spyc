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

if (!function_exists('yaml_load')) {
  /**
   * Parses YAML to array.
   * @param string $string YAML string.
   * @return array
   */
  function yaml_load ($string) {
    return Spyc::YAMLLoadString($string);
  }
}

if (!function_exists('yaml_load_file')) {
  /**
   * Parses YAML to array.
   * @param string $file Path to YAML file.
   * @return array
   */
  function yaml_load_file ($file) {
    return Spyc::YAMLLoad($file);
  }
}

if (!function_exists('yaml_dump')) {
  /**
   * Dumps array to YAML.
   * @param array $data Array.
   * @return string
   */
  function yaml_dump ($data) {
    return Spyc::YAMLDump($data, false, false, true);
  }
}

// Enable use of Spyc from command line
// The syntax is the following: php Spyc.php spyc.yaml
do {
  if (PHP_SAPI != 'cli') break;
  if (empty ($_SERVER['argc']) || $_SERVER['argc'] < 2) break;
  if (empty ($_SERVER['PHP_SELF']) || FALSE === strpos ($_SERVER['PHP_SELF'], 'Spyc.php') ) break;
  $file = $argv[1];
  echo json_encode (yaml_load_file ($file));
} while (0);
