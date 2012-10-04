<?php  
/*------------------------------------------------------------------------
# author    your name or company
# copyright Copyright (C) 2011 example.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.example.com
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

function modChrome_slider($module, &$params, &$attribs) {
	echo JHtml::_('sliders.panel',JText::_($module->title),'module'.$module->id);
	echo $module->content;
}

function modChrome_mystyle($module, &$params, &$attribs) { ?>
	<div class="moduletable <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
		<div class="bghelper">
			<h3><?php echo JText::_( $module->title ); ?></h3>
			<div class="modulcontent"><?php echo $module->content; ?></div>
		</div>
	</div><?php
}

?>