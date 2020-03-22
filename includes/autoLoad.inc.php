<?php
spl_autoload_register('autoLoad');
function autoLoad($className){
  $path = "classes/";
  $extension = ".class.php";
  $fullPath = $path. $className. $extension;
  include_once $fullPath;
}
 ?>
