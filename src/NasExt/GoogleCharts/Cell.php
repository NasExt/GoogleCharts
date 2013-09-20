<?php

/**
 * This file is part of the NasExt extensions of Nette Framework
 *
 * Copyright (c) 2013 Dusan Hudak (http://dusan-hudak.com)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace NasExt\GoogleCharts;

use Nette\Object;

/**
 * Cell
 *
 * @author Dusan Hudak
 */
class Cell extends Object
{
	/**
	 * The cell value. The data type should match the column data type.
	 * If null, the whole object should be empty and have neither v nor f properties.
	 * @var string
	 */
	public $v;

	/**
	 * A string version of the v value, formatted for display.
	 * The values should match, so if you specify Date(2008, 0, 1) for v,
	 * you should specify "January 1, 2008" or some such string for this property.
	 * This value is not checked against the v value. The visualization will not use this value for calculation,
	 * only as a label for display. If omitted, a string version of v will be used.
	 * @var string
	 */
	public $f;

	/**
	 *  An object that is a map of custom values applied to the cell. These values can be of any JavaScript type.
	 * If your visualization supports any cell-level properties, it will describe them; otherwise,
	 * this property will be ignored. Example: p:{style: 'border: 1px solid green;'}.
	 * @var string
	 */
	public $p;


	/**
	 * @param string $v
	 * @param null|string $f
	 * @param null|string $p
	 */
	public function __construct($v, $f = NULL, $p = NULL)
	{
		$this->v = $v;

		if ($f != NULL) {
			$this->f = $f;
		} else {
			unset($this->f);
		}

		if ($p != NULL) {
			$this->p = $p;
		} else {
			unset($this->p);
		}
	}
}
