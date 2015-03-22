<?php
namespace Europeana\Api\Response;


class Login extends JsonAbstract {

	/**
	 * @var array
	 */
	public $api_response;


	/**
	 * @return void
	 */
	public function init() {
		parent::init();

		$this->api_response = array();
		$this->_property_to_class['api_response'] = 'Europeana\Api\Response\Objects\ApiResponse';
	}

}