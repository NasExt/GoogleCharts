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
use Nette\Utils\Html;
use Nette\Utils\Json;

/**
 * Chart
 *
 * @author Dusan Hudak
 */
class Chart extends Object
{
	/** @var array */
	public $options = array();

	/** @var array */
	public $init = array();

	/** @var  string */
	public $id;


	/**
	 * @param string $id
	 */
	public function __construct($id)
	{
		$this->id = $id;
	}


	/**
	 * @param array $values
	 * @return Chart  provides a fluent interface
	 */
	public function setInit($values)
	{
		$this->init = $values;
		return $this;
	}


	/**
	 * @param array $values
	 * @return Chart  provides a fluent interface
	 */
	public function setOptions($values)
	{
		$this->options = $values;
		return $this;
	}


	/**
	 * @return Html
	 */
	public function getChart()
	{
		$chart = Html::el('div', array('id' => $this->id))
			->addAttributes(array('data-google-chart' => Json::encode($this->init)))
			->addAttributes(array('data-options' => Json::encode($this->options)));
		return $chart;
	}
}
