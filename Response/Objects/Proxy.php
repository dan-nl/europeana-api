<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


class Proxy extends ObjectAbstract {

	/**
	 * @var string
	 */
	public $about;

	/**
	 * @var array
	 * a collection of dcCoverage objects
	 */
	public $dcCoverage;

	/**
	 * @var string
	 * a collection of dcIdentifier objects
	 */
	public $dcIdentifier;

	/**
	 * @var string
	 * a collection of dcTitle objects
	 */
	public $dcTitle;

	/**
	 * @var string
	 */
	public $proxyFor;

	/**
	 * @var string
	 */
	public $edmType;

	/**
	 * @var string
	 */
	public $europeanaProxy;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->about = null;
		$this->dcCoverage = array();
		$this->dcCreator = array();
		$this->dcIdentifier = array();
		$this->dcTitle = array();
		$this->proxyFor = null;
		$this->edmType = null;
		$this->europeanaProxy = null;

		$this->_property_to_class['dcCoverage'] = 'Europeana\Api\Response\Objects\DcCoverage';
		$this->_property_to_class['dcCreator'] = 'Europeana\Api\Response\Objects\DcCreator';
		$this->_property_to_class['dcIdentifier'] = 'Europeana\Api\Response\Objects\DcIdentifier';
		$this->_property_to_class['dcTitle'] = 'Europeana\Api\Response\Objects\DcTitle';
	}

}