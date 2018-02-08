<?php namespace Maer\Auth;

interface AuthInterface
{
    /**
     * Authenticate username and password
     *
     * @param  string $password
     * @param  string $hash
     *
     * @return bool
     */
    public function authenticate(string $password, string $hash) : bool;


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
