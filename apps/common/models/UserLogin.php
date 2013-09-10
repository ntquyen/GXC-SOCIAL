<?php

/**
 * This is the model class for table "user_login".
 *
 * The followings are the available columns in table 'user_login':
 * @property integer $user_id
 * @property string $pass_hash
 * @property string $activation_key
 * @property integer $status
 * @property integer $recent_login
 */
class UserLogin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, pass_hash, activation_key, recent_login', 'required'),
			array('user_id, status, recent_login', 'numerical', 'integerOnly'=>true),
			array('pass_hash, activation_key', 'length', 'max'=>64),
			array('login_attempts','numerical', 'integerOnly' => true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, pass_hash, activation_key, status, recent_login, login_attempts', 'safe', 'on'=>'search'),
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
			'user_id' => t('labels','User'),
			'pass_hash' => t('labels','Password'),
			'activation_key' => t('labels','Activation Key'),
			'status' => t('labels','Status'),
			'login_attempts' => t('labels','Login Attempts'),
			'recent_login' => t('labels','Recent Login'),
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

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('pass_hash',$this->pass_hash,true);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('login_attempts',$this->login_attempts);
		$criteria->compare('recent_login',$this->recent_login);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserLogin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function verifyPassword($password,$hash) {
		return CPasswordHelper::verifyPassword($password, $hash);		
	}

	/**
 	* This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			$this->recent_login=time();
			if($this->isNewRecord)
			{	
				// Hash the password if this is a new Record								
				$this->pass_hash =  CPasswordHelper::hashPassword($this->pass_hash);
			}
			return true;
		}
		else
			return false;
	}



}
