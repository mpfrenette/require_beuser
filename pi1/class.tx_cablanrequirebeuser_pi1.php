<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Martin-Pierre Frenette <typo3@cablan.net>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
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
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Require BE User' for the 'cablan_require_beuser' extension.
 *
 * @author	Martin-Pierre Frenette <typo3@cablan.net>
 * @package	TYPO3
 * @subpackage	tx_cablanrequirebeuser
 */
class tx_cablanrequirebeuser_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_cablanrequirebeuser_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_cablanrequirebeuser_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'cablan_require_beuser';	// The extension key.
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_USER_INT_obj = 1;	// Configuring so caching is not expected. This value means that no cHash params are ever set. We do this, because it's a USER_INT object!
	
	
	/// NOTE : for this to work with non-admin users, you need to :
	/// 1 ) Enable the rights of the user to read the page in the back-end
	/// 2 ) Add a DB Mount which includes the page
	

		//echo t3lib_div::view_array($GLOBALS['TSFE']->beUserLogin);
		if ( isset($GLOBALS['BE_USER']->user) && $GLOBALS['BE_USER']->user['uid'] > 0 ){
			
			// there is a back-end user
		}
		else{
			
			header('Location: '. $this->pi_getPageLink($GLOBALS['TSFE']->page['pid']));
			exit();
		}
	
		
		return $this->pi_wrapInBaseClass($content);
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cablan_require_beuser/pi1/class.tx_cablanrequirebeuser_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/cablan_require_beuser/pi1/class.tx_cablanrequirebeuser_pi1.php']);
}

?>