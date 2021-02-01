<?php
namespace PHPMVC\lib;

class Language
{
    private $_dictionary=[];

    public  function load($path)
    {

        $defualtlanguage=APP_DEFUALT_LANGUAGE;
if(isset($_SESSION['lang']))
{
    $defualtlanguage=$_SESSION['lang'];
}
$patharray=explode('.',$path);
$languageFile=LANGUAG_PATH.$defualtlanguage.ds.$patharray[0].ds.$patharray[1].".lang.php";


if(file_exists($languageFile))
   {
       require $languageFile;
       if(is_array($_) && !empty($_))
       {
           foreach ($_ as $key=>$value){
              $this->_dictionary[$key]=$value;

       }}
       else{
               trigger_error("sorry the path ".$languageFile."is not finded");
       }

       }
   }


   public function get($key)
   {
       if(array_key_exists($key,$this->_dictionary))
       {
           return $this->_dictionary[$key];
       }
   }


   public  function feedkey($key,$data)
   {

       if(array_key_exists($key,$this->_dictionary))
       {
          array_unshift($data,$this->_dictionary[$key]);

        return call_user_func_array('sprintf',$data);
       }
   }





   public function getdictionary()
   {
       return $this->_dictionary;
   }

}