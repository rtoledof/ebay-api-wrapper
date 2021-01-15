<?php

namespace App\Service;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Symfony\Component\HttpFoundation\Request as SfRequest;
use Symfony\Component\HttpFoundation\Response as SfResponse;

class QueryRequest extends Psr7Request {
	/**
	 * @var string
	 */
	private string $operationName = 'findItemsAdvanced';

	/**
	 * @var string
	 */
	private string $serviceVersion = '1.0.0';

	/**
	 * @var string
	 */
	private string $globalID = Constants::EBAY_GID_US;

	/**
	 * @var string
	 */
	private string $query;

	/**
	 * @var float
	 */
	private float $minPrice;

	/**
	 * @var float
	 */
	private float $maxPrice;

	/**
	 * @var string
	 */
	private string $sorting = Constants::EBAY_SORT_BEST_MATCH;

	/**
	 * @var int
	 */
	private int $pageNumber;

	/**
	 * @var int
	 */
	private int $entityPerPage;

	/**
	 * @var string
	 */
	public string $nextURL;

	/**
	 * @param $apiKey
	 * @param SfRequest $request
	 * @throws Error
	 */
	public function __construct($apiKey, SfRequest $request) {
		$this->handlerRequest($request);
		if ($this->isValid()) {
			$url = sprintf(
				'%s?OPERATION-NAME=%s'
				. '&SERVICE-VERSION=%s'
				. '&GLOBAL-ID=%s'
				. '&SECURITY-APPNAME=%s'
				. '&RESPONSE-DATA-FORMAT=JSON'
				. '&keywords=%s'
				. '&sortOrder=%s'
				. '&itemFilter(0).name=ListingType'
				. '&itemFilter(0).value=FixedPrice'
				. '&itemFilter(1).name=MinPrice'
				. '&itemFilter(1).value=%d'
				. '&itemFilter(2).name=MaxPrice'
				. '&itemFilter(2).value=%d'
				. '&paginationInput.entriesPerPage=%d'
				,
				Constants::EBAY_API_URL,
				$this->operationName,
				$this->serviceVersion,
				urlencode($this->globalID),
				urlencode($apiKey),
				urlencode($this->query),
				urlencode(Constants::SORTING[$this->sorting]),
				$this->minPrice,
				$this->maxPrice,
				$this->entityPerPage
			);
			$url = sprintf('%s'
				. '&paginationInput.pageNumber=%d',
				$url,
				$this->pageNumber
			);
			parent::__construct('GET', $url);
		}
	}

	/**
	 * @param SfRequest $request
	 */
	private function handlerRequest(SfRequest $request) {
		$this->query         = $request->get('keywords');
		$this->minPrice      = $request->get('price_min', 10);
		$this->maxPrice      = $request->get('price_max', 10000);
		$this->entityPerPage = $request->get('per_page', 10);
		$this->pageNumber    = $request->get('page_number', 1);
		$this->sorting       = $request->get('sorting', Constants::EBAY_SORT_BEST_MATCH);
	}

	private function isValid(): bool {
		if (!is_string($this->query)) {
			throw new Error(SfResponse::HTTP_BAD_REQUEST, 'query must be string');
		}
		if ($this->query === '') {
			throw new Error(SfResponse::HTTP_BAD_REQUEST, 'query must not be empty');
		}
		if (!array_key_exists($this->sorting, Constants::SORTING)) {
			throw new Error(SfResponse::HTTP_BAD_REQUEST, 'invalid sorting');
		}
		if (!empty($this->minPrice) && !is_numeric($this->minPrice)) {
			throw new Error(SfResponse::HTTP_BAD_REQUEST, 'min price must be int');
		}
		if (!empty($this->maxPrice) && !is_numeric($this->maxPrice)) {
			throw new Error(SfResponse::HTTP_BAD_REQUEST, 'max price must be int');
		}
		return true;
	}
}