<?php
  $display_errors = TRUE;

  $username = "";
  $password = "";
  $server   = "localhost";
  $database = "";

  $theme = "basic";

  /*

  Menu settings
 
  */

  $menu_left = array();

  $menu_right = array();
  $menu_right[] = array('name'=>"Account", 'path'=>"user/view" , 'session'=>"write");
  $menu_right[] = array('name'=>"Logout", 'path'=>"user/logout" , 'session'=>"write");

  /*

  Default router settings - in absence of stated path

  */

  // Default controller and action if none are specified and user is anonymous
  $default_controller = "user";
  $default_action = "login";

  // Default controller and action if none are specified and user is logged in
  $default_controller_auth = "user";
  $default_action_auth = "view";

  // Public profile functionality
  $public_profile_enabled = TRUE;
  $public_profile_controller = "user"; 
  $public_profile_action = "view";

  $allowusersregister = TRUE;

  if ($display_errors)
  {
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
  }
?>
