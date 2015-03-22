<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


class ProvidedCHO extends ObjectAbstract {

	/**
	 * @var string
	 */
	public $about;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->about = null;
	}

}