<?php

/**
 * These configuration settings will set the defaults for the Oatmeal
 * object when injected, such that, for example, if all cookies should
 * only be transmitted over HTTPS, set 'secure' to true here and every
 * time Oatmeal is injected, setSecure() does not need to be called
 *
 * For more details what the individual settings mean, see the PHP docs
 * http://php.net/manual/en/function.setcookie.php
 */
return [
    /**
     * Path within the domain where the cookies are accessibly
     * e.g. '/'
     */
    'path' => '',

    /**
     * Which subdomain can access the cookies
     * e.g. 'test.example.com'
     */
    'domain' => '',

    /**
     * Require cookies be sent over HTTPS
     */
    'secure' => false,

    /**
     * Only make cookies available over HTTP and not via JavaScript
     */
    'httpOnly' => true,
];
