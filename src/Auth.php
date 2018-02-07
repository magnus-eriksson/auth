<?php namespace Maer\Auth;

class Auth implements AuthInterface
{
    /**
     * @var mixed
     */
    protected $currentUser;

    /**
     * @var \Maer\Auth\Security
     */
    protected $security;


    /**
     * @param SecurityInterface $security
     */
    public function __construct(SecurityInterface $security)
    {
        $this->security = $security;
    }


    /**
     * Authenticate username and password
     *
     * @param  string $hash
     * @param  string $password
     *
     * @return bool
     */
    public function authenticate(string $hash, string $password) : bool
    {
        return $this->security->verifyPassword($hash, $password);
    }


    /**
     * Set the current user
     *
     * @param mixed $user
     */
    public function setCurrentUser($user)
    {
        $this->currentUser = $user;
    }


    /**
     * Get the current user
     *
     * @return mixed
     */
    public function getCurrentUser()
    {
        return $this->currentUser;
    }

    /**
     * Has current user
     *
     * @return bool
     */
    public function hasCurrentUser() : bool
    {
        return !empty($this->currentUser);
    }
}
