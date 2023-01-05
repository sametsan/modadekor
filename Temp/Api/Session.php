<?

namespace Api\Model;


class Session extends \Core\Api
{

    private static  $table_name = "users";

    public static  function login($username, $password)
    {

        $query = self::db()->query("SELECT * from " . self::$table_name . " where username='$username'");
        $row = $query->fetch_object();

        if (md5($password) == $row->password) {
            $token_id = md5($row->username . "-" . time());
            self::update($row->id, "token_id=$token_id");
            self::setTokenId($token_id);
            return true;
        } else
            return false;
    }

    public static function getTokenId()
    {
        if (!isset($_SESSION["token_id"]))
            return 0;

        return $_SESSION["token_id"];
    }

    public static function setTokenId($token_id)
    {
        $_SESSION["token_id"] = $token_id;
    }

    public static  function logout()
    {

        $row = self::getUserByTokenId(self::getTokenId());
        self::update($row->id, "token_id='0'");
    }

    public static  function isLogin()
    {

        $row = self::getUserByTokenId(self::getTokenId());

        if($row == NULL)   
            return false;

        if ($row->permission == 0) {
            return true;
        } else {
            return false;
        }
    }

    public static  function isAdmin()
    {
        $row = self::getUserByTokenId(self::getTokenId());

        if($row == NULL)   
            return false;
   
        if ($row->permission == 1) {
            return true;
        } else {
            return false;
        }
    }


    public static  function register($username, $password, $email)
    {

        $query = self::db()->query("INSERT INTO users (username, email, password) values ('$username','$email','$password')");
        // Execute
        if ($query->fetch_object()) {
            return true;
        } else {
            return false;
        }
    }

    public static  function getUserById($id)
    {
        if($id == 0)
            return NULL;

        $query = self::db()->query("SELECT * FROM " . self::$table_name . " WHERE id='$id'");
        $row = $query->fetch_object();

        if($row)
            return $row[0];
        else
            return NULL;
    }

    public static  function getUserByTokenId($token_id)
    {
        if($token_id == 0)
            return NULL;

        $query = self::db()->query("SELECT * FROM " . self::$table_name . " WHERE token_id='$token_id'");
        $row = $query->fetch_object();

        if($row)
            return $row[0];
        else
            return NULL;
    }

    public static function getAll($sirala = "ASC", $limit = 99999)
    {
        $liste = [];
        $sql = self::db()->query("SELECT * FROM " . self::$table_name . " ORDER BY id $sirala LIMIT $limit");

        while ($s = $sql->fetch_object())
            array_push($liste, $s);

        return $liste;
    }

    public static function delete($id)
    {
        if ($id > 0) {
            self::db()->query("DELETE FROM " . self::$table_name . "  WHERE id='$id'");
            return TRUE;
        } else
            return FALSE;
    }


    public static function update($id, $deger)
    {
        $sql = self::db()->query("UPDATE " . self::$table_name . "  SET $deger WHERE id='$id'");
        return TRUE;
    }
};
