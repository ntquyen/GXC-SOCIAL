<?php

/**
 * This is the model class for table "taxonomy_term".
 *
 * The followings are the available columns in table 'taxonomy_term':
 * @property string $id
 * @property string $taxonomy_id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property integer $parent
 * @property integer $order
 */
class TaxonomyTerm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'taxonomy_term';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('parent, order', 'numerical', 'integerOnly'=>true),
			array('taxonomy_id', 'length', 'max'=>11),
			array('name, slug', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, taxonomy_id, name, description, slug, parent, order', 'safe', 'on'=>'search'),
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
			'taxonomy_id' => t('labels','Taxonomy'),
			'name' => t('labels','Name'),
			'description' => t('labels','Description'),
			'slug' => t('labels','Slug'),
			'parent' => t('labels','Parent'),
			'order' => t('labels','Order'),
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('taxonomy_id',$this->taxonomy_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TaxonomyTerm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
