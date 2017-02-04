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

use rhosocial\lottery\models\lottery\LotteryInterface;
use yii\httpclient\Client;

class Lottery implements LotteryInterface
{
    public static function tableName() {
        return '{{%ssq}}';
    }
    
    protected static $dataSourceBaseUrl = 'http://f.apiplus.cn/';
    
    public static function lotteryName() {
        return "福彩-双色球";
    }
    
    public static function lotteryCode() {
        return "ssq";
    }
    
    /**
     * 
     * @param integer $periods
     * @param string $format
     * @return string
     */
    public static function compositeDataSourceURL($periods = 5, $format = 'json')
    {
        return static::$dataSourceBaseUrl . static::lotteryCode() . ($periods === null ? '' : "-$periods") . ".$format";
    }
    
    /**
     * Get lottery data from source.
     * @param array $params
     * @return boolean|array
     * @throws \yii\httpclient\Exception
     */
    public static function getDataFromSource($params = null) {
        $client = new Client;
        $periods = 5;
        if (isset($params['periods'])) {
            $periods = (int)($params['periods']);
        }
        $format = 'json';
        if (isset($params['json'])) {
            $format = (string)($params['format']);
        }
        $getRequest = $client->get(static::compositeDataSourceURL($periods, $format));
        try {
            $response = $getRequest->send();
            if (!$response->isOk) {
                throw new \yii\httpclient\Exception('Response is not OK.');
            }
        } catch (\Exception $ex) {
            return false;
        }
        $data = $response->data;
        return $data['data'];
    }
    
    /**
     * 
     * @param mixed $params
     * @return Record[]
     */
    public static function getDataFromStorage($params = null)
    {
        return Record::find()->where($params)->all();
    }
    
    /**
     * 
     * @param mixed $params
     * @return Record[]
     * @throws \yii\base\InvalidValueException
     */
    public static function extractFromSource($params = null)
    {
        try {
            $data = static::getDataFromSource($params);
            if ($data === false || $data instanceof \Exception) {
                throw new \yii\base\InvalidValueException('Invalid Lottery Records.');
            }
            $records = static::extractData($data);
        } catch (\Exception $ex) {
            throw $ex;
            return [];
        }
        return $records;
    }
    
    /**
     * 
     * @param mixed $data
     * @return Record[]
     */
    public static function extractData($data) {
        $records = [];
        if (is_array($data)) {
            foreach ($data as $record) {
                $r = new Record(['period' => $record['expect'], 'opencode' => $record['opencode'], 'opentime' => $record['opentime']]);
                $records[] = $r;
            }
        }
        return $records;
    }
    
    /**
     * Update lottery record.
     * If record doesn't exist, new record will be created first.
     * @param string $period
     * @param string $opencode
     * @param string $opentime
     * @return boolean
     */
    public static function updateLottery($period, $opencode, $opentime) {
        $record = Record::find()->where(['id' => $period])->one();
        if (!$record) {
            $record = new Record(['id' => $period]);
        }
        if ($record->opencode != $opencode) {
            $record->opencode = $opencode;
        }
        if ($record->opentime != $opentime) {
            $record->opentime = $opentime;
        }
        if ($record->isAttributeChanged('opencode') || $record->isAttributeChanged('opentime')) {
            return $record->save();
        }
        return true;
    }
    
    public static function match($number, $period) {
        ;
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