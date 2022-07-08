<?php
class Database
{
    protected $table;

    private $conn;

    private $num_rows;

    public function __construct()
    {
        $servername = 'localhost';
        $username   = 'root';
        $password   = '';
        $dbname     = 'ProdutosLoja';

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection Failed" . $this->conn->connect_error);
        }
    }

    private function query(String $query)
    {
        $qR = $this->conn->query($query);
        $this->num_rows = $this->conn->num_rows;
        // $this->conn->close();

        return $qR;
    }
    
    protected function list()
    {
        $query = "SELECT * FROM {$this->table}";
        $data = [];
        $qR = $this->query($query);

        foreach ($qR as  $row) {
            $data[] = $row;
        }

        return $data;
    }

}

