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

use rhosocial\base\models\models\BaseEntityModel;
/**
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
class Record extends BaseEntityModel
{
    public $guidAttribute = false;
    public $idPreassigned = true;
    public $idAttributeLength = 7;
    public $idAttributeType = 1;
    public $updatedAtAttribute = false;
    public $enableIP = false;
    
    public static function tableName()
    {
        return '{{%ssq}}';
    }
    
    public function setPeriod($period)
    {
        $this->setID($period);
    }
    
    public function getPeriod()
    {
        return $this->getID();
    }
    
    public function getOpenNumbers()
    {
        $splitted = Lottery::splitRedAndBlue($this->opencode);
        $red = Lottery::splitCombinedNumber($splitted[0]);
        $blue = $splitted[1];
        return ['red' => $red, 'blue' => $blue];
    }
}