<?php

require_once './conn.php';

$store_id = $_GET['store_id'] ?? null;
$method = $_SERVER['REQUEST_METHOD'];
header('Content-Type: application/json');

switch ($method) {
    case 'GET':
        $stores = $connect->query('SELECT * FROM menu')->fetch_all(MYSQLI_ASSOC);
        echo json_encode($stores);
        break;
    }