<?php
namespace Europeana\Api\Response;

use Pennline\Http\Response;

abstract class JsonAbstract extends ObjectAbstract {

	/**
	 * @param {Response} $Response
	 * @param {string} $wskey
	 */
	public function __construct( $Response, $wskey = '' ) {
		$this->init();
		$this->populate( $Response, $wskey );
		$this->obfuscateApiKey();

		$this->response_array = json_decode( $this->message_body, true );

		// adding the api response as an array so that the application can
		// create the corresponding object for it
		$this->response_array['api_response'] = array(
			'action' => isset( $this->response_array['action'] ) ? $this->response_array['action'] : null,
			'apikey' => isset( $this->response_array['apikey'] ) ? $this->response_array['apikey'] : null,
			'error' => isset( $this->response_array['error'] ) ? $this->response_array['error'] : false,
			'requestNumber' => isset( $this->response_array['requestNumber'] ) ? $this->response_array['requestNumber'] : 0,
			'success' => isset( $this->response_array['success'] ) ? $this->response_array['success'] : false
		);

		$this->populateObject( $this->response_array );
	}

	public function getResponseAsJson() {
		$result = null;

		if ( defined( 'JSON_PRETTY_PRINT' ) ) {
			$result = json_encode( $this->message_body, JSON_PRETTY_PRINT );
		} else {
			$result = $this->indent( $this->message_body );
		}

		return $result;
	}

	/**
	 * Indents a flat JSON string to make it more human-readable.
	 *
	 * @param string $json The original JSON string to process.
	 * @return string Indented version of the original JSON string.
	 * @link http://recursive-design.com/blog/2008/03/11/format-json-with-php/
	 */
	protected function indent( $json ) {
		$result      = '';
		$pos         = 0;
		$strLen      = strlen($json);
		$indentStr   = '  ';
		$newLine     = "\n";
		$prevChar    = '';
		$outOfQuotes = true;

		for ( $i = 0; $i <= $strLen; $i++ ) {
			// Grab the next character in the string.
			$char = substr($json, $i, 1);

			// Are we inside a quoted string?
			if ($char == '"' && $prevChar != '\\') {
					$outOfQuotes = !$outOfQuotes;

			// If this character is the end of an element,
			// output a new line and indent the next line.
			} else if(($char == '}' || $char == ']') && $outOfQuotes) {
					$result .= $newLine;
					$pos --;
					for ($j=0; $j<$pos; $j++) {
							$result .= $indentStr;
					}
			}

			// Add the character to the result string.
			$result .= $char;

			// If the last character was the beginning of an element,
			// output a new line and indent the next line.
			if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
				$result .= $newLine;
				if ($char == '{' || $char == '[') {
					$pos ++;
				}

				for ($j = 0; $j < $pos; $j++) {
					$result .= $indentStr;
				}
			}

			$prevChar = $char;
		}

		return $result;
	}

	public function init() {
		parent::init();
	}

	/**
	 * @param Response $Response
	 * @param {string} $wskey
	 */
	protected function populate( $Response, $wskey = '' ) {
		parent::populate( $Response, $wskey );
		$this->validate();
	}

	public function validate() {
		parent::validate();
	}

}