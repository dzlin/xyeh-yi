<?php

namespace application\models;

use CActiveDataProvider;
use CActiveRecord;
use CDbCriteria;

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $register_time
 * @property integer $status
 */
class User extends CActiveRecord
{

    /**
     * 表名
     */
    const TABLE_NAME = '{{user}}';

    /**
     * 用户禁用
     */
    const STATUS_DISABLE = 0;

    /**
     * 用户可用
     */
    const STATUS_ENABLE = 1;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return self::TABLE_NAME;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('status', 'numerical', 'integerOnly' => true),
            array('email', 'length', 'max' => 255),
            array('password', 'length', 'max' => 32),
            array('register_time', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, email, password, register_time, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'register_time' => 'Register Time',
            'status' => 'Status',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('register_time', $this->register_time, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    // ====================================================================

    /**
     * 检查邮箱是否已经存在
     * @param string $email
     * @return boolean
     */
    public function existsEmail($email)
    {
        $condition = 'email=:email';
        $params = array(':email' => $email);
        return $this->exists($condition, $params);
    }

}
