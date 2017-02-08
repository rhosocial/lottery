<?php

/**
 *   _   __ __ _____ _____ ___  ____  _____
 *  | | / // // ___//_  _//   ||  __||_   _|
 *  | |/ // /(__  )  / / / /| || |     | |
 *  |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.me/
 * @copyright Copyright (c) 2016 - 2017 vistart
 * @license https://vistart.me/license/
 */

namespace rhosocial\lottery\models\lottery;

/**
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
interface LotteryInterface
{
    /**
     * Get the display name of lottery.
     * @return string Lottery name.
     */
    public static function lotteryName();
    
    /**
     * Get the lottery code.
     * @return string Lottery code.
     */
    public static function lotteryCode();
    
    /**
     * Check whether the lottery number you selected matched the open number.
     * @param type $number Lottery number you selected.
     * @param type $period Lottery period.
     * @return array if the lottery number you selected match the open number, the matched will be returned.
     */
    public static function match($number, $period);
    
    /**
     * Get lottery records.
     * @params mixed Possible parameters.
     * @return mixed lottery records.
     */
    public static function getDataFromSource($params = null);
    
    public static function getDataFromStorage($params = null);
    
    public static function extractFromSource($params = null);
    
    public static function extractFromStorage($params = null);
    
    /**
     * Extract lottery details from data.
     * @param mixed $data
     * @return mixed lottery records.
     */
    public static function extractData($data);
    
    public static function deleteLottery($period);
    
    /**
     * Update lottery record.
     * If record doesn't exist, you should save it.
     * @param string $period
     * @param string $number
     * @param string $time
     * @return boolean
     */
    public static function updateLottery($period, $number, $time);
}