<?php
namespace Europeana\Api\Request;

use Pennline\Http\Request;
use Pennline\Php\Exception;

/**
 * @see https://sites.google.com/site/projecteuropeana/documents/new-ingestion-process-and-portal-planning/api-1/api
 */
class RecordSrw extends Request {

	/**
	 * @var {string}
	 */
	public $record_id;

	/**
	 * @var {string}
	 */
	public $wskey;


	/**
	 * @var {string}
	 */
	protected $endpoint;


	/**
	 * @param {object|array|string} $data
	 * data to send in the call
	 *
	 * @return {array} $result
	 * @return {bool|string} $result['response']
	 * @return {array} $result['info']
	 */
	public function call( $data = array() ) {
		if ( empty( $data ) ) {
			$data = array(
				'wskey' => $this->wskey
			);
		}

		return parent::get( sprintf( $this->endpoint, $this->record_id ), $data );
	}

	public function init() {
		parent::init();
		$this->endpoint = 'http://europeana.eu/api/v2/record%s.srw';
		$this->record_id = '';
		$this->wskey = '';
	}

	/**
	 * @param {array} $options
	 */
	protected function populate( $options = array() ) {
		parent::populate( $options );

		if ( isset( $options['record_id'] ) && is_string( $options['record_id'] ) ) {
			$this->record_id = filter_var( $options['record_id'], FILTER_SANITIZE_STRING );
		}

		if ( isset( $options['wskey'] ) && is_string( $options['wskey'] ) ) {
			$this->wskey = filter_var( $options['wskey'], FILTER_SANITIZE_STRING );
		}

		$this->validate();
	}

	public function validate() {
		parent::validate();

		if ( empty( $this->record_id ) || !is_string( $this->record_id ) ) {
			error_log( __METHOD__ . '() no record_id provided' );
			throw new Exception( 'no record_id provided', 2 );
		}

		if ( empty( $this->wskey ) || !is_string( $this->wskey ) ) {
			error_log( __METHOD__ . '() no wskey provided' );
			throw new Exception( 'no wskey provided', 2 );
		}
	}

}