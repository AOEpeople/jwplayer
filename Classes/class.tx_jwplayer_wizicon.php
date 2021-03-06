<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Martin Tepper (martin.tepper@aoemedia.de)
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Class that adds the wizard icon.
 *
 */
class tx_jwplayer_wizicon {

	/**
	 * Adds the newloginbox wizard icon
	 *
	 * @param array	 Input array with wizard items for plugins
	 * @return array Modified input array, having the item for newloginbox added.
	 */
	function proc($wizardItems)	{
		global $LANG;

		$LL = $this->includeLocalLang();

		$wizardItems['plugins_tx_jwplayer_pivideo'] = array(
			'icon'=>t3lib_extMgm::extRelPath('jwplayer').'tt_content_jwplayer.gif',
			'title'=>$LANG->getLLL('video.title',$LL),
			'description'=>$LANG->getLLL('video.description',$LL),
			'params'=>'&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=jwplayer_pivideo'
		);

		return $wizardItems;
	}

	/**
	 * Includes the locallang file for the 'jwplayer' extension
	 *
	 * @return array The array with language labels
	 */
	function includeLocalLang()	{
		$llFile = t3lib_extMgm::extPath('jwplayer').'locallang.xml';
		$LOCAL_LANG = t3lib_div::readLLXMLfile($llFile, $GLOBALS['LANG']->lang);
		return $LOCAL_LANG;
		
		if (class_exists('t3lib_l10n_parser_Llxml')) {
				/** @var $l10nParser t3lib_l10n_parser_Llxml */
			$l10nParser = t3lib_div::makeInstance('t3lib_l10n_parser_Llxml');
			$LOCAL_LANG = $l10nParser->getParsedData($llFile, $GLOBALS['LANG']->lang);
		} else {
			$LOCAL_LANG = t3lib_div::readLLXMLfile($llFile, $GLOBALS['LANG']->lang);
		}

		return $LOCAL_LANG;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jwplayer/Classes/class.tx_jwplayer_wizicon.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/jwplayer/Classes/class.tx_jwplayer_wizicon.php']);
}

?>