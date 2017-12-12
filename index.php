<?php

$method = $_SERVER['REQUEST_METHOD'];

if ($method === "POST") {
    $requestBody = file_get_contents(('php://input'));
    $json = json_decode($requestBody);

    $text = $json->result->parameters->text;

    switch ($text) {
        case 'hi':
            $speech = "hi, nice to meet you";
            break;
        case 'bye':
            $speech = "bye, good night";
            break;
        case 'anything':
            $speech = "yes you can do anything here";
            break;
        default:
            $speech = "j'ai rien compris";
            break;
    }


    $response = new \stdClass();
    $response->speech = "";
    $response->displayText = "";
    $response->source = "webhook";
    echo json_encode($response);


} else {
    echo "Method not allowed";
}
