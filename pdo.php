<?php
require_once 'Conexion.php';

class ReutilizarQuery extends Conexion{

    protected $i=0;

    public function cn(){
        $cn=new Conexion();
        return $cn->cn();
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

$dato=new ReutilizarQuery();
$users=$dato->getUser();
echo $dato->getI();



echo "<table >
        <thead>
            <tr>
                <td>Id</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Edad</td>
                <td>Ciudad</td>
            </tr>
        </thead>
        <tbody>  
";
foreach ($users as $key) {
   echo "<tr>
            <td>${key['id']}</td>
            <td>${key['name']}</td>
            <td>${key['surname']}</td>
            <td>${key['year']}</td>
            <td>${key['city']}</td>
         </tr>";
}
echo "</tbody></table><br>";



echo $dato->getI();
echo "<table >
        <thead>
            <tr>
                <td>Id</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Edad</td>
                <td>Ciudad</td>
            </tr>
        </thead>
        <tbody>  
";
foreach ($users as $key) {
   echo "<tr>
            <td>${key['id']}</td>
            <td>${key['name']}</td>
            <td>${key['surname']}</td>
            <td>${key['year']}</td>
            <td>${key['city']}</td>
         </tr>";
}
echo "</tbody></table><br>";



echo $dato->getI();
echo "<table >
        <thead>
            <tr>
                <td>Id</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Edad</td>
                <td>Ciudad</td>
            </tr>
        </thead>
        <tbody>  
";
foreach ($users as $key) {
   echo "<tr>
            <td>${key['id']}</td>
            <td>${key['name']}</td>
            <td>${key['surname']}</td>
            <td>${key['year']}</td>
            <td>${key['city']}</td>
         </tr>";
}
echo "</tbody></table><br>";

