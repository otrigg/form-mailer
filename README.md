# Simple Laravel Contact Form Mailer API

A simple Laravel-based api service for handling contacts forms. Can handle forms on static web sites, too. 

## Introduction
When deploying a web site, you often need to put a contact form somewhere. If you have a static website, there are only a few solutions to handle forms: implementing some sort of server-side logic and or paying for an external service.

If you have a Laravel based server somewhere, you can rely on this simple API for handling contact forms on multiple websites.

This package creates on your Laravel app an easy entry point:

    https://yourapp.dev/api/send

where to post all your contact forms. The api will handle the post requests and mail them to selected addresses.

## Features
* Server-side validation
* Google reCAPTCHA

## Package dependencies
* [No CAPTCHA reCAPTCHA](https://github.com/anhskohbo/no-captcha)

## Getting Started

### Prerequisites

* PHP ^7.1.3 
* Laravel ^5.5

### Installing

Open a console window in the root of your Laravel app and install the package using composer: 

```
composer require otrigg/form-mailer
```

And after that:

```
composer install
```

If you can't take advantage of Laravel's *auto discovery* feature, append
```php
Otrigg\Formmailer\Providers\FormmailerServiceProvider::class,
```
at the end of the provider array located into ```config/app.php``` 

Then, publish the configuration file into Laravel's ```/config``` folder:

```
php artisan vendor:publish
```


## Configuration

### Add key to ```.env``` file
First of all, append to your app's ```.env``` file:

    OTRIGG_FORMMAILER_MODE=strict

if you want to authorize only a certain list of websites where the form is hosted, otherwise leave the key empty:

    OTRIGG_FORMMAILER_MODE=

### Customize ```config/formmailer.php```

Then, edit the published ```config/formmailer.php``` to customize the API.

### Application ID
Insert a list of authorized app IDs that can use the API.  
Use random generated alphanumeric strings such as:
```php
    'app_id' => [
        'th151sAr4nd0m5tr1ng',
    ],
```
### Edit referrals
Insert a list of complete web addresses where the form is hosted:
```php
    'referrals' => [
        'http://mywebsite.com/myform.html',
    ],
```
don't forget to add a slash at the end of nice URLs if your server uses it, i.e.:
```php
    'referrals' => [
        'http://mywebsite.com/contacts/',
    ],
```
### Add recipients
Add a list of email addresses where the forms will be sent:
```php
    'recipients' => [
        'admin@€xample.com',
        'info@commercial.com',
        ...
    ],
```
### Define validation rules
Customize the rules according to your form fields. Write rules compatible with [Laravel's built-in validator:](https://laravel.com/docs/5.8/validation)


```php
    'rules' => [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|max:1024',
        'g-recaptcha-response' => 'required|captcha',
    ],
```

**Warning**: Google reCAPTCHA is set as **required** by default.

If you want to use Google reCAPTCHA don't forget to [generate Google reCAPTCHA public and private keys](https://www.google.com/recaptcha/admin) and add them to the ```.env``` file of your Laravel app:

    NOCAPTCHA_SITEKEY=google_recaptcha_public_key
    NOCAPTCHA_SECRET=google_recaptcha_secret_key

## Author

* [**Enea Barbetta**](https://github.com/otrigg) 

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.



