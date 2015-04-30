@extends('layout.master')

@section('breadcumbs')

<li class="active">Home</li>
@stop
@section('content')
<div class="col-xs-12" style="margin-bottom: 10px">
    <a href="{{ url('user') }}" class="col-xs-2 col-xs-offset-1"><i class="fa fa-user fa-5x"></i><br> Users </a>
    <a href="{{ url('applicants') }}" class="col-xs-2"><i class="fa fa-briefcase fa-5x"></i><br> Applicants </a>
    <a href="{{ url('groups') }}" class="col-xs-2"><i class="fa fa-users fa-5x"></i><br> Groups </a>
    <a href="#" class="col-xs-2"><i class="fa fa-bar-chart-o fa-5x"></i><br> Statistics </a>
    <a href="{{ url('loans') }}" class="col-xs-2"><i class="fa fa-cog fa-5x"></i><br> Settings </a>
</div>

  <div class="col-xs-12">
      <div class="col-md-4">
          <div class="panel panel-info ">
              <div class="panel-heading lead">Applicants</div>
              <div class="panel-body">
                  Total Applicants: 0<br>
                  With Loan: 0<br>
                  With Pending Application: 0<br>
                  Completed Payments: 0<br>
                  Defaulters: 0<br>
              </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="panel panel-info ">
              <div class="panel-heading lead">Groups</div>
              <div class="panel-body">
                  Total Applicants: 0<br>
                  With Loan: 0<br>
                  With Pending Application: 0<br>
                  Completed Payments: 0<br>
                  Defaulters: 0<br>
              </div>
          </div>
      </div>

      <div class="col-md-4">
          <div class="panel panel-info ">
              <div class="panel-heading lead">Loans</div>
              <div class="panel-body">
                  Total Loans: 0<br>
                  Total Out: 0<br>
                  Total In: 0<br>
                  Total Applied For: 0<br>
                  Total Loss: 0<br>
              </div>
          </div>
      </div>

  </div>
<div class="col-xs-6" id="container2" style="margin-bottom: 10px">

</div>
<div class="col-xs-6" id="container3" style="margin-bottom: 10px">

</div>
<div class="col-xs-6" id="container">

</div>
<div class="col-xs-6" id="container1">

</div>
<script>
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Monthly Average Loan Distribution'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'In',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

            }, {
                name: 'Out',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

            }, {
                name: 'Applied',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

            }]
        });


        //contius chat
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });

        var chart;
        $('#container1').highcharts({
            chart: {
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {

                        // set up the updating of the chart each second
                        var series = this.series[0];
                        setInterval(function() {
                            var x = (new Date()).getTime(), // current time
                                y = Math.random();
                            series.addPoint([x, y], true, true);
                        }, 1000);
                    }
                }
            },
            title: {
                text: 'Live random data'
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: 'Value'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            legend: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: 'Random data',
                data: (function() {
                    // generate an array of random data
                    var data = [],
                        time = (new Date()).getTime(),
                        i;

                    for (i = -19; i <= 0; i++) {
                        data.push({
                            x: time + i * 1000,
                            y: Math.random()
                        });
                    }
                    return data;
                })()
            }]
        });

        // Build the chart
        $('#container2').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Loan Distribution 2014'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Loans',
                data: [
                    ['Applied',   45.0],
                    ['Paid',       26.8],
                    {
                        name: 'Granted',
                        y: 12.8,
                        sliced: true,
                        selected: true
                    },
                    ['Loss',    8.5]
                ]
            }]
        });

        $('#container3').highcharts({
            title: {
                text: 'Monthly Average Loan Distribution',
                x: -20 //center
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Cash (x1000)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'Tsh'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Applied',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'Declined',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Granted',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'Paid',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });
    });
</script>


@stop