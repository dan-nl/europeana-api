<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


class Suggestion extends ObjectAbstract {

	/**
	 * @var string
	 * is the suggested term to use instead of the searched one
	 */
	public $term;

	/**
	 * @var int
	 * is the number of records it contains the term
	 */
	public $frequency;

	/**
	 * @var string
	 * is the label of the field which contains the actual term. The same term may take place in several fields. The fields we use here are the Title, Who, What, Where, and When. Here is the table which pairs the actual fields and the labels:
	 */
	public $field;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->term = null;
		$this->frequency = 0;
		$this->field = null;
	}

}