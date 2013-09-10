<?php

/**
 * This is the model class for table "object".
 *
 * The followings are the available columns in table 'object':
 * @property integer $id
 * @property string $guid
 * @property integer $lang
 * @property integer $user_id
 * @property string $type
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $slug
 * @property string $thumb
 * @property integer $date_created
 * @property integer $date_modified
 * @property integer $status
 */
class Object extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'object';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('guid, user_id, type, date_created, date_modified, status', 'required'),
			array('lang, user_id, date_created, date_modified, status', 'numerical', 'integerOnly'=>true),
			array('guid', 'length', 'max'=>23),
			array('slug, thumb', 'length', 'max'=>255),
			array('name, description, content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guid, lang, user_id, type, name, description, content, slug, thumb, date_created, date_modified, status', 'safe', 'on'=>'search'),
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
			'guid' => t('labels','GUID'),
			'lang' => t('labels','Language'),
			'user_id' => t('labels','User'),
			'type' => t('labels','Type'),
			'name' => t('labels','Name'),
			'description' => t('labels','Description'),
			'content' => t('labels','Content'),
			'slug' => t('labels','Slug'),
			'thumb' => t('labels','Thumb'),
			'date_created' => t('labels','Date Created'),
			'date_modified' => t('labels','Date Modified'),
			'status' => t('labels','Status'),
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

		$criteria->compare('id',$this->id);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('lang',$this->lang);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('date_created',$this->date_created);
		$criteria->compare('date_modified',$this->date_modified);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Object the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
