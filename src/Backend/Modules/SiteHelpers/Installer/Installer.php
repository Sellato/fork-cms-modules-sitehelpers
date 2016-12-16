<?php

namespace Backend\Modules\SiteHelpers\Installer;

use Backend\Core\Installer\ModuleInstaller;
use Backend\Modules\SiteHelpers\Engine\Api as Api;


/**
 * Installer for the SiteHelpers module
 *
 * @author Frederik Heyninck <frederik@figure8.be>
 */
class Installer extends ModuleInstaller
{
    public function install()
    {
        // import the sql
        //$this->importSQL(dirname(__FILE__) . '/Data/install.sql');

        // install the module in the database
        $this->addModule('SiteHelpers');

        // install the locale, this is set here beceause we need the module for this
        $this->importLocale(dirname(__FILE__) . '/Data/locale.xml');

        $this->setModuleRights(1, 'SiteHelpers');
    }
}
