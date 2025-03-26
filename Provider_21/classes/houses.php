<?php
Class Houses{
    private $HouseId;
    private $Address;
    private $Owner;
    private $value;
    private $BuildDate;

    public function _construct($Address, $Owner, $value, $BuildDate, $HouseId = null){
        $this->HouseId = $HouseId;
        $this->Address = $Address;
        $this->Owner = $Owner;
        $this->value = $value;
        $this->BuildDate = $BuildDate;
    }

    public function getId() { return $this->HouseId; }
    public function getAddress() { return $this->Address; }
    public function getOwner() { return $this->Owner; }
    public function getValue() { return $this->value; }
    public function getBuildDate() { return $this->BuildDate; }

    public function setAddress($Address) { $this->Address = $Address; }
    public function setOwner($Owner) { $this->Owner = $Owner; }
    public function setValue($value) { $this->value = $value; }
    public function setBuildDate($BuildDate) { $this->BuildDate = $BuildDate; }

}
    ?>