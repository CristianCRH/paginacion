<?php
require_once 'Conexion.php';

class Users extends Conexion{
    protected function cn(){
    $cn = new Conexion();
      return  $cn = $cn->cn();
    }

    public function totalRegistro()
    {
        $sql = ' SELECT * FROM users ';
        $collection = $this->cn()->prepare($sql);
        $collection->execute();
        return $collection->rowCount();
    }

    public  function getUsers($numPag)
    {
        $registroPorPagina = 20;//CANTIDAD DE REGISTROS POR PÁGINA
        $paginaActual=$numPag;
       
        $desde = ($paginaActual-1)*$registroPorPagina;
        
        $sql ='SELECT * FROM users LIMIT :desde,:hasta';
        $users = $this->cn()->prepare($sql);
        $users->bindParam(':desde',$desde);
        $users->bindParam(':hasta',$registroPorPagina);
        $users->execute();
        
        $rows = $users->fetchAll();
        return $rows;
    }

    public function tabulador(){

    }
}

$numPag = $_GET['pag']??1;

$users = new Users();
$data=$users->getUsers($numPag);


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
foreach ($data as $key) {
   echo "<tr>
            <td>${key['id']}</td>
            <td>${key['name']}</td>
            <td>${key['surname']}</td>
            <td>${key['year']}</td>
            <td>${key['city']}</td>
         </tr>";
}
echo "</tbody></table>";

for ($i=1; $i <= ceil($users->totalRegistro()/20) ; $i++) { 
  echo "<a href='?pag={$i}'>$i</a> ";
}

echo '<br>----------------------------------------------<br>';


$tatalRegistro= $users->totalRegistro();
$numTabuladores = 5;
$flag=$numTabuladores;
echo ceil($tatalRegistro/20-2) ;
if($numPag > 2 & $numPag > ceil($tatalRegistro/20-2) ){
    $numPag=$numPag-2;
}

if($numPag!=1){
    echo '<< ';
}

for ($i=1; $i <= ceil($tatalRegistro/20) ; $i++) { 

    if($flag!=$numTabuladores & $numTabuladores!=0){
        echo "<a href='?pag={$i}'>$i</a> ";
        $numTabuladores--;
    }

    if($numPag==$i){
        echo "<a href='?pag={$i}'>$i</a> ";
        $numTabuladores--;
     }
}

echo ' >>';