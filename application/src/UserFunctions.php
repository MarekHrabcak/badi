<?php

class UserFunctions
{

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;

    }

    public function login($email, $password) {
        $user = $this->findUserAndGetUser($email);

        if ($user == null) {
            AlertFunctions::addAlert(AlertFunctions::ERROR, 'Email or password is incorrect');
            CoreFunctions::redirect('index.php?page=login');
        }

        if (!password_verify($password, $user['password'])) {
            AlertFunctions::addAlert(AlertFunctions::ERROR, 'Email or password is incorrect');
            CoreFunctions::redirect('index.php?page=login');
        }

        if ($user['status'] != 2) {
            AlertFunctions::addAlert(AlertFunctions::ERROR, 'Inactive user');
            CoreFunctions::redirect('index.php?page=login');
        }

        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role_code'];
        $_SESSION['email'] = $user['email'];

        AlertFunctions::addAlert(AlertFunctions::SUCCESS, 'Login successful');
        CoreFunctions::redirect('index.php?page=homepage');

    }

    public function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['role']);
        unset($_SESSION['email']);
        session_destroy();
        CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
    }


    private function findUserAndGetUser($email)
    {
        $query = "SELECT u.id, u.status, u.password, u.email, ur.code AS role_code FROM users AS u JOIN user_roles AS ur ON u.role = ur.id WHERE u.email = '$email'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();

        } else {
            return null;
        }
    }

    public function displayAllUsers()
    {
        $query = "SELECT u.id, u.email, u.status, ur.name AS role_name FROM users AS u JOIN user_roles AS ur ON u.role = ur.id";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }

    public function displayUserRoleInfo()
    {
        $query = "SELECT id,name FROM user_roles";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }


    public function insertDataUser($post)
    {
        $email = $this->connection->real_escape_string($_POST['email']);
        $password = $this->connection->real_escape_string($_POST['password']);
//        Status je 1 = zablokovany, status 2 = aktivny
        $status = 1;
        $role = $this->connection->real_escape_string($_POST['role']);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users(email,status,password,role) VALUES('$email','$status','$password','$role')";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            AlertFunctions::addAlert(AlertFunctions::SUCCESS, 'User created');
            CoreFunctions::redirect(CoreFunctions::PAGE_USER_ADMIN);
        } else {
            AlertFunctions::addAlert(AlertFunctions::ERROR, 'User creation failed, try it again!');
            CoreFunctions::redirectWithId(CoreFunctions::PAGE_USER_EDIT, $id);
        }
    }


    public function updateRecordUser($postData)
    {
        $id = $this->connection->real_escape_string($_POST['id']);
        $user_email = $this->connection->real_escape_string($_POST['uuser_email']);
        if (empty($user_email)) {
            AlertFunctions::addAlert(AlertFunctions::ERROR, 'Empty email');
            CoreFunctions::redirectWithId(CoreFunctions::PAGE_USER_EDIT, $id);
        }

        $user_status = $this->connection->real_escape_string($_POST['uuser_status']);
        if (empty($user_status)) {
            AlertFunctions::addAlert(AlertFunctions::ERROR, 'Invalid status');
            CoreFunctions::redirectWithId(CoreFunctions::PAGE_USER_EDIT, $id);
        }

        $user_role = $this->connection->real_escape_string($_POST['uuser_role']);
        if (empty($user_role)) {
            AlertFunctions::addAlert(AlertFunctions::ERROR, 'Invalid role');
            CoreFunctions::redirectWithId(CoreFunctions::PAGE_USER_EDIT, $id);
        }

        $user_password = $this->connection->real_escape_string($_POST['uuser_password']);



        if (!empty($id) && !empty($postData)) {
            if (!empty($user_password)) {
                $user_password = password_hash($user_password, PASSWORD_BCRYPT);
                $query = "UPDATE users SET email = '$user_email', password = '$user_password',status = '$user_status',role = '$user_role' WHERE id = '$id'";
            } else {
                $query = "UPDATE users SET email = '$user_email', status = '$user_status', role = '$user_role' WHERE id = '$id'";
            }

            $sql = $this->connection->query($query);
            if ($sql == true) {
                AlertFunctions::addAlert(AlertFunctions::SUCCESS, 'User updated');
                CoreFunctions::redirect(CoreFunctions::PAGE_USER_ADMIN);
            } else {
                AlertFunctions::addAlert(AlertFunctions::ERROR, 'Registration updated failed try again!');
                CoreFunctions::redirectWithId(CoreFunctions::PAGE_USER_EDIT, $id);
            }
        }

    }

    public function displayRecordByIdUser($id)
    {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    public function deleteRecordUser($id)
    {
        $query = "DELETE FROM users WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location: index.php?page=users&msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }

    public function displayAllRoles()
    {
        $query = "SELECT * FROM user_roles";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }

    public function displayRecordByIdRole($id)
    {
        $query = "SELECT * FROM user_roles WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }

    }

    public function updateRecordRole($postData)
    {
        $code = $this->connection->real_escape_string($_POST['ucode']);
        $name = $this->connection->real_escape_string($_POST['uname']);
        $id = $this->connection->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE user_roles SET code = '$code', name = '$name' WHERE id = '$id'";
            $sql = $this->connection->query($query);
            if ($sql == true) {
                header("Location: index.php?page=users&msg2=update");
            } else {
                echo "Registration updated failed try again!";
            }
        }
    }


}