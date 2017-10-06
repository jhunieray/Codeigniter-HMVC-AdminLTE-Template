<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('load_pages')){
   function load_pages($pages = array(), $data = array()){
      foreach($pages as $page)
      {
        $CI =& get_instance();
        
        $CI->load->view($page, $data);
      }
   }
}