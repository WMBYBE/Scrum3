<?php
Class Farm{
    private $farmId;
    private $Crop;
    private $Size;
    private $price;
    private $BuildDate;

    public function _construct($Crop, $Size, $price, $BuildDate, $farmId = null){
        $this->farmId = $farmId;
        $this->Crop = $Crop;
        $this->Size = $Size;
        $this->Price = $price;
        $this->BuildDate = $BuildDate;
    }

    public function getId() { return $this->farmId; }
    public function getCrop() { return $this->Crop; }
    public function getSize() { return $this->Size; }
    public function getPrice() { return $this->price; }
    public function getBuildDate() { return $this->BuildDate; }

    public function setCrop($Crop) { $this->Crop = $Crop; }
    public function setSize($Size) { $this->Size = $Size; }
    public function setPrice($price) { $this->Price = $price; }
    public function setBuildDate($BuildDate) { $this->BuildDate = $BuildDate; }

}
    ?>