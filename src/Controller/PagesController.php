<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PagesController extends AbstractController
{
	/**
     * @Route("/home", name="home")
     */
    public function home()
    {
        $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, 'https://api.chucknorris.io/jokes/random');
        curl_setopt($ch, CURLOPT_URL, 'https://api.punkapi.com/v2/beers/random');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json; charset=utf-8']); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        // If using JSON...
        $api = json_decode($response);

        // var_dump($api);

        return $this->render('pages/index.html.twig', [
            'api' => $api
        ]);
    }

    /**
     * @Route("/opentournaments", name="openTournaments")
     */
    public function opentournaments()
    {
    	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.royaleapi.com/tournaments/open');
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json', 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTUyOCwiaWRlbiI6IjI1ODU0ODAzNTA3MDQ1OTkwNSIsIm1kIjp7fSwidHMiOjE1MzQ4MzU5Mzg4MDJ9.36oCS7ixAoePvtpCEhjaGip1MfWckwWNcp_WpDjz1MU']); // Assuming you're requesting JSON
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);

		// If using JSON...
		$data = json_decode($response);

		// var_dump($data);

        return $this->render('pages/opentournaments.html.twig', [
            'data' => $data
        ]);
    }

    /**
     * @Route("/players/{tag}", name="players")
     */
    public function players(string $tag)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.royaleapi.com/player/'.$tag.'/battles');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json', 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTUyOCwiaWRlbiI6IjI1ODU0ODAzNTA3MDQ1OTkwNSIsIm1kIjp7fSwidHMiOjE1MzQ4MzU5Mzg4MDJ9.36oCS7ixAoePvtpCEhjaGip1MfWckwWNcp_WpDjz1MU']); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        // If using JSON...
        $data = json_decode($response);

        // var_dump(json_encode($data, JSON_PRETTY_PRINT));

        return $this->render('pages/players.html.twig', [
            'data' => $data,
            'tag' => $tag
        ]);
    }

    /**
     * @Route("/chests/{tag}", name="chests")
     */
    public function chests(string $tag)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.royaleapi.com/player/'.$tag.'/chests');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json', 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTUyOCwiaWRlbiI6IjI1ODU0ODAzNTA3MDQ1OTkwNSIsIm1kIjp7fSwidHMiOjE1MzQ4MzU5Mzg4MDJ9.36oCS7ixAoePvtpCEhjaGip1MfWckwWNcp_WpDjz1MU']); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        // If using JSON...
        $data = json_decode($response);

        // var_dump(json_encode($data, JSON_PRETTY_PRINT));

        return $this->render('pages/chests.html.twig', [
            'data' => $data,
            'tag' => $tag
        ]);
    }

    /**
     * @Route("/battle", name="battle")
     */
    public function battle()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.royaleapi.com/player/GRQQLLQR/battles');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json', 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTUyOCwiaWRlbiI6IjI1ODU0ODAzNTA3MDQ1OTkwNSIsIm1kIjp7fSwidHMiOjE1MzQ4MzU5Mzg4MDJ9.36oCS7ixAoePvtpCEhjaGip1MfWckwWNcp_WpDjz1MU']); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        // If using JSON...
        $data = json_decode($response);

        // var_dump(json_encode($data, JSON_PRETTY_PRINT));

        return $this->render('pages/battles.html.twig', [
            'data' => $data
        ]);
    }


    /**
     * @Route("/gitemojis", name="gitemojis")
     */
    public function gitemojis()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/emojis');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json; charset=utf-8']); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);

        // If using JSON...
        $emojis = json_decode($response);

        var_dump($emojis);

        return $this->render('pages/gitemojis.html.twig', [
            'emojis' => $emojis
        ]);
    }
}