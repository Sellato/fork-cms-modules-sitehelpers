<?php

namespace Frontend\Modules\SiteHelpers\Engine;

use Frontend\Core\Engine\Model as FrontendModel;

/**
 * In this file we store all generic functions that we will be using in the SiteHelpers module
 *
 * @author Frederik Heyninck <frederik@figure8.be>
 */
class Email
{
    public static function notify($to, $subject, $variables, $fromEmail = '', $fromName = '')
    {
        $from = FrontendModel::get('fork.settings')->get('Core', 'mailer_from');

        if (empty($fromEmail)) {
            $fromEmail = $from['email'];
        }
        if (empty($fromName)) {
            $fromName = $from['name'];
        }

        $message = \Common\Mailer\Message::newInstance($subject)
          ->setFrom(array($fromEmail => $from['name']))
          ->setTo(array($to))
          ->parseHtml(
              FRONTEND_MODULES_PATH . '/SiteHelpers/Layout/Templates/Mails/Notify.html.twig',
              $variables,
              true
          );
        FrontendModel::get('mailer')->send($message);
    }
}
