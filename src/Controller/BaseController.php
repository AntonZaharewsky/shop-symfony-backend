<?php

namespace App\Controller;


use App\Model\PlaceModel;
use App\Model\PlaceTypeModel;
use App\Service\FiltrationService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BaseController
{
    /**
     * @var PlaceModel
     */
    private $placeModel;

    /**
     * @var PlaceTypeModel
     */
    private $placeTypeModel;

    /**
     * @var FiltrationService
     */
    private $filtrationService;

    public function __construct(PlaceModel $placeModel, PlaceTypeModel $placeTypeModel, FiltrationService $filtrationService)
    {
        $this->placeModel = $placeModel;
        $this->placeTypeModel = $placeTypeModel;
        $this->filtrationService = $filtrationService;
    }

    /**
     * @Route("/", name="home_page")
     *
     * @Template()
     */
    public function indexAction(Request $request)
    {
        if (!empty($request->get('filter'))) {
            $places = $this->filtrationService->filterByPlaceType($this->placeTypeModel->getById($request->get('filter')));
        } else {
            $places = $this->placeModel->getAll();
        }
        return [
            'placeTypes' => $this->placeTypeModel->getAll(),
            'places' => $places
        ];
    }
}