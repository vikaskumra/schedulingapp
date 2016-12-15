@include('common/header')  
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Project</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal']) !!}
           
              <div class="box-body">
			     
                <div class="form-group">
                  <label for="customer" class="col-sm-2 control-label">Select Customer:</label>
                  <div class="col-sm-10">
                    <select <?php if(!empty($customer_location->customer_id)){echo 'disabled ';} ?>onchange="loadContacts(this)"  value="" class="form-control" name="customer" id="customer">
					  <option>Select Customer</option>
					  @foreach($customers as $customer)
					  <option <?php if($customer->id == $customer_location->customer_id){ echo 'selected';} ?> value="{{$customer->id}}">@if(!empty($customer->company_name)){{$customer->company_name}}@else{{$customer->first_name}} {{$customer->last_name}}@endif</option>
					  @endforeach
					</select>  			
                  </div>
                </div>  
				<div class="form-group">
                  <label for="location_title" class="col-sm-2 control-label">Lot / Subdivisions:</label>
                  <div class="col-sm-3">
                    <input type="text" value="{{$customer_location->lot_number}}" class="form-control" name="lot_number" id="lot_number" placeholder="Lot Number" />
                  </div> 
				  <div class="col-sm-7">
                    <select onchange="loadProjectmanager(this)"  class="form-control" name="subdivision" id="subdivision" >
					 <option>Select Subdivision</option> 
					 @foreach($subdivisions as $subdivision)
					 <option <?php if($subdivision->development_id == $customer_location->subdivision){echo 'selected';} ?> value="{{$subdivision->development_id}}">{{$subdivision->development_name}}</option>
					 @endforeach
					</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Street Address:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$customer_location->street_address}}" required class="form-control" name="street_address" id="street_address" placeholder="Street Address" />
                  </div>
                </div> 
				<div class="form-group">
                  <label for="notes" class="col-sm-2 control-label">Project Manager:</label>
                  <div class="col-sm-10">
                    <select  value="" class="form-control" name="project_manager" id="project_manager">
					  
					  <option value="">Select Contacts</option> 
					  @if(!empty($customer_location->project_manager))
					  @foreach($contacts as $contact)
				     <option <?php if($contact->id == $customer_location->project_manager){echo 'selected';}?> value="{{$contact->id}}">
					   {{$contact->first_name}} {{$contact->last_name}} 
					</option>
					@endforeach 
					  @endif
					</select>
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
<script type="text/javascript">
function loadContacts(event){
	console.log(event.value);   
	var select  = document.getElementById('project_manager');  
	
	
	$.get("/user/viewcustomercontacts/"+event.value, function(data, status){
        
        		var contact = JSON.parse(data);	 
                $('#project_manager option').remove();				
		for(i=0; i<contact.length; i++){  
			var option = document.createElement( 'option' );
			option.text = contact[i].first_name +" "+contact[i].last_name;
				option.value = contact[i].id;
				select.add(option);
		}  
    });
}  


function loadProjectmanager(event){
	  
	$.get('/user/subdivisionmanager/'+event.value, function(data){
		
		var division = JSON.parse(data); 
		
		for(i=0;i<division.length;i++){  
               var project_manager = division[i].project_manager
            $('#project_manager option[value='+project_manager+ ']').attr('selected', 'selected');	   
            
		   }	
	});
}
</script>
@include('common/footer')