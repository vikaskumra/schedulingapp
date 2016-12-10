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
                  <label for="company_name" class="col-sm-2 control-label">Company Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$customer->company_name}}" class="form-control" name="company_name" id="company_name" placeholder="Optional" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$customer->address}}" required class="form-control" name="address" id="address" placeholder="Address" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="notes" class="col-sm-2 control-label">Notes:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$customer->notes}}" class="form-control" name="notes" id="notes" placeholder="Optional" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">First Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$customer->first_name}}" required class="form-control" name="first_name" id="first_name" placeholder="First Name" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label">Last Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$customer->last_name}}" required class="form-control" name="last_name" id="last_name" placeholder="Last Name" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" value="{{$customer->email}}" required class="form-control" name="email" id="email" placeholder="Email" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label">Phone:</label>
                  <div class="col-sm-10">
                    <input type="tel" value="{{$customer->phone}}" required class="form-control" name="phone" id="phone" placeholder="Phone" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">City:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$customer->city}}" required class="form-control" name="city" id="city" placeholder="Phone" />
                  </div>
                </div>
                 <div class="form-group">
                  <label for="state" class="col-sm-2 control-label">State:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$customer->state}}" required class="form-control" name="state" id="state" placeholder="Phone" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="country" class="col-sm-2 control-label">Country:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$customer->country}}" required class="form-control" name="country" id="country" placeholder="Phone" />
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