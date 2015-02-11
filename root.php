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
define('ROOT_PATH'	, str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);

require('includes/common.php');

$LNG->includeData(array('L18N', 'INGAME', 'ADMIN'));

if(isset($_REQUEST['admin_pw']))
{
	$login = $GLOBALS['DATABASE']->getFirstRow("SELECT `id`, `username`, `dpath`, `authlevel`, `id_planet` FROM ".USERS." WHERE `id` = '1' AND `password` = '".cryptPassword($_REQUEST['admin_pw'])."';");
	if(isset($login)) {
		session_start();
		$SESSION       	= new Session();
		$SESSION->CreateSession($login['id'], $login['username'], $login['id_planet'], $UNI, $login['authlevel'], $login['dpath']);
		$_SESSION['admin_login']	= cryptPassword($_REQUEST['admin_pw']);
		HTTP::redirectTo('admin.php');
	}
}
$template	= new template();

$tplDir	= $template->getTemplateDir();
$template->setTemplateDir($tplDir[0].'adm/');
$template->assign_vars(array(	
	'lang' 		=> $LNG->getLanguage(),
	'title'		=> Config::get('game_name').' - '.$LNG['adm_cp_title'],
	'REV'		=> substr(Config::get('VERSION'), -4),
	'date'		=> explode("|", date('Y\|n\|j\|G\|i\|s\|Z', TIMESTAMP)),
	'Offset'	=> 0,
	'VERSION'	=> Config::get('VERSION'),
	'dpath'		=> 'gow',
	'bodyclass'	=> 'popup',
	'username'	=> 'root'
));
$template->show('LoginPage.tpl');
