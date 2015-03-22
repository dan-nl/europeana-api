<?php
namespace	Europeana\Api\Request\MyEuropeana;

use Pennline\Http\Request;
use Pennline\Php\Exception;

/**
 * @link http://labs.europeana.eu/api/authentication
 */
class Login extends Request {

	/**
	 * @var {string}
	 * a public apikey
	 */
	public $j_username;

	/**
	 * @var {string}
	 * a private apikey
	 */
	public $j_password;


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
				'j_username' => $this->j_username,
				'j_password' => $this->j_password
			);
		}

		return parent::post( $this->endpoint, $data );
	}

	public function init() {
		parent::init();

		$this->endpoint = 'http://europeana.eu/api/login.do';
		$this->j_password = '';
		$this->j_username = '';
	}

	/**
	 * @param {array} $properties
	 */
	protected function populate( $properties = array() ) {
		parent::populate( $properties );

		if ( isset( $properties['j_username'] ) ) {
			$this->j_username = $properties['j_username'];
		}

		if ( isset( $properties['j_password'] ) ) {
			$this->j_password = $properties['j_password'];
		}

		$this->validate();
	}

	public function validate() {
		parent::validate();

		if ( empty( $this->j_username ) ) {
			error_log( __METHOD__ . '() no j_username provided' );
			throw new Exception( 'no j_username provided', 2 );
		}

		if ( empty( $this->j_password ) ) {
			error_log( __METHOD__ . '() no j_password provided' );
			throw new Exception( 'no j_password provided', 2 );
		}
	}

}