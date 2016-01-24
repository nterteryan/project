<?php

/**
 * HashHelper
 *
 * @author Davit T.
 * @created at 23th day of Jan 2016
 */
class HashHelper {

    const SALT = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';

    /**
     * hashPassword
     *
     * @author Davit T.
     * @created at 23th day of Jan 2016
     * @param string $password
     * @return string
     */
    public static function hashPassword($password) {
        return sha1(md5($password) . self::SALT);
    }

    /**
     * compare
     *
     * @author Davit T.
     * @created at 23th day of Jan 2016
     * @param string $original
     * @param string $hasged
     * @return boolean
     */
    public static function comparePassword($original, $hasged) {
        return $hasged === self::hashPassword($original);
    }

    /**
     * generateActivationHash
     *
     * @author Davit T.
     * @created at 23th day of Jan 2016
     * @param string $string
     * @return string
     */
    public static function generateActivationHash($string) {
        return self::crypt($string);
    }

    /**
     * generateRefferalHash
     *
     * @author Davit T.
     * @created at 23th day of Jan 2016
     * @return string
     */
    public static function generateRefferalHash() {
        return self::randomHash();
    }

    /**
     * randomHash
     *
     * @author Davit T.
     * @created at 23th day of Jan 2016
     * @param int $iLength
     * @param boolean $bSpecialCharacters
     * @return string
     */
    private static function randomHash($iLength = 12, $bSpecialCharacters = true) {
        $sPassword = '';
        $sChars = self::SALT;

        if ($bSpecialCharacters === true)
            $sChars .= "!?=/&+,.";

        srand((double) microtime() * 1000000);
        for ($i = 0; $i < $iLength; $i++) {
            $x = mt_rand(0, strlen($sChars) - 1);
            $sPassword .= $sChars{$x};
        }
        return $sPassword;
    }

    /**
     * crypt
     *
     * @author Davit T.
     * @created at 23th day of Jan 2016
     * @param string $str
     * @return string
     */
    private static function crypt($str) {
        return password_hash($str.self::SALT, PASSWORD_BCRYPT);
    }

}
