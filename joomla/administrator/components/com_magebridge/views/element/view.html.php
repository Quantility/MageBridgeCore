<?php
/**
 * Joomla! component MageBridge
 *
 * @author    Yireo (info@yireo.com)
 * @package   MageBridge
 * @copyright Copyright 2016
 * @license   GNU Public License
 * @link      https://www.yireo.com
 */

// Check to ensure this file is included in Joomla! 
defined('_JEXEC') or die();

// Require the parent view
require_once 'view.common.php';

/**
 * HTML View class
 *
 * @static
 * @package    MageBridge
 */
class MageBridgeViewElement extends MageBridgeViewCommon
{
	/**
	 * Display method
	 *
	 * @param string $tpl
	 *
	 * @return mixed
	 */
	public function display($tpl = null)
	{
        JHtml::_('jquery.ui');
        JHtml::_('behavior.core');
        JHtml::_('script', 'jui/cms.js', false, true);

		// Check for AJAX
		if (JFactory::getApplication()->input->getInt('ajax') == 1)
		{
			$this->doAjaxLayout();
			$tpl = 'ajax';

			parent::display($tpl);

			return true;
		}

		// Determine the layout and data 
		switch (JFactory::getApplication()->input->getCmd('type'))
		{
			case 'product':
				$this->doProductLayout();
				break;

			case 'customer':
				$this->doCustomerLayout();
				break;

			case 'widget':
				$this->doWidgetLayout();
				break;

			case 'category':
			default:
				$this->doCategoryLayout();
				break;
		}

		parent::display($tpl);
	}
}
