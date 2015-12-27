<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagenavigation
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$lang = JFactory::getLanguage(); ?>

<ul class="pager pagenav page-navigation">
<?php if ($row->prev) :
	$direction = $lang->isRtl() ? 'right' : 'left'; ?>
	<li class="previous page-navigation__item ">
		<a href="<?php echo $row->prev; ?>" rel="prev" class="page-navigation__link button">
			<?php echo '<span class="icon-chevron-' . $direction . '"></span> ' . $row->prev_label; ?>
		</a>
	</li>
<?php endif; ?>
<?php if ($row->next) :
	$direction = $lang->isRtl() ? 'left' : 'right'; ?>
	<li class="next page-navigation__item ">
		<a href="<?php echo $row->next; ?>" rel="next" class="page-navigation__link button">
			<?php echo $row->next_label . ' <span class="icon-chevron-' . $direction . '"></span>'; ?>
		</a>
	</li>
<?php endif; ?>
</ul>
