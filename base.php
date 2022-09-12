<?php

session_start();
date_default_timezone_set("Asia/Taipei");

class DB
{

    protected $table;
    protected $dsn = "mysql:='host=localhost;charset=utf8;dbname=b02";
    protected $pdo;

    function __construct($table)
    {

        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = " SELECT * FROM $this->table";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key` = '$value'";
                }
                $sql .= " WHERE " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($arg)
    {
        $sql = "SELECT * FROM $this->table WHERE ";

        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = "`$key`='$value'";
            }
            $sql .= join(" && ", $tmp);
        } else {
            $sql .= "`id`='$arg'";
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($array)
    {
        if (isset($array['id'])) {
            foreach ($array as $key => $value) {
                $tmp[] = "`$key` = '$value'";
            }
            $sql = " UPDATE $this->table set".join(',',$tmp)." WHERE `id` ='{$array['id']}'";
        } else {
            $sql = " INSERT into $this->table(`".join("`,`",array_keys($array))."`) values('".join("','",$array)."')";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    function del($arg)
    {
        $sql = " DELETE FROM $this->table WHERE";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = "`$key` = '$value'";
            }
            $sql .= join(" && ", $tmp);
        } else {
            $sql .= " `id` = '$arg'";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    function math($math, $col, ...$arg)
    {
        $sql = " SELECT $math($col) FROM $this->table";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {
                    $tmp[] = "`$key` = '$value'";
                }
                $sql .= " WHERE " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url)
{
    header("location:" . $url);
}

$Visit= new DB('visit');
$User= new DB('user');
$Que= new DB('que');
$News= new DB('news');
$Log= new DB('log');

if(!isset($_SESSION['visit'])){
    $visit = $Visit->find(['date'=>date("Y-m-d")]);
    if(!empty($visit)){
        $visit['visit']++;
        $_SESSION['visit'] = 1;
        $Visit->save($visit);
    }else{
        $visit = ['date'=>date("Y-m-d"),'visit'=>1];
        $_SESSION['visit'] = 1;
        $Visit->save($visit);
    }
}

