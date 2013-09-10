<?php

/**
 * This is the model class for table "user_profile".
 *
 * The followings are the available columns in table 'user_profile':
 * @property integer $user_id
 * @property string $about
 * @property string $location
 * @property string $social_links
 * @property string $followers
 * @property string $following
 * @property integer $date_modified
 */
class UserProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id, date_modified', 'numerical', 'integerOnly'=>true),			
			array('location', 'length', 'max'=>255),
			array('about, social_links, followers, following', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, about, location, social_links, followers, following, date_modified', 'safe', 'on'=>'search'),
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
			'about' => t('labels','About'),
			'location' => t('labels','Location'),
			'social_links' => t('labels','Social Links'),
			'followers' => t('labels','Followers'),
			'following' => t('labels','Following'),
			'date_modified' => t('labels','Date Modified'),
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
		$criteria->compare('about',$this->about,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('social_links',$this->social_links,true);
		$criteria->compare('followers',$this->followers,true);
		$criteria->compare('following',$this->following,true);
		$criteria->compare('date_modified',$this->date_modified);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
 	* This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			$this->date_modified=time();            
			return true;
		}
		else
			return false;
	}

    
    //Do Clear Session after Save
    protected function afterSave()
	{
		parent::afterSave();	        

		// If the user updated some his profile info,
		// We re-init the State of him		        	       
        if(($this->user_id==user()->id) && ($this->scenario=='update')){
        	dump(1);
        	$user = User::model()->findByPk(user()->id);	
        	$profile=UserProfile::model()->find(array('condition' => 'user_id=:uid', 'params' => array(':uid' => user()->id))); 			                         
            if($user && $profile){             
                user()->updateState($user,$profile);
	        }
	    }
	}
}
