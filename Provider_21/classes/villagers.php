<?php
Class Farm{
    private $villagerId;
    private $Name;
    private $BirthDate;
    private $Height;
    private $Job;

    public function _construct($Name, $BirthDate, $Height, $Job, $villagerId = null){
        $this->villagerId = $villagerId;
        $this->Name = $Name;
        $this->BirthDate = $BirthDate;
        $this->Height = $Height;
        $this->Job = $Job;
    }

    public function getId() { return $this->villagerId; }
    public function getName() { return $this->Name; }
    public function getBirthDate() { return $this->BirthDate; }
    public function getHeight() { return $this->Height; }
    public function getJob() { return $this->Job; }

    public function setName($Name) { $this->Name = $Name; }
    public function setBirthDate($BirthDate) { $this->BirthDate = $BirthDate; }
    public function setHeight($Height) { $this->Height = $Height; }
    public function setJob($Job) { $this->Job = $Job; }

}
    ?>