<style>
    /*    .map-frame {
        width: 100%;
        height: 100%;
        position: relative;
            overflow-y: auto;
            overflow-x:hidden;
    }
    
    .map-content {
        z-index: 10 !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        background-color:#6f646442 !important;
        color: #222  !important;
        height: 100% !important;
        padding: 5px !important;
    }
    select#tasktypeid {
        height: auto;
    }
    .nav_menu {
        margin-bottom: 0;
    }
    
    .hgt100vh {
        height:100vh;
    }
    
    .form-row {
        margin-left: 6px;
        margin-top: 0;
        background: #fff;
        display: flex;
        width: 100%;
        padding: 4px 10px;
        border-radius: 5px;
    }
    
    .form-row form {
        width:100%;
    }
    select.form-control:not([size]):not([multiple]) {
            height: 38px;
        border-radius: 4px;
    }
    .form-row .form-group {
        float: left;
        width: 14.2%;
        padding: 4px 10px 0px 10px;
        background: #fff;
        min-height: 66px;
        float: left;
    }
    
    .form-row .form-group label {
        font-weight: 500;
        color: #6f6f6f;
            font-size: 12px;
    }
    
    .form-row .form-group .form-control {
         border: none;
        border-bottom: 1px solid #b5b5b5;
        height: 35px;
        margin-bottom: 10px;
        padding: 0;
        font-size: 10px;
        border-radius: 4px;
           
    }
    
    .form-row .form-group button {
        background: #0554a4;
        color: #fff;
        padding: 5px 10px;
        margin-top: 0px;
        font-weight: 600;
        border-radius:6px;
        margin-left: 10px;
        border: none;
        margin-top: 10px; 
    }
    button.btn.btn-default {
        color: #fff;
        background: #154d88;
        border: #154d88;
        border-radius: 4px;}
    
        #map {
            margin-top: 0px;
            height: 100%;
        }
        
    */    
    .rgt_col {top: 0px !important;}
    .ui-autocomplete {
        position: absolute;

        z-index: 999999999999999 !important;
        border: 1px solid #d4d4d4;
        list-style-type: none;
        margin: 0px;
        padding: 0px;
        max-height: 400px;
        overflow: auto;
        overflow-x: hidden;
    }
    .ui-menu-item {
        padding: 10px;
        cursor: pointer;
        background-color: #fff; 
        border-bottom: 1px solid #d4d4d4; 
        list-style-type: none !important;
        margin:0px;
        padding:0px;

    }
    .popup .close:hover {
        color:#0554a4;
    }
    .ui-helper-hidden-accessible {
        display: none;
    }/*
    .alert-danger {
    color: red !important;
    background: none !important;
    border: none !important;
}
    */
    @media (min-width: 768px){
        .form-inline .form-control {
            display: inline-block;
            width: 100%;
            vertical-align: middle;
        }
    }
    .mapdiv {
        border-radius: 4px 4px 0 0;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 15px 1px rgba(208, 201, 243, .5); 
        /*border-right: none;*/
        /*box-shadow: -6px 1px 7px -1px rgba(208, 201, 243, .5);*/
    }
    .mapdiv span strong{
        cursor: pointer;
    }
    .latlong{
        width:55%;
        float:right;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }

