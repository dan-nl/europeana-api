<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


class Agent extends ObjectAbstract {

	/**
	 * @var string
	 * A collection of definitions for the referring object
	 */
	public $agent;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->agent = null;
	}

}