<?php
namespace Europeana\Api\Response\Objects;
use Europeana\Api\Response\ObjectAbstract;


/**
 * if the search has results, the hits take place in the "items" array. Each item is an object, and represents a summary of metadata record. The actual content is depending of the profile parameter. The mandatory field are:
 */
class Tag extends ObjectAbstract {

	/**
	 * @var {string}
	 */
	public $edmPreview;

	/**
	 * @var {string}
	 * the same as the Item object’s id
	 */
	public $europeanaId;

	/**
	 * @var {string}
	 * the url to the europeana object in the portal
	 */
	public $guid;

	/**
	 * @var {int}
	 * the tag id in the db?
	 */
	public $id;

	/**
	 * @var {string}
	 * a url to the JSON representation of the object. note that a valid api key
	 * needs to be at the end of the url in the form ?wskey=<your-api-key>. the
	 * response includes the api key used in the query.
	 */
	public $link;

	/**
	 * @var {string}
	 */
	public $title;

	/**
	 * @var {string}
	 * 3D|IMAGE|TEXT|SOUND|VIDEO
	 */
	public $type;

	/**
	 * @var {timestamp}
	 */
	public $dateSaved;

	/**
	 * @var {string}
	 */
	public $tag;


	public function __construct( array $properties ) {
		$this->init();
		$this->populateObject( $properties );
	}

	public function init() {
		parent::init();
		$this->id = 0;
		$this->europeanaId = '';
		$this->guid = '';
		$this->link = '';
		$this->title = '';
		$this->edmPreview = '';
		$this->type = '';
		$this->dateSaved = 0;
		$this->tag = '';
	}

}