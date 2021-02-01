<?php
namespace PHPMVC\Models;

class PriviligModel extends AbstractModel
{


    public $PrivilegeId;
    public $PriviligTitle;
    public $Privilege;


    /**
     * @var UserProfileModel
     */
    public $profile;
    public $privileges;

    protected static $tableName = 'app_users_privileges';

    protected static $tableSchema = array(
        'PrivilegeId'            => self::DATA_TYPE_INT,
        'PriviligTitle'          => self::DATA_TYPE_STR,
        'Privilege'          => self::DATA_TYPE_STR,
    );

    protected static $primaryKey = 'PrivilegeId';

}