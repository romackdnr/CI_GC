<!doctype html>
<!--[if lte IE 8]><html class="msie no-js" lang="en"><![endif]-->
<!--[if gte IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?= $metatitle ?></title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="<?= base_url('assets/images/ico/favicon.ico') ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/images/ico/apple-touch-icon-114x114-precomposed.png') ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/images/ico/apple-touch-icon-72x72-precomposed.png') ?>">
<link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/images/ico/apple-touch-icon-57x57-precomposed.png') ?>">
<link rel="stylesheet/less" href="<?= base_url('assets/less/core.less') ?>">
<link rel="stylesheet/less" href="<?=base_url('assets/less/home.less')?>">
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<script src="<?= base_url('assets/js/script-hdr.min.js') ?>"></script>
</head>

<body>

<div class="wrap header">
	<header>

  	<nav id="topRightSign">
  		<ul>
  			<li><a href="#" class="selected">Sign up</a></li>
        <li><a href="#">Sign in</a></li>
  		</ul>
  	</nav>
    <div id="findCasino">
     <div class="title">Find a Casino Nearby</div>
     <form action="page.php" method="get">
     <input name="p" type="hidden" value="search">
       <ul>
        <li><input name="CasinoName" type="text"></li>
        <li><input name="CasinoCity" type="text"></li>
        <li><input name="CasinoState" type="text"></li>
        <li><input name="CasinoZip" type="text"></li>
        <li><input name="search" type="submit" value="Search" class="glowYellow"></li>
       </ul>
     </form>
    </div>
    
	</header>
</div>

<div class="wrap <?= $pattern ?>">