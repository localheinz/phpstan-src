<?php

namespace Bug2600;

use function PHPStan\Analyser\assertType;

class Foo
{
	/**
	 * @param mixed ...$x
	 */
	public function doFoo($x = null) {
		$args = func_get_args();
		assertType('mixed', $x);
		assertType('array', $args);
	}

	/**
	 * @param mixed ...$x
	 */
	public function doBar($x = null) {
		assertType('mixed', $x);
	}

	/**
	 * @param mixed $x
	 */
	public function doBaz(...$x) {
		assertType('array<int, mixed>', $x);
	}

	/**
	 * @param mixed ...$x
	 */
	public function doLorem(...$x) {
		assertType('array<int, mixed>', $x);
	}

	public function doIpsum($x = null) {
		$args = func_get_args();
		assertType('mixed', $x);
		assertType('array', $args);
	}
}

class Bar
{
	/**
	 * @param string ...$x
	 */
	public function doFoo($x = null) {
		$args = func_get_args();
		assertType('string|null', $x);
		assertType('array', $args);
	}

	/**
	 * @param string ...$x
	 */
	public function doBar($x = null) {
		assertType('string|null', $x);
	}

	/**
	 * @param string $x
	 */
	public function doBaz(...$x) {
		assertType('array<int, string>', $x);
	}

	/**
	 * @param string ...$x
	 */
	public function doLorem(...$x) {
		assertType('array<int, string>', $x);
	}
}

function foo($x, string ...$y): void
{
	assertType('mixed', $x);
	assertType('array<int, string>', $y);
}

function ($x, string ...$y): void {
	assertType('mixed', $x);
	assertType('array<int, string>', $y);
};
