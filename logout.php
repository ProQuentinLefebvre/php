<?php
	require_once "inc/fn/header_default.php";	//Inclusion de code/function/...
	require_once "inc/fn/functions.php";
	session_start();
  session_destroy();
	echo '<script type="text/javascript">';
  echo 'window.location.href="'.getSiteRootPath().'";';
  echo '</script>';
  echo '<noscript>';
  echo '<meta http-equiv="refresh" content="0;url='.getSiteRootPath().'" />';
  echo '</noscript>';