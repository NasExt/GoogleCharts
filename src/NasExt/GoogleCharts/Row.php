<?php

/**
 * This file is part of the NasExt extensions of Nette Framework
 *
 * Copyright (c) 20013 Dusan Hudak (http://dusan-hudak.com)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace NasExt\GoogleCharts;

use Nette\Object;

/**
 * Row
 *
 * @author Dusan Hudak
 */
class Row extends Object
{
	/** @var array */
	public $c = array();


	/**
	 * @param Cell $cell
	 */
	public function addCell(Cell $cell)
	{
		$this->c[] = $cell;
	}
}
