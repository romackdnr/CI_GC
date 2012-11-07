<!DOCTYPE html>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us">  
<head>  
<?
function useragent() {
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	//print $useragent;
	if(strchr($useragent,"MSIE 8")) return 'IE 8';
}
if(useragent()=='IE 8') {
	echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=EmulateIE7\" /> \n";
	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" /> \n";
	echo "<meta name=\"robots\" content=\"noindex, nofollow\"> \n";
} else {
	echo "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" /> \n";
	echo "<meta name=\"robots\" content=\"noindex, nofollow\"> \n";
}
?>
	<meta name="Keywords" content="" />
	<meta name="Description" content="" />
  <title> Welcome to Dog and Rooster Admin Control Panel </title>
  <!--[if IE]>
    <script src="assets/js/html5.js"></script>
  <![endif]-->
  <link href="<?= base_url('assets/css/core2.css') ?>"  rel="stylesheet" type="text/css" media="screen" />
  <link href="<?= base_url('assets/css/jgrowl.css') ?>" rel="stylesheet" type="text/css" media="screen" />
	<script src="<?= base_url('assets/js/jquery-1.8.2.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/js/jflot.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/js/jmods.js') ?>" type="text/javascript"></script>

	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

	<script src="<?= base_url('assets/js/validate.min.js') ?>"></script>

    <script src="<?= base_url('assets/tinymce/tiny_mce.js') ?>" type="text/javascript"></script>

  <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
</head>

<body>
	<div id="wrapper">
