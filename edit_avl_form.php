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
 * Defines the editing form for the avl question type.
 *
 * @package    qtype
 * @subpackage avl
 * @copyright  2022 adam gordon

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();
global $DB;

/**
 * avl question editing form definition.
 *
 * @copyright  2022 adam gordon

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_avl_edit_form extends question_edit_form {
    protected function definition_inner($mform) {
        //Add fields specific to this question type

        // choice of which question type the lecturer wants
        $menu = array(
            get_string('singleRotation', 'qtype_avl'),
            get_string('doubleRotation', 'qtype_avl'),
            get_string('removeNode', 'qtype_avl'),
            get_string('addNode', 'qtype_avl'),
        );
        //add a selector element to the question settings
        $mform->addElement('select', 'avlOption', get_string('questionType', 'qtype_avl'), $menu);
        $mform->setDefault('avlOption', get_config('qtype_avl', 'questionType'));


        $this->add_combined_feedback_fields(true);
        // Adds hinting features.
        $this->add_interactive_settings(true, true);
    }

    protected function data_preprocessing($question) {
        $question = parent::data_preprocessing($question);
        $question = $this->data_preprocessing_hints($question);

        return $question;
    }

    public function qtype() {
        return 'avl';
    }
}
