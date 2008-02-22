<?php
// $Id: function.pnusergetvar.php 16722 2005-08-27 12:35:10Z  $
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

/**
 * pnRender plugin
 * 
 * This file is a plugin for pnRender, the PostNuke implementation of Smarty
 *
 * @package      Xanthia_Templating_Environment
 * @subpackage   pnRender
 * @version      $Id: function.pnusergetvar.php 16722 2005-08-27 12:35:10Z  $
 * @author       The PostNuke development team
 * @link         http://www.postnuke.com  The PostNuke Home Page
 * @copyright    Copyright (C) 2002 by the PostNuke Development Team
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */ 

 
/**
 * Smarty function to get a user variable
 * 
 * This function obtains a user-specific variable from the PostNuke system.
 * 
 * Note that the results should be handled by the pnvarprepfordisplay of the 
 * pnvarprephtmldisplay modifiers before being displayed.
 * 
 * 
 * Available parameters:
 *   - name:    The name of the variable being requested
 *   - uid:     The user id to obtain the variable for - this parameter is optional 
 *   - assign:  If set, the results are assigned to the corresponding variable instead of printed out
 * 
 * Example
 *   <!--[pnusergetvar name="user_icq" uid=1|pnvarprepfordisplay]-->
 * 
 * 
 * @author       Mark West
 * @since        23/10/2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $name        The name of the parameter being requested
 * @param        integer     $uid         The user id to obtain the variable for - this parameter is optional
 * @return       string      The user variable
 */
function smarty_function_pnusergetvar ($params, &$smarty) 
{
    extract($params);
	unset($params);

    if (!isset($name)) {
        $smarty->trigger_error("pnusergetvar: attribute name required");
        return false;
    }    
    
    if (isset($uid)) {
		$result = pnUserGetVar($name, $uid);
    } else {
	    $result = pnUserGetVar($name);
	}

    if (isset($assign)) {
        $smarty->assign($assign, $result);
    } else {
        return $result;        
    }        
}

?>