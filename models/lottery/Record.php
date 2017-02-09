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

use rhosocial\base\models\models\BaseEntityModel;

/**
 * @version 1.0
 * @author vistart <i@vistart.me>
 */
abstract class Record extends BaseEntityModel implements RecordInterface
{
    public $guidAttribute = false;
    public $idPreassigned = true;
    public $updatedAtAttribute = false;
    public $enableIP = false;
    
    public function setPeriod($period)
    {
        $this->setID($period);
    }
    
    public function getPeriod()
    {
        return $this->getID();
    }
}