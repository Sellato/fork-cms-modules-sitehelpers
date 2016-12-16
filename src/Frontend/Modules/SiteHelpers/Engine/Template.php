<?php

namespace Frontend\Modules\SiteHelpers\Engine;

use Frontend\Core\Engine\Model as FrontendModel;

/**
 * In this file we store all generic functions that we will be using in the SiteHelpers module
 *
 * @author Frederik Heyninck <frederik@figure8.be>
 */
class Template
{
    public static function render($template, $variables = array())
    {
        return FrontendModel::get('twig')->render($template, $variables);
    }
}
