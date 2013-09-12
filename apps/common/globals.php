<?php
/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
 
/**
 * This is the shortcut to Yii::app()
 */
function app()
{
    return Yii::app();
}

/**
 * This is the shortcut to Yii::app()->clientScript
 */
function cs()
{
    // You could also call the client script instance via Yii::app()->clientScript
    // But this is faster
    return Yii::app()->getClientScript();
}
 
/**
 * This is the shortcut to Yii::app()->user.
 */
function user() 
{
    return Yii::app()->getUser();
}
 
/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}
 
/**
 * This is the shortcut to CHtml::encode
 */
function h($text)
{
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}

/**
 * Set the key, value in Session
 * @param object $key
 * @param object $value
 * @return boolean 
 */
function setSession($key,$value){
    return Yii::app()->getSession()->add($key, $value);
}

/**
 * Get the value from key in Session
 * @param object $key
 *
 * @return object
 */
function getSession($key){
    return Yii::app()->getSession()->get($key);
}
 
/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array()) 
{
    return CHtml::link($text, $url, $htmlOptions);
}

/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($category = 'general', $message, $params = array(), $source = null, $language = null) 
{
    return Yii::t($category, $message, $params, $source, $language);
}


/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url=null) 
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl(true);
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}

/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name) 
{
    return Yii::app()->params[$name];
}

/** Quick function to merge the current breadcrumb and Item **/
function breadcrumbs($arr){    
    Yii::app()->controller->breadcrumbs=array_merge(Yii::app()->controller->breadcrumbs,$arr);
}

/** Quick function to merge the current menu and Item **/
function menu($arr,$pos='before'){    
    if($pos=='before'){
        Yii::app()->controller->menu=array_merge($arr,Yii::app()->controller->menu);            
    } else {
        Yii::app()->controller->menu=array_merge(Yii::app()->controller->menu,$arr);    
    }
    
}

/**
 * var_dump($varialbe) and exit
 * 
 */
function dump($a){
    var_dump($a);
    exit;
}

/**
 * Convert local timestamp to GMT
 * 
 */
function local_to_gmt($time = '')
{
if ($time == '')
$time = time();
return mktime( gmdate("H", $time), gmdate("i", $time), gmdate("s", $time), gmdate("m", $time), gmdate("d", $time), gmdate("Y", $time));
}

function toThisTime(){
    $time = microtime();   
    $finish = $time;
    $total_time = ($finish - START)*1000;
    echo $total_time;
    exit;
}

function logFile($file,$content){
    $current = file_get_contents($file);
    // Append a new person to the file
    $current .= "\n".date('d/m/y H:i:s').'--'.$content;
    // Write the contents back to the file
    file_put_contents($file, $current)  ;
}