<?php
class User
{
    var $id = null;
    var $UserID = null;
    var $Username = null;
    var $Password = null;
    var $FullName = null;
    var $Email = null;
    var $role = null;
    var $Address = null;
    var $Phone = null;

    function getUser()
    {
        $db = new connect();
        $select = "SELECT * FROM users";
        return $db->pdo_query($select);
    }

    function checkUser($Username, $Password)
    {
        $db = new connect();
        $select = "SELECT * FROM users WHERE UserName='$Username' AND Password='$Password'";
        $result = $db->pdo_query_one($select);

        if ($result != null) {
            $this->role = $result['role'];
            return true;
        } else {
            return false;
        }
    }

    public function userid($username, $password)
    {
        $db = new connect();
        $select = "SELECT UserID FROM users WHERE UserName='$username' AND Password='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function getList()
    {
        $db = new connect();
        $query = "SELECT * FROM users"; 
        $result = $db->pdo_query($query);
        return $result;
    }

    public function getByID($id)
    {
        $db = new connect();
        $query = "SELECT * FROM users WHERE userID = :id";
        $params = array(':id' => $id);
        $result = $db->pdo_query_one($query, $params);
        return $result ?? [];
    }
    
    
    public function addUser($Username, $FullName, $Email, $Phone, $Address, $Password, $role)
    {
        $db = new connect();
        $query = "INSERT INTO users (userID, UserName, fullName, email, phone, address, password, role) 
                  VALUES (null, '$Username', '$FullName', '$Email', '$Phone', '$Address', '$Password', 'user')";
        $result = $db->pdo_execute($query);
        return $result;
    }

    public function updateUser($Username, $Password, $Fullname, $Email, $Address, $Phone, $UserID)
    {
        $db = new connect();

        // Kiểm tra xem UserID có tồn tại không
        $existingUser = $this->getByID($UserID);
        if (!$existingUser) {
            return false; // UserID không tồn tại
        }

        // Cập nhật thông tin người dùng
        $query = "UPDATE users SET UserName = '$Username', Password = '$Password', FullName = '$Fullname', 
                  Email = '$Email', Address = '$Address', Phone = '$Phone' WHERE UserID = '$UserID'";
        $result = $db->pdo_execute($query);

        return $result;
    }


    public function deleteUser($id)
    {
        $db = new connect();
        $query = "DELETE FROM users WHERE UserID = '$id'";
        $result = $db->pdo_query_one($query);
        return $result;
    }

    function getRole()
    {
        return $this->role;
    }

    public function countUser()
    {
        $db = new connect();
        $sql = "SELECT COUNT(userID) AS countUser FROM users";
        $result = $db->pdo_execute($sql);
        return $result;
    }

}
?>
