@include('common/header')
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage TeamMember</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal']) !!}
           
              <div class="box-body">
			     
                <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">First Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$user->first_name}}" required class="form-control" name="first_name" id="first_name" placeholder="First Name" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label">Last Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$user->last_name}}" required class="form-control" name="last_name" id="last_name" placeholder="Last Name" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" value="{{$user->email}}" required class="form-control" name="email" id="email" placeholder="Email" />
                  </div>
                </div>  
                 <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password:</label>
                  <div class="col-sm-10">
                    <input type="password" value="" required class="form-control" name="password" id="password" placeholder="" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="confpass" class="col-sm-2 control-label">Confirm Password:</label>
                  <div class="col-sm-10">
                    <input type="password" value="" required class="form-control" name="confpass" id="confpass" placeholder="" />
                  </div>
                </div>  				
				<input type="hidden" name="roles_id" value="">
              {!! csrf_field() !!}
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default btn-back">Cancel</button>
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
 
@include('common/userfooter')
@include('common/footer')