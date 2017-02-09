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

namespace rhosocial\lottery\components;

use yii\base\Component;
use rhosocial\lottery\models\lottery\LotteryInterface;

class Lottery extends Component
{
    public $lotteryMap = [];
    
    public function __get($name) {
        if (!$this->exist($name)) {
            return parent::__get($name);
        }
        return \Yii::createObject($this->lotteryMap[$name]);
    }
    
    /**
     * Check whether lottery code exists or not.
     * @param string $code
     * @return boolean
     */
    public function exist($code)
    {
        if (array_key_exists($code, $this->lotteryMap) && (\Yii::createObject($this->lotteryMap[$code]) instanceof LotteryInterface)) {
            return true;
        }
        return false;
    }
    
    /**
     * Update lottery.
     * @param string $code
     * @param string $periods
     * @return boolean
     */
    public function update($code, $periods = null)
    {
        if (!$this->exist()) {
            return false;
        }
        $class = $this->lotteryMap[$code];
        /* @var $class LotteryInterface */
        $data = $class::extractFromSource(['periods' => $periods]);
        foreach ($data as $record) {
            $class::updateLottery($record->getPeriod(), $record->opencode, $record->opentime);
        }
        return true;
    }
    
    /**
     * Delete lottery record.
     * @param string $code Lottery code.
     * @param string $period Lottery period.
     * @return boolean|integer the record to be affected.
     */
    public function delete($code, $period)
    {
        if (!$this->exist()) {
            return false;
        }
        $class = $this->lotteryMap[$code];
        /* @var $class LotteryInterface */
        return $class::deleteLottery($period);
    }
    
    public function getNavDropdownList()
    {
        $list = [
            'label' => \Yii::t('app', 'Lottery'),
        ];
        foreach ($this->lotteryMap as $key => $lottery) {
            $list['items'][] = [
                'label' => $this->$key->lotteryName(),
                'url' => '#',
            ];
        }
        return $list;
    }
}