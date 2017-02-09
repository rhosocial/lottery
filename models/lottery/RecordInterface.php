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
interface RecordInterface
{
    /**
     * Get period.
     * @return string Period.
     */
    public function getPeriod();
    
    /**
     * Set period.
     * @param string $period Period.
     */
    public function setPeriod($period);
    
    /**
     * Get open numbers.
     */
    public function getOpenNumbers();
}