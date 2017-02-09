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

namespace rhosocial\lottery\models\lottery\welfare\DoubleColor;

/**
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
class Lottery extends \rhosocial\lottery\models\lottery\Lottery
{
    public static function lotteryName() {
        return "福彩-双色球";
    }
    
    public static function lotteryCode() {
        return "ssq";
    }
    
    public static function recordClass() {
        return Record::class;
    }
    
    public static function splitRedAndBlue($numbers, $delimiter = '+')
    {
        return explode($delimiter, $numbers);
    }
    
    public static function splitCombinedNumber($numbers, $delimiter = ',')
    {
        return explode($delimiter, $numbers);
    }
}