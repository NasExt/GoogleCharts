/**
 * This file is part of the NasExt extensions of Nette Framework
 *
 * Copyright (c) 20013 Dusan Hudak (http://dusan-hudak.com)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

var GoogleCharts = GoogleCharts || {};

/**
 * Init
 */
GoogleCharts.init = function () {

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages': ['corechart']});

    $(document).ready(function () {

        $('[data-google-chart]').each(function () {
            var dataInit = $(this).data('googleChart');
            var callback = GoogleCharts[dataInit.name];

            if (typeof(callback) !== 'undefined') {
                google.setOnLoadCallback(callback(this));
            } else {
                $(this).html('Chart with name: "GoogleCharts.' + dataInit.name + '" is not defined!')
            }
        });

    });
};

new GoogleCharts.init();
