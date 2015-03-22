<?php
namespace Europeana\Api\Response;


class RecordSrw extends XmlAbstract {

	/**
	 * @var {string}
	 */
	public $xml_errors;

	/**
	 * @var {string}
	 */
	public $xml_snippet_as_string;


	/**
	 * @var {\SimpleXMLElement}
	 */
	protected $xml_snippet;


	protected function init() {
		parent::init();

		$this->xml_errors = '';
		$this->xml_snippet = null;
		$this->xml_snippet_as_string = '';
	}

	/**
	 * @return {bool}
	 */
	public function loadRecordFromXml() {
		$result = false;
		libxml_use_internal_errors( true );

		// supress errors so that they can be handled programatically
		$this->xml = @simplexml_load_string( $this->message_body );

		if ( $this->xml === false ) {
			$this->noteLibXMLErrors();
			return $result;
		}

		$old_value = libxml_disable_entity_loader( true );
		$result = $this->processXmlRecord();
		libxml_disable_entity_loader( $old_value );

		return $result;
	}

	protected  function noteLibXMLErrors() {
		$msg = '';

		foreach( libxml_get_errors() as $error ) {
			switch ( $error->level ) {
				case LIBXML_ERR_WARNING:
					$msg .= 'LibXML Warning';
					break;

				case LIBXML_ERR_ERROR:
					$msg .= 'LibXML Error';
					break;

				case LIBXML_ERR_FATAL:
					$msg .= 'LibXML Fatal Error';
					break;
			}

			$msg .= ' ' . $error->code;
			$msg .= ' : ' . $error->message;
			$msg .= ' - file ' . $error->file;
			$msg .= ', line ' . $error->line;
		}

		libxml_clear_errors();

		// http://stackoverflow.com/questions/3760816/remove-new-lines-from-string#answer-3760830
		$this->xml_errors = trim( preg_replace( '/\s\s+/', ' ', $msg ) );
	}

	/**
	 * @return {bool}
	 */
	protected function processXmlRecord() {
		$result = false;
		$namespaces = $this->xml->getNamespaces( true );

		if ( empty( $namespaces ) || !isset( $namespaces['srw'] ) ) {
			$this->xml_errors = 'Missing the srw namespace. Expected to find an srw namespaced node.';
			return $result;
		}

		$this->xml_snippet = $this->xml->records[0]->children( $namespaces['srw'] );

		if ( empty( $this->xml_snippet ) ) {
			$this->xml_errors = 'Could not find an <srw:record> in the <records> element.';
			return $false;
		} else {
			$this->xml_snippet_as_string = $this->xml_snippet->asXml();
			$result = true;
		}

		return $result;
	}

}