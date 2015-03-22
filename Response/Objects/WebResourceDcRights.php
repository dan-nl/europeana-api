<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


class WebResourceDcRights extends ObjectAbstract {

	/**
	 * @var array
	 * A collection of definitions for the referring object
	 */
	public $sv;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->sv = array();
	}

}