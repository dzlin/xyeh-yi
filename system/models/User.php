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
 * @property string $truename
 * @property string $nikename
 * @property string $stuid
 * @property integer $schid
 * @property integer $gender
 * @property string $password
 * @property string $avatar
 * @property string $email
 * @property string $register
 * @property integer $point
 * @property integer $loginnum
 * @property string $lastlogin
 * @property string $active
 * @property string $backcode
 * @property integer $status
 */
class User extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('schid, gender, point, loginnum, status', 'numerical', 'integerOnly' => true),
            array('truename, nikename, password, email, backcode', 'length', 'max' => 32),
            array('stuid', 'length', 'max' => 20),
            array('avatar', 'length', 'max' => 64),
            array('register, lastlogin', 'length', 'max' => 11),
            array('active', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, truename, nikename, stuid, schid, gender, password, avatar, email, register, point, loginnum, lastlogin, active, backcode, status', 'safe', 'on' => 'search'),
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
            'truename' => 'Truename',
            'nikename' => 'Nikename',
            'stuid' => 'Stuid',
            'schid' => 'Schid',
            'gender' => 'Gender',
            'password' => 'Password',
            'avatar' => 'Avatar',
            'email' => 'Email',
            'register' => 'Register',
            'point' => 'Point',
            'loginnum' => 'Loginnum',
            'lastlogin' => 'Lastlogin',
            'active' => 'Active',
            'backcode' => 'Backcode',
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
        $criteria->compare('truename', $this->truename, true);
        $criteria->compare('nikename', $this->nikename, true);
        $criteria->compare('stuid', $this->stuid, true);
        $criteria->compare('schid', $this->schid);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('avatar', $this->avatar, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('register', $this->register, true);
        $criteria->compare('point', $this->point);
        $criteria->compare('loginnum', $this->loginnum);
        $criteria->compare('lastlogin', $this->lastlogin, true);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('backcode', $this->backcode, true);
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

}
