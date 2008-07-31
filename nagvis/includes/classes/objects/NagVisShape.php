<?php
/*****************************************************************************
 *
 * NagVisShape.php - Class of a Shape in NagVis with all necessary 
 *                  informations which belong to the object handling in NagVis
 *
 * Copyright (c) 2004-2008 NagVis Project (Contact: lars@vertical-visions.de)
 *
 * License:
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2 as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
 *
 *****************************************************************************/
 
/**
 * @author	Lars Michelsen <lars@vertical-visions.de>
 */
class NagVisShape extends NagVisStatelessObject {
	var $CORE;
	var $MAINCFG;
	var $LANG;
	
	/**
	 * Class constructor
	 *
	 * @param		Object 		Object of class GlobalMainCfg
	 * @param		Object 		Object of class GlobalBackendMgmt
	 * @param		Object 		Object of class GlobalLanguage
	 * @param		String	 	Image of the shape
	 * @author	Lars Michelsen <lars@vertical-visions.de>
	 */
	function NagVisShape(&$CORE, $icon) {
		$this->CORE = &$CORE;
		$this->MAINCFG = &$CORE->MAINCFG;
		$this->LANG = &$CORE->LANG;
		
		$this->iconPath = $this->MAINCFG->getValue('paths', 'shape');
		$this->iconHtmlPath = $this->MAINCFG->getValue('paths', 'htmlshape');
		
		$this->icon = $icon;
		$this->type = 'shape';
		parent::NagVisStatelessObject($this->CORE);
	}
	
	/**
	 * PUBLIC parse()
	 *
	 * Parses the object
	 *
	 * @return	String		HTML code of the object
	 * @author	Lars Michelsen <lars@vertical-visions.de>
	 */
	function parse() {
		return $this->parseIcon();
	}
	
	/**
	 * Gets the hover menu of a shape if it is requested by configuration
	 *
	 * @return	String	The Link
	 * @author 	Lars Michelsen <lars@vertical-visions.de>
	 */
	function getHoverMenu() {
		if(isset($this->hover_url) && $this->hover_url != '') {
			parent::getHoverMenu();
		}
	}
	
	
	/**
	 * PRIVATE getUrl()
	 *
	 * Returns the url for the object link
	 *
	 * @return	String	URL
	 * @author 	Lars Michelsen <lars@vertical-visions.de>
	 */
	function getUrl() {
		if(isset($this->url) && $this->url != '') {
			$url = parent::getUrl();
		} else {
			$url = '';
		}
		return $url;
	}
	
	/**
	 * Just a dummy here (Shape won't need an icon)
	 *
	 * @author	Lars Michelsen <lars@vertical-visions.de>
	 */
	function fetchIcon() {
		// Nothing to do here, icon is set in constructor
	}
}
?>
