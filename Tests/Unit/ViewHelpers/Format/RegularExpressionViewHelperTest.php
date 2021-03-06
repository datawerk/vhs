<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Claus Due <claus@wildside.dk>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * @protection off
 * @author Claus Due <claus@wildside.dk>
 * @package Vhs
 */
class Tx_Vhs_ViewHelpers_Format_RegularExpressionViewHelperTest extends Tx_Vhs_ViewHelpers_AbstractViewHelperTest {

	/**
	 * @test
	 */
	public function canReplaceValues() {
		$arguments = array(
			'subject' => 'foo123bar',
			'return' => FALSE,
			'pattern' => '/[0-9]{3}/',
			'replacement' => 'baz',
		);
		$test = $this->executeViewHelper($arguments);
		$this->assertSame('foobazbar', $test);
	}

	/**
	 * @test
	 */
	public function canReturnMatches() {
		$arguments = array(
			'subject' => 'foo123bar',
			'return' => TRUE,
			'pattern' => '/[0-9]{3}/',
			'replacement' => 'baz',
		);
		$test = $this->executeViewHelper($arguments);
		$this->assertSame(array('123'), $test);
	}

	/**
	 * @test
	 */
	public function canTakeSubjectFromRenderChildren() {
		$arguments = array(
			'return' => TRUE,
			'pattern' => '/[0-9]{3}/',
			'replacement' => 'baz',
		);
		$node = $this->createNode('Text', 'foo123bar');
		$test = $this->executeViewHelper($arguments, array(), $node);
		$this->assertSame(array('123'), $test);
	}

}
