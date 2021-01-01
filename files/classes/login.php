<?php
class User extends DbConfig{
    public function check_login($username, $password)
    {
        $result = $this->connection->query("select * from user where user_id = '$username' and password = '$password'");
        $user_data = $result->fetch_array();
        $no_rows = mysqli_num_rows($result);
        if ($no_rows == 1)
        {
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['nama'] = $user_data['nama'];
            $_SESSION['level'] = $user_data['level'];
            $_SESSION['password'] = $user_data['password'];
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function getProfil($id)
    {
        $result = $this->connection->query("SELECT * FROM user WHERE user_id = '$id'");

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }
}
?>