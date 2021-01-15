<?php

namespace App\Models;

class Product {
	/**
	 * $provider
	 *
	 * @var string
	 */
	public string $provider = 'ebay';

	/**
	 * $item_id
	 *
	 * @var string
	 */
	public string $itemID;

	/**
	 * $click_out_link
	 *
	 * @var string
	 */
	public string $link;

	/**
	 * $main_photo_url
	 *
	 * @var string
	 */
	public string $cover;

	/**
	 * $price
	 *
	 * @var float
	 */
	public float $price;

	/**
	 * $price_currency
	 *
	 * @var string
	 */
	public string $currency;

	/**
	 * $shipping_price
	 *
	 * @var float
	 */
	public float $shippingPrice;

	/**
	 * $title
	 *
	 * @var string
	 */
	public string $title;

	/**
	 * $description
	 *
	 * @var string
	 */
	public string $description;

	/**
	 * $valid_until
	 *
	 * @var string
	 */
	public string $validUntil;

	/**
	 * @var string
	 */
	public string $brand;

	public function __construct(array $item) {
		$currencyTag         = '@currencyId';
		$this->itemID        = $item['itemId'][0];
		$this->link          = $item['viewItemURL'][0];
		$this->cover         = $item['galleryURL'][0];
		$this->title         = $item['title'][0];
		$this->price         = $item['sellingStatus'][0]?->currentPrice[0]?->__value__;
		$this->currency      = $item['sellingStatus'][0]?->currentPrice[0]?->$currencyTag;
		$this->shippingPrice = $item['shippingInfo'][0]?->shippingServiceCost[0]?->__value__;
		$this->validUntil    = $item['listingInfo'][0]->endTime[0];
		$this->brand         = $item['globalId'][0];
	}
}