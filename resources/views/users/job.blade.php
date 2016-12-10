@include('common/header')
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal']) !!}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="job_title" class="col-sm-2 control-label">Job Title:</label>
                  <div class="col-sm-10">
                    <input type="text" value="" required class="form-control" name="job_title" id="job_title" placeholder="Role Title" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description:</label>

                  <div class="col-sm-10">
                    <textarea  class="form-control" name="description" id="description" placeholder="Notes."></textarea>
                  </div>
                </div>  

              	 


                 <div class="table-responsive">
                       <table id="myTable" class="table">
    <th>Task Title</th>
	<th>Task Notes</th>
    <th>Task Type</th>
    <th>Role</th>
    <th>User</th>
    <th>Add</th>
    <tr>
        <td>
            <input class="form-control" type="text" id="task" name="task_title[]" placeholder="Task Title" />
        </td>
		<td>
            <input class="form-control" type="text" id="note" name="task_notes[]" placeholder="Task Notes" />
        </td>
        <td>
            <select class="form-control" id="type" name="task_type[]">
			      <option>Select Task Type</option>
			   @foreach($tasktypes as $tasktype)
			      <option  value="{{$tasktype->tasktypes_id}}">{{$tasktype->tasktype_title}}</option>
			   @endforeach
			</select>
        </td>
        <td>
            <select onchange="loadRoles(this)" name="role[]" class="form-control" id="role">
               <option>Select Roles</option>
			   @foreach($roles as $role)			  
			     <option value="{{$role->roles_id}}">{{$role->role_title}}</option>
			   @endforeach
			</select>  
        </td>
        <td>
			<select class="form-control" id="user" name="user[]"><option>Select User</option></select>
        </td>
        <td id="btnAdd" class="button-add"><i class="fa fa-plus" aria-hidden="true"></i></td>
    </tr>
</table>
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
<script>
     	
	var ctr = 1;
$('#myTable').on('click', '.button-add', function () {
    
	ctr++;
    var task = "task" + ctr;
	var note = "note" + ctr;
    var type = "type" + ctr;
    var role = "role" + ctr;
    var user = "user" + ctr;
    var newTr = '<tr>';
	    newTr+= '<td><input class="form-control" type="text" type="text" id=' + task + '  name="task_title[]" placeholder="Task Title" /></td>';
		newTr+= '<td><input class="form-control" type="text" type="text" id=' + note + '  name="task_notes[]" placeholder="Task Notes" /></td>';
	    newTr+= ' <td><select class="form-control" id=' + type + ' name="task_type[]"><option>Select Task Type</option>@foreach($tasktypes as $type)<option value="{{$type->tasktypes_id}}">{{$type->tasktype_title}}</option>@endforeach</select></td>';
	    newTr+= '<td><select onchange="loadRoles(this)" class="form-control" id=' + role + ' name="role[]" ><option>Select Role</option>@foreach($roles as $role)<option value="{{$role->roles_id}}">{{$role->role_title}}</option>@endforeach</select></td>';
		newTr+= '<td><select class="form-control" id=' + user + ' name="user[]" ><option>Select User</option></select></td>';
	    newTr+= '<td id="btnAdd" class="button-add"><i class="fa fa-plus" aria-hidden="true"></i></td>';
		newTr+= '</tr>';
    $('#myTable').append(newTr);
});
		        
 </script>  
 <script type="text/javascript">
   function loadRoles(event){
	     //console.log((event[event.selectedIndex].value));  
             var roleId = event[event.selectedIndex].value;	   
	   $.get("/user/task_roles/"+roleId, function(data, status){
        //console.log("Data: " + data + "\nStatus: " + status);  
		var users = JSON.parse(data);    
                 var userSelect = $(event).parent().next("td").children();
		
			
				  
                     userSelect.children().remove();
	        	for(var i=0; i<data.length; i++){
	   
		                
				
				var option = document.createElement("option");
				option.text = users[i].first_name +" "+users[i].last_name;
				option.value = users[i].user_id;
				userSelect.append($('<option>', {value:users[i].user_id, text:users[i].first_name +" "+users[i].last_name}));    			  
				}   	
		
    });
	   
   }
   
</script>