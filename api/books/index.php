<?php

header('Content-Type: application/json');

$books=[
    1=>"teste1",
    2=>"teste1",
    3=>"teste1",
    4=>"teste1",
    5=>"teste1"
];
$req = $_SERVER["REQUEST_URI"];
$req = explode("/",$req);
try {
    if($req[3] != "" && array_key_exists($req[3],$books)){
        echo json_encode(array($req[3]=>$books[$req[3]]),JSON_PRETTY_PRINT);
    }else if($req[3] == ""){
        $response = json_encode($books, JSON_PRETTY_PRINT);
        echo $response;
    }else{
        throw new Exception("Route not defined");
    }
} catch (\Throwable $th) {
    echo json_encode(array("Message"=>$th->getMessage()));
}
