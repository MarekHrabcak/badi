<?php

class Connection {

    private $servername = "host.docker.internal";
    private $username   = "root";
    private $password   = "root";
    private $database   = "badi";
    public  $connection;


    // Database Connection
    public function __construct()
    {
        $this->connection = new mysqli($this->servername, $this->username,$this->password,$this->database);
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        }else{
            return $this->connection;
        }
    }


    // // Database Connection
    // public function __construct()
    // {
    //     $mysqli_socket = ini_get('mysqli.default_socket');
    //     $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->mysqli_socket);
    //     if ($this->connection->connect_error) {
    //         die("Connection failed: " . $this->connection->connect_error);
    //     }
    // }




    public function getConnection() {
        return $this->connection;
    }


    //    GET NAV items
    public function getMenuItems()
    {
        $sql = "SELECT m.icon, m.name, m.href, r.code FROM dshb_menu AS m INNER JOIN user_roles AS r ON m.min_user_role=r.id";
        $stm = $this->connection->query($sql);
        $data = array();
        while ($row = $stm->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}

