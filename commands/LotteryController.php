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

namespace rhosocial\lottery\commands;

use yii\console\Controller;

/**
 * T
 *
 * @author vistart <i@vistart.me>
 */
class LotteryController extends Controller
{    
    /**
     * Update lottery.
     * @param string $code Lottery code.
     * @param integer $periods Last periods.
     */
    public function actionUpdate($code, $periods = 20)
    {
        $records = \Yii::$app->lottery->$code->extractFromSource(['periods' => $periods]);
        echo "Updating...\n";
        foreach ($records as $record) {
            echo $record->getPeriod() . " : " . \Yii::$app->lottery->ssq->updateLottery($record->getPeriod(), $record->opencode, $record->opentime) . "\n";
        }
    }
    
    /**
     * Delete lottery record.
     * @param string $code Lottery code.
     * @param string $period Period to be deleted.
     */
    public function actionDelete($code, $period)
    {
        echo \Yii::$app->lottery->$code->deleteLottery($period);
    }
}
