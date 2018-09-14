<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Masters
$route['assetcategory'] = "Master/AssetMaster/assetcategory";
$route['addAssetCategory'] = "Master/assetmaster/add_asset_category";
$route['updateAssetCategory'] = "Master/assetmaster/assetcategory_update";

$route['assettype'] = "Master/assetmaster/assettype";
$route['addAssetType'] = "Master/assetmaster/add_asset_type";
$route['updateassettype'] = "Master/assetmaster/assettype_update";

$route['sensortype'] = "Master/sensormaster/sensortype";
$route['addSensorType'] = "Master/sensormaster/add_sensor_type";
$route['updateSensorType'] = "Master/sensormaster/sensortype_update";

$route['parameterlist'] = "Master/parametermaster/parameterlist";
$route['addParameter'] = "Master/parametermaster/add_parameter";
$route['updateParameter'] = "Master/parametermaster/parameter_update";

$route['uomlist'] = "Master/uommaster/uomlist";
$route['addUomList'] = "Master/uommaster/add_uom_list";
$route['updateUomList'] = "Master/uommaster/uomlist_update";


//Assets Management--------------------
$route['Assets_list'] = 'AssetsManagement/Asset_List';
$route['Assets_add'] = 'AssetsManagement/Assets_add';
$route['Assets_location_list'] = 'AssetsManagement/Assets_location_list';

$route['Assets_edit'] = 'AssetsManagement/Asset_edit';
$route['manage_assets_location'] = 'AssetsManagement/manage_assets_location';
$route['user_asset_edit'] = 'AssetsManagement/user_asset_edit';

$route['Assets_location_add'] = 'AssetsManagement/Assets_location_add';
$route['User_assets_list'] = 'AssetsManagement/User_assets_list';
$route['User_asset_add'] = 'AssetsManagement/User_asset_add';
$route['User_asset_edit'] = 'AssetsManagement/User_asset_edit';

//Asset Parameter
$route['asset_parameter_range_list'] = 'AssetsManagement/asset_parameter_range_list';
$route['asset_parameter_add'] = 'AssetsManagement/asset_parameter_add';
$route['asset_parameter_update'] = 'AssetsManagement/asset_parameter_update';

//Asset Trigger
$route['trigger_list'] = 'AssetsManagement/trigger_list';
$route['trigger_add'] = 'AssetsManagement/trigger_add';
$route['trigger_update'] = 'AssetsManagement/trigger_add';


//-- Customer 
$route['AddCustomer'] = 'Customer/AddCustomer';


//-- Inventory
//------ * Device Inventory * --------
//Edit_deviceinventory,--Device_inventory_list,--Device_inventory_add
$route['Device_inventory_list'] = 'Inventory/Device_inventory_list';
$route['Device_inventory_add'] = 'Inventory/Add_deviceinventory';
$route['Device_inventory_edit'] = 'Inventory/Edit_deviceinventory';

//------ * device asset list * --------
//Device_assets_add(),Device_assets_edit
$route['Device_assets_list'] = 'Inventory/Device_assets_list';
$route['Device_assets_add'] = 'Inventory/Device_assets_add';
$route['Device_assets_edit'] = 'Inventory/Device_assets_edit';
//------ * Sensor Inventory * --------
//Add_device_sensors,Edit_device_sensors,Sensor_inventory_list
$route['Device_sensor_list'] = 'Inventory/Device_sensor_list';
$route['Add_device_sensors'] = 'Inventory/Add_device_sensors';
$route['Edit_device_sensors'] = 'Inventory/Edit_device_sensors';


$route['Add_sensor_inventory'] = 'Inventory/add_sensor_inventory';
$route['Sensor_inventory_list'] = 'Inventory/Sensor_inventory_list';





