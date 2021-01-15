<?php

namespace App\Controller;

use App\Service\Error;
use App\Service\Service;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchController {
	/**
	 * @param Request $request
	 *
	 * @Route(name="search", path="/search", methods={"GET"})
	 * @return JsonResponse
	 */
	public function list(Request $request): JsonResponse{
		$service = new Service();
		try {
			$result = $service->list($request->headers->get('EBAY-API-KEY'), $request);
			if (!$result->isSuccessful()) {
				return new JsonResponse(['error' => ['message' => $result->error->getMessage()]], $result->error->getCode());
			}
		} catch (Error $e) {
			return new JsonResponse(['error' => ['message' => $e->getMessage()]], $e->getCode());
		}
		return new JsonResponse($result->Marshal());
	}
}