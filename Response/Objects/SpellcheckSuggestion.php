<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


/**
 * a list of alternative terms available in the database. Each suggestion contains
 */
class SpellcheckSuggestion extends ObjectAbstract {

	/**
	 * @var int
	 * the number of records the term exists in
	 */
	public $count;

	/**
	 * @var array
	 * the suggested term
	 */
	public $label;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->count = 0;
		$this->label = array();
	}

}