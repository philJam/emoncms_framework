<?php

  /*

  All Emoncms code is released under the GNU Affero General Public License.
  See COPYRIGHT.txt and LICENSE.txt.

  ---------------------------------------------------------------------
  Emoncms - open source energy visualisation
  Part of the OpenEnergyMonitor project:
  http://openenergymonitor.org
 
  */

  define('EMONCMS_EXEC', 1);

  // 1) Load settings and core scripts
  require "process_settings.php";

  require "core.php";
  require "route.php";
  require "locale.php";

  $path = get_application_path();

  // 2) Database
  $mysqli = new mysqli($server,$username,$password,$database);

  if (!$mysqli->connect_error && $dbtest==true) {
    require "Lib/dbschemasetup.php";
    if (!db_check($mysqli,$database)) db_schema_setup($mysqli,load_db_schema());
  }

  // 3) User sessions
  require("Modules/user/user_model.php");
  $user = new User($mysqli);

  if (get('apikey'))
    $session = $user->apikey_session($_GET['apikey']);
  else
    $session = $user->emon_session_start();

  // 4) Language
  set_emoncms_lang($session['lang']);

  // 5) Get route and load controller
  $route = new Route(get('q'));

  if (get('embed')==1) $embed = 1; else $embed = 0;

  // If no route specified use defaults
  if (!$route->controller && !$route->action)
  {
    // Non authenticated defaults
    if (!$session['read'])
    {
      $route->controller = $default_controller;
      $route->action = $default_action;
    }
    else // Authenticated defaults
    {
      $route->controller = $default_controller_auth;
      $route->action = $default_action_auth;
    }
  }

  // 6) Load the main page controller
  $output = controller($route->controller);

  // 7) Output
  if ($route->format == 'json') print json_encode($output['content']);

  if ($route->format == 'html') 
  {
    $menu_left = load_menu();
    $output['mainmenu'] = view("Theme/menu_view.php", array());
    if ($embed == 0) print view("Theme/theme.php", $output);
    if ($embed == 1) print view("Theme/embed.php", $output);
  }
