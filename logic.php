<?php defined('_JEXEC') or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$headdata = $doc->getHeadData();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

// parameter
$modernizr = $this->params->get('modernizr');
$cssmethod = $this->params->get('cssmethod');
$lessjs = $this->params->get('lessjs');
$foundation = $this->params->get('foundation');
$bootstrap = $this->params->get('bootstrap');
$fontawesome = $this->params->get('fontawesome');
$jquery = $this->params->get('jquery');
$pie = $this->params->get('pie');
$googlefont = $this->params->get('googlefont');

// advanced parameter
if ($app->isSite()) {
  // disable js
  if ( $this->params->get('disablejs') ) {
    $fnjs=$this->params->get('fnjs');
    if (trim($fnjs) != '') {
      $filesjs=explode(',', $fnjs);
      $head = (array) $headdata['scripts'];
      $newhead = array();         
      foreach($head as $key => $elm) {
        $add = true;
        foreach ($filesjs as $dis) {
          if (strpos($key,$dis) !== false) {
            $add=false;
            break;
          } 
        }
        if ($add) $newhead[$key] = $elm;
      }
      $headdata['scripts'] = $newhead;
    } 
  } 
  // disable css
  if ( $this->params->get('disablecss') ) {
    $fncss=$this->params->get('fncss');
    if (trim($fncss) != '') {
      $filescss=explode(',', $fncss);
      $head = (array) $headdata['styleSheets'];
      $newhead = array();         
      foreach($head as $key => $elm) {
        $add = true;
        foreach ($filescss as $dis) {
          if (strpos($key,$dis) !== false) {
            $add=false;
            break;
          } 
        }
        if ($add) $newhead[$key] = $elm;
      }
      $headdata['styleSheets'] = $newhead;
    } 
  }
  $doc->setHeadData($headdata); 
}

// generator tag
$this->setGenerator(null);

// force latest IE & chrome frame
$doc->setMetadata('x-ua-compatible', 'IE=edge,chrome=1');

// add javascripts
if ($modernizr==1) $doc->addScript($tpath.'/js/modernizr-2.6.2.js');
if ($foundation==1) : 
  $doc->addScript($tpath.'/js/jquery-1.9.1.min.js');
  $doc->addScript($tpath.'/js/foundation.min.js');
endif;
if ($bootstrap==1 && JVERSION>='3') :
  JHtml::_('bootstrap.framework');
elseif ($bootstrap==1) :
  $doc->addScript($tpath.'/js/jquery-1.9.1.min.js');
  $doc->addScript($tpath.'/js/jquery-noconflict.js');
  $doc->addScript($tpath.'/js/bootstrap.min.js');
endif;
if ($jquery==1) $doc->addScript($tpath.'/js/jquery-1.9.1.min.js');

// add stylesheets
if ($cssmethod=='css') : 
  if ($foundation==0 && $bootstrap==0) $doc->addStyleSheet($tpath.'/css/normalize.css');
  if ($foundation==1) $doc->addStyleSheet($tpath.'/css/foundation.min.css');
  if ($bootstrap==1) :
    $doc->addStyleSheet($tpath.'/css/bootstrap.min.css');
    $doc->addStyleSheet($tpath.'/css/bootstrap-responsive.min.css');
    if ($fontawesome==1) $doc->addStyleSheet($tpath.'/css/font-awesome.min.css');
  endif;
endif;

// add google font
if ($googlefont !='') $doc->addStyleSheet("https://fonts.googleapis.com/css?family=".$googlefont);

// file ending
if ($cssmethod=='min') : 
  $ext = '.php'; 
  $cssmethod = 'css';
else :
  $ext = '';
endif;

// add template sheet
if ($lessjs==0) $doc->addStyleSheet($tpath.'/'.$cssmethod.'/template.css'.$ext.'?f='.$foundation.'&amp;b='.$bootstrap.'&amp;fa='.$fontawesome.'&amp;v=1');
if ($lessjs==1 && $cssmethod=='less') :
  $doc->addCustomTag('<link rel="stylesheet/less" type="text/css" href="'.$tpath.'/'.$cssmethod.'/template.less" />');
  $doc->addCustomTag('<script src="'.$tpath.'/js/less-1.3.3.min.js" type="text/javascript"></script>');
  //$doc->addScript($tpath.'/js/less-1.3.3.min.js');
endif;


?>