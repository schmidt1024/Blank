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
//Niels
$last_level_one_id = 0;
for($j=count($list)-1; $j>0; $j--){
	if($list[$j]->level == 1){
		$last_level_one_id = $list[$j]->id;
		break;
	}
} $first_start = true;
//Niels
?>

<ul class="menu<?php echo $class_sfx;?>"<?php
	$tag = '';
	if ($params->get('tag_id')!=NULL) {
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
	?>>
	<?php
	foreach ($list as $i => &$item) :

		//NIELS HACK
		if($item->parent_id==1) {
			if($item->anchor_css!=""){
				$childrens=0;
				$childcounter=0;
				$parentmenuid = $item->id;
				foreach($list as $parentid) {if( $parentid->parent_id==$item->id ) {$childrens++;}}
				//NIEMERSZEINHACK
				if (preg_match('/columns-(\d+)/', $item->anchor_css, $matches)) {
					$spalten=$matches[1];
				}

				if (preg_match('/columnwidth-(\d+)/', $item->anchor_css, $matches)) {
					$breite = $matches[1];
				}
				if (preg_match('/bruch1-(\d+)/', $item->anchor_css, $matches)) {
					$bruch1 = $matches[1];
				}
				if (preg_match('/bruch2-(\d+)/', $item->anchor_css, $matches)) {
					$bruch2 = $matches[1];
				}
				$divwidth 	= $spalten * $breite;
				$divprozent = floor(99 / $spalten);
				$divwidth 	= '<div style="width:'.$divwidth.'px;">';

			}
			else {
				$divwidth = null;
			}
		}

		if($parentmenuid==$item->parent_id){
			$childcounter++;
		}


		$class = 'item-'.$item->id;
		if ($item->id == $active_id) {
			$class .= ' current';
		}
		if ($item->type == "separator") {
			$class .= ' separator';
			if(preg_match("/nnmap/",$item->title)){
				$class .= ' nnmap';
			}
		}


		if (in_array($item->id, $path)) {
			$class .= ' active';
		}
		elseif ($item->type == 'alias') {
			$aliasToId = $item->params->get('aliasoptions');
			if (count($path) > 0 && $aliasToId == $path[count($path)-1]) {
				$class .= ' active';
			}
			elseif (in_array($aliasToId, $path)) {
				$class .= ' alias-parent-active';
			}
		}
		
		if ($item->deeper) {
			$class .= ' deeper';
		}

		if ($item->parent) {
			$class .= ' parent';
		}
		//start first last changes
		if($first_start){
			$class .= ' first';
			$first_start = false;
		}else if ($item->shallower || $item->id == $last_level_one_id ) {
			$class .= ' last';
		}

		if ($item->deeper) {
			$class .= ' deeper';
			$first_start = true;
		}
		//end first last changes

		if (!empty($class)) {
			$class = ' class="'.trim($class) .'"';
		}


		//HACK
		if($parentmenuid==$item->parent_id){
		 if(isset($bruch1) and $childcounter==$bruch1) echo '</div>'.'<div class="bruch1" style="float:left; width:'.$divprozent.'%;">';
		 if(isset($bruch2) and $childcounter==$bruch2) echo '</div>'.'<div class="bruch2" style="float:left; width:'.$divprozent.'%;">';
		}
		//ENDE
		echo '<li'.$class.'>';


		// Render the menu item.
		switch ($item->type) :
			case 'separator':
			case 'url':
			case 'component':
				require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
				break;

			default:
				require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
				break;
		endswitch;


		// The next item is deeper.
		if ($item->deeper) {
			if($class_sfx =" mainmenu")
				echo '
				<ul class="submenu '.$item->anchor_css.'"><li class="arrow"></li>';
				if($item->parent_id==1 and $item->anchor_css!="")	echo $divwidth.'<div class="first" style="float:left; width:'.$divprozent.'%;">';
		}
		// The next item is shallower.
		elseif ($item->shallower) {
			echo '</li>';
			//letzter Sublink
			if($parentmenuid==$item->parent_id){
				echo '
				</div></div><div class="clear"></div>';
			}
			echo str_repeat('</ul></li>', $item->level_diff);
		}
		// The next item is on the same level.
		else {
			echo '</li>';
		}
	endforeach;
	?></ul>
