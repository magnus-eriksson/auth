<?php namespace Maer\Auth;

interface AuthInterface
{
    /**
     * Authenticate username and password
     *
     * @param  string $hash
     * @param  string $password
     *
     * @return bool
     */
    public function authenticate(string $hash, string $password) : bool;


    /**
     * Set the current user
     *
     * @param mixed $user
     */
    public function setCurrentUser($user);


    /**
     * Get the current user
     *
     * @return mixed
     */
    public function getCurrentUser();

    /**
     * Has current user
     *
     * @return bool
     */
    public function hasCurrentUser() : bool;
}
