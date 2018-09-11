<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lookup}}".
 *
 * @property int $id
 * @property string $name
 * @property int $code
 * @property string $type
 * @property int $position
 */
class Lookup extends \yii\db\ActiveRecord {

    private static $_items = array();

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%lookup}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['code', 'position'], 'integer'],
            [['name', 'type'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'code' => Yii::t('app', 'Code'),
            'type' => Yii::t('app', 'Type'),
            'position' => Yii::t('app', 'Position'),
        ];
    }

    public static function items($type) {
        if (!isset(self::$_items[$type]))
            self::loadItems($type);
        return self::$_items[$type];
    }

    public static function item($type, $code) {
        if (!isset(self::$_items[$type]))
            self::loadItems($type);
        return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : false;
    }

    private static function loadItems($type) {
        $items = Lookup::find()
                ->select(['code', 'name'])
                ->where("type='" . $type . "'")
                ->orderBy('position')
                ->asArray()
                ->all();
        self::$_items[$type] = array();
        foreach ($items as $item)
            self::$_items[$type][$item['code']] = $item['name'];
    }

}
