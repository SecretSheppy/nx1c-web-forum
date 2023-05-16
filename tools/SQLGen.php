<?php

class SQLGen
{
    public function __construct()
    {
        $this->statement = "";
    }

    public function select(string $data):SQLGen
    {
        $this->statement .= "SELECT $data ";
        return $this;
    }

    public function select_array(array $data):SQLGen
    {
        $this->statement .= "SELECT ";
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->statement .= $data[$i];
            if ($i != sizeof($data) - 1) {
                $this->statement .= ",";
            } else {
                $this->statement .= " ";
            }
        }
        return $this;
    }

    public function insert_into(string $data):SQLGen
    {
        $this->statement .= "INSERT INTO $data ";
        return $this;
    }

    public function update(string $data):SQLGen
    {
        $this->statement .= "UPDATE $data ";
        return $this;
    }

    public function fields(array $data):SQLGen
    {
        $this->statement .= "(";
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->statement .= $data[$i];
            if ($i != sizeof($data) - 1) {
                $this->statement .= ",";
            } else {
                $this->statement .= ") ";
            }
        }
        return $this;
    }

    public function values(array $data):SQLGen
    {
        $this->statement .= "VALUES (";
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->statement .= "'$data[$i]'";
            if ($i != sizeof($data) - 1) {
                $this->statement .= ",";
            } else {
                $this->statement .= ") ";
            }
        }
        return $this;
    }

    public function from($data):SQLGen
    {
        $this->statement .= "FROM $data ";
        return $this;
    }

    public function from_array($data):SQLGen
    {
        $this->statement .= "FROM ";
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->statement .= $data[$i];
            if ($i != sizeof($data) - 1) {
                $this->statement .= ",";
            } else {
                $this->statement .= " ";
            }
        }
        return $this;
    }

    public function set(array $data):SQLGen
    {
        $this->statement .= "SET ";
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->statement .= $data[$i];
            if ($i != sizeof($data) - 1) {
                $this->statement .= ",";
            } else {
                $this->statement .= " ";
            }
        }
        return $this;
    }

    public function where($data):SQLGen
    {
        $this->statement .= "WHERE $data";
        return $this;
    }

    public function order_by($data):SQLGen
    {
        $this->statement .= "ORDER BY $data";
        return $this;
    }

    public function limit($data):SQLGen
    {
        $this->statement .= "LIMIT $data";
        return $this;
    }

    public function get_statement():string
    {
        return $this->statement;
    }

    public function clear():SQLGen
    {
        $this->statement = "";
    }
}