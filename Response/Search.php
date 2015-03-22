<?php
namespace Europeana\Api\Response;


class Search extends JsonAbstract {

	/**
	 * @var array
	 */
	public $api_response;

	/**
	 * @var array
	 * the list of search elements (query and qf parameters) (available in case of breadrumb and portal profile applications). It is an array, and each breadcrumb contains the following fields:
	 */
	public $breadCrumbs;

	/**
	 * @var array
	 * is a list of facet object (available in case of facets and portal profile applications). Each facet object contains the following fields
	 */
	public $facets;

	/**
	 * @var array
	 * if the search has results, the hits take place in the "items" array. Each item is an object, and represents a summary of metadata record. The actual content is depending of the profile parameter. The mandatory field are:
	 */
	public $items;

	/**
	 * @var int
	 * the number of retrieved hits (you can set the number per request with the rows parameter, but it can not be greater than 100)
	 */
	public $itemsCount;

	/**
	 * @var array
	 * is object representing spellcheck suggestions (available in case of spellcheck and portal profile applications). The object contains the following fields:
	 */
	public $spellcheck;

	/**
	 * @var int
	 * the total number of results
	 */
	public $totalResults;


	/**
	 * @return void
	 */
	public function init() {
		parent::init();

		$this->api_response = array();
		$this->breadCrumbs = array();
		$this->facets = array();
		$this->items = array();
		$this->itemsCount = 0;
		$this->spellcheck = array();
		$this->totalResults = 0;

		$this->_property_to_class['api_response'] = 'Europeana\Api\Response\Objects\ApiResponse';
		$this->_property_to_class['breadCrumbs'] = 'Europeana\Api\Response\Objects\Breadcrumb';
		$this->_property_to_class['facets'] = 'Europeana\Api\Response\Objects\Facet';
		$this->_property_to_class['items'] = 'Europeana\Api\Response\Objects\Item';
		$this->_property_to_class['spellcheck'] = 'Europeana\Api\Response\Objects\Spellcheck';
	}

}