<?php
/**
 * This is the model class for Create User.
 * 
 * @author Tuan Nguyen <nganhtuan63@gmail.com>
 *
 *
 */
class UserForm extends CFormModel
{
    
        public $username;        
        public $display_name;
        public $password;
        public $email;        

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
            return array(
                array('username, display_name, email, password', 'required'),                
                array('display_name', 'length', 'max'=>255),
                array('password','length','min'=>6),
                array('email, username', 'length', 'max'=>128),
                array('email', 'email' , 'message'=>t('message','Email is not valid')),
                array('email', 'unique',
                        'attributeName'=>'email',
                        'className'=>'common.models.User',
                        'message'=>t('message','This email has been registered.')),
                array('username', 'unique',
                        'attributeName'=>'username',
                        'className'=>'common.models.User',
                        'message'=>t('message','Username has been registered.')),
             );
	}

        
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>t('labels','Username'),
            'display_name'=>t('labels','Display Name'),
            'password'=>t('labels','Password'),
            'email'=>t('labels','Email')                        
		);
	}
              

}