@include('common/header')
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Development / Subdivision</h3>
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
					<option>Select Customer</option>
					@foreach($customer as $customers)
					<option <?php if($customers->id == $dev->customer_id){echo 'selected ';}?> value="{{$customers->id}}">@if(!empty($customers->company_name)){{$customers->company_name}}@else{{$customers->first_name}} {{$customers->last_name}}@endif</option>  
					@endforeach
					</select> 
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="development_address" class="col-sm-2 control-label">Development Address:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$dev->development_address}}" required class="form-control" name="development_address" id="development_address" placeholder="Development Address" />
                  </div>
                </div>
				<div class="form-group">
                  <label for="project_manager" class="col-sm-2 control-label">Project Manager:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="project_manager" id="project_manager">
					  @if(!empty($project_manager))
					  @foreach($project_manager as $manager)
					  <option <?php if($manager->id == $dev->project_manager){echo 'selected';} ?> value="{{$manager->id}}">{{$manager->first_name}} {{$manager->last_name}}</option> 
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
function loadLocation(event){
	console.log(event.value);   
     
	var project_manager = document.getElementById('project_manager');  
	var address = document.getElementById('development_address');  
	
	 
	
	$.get('/user/getcustomerlocation/'+ event.value , function(data, status){
		     var locations = JSON.parse(data);  
			 console.log(locations);  
               
             $("#project_manager option").remove();			 
              			 
		

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