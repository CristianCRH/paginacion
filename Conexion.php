<?php
 class Conexion {
  protected  function cn(){
        $cn='';
        try {
         $cn   = new PDO('mysql:host=localhost;dbname=test','root','');
         $cn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
         $cn->setAttribute(PDO::ATTR_ERRMODE, true);
         $cn->exec('SET CHARACTER SET utf8');
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return $cn;
    }

    protected function cni(){
        $cn='';

        try {
            $cn=new mysqli('localhost:3306','root','','test');
        } catch (\Throwable $e) {
           echo $e->getMessage();
           die();
        }
    }
}