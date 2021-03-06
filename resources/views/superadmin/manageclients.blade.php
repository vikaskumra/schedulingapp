@include('common/header')
@include('common/superadminheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Clients</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal']) !!}  
			<fieldset>
             <legend>Company Info:</legend>
             <input type="hidden" value="{{$owners->id}}" name="id">
              <div class="box-body">
                <div class="form-group">
                  <label for="companyName" class="col-sm-2 control-label">Company Name:</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{$owners->company_name}}" required class="form-control" name="company_name" id="companyName" placeholder="Company Name">
                  </div>
                </div>                  
				
				<div class="form-group">
				  <label for="companyType" class="col-sm-2 control-label">Trades</label>
                  <div class="col-sm-10">
				  <select multiple required name="company_trade[]" class="form-control">
				 
					@foreach($trades as $trade)
					    <option <?php 
							if(in_array($trade->trade_id, $company_trades ))
							{
								  echo 'selected';
							}
						?> value="{{$trade->trade_id}}"  >{{$trade->trade_title}}</option>  
				  	@endforeach
                  </select>
                </div>
				</div>  												
				<div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address:</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{$owners->address}}" required class="form-control" name="address" id="address" placeholder="Address">
                  </div>
                </div>
				<div class="form-group">
                  <label for="city" class="col-sm-2 control-label">City:</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{$owners->city}}" required class="form-control" name="city" id="city" placeholder="City">
                  </div>
                </div>
				<div class="form-group">
                  <label for="state" class="col-sm-2 control-label">State:</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{$owners->state}}" required class="form-control" name="state" id="state" placeholder="State">
                  </div>
                </div>
				<div class="form-group">
                  <label for="country" class="col-sm-2 control-label">Country:</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{$owners->country}}" required class="form-control" name="country" id="country" placeholder="Country">
                  </div>
                </div>
				<div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">Phone:</label>

                  <div class="col-sm-10">
                    <input type="tel" value="{{$owners->phone}}" required class="form-control" name="phone" id="phone" placeholder="Phone">
                  </div>
                </div>  
				</fieldset>  
				<fieldset>
				  <legend>User Info</legend> 
				  
				 
				@if(($owners->id) == 0)
					<div class="form-group">
                  <label for="firstName" class="col-sm-2 control-label">First Name:</label>

                  <div class="col-sm-10">
				      
                    <input type="text" value="" required class="form-control" name="first_name" id="firstName" placeholder="First Name">
                  </div>
                </div>
				<div class="form-group">
                  <label for="lastName" class="col-sm-2 control-label">Last Name:</label>

                  <div class="col-sm-10">
                    <input type="text" value="" required class="form-control" name="last_name" id="lastName" placeholder="Last Name">
                  </div>
                </div>  
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email:</label>

                  <div class="col-sm-10">
                    <input type="email" value="" required class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                </div>
				@else
				
				
				<div class="form-group">
                  <label for="firstName" class="col-sm-2 control-label">First Name:</label>

                  <div class="col-sm-10">
				      
                    <input type="text" value="{{$owners->first_name}}" required class="form-control" name="first_name" id="firstName" placeholder="First Name">
                  </div>
                </div>
				<div class="form-group">
                  <label for="lastName" class="col-sm-2 control-label">Last Name:</label>

                  <div class="col-sm-10">
                    <input type="text" value="{{$owners->last_name}}" required class="form-control" name="last_name" id="lastName" placeholder="Last Name">
                  </div>
                </div>  
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email:</label>

                  <div class="col-sm-10">
                    <input type="email" value="{{$owners->email}}" required class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                </div>  
				
				@endif
				
				
				
				@if($owners->id == 0)
					      
						  <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password:</label>

                  <div class="col-sm-10">
                    <input type="password" value="" required class="form-control" name="password" id="password">
                    				@foreach($errors->all() as $error)
		   
					<span class="help-block">{{$error}}</span>
					@endforeach
				  </div>
                </div>
				<div class="form-group">
                  <label for="confpass" class="col-sm-2 control-label">Confirm Password:</label>

                  <div class="col-sm-10">
                    <input type="password" value="" required class="form-control" name="confpass" id="confpass">
                  </div>
                </div>
				 
				
				@else
					   <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password:</label>

                  <div class="col-sm-10">
                    <input type="password" value=""  class="form-control" name="password" id="password">
                  </div>
                </div>
				<div class="form-group">
                  <label for="confpass" class="col-sm-2 control-label">Confirm Password:</label>

                  <div class="col-sm-10">
                    <input type="password" value=""  class="form-control" name="confpass" id="confpass">
                  </div>
                </div>
					@endif
				
				
				
				</fieldset>

              {!! csrf_field() !!}
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            {!! Form::close() !!}
          </div>
            
            </div>
            <!-- ./box-body -->
        
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>

@include('common/superadminfooter')
@include('common/footer')