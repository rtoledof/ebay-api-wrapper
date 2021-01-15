<?php
namespace App\Service;

class Constants {
	/**
	 * Ebay api URL
	 */
	const EBAY_API_URL = 'http://svcs.sandbox.ebay.com/services/search/FindingService/v1';

	/**
	 * Ebay global ids
	 */
	const EBAY_GID_AU = 'EBAY-AU';
	const EBAY_GID_CA = 'EBAY-ENCA';
	const EBAY_GID_DE = 'EBAY-DE';
	const EBAY_GID_UK = 'EBAY-GB';
	const EBAY_GID_US = 'EBAY-US';

	const EBAY_SORT_BEST_MATCH                  = 'BestMatch';
	const EBAY_SORT_BID_COUNT_MOST              = 'BidCountMost';
	const EBAY_SORT_BID_COUNT_FEWEST            = 'BidCountFewest';
	const EBAY_SORT_COUNTRY_ASCENDING           = 'CountryAscending';
	const EBAY_SORT_COUNTRY_DESCENDING          = 'CountryDescending';
	const EBAY_SORT_CURRENT_PRICE_HIGHEST       = 'CurrentPriceHighest';
	const EBAY_SORT_DISTANCE_NEAREST            = 'DistanceNearest';
	const EBAY_SORT_END_TIME_SOONEST            = 'EndTimeSoonest';
	const EBAY_SORT_PRICE_PLUS_SHIPPING_HIGHEST = 'PricePlusShippingHighest';
	const EBAY_SORT_PRICE_PLUS_SHIPPING_LOWEST  = 'PricePlusShippingLowest';
	const EBAY_SORT_START_TIME_NEWEST           = 'StartTimeNewest';
	const EBAY_SORT_WATCH_COUNT_DECREASE_SORT   = 'WatchCountDecreaseSort';

	const SORTING = [
		'default'                  => self::EBAY_SORT_BEST_MATCH,
		'by_price_asc'             => self::EBAY_SORT_PRICE_PLUS_SHIPPING_LOWEST,
		'BestMatch'                => self::EBAY_SORT_BEST_MATCH,
		'BidCountMost'             => self::EBAY_SORT_BID_COUNT_MOST,
		'BidCountFewest'           => self::EBAY_SORT_BID_COUNT_FEWEST,
		'CountryAscending'         => self::EBAY_SORT_COUNTRY_ASCENDING,
		'CountryDescending'        => self::EBAY_SORT_COUNTRY_DESCENDING,
		'CurrentPriceHighest'      => self::EBAY_SORT_CURRENT_PRICE_HIGHEST,
		'DistanceNearest'          => self::EBAY_SORT_DISTANCE_NEAREST,
		'EndTimeSoonest'           => self::EBAY_SORT_END_TIME_SOONEST,
		'PricePlusShippingHighest' => self::EBAY_SORT_PRICE_PLUS_SHIPPING_HIGHEST,
		'PricePlusShippingLowest'  => self::EBAY_SORT_PRICE_PLUS_SHIPPING_LOWEST,
		'StartTimeNewest'          => self::EBAY_SORT_START_TIME_NEWEST,
		'WatchCountDecreaseSort'   => self::EBAY_SORT_WATCH_COUNT_DECREASE_SORT,
	];
}