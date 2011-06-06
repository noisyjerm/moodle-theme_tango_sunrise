<?php
// This file is part of the Tango sunrise theme for Moodle 2.0
//
// Tango sunrise is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
//

/**
 * Tango sunrise function library
 * 
 * @author Jeremy FitzPatrick
 * @copyright (C) 2011 Jeremy FitzPatrick
 * @author John Stabinger (Brick theme 2010)
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package theme
 * @category theme
 */

/**
 * @param $css
 * @param $logo
 * @returns string
 */
function tangosunrise_set_logo($css, $logo) {
    global $OUTPUT;
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = $OUTPUT->pix_url('logo', 'theme');
    }
    $css = str_replace($tag, $replacement, $css);
    
    return $css;
}

/**
 * @param $css
 * @param $theme
 * @returns string
 */
function tangosunrise_process_css($css, $theme) {
    // Set the logo image
    if (!empty($theme->settings->logo)) {
        $logo = $theme->settings->logo;
    } else {
        $logo = null;
    }
    $css = tangosunrise_set_logo($css, $logo);
    
    return $css;
}