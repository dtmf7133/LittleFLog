<?PHP

  require("../Private/core/init.inc");

  $aPaths = glob(APP_DATA_PATH . DIRECTORY_SEPARATOR . "*");
  rsort($aPaths);
  $what = strip_tags(filter_input(INPUT_GET, "what")??"");
  if (empty($what)) {
    if (!empty($aPaths)) {
      $what = basename($aPaths[0]);
    }
  }
  
?>

<!DOCTYPE html>
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
<head>
	
  <meta charset="UTF-8"/>
  
  <meta name="viewport" content="width=device-width, initial-scale=0.8, minimum-scale=0.8, maximum-scale=0.8"/>

  <title><?PHP echo(APP_PAGETITLE);?></title>

<!--

  Copyright 2021, 2028 NuMode
 
  This file is part of LittleFLog
  
  LittleFLog is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.
  
  LittleFLog is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.  
  
  -->

  <meta name="description" content="<?PHP echo(APP_PAGEDESC);?>"/>
  <meta name="keywords" content="<?PHP echo(APP_PAGEKEYWORDS);?>"/>
  <meta name="robots" content="index,follow"/>
  <meta name="author" content="NuMode"/>

  <script src="/js/jquery-3.6.0.min.js"></script>

  <style>
    body {
      background: #000000;
      color: lightgreen;
      font-size: 13;
    }
    a {
      color: lightgreen;
    }
    .aaa {
      color: lightgreen;
      font-weight: 400;
      font-size:12px;
    }
    #content {
      float: left;
      width: 76%;
      margin-left:8px;
    }
    #footerCont {
      position: fixed; 
      top: 2000px; 
      left:-10px;
      width: 102%; 
      border: 1px solid #C2DBF2; 
      padding: 7px; 
      background: darkgreen; 
      opacity: 0.5;
      color:white; 
      font-family: Sans;
      font-size: 12px; 
      text-align: center; 
      z-index: 99998;
    }
    #footer {
      position: fixed;
      float: right;
      top: 2000px; 
      left:-10px;
      width: 100%; 
      border: 0px solid #C2DBF2; 
      padding: 7px; 
      opacity: 1.0;
      color: #FFFFFF; 
      font-weight: 400;
      font-size:12px;
      text-align: right; 
      z-index: 99999;
    }
    H1 {
      color: lightgreen;
      font-weight: 900;
      margin-left:9px;
    }
    #sidebar {
      float: right;
      width: 14%;
      border: 1px dashed lightgreen;
      color: lightgreen;
      padding: 10px;
      white-space: nowrap;
    }
    .stoneange {
      clear:all;
      float:left;
      width:96%;
    }
    .strange {
      clear:all;
      float:left;
      width:96%;
      background:darkgreen;
    }
  </style>

</head>
<body>

  <H1><?PHP echo(APP_PAGEDESC);?></H1>

  <div id="content">
    <?PHP
      //echo(APP_DATA_PATH . DIRECTORY_SEPARATOR . $what);
      if (is_readable(APP_DATA_PATH . DIRECTORY_SEPARATOR . $what)) {
        $d = file(APP_DATA_PATH . DIRECTORY_SEPARATOR . $what);
        if (empty($d)) {
          echo("No record found.");
        } else {
          $i=1;
          foreach($d as $l) {
            if ($i % 2 === 1) {
              echo("<div class='stoneange'>".$l."</div><br>");
            } else {
              echo("<div class='strange'>".$l."</div><br>");
            }
            $i++;
          }
        }
      } else {
        echo("No record found.");
      }
    ?>
    <div style="clear:both;"><br><br><br><br></div>
  </div>  
  <div id="sidebar">
    <?PHP
       //$aPaths = glob(APP_DATA_PATH . DIRECTORY_SEPARATOR . "*");
       foreach ($aPaths as $path) {
           if (!is_dir($path)) {       
              echo("<a href='/?what=" . basename($path) . "'>" . basename($path) . "</a><br>");
           }      
       }
    ?>
  </div>

  <div id="footerCont">&nbsp;</div>
  <div id="footer"><span>&nbsp;&nbsp;<a class="aaa" href="http://numode.eu/dd.html">Disclaimer</a>.&nbsp;&nbsp;A <a href="http://numode.eu" class="aaa">NuMode</a> project and <a href="http://demo.numode.eu" class="aaa">WYSIWYG</a> system. CC&nbsp;&nbsp;</span></div>

<script>
function setFooterPos() {
  if (document.getElementById("footerCont")) {
    tollerance = 16;
    $("#footerCont").css("top", parseInt( window.innerHeight - $("#footerCont").height() - tollerance ) + "px");
    $("#footer").css("top", parseInt( window.innerHeight - $("#footer").height() - tollerance ) + "px");
  }
}
window.addEventListener("load", function() {
  setTimeout("setFooterPos()", 200);
}, true);

window.addEventListener("resize", function() {
  setTimeout("setFooterPos()", 200);
}, true);

</script>

</body>
</html>
