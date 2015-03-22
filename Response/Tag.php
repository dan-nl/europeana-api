<?php
namespace Europeana\Api\Response;


class Tag extends JsonAbstract {

	/**
	 * @var array
	 */
	public $api_response;

	/**
	 * @var array
	 * if the search has results, the hits take place in the "items" array. Each item is an object, and represents a summary of metadata record. The actual content is depending of the profile parameter. The mandatory field are:
	 */
	public $items;

	/**
	 * @var {int}
	 * the number of retrieved hits (you can set the number per request with the rows parameter, but it can not be greater than 100)
	 */
	public $itemsCount;

	/**
	 * @var {int}
	 * the total number of results
	 */
	public $totalResults;

	/**
	 * @var {string}
	 */
	public $username;


	/**
	 * @return void
	 */
	public function init() {
		parent::init();

		$this->api_response = array();
		$this->items = array();
		$this->itemsCount = 0;
		$this->totalResults = 0;

		$this->_property_to_class['api_response'] = 'Europeana\Api\Response\Objects\ApiResponse';
		$this->_property_to_class['items'] = 'Europeana\Api\Response\Objects\Tag';
	}

}