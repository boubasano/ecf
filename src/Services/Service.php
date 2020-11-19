<?php


namespace App\Services;


use App\Entity\Meteo;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;

class Service
{
    private $param;
    private $request;
    public function __construct(ParameterBagInterface $param, Request $request)
    {
        $this->param = $param;
        $this->request = $request;
    }

    public function findMeteoInfos(): array
    {
        $url = $this->param->get('api.meteo.url');
        $key = $this->param->get('api.meteo.key');
        $ville = $this->request->request->get('search');
        $apiService = new ApiService();
        $apiBuilder = new ApiBuilder();
        $apiService->requestData($url , $key, $ville);


    }

}