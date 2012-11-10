<?php  
/*------------------------------------------------------------------------
# author    your name or company
# copyright Copyright © 2011 example.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.example.com
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die; 

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$headdata = $doc->getHeadData();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

// parameter
$modernizr = $this->params->get('modernizr');
$cssmethod = $this->params->get('cssmethod');
$bootstrap = $this->params->get('bootstrap');
$pie = $this->params->get('pie');
require('head.php');

// remove generator tag
$this->setGenerator(null);

// add js
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr-2.6.2.js');
if ($bootstrap==1 && JVERSION>='3') :
  JHtml::_('bootstrap.framework');
else :
  if ($bootstrap==1) $doc->addScript($tpath.'/js/jquery-1.8.2.min.js');
  if ($bootstrap==1) $doc->addScript($tpath.'/js/jquery-noconflict.js');
  if ($bootstrap==1) $doc->addScript($tpath.'/js/bootstrap.min.js');
endif;

// add css
if ($bootstrap==0) $doc->addStyleSheet($tpath.'/css/default/normalize.css');
if ($bootstrap==1) $doc->addStyleSheet($tpath.'/css/default/bootstrap.min.css');
if ($bootstrap==1) $doc->addStyleSheet($tpath.'/css/default/bootstrap-responsive.min.css');
if ($cssmethod=='minified') $ext='.php';
$doc->addStyleSheet($tpath.'/css/'.$cssmethod.'/template.css'.$ext.'?v=1');

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <jdoc:include type="head" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png">
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

