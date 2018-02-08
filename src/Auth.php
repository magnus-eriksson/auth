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
     * @param  string $password
     * @param  string $hash
     *
     * @return bool
     */
    public function authenticate(string $password, string $hash) : bool
    {
        return $this->security->verifyPassword($password, $hash);
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
