<?php

define("SUCESSO", 1);
define("FALHA", 0);

session_start();

if (
    isset($_SESSION['telefonesDoador']) && !empty($_SESSION['telefonesDoador'])

    && isset($_POST['telefoneRemovido']) && !empty($_POST['telefoneRemovido'])
) {

    $telefoneRemovido = $_POST['telefoneRemovido'];
    $listTelefone = $_SESSION['telefonesDoador'];

    $indice = array_search($telefoneRemovido, $listTelefone);

    if ($indice !== false) {

        unset($listTelefone[$indice]);

        $_SESSION['telefonesDoador'] = $listTelefone;

        $response = array("status" => SUCESSO, "size" => count($_SESSION["telefonesDoador"]));

        echo json_encode($response);
    }
    else {

        $response = array("status" =>  FALHA);

        echo json_encode($response);
    }
} else {

    
    $response = array("status" =>  FALHA);

    echo json_encode($response);

}
