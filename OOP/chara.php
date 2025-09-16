<?php

class Chara {
    public  $id,
            $name,
            $element,
            $weapon,
            $photo;

    public function __construct($id, $name, $element, $weapon, $photo) {
        $this->id = $id;
        $this->name = $name;
        $this->element = $element;
        $this->weapon = $weapon;
        $this->photo = $photo;
    }

    public function showData() {
        echo "ID: " . $this->id . "<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Element: " . $this->element . "<br>";
        echo "Weapon: " . $this->weapon . "<br>";
        echo "Photo: " . $this->photo . "<br><hr>";
    }
}

class OverPowered extends Chara {
    public $quality, $qualityType;

    public function __construct($id, $name, $element, $weapon, $photo, $quality, $qualityType) {
        parent::__construct($id, $name, $element, $weapon, $photo);
        $this->quality = $quality;
        $this->qualityType = $qualityType;
    }

    public function showData() {
        parent::showData();
        echo "Quality: " . $this->quality . "<br>";
        echo "Quality Type: " . $this->qualityType . "<br><hr>";
    }
}

class Region{
    public Chara $chara;
    public $region;

    public function __construct($region, Chara $chara) {
        $this->chara = $chara;
        $this->region = $region;
    }

    public function showRegion() {
        echo "Region: " . $this->region . "<br>";
        echo "Character: ";
        $this->chara->showData();
    }
}

$chara1 = new Chara(1, "Albedo", "Geo", "Sword", "albedo.jpg");
$chara2 = new Chara(2, "Alhaitham", "Dendro", "Sword", "alhaitham.jpg");

$region1 = new Region("Mondstadt", $chara1);
$region1->showRegion();

$overPoweredChara = new OverPowered(3, "Zhongli", "Geo", "Polearm", "zhongli.jpg", "5-Star", "Legendary");
$overPoweredChara->showData();

// $chara1 = new Chara();
// $chara1->id = 1;
// $chara1->name = "Albedo";
// $chara1->element = "Geo";
// $chara1->weapon = "Sword";
// $chara1->photo = "albedo.jpg";

// $chara2 = new Chara();
// $chara2->id = 2;
// $chara2->name = "Alhaitham";
// $chara2->element = "Dendro";
// $chara2->weapon = "Sword";
// $chara2->photo = "alhaitham.jpg";

$chara1->showData();
$chara2->showData();
?>