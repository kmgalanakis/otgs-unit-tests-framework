<?php
/**
 * @author OnTheGo Systems
 */

namespace OTGS\Mocks\Functions\Options;

use OTGS\PhpUnit\Mocks\Functions\FunctionBase;
use OTGS\PhpUnit\Mocks\Functions\Options\Option;
use OTGS\PhpUnit\Mocks\Functions\Options\WithDefault;

class Get extends FunctionBase implements Option, WithDefault {
	private $arguments = array();

	public function __construct( $key ) {
		$this->arguments['args'] = array(
			'key'     => $key,
			'default' => '*',
		);
	}

	public function times( $value ) {
		$this->arguments['times'] = $value;

		return $this;
	}

	public function withDefault( $value ) {
		$this->arguments['args']['default'] = $value;

		return $this;
	}

	public function willReturn( $value ) {
		$this->arguments['return'] = $value;

		return $this;
	}

	public function get_function_name() {
		return 'get_option';
	}

	public function get_arguments() {
		return $this->arguments;
	}
}