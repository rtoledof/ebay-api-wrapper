<?php

namespace App\Service;

use App\Models\Product;
use Symfony\Component\HttpFoundation\Response as SfResponse;

class Response extends SfResponse {
	/**
	 * @var array
	 */
	public array $data;

	/**
	 * @var string
	 */
	public string $status;

	/**
	 * @var Error
	 */
	public Error $error;

	/**
	 * @param $data
	 * @return mixed
	 */
	public static function unmarshal($data): self {
		if (is_string($data)) {
			$data = json_decode($data);
		}
		$instance = new self();
		$instance->status = $data->findItemsAdvancedResponse[0]?->ack[0];
		if ($data->findItemsAdvancedResponse[0]?->ack[0] === 'Success') {
			foreach ($data->findItemsAdvancedResponse[0]?->searchResult[0] as $key => $value) {
				if ($key === '@count' && $value !== 0) {
					continue;
				}
				foreach ($value as $item) {
					$product          = new Product((array) $item);
					$instance->data[] = $product;
				}
			}
		} else {
			$instance->error = new Error(SfResponse::HTTP_BAD_REQUEST, $data->findItemsAdvancedResponse[0]->errorMessage[0]?->error[0]);
		}
		return $instance;
	}

	public function isSuccessful(): bool
	{
		return $this->status === 'Success';
	}

	/**
	 * @return array
	 */
	public function Marshal() : array
	{
		return [
			'count' => count($this->data),
			'items' => $this->data
		];
	}
}