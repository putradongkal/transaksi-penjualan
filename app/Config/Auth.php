<?php namespace Config;

use CodeIgniter\Config\BaseConfig;
use Myth\Auth\Authentication\LocalAuthenticator;

class Auth extends \Myth\Auth\Config\Auth
{
    public $views = [
        'login' => '\App\Views\auth\login',
        // 'login' => 'Myth\Auth\Views\login',
        'register' => 'Myth\Auth\Views\register',
        'forgot' => 'Myth\Auth\Views\forgot',
        'reset' => 'Myth\Auth\Views\reset',
        'emailForgot' => 'Myth\Auth\Views\emails\forgot',
        'emailActivation' => 'Myth\Auth\Views\emails\activation',
    ];

    //--------------------------------------------------------------------
    // Allow Persistent Login Cookies (Remember me)
    //--------------------------------------------------------------------
    // While every attempt has been made to create a very strong protection
    // with the remember me system, there are some cases (like when you
    // need extreme protection, like dealing with users financials) that
    // you might not want the extra risk associated with this cookie-based
    // solution.
    //
    public $allowRemembering = true;

    //--------------------------------------------------------------------
    // Remember Length
    //--------------------------------------------------------------------
    // The amount of time, in seconds, that you want a login to last for.
    // Defaults to 30 days.
    //
    public $rememberLength = 365 * DAY;

    public $validFields = [
        'email', 'username'
    ];

}