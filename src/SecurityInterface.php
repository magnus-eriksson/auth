<?php namespace Maer\Auth;

interface SecurityInterface
{
    /**
     * Set the password algorithm for hashing
     *
     * @param integer $algo
     */
    public function setPasswordAlgorithm(int $algo);


    /**
     * Set the password cost for hashing
     *
     * @param integer $cost
     */
    public function setPasswordCost(int $cost);


    /**
     * Hash a password
     *
     * @param  string $password
     *
     * @return string
     */
    public function hashPassword(string $password) : string;


    /**
     * Verify a password against a hash
     *
     * @param  string $password
     * @param  string $hash
     *
     * @return boolean
     */
    public function verifyPassword(string $password, string $hash) : bool;


    /**
     * Generate random string
     *
     * @param  integer $bytes The token will be about twice as long
     *
     * @return string
     */
    public function getRandomString($bytes = 32) : string;


    /**
     * Calculate an apropriet cost for the current environment
     *
     * @return integer
     */
    public static function recommendCost(float $time) : int;
}
