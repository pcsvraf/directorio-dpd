<?php

$connect = mysqli_connect("localhost", "estudiantespucv_dpd", "DpdPucv20xx", "estudiantespucv_dpd");
if (isset($_POST["unidadAcademica"], $_POST["nombre"], $_POST["cargo"], $_POST["contratoEscalafon"], $_POST["correo"])) {
    $uAcad = mysqli_real_escape_string($connect, $_POST["unidadAcademica"]);
    $nombre = mysqli_real_escape_string($connect, $_POST["nombre"]);
    $cargo = mysqli_real_escape_string($connect, $_POST["cargo"]);
    $contrato = mysqli_real_escape_string($connect, $_POST["contratoEscalafon"]);
    $email = mysqli_real_escape_string($connect, $_POST["correo"]);

    $query1 = "SELECT id FROM docentes order by id DESC LIMIT 1";
    $resultado = mysqli_query($connect, $query1);
    $id = mysqli_fetch_row($resultado);
    $ide = $id[0] + 1;
    $nombresito = utf8_encode($nombre);
    $idUnidad = "";
    if ($uAcad == 'CARRERA CANONICA EN TEOLOGIA') {
        $idUnidad = 1;
    } else if ($uAcad == 'CARRERA TECNOLOGIA MEDICA') {
        $idUnidad = 2;
    } else if ($uAcad == 'DEPARTAMENTO DE CULTURA RELIGIOSA') {
        $idUnidad = 3;
    } else if ($uAcad == 'ESCUELA DE AGRONOMÍA') {
        $idUnidad = 4;
    } else if ($uAcad == 'ESCUELA DE ALIMENTOS') {
        $idUnidad = 5;
    } else if ($uAcad == 'ESCUELA DE ARQUITECTURA Y DISEÑO') {
        $idUnidad = 6;
    } else if ($uAcad == 'ESCUELA DE CIENCIAS DEL MAR') {
        $idUnidad = 7;
    } else if ($uAcad == 'ESCUELA DE COMERCIO') {
        $idUnidad = 8;
    } else if ($uAcad == 'ESCUELA DE DERECHO') {
        $idUnidad = 9;
    } else if ($uAcad == 'ESCUELA DE EDUCACIÓN FÍSICA') {
        $idUnidad = 10;
    } else if ($uAcad == 'ESCUELA DE INGENIERÍA BIOQUÍMICA') {
        $idUnidad = 11;
    } else if ($uAcad == 'ESCUELA DE INGENIERÍA CIVIL') {
        $idUnidad = 12;
    } else if ($uAcad == 'ESCUELA DE INGENIERÍA DE TRANSPORTE') {
        $idUnidad = 13;
    } else if ($uAcad == 'ESCUELA DE INGENIERÍA ELÉCTRICA') {
        $idUnidad = 14;
    } else if ($uAcad == 'ESCUELA DE INGENIERÍA EN CONSTRUCCIÓN') {
        $idUnidad = 15;
    } else if ($uAcad == 'ESCUELA DE INGENIERÍA INDUSTRIAL') {
        $idUnidad = 16;
    } else if ($uAcad == 'ESCUELA DE INGENIERÍA INFORMÁTICA') {
        $idUnidad = 17;
    } else if ($uAcad == 'ESCUELA DE INGENIERÍA MECÁNICA') {
        $idUnidad = 18;
    } else if ($uAcad == 'ESCUELA DE INGENIERÍA QUÍMICA') {
        $idUnidad = 19;
    } else if ($uAcad == 'ESCUELA DE KINESIOLOGÍA') {
        $idUnidad = 20;
    } else if ($uAcad == 'ESCUELA DE NEGOCIOS Y ECONOMÍA') {
        $idUnidad = 21;
    } else if ($uAcad == 'ESCUELA DE PEDAGOGÍA') {
        $idUnidad = 22;
    } else if ($uAcad == 'ESCUELA DE PERIODISMO') {
        $idUnidad = 23;
    } else if ($uAcad == 'ESCUELA DE PSICOLOGÍA') {
        $idUnidad = 24;
    } else if ($uAcad == 'ESCUELA DE TRABAJO SOCIAL') {
        $idUnidad = 25;
    } else if ($uAcad == 'FACULTAD ECLESIÁSTICA DE TEOLOGÍA') {
        $idUnidad = 26;
    } else if ($uAcad == 'INSTITUTO DE ARTE') {
        $idUnidad = 27;
    } else if ($uAcad == 'INSTITUTO DE BIOLOGÍA') {
        $idUnidad = 28;
    } else if ($uAcad == 'INSTITUTO DE CIENCIAS RELIGIOSAS') {
        $idUnidad = 29;
    } else if ($uAcad == 'INSTITUTO DE ESTADÍSTICA') {
        $idUnidad = 30;
    } else if ($uAcad == 'INSTITUTO DE FILOSOFÍA') {
        $idUnidad = 31;
    } else if ($uAcad == 'INSTITUTO DE FÍSICA') {
        $idUnidad = 32;
    } else if ($uAcad == 'INSTITUTO DE GEOGRAFÍA') {
        $idUnidad = 33;
    } else if ($uAcad == 'INSTITUTO DE HISTORIA') {
        $idUnidad = 34;
    } else if ($uAcad == 'INSTITUTO DE LITERATURA Y CIENCIAS DEL LENGUAJE') {
        $idUnidad = 35;
    } else if ($uAcad == 'INSTITUTO DE MATEMÁTICAS') {
        $idUnidad = 36;
    } else if ($uAcad == 'INSTITUTO DE MÚSICA') {
        $idUnidad = 37;
    } else if ($uAcad == 'INSTITUTO DE QUÍMICA') {
        $idUnidad = 38;
    } else if ($uAcad == 'PROGRAMA DE BACHILLERATO EN CIENCIAS') {
        $idUnidad = 39;
    } else if ($uAcad == 'PROGRAMA DE INGLÉS COMO LENGUA EXTRANJERA') {
        $idUnidad = 40;
    }


    $uAcademica = utf8_decode($uAcad);

    $query = "INSERT INTO docentes(id, unidadAcademica, docente, cargo, contratoEscalafon, correo, idUnidad)"
            . " VALUES('$ide', '$uAcademica', '$nombresito', '$cargo', '$contrato', '$email','$idUnidad')";
    if (mysqli_query($connect, $query)) {
        echo 'Docente Insertado';
    } else {
        echo 'Error Al insertar Docente';
    }
}
?>





