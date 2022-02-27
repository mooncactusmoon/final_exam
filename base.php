<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db002";
    protected $pdo;
    public $table;
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,"root","");
    }
    //all
    public function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        switch(count($arg)){
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $k => $v){
                        $t[]=" `$k`='$v' ";
                    }
                    $sql.=" where ".implode(" AND ",$t);
                }else{
                    $sql.=$arg[0];
                }
            break;
            case 2:
                foreach($arg[0] as $k => $v){
                    $t[]=" `$k`='$v' ";
                }
                $sql.=" where ".implode(" AND ",$t)." ".$arg[1];
            break;
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    //q
    public function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    //math
    public function math($m,$c,...$arg){
        $sql="SELECT $m($c) FROM $this->table ";
        switch(count($arg)){
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $k => $v){
                        $t[]=" `$k`='$v' ";
                    }
                    $sql.=" where ".implode(" AND ",$t);
                }else{
                    $sql.=$arg[0];
                }
            break;
            case 2:
                foreach($arg[0] as $k => $v){
                    $t[]=" `$k`='$v' ";
                }
                $sql.=" where ".implode(" AND ",$t)." ".$arg[1];
            break;
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }
    //find
    public function find($id){
        $sql="SELECT * FROM $this->table where ";
        if(is_array($id)){
            foreach($id as $k => $v){
                $t[]=" `$k`='$v' ";
            }
            $sql.=implode(" AND ",$t);
        }else{
            $sql.=" `id`='$id'";
        }
        // echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    //del
    public function del($id){
        $sql="DELETE FROM $this->table where ";
        if(is_array($id)){
            foreach($id as $k => $v){
                $t[]=" `$k`='$v' ";
            }
            $sql.=implode(" AND ",$t);
        }else{
            $sql.=" `id`='$id'";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }
    //save
    public function save($arr){
        if(isset($arr['id'])){
            //update
            foreach($arr as $k => $v){
                if($k!='id'){
                    $t[]=" `$k`='$v' ";

                }
            }
            $sql="UPDATE $this->table set ".implode(",",$t)." where `id`='{$arr['id']}'";
        }else{
            //insert
            $sql="INSERT INTO $this->table (`".implode("`,`",array_keys($arr))."`) values('".implode("','",$arr)."')";
        }
        // echo $sql;
        return $this->pdo->exec($sql);
    }
}
function to($url){
    header("location:".$url);
}
function dd($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
$News=new DB('news');
$Que=new DB('que');
$View=new DB('view');
$User=new DB('user');
$Log=new DB('log');

if(!isset($_SESSION['view'])){
    if($View->math('count','*',['date'=>date("Y-m-d")])){
        $v=$View->find(['date'=>date("Y-m-d")]);
        $v['total']++;
        $View->save($v);
        $_SESSION['view']=$v['total'];
    }else{
        $View->save(['date'=>date("Y-m-d"),'total'=>1]);
        $_SESSION['view']=1;
    }
}
?>