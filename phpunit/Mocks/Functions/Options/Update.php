<?php
/**
 * @author OnTheGo Systems
 */

namespace OTGS\Mocks\Functions\Options;

use OTGS\PhpUnit\Mocks\Functions\FunctionBase;
use OTGS\PhpUnit\Mocks\Functions\Options\Option;
use OTGS\PhpUnit\Mocks\Functions\Options\WithAutoload;
use OTGS\PhpUnit\Mocks\Functions\Options\WithValue;
use WP_Mock\Functions;

class Update extends FunctionBase implements Option, WithAutoload, WithValue {
	private $arguments = array();

	public function __construct( $key ) {
		$this->arguments['args'] = array(
			'key'      => $key,
			'value'    => '*',
			'autoload' => Functions::anyOf( array( 'yes', 'no', true, false ) ),
		);
	}

	public function times( $value ) {
		$this->arguments['times'] = $value;

		return $this;
	}

	public function withValue( $value ) {
		$this->arguments['args']['value'] = $value;

		return $this;
	}

	public function withAutoload( $value ) {
		$this->arguments['args']['autoload'] = $value;

		return $this;
	}

	public function get_function_name() {
		return 'update_option';
	}

	public function get_arguments() {
		return $this->arguments;
	}
}
