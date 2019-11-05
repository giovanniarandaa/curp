<?php 


// VARIABLES

/*
"TEXTO"
12
true
null
new Object();
[]

$_POST
$_GET

*/


if(!empty($_POST)){
    $curp = "";

   print_r($_POST);

    $nombre = $_POST["nombre"]; 
    $paterno = $_POST["primer_apellido"];
    $materno = $_POST["segundo_apellido"];
    $genero = $_POST["genero"];
    $dia = $_POST["dia"];
    $mes = $_POST["mes"];
    $anio = $_POST["anio"];
    $entidad = $_POST["entidad"];

    $mayusculas = strtolower("HoLa");

    $paternoUpper = strtoupper($paterno);
    $paterno = str_split($paternoUpper);
    
    $maternoUpper = strtoupper($materno);
    $materno = str_split($maternoUpper);

    $nombreUpper = strtoupper($nombre);
    $nombre = str_split($nombreUpper);
    
    $primera_vocal = dame_primera_vocal($paterno);
    
    $anio = dame_el_anio_arreglado($anio);
    $mes = dame_fecha($mes);
    $dia = dame_fecha($dia);

    $consonante1 = dame_primera_consonante($paterno);
    $consonante2 = dame_primera_consonante($materno);
    $consonante3 = dame_primera_consonante($nombre);

    $curp .= $paterno[0] . $primera_vocal . $materno[0] . $nombre[0] . $anio . $mes . $dia . $consonante1 .
        $consonante2 . $consonante3 . "09";

    print_r("\n\nCURP: " . $curp);


    exit();
}

function dame_primera_vocal ($dividir) {
    $vocales = array("A", "E", "I", "O", "U");
    foreach($dividir as $res){
        if(in_array($res, $vocales)){
            return $res;
        }
    }

    return null;
}
// 1996
function dame_el_anio_arreglado ($anio){
    if(strlen($anio) == 4){
        return substr($anio, 2, 2);
    }

    return $anio;
}

function dame_fecha($string){
    if(strlen($string) == 1 ){
        return '0' . $string;
    }else{
        return $string;
    }
}

function dame_primera_consonante($string){
    $consonantes = ["B", "C", "D", "F", "G", "H", "J", "K", "L", "M", "N", "P", "Q",
                    "R", "S", "T", "V", "W", "X", "Y", "Z"];
    $datos = "";
    $x = 0;
    foreach($string as $item){
        if($x > 0){
            if(in_array($item, $consonantes)){
                $datos = $datos . $item;
                return $datos;
            }
        }
        $x++;
    }
    return null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio CURP</title>

    <link rel="stylesheet" href="main.css">
</head>
<body>
    
    <main>
        <div class="content">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre:</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Escribe tu(s) nombre(s)" value="Giovanni Alejandro"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Entidad federativa:</label>
                        <select class="form-control" name="entidad">
                            <option value="" selected>-Selecciona una opcion-</option>
                            <option value="MN" selected>Michoacán</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Primer apellido</label>
                        <input name="primer_apellido" type="text" class="form-control" placeholder="Escribe tu primer apellido" value="Aranda">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Correo electronico</label>
                        <input name="correo" type="email" class="form-control" placeholder="Escribe aqui su correo electrónico" value="giovanni.arandaa@gmail.com">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Segundo apellido</label>
                        <input name="segundo_apellido" type="text" class="form-control" placeholder="Escribe tu segundo apellido" value="Aguilar">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Género:</label>
                        <div class="form-group form-radio">
                            <label>
                                <input type="radio" name="genero" value="H" checked> Hombre
                            </label>
                            <label>
                                <input type="radio" name="genero" value="M"> Mujer
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fecha de Nacimiento:</label>
                        <div class="form-group">
                            <select class="form-control" name="dia">
                                <option value="" selected>Día</option>
                                <option value="26" selected>26</option>
                               
                            </select>
                            <select class="form-control" name="mes">
                                <option value="" selected>Mes</option>
                                <option value="1" selected>Enero</option>
                            </select>
                            <select class="form-control" name="anio">
                                <option value="" selected>Año</option>
                                <option value="1996" selected>1996</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                   <div class="form-group col-md-6">
                       <button type="submit">Guardar</button>
                   </div>
                </div>
            </form>
        </div>
    </main>

</body>
</html>