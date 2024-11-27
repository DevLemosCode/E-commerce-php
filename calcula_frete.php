<?php
if (isset($_GET['cep'])) {
    $cep = $_GET['cep'];
    $url = "https://viacep.com.br/ws/$cep/json/";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (isset($data['logradouro'])) {
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'CEP inválido.']);
    }
}
?>


