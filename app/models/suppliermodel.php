<?php
namespace PHPMVC\Models;

class SupplierModel extends AbstractModel
{

    public $SupplierId;
    public $Name;
    public $PhoneNumber;
    public $Email;
    public $Adress;

    protected static $tableName = 'app_suppliers';

    protected static $tableSchema = array(
        'Name'              => self::DATA_TYPE_STR,
        'PhoneNumber'       => self::DATA_TYPE_STR,
        'Email'             => self::DATA_TYPE_STR,
        'Adress'           => self::DATA_TYPE_STR

    );

    protected static $primaryKey = 'SupplierId';
}