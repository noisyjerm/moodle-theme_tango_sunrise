<?php
// This file is part of the Tango sunrise theme for Moodle 2.0
//
// Tango sunrise is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
//

/**
 * Tango sunrise theme
 * 
 * Theme for Moodle 2.0
 * Docked blocks represented by icons 
 * Short header. Easy Google analytics. Help popup. Login popup. Good looking.
 *
 * @author Jeremy FitzPatrick
 * @copyright (C) 2011 Jeremy FitzPatrick
 * @author John Stabinger (Brick theme 2010)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package theme
 * @category theme
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

// logo image setting
$name = 'theme_tango_sunrise/logo';
$title = get_string('logo','theme_tango_sunrise');
$description = get_string('logodesc', 'theme_tango_sunrise');
$default = $OUTPUT->pix_url('moodleicon', 'theme');
$setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
$settings->add($setting);

// Popup content
$name = 'theme_tango_sunrise/popup';
$title = get_string('popup','theme_tango_sunrise');
$description = get_string('popupdesc', 'theme_tango_sunrise');
$setting = new admin_setting_confightmleditor($name, $title, $description, '');
$settings->add($setting);

// Popup content
$name = 'theme_tango_sunrise/ga';
$title = get_string('ga','theme_tango_sunrise');
$description = get_string('gadesc', 'theme_tango_sunrise');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

}