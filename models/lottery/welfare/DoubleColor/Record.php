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
class Record extends \rhosocial\lottery\models\lottery\Record
{
    public $idAttributeLength = 7;
    public $idAttributeType = 1;
    
    public static function tableName()
    {
        return '{{%ssq}}';
    }
    
    public function getOpenNumbers()
    {
        $splitted = Lottery::splitRedAndBlue($this->opencode);
        $red = Lottery::splitCombinedNumber($splitted[0]);
        $blue = $splitted[1];
        return ['red' => $red, 'blue' => $blue];
    }
}