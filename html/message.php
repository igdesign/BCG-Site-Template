<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.Beez3
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

function renderMessage($msgList)
{
	$buffer  = null;
	$buffer .= "<div id=\"system-message-container\">";

	if (is_array($msgList))
	{
		$buffer .= "<dl id=\"system-message\">";
		foreach ($msgList as $type => $msgs)
		{
			if (count($msgs))
			{
				$buffer .= "<dt class=\"" . strtolower($type) . "\">" . JText::_($type) . "</dt>";
				$buffer .= "<dd class=\"" . strtolower($type) . " message\">";
				$buffer .= "<ul>";
				foreach ($msgs as $msg)
				{
					$buffer .= "<li>" . $msg . "</li>";
				}
				$buffer .= "</ul>";
				$buffer .= "</dd>";
			}
			$buffer .= "</dl>";
		}

		$buffer .= "</div>";
		return $buffer;
	}
}
