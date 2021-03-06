<?php
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );
$fontstyle = "f-" . $default_font;
$tstyle = $default_style;
$mtype = $menu_type;
$tempus = false;
$cookie_prefix = "dim-";

//load font style
if (isset($_SESSION[$cookie_prefix. 'fontstyle'])) {
    $fontstyle = mosGetParam($_SESSION, $cookie_prefix. 'fontstyle');
} elseif (isset($_COOKIE[$cookie_prefix. 'fontstyle'])) {
	$fontstyle = mosGetParam($_COOKIE, $cookie_prefix. 'fontstyle');
}

//load template style
if (isset($_SESSION[$cookie_prefix. 'tstyle'])) {
	$tstyle = mosGetParam($_SESSION, $cookie_prefix. 'tstyle');
} elseif (isset($_COOKIE[$cookie_prefix. 'tstyle'])) {
	$tstyle = mosGetParam($_COOKIE, $cookie_prefix. 'tstyle');
}

//load menu type
if (isset($_SESSION[$cookie_prefix. 'mtype'])) {
    $mtype = mosGetParam($_SESSION, $cookie_prefix. 'mtype');
} elseif (isset($_COOKIE[$cookie_prefix. 'mtype'])) {
	$mtype = mosGetParam($_COOKIE, $cookie_prefix. 'mtype');
}

if (isset($_SESSION[$cookie_prefix. 'tempus'])) {
	$tempus = mosGetParam($_SESSION, $cookie_prefix. 'tempus');
} elseif (isset($_COOKIE[$cookie_prefix. 'tempus'])) {
	$tempus = mosGetParam($_COOKIE, $cookie_prefix. 'tempus');
}

$menu_type = $mtype;

$thisurl = $_SERVER['PHP_SELF'] . rebuildQueryString();

function rebuildQueryString() {
  $ignores = array("tstyle","contraststyle","fontstyle","widthstyle", "tempus");
  if (!empty($_SERVER['QUERY_STRING'])) {
      $parts = explode("&", $_SERVER['QUERY_STRING']);
      $newParts = array();
      foreach ($parts as $val) {
          $val_parts = explode("=", $val);
          if (!in_array($val_parts[0], $ignores)) {
            array_push($newParts, $val);
          }
      }
      if (count($newParts) != 0) {
          $qs = implode("&amp;", $newParts);
      } else {
          return "?";
      }
      return "?" . $qs . "&amp;"; // this is your new created query string
  } else {
      return "?";
  } 
}
?>
