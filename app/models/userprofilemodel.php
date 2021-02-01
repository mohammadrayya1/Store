<?php
namespace PHPMVC\Models;

class UserprofileModel extends AbstractModel
{
    public $UserId;
    public $LastName;
    public $FirstName;
    public $Address;
    public $BOD;
    public $Image;


    /**
     * @var UserProfileModel
     */
    public $profile;
    public $privileges;

    protected static $tableName = 'app_usres_profiles';

    protected static $tableSchema = array(
        'UserId'            => self::DATA_TYPE_INT,
        'FirstName'          => self::DATA_TYPE_STR,
        'LastName'          => self::DATA_TYPE_STR,
        'Address'             => self::DATA_TYPE_STR,
        'BOD'               => self::DATA_TYPE_DATE,
        'Image'             => self::DATA_TYPE_STR,

    );

    protected static $primaryKey = 'UserId';

    public function cryptPassword($password)
    {
        $this->Password = crypt($password, APP_SALT);
    }

    // TODO:: FIX THE TABLE ALIASING
    public static function getUsers(UserprofileModel $user)
    {
        return self::get(
        'SELECT au.*, aug.GroupName GroupName FROM ' . self::$tableName . ' au INNER JOIN app_users_groups aug ON aug.GroupId = au.GroupId WHERE au.UserId != ' . $user->UserId
        );
    }


    public static function getAll()
    {
   return self::get(

'select au.*,aug.GroupName GroupName From '.self::$tableName.' au INNER JOIN app_users_groups aug on aug.GroupId = au.GroupId'


   );

    }


    public static function userExists($username)
    {
        return self::get('
            SELECT * FROM ' . self::$tableName . ' WHERE Username = "' . $username . '"
        ');
    }
    public static function emailExists($Email)
    {
        return self::get('
            SELECT * FROM ' . self::$tableName . ' WHERE  Email = "' . $Email . '"
        ');
    }

    public static function authenticate ($username, $password,$session)
    {

        $password = crypt($password, APP_SALT);
        $sql = 'SELECT *, (SELECT GroupName FROM app_users_groups WHERE app_users_groups.GroupId = ' . self::$tableName . '.GroupId) GroupName FROM ' . self::$tableName . ' WHERE Username = "' . $username . '" AND Password = "' . $password . '"';
        $foundUser = self::getOne($sql);
      //  var_dump($foundUser);
       if(false !== $foundUser) {

            if($foundUser->Status == 2) {
                return 2;
            }
            $foundUser->LastLogin = date('Y-m-d H:i:s');
            $foundUser->save();
//            $foundUser->profile = UserProfileModel::getByPK($foundUser->UserId);
//            $foundUser->privileges = UserGroupPrivilegeModel::getPrivilegesForGroup($foundUser->GroupId);
            $session->u = $foundUser;


            return 1;
        }
        return false;
    }






}