<?php

require_once 'classes/DB.php';

header('Content-Type: application/json');

$db = new DB();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action == 'getFarm' && isset($_GET['id'])) {
                $result = $db->getFarmById($_GET['id']);
            } elseif ($action == 'getFarm') {
                $result = $db->getAllFarms();
            } elseif ($action == 'getHouse' && isset($_GET['id'])) {
                $result = $db->getHouseById($_GET['id']);
            } elseif ($action == 'getHouse') {
                $result = $db->getAllHouses();     
            } elseif ($action == 'getVillager' && isset($_GET['id'])) {
                $result = $db->getVillagerById($_GET['id']);
            } elseif ($action == 'getVillager') {
                $result = $db->getAllVillagers();
            } else {
                $result = ["message" => "Invalid action"];
            }
        } else {
            $result = ["message" => "Action is required"];
        }
        break;

    case 'POST':
        // Handle POST request (create new records)
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            $data = json_decode(file_get_contents("php://input"), true);
            
            if ($action == 'createFarm') {
                $farm = new Farm($data['Crop'], $data['size'], $data['price'], $data['BuildDate']);
                $result = ["id" => $db->insertFarm($farm)];
            } elseif ($action == 'createHouse') {
                $house = new House($data['Address'], $data['Owner'], $data['value'], $data['BuildDate']);
                $result = ["id" => $db->insertHouse($house)];
            } elseif ($action == 'createVillager') {
                $villager = new Villager($data['Name'], $data['Birthdate'], $data['Height'], $data['Job']);
                $result = ["id" => $db->insertVillager($villager)];
            } else {
                $result = ["message" => "Invalid action"];
            }
        } else {
            $result = ["message" => "Action is required"];
        }
        break;

    case 'PUT':
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            $data = json_decode(file_get_contents("php://input"), true);
            
            if ($action == 'updateFarm' && isset($data['id'])) {
                $farm = new Farm($data['Crop'], $data['size'], $data['price'], $data['BuildDate']);
                $farm->setId($data['id']);
                $result = ["success" => $db->updateFarm($farm)];
            } elseif ($action == 'updateHouse' && isset($data['id'])) {
                $house = new House($data['Address'], $data['Owner'], $data['value'], $data['BuildDate']);
                $house->setId($data['id']);
                $result = ["success" => $db->updateHouse($house)];
            } elseif ($action == 'updateVillager' && isset($data['id'])) {
                $villager = new Villager($data['Name'], $data['Birthdate'], $data['Height'], $data['Job']);
                $villager->setId($data['id']);
                $result = ["success" => $db->updateVillager($villager)];
            } else {
                $result = ["message" => "Invalid action or missing data"];
            }
        } else {
            $result = ["message" => "Action is required"];
        }
        break;

    case 'DELETE':
        // Handle DELETE request (delete records)
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($action == 'deleteFarm') {
                    $result = ["success" => $db->deleteFarm($id)];
                } elseif ($action == 'deleteHouse') {
                    $result = ["success" => $db->deleteHouse($id)];
                } elseif ($action == 'deleteVillager') {
                    $result = ["success" => $db->deleteVillager($id)];
                } else {
                    $result = ["message" => "Invalid action"];
                }
            } else {
                $result = ["message" => "ID is required"];
            }
        } else {
            $result = ["message" => "Action is required"];
        }
        break;

    default:
        $result = ["message" => "Invalid request method"];
        break;
}

// Return the result as a JSON response
echo json_encode($result);
?>