<?php

class Model
{
    /**
     * @return mysqli
     */
    private $conn;
    public function __construct()
    {
        // Inisialisasi database
        $this->conn = new mysqli(
            $GLOBALS['MYSQL_DATABASE']['hostname'],
            $GLOBALS['MYSQL_DATABASE']['username'],
            $GLOBALS['MYSQL_DATABASE']['password'],
            $GLOBALS['MYSQL_DATABASE']['database']
        );

        // Apabila database error
        if ($this->conn->connect_error) {
            $data['code'] = 500;
            $data['desc'] = 'Internal Server Error';
            $data['caption'] = error_get_last()['message'];
            die(require_once VIEW_ERROR);
        }
    }

    public function escape_string($string)
    {
        return $this->conn->real_escape_string($string);
    }

    public function read($column, $table, $where = '')
    {
        $ret = 'SELECT ';

        // Column constructor
        if (sizeof($column) > 1) {
            $eColumn = [];
            foreach ($column as $c) {
                array_push($eColumn, $this->escape_string($c));
            }
            $ret = $ret . "`" . implode("`, `", $eColumn) . "` ";
        } else if ($column != '*') {
            $ret = $ret . "`" . $this->escape_string($column) . "` ";
        } else {
            $ret = $ret . '* ';
        }

        // Table constructor
        $tbl = $this->escape_string($table);
        $ret = $ret . 'FROM ' . $tbl;

        // Where constructor
        if ($where && sizeof($where) > 0) {
            $ret = $ret . ' WHERE ';
            $newArr = [];
            foreach ($where as $w) {
                array_push($newArr, "`$w[0]` $w[1] '" . $this->escape_string($w[2]) . "'");
            }
            $ret = $ret . implode(' AND ', $newArr);
        }

        $result = $this->conn->query($ret);

        // return $ret;
        error_reporting(0);
        if ($result->num_rows > 0) {
            $rret = [];
            while ($data = $result->fetch_assoc()) {
                array_push($rret, $data);
            }
            return $rret;
        } else {
            return null;
        }
    }
}
