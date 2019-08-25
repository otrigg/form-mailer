<?php

return [

    /*
    |--------------------------------------------------------------------------
    | App IDs
    |--------------------------------------------------------------------------
    |
    | Insert a list of authorized app IDs that can use the api.  
    | Use random generated alphanumeric strings
    |
    */

    'app_id' => [
        'th151sAr4nd0m5tr1ng',
    ],

    /*
    |--------------------------------------------------------------------------
    | Mode
    |--------------------------------------------------------------------------
    |
    | Use 'strict' in the .env configuration file if you want the app to accept 
    | only request by authorized referrals.
    |
    */

    'mode'  => env('OTRIGG_FORMMAILER_MODE'),

    /*
    |--------------------------------------------------------------------------
    | Authorized referrals
    |--------------------------------------------------------------------------
    |
    | Insert a list of complete web addresses where the form is hosted. 
    | Don't forget to add a slash at the end of nice URLs if your host uses it.
    |
    */

    'referrals' => [
        'http://example.com/contacts/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Recipients
    |--------------------------------------------------------------------------
    |
    | Insert a list of email addresses where the form will be sent.
    |
    */

    'recipients' => [
        'admin@example.com'
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation rules
    |--------------------------------------------------------------------------
    |
    | Customize the rules according to your form fields. 
    | Write rules compatible with Laravel's built-in validator.
    | Google Re-Captcha included as required by default.
    |
    */

    'rules' => [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|max:1024',
        'sender' => 'required',
        'g-recaptcha-response' => 'required|captcha',
    ],

];
