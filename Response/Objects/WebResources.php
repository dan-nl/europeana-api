<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


class WebResources extends ObjectAbstract {

	/**
	 * @var string
	 */
	public $about;

	/**
	 * @var array
	 * a collection of webResourceDcRights definitions
	 */
	public $webResourceDcRights;

	/**
	 * @var array
	 * a collection of webResourceDcRights definitions
	 */
	public $webResourceEdmRights;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();

		$this->about = null;
		$this->webResourceDcRights = array();
		$this->webResourceEdmRights = array();

		$this->_property_to_class['webResourceDcRights'] = 'Europeana\Api\Response\Objects\WebResourceDcRights';
		$this->_property_to_class['webResourceEdmRights'] = 'Europeana\Api\Response\Objects\WebResourceEdmRights';
	}

}