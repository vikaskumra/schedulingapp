@include('common/header')
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Contacts</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal']) !!}
           
              <div class="box-body">
			     
                
				<div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">First Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$contact->first_name}}" required class="form-control" name="first_name" id="first_name" placeholder="First Name" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label">Last Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$contact->last_name}}" required class="form-control" name="last_name" id="last_name" placeholder="Last Name" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email:</label>
                  <div class="col-sm-10">
                    <input type="email" value="{{$contact->email}}" required class="form-control" name="email" id="email" placeholder="Email" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="phone" class="col-sm-2 control-label">Phone:</label>
                  <div class="col-sm-10">
                    <input type="tel" value="{{$contact->phone}}" required class="form-control" name="phone" id="phone" placeholder="Phone" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Role:</label>
                  <div class="col-sm-10">
                    <select multiple required class="form-control" name="role[]" id="role">
					@if($contact->role_title != '')
						@foreach($contacts as $contact)
					<option value="" selected>{{$contact->role_title}}</option>  
				       @endforeach
					@else
					@foreach($roles as $role)
					<option value="{{$role->roles_id}}">{{$role->role_title}}</option>
					@endforeach 
					@endif
					</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="comm_preference" class="col-sm-2 control-label">Communication Preference:</label>
                  <div class="col-sm-10">
                    <select required class="form-control" name="comm_preference" id="comm_preference">
					<option>text</option>
					<option>email</option>
					</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="notes" class="col-sm-2 control-label">Notes:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$contact->notes}}"  class="form-control" name="notes" id="notes" placeholder="Notes" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label">Password:</label>
                  <div class="col-sm-10">
                    <input type="password" value="" required class="form-control" name="password" id="password" placeholder="Password" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="last_name" class="col-sm-2 control-label">Confirm Password:</label>
                  <div class="col-sm-10">
                    <input type="password" value="" required class="form-control" name="confpass" id="confpass" placeholder="Confirm Password" />
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