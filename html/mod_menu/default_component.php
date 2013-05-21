<?php
/**
 * @version		$Id: default_component.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="'.$item->anchor_css.'" ' : '';
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';

$arraytitle = explode("||",$item->title);
if(count($arraytitle)>1){
	$item->title=$arraytitle[1];
	switch($arraytitle[0]){
		case "**":
			$linktype="<strong>".$arraytitle[1]."</strong>";
			break;
		default:
			$linktype="<span class=\"title\">".$arraytitle[0]."</span><span class=\"subtitle\">".$arraytitle[1]."</span>";
			break;
	}
}
else $linktype = $item->title;

if ($item->menu_image) {
	$item->params->get('menu_text', 1 ) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}


switch ($item->browserNav) :
	default:
	case 0:
		?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" <?php echo $title; ?>><span><?php echo $linktype; ?></span></a><?php
		break;
	case 1:
		// _blank
		?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><span><?php echo $linktype; ?></span></a><?php
		break;
	case 2:
		// window.open
		?><a <?php echo $class; ?>href="<?php echo $item->flink.'&amp;tmpl=component'; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><span><?php echo $linktype; ?></span></a>
		<?php
		break;
endswitch;
