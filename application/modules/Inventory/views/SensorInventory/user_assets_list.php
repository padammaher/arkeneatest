         <div class="">
            <div class="page-title">
              <div class="title_left">
                <h4>Asset-User Management</h4>
              </div>

              <div class="title_right">
                <div class="pull-right">
                    <a href="<?php echo base_url('User_asset_add');?>" class="btn btn-sm btn-primary">Add New</a>
                 <a href="<?php echo base_url('Assets_list');?>" class="btn btn-sm btn-primary">Asset Management</a>
                 <a href="<?php echo base_url('Assets_location_list');?>" class="btn btn-sm btn-primary">Asset Location</a>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    
					<div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <ul class="flex-container flex-container-head nowrap">
								
								<li class="flex-item">Asset Code</li>
                 <li class="flex-item">User Name</li>
							
									<li class="flex-item">Actions</li>
								</ul>
                        </div>
                        </div>
						
						<div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<ul class="flex-container nowrap">
								   <li class="flex-item">DG0001</li>
                              <li class="flex-item">Saschin Naidoo</li>
                              
                         
									<li class="flex-item">
										
										<a href="<?php echo base_url('User_asset_edit'); ?>" title="Edit">
											 <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                    </a>
                    <a href="#" title="Delete">
                      <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                    </a> 
									</li>
								</ul>
							</div>
                        </div>

                        <div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<ul class="flex-container nowrap">
								  <li class="flex-item">DG0002</li>
                              <li class="flex-item">Pankaj Shelke</li>
                              
                          
								   <li class="flex-item">
										<a href="<?php echo base_url('User_asset_edit'); ?>" title="Edit">  
										 <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                    </a>
                    <a href="#" title="Delete">
                      <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                    </a> 
									</li>
								</ul>
							</div>
                        </div>	


                        <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="flex-container nowrap">
                  <li class="flex-item">DG0003</li>
                              <li class="flex-item">Paresh Kamat</li>
                              
                          
                   <li class="flex-item">
                    <a href="<?php echo base_url('User_asset_edit'); ?>" title="Edit">  
                     <i class="fa fa-pencil blue" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                    </a>
                    <a href="#" title="Delete">
                      <i class="fa fa-trash red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> 
                    </a> 
                  </li>
                </ul>
              </div>
                        </div>  
					
					
                  </div>
                </div>
              </div>
            </div>
			

          </div>
<?php $this->load->view('modal/user_asset_list_modal') ?>