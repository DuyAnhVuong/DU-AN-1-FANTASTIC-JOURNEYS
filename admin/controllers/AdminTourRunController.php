<?php
class AdminTourRunController
{
    public $modelTourRun;
    public $modelTour;
    public function __construct()
    {
        $this->modelTourRun = new AdminTourRun();

        $this->modelTour = new AdminTour();
    }
    public function danhsachTourRun()
    {
        $listTourRun = $this->modelTourRun->getAllTourRun();
        require_once './views/tourrun/listTourRun.php';
    }




}
?>