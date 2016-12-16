<?php

namespace Backend\Modules\SiteHelpers\Engine;

use Backend\Core\Engine\Model as BackendModel;
use Backend\Core\Language\Language;

/**
 * In this file we store all generic functions that we will be using in the SiteHelpers module
 *
 * @author Frederik Heyninck <frederik@figure8.be>
 */
class Model
{
    public static function insertLinked($values, $value_field, $other_id, $other_field, $table)
    {
        $values = array_filter($values);
        $insertArray = array();
        $db = BackendModel::get('database');

        foreach ((array) $values as $id) {
            // add
                 $categories[] = array($value_field => $id, $other_field => $other_id);
        }

         // delete old categories
         $db->delete($table, $other_field . ' = ?', (int) $other_id);

         // insert the new one(s)
         if (!empty($categories)) {
             $db->insert($table, $categories);
         }
    }

    public static function getLinked($value, $value_field, $other_field, $table)
    {
        return (array) BackendModel::get('database')->getColumn(
            'SELECT i.' . $value_field .
             ' FROM ' . $table . ' AS i
             WHERE i.' . $other_field . ' = ?',
            array((int) $value)
        );
    }
}
