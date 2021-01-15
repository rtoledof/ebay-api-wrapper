<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController
{
	/**
	 * @Route(name="homepage", path="/")
	 *
	 * @return Response
	 */
	public function index()
	{
		return new Response("Welcome to ebay wrapper api");
	}
}