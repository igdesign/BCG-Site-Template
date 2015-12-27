<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$classSfx = explode(' ', $class_sfx);
$classes = ['list' => [], 'item' => [], 'link' => [], 'text' => []];

foreach($classSfx as $index => $class) {
	foreach($classes as $type => $value) {
		$classes[$type][] = $class.'__'.$type;
	}
}

foreach($classes as $i => $class) {
	$classes[$i] = implode(' ', $class);
}

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="'.$classes['link'].' '.$item->anchor_css.'" ' : 'class="'.$classes['link'].'"';
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
if ($item->menu_image)
	{
		$item->params->get('menu_text', 1) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}
else { $linktype = $item->title;
}
$flink = $item->flink;
$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));

switch ($item->browserNav) :
	default:
	case 0:
?><a <?php echo $class; ?>href="<?php echo $flink; ?>" <?php echo $title; ?>><i class="<?= $classes['text'] ?>"><?php echo $linktype; ?></i></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?>href="<?php echo $flink; ?>" target="_blank" <?php echo $title; ?>><i class="<?= $classes['text'] ?>"><?php echo $linktype; ?></i></a><?php
		break;
	case 2:
		// window.open
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,'.$params->get('window_open');
			?><a <?php echo $class; ?>href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;" <?php echo $title; ?>><i class="menu__text"><?php echo $linktype; ?></i></a><?php
		break;
endswitch;
