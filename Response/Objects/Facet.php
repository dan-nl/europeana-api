<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


/**
 * is a list of facet object (available in case of facets and portal profile applications). Each facet object contains the following fields
 */
class Facet extends ObjectAbstract {

	/**
	 * @var array
	 * list of field objects inside the given facet. Each field object represent a given value, and the number of occurences. The object contains the following fields:
	 */
	public $fields;

	/**
	 * @var string
	 * the name of the facet field. It should always one of Europeana's defined facet (which are COMPLETENESS, COUNTRY, DATA_PROVIDER, LANGUAGE, LOCATION, PROVIDER, RIGHTS, TYPE, UGC, and YEAR).
	 */
	public $name;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->fields = array();
		$this->name = null;
		$this->_property_to_class['fields'] = 'Europeana\Api\Response\Objects\FacetField';
	}

}