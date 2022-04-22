<?php
require_once "class_default_inc.php";
require_once "fn/site_inc.php";
require_once "fn/http_inc.php";

// ENVIRONNEMENT ici DEV
define('__EnvType', "DEV");	//DEV, RCT, PRD, ...

// SYSTEM
//define('__ROOTLIB__', dirname(dirname(__FILE__)));
//echo __ROOTLIB__;
//exit();

// Constantes
define('__DefaultRootSite', SiteRootStatus::Root);
//uploads
define("__UploadFolder", "uploadFiles");	//Default uploadfilefolder folder name
define("__UploadFolderDest", "uploadedImages");	//Default uploadedfiles folder name
define("__UploadSizeLimit", 8000000);	//Default uploadfile size limitation ici (8Mo)

// Session test login ici "user"
define("__SessionUser", "user");

// Index Page
define("__PageIndex", "index.php");
// Login Page
define("__PageLogin", "login.php");
// Login Page
define("__PageLogout", "logout.php");

// Crypto/Hash
// Salt Key Name
define('__SaltKey', "-*RareBnB-*");
//Hash Algo Name
define('__HashName', "gost");	//gost = 64 char hash key (4 db field)

//default Admin
define('AdminLoginDefault', "admin");
define('AdminPasswordDefault', "password");

// Date Format
define("dateFormat", "d/m/Y H:i:s");

// Default Errors Msg
define("err_nodata", "Error: No data found, try again ...");

// Db
// Limitation
define("db_limit", " limit 50");	//ne pas oublier le car vide pour eviter une erreur de concaténation

// Html
define("br", "<br/>");
define("space", "&nbsp;");
define("disabled", "disabled=\"disabled\"");
define("readonly", "readonly=\"readonly\"");
define("required", "required=\"required\"");
define("selected", "selected=\"selected\"");
define("checked", "checked=\"checked\"");
// Error
define("error_js_timeout", 4000);

// Form
// mettre a vide pour remmettre les controles du HTML en plus du serveur
//define("form_novalidate", "");	//pour tester les controles client (et serveur)
define("form_novalidate", "novalidate");	//pour tester les controles serveur
// Pattern Phone 
define("pattern_phonefrench", "^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$");
