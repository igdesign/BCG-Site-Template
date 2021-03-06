<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_finder
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_SITE . '/components/com_finder/helpers/html');

JHtml::_('behavior.framework');
JHtml::_('bootstrap.tooltip');

// Load the smart search component language file.
$lang = JFactory::getLanguage();
$lang->load('com_finder', JPATH_SITE);

$suffix = $params->get('moduleclass_sfx');
$output = '<input type="text" name="q" id="mod-finder-searchword" class="'.$suffix.'__input"  value="' . htmlspecialchars(JFactory::getApplication()->input->get('q', '', 'string')) . '" />';
$button = '';
$label = '';

if ($params->get('show_label', 1))
{
	$label = '<label for="mod-finder-searchword" class="' . $suffix . '__form-label">' . $params->get('alt_label', JText::_('JSEARCH_FILTER_SUBMIT')) . '</label>';

	switch ($params->get('label_pos', 'left')):
		case 'top' :
			$label = $label . '<br />';
			$output = $label . $output;
			break;

		case 'bottom' :
			$label = '<br />' . $label;
			$output = $output . $label;
			break;

		case 'right' :
			$output = $output . $label;
			break;

		case 'left' :
		default :
			$output = $label . $output;
			break;
	endswitch;
}

if ($params->get('show_button', 1))
{
	$button = '<button class="' . $suffix . '__button button" type="submit" title="' . JText::_('MOD_FINDER_SEARCH_BUTTON') . '"><i class="fa fa-fw fa-search"></i></button>';

	switch ($params->get('button_pos', 'right')):
		case 'top' :
			$button = $button . '<br />';
			$output = $button . $output;
			break;

		case 'bottom' :
			$button = '<br />' . $button;
			$output = $output . $button;
			break;

		case 'right' :
			$output = $output . $button;
			break;

		case 'left' :
		default :
			$output = $button . $output;
			break;
	endswitch;
}

JHtml::stylesheet('com_finder/finder.css', false, true, false);
?>

<script type="text/javascript">
//<![CDATA[
	jQuery(function($)
	{
		var value, $searchword = $('#mod-finder-searchword');

		// Set the input value if not already set.
		if (!$searchword.val())
		{
			$searchword.val('<?php echo JText::_('MOD_FINDER_SEARCH_VALUE', true); ?>');
		}

		// Get the current value.
		value = $searchword.val();

		// If the current value equals the default value, clear it.
		$searchword.on('focus', function()
		{	var $el = $(this);
			if ($el.val() === '<?php echo JText::_('MOD_FINDER_SEARCH_VALUE', true); ?>')
			{
				$el.val('');
			}
		});

		// If the current value is empty, set the previous value.
		$searchword.on('blur', function()
		{	var $el = $(this);
			if (!$el.val())
			{
				$el.val(value);
			}
		});

		$('#mod-finder-searchform').on('submit', function(e){
			e.stopPropagation();
			var $advanced = $('#mod-finder-advanced');
			// Disable select boxes with no value selected.
			if ( $advanced.length)
			{
				 $advanced.find('select').each(function(index, el) {
					var $el = $(el);
					if(!$el.val()){
						$el.attr('disabled', 'disabled');
					}
				});
			}
		});

		/*
		 * This segment of code sets up the autocompleter.
		 */
		<?php if ($params->get('show_autosuggest', 1)) : ?>
			<?php JHtml::_('script', 'com_finder/autocompleter.js', false, true); ?>
			var url = '<?php echo JRoute::_('index.php?option=com_finder&task=suggestions.display&format=json&tmpl=component', false); ?>';
			var ModCompleter = new Autocompleter.Request.JSON(document.getElementById('mod-finder-searchword'), url, {'postVar': 'q'});
		<?php endif; ?>
	});
//]]>
</script>

<form id="mod-finder-searchform" action="<?php echo JRoute::_($route); ?>" method="get" class="<?php echo $suffix; ?>__form form-search">
	<div class="finder<?php echo $suffix; ?>__container">
		<?php
		// Show the form fields.
		echo $output;
		?>

		<?php if ($params->get('show_advanced', 1)) : ?>
			<?php if ($params->get('show_advanced', 1) == 2) : ?>
				<br />
				<a class="<?php echo $suffix; ?>__link" href="<?php echo JRoute::_($route); ?>"><?php echo JText::_('COM_FINDER_ADVANCED_SEARCH'); ?></a>
			<?php elseif ($params->get('show_advanced', 1) == 1) : ?>
				<div id="mod-finder-advanced">
					<?php echo JHtml::_('filter.select', $query, $params); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php echo modFinderHelper::getGetFields($route, (int) $params->get('set_itemid')); ?>
	</div>
</form>
