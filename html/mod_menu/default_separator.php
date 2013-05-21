<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';

$arraytitle = explode("||",$item->title);

if(count($arraytitle)>1){
	$item->title=$arraytitle[1];
	switch($arraytitle[0]){
		case "#":
			$linktype="break";
			break;
		case "*#":
			$linktype = "<span class=\"blanktext\">&nbsp;</span>";
			break;
		case "modul":
			$document = JFactory::getDocument();
			$menumodul = &JModuleHelper::getModule($arraytitle[2],$arraytitle[1]);
			$renderer = $document->loadRenderer('module');
			?><div class="menumodul"><?php echo $renderer->render($menumodul, array('style' => $arraytitle[3])); ?></div><?php
			return;
			break;
		case "**":
			$linktype="<strong>".$arraytitle[1]."</strong>";
			break;
		default:
			$linktype = "<span class=\"title\">".$arraytitle[0]."</span><span class=\"title\">".$arraytitle[1]."</span>";
			break;
	}
}
else $linktype = $item->title;

if ($item->menu_image) {
	$item->params->get('menu_text', 1 ) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}


?><span class="separator"><?php echo $title; ?><?php echo $linktype; ?></span>
