<meta http-equiv="refresh" content="300">
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">

                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="row tile_count">
                    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-map-marker"></i> Total Alarms</span>
                        <div class="count"><?php echo isset($total_alarms) ? count($total_alarms) : 0; ?></div>
                        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-users"></i> Total Active Assets</span>
                        <div class="count"><?php echo isset($total_active_assets) ? $total_active_assets : 0; ?></div>
                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-gears"></i> Total Assets</span>
                        <div class="count green"><?php echo isset($total_assets) ? count($total_assets) : 0; ?></div>
                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-magnet"></i> User Defined</span>
                        <div class="count">200</div>
                        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>


<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Alarms</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="newsticker-demo">    

                    <div class="newsticker-jcarousellite alarmsec">
                        <ul>
                            <?php
                            if (isset($alarms_info) && !empty($alarms_info)) {
                                foreach ($alarms_info as $alarm) {
                                    if (isset($alarm['alert_type']) && strtolower($alarm['alert_type']) == 'high') {
                                        $labelclass = 'label-danger';
                                        $alert_txt = 'is at the';
                                    } elseif (isset($alarm['alert_type']) && strtolower($alarm['alert_type']) == 'warnning') {
                                        $labelclass = 'label-warning';
                                        $alert_txt = 'is at the';
                                    } elseif (isset($alarm['alert_type']) && strtolower($alarm['alert_type']) == 'low') {
                                        $labelclass = 'label-danger';
                                        $alert_txt = 'is at the';
                                    } elseif (isset($alarm['alert_type']) && strtolower($alarm['alert_type']) == 'normal') {
                                        $labelclass = 'label-success';
                                        $alert_txt = 'has returned to';
                                    }
                                    $date = date('dS M Y | H:i a', strtotime($alarm['start']));
                                    $alert_value = $alarm['start'];
                                    ?>
                                    <li>
                                        <div class="info">
                                            <span class="cat"><strong><?php echo isset($alarm['device']) ? $alarm['device'] : ''; ?></strong>  - <span class="label <?php echo isset($labelclass) ? $labelclass : ''; ?>"> <?php echo isset($alarm['alert_type']) ? $alarm['alert_type'] : ''; ?> </span> &nbsp; <?php echo isset($alarm['parametername']) ? $alarm['parametername'] : ''; ?> <?php echo isset($alert_txt) ? $alert_txt : ''; ?>  <span class="pa"><?php echo isset($alarm['alert_value']) ? $alarm['alert_value'] : ''; ?> <?php echo isset($alarm['uom']) ? $alarm['uom'] : ''; ?></span> on <?php echo isset($date) ? $date : ''; ?></span>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Device Status</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="newsticker-demo">    

                    <div class="newsticker-jcarousellite newsticker-jcarousellite1 ">
                        <ul>
                            <?php
                            if (isset($device_status) && !empty($device_status)) {
                                foreach ($device_status as $device) {
                                    ?>
                                    <li>
                                        <div class="info">
                                            <?php
                                            if (isset($device['status']) && $device['status'] == 1) {
                                                $status = 'started';
                                                $date = date('dS M Y | H:i a', strtotime($device['start']));
                                                $labelclass = 'label-success';
                                            } elseif (isset($device['status']) && $device['status'] == 0) {
                                                $status = 'stopped';
                                                $date = date('dS M Y | H:i a', strtotime($device['end']));
                                                $labelclass = 'label-danger';
                                            }
                                            ?>
                                            <span class="cat"><strong><?php echo isset($device['number']) ? $device['number'] : ''; ?></strong> is <span class="label <?php echo isset($labelclass) ? $labelclass : ''; ?>"><?php echo isset($status) ? $status : ''; ?></span> on <?php echo isset($date) ? $date : ''; ?></span>
                                        </div>
                                        <div class="clear"></div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title circle-hold">
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12 pd0">Select Asset</label>
                            <div class="col-md-9 col-sm-9 col-xs-12 pd0">
                                <select class="form-control" name="dashboard_asset_list" id="dashboard_asset_list">
                                    <?php $index = 0; ?>
                                    <option value="">Asset List</option>
                                    <?php
                                    foreach ($dashboard_assets as $assets_value) {
                                        if ($index < 1) {
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }
                                        ?>
                                        <option name="<?php echo $assets_value['start']; ?>" id="<?php echo $assets_value['customer_locationid']; ?>" value="<?php echo $assets_value['asset_id']; ?>" <?php echo isset($selected) ? $selected : ''; ?>><?php echo $assets_value['code']; ?></option>
                                        <?php
                                        $index++;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h4>Devcie Name : <span id="running_devicename"></span></h4>
                        <h4>Device Status : <span id="running_device"></span></h4>
                    </div>

                    <div class="col-md-4">
                        <h4>Currnet Duration : <span id="running_devicetime"></span></h4>
                        <!-- <h4>Service Due : <span id="running_devicedue_hour"></span></h4> -->
                    </div>

                </div>
                <hr>
                <?php
                $chart_count = 0;
                for ($cindex = 0; $cindex < count($total_parameter); $cindex++) {
                    if ($chart_count < 4) {
                        ?>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <h4 class="gauge-head" id="echart_gaugehead<?php echo $cindex; ?>"></h4>
                            <div id="echart_gauge<?php echo $cindex; ?>" style="height:270px;"></div>
                        </div>
                    <?php } else { ?>
                        <hr><div class="clearfix"></div>
                        <?php
                        $chart_count = 0;
                    }
                }
                ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>Device Alert</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content devicealertlist">

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Time Stamp</th>
                            <th>Type</th>
                            <th>Status</th>

                        </tr>
                    </thead>


                    <tbody>

                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>

                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>

                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                        <tr>
                            <td>56458566685511233555</td>
                            <td>Quarantined</td>
                            <td>Active</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Visitors location <small>geo-presentation</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">

                            <div id="world-map-gdp"  style="height:283px;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <!-- Start to do list -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Communications</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="">
                            <ul class="to_do">
                                <li>Network : <span>Vodacom-SA</span></li>
                                <li>GSM Number : <span>+27 76 112 3411</span></li>
                                <li>Data usage : <span>30.11 Megabytes</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End to do list -->

            <!-- start of weather widget -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Signal Details</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content text-center">


                        <div class="col-md-6">
                            <h4>Signal Strength</h4>
                            <span class="sparkline_bar" style="height: 180px;">
                                <canvas width="300" height="260" style="display: inline-block; vertical-align: top; width: 94px; height: 160px;"></canvas>
                            </span>
                        </div>	

                        <div class="col-md-6"><h4>Generator Controls</h4>
                            <input type="checkbox" class="js-switch" checked />
                        </div>							

                    </div>
                </div>

            </div>

            <!-- end of weather widget -->
        </div>
    </div>
</div>
<script>
    function init_echarts(data) {
        if (typeof (echarts) === 'undefined') {
            return;
        }
        //echart Gauge
        for (var i = 0; i < data.length; i++) {
            if ($("#echart_gauge" + i).length) {
                var echartGauge = echarts.init(document.getElementById("echart_gauge" + i));
                $("#echart_gaugehead" + i).html(data[i]['name']);
                echartGauge.setOption({
                    tooltip: {formatter: "{b} : {c}"
                    },
                    toolbox: {show: false,
                        feature: {restore: {show: true,
                                title: "Restore"
                            },
                            saveAsImage: {show: true,
                                title: "Save Image"
                            }
                        }
                    },
                    series: [{
                            name: data[i]['uom'],
                            type: 'gauge',
                            center: ['50%', '50%'],
                            startAngle: 140,
                            endAngle: -140,
                            min: data[i]['min_value'],
                            max: data[i]['max_value'],
                            precision: 0,
                            splitNumber: 10,
                            axisLine: {show: true,
                                lineStyle: {color: [[0.2, 'lightgreen'],
                                        [0.4, 'orange'],
                                        [0.8, 'skyblue'],
                                        [1, '#ff4500']
                                    ],
                                    width: 30
                                }
                            },
                            axisTick: {show: true,
                                splitNumber: 5,
                                length: 8,
                                lineStyle: {color: '#eee',
                                    width: 1,
                                    type: 'solid'}
                            },
                            axisLabel: {show: true,
                                formatter: function (v) {
                                    switch (v + '') {
                                        case data[i]['min_value']:
                                            return data[i]['min_value'];
                                        case (parseInt(data[i]['max_value']) - parseInt(data[i]['min_value'])) + '' + data[i]['min_value']:
                                            return data[i]['max_value'];
                                        default:
                                            return '';
                                    }
                                },
                                textStyle: {color: '#333'
                                }
                            }
                            ,
                            splitLine: {show: true,
                                length: 30,
                                lineStyle: {color: '#eee',
                                    width: 2,
                                    type: 'solid'
                                }
                            },
                            pointer: {length: '80%',
                                width: 8,
                                color: 'auto'
                            },
                            title: {show: true,
                                offsetCenter: ['-65%', -10],
                                textStyle: {color: '#333',
                                    fontSize: 15
                                }
                            },
                            detail: {show: true,
                                backgroundColor: 'rgba(0,0,0,0)',
                                borderWidth: 0,
                                borderColor: '#ccc',
                                width: 100,
                                height: 40,
                                offsetCenter: ['-60%', 10],
                                formatter: '{value}',
                                textStyle: {color: 'auto',
                                    fontSize: 20
                                }
                            },
                            data: [{
                                    value: data[i]['current_value'],
                                    name: data[i]['uom']
                                }]
                        }]
                });
            }
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var asset = $("#dashboard_asset_list").children(":selected").val();
        var location = $("#dashboard_asset_list").children(":selected").attr("id");
        var starttime = $("#dashboard_asset_list").children(":selected").attr("name");
        if (asset.length != 0) {
            $("#running_devicetime").html(starttime);
            $("#running_device").html('Running');
            $.ajax({
                url: '<?php echo base_url(); ?>Dashboard/load_data_by_asset',
                type: 'post',
                dataType: 'text',
                data: {asset_id: asset, location_id: location},
                success: function (res) {
                    var obj = $.parseJSON(res);
                    if (obj['objData'].length !== 0) {
                        $("#running_devicename").html(obj['objData'][0]['number']);
                    }
                    init_echarts(obj['chart_data']);
                }
            });
        } else {
            $("#running_devicename").html('');
            $("#running_device").html('');
            $("#running_devicetime").html('');
        }
        $("#dashboard_asset_list").change(function ()
        {
            $("#running_devicename").html('');
            $("#running_device").html('');
            $("#running_devicetime").html('');
            var starttime = $(this).children(":selected").attr("name");
            var location_id = $(this).children(":selected").attr("id");
            if (this.value != "") {
                $("#running_devicetime").html(starttime);
                // $("#running_devicedue_hour").html(starttime);
                $("#running_device").html('Running');
                $.ajax({
                    url: '<?php echo base_url(); ?>Dashboard/load_data_by_asset',
                    type: 'post',
                    dataType: 'text',
                    data: {asset_id: this.value, location_id: location_id},
                    success: function (res) {
                        var obj = $.parseJSON(res);

                        if (obj['objData'].length != 0) {
                            $("#running_devicename").html(obj['objData'][0]['number']);
                        }
                        init_echarts(obj['chart_data']);
                    }
                });

            } else {
                $("#running_devicename").html('');
                $("#running_device").html('');
                $("#running_devicetime").html('');
                // $("#running_devicedue_hour").html('');
            }
        });
    });
    // function checkTime(i) {
    //   if (i < 10) {
    //     i = "0" + i;     //   }
    //   return i;
    // }

    // function startTime(datetime) {
    //   // alert($("#running_devicetime").html());
    //   // var today =  $("#running_devicetime").html();
    //   var today =new Date();
    //   var h = today.getHours();
    //   var m = today.getMinutes();
    //   var s = today.getSeconds();
    //   // add a zero in front of numbers<10
    //   // alert(today)
    //   m = checkTime(m);
    //   s = checkTime(s);
    //   document.getElementById('running_devicetime').innerHTML = h + ":" + m + ":" + s;
    //   t = setTimeout(function() {
    //     startTime()
    //   }, 11500);
    // }
    function timedRefresh(timeoutPeriod) {
        setTimeout("location.reload(true);", timeoutPeriod);
    }

    window.onload = timedRefresh(300000);

</script>        



