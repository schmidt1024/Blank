<?php  
/*------------------------------------------------------------------------
# author    your name or company
# copyright Copyright © 2011 example.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.example.com
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// parameter
$modernizr = $this->params->get('modernizr');
$bootstrap = $this->params->get('bootstrap');
$compressor = $this->params->get('compressor');
$less = $this->params->get('less');
$lessusage = $this->params->get('lessusage');
$pie = $this->params->get('pie');

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$headdata = $doc->getHeadData();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

// remove generator tag
$this->setGenerator(null);

// disable scripts in head
require('headload.php');

// add template js
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr-2.6.2.js');
if ($bootstrap==1) $doc->addScript($tpath.'/js/jquery-1.8.2.min.js');
if ($bootstrap==1) $doc->addScript($tpath.'/js/jquery-noconflict.js');
if ($bootstrap==1) $doc->addScript($tpath.'/js/bootstrap.min.js');

// add template less/css
if ($less==1 && $bootstrap==1) $doc->addStyleSheet($tpath.'/css/bootstrap.min.css');
if ($less==1 && $bootstrap==1) $doc->addStyleSheet($tpath.'/css/bootstrap-responsive.min.css');
if ($less==1) $doc->addCustomTag('<link rel="stylesheet/less" href="'.$tpath.'/css/template.less">');
if ($less==1 && $lessusage==0) $doc->addCustomTag('<script src="'.$tpath.'/js/less-1.3.1.min.js" type="text/javascript"></script>');
if ($less==0) $doc->addStyleSheet($tpath.'/css/template.css.php?b='.$bootstrap.'&amp;c='.$compressor.'&amp;v=1');

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/apple-touch-icon-144x144-precomposed.png">
  <!--[if lte IE 8]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <?php if ($pie==1) : ?>
      <style> 
        {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
      </style>
    <?php endif; ?>
  <![endif]-->
</head>
	
<body class="<?php echo $pageclass; ?>">
  <!-- 
    YOUR CODE HERE
  -->
  <jdoc:include type="modules" name="debug" />
</body>

</html>

