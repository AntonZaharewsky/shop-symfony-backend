<?php

namespace App\Controller;

use App\Model\ReserveCopyModel;
use Symfony\Component\Routing\Annotation\Route;

class ReserveCopyController
{
    private $reserveCopyModel;

    public function __construct(ReserveCopyModel $reserveCopyModel)
    {
        $this->reserveCopyModel = $reserveCopyModel;
    }

    /**
     * @Route("/reservecopy/{fileName}")
     */
    public function copyAction($fileName)
    {
        $this->reserveCopyModel->makeReserveCopy($fileName . '.sql');
    }
}