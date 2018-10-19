<?php


$party = $_GET["field"];


if ($party == "producer") {
    $field = 1;
} elseif ($party == "exporter") {
    $field = 2;
} elseif ($party == "carrier") {
    $field = 3;
} elseif ($party == "importer") {
    $field = 4;
} elseif ($party == "distributor") {
    $field = 5;
} elseif ($party == "consumer") {
    $field = 6;
}
$postaction = "http://supplychain-engine.herokuapp.com/info/" . "$field";

$response = file_get_contents($postaction);
$response = json_decode($response, TRUE);

if (empty($response)) {
    $response = [];
}

foreach ($response as $k => $v) {

    if ($response[$k]['Location'] == 1) {
        $response[$k]['Location'] = 'Producer';
    } elseif ($response[$k]['Location'] == 2) {
        $response[$k]['Location'] = 'Exporter';
    } elseif ($response[$k]['Location'] == 3) {
        $response[$k]['Location'] = 'Carrier';
    } elseif ($response[$k]['Location'] == 4) {
        $response[$k]['Location'] = 'Importer';
    } elseif ($response[$k]['Location'] == 5) {
        $response[$k]['Location'] = 'Distributor';
    } elseif ($response[$k]['Location'] == 6) {
        $response[$k]['Location'] = 'Consumer';
    }
}


echo json_encode($response);
