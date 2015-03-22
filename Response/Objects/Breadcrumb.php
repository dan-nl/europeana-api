<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


/**
 * the list of search elements (query and qf parameters) (available in case of breadrumb and portal profile applications). It is an array, and each breadcrumb contains the following fields:
 */
class Breadcrumb extends ObjectAbstract {

	/**
	 * @var string
	 * a label of the item
	 */
	public $display;

	/**
	 * @var string
	 * an URL fragment of query parameter (in the form of param + "=" + value), which can be reused in search call
	 */
	public $href;

	/**
	 * @var boolean
	 * a boolean value means whether the current is the last breadcrumb or not
	 */
	public $last;

	/**
	 * @var string
	 * the query parameter name
	 */
	public $param;

	/**
	 * @var string
	 * the query parameter's value
	 */
	public $value;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->display = null;
		$this->href = null;
		$this->last = false;
		$this->param = null;
		$this->value = null;
	}

}