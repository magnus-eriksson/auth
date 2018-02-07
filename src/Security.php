<?php namespace Maer\Auth;

class Security implements SecurityInterface
{
    /**
     * Password settings
     *
     * @var array
     */
    protected $password = [
        'cost'      => 10,
        'algorithm' => PASSWORD_DEFAULT
    ];

    /**
     * Set the password algorithm for hashing
     *
     * @param integer $algo
     */
    public function setPasswordAlgorithm(int $algorithm)
    {
        $this->password['algorithm'] = $algorithm;
    }


    /**
     * Set the password cost for hashing
     *
     * @param integer $cost
     */
    public function setPasswordCost(int $cost)
    {
        $this->password['cost'] = $cost;
    }


    /**
     * Hash a password
     *
     * @param  string $password
     *
     * @return string
     */
    public function hashPassword(string $password) : string
    {
        return password_hash(
            $password,
            $this->password['algorithm'],
            $this->password['cost']
        );
    }


    /**
     * Verify a password against a hash
     *
     * @param  string $password
     * @param  string $hash
     *
     * @return boolean
     */
    public function verifyPassword(string $password, string $hash) : string
    {
        return password_verify($password, $hash);
    }


    /**
     * Generate random string
     *
     * @param  integer $bytes The token will be about twice as long
     *
     * @return string
     */
    public function getRandomString($bytes = 32) : string
    {
        return bin2hex(random_bytes($bytes));
    }


    /**
     * Calculate an apropriet cost for the current environment
     *
     * @return integer
     */
    public static function recommendCost(float $timeTarget = 0.05) : int
    {
        $cost = 8;

        do {
            $cost++;
            $start = microtime(true);
            password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);

        return $cost;
    }
}
