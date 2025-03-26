<?php
class DB {
    private $host = 'localhost';
    private $dbname = 'village';
    private $username = 'root';
    private $password = '';
    private $conn;

    // create connection 
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname); 
        if($this->conn->connect_error) {
            die("connection failed : " . $this->connect->connect_error);
        } else {
            //echo "Successfully Connected";
        }
    }

public function insertFarm(Farm $farm) {
    $stmt = $this->conn->prepare("INSERT INTO Farm (crop, size, price, BuildDate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sids", $farm->getCrop(), $farm->getSize(), $farm->getPrice(), $farm->getBuildDate());
    $stmt->execute();
    return $stmt->insert_id;
}

public function getFarmById($id) {
    $stmt = $this->conn->prepare("SELECT * FROM Farm WHERE farmID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

public function getAllFarms(){
    $stmt=$this->conn->prepare("SELECT * FROM farm");
    $stmt->execute();
    $result= $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}

public function updateFarm(Farm $farm) {
    $stmt = $this->conn->prepare("UPDATE farm SET crop = ?, size = ?, price = ?, BuildDate = ? WHERE FarmId = ?");
    $stmt->bind_param("sidsi", $farm->getCrop(), $farm->getSize(), $farm->getPrice(), $farm->getBuildDate(), $farm->getFarm());
    return $stmt->execute();
}

public function deleteFarm($id) {
    $stmt = $this->conn->prepare("DELETE FROM Farm WHERE farmID = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// ----------------- CRUD for Houses -----------------
public function insertHouse(Houses $houses) {
    $stmt = $this->conn->prepare("INSERT INTO houses (address, owner, value, buildDate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $houses->getAddress(), $houses->getOwner(), $houses->getValue(), $houses->getBuildDate());
    $stmt->execute();
    return $stmt->insert_id;
}

public function getHousebyId($id) {
    $stmt = $this->conn->prepare("SELECT * FROM houses WHERE HouseId = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

public function getAllHouses(){
    $stmt=$this->conn->prepare("SELECT * FROM houses");
    $stmt->execute();
    $result= $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}

public function updateHouse(Houses $houses) {
    $stmt = $this->conn->prepare("UPDATE houses SET address = ?, owner = ?, value = ?, buildDate = ? WHERE HouseId = ?");
    $stmt->bind_param("ssdsi", $houses->getAddress(), $houses->getOwner(), $houses->getValue(), $houses->getId());
    return $stmt->execute();
}

public function deleteHouse($id) {
    $stmt = $this->conn->prepare("DELETE FROM houses WHERE HouseId = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// ----------------- CRUD for villager -----------------
public function insertVillager(Villagers $villagers) {
    $stmt = $this->conn->prepare("INSERT INTO villagers (Name, BirthDate, Height, Job) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $villagers->getName(), $villagers->geBirthdate(), $villagers->getHeight(), $villagers->getJob());
    $stmt->execute();
    return $stmt->insert_id;
}

public function getVillagerbyId($id) {
    $stmt = $this->conn->prepare("SELECT * FROM villagers WHERE VillagerId = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

public function getAllVillagers(){
    $stmt=$this->conn->prepare("SELECT * FROM villagers");
    $stmt->execute();
    $result= $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}

public function updateVillager(Villagers $villagers) {
    $stmt = $this->conn->prepare("UPDATE villagers SET Name = ?, BirthDate = ?, Height = ?, Job = ? WHERE VillagerId = ?");
    $stmt->bind_param("ssisi", $villagers->getName(), $villagers->geBirthdate(), $villagers->getHeight(), $villagers->getJob(), $villagers->getId());
    return $stmt->execute();
}

public function deleteVillager($id) {
    $stmt = $this->conn->prepare("DELETE FROM villagers WHERE VillagerId = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
}
?>
