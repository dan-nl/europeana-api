<?php
namespace Europeana\Api\Helpers;

use Pennline\Php\Exception;

class Request {

	/**
	 * @param {string} $string
	 * @param {string} $param
	 * @param {string|int} $start
	 * @throws {Exception}
	 * @return {int}
	 */
	public static function getQueryParam( $string, $param = '', $default = '' ) {
		if ( empty( $param ) ) {
			error_log( __METHOD__ . ' $param not specified' );
			throw new Exception( 'param not specified', 25 );
		}

		$result = $default;
		$param_begin = strpos( $string, $param . '=' );

		if ( $param_begin !== false ) {
			$param_end = strpos( $string, '&', $param_begin );

			if ( $param_end !== false ) {
				$result = substr( $string, $param_begin, $param_end - $param_begin );
			} else {
				$result = substr( $string, $param_begin );
			}

			$result = explode( '=', $result, 2 );
			$result = $result[1];
		}

		if ( $result === '' ) {
			$result = $default;
		}

		return $result;
	}

	/**
	 * @param {string} $string
	 * @param {string} $param
	 */
	public static function removeQueryParam( $string, $param = '' ) {
		$query_string = explode( '?', $string );

		if ( count( $query_string ) === 2 ) {
			$query_string = $query_string[1];
		} else {
			$query_string = $query_string[0];
		}

		$params = explode( '&', $query_string );
		$i = 0;

		foreach ( $params as $pairs ) {
			$i += 1;
			$pair = explode( '=', $pairs );

			if ( $pair[0] === $param ) {
				if ( $i === 1 ) {
					$string = str_replace( $pairs . '&', '', $string );
				} else {
					$string = str_replace( '&' . $pairs, '', $string );
				}
			}
		}

		return $string;
	}

	/**
	 * @param {string} $query
	 * @throws {Exception}
	 * @return {string}
	 */
	public static function normalizeQueryString( $query = '' ) {
		if ( strstr( $query, 'query=' ) === false ) {
			throw new Exception( 'query error: the query provided does not contain a query parameter; e.g., query=paris', 99 );
		}

		// remove any portal references in the query provided
		$result =
			str_replace(
				array(
					'http://europeana.eu/portal/search.html',
					'http://www.europeana.eu/portal/search.html',
					'?'
				),
				'',
				urldecode( $query )
			);

		// replace known character issues
		// quotes can be converted to entities when the string comes from a form field
		$result = str_replace(
			array(
				'&#34;',
				'&#39;'
			),
			array(
				'"',
				"'"
			),
			$result
		);

		return $result;
	}

	/**
	 * @param {string} $query_string
	 * @return {string}
	 */
	public static function urlencodeQueryParams( $query_string = '' ) {
		$result = '';
		$params = explode( '&', $query_string );

		foreach ( $params as $pairs ) {
			$pair = explode( '=', $pairs );
			$result .= $pair[0] . '=' . urlencode( $pair[1] ) . '&';
		}

		$result = substr( $result, 0, -1 );
		return $result;
	}

}