<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;

class ApiResponse extends ObjectAbstract {

	/**
	 * @var string
	 * the name of the API method that was called; e.g., "search.json", "suggestions.json" or "record.json"
	 */
	public $action;

	/**
	 * @var string
	 * the client's API key (same as URL's wskey parameter)
	 */
	public $apikey;

	/**
	 * @var string
	 * if the call was not successful this fields will contain a detailed text message explaining the nature of problem.
	 */
	public $error;

	/**
	 * @var int
	 * a positive number denotes the number of request by this API key within the last 24 hours
	 */
	public $requestNumber;

	/**
	 * @var int
	 * is number, represents the time taken in milliseconds to serve this request
	 */
	public $statsDuration;

	/**
	 * @var boolean
	 * flag denoting the successful execution of the call
	 */
	public $success;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->action = null;
		$this->apikey = null;
		$this->error = null;
		$this->requestNumber = 0;
		$this->statsDuration = 0;
		$this->success = false;
	}

}