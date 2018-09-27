<?php
namespace DerekHamilton\Oatmeal\Contracts;

interface Oatmeal
{
    /**
     * Return a cookie value
     *
     * Returns null if cookie not found or expired
     * @return mixed|null
     */
    public function get(string $name);

    /**
     * Returning a cookie and forgetting it
     *
     * Returns null if cookie not found
     * @return mixed|null
     */
    public function pull(string $name);

    /**
     * Store a cookie
     */
    public function set(string $name, $value, int $minutes): bool;

    /**
     * Store a cookie with no expiration
     *
     * Expiration is technically in 5 years time
     */
    public function forever(string $name, $value): bool;

    /**
     * Delete a cookie
     */
    public function forget(string $name): Oatmeal;

    /**
     * Path within the domain where the cookies are accessibly
     * @see http://php.net/manual/en/function.setcookie.php
     */
    public function setPath(string $path): Oatmeal;

    /**
     * Which subdomain can access the cookies
     * @see http://php.net/manual/en/function.setcookie.php
     */
    public function setDomain(string $domain): Oatmeal;

    /**
     * Require cookies be sent over HTTPS
     * @see http://php.net/manual/en/function.setcookie.php
     */
    public function setSecure(bool $secure): Oatmeal;

    /**
     * Only make cookies available over HTTP and not via JavaScript
     * @see http://php.net/manual/en/function.setcookie.php
     */
    public function setHttpOnly(bool $httpOnly): Oatmeal;
}
