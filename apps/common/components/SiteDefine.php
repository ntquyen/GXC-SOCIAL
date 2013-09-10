<?php

/**
 * Class defined all the Constant value of the Site
 * 
 * 
 * @author Tuan Nguyen
 * @version 1.0
 * @package common.components
 */

class SiteDefine{    
    
    /**
     * Constant related to User
     */
    const USER_ERROR_NOT_ACTIVE=3;    
    const USER_STATUS_DISABLED=0;
    const USER_STATUS_ACTIVE=1;
        
    
    public static function getUserStatus(){
        return array(
            self::USER_STATUS_DISABLED=>t("labels","Disabled"),
            self::USER_STATUS_ACTIVE=>t("labels","Active"));
    }
}