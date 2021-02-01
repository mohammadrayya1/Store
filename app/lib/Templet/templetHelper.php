<?php


namespace PHPMVC\lib\Templet;

trait TempletHelper
{
public function matchurl($url)
{
    return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)===$url;


}

public function showValue($fieldName,$object=null)
{
    return isset($_POST[$fieldName])?$_POST[$fieldName]: (is_null($object)?'':$object->$fieldName);
}

    public function labelfloat($fieldName,$object=null)
    {
        return isset($_POST[$fieldName])&& !empty($_POST[$fieldName])|| null !==$object && $object->$fieldName!=''?'class=floated':'';
    }



    public function selectedIf($fieldName,$value,$object=null)
    {
        return((isset($_POST[$fieldName])&& $_POST[$fieldName]==$value)|| null !==$object && $object->$fieldName!=''?'selected=selected':'');
    }
}
