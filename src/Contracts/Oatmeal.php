<?php
namespace DerekHamilton\Oatmeal\Contracts;

/**
 * Oatmeal cookie management API
 */
interface Oatmeal
{
    /**
     * Return a cookie value
     *
     * Returns null if cookie not found or expired
     * @param string $name
     * @return string|null
     */
    public function get(string $name);

    /**
     * Returning a cookie and forgetting it
     *
     * Returns null if cookie not found
     * @param string $name
     * @return string|null
     */
    public function pull(string $name);

    /**
     * Store a cookie
     * @param string $name
     * @param string $value
     * @param int    $minutes
     * @return bool
     */
    public function set(string $name, string $value, int $minutes): bool;

    /**
     * Store a cookie with no expiration
     *
     * Expiration is technically in 5 years time
     * @param string $name
     * @param string $value
     * @return bool
     */
    public function forever(string $name, string $value): bool;

    /**
     * Delete a cookie
     * @param string $name
     * @return Oatmeal
     */
    public function forget(string $name): Oatmeal;

    /**
     * Path within the domain where the cookies are accessibly
     * @see http://php.net/manual/en/function.setcookie.php
     * @param string $path
     * @return Oatmeal
     */
    public function setPath(string $path): Oatmeal;

    /**
     * Which subdomain can access the cookies
     * @see http://php.net/manual/en/function.setcookie.php
     * @param string $domain
     * @return Oatmeal
     */
    public function setDomain(string $domain): Oatmeal;

    /**
     * Require cookies be sent over HTTPS
     * @see http://php.net/manual/en/function.setcookie.php
     * @param bool $secure
     * @return Oatmeal
     */
    public function setSecure(bool $secure): Oatmeal;

    /**
     * Only make cookies available over HTTP and not via JavaScript
     * @see http://php.net/manual/en/function.setcookie.php
     * @param bool $httpOnly
     * @return Oatmeal
     */
    public function setHttpOnly(bool $httpOnly): Oatmeal;
}
