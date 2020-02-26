<?php

require_once 'Conexion.php';

class Mysqli_ extends Conexion{
    protected $i=0;

    public function cn(){
        $cn=new Conexion();
        return $cn->cni();
    }

    public function getUser()
    {
       $sql=' SELECT * FROM users ';
       $users=$this->cn()->prepare($sql);
       $users->execute();

       /* $rows=[];
        foreach ($users as $row ) {
          $rows[]=$row;
        }
        while ($row=$users->fetch()) {
            $rows[]=$row;
        }
        return $rows;*/
        $this->i+=1;
        return $users->fetchAll();

    }

    public function getI(){
        return 'Me ejecuté '. $this->i .' veces';
    }
}

$dato=new Mysqli_();
var_dump($dato->cn());