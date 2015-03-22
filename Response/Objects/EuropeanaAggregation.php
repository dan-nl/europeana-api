<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


/**
 * is object representing spellcheck suggestions (available in case of spellcheck and portal profile applications). The object contains the following fields:
 */
class EuropeanaAggregation extends ObjectAbstract {

	/**
	 * @var string
	 */
	public $about;

	/**
	 * @var string
	 */
	public $aggregatedCHO;

	/**
	 * @var array
	 * a collection of dcCreator definitions
	 */
	public $dcCreator;

	/**
	 * @var string
	 * a collection of edmCountry definitions
	 */
	public $edmCountry;

	/**
	 * @var string
	 */
	public $edmLandingPage;

	/**
	 * @var string
	 * a collection of edmLanguage definitions
	 */
	public $edmLanguage;

	/**
	 * @var string
	 */
	public $edmPreview;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();

		$this->about = null;
		$this->aggregatedCHO = null;
		$this->dcCreator = array();
		$this->edmCountry = array();
		$this->edmLandingPage = null;
		$this->edmLanguage = array();
		$this->edmPreview = array();

		$this->_property_to_class['dcCreator'] = 'Europeana\Api\Response\Objects\DcCreator';
		$this->_property_to_class['edmCountry'] = 'Europeana\Api\Response\Objects\EdmCountry';
		$this->_property_to_class['edmLanguage'] = 'Europeana\Api\Response\Objects\EdmLanguage';
	}

}