</style>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h4>Asset Routing</h4>
        </div>
        <div class="title_right">
            <div class="pull-right"> 
                <a href="<?php echo base_url('Dashboard'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back To Dashboard</a>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content" id="">
                    <!--<div class="row">-->
                    <form class="form-inline form-label-left" action="<?php echo base_url() ?>asset_routing" method="POST" id="asset_routing">
                        <div class="">                            
                            <label class="control-label col-md-1 col-sm-2 col-xs-6">Asset Name</label>
                            <div class="col-md-4">                
                                <input type="text" name="asset_name" id="asset_name" class="form-control ui-autocomplete-input" value="<?php echo set_value('asset_name'); ?>" class="form-control" placeholder="Asset Name" required>
                                <div id="autocomplete-container" style=""></div>
                                <input type="hidden" name="asset_id" id="asset_id" value="">
                            </div>
                        </div>
                        <div class="">
                            <label class="control-label col-md-1 col-sm-2 col-xs-6">Customer Location</label>
                            <div class="col-md-4">        
                                <select name="assetlocation" class="form-control" id="assetlocation" required>
                                    <option value="">Select Location</option>
                                    <?php
                                    if (isset($location) && !empty($location)) {
                                        foreach ($location as $l) {
                                            ?>
                                            <option value="<?php echo $l['id']; ?>" <?php echo set_value('assetlocation') == $l['id'] ? 'selected' : ''; ?>><?php echo $l['location_name']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <!--<input type="text" name="assetlocation" value="<?php echo set_value('assetlocation'); ?>" class="form-control" placeholder="Asset Location">-->
                            </div>
                        </div>                      
                        <div class="">
                            <div class="col-md-2">                                
                                <button type="submit" id="asset_route_button" class="btn btn-primary btn-block">Filter</button>                                
                            </div>
                            <!--                            <div class="col-md-1">  
                                                            <button type="button" id="asset_route_reset" class="btn btn-primary btn-block">Clear</button>                                
                                                        </div>-->
                        </div>                      
                    </form>
                    <!--</div>-->
                    <!--<div class="row">-->
                    <!--if not any address found then show current system location-->
                    <?php
                    $getloc = json_decode(file_get_contents("http://ipinfo.io/"));
                    $coordinates = explode(",", $getloc->loc); // -> '32,-72' becomes'32','-72'
                    $ukey['fse_lat'] = ($coordinates[0]) ? $coordinates[0] : '18.573231';
                    $ukey['fse_long'] = ($coordinates[1]) ? $coordinates[1] : '73.774824';
                    ?>
                    <!--end if not any address found then show current system location-->

                    <!--</div>-->

                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="map-frame">

                <?php
//                $userdetail = array();
//                $cntl = 1;
//                $tsk_status = '';
//                $ukey['id'] = '11';
//                $ukey['fse_name'] = 'India';
//                $k = 1;
//           if(count($userdetail)>0 && $userdetail){ $cntl=0; 
//            foreach ($userdetail as $k => $ukey){ 
//                if($ukey['fse_lat']&&$ukey['fse_long']){ $cntl=1; }} 
//                if($cntl==1){ 
                ?>
                <script type="text/javascript">
                    var map;
                            function initMap() {
<?php
if (count($assets) > 0) {
    foreach ($assets as $k => $ukey) {
        if ($ukey['lat'] && $ukey['long']) {
            if ($ukey['status'] == 1) {
                $style = "color:green";
            }
            ?>
                                        var broadway_<?php echo $k ?> = {
                                        info: '<span onclick=getdetail(<?php echo $ukey['assetid']; ?>)><strong style="<?php echo $style; ?>"><?php echo trim($ukey['code']); ?></strong></span><br><?php echo (isset($ukey['location'])) ? $ukey['location'] : ''; ?>',
                                                lat: <?php echo $ukey['lat']; ?>,
                                                long: <?php echo $ukey['long']; ?>
                                        };
            <?php
        }
    }
}
?>

                            var locations = [
<?php
if (count($assets) > 0) {
    foreach ($assets as $k => $ukey) {
        if ($ukey['lat'] && $ukey['long']) {
            ?>
                                        [broadway_<?php echo $k ?>.info, broadway_<?php echo $k ?>.lat, broadway_<?php echo $k ?>.long, <?php echo $k ?>],
            <?php
        }
    }
}
?>
                            ];
                                    var map = new google.maps.Map(document.getElementById('map'), {
<?php if (isset($filters)) { ?> zoom: 10,<?php } else { ?>   zoom: 10, <?php } ?>

<?php
$cunt = 0;
if (count($assets) > 0) {
    foreach ($assets as $k => $ukey) {
        if ($ukey['lat'] && $ukey['long'] && $cunt != 1) {
            $cunt = 1;
            ?>
                                                center: new google.maps.LatLng(<?php echo $ukey['lat']; ?>, <?php echo $ukey['long']; ?>),
            <?php
        }
    }
}
?>

                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });
                                    var infowindow = new google.maps.InfoWindow({});
                                    var marker, i;
                                    for (i = 0; i < locations.length; i++) {
                            marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    map: map
                            });
                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                    infowindow.setContent(locations[i][0]);
                                            infowindow.open(map, marker);
                                    }
                                    })(marker, i));
                            }

                            }
                </script>
                <?php // } }        ?> 
            </div>
        </div>
        <!-- Start--static map code for reference-->       
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div style="" class="mapdiv">
                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="rgt_col scrollbar" id="style-2" style="display:none;"> 
                <button type="button" class="btn btn-xs btn-danger pull-right" data-dismiss="this" aria-label="Close" onclick="$('.rgt_col').hide();">
                    <span aria-hidden="true">&times; </span>
                </button>
                <div id="usertask" style="margin-top: 25px;"> 
                    <?php // $this->load->view('usertasklist');      ?> 
                </div>
            </div>
        </div>
    </div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_API_KEY ?>&callback=initMap"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script>

                            function getdetail(id){
//                            $(".scrollbar").css('display', 'block');
                            var id = id;
                                    var BASE_URL = "<?php echo base_url(); ?>";
                                    $.ajax({
                                    type:'POST',
                                            url:BASE_URL + 'AssetsManagement/shawtask',
                                            data:{'id':id},
                                            success:function(data){
                                            $('#usertask').html(data);
                                                    $(".scrollbar").css('display', 'block');
                                            }
                                    });
                            }
</script> 
<script type="text/javascript">
    $(function () {
    $("#asset_name").autocomplete({
//                            alert("data");
    source: function (request, response) {
    $.ajax({
    url: "<?php echo base_url(); ?>AssetsManagement/get_asset_autocomplete",
            dataType: "json",
            type: "POST",
            data: request,
            success: function (data) {
            response(data);
                    $("#assetlocation").attr('disabled', 'disabled')
            }
    });
    },
            focus: function (event, ui) {
            $("#asset_name").val(ui.item.label);
                    return false;
            },
            select: function (event, ui) {
            $('#asset_id').val(ui.item.key);
                    $("#asset_name").val(ui.item.label);
                    $('#assetlocation').val('');
                    return false;
            },
            change: function (e, u) {
            if (u.item == null) {
            $(this).val("");
                    return false;
            }
            },
            appendTo: '#autocomplete-container',
            minLength: 1
    });
    });</script>
<script>
            $(document).ready(function(){
//    if ($("#asset_name").val().length > 0){
//    $("#assetlocation").attr('disabled', 'disabled');
//    } else if ($("#assetlocation").val().length > 0){
//    $("#asset_name").attr('disabled', 'disabled');
//    }

    $("#asset_name").change(function(){
    $('#assetlocation').val('');
            $("#assetlocation").attr('disabled', 'disabled');
    });
            $("#assetlocation").change(function(){
    $("#asset_name").val("");
            $("#asset_name").attr('disabled', 'disabled');
    });
            $("#asset_route_reset").click(function(){
    $('#assetlocation').val('');
            $("#asset_name").val("");
            $("#assetlocation").removeAttr('disabled');
            $("#asset_name").removeAttr('disabled');
    });
    });
</script>