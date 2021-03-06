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
use Nette\Utils\Json;

/**
 * DataTable
 *
 * @author Dusan Hudak
 */
class DataTable extends Object
{
	/** @var array */
	public $cols = array();

	/** @var array */
	public $rows = array();


	/**
	 * @return int|string
	 */
	public function getTable()
	{
		$json = Json::encode($this);
		$json = $this->filterDate($json);
		return $json;
	}


	/**
	 * @param string $id
	 * @param string $label
	 * @param int $type
	 */
	public function setCols($id, $label, $type)
	{
		$this->cols[] = new Column($id, $label, $type);
	}


	/**
	 * @param array $cellList
	 */
	public function setRow($cellList)
	{
		$row = new Row();
		foreach ($cellList as $cell) {
			$row->addCell($cell);
		}
		$this->rows[] = $row;
	}


	/**
	 * @param string $data
	 * @return string
	 */
	private function filterDate($data = '')
	{
		return preg_replace('#\:"new Date\((.*?)\)\"#is', ':new Date($1)', $data);
	}
}
