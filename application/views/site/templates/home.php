<!doctype html>
<!--[if lte IE 8]><html class="msie no-js" lang="en"><![endif]-->
<!--[if gte IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?=$metatitle;?></title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width">
<link rel="shortcut icon" href="<?= base_url('assets/images/ico/favicon.ico') ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/images/ico/apple-touch-icon-114x114-precomposed.png') ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/images/ico/apple-touch-icon-72x72-precomposed.png') ?>">
<link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/images/ico/apple-touch-icon-57x57-precomposed.png') ?>">
<link rel="stylesheet/less" href="<?= base_url('assets/less/core.less') ?>">
<?=emptyblock('headercodes');?>
<script src="<?= base_url('assets/js/script-hdr.min.js') ?>"></script>
</head>

<body>

<div class="wrap header">
	<header>

  	<nav id=topRightSign>
  		<ul>
  			<li><a href="#" class="selected">Sign up</a></li>
            <li><a href="#">Sign in</a></li>
  		</ul>
  	</nav>
    <div id="findCasino">
     <div class="title">Find a Casino Nearby
     </div>
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

<div class="wrap home">
	
		<?=emptyblock('content');?>

</div>

<div class="wrap footer">
	<footer>
        <div id="footerMenu">
            <a href="index.php">Home</a> 
            <a href="page.php?p=about_us">About</a> 
            <a href="page.php?p=partners.php">Partners</a> 
            <a href="page.php?p=sign_in">Members</a> 
            <a href="page.php?p=join_us">Join</a> 
            <a href="page.php?p=whats_happening">Blog</a> 
            <a href="page.php?p=terms">Terms</a> 
            <a href="page.php?p=faq">FAQ</a> 
            <a href="page.php?p=privacy">Privacy</a> 
            <a href="page.php?p=contact">Contact</a> 
            <a href="page.php?p=suggestions">Suggestions</a>
        <div id="socialMedia">Follow Us <a href="#"><img src="assets/images/ico/icon_facebook.jpg" alt="facebook" border="0"></a><a href="#"><img src="assets/images/ico/icon_googleplus.jpg" alt="facebook" border="0"></a><a href="#"><img src="assets/images/ico/icon_twitter.jpg" alt="facebook" border="0"></a></div>
    </div>
    
    <div id="footerLeft"><a href="terms.php">Terms & Conditions</a></div>
    <div id="footerRight">
		web design by <a signature href="#" target="_blank">dog and rooser, inc.</a></p>
     </div>
             <p>All rights reserved. Copyright <?=date('Y');?>. <a copyright href="#">Golden Cricket</a>. 
    
     
    
	</footer>
</div>

<!-- INT/EXT JAVASCRIPT -->
<script src="<?= base_url('assets/js/script-ftr.min.js') ?>"></script>
<?=emptyblock('extracodes');?>
<script>
	//GOOGLE ANALYTIC SCRIPT
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>