<?php
if (isset($assetdetails)) {
    foreach ($assetdetails as $asset) {
        ?> 
        <div class="card" id="usertask">
            <div class="ctask">
                <div class="">
                    <p>Asset Name</p> 
                    <h4 style="width:45%;float:left;margin-top: 5px;margin-bottom: 5px;"><b><?php echo (isset($asset['code'])) ? $asset['code'] : ''; ?></b></h4><h6 class="latlong"><b>lat: </b><?php echo isset($asset['lat']) ? $asset['lat'] : ''; ?><br><b>long: </b><?php echo isset($asset['lng']) ? $asset['lng'] : ''; ?></h6> 
                </div>
                <p style="margin-top:15%;">Asset Type: <?php echo (isset($asset['assettype'])) ? $asset['assettype'] : 'Asset Type not added'; ?></p>
                <div class="tskhld">
                    <h5>Current Status</h5>
                    <hr>
                    <h5>Device <?php echo (isset($asset['code'])) ? '(' . $asset['number'] . ')' : ''; ?> Status</h5>
                    <p class="green"><?php echo isset($asset['status']) && $asset['status'] == 1 ? 'Active' : 'IN-Active'; ?></p>
                    <hr>
                    <?php echo (isset($asset['parameter_p1'])) ? '<h5>' . $asset['parameter_p1'] . '</h5>' : ''; ?>
                    <?php
                    if (isset($asset['p1']) && !empty($asset['p1'])) {
                        $class = "";
                        if (isset($asset['parameter_green1'], $asset['parameter_orange1']) && ($asset['p1'] >= $asset['parameter_green1'] && $asset['p1'] < $asset['parameter_orange1'])) {
                            $class = "green";
                        } elseif (isset($asset['parameter_red1'], $asset['parameter_orange1']) && ($asset['p1'] >= $asset['parameter_orange1'] && $asset['p1'] < $asset['parameter_red1'])) {
                            $class = "orange";
                        } elseif (isset($asset['parameter_red1']) && $asset['p1'] >= $asset['parameter_red1']) {
                            $class = "red";
                        } else {
                            $class = "red";
                        }
                    }
                    ?>
                    <p class="<?php echo isset($class) ? $class : ''; ?>">

                        <?php
                        echo $asset['p1'] . " ";
                        echo isset($asset['parameter_unit1']) ? $asset['parameter_unit1'] : '';
//                        if (isset($asset['parameter_unit1'])) {
//                            echo " (";
//                            $count = count($asset['parameter_unit1']);
//                            foreach ($asset['parameter_unit1'] as $unit) {
//                                echo $unit;
//                                if ($count > 1) {
//                                    echo ",";
//                                    $count--;
//                                }
//                            }
//                            echo ")";
//                        }
                        ?>
                    </p>
                    <hr>
                    <?php echo (isset($asset['parameter_p2'])) ? '<h5>' . $asset['parameter_p2'] . '</h5>' : ''; ?>
                    <p class="green">
                        <?php
                        echo $asset['p2'] . " ";
                        echo isset($asset['parameter_unit2']) ? $asset['parameter_unit2'] : '';
                        ?>
                    </p>
                    <hr>
                    <?php echo (isset($asset['parameter_p3'])) ? '<h5>' . $asset['parameter_p3'] . '</h5>' : ''; ?>
                    <p class="green">
                        <?php
                        echo $asset['p3'] . " ";
                        echo isset($asset['parameter_unit3']) ? $asset['parameter_unit3'] : '';
                        ?>
                    </p>
                    <hr>
                    <?php echo (isset($asset['parameter_p4'])) ? '<h5>' . $asset['parameter_p4'] . '</h5>' : ''; ?>
                    <p class="green">
                        <?php
                        echo $asset['p4'] . " ";
                        echo isset($asset['parameter_unit4']) ? $asset['parameter_unit4'] : '';
                        ?>
                    </p>
                    <hr>
                    <?php echo (isset($asset['parameter_p5'])) ? '<h5>' . $asset['parameter_p5'] . '</h5>' : ''; ?>
                    <p class="green">
                        <?php
                        echo $asset['p5'] . " ";
                        echo isset($asset['parameter_unit5']) ? $asset['parameter_unit5'] : '';
                        ?>
                    </p>
                </div>
            </div> 
        </div>
        <script>
            function growDiv(div, divid) {
                growDiv1 = document.getElementById(div + '' + divid);
                if (growDiv1.clientHeight) {
                    growDiv1.style.height = 0;
                } else {
                    var wrapper = document.querySelector('.measuringWrapper' + divid);
                    growDiv1.style.height = wrapper.clientHeight + "px";
                }
                setInterval(function () {
                    growDiv1.style.height = 0
                }, 3000);
                return;
            }
        </script>

        <?php
    }
}
?> 

