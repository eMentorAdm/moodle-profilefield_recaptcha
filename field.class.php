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
class profile_field_recaptcha extends profile_field_base {


    private const RECAPTCHA_API_URL = "https://www.google.com/recaptcha/api.js"; 

    private const RECAPTCHA_VERIFY_URL = "https://www.google.com/recaptcha/api/siteverify"; 

    /**
     * Overwrite the base class to display the data for this field
     */
    public function display_data() {
        // // Default formatting.
        // $data = format_string($this->data);

        // // Are we creating a link?
        // if (!empty($this->field->param4) && !empty($data)) {

        //     // Define the target.
        //     if (! empty($this->field->param5)) {
        //         $target = 'target="'.$this->field->param5.'"';
        //     } else {
        //         $target = '';
        //     }

        //     // Create the link.
        //     $data = '<a href="'.str_replace('$$', urlencode($data), $this->field->param4).'" '.$target.'>'.htmlspecialchars($data).'</a>';
        // }

        // return $data;
    }

    /**
     * Add fields for editing a text profile field.
     * @param moodleform $mform
     */
    public function edit_field_add($mform) {
        
        $site_key = $this->field->param1;
        $secret_key =  $this->field->param2;
        
        $id = optional_param('id', 0, PARAM_INT);

        if(empty($id)){
            $mform->addElement("html", "<script src='". self::RECAPTCHA_API_URL ."?render=$site_key'></script>");
            $mform->addElement("html", "<script>
                                            function loadRecaptchaToken() {
                                                grecaptcha.ready(function () {
                                                    grecaptcha.execute('$site_key', { action: 'contact' }).then(function (token) {
                                                        var recaptchaResponse = document.getElementById('recaptchaResponse');
                                                        recaptchaResponse.value = token;
                                                    });
                                                });
                                            }
                                            loadRecaptchaToken();
                                            setInterval(function(){loadRecaptchaToken();}, 100000);
                                        </script>");
            $mform->addElement("html","<input type='hidden'  name='recaptcha_response' id='recaptchaResponse' />");
        }

    }

    public function edit_validate_field($usernew) {
       
        $secret_key =  $this->field->param2;
        $recaptcha_score_threshold =  $this->field->param3;
        $errors = array();

        $id = optional_param('id', 0, PARAM_INT);

        if(!empty($id)) return array();

        $recaptcha_response = required_param('recaptcha_response', PARAM_TEXT);

        try {

            $recaptcha = file_get_contents(self::RECAPTCHA_VERIFY_URL . '?secret=' . $secret_key . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);

            if ($recaptcha->score < $recaptcha_score_threshold){
                $errors[] = "Invalid access";
            }

        } catch (Exception $e) {
            $errors = array();
            $errors[] = $e->getMessage();
            return $errors;
        }
        
        return $errors;
       
    }

    public function edit_save_data($usernew){
        // we don't save any data
    }

    public function is_editable(){
        return true;
    }

    public function is_visible(?context $context = null): bool {
        return false;
    }

    /**
     * Return the field type and null properties.
     * This will be used for validating the data submitted by a user.
     *
     * @return array the param type and null property
     * @since Moodle 3.2
     */
    public function get_field_properties() {
        return array(PARAM_TEXT, NULL_NOT_ALLOWED);
    }
}


