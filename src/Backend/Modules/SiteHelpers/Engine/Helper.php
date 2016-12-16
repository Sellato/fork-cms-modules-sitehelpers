<?php

namespace Backend\Modules\SiteHelpers\Engine;

use Backend\Core\Engine\Model as BackendModel;
use Backend\Core\Language\Language;
use Backend\Core\Engine\Form;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\File;

/**
 * In this file we store all generic functions that we will be using in the SiteHelpers module
 *
 * @author Frederik Heyninck <frederik@figure8.be>
 */
class Helper
{
    public static function getActiveLanguages()
    {
        $languages = array();

        foreach (Language::getActiveLanguages() as $abbreviation) {
            $languages[] = array('abbreviation' => $abbreviation, 'label' => Language::getLabel(mb_strtoupper($abbreviation)));
        }

        return $languages;
    }

    public static function getAllLanguages()
    {
        $languages = array();

        foreach (Language::getActiveLanguages() as $abbreviation) {
            $languages[] = array('abbreviation' => $abbreviation, 'label' => Language::getLabel(mb_strtoupper($abbreviation)));
        }

        return $languages;
    }

    public static function validateImage($frm, $field)
    {
        if ($frm->getField($field)->isFilled()) {
            // image extension and mime type
            $frm->getField($field)->isAllowedExtension(array('jpg', 'png', 'gif', 'jpeg'), Language::err('JPGGIFAndPNGOnly'));
            $frm->getField($field)->isAllowedMimeType(array('image/jpg', 'image/png', 'image/gif', 'image/jpeg'), Language::err('JPGGIFAndPNGOnly'));
        }
    }

    public static function getImageUrl($image, $module, $folder = 'image', $size = '400x')
    {
        return FRONTEND_FILES_URL . '/' . $module . '/' . $folder . '/' . $size . '/' . $image;
    }

    public static function getPreviewHTML($image, $module, $folder = 'image', $size = '200x')
    {
        $image = self::getImageUrl($image, $module, $folder, $size);
        return '<img src="' . $image . '" style="max-width:80px;max-height:80px;" />';
    }

    public static function generateFolders($module, $folder = 'image', $exclude = array())
    {
        // the image path
        $imagePath = FRONTEND_FILES_PATH . '/' . $module . '/' . $folder;

        $fs = new Filesystem();

        $resolutions = array('source', '200x', '400x', '800x', '1200x', '1600x', '600x315', '1200x630');
        $resolutions  = array_diff($resolutions, $exclude);

        foreach ($resolutions as $resolution) {
            if (!$fs->exists($imagePath . '/' . $resolution)) {
                $fs->mkdir($imagePath . '/' . $resolution);
            }
        }

        return $imagePath;
    }
}
