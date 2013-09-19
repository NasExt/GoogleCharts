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
 * Column
 *
 * @author Dusan Hudak
 */
class Column extends Object
{
	/** Google data table types */
	const STRING = "string";
	const NUMBER = "number";
	const BOOL = "boolean";
	const DATE = "date";
	const DATETIME = "datetime";
	const TIMEOFDAY = "timeofday";


	/**
	 * String ID of the column. Must be unique in the table. Use basic alphanumeric characters,
	 * so the host page does not require fancy escapes to access the column in JavaScript.
	 * Be careful not to choose a JavaScript keyword.
	 * @var string
	 */
	public $id;

	/**
	 * String value that some visualizations display for this column.
	 * @var string
	 */
	public $label;

	/**
	 * Data type of the data in the column.
	 * @var string
	 */
	public $type;


	/**
	 * @param string $id
	 * @param string $label
	 * @param string $type
	 */
	public function __construct($id, $label, $type)
	{
		$this->id = $id;
		$this->label = $label;
		$this->type = $type;
	}
}
