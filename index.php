<?php
require_once 'HighWay.php';
require_once 'MotorWay.php';
require_once 'ResidentialWay.php';
require_once 'PedestrianWay.php';
require_once 'Vehicle.php';
require_once 'Car.php';
require_once 'Truck.php';
require_once 'Bike.php';
require_once 'Skateboard.php';
require_once 'LightableInterface.php';

echo "<h2>POO 5 : les exceptions -> try/catch/finally</h2>";
$speedyCar = new Car('red', 2, 'fuel');
echo $speedyCar->setParkBrake(true);

try
{
    $speedyCar->start();
} catch(Exception $e){
    echo $e->getMessage();
    $speedyCar->setParkBrake();
} finally {
    echo "Ma voiture roule comme un donut";
}
var_dump($speedyCar);
echo '<hr>';

echo "<h2>POO 4 : les interfaces</h2>";
$mycar = new Car('grey', 4, 'electric');
echo "Ma voiture a ses feux allumés :" . $mycar->switchOn() . "<br>";
echo $mycar->switchOff();

$mybike = new Bike('blue');
echo $mybike->forward();
echo " Mon vélo roule vite, à " . $mybike->getCurrentSpeed(). " Km/h et sa dynamo me permet d'allumer ma lumière :" . $mybike->switchOn() . "<br>". " Youhou ! Je ne devrais donc pas tomber à moins que...";
echo $mybike->switchOff();

echo '<hr>';

echo "<h2>Instanciation de 3 objets : MotorWay, ResidentialWay et PedestrianWay</h2>";

$motorway = new MotorWay();
var_dump($motorway);

$residentialway = new ResidentialWay();
var_dump($residentialway);

$pedestrianway = new PedestrianWay();
var_dump($pedestrianway);
echo '<hr>';

echo "<h2>Instanciation des filles de Vehicle : Car, Bike, Truck et Skateboard et test de ces véhicules avec les classes héritées de Highway</h2>";

echo "<h3> Test de l'objet Car avec Motorway</h3>";
$car = new Car('red', 4, 'electric');
$motorway->addVehicle($car);
var_dump($motorway);
echo '<hr>';

echo "<h3> Test de l'objet Bike avec Motorway</h3>";
$bike = new Bike('blue');
$motorway->addVehicle($bike);
var_dump($bike);
var_dump($motorway);
echo '<hr>';

echo "<h3> Test d'un nouvel objet Car avec Motorway</h3>";
$greencar = new Car('green', 2, 'fuel');
$motorway->addVehicle($greencar);
var_dump($motorway);
echo '<hr>';

echo "<h3> Test de l'objet Truck avec ResidentialWay</h3>";
$truck= new Truck(1000, 'black', 4, 'fuel');
$residentialway->addVehicle($truck);
var_dump($truck);
var_dump($residentialway);
echo '<hr>';

echo "<h3> Test de l'objet Skateboard avec PedestrianWay</h3>";
$skateboard = new Skateboard();
$pedestrianway->addVehicle($skateboard);
var_dump($skateboard);
var_dump($pedestrianway);
echo '<hr>';
