<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use OneForge\ForexQuotes\ForexDataClient;

class MainController
{
	/**
     * @Route("/")
     */
    public function index()
    {
        return new Response('OMG! My first page already! WOOO!');
    }

    /**
     * @Route("/test")
     */
    public function show()
    {
    	$client = new ForexDataClient('EQSnBJo9GkXJRdzzoWGAjxD2b7RwUtsS');
		$rate = $client->convert('USD', 'EUR', 1);

        return new Response($rate['value']);
    }


  //   /**
  //    * @Route("/get-rates")
  //    */
  //   public function get_rates(Request $request)
  //   {

  //   	try {
  //   		if ($request->curr1 == $request->curr2) {
  //   			$data['error'] = true;
		//     	$data['value'] = "Please select the different currency";
  //   		} else if ($request->curr1 == 'THB' || $request->curr2 == 'THB') {
  //   			$data['error'] = true;
		//     	$data['value'] = 'API does not support THB - Thai Baht. please see the <a href="https://1forge.com/forex-data-api/currency-pair-list" target="_blank">full currency pair list</a>';
  //   		} else {
  //   			// only different currency allow
  //   			$client = new ForexDataClient('EQSnBJo9GkXJRdzzoWGAjxD2b7RwUtsS');
		//     	$rate = $client->convert($request->curr1, $request->curr2, $request->amount);

		//     	if (array_key_exists("error", $rate)) {
		//     		// if something went wrong
		//     		$data['error'] = true;
		//     		$data['value'] = $rate['message'];
		//     	} else {
		//     		// all good
		//     		$data['error'] = false;
		//     		$data['value'] = $rate['value'];
		//     	}
  //   		}

  //   	} catch (\Exception $e) {
		//     $data['error'] = true;
	 //    	$data['value'] = $e->getMessage();
		// }

  //       return response()->json($data);
  //   }

}