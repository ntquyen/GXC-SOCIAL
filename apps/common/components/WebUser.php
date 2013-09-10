<?php
/**
 * Class User
 * 
 * 
 * @author Tuan Nguyen  <nganhtuan63@gmail.com>
 */

class WebUser extends CWebUser{
    

	/**
	 * Initializes the component.
	 */
	public function init()
	{
		parent::init();
		
	}


    /**
    * Implement to store autoLoginToken Key only, 
    * not other State Information
    **/
    public function saveIdentityStates() 
    { 
        $states=array(); 
        foreach($this->getState(self::STATES_VAR,array()) as $name=>$dummy) 
        {
            if($name=='autoLoginToken')
                $states[$name]=$this->getState($name); 
        }
        return $states; 
    }

    /**
     * Function to check from Before Login if it is from Cookie
     * @param type $id
     * @param type $states
     * @param type $fromCookie
     * @return type 
     */
    public function beforeLogin($id, $states, $fromCookie)
    {
            if($fromCookie)
            {
                if(empty($states['autoLoginToken']))
                {
                    return false;
                }

                $autoLoginKey=$states['autoLoginToken'];
                $connection=Yii::app()->db;
                $command=$connection->createCommand('SELECT * FROM {{autologin_tokens}} WHERE user_id=:user_id');
                $command->bindValue(':user_id',$id,PDO::PARAM_STR);
                $row=$command->queryRow();      

                //Re-generate Autologin Token
                if(!empty($row) && $row['token']===$autoLoginKey){
                    $autoLoginToken=sha1(uniqid(mt_rand(),true));
                    $this->setState('autoLoginToken',$autoLoginToken);                        
                    $connection=Yii::app()->db;                       
                    //delete old keys
                    $command=$connection->createCommand('DELETE FROM {{autologin_tokens}} WHERE user_id=:user_id');
                    $command->bindValue(':user_id',$id,PDO::PARAM_STR);
                    $command->execute();                        
                    //set new
                    $command=$connection->createCommand('INSERT INTO {{autologin_tokens}}(user_id,token) VALUES(:user_id,:token)');
                    $command->bindValue(':user_id',$id,PDO::PARAM_STR);
                    $command->bindValue(':token',$autoLoginToken,PDO::PARAM_STR);
                    $command->execute();
                    return true;
                } else {
                    return false;
                }
                
            }
            return true;
    } 	 

    /**
    * Actions to be taken after logging in.
    * Overloads the parent method in order to mark superusers.
    * @param boolean $fromCookie whether the login is based on cookie.
    */
    public function afterLogin($fromCookie)
    {
        parent::afterLogin($fromCookie);
        
        $user = User::model()->findByPk($this->id);		
        $profile=UserProfile::model()->find(array('condition' => 'user_id=:uid', 'params' => array(':uid' => $this->id)));

        if($user && $profile){             
            $this->updateState($user,$profile);                           
        } else {
             throw new CHttpException(400,t('message','Error while Logging into your account. Please try again later.'));
        }
    
        
    }

	/**
	 * Get the basic Info for logged in user
	 */	
	public function getInfo()
	{
		return $this->getState('__info', false);
	}

	/**
	 * Set the basic Info for logged in user
	 */
	public function setInfo($value)
	{
		$this->setState('__info', $value);
	}


	/**
	 * Returns whether the logged in user is an administrator.
	 * @return boolean the result.
	 */
	public function getIsAdmin()
	{
		return $this->getState('__isAdmin', false);
	}

	/**
	 * Sets the logged in user as an administrator.
	 * @param boolean $value whether the user is an administrator.
	 */
	public function setIsAdmin($value)
	{
		$this->setState('__isAdmin', $value);
	}

	/**
	 * Performs access check for this user.
	 * @param string $operation the name of the operation that need access check.
	 * @param array $params name-value pairs that would be passed to business rules associated
	 * with the tasks and roles assigned to the user.
	 * @param boolean $allowCaching whether to allow caching the result of access check.
	 * @return boolean whether the operations can be performed by this user.
	 */
	public function checkAccess($operation, $params = array(), $allowCaching = true)
	{
		if ($this->getIsAdmin())
			return true;

		return parent::checkAccess($operation, $params, $allowCaching);
	}

    /*
    * Update the State for the current user
    */
    public function updateState($user,$profile)
    {
        $info=array();
        // Set User from User Model              
        foreach($user->attributes as $k=>$v){
            $info[$k]=$v;
        }

        // Set more user info from profile
        foreach($profile->attributes as $k=>$v){
            $info[$k]=$v;
        }
        
        // Set User States here
        $this->info=$info;            

        // Set Admin if the user is in group of Admin
        //$this->setIsAdmin(in_array($this->name, Yii::app()->authManager->admins));
    }

   


}