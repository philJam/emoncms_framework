<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
  /*
  All Emoncms code is released under the GNU Affero General Public License.
  See COPYRIGHT.txt and LICENSE.txt.

  ---------------------------------------------------------------------
  Emoncms - open source energy visualisation
  Part of the OpenEnergyMonitor project:
  http://openenergymonitor.org
  */

  global $path;
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <style>
          body { padding-top: 60px; }

          .footer {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
          }

          .footer a {
            color: #77b4d9;
            text-decoration: none;
          }
        </style>

        <script type="text/javascript" src="<?php echo $path; ?>Lib/jquery-1.9.1.min.js"></script>
        <link href="<?php echo $path; ?>Lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo $path; ?>Lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

        <!-- Thanks to Baptiste Gaultier for the emoncms dial icon http://bit.ly/zXgScz -->
        <link rel="shortcut icon" href="<?php echo $path; ?>Theme/favicon.png" />
        <!-- APPLE TWEAKS - thanks to Paul Dreed -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="apple-touch-startup-image" href="<?php echo $path; ?>Theme/ios_load.png">
        <link rel="apple-touch-icon" href="<?php echo $path; ?>Theme/logo_normal.png">
        <title>Emoncms</title>
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <img src="<?php echo $path; ?>Theme/favicon.png" style="width:28px;"/>
                    </button>
                    <div class="nav-collapse collapse">
                      <?php if (!isset($runmenu)) $runmenu = '';
                            echo $mainmenu.$runmenu;
                      ?> 
                    </div>
                </div>
            </div>
        </div>

   
        <?php if (isset($submenu) && ($submenu)) { ?>  
          <div style="width:100%; background-color:#ddd; height:27px;">
              <div class="container">
                  <?php echo $submenu; ?> 
              </div>
          </div>
        <?php } ?> 

        <div class="container">
            <?php echo $content; ?>
        </div>

        <div style="clear:both; height:37px;"></div> 

        <div class="footer"><?php echo _('Powered by '); ?>
            <a href="http://openenergymonitor.org">openenergymonitor.org</a>
        </div> 

        <script src="<?php echo $path; ?>Lib/bootstrap/js/bootstrap.js"></script>

    </body>

</html>
