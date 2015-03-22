<?php
namespace Europeana\Api\Helpers;

class Response {

	/**
	 * @param {Europeana\Api\Response\ResponseInterface} $Response
	 * @param {int} $sample_limit
	 */
	public static function getResponseImagesWithLinks( $Response, $sample_limit = 12 ) {
		$count = 0;
		$result = '<h3>sample result set</h3>';
		$result .= '<p>below is a sample result set of ' . $sample_limit . ' items based on the query provided.</p>';

		foreach ( $Response->items as $item ) {
			$count++;
			$item_id = '';
			$item_title = '';
			$item_img_src = '';

			// set id
			if ( isset( $item->id ) ) {
				$item_id = $item->id;
			}

			// set title
			if ( !empty( $item_title ) ) {
				if ( is_array( $item->title ) ) {
					foreach( $item->title as $title_piece ) {
						$item_title .= $title_piece . ' '; // http://europeana.eu/api/v2/search.json comes back with an array
					}
				} else {
					$item_title = $item_title; // http://europeana.eu/api/v2/mydata/tag.json comes back with a string
				}
			}

			$item_title = trim( $item_title );

			// set image src
			if ( !empty( $item->edmPreview ) ) {
				if ( is_array( $item->edmPreview ) && isset( $item->edmPreview[0] ) ) {
					$item_img_src = $item->edmPreview[0]; // http://europeana.eu/api/v2/search.json comes back with an array
				} else {
					$item_img_src = $item->edmPreview; // http://europeana.eu/api/v2/mydata/tag.json comes back with a string
				}
			}

			// fallback to the static image in case edmPreview is not present
			if ( empty( $item_img_src ) && isset( $item->type ) ) {
				$item_img_src = 'http://europeanastatic.eu/api/image?type=' . $item->type . '&size=BRIEF_DOC';
			}

			$result .=
				'<a href="' . filter_var( $item->guid, FILTER_SANITIZE_STRING ) . '" title="' . filter_var( $item_title, FILTER_SANITIZE_STRING ) . '">' .
					'<img src="' . filter_var( $item_img_src, FILTER_SANITIZE_STRING ) . '" alt="' . filter_var( $item_title, FILTER_SANITIZE_STRING ) . '"/>' .
				'</a>';

			if ( $count === $sample_limit ) {
				break;
			}
		}

		return $result;
	}

	/**
	 * @param {string} $string
	 * @param {string} $apikey
	 * @return {string}
	 */
	public static function obfuscateApiKey( $string = '', $apikey = '' ) {
		return str_replace( $apikey, 'xxxxxxx', $string );
	}

}