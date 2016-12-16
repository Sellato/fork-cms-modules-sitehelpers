<?php

namespace Backend\Modules\SiteHelpers\Engine;

/**
 * In this file we store all generic functions that we will be using in the SiteHelpers module
 *
 * @author Frederik Heyninck <frederik@figure8.be>
 */
class Assets
{
    public static function addSelect2($header)
    {
        $header->addJS('/src/Backend/Modules/SiteHelpers/Js/select2/select2.min.js', 'SiteHelpers', false, true);
        $header->addJS('/src/Backend/Modules/SiteHelpers/Js/select2/init.js', 'SiteHelpers', false, true);
        $header->addCSS('select2/select2.min.css', 'SiteHelpers', false, true);
    //$header->addCSS('select2/fixes.css', 'SiteHelpers', false, true);
    }

    public static function addLocationPicker($header)
    {
        $header->addJS('/src/Backend/Modules/SiteHelpers/Js/locationpicker/locationpicker.jquery.js', 'SiteHelpers', false, true);
    }

    public static function addUploadifive($header)
    {
        $header->addJS('/src/Backend/Modules/SiteHelpers/Js/uploadifive/jquery.uploadifive.js', 'SiteHelpers', false, true);
        $header->addJS('/src/Backend/Modules/SiteHelpers/Js/uploadifive/init.js', 'SiteHelpers', false, true);
        $header->addCSS('uploadifive/uploadifive.css', 'SiteHelpers', false, true);
        $header->addCSS('uploadifive/fixes.css', 'SiteHelpers', false, true);
    }
}
