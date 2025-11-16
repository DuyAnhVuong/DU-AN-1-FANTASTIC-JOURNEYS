<?php
class AdminTourController
{
    public $modelTour;

    public function __construct()
    {
        $this->modelTour = new AdminTour();
    }

    public function danhSachTour()
    {
        $listTour = $this->modelTour->getAllTour();
        require_once './views/tour/listTour.php';
    }
}