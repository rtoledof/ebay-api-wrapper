<?php
namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Request as SfRequest;
use Symfony\Component\HttpFoundation\Response as SfResponse;

class Service {
	/**
	 * @var Client
	 */
	private $client;

	public function __construct() {
		$this->client = new Client(['base_url' => Constants::EBAY_API_URL]);
	}

	public function list($apiKey, SfRequest $request): Response{
		try {
			$req      = new QueryRequest($apiKey, $request);
			$response = $this->client->send($req);
		} catch (Error $e) {
			throw $e;
		} catch (GuzzleException $e) {
			throw new Error(SfResponse::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
		}
		return Response::unmarshal($response->getBody()->getContents());
	}
}