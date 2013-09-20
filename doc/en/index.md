NasExt/GoogleCharts
===========================

This lib is help for create [Google charts](https://google-developers.appspot.com/chart/) in Nette Framework.

Requirements
------------

NasExt/GoogleCharts requires PHP 5.3.2 or higher.

- [Nette Framework 2.0.x](https://github.com/nette/nette)
- [nette.ajax.js](https://github.com/vojtech-dobes/nette.ajax.js)


Installation
------------

The best way to install NasExt/GoogleCharts is using  [Composer](http://getcomposer.org/):

```sh
$ composer require nasext/google-charts:@dev
```

1. Loads the [JSAPI library](https://www.google.com/jsapi) in to your directory with Javascript files.
2. Copy googleChartsInit.js to your directory with Javascript files.
3. Create chart like as client-side/charts/testChart.js and copy to your directory with Javascript files.


Usage
--------------------
```php
// Create cart
$testChart = new NasExt\GoogleCharts\Chart('test-chart');

// Create init
// Name represent name (type) of chart JS library like as GoogleCharts.test
// Handle is link to handle data generator
$dataChartInit = array(
			'name' => 'test',
			'handle' => $this->link('getProductChartTable!')
		);

// Create options
$dataChartOptions = array(
	'title' => 'My test chart',
	'height' => 300,
);

// Setup chart
$testChart->setInit($dataChartInit)
			->setOptions($dataChartOptions);

// Send chart to template
$this->template->testChart = $testChart->getChart();
```

Render chart in template
```yml
{$testChart}
```

Create data source handle
```php
/**
 * HANDLE - GetProductChart
 */
public function handleGetProductChartTable()
{
	if ($this->isAjax()) {

		$data = array(
			'Pc'=>300,
			'Mouse'=>128,
			'Laptop'=>143,
			'Keyboard'=>57,
		);

		$dataTable = new NasExt\GoogleCharts\DataTable();

		$dataTable->setCols('name', 'Name', NasExt\GoogleCharts\Column::STRING);
		$dataTable->setCols('value', 'Value', NasExt\GoogleCharts\Column::NUMBER);

		foreach ($data as $name => $value) {
			$row = array(
				new NasExt\GoogleCharts\Cell($name),
				new NasExt\GoogleCharts\Cell($value),
			);
			$dataTable->setRow($row);
		}

		$this->presenter->payload->dataTable = $dataTable->getTable();
		$this->presenter->sendPayload();
		$this->terminate();
	}
}
```

Create DATE type cell
```php
new NasExt\GoogleCharts\Cell("new Date(2009,1,21,0,31,26)")
```

Create chart JS library for example client-side/charts/testChart.js. Method name (test) is call by name defined in $dataChartInit['name']
```js
GoogleCharts.test = function (elm) {

    var dataInit = $(elm).data('googleChart');
    var dataOptions = $(elm).data('options');

    $.nette.ajax({
        url: dataInit.handle,
        dataType: "json",
        success: function (payload) {
            var dataTable = eval('(' + payload.dataTable + ')');

            // Create the data table.
            var data = new google.visualization.DataTable(dataTable);

            // Set chart options
            var options = {};
            $.extend(options, dataOptions);

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(elm);
            chart.draw(data, options);
        }
    });

};
```

-----

Repository [http://github.com/nasext/googlecharts](http://github.com/nasext/googlecharts).