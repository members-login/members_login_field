<?php
if (!defined("__IN_SYMPHONY__")) die("<h2>Error</h2><p>You cannot directly access this file</p>");

class extension_members_login_field extends Extension
{
    public function install()
    {
    }

    public function uninstall()
    {
    }

    /**
     * Delegates and callbacks
     *
     * @return array
     */
    public function getSubscribedDelegates()
    {
        return array(
            array(
                'page'     => '/frontend/',
                'delegate' => 'FrontendPrePageResolve',
                'callback' => 'frontendPrePageResolve'
            ),
        );
    }

    /**
     * Manipulate the POST array ("user-login" field) before the global
     * Members events are triggered (via FrontendPageResolved).
     *
     * @uses FrontendPrePageResolve
     * @param $context
     * @return void
     **/
    public function frontendPrePageResolve($context)
    {
        if (isset($_POST['fields']['user-login'])) {
            $user_login = $_POST['fields']['user-login'];

            if (filter_var($user_login, FILTER_VALIDATE_EMAIL)) {
                $_POST['fields']['email'] = $user_login;
            }
            else {
                $_POST['fields']['username'] = $user_login;
            }
        }
    }
}
