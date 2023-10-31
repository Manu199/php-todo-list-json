<?php

$json_string = file_get_contents('todo-list.json');

//var_dump($json_string);

$list = json_decode($json_string);
var_dump($list);

header('Content-Type: application/json');

echo json_encode($list);

?>