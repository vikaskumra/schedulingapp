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
                  <label for="company" class="col-sm-2 control-label">Company</label>
                  <div class="col-sm-10">
				  <select class="form-control">
				    @foreach($company as $userCompany)
                    <option>{{$userCompany->company_name}}</option>
					@endforeach
                  </select>
				  </div>
                </div>
				<div class="form-group">
                  <label for="user_roles" class="col-sm-2 control-label">User role</label>
                  <div class="col-sm-10">
				  <select name="user_roles" id="user_roles" class="form-control">
				    @foreach($roles as $role)
                    <option value="{{$role->roles_id}}">{{$role->role_title}}</option>
					@endforeach
                  </select>
				  </div>
                </div>
                <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">First Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="" required class="form-control" name="first_name" id="first_name" placeholder="First Name" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label">Last Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="" required class="form-control" name="last_name" id="last_name" placeholder="Last Name" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" value="" required class="form-control" name="email" id="email" placeholder="Email" />
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