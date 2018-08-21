<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PagesController extends AbstractController
{
    /**
     * @Route("/opentournaments", name="openTournaments")
     */
    public function opentournaments()
    {
    	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.royaleapi.com/tournaments/open');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTUyOCwiaWRlbiI6IjI1ODU0ODAzNTA3MDQ1OTkwNSIsIm1kIjp7fSwidHMiOjE1MzQ4MzU5Mzg4MDJ9.36oCS7ixAoePvtpCEhjaGip1MfWckwWNcp_WpDjz1MU')); // Assuming you're requesting JSON
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);

		// If using JSON...
		$data = json_decode($response);

		// var_dump($data);

        return $this->render('pages/opentournaments.html.twig', [
            'controller_name' => 'PagesController',
            'data' => $data
        ]);
    }
}
