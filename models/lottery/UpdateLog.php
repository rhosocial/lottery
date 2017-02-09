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
class UpdateLog extends BaseEntityModel
{
    public $guidAttribute = false;
    public $idAttribute = 'code';
    public $idPreassigned = true;
    public $idAttributeLength = 255;
    public $createdAtAttribute = false;
    public $enableIP = false;
    
    public static function tableName()
    {
        return '{{%update_log}}';
    }
}