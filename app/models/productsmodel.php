<?php


namespace PHPMVC\Models;

class ProductsModel extends AbstractModel
{

    public $ProductId;
    public $CategoryId;
    public $Name;
    public $Image;
    public $Ouantity;
    public $Price;
    public $BarCode;
    public $Unit;

    protected static $tableName = 'app_products_list';

    protected static $tableSchema = array(
        'CategoryId'        => self::DATA_TYPE_INT,
        'Name'              => self::DATA_TYPE_STR,
        'Image'             => self::DATA_TYPE_STR,
        'Ouantity'          => self::DATA_TYPE_STR,
        'Price'             => self::DATA_TYPE_STR,
         'Unit'             => self::DATA_TYPE_STR

    );

    protected static $primaryKey = 'ProductId';



    public static function  getAll()
    {
        return self::get($sql='select pl.*,ap.name ProductsCategories from '.self::$tableName.  ' as pl inner join  app_products_categories as ap on(ap.CategoryId=pl.CategoryId)');


    }

}


?>