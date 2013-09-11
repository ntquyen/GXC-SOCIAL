<?php
/**
 * UserIdentity.php
 *
 *
 *
 */
class UserIdentity extends CUserIdentity {
	/**
	 * @var integer id of logged user
	 */
	private $_id;

	/**
	 * Authenticates username and password
	 * @return boolean CUserIdentity::ERROR_NONE if successful authentication
	 */
	public function authenticate() {
		$attribute = strpos($this->username, '@') ? 'lower(email)' : 'lower(username)';
		$user = User::model()->find(array('condition' => $attribute . '=:loginname', 'params' => array(':loginname' => $this->username)));		
		if($user!==null){

			//We found the User, We will check its Login Information
			$login=UserLogin::model()->find(array('condition' => 'user_id=:uid', 'params' => array(':uid' => $user->id)));
			if($login === null ){
				// Not found the Login Info				
				$this->errorCode = self::ERROR_USERNAME_INVALID;
			} else {
				if(!$login->verifyPassword($this->password,$login->pass_hash)){
					$this->errorCode = self::ERROR_PASSWORD_INVALID;
				} else {

						// We check if the user is active or not
						if($login->status!=SiteDefine::USER_STATUS_ACTIVE){
							$this->errorCode=SiteDefine::USER_ERROR_NOT_ACTIVE;
						} 
						else {
								// If the site allow auto Login, create token to recheck for Cookies
			                    if(Yii::app()->user->allowAutoLogin)
			                    {
			                        $autoLoginToken=sha1(uniqid(mt_rand(),true));
			                        $this->setState('autoLoginToken',$autoLoginToken);                        
			                        $connection=Yii::app()->db;                       
			                        //delete old keys
			                        $command=$connection->createCommand('DELETE FROM {{user_autologin_tokens}} WHERE user_id=:user_id');
			                        $command->bindValue(':user_id',$user->id,PDO::PARAM_STR);
			                        $command->execute();                        
			                        //set new
			                        $command=$connection->createCommand('INSERT INTO {{user_autologin_tokens}}(user_id,token) VALUES(:user_id,:token)');
			                        $command->bindValue(':user_id',$user->id,PDO::PARAM_STR);
			                        $command->bindValue(':token',$autoLoginToken,PDO::PARAM_STR);
			                        $command->execute();
			                    }
		                    
			                    //Start to set the recent_login time for this user
			                    $login->recent_login=time();
			                    $login->login_attempts=0;
			                    $login->save();        

								$this->_id = $user->id;								

								$this->username = $user->username;					
								$this->errorCode = self::ERROR_NONE;
						}
					 	
				}
			}
		} else {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		return !$this->errorCode;

	}

	/**
	 *
	 * @return integer id of the logged user, null if not set
	 */
	public function getId() {
		return $this->_id;
	}

}