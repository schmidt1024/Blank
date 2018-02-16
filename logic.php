<?php defined( '_JEXEC' ) or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$tpath = $this->baseurl.'/templates/'.$this->template;

// generator tag
$this->setGenerator(null);

// unset
// unset($doc->_scripts[$this->baseurl .'/media/jui/js/jquery.min.js']);
// unset($doc->_scripts[$this->baseurl .'/media/jui/js/jquery-noconflict.js']);
// unset($doc->_scripts[$this->baseurl .'/media/jui/js/jquery-migrate.min.js']);
// unset($doc->_scripts[$this->baseurl .'/media/system/js/caption.js']);
// if (isset($doc->_script['text/javascript']))
// {
//     $doc->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\'\,\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\);\s*}\s*\);\s*%', '', $doc->_script['text/javascript']);
//     $doc->_script['text/javascript'] = preg_replace("%\s*jQuery\(document\)\.ready\(function\(\)\{\s*jQuery\('\.hasTooltip'\)\.tooltip\(\{\"html\":\s*true,\"container\":\s*\"body\"\}\);\s*\}\);\s*%", '', $doc->_script['text/javascript']);
//     if (empty($doc->_script['text/javascript']))
//     {
//         unset($doc->_script['text/javascript']);
//     }
// }

// css
// $doc->addStyleSheet($tpath.'/css/custom.css');
$doc->addStyleSheet($tpath.'/build/style.css');
