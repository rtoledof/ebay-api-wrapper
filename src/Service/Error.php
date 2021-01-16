<?php

namespace App\Service;

class Error extends \Exception {
	/**
	 * Error constructor.
	 * @param int $code
	 * @param string|\stdClass $message
	 */
	public function __construct(int $code, $message)
	{
		$this->code = $code;
		if (!is_string($message) && isset($message->parameter[0])) {
			switch ($message->parameter[0]) {
				case 'paginationInput.pageNumber':
					$message = "Value should be greater than 0 for item filter, page_number.";
					break;
				case 'MIN_PRICE':
					$message = "Value should be a number greater than 0, price_min";
					break;
				case 'MAX_PRICE':
					$message = "Value should be a number greater than 0, price_max";
					break;
			}
		}
		$this->message = $message;
		parent::__construct($message, $code);
	}
}