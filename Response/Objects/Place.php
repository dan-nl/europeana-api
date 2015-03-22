<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


class Place extends ObjectAbstract {

	/**
	 * @var string
	 */
	public $about;

	/**
	 * @var array
	 */
	public $prefLabel;

	/**
	 * @var array
	 */
	public $altLabel;

	/**
	 * @var array
	 */
	public $isPartOf;

	/**
	 * @var float
	 */
	public $latitude;

	/**
	 * @var float
	 */
	public $longitude;

	/**
	 * @var int
	 */
	public $altitude;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->about = null;
		$this->altitude = 0;
		$this->altLabel = array();
		$this->isPartOf = array();
		$this->latitude = 0;
		$this->longitude = 0;
		$this->prefLabel = array();
	}

}