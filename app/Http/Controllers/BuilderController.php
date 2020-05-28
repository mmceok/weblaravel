<?php

namespace App\Http\Controllers;

class BuilderController extends Controller
{
    public function index()
    {

        $this->showBike(new MobikeBuilder());
        die('<br>---res');
    }

    private function showBike(Builder $builder)
    {
        $director = new Director($builder);
        $bike = $director->const();
        echo $bike->getFrame();
    }

}

class Bike
{
    private $frame;
    private $seat;
    private $tire;

    /**
     * @return mixed
     */
    public function getFrame()
    {
        return $this->frame;
    }

    /**
     * @param mixed $frame
     */
    public function setFrame($frame): void
    {
        $this->frame = $frame;
    }

    /**
     * @return mixed
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param mixed $seat
     */
    public function setSeat($seat): void
    {
        $this->seat = $seat;
    }

    /**
     * @return mixed
     */
    public function getTire()
    {
        return $this->tire;
    }

    /**
     * @param mixed $tire
     */
    public function setTire($tire): void
    {
        $this->tire = $tire;
    }


}

interface Builder
{
    function buildFrame();
    function buildSeat();
    function buildTire();
    function createBike() : Bike;
}

class MobikeBuilder implements Builder
{
    private $bike;

    /**
     * MobikeBuilder constructor.
     * @param $bike
     */
    public function __construct()
    {
        $this->bike = new Bike();
    }


    function buildFrame()
    {
        $this->bike->setFrame('mFrame');
    }

    function buildSeat()
    {
        $this->bike->setSeat('mSeat');
    }

    function buildTire()
    {
        // TODO: Implement buildTire() method.
    }

    function createBike(): Bike
    {
        return $this->bike;
    }

}

class Director
{
    private $mBuilder;

    /**
     * Director constructor.
     * @param $mBuilder Builder
     */
    public function __construct($mBuilder)
    {
        $this->mBuilder = $mBuilder;
    }

    public function const()
    {
        $this->mBuilder->buildFrame();
        $this->mBuilder->buildSeat();
        return $this->mBuilder->createBike();
    }


}
