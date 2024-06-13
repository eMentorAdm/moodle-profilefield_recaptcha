<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin administration pages are defined here.
 *
 * @package     profilefield_recaptcha
 * @category    admin
 * @author      Hamza Yamine  
 * @copyright   2024 e-Mentor s.r.l. - service@e-mentor.it
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class profile_define_recaptcha extends profile_define_base {

    /**
     * Add elements for creating/editing a text profile field.
     *
     * @param MoodleQuickForm $form
     */
    public function define_form_specific($form) {
        // Default data.
        $form->addElement('text', 'param1', "Site key", 'size="50"');
        $form->setType('param1', PARAM_TEXT);

        $form->addElement('text', 'param2', "Secret key", 'size="50"');
        $form->setType('param2', PARAM_TEXT);

        $form->addElement('text', 'param3', "Treshold", 'size="50"');
        $form->setType('param3', PARAM_FLOAT);

    }
}
