<?php

/**
 * CTransaction - Component too help with transaction operations
 *
 * @author Davit T.
 * @created at 27th day of Jan 2016
 */
class CTransaction {

    // Portion percents of amount
    //const PARTNER_PARENT_PORTION = 65;
    //const PARTNER_COMPANY_PORTION = 35;
    // Portions percents by level of parents
    const PORTION_LEVEL_0 = 25;
    const PORTION_LEVEL_1 = 15;
    const PORTION_LEVEL_2 = 10;
    const PORTION_LEVEL_3 = 5;
    const PORTION_LEVEL_4 = 4;
    const PORTION_LEVEL_5 = 3;
    const PORTION_LEVEL_6 = 2;
    const PORTION_LEVEL_7 = 1;

    // Portions list 
    private static $userPortions = array(
        self::PORTION_LEVEL_0,
        self::PORTION_LEVEL_1,
        self::PORTION_LEVEL_2,
        self::PORTION_LEVEL_3,
        self::PORTION_LEVEL_4,
        self::PORTION_LEVEL_5,
        self::PORTION_LEVEL_6,
        self::PORTION_LEVEL_7,
    );

    // Amount portions
    const PORTION_AMOUNT = 70;
    const PORTION_AMOUNT_PERSONAL = 30;

    // List of amount portions
    private static $amountPortions = array(
        self::PORTION_AMOUNT,
        self::PORTION_AMOUNT_PERSONAL,
    );

    /**
     * spreadMoney
     *
     * @author Davit T.
     * @created at 27th day of Jan 2016
     * @param object $user
     * @return float $amount
     */
    public static function spreadMoney($user, $totalAmount) {
        $leftAmount = $totalAmount;
        $parentId = $user->parent_id;
        for ($i = 0; $i < 8; $i++) {
            $parentUser = self::getParentUser($parentId);
            $parentId = $parentUser->parent_id;
            if ($parentUser->status == User::STATUS_ACTIVE && $parentUser->is_partner == User::IS_PARTNER_YES) {
                $percent = self::$userPortions[$i];
                $userAmountPortion = self::getPortion($totalAmount, $percent);
                $parentUser->addRefferalMoney($userAmountPortion);
                $leftAmount-= $userAmountPortion;
            } else {
                continue;
            }
        }
    }

    /**
     * getPortion
     *
     * @author Davit T.
     * @created at 27th day of Jan 2016
     * @param float $ammount
     * @param int $percent
     * @return float
     */
    public static function getPortion($ammount, $percent) {
        return $ammount * $percent / 100;
    }

    /**
     * getParentUser
     *
     * @author Davit T.
     * @created at 27th day of Jan 2016
     * @param int $id
     * @return null | $object
     */
    private static function getParentUser($id) {
        return User::model()->findByPk($id);
    }

}