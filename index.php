<?php

/**
 *  SpaceUni
 *  Copyright (C) 2015 Danter14 
 *
 * Ce programme est un logiciel libre: vous pouvez le redistribuer et / ou modifier
 * Selon les termes de la Licence Publique Générale GNU publiée par
 * La Free Software Foundation, soit la version 3 de la licence, ou
 * (À votre choix) toute version ultérieure.
 *
 * Ce programme est distribué dans l'espoir qu'il sera utile,
 * Mais SANS AUCUNE GARANTIE; sans même la garantie implicite de
 * COMMERCIALISATION ou D'ADAPTATION A UN USAGE PARTICULIER. voir la
 * GNU General Public License pour plus de détails.
 *
 * Vous devriez avoir reçu une copie de la GNU General Public License
 * Avec ce programme. Si non, voir <http://www.gnu.org/licenses/>.
 *
 * @package SpaceUni
 * @author Danter14 <danter14000@gmail.com>
 * @copyright 2015 <danter14000@gmail.com>
 * @license http://www.gnu.org/licenses/gpl.html GNU GPLv3 License
 * @version 1.0.0 (10.02.2015)
 * @info $Id: admin.php 10.02.2015
 * @link http://space-univers.com/
 */

define('MODE', 'LOGIN');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);

require('includes/pages/login/AbstractPage.class.php');
require('includes/pages/login/ShowErrorPage.class.php');
require('includes/common.php');

$page 		= HTTP::_GP('page', 'index');
$mode 		= HTTP::_GP('mode', 'show');
$page		= str_replace(array('_', '\\', '/', '.', "\0"), '', $page);
$pageClass	= 'Show'.ucwords($page).'Page';

if(!file_exists('includes/pages/login/'.$pageClass.'.class.php')) {
	ShowErrorPage::printError($LNG['page_doesnt_exist']);
}

// Added Autoload in feature Versions
require('includes/pages/login/'.$pageClass.'.class.php');

$pageObj	= new $pageClass;
// PHP 5.2 FIX
// can't use $pageObj::$requireModule
$pageProps	= get_class_vars(get_class($pageObj));

if(isset($pageProps['requireModule']) && $pageProps['requireModule'] !== 0 && !isModulAvalible($pageProps['requireModule'])) {
	ShowErrorPage::printError($LNG['sys_module_inactive']);
}

if(!is_callable(array($pageObj, $mode))) {	
	if(!isset($pageProps['defaultController']) || !is_callable(array($pageObj, $pageProps['defaultController']))) {
		ShowErrorPage::printError($LNG['page_doesnt_exist']);
	}
	$mode	= $pageProps['defaultController'];
}

$pageObj->{$mode}();
