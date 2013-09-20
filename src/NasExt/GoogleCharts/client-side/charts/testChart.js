/**
 * This file is part of the NasExt extensions of Nette Framework
 *
 * Copyright (c) 2013 Dusan Hudak (http://dusan-hudak.com)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

/**
 * Chart Test
 * @param elm
 */
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
