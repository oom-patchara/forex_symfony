<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use OneForge\ForexQuotes\ForexDataClient;

class MainController extends AbstractController
{
	/**
     * @Route("/")
     */
    public function index()
    {
        $currencies = ['USD'=>'US Dollar', 'EUR'=>'Euro', 'AUD'=>'Australian Dollar', 'BTC'=>'Bitcoin', 'THB'=>'Thai Baht'];

        return $this->render('home.html.twig', ['currencies'=>$currencies]);
    }
    

    /**
     * @Route("/get-rates")
     */
    public function get_rates(Request $request)
    {

        try {

          // get all query params
          $curr1 = $request->query->get('curr1');
          $curr2 = $request->query->get('curr2');
          $amount = $request->query->get('amount');

          if ($curr1 == $curr2) {
              $data['error'] = true;
              $data['value'] = "Please select the different currency";
          } else if ($curr1 == 'THB' || $curr2 == 'THB') {
              $data['error'] = true;
              $data['value'] = 'API does not support THB - Thai Baht. please see the <a href="https://1forge.com/forex-data-api/currency-pair-list" target="_blank">full currency pair list</a>';
          } else {
              // only different currency allow
              $client = new ForexDataClient('EQSnBJo9GkXJRdzzoWGAjxD2b7RwUtsS');
              $rate = $client->convert($curr1, $curr2, $amount);

              if (array_key_exists("error", $rate)) {
                  // if something went wrong
                  $data['error'] = true;
                  $data['value'] = $rate['message'];
              } else {
                  // all good
                  $data['error'] = false;
                  $data['value'] = $rate['value'];
              }
          }

        } catch (\Exception $e) {
            $data['error'] = true;
            $data['value'] = $e->getMessage();
        }

        return new JsonResponse($data);
    }


}