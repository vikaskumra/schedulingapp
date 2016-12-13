@include('common/header')
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Customer Developments</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal']) !!}
           
              <div class="box-body">
			     
                <div class="form-group">
                  <label for="development_name" class="col-sm-2 control-label">Development Title:</label>
                  <div class="col-sm-10">
                    
					<input type="text" value="{{$dev->development_name}}" class="form-control" name="development_name" id="development_name" placeholder="Development Title" />
                    
				  </div>
                </div>   
				
				<div class="form-group">
                  <label for="customer" class="col-sm-2 control-label">Customer:</label>
                  <div class="col-sm-10">
                    <select <?php if(!empty($dev->customer_id)){echo 'disabled';} ?> onchange="loadLocation(this)" class="form-control" name="customer" id="customer">
					@foreach($customer as $customers)
					<option <?php if($customers->id == $dev->customer_id){echo 'selected ';}?> value="{{$customers->id}}">{{$customers->first_name}} {{$customers->last_name}}</option>  
					@endforeach
					</select> 
                  </div>
                </div>
				<div class="form-group">
                  <label for="location" class="col-sm-2 control-label">location:</label>
                  <div class="col-sm-10">
                    <select onchange="loadProjectManager(this)" class="form-control" name="location" id="location">			
					@foreach($locations as $location)
					<option <?php if($location->location_id == $dev->location_id){echo 'selected';} ?> value="$location->location_id">{{$location->location_title}}</option>  
                    @endforeach					
					</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="development_address" class="col-sm-2 control-label">Development Address:</label>
                  <div class="col-sm-10">
                    <input type="text" value="" required class="form-control" name="development_address" id="development_address" placeholder="Development Address" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="project_manager" class="col-sm-2 control-label">Project Manager:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="project_manager" id="project_manager">
					  <option>Select Project Manager</option>
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
function loadLocation(event){
	console.log(event.value);   
    var location = document.getElementById('location');	  
	var project_manager = document.getElementById('project_manager');  
	var address = document.getElementById('development_address');  
	
	 
	
	$.get('/user/getcustomerlocation/'+ event.value , function(data, status){
		     var locations = JSON.parse(data);  
			 console.log(locations);  
             $("#location option").remove();  
             $("#project_manager option").remove();			 
             var option = document.createElement('option');   	        				  
            option.text = 'Select Location';
			 location.add(option); 			 
		for (i=0; i<locations.location.length; i++){  
		   var option = document.createElement('option');   	        				  
            option.text = locations.location[i].location_title;
            option.value = locations.location[i].location_id;   
          	location.add(option); 
            address.value = locations.location[i].street_address;			
		}    

      for(j=0;j<locations.project_manager.length;j++){
		  var manageOptions = document.createElement('option');
		  project_manager.options[j] = null; 
		  manageOptions.text = locations.project_manager[j].first_name + locations.project_manager[j].last_name; 
	      manageOptions.value = locations.project_manager[j].id; 
          project_manager.add(manageOptions);	
          //project_manager.options[project_manager.selectedIndex].value = 30; 		  
	  }		
		
		
	}); 
}  

function loadProjectManager(event){
	console.log(event.value);  
	var project_manager = document.getElementById('project_manager'); 
	$.get('/user/getlocationid/'+ event.value, function(data){
		   var project = JSON.parse(data); 
           for(i=0;i<project.length;i++){  
               var manage = project[i].project_manager
            $('#project_manager option[value='+manage+ ']').attr('selected', 'selected');	   
            
		   }		   
		   
	});
}
</script>
@include('common/footer')