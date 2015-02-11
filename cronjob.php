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

define('MODE', 'CRON');
define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
set_include_path(ROOT_PATH);

require('includes/common.php');

// Output transparent gif
HTTP::sendHeader('Cache-Control', 'no-cache');
HTTP::sendHeader('Content-Type', 'image/gif');
HTTP::sendHeader('Expires', '0');
$isSessionActive	= $SESSION->isActiveSession();
echo("\x47\x49\x46\x38\x39\x61\x01\x00\x01\x00\x80\x00\x00\x00\x00\x00\x00\x00\x00\x21\xF9\x04\x01\x00\x00\x00\x00\x2C\x00\x00\x00\x00\x01\x00\x01\x00\x00\x02\x02\x44\x01\x00\x3B");

if(!$isSessionActive)
{
	exit;
}

$cronjobID	= HTTP::_GP('cronjobID', 0);

if(empty($cronjobID))
{
	exit;
}

require 'includes/classes/Cronjob.class.php';

$cronjobsTodo	= Cronjob::getNeedTodoExecutedJobs();
if(!in_array($cronjobID, $cronjobsTodo))
{
	exit;
}

Cronjob::execute($cronjobID);
