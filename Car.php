<?php

require_once 'Vehicle.php';
require_once 'LightableInterface.php';

class Car extends Vehicle implements LightableInterface
{
    const ALLOWED_ENERGIES = [
        'fuel',
        'electric'
    ];
    /**
     * @var string
     */
    private $energy;

    /**
     * @var int
     */
    private $energyLevel;

    private $hasParkBrake = true;

    public function __construct(string $color, int $nbSeats, string $energy)
    {
        $this->color = $color;
        $this->nbSeats = $nbSeats;
        $this->energy = $energy;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): Car
    {
        if (in_array($energy, self::ALLOWED_ENERGIES)) {
            $this->energy = $energy;
        }
        return $this;
    }

    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }

    public function setEnergyLevel(int $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }

    public function switchOn(): bool
    {
        return true;
    }

    public function switchOff(): bool
     {
         return false;
    }

    public function setParkBrake()
    {
        if ($this->hasParkBrake === true) {
            $this->hasParkBrake = false;
        } else {
            $this->hasParkBrake .= false;
        }
    }

    public function start()
    {
        if($this->hasParkBrake){
            throw new Exception("Attention, il y a le frein à main !");
        }
    }
}

