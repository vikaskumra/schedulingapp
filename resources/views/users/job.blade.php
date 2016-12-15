@include('common/header')
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Job Template</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal', 'id'=>'job_template']) !!}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="job_title" class="col-sm-2 control-label">Job Type:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$job->job_title}}" required class="form-control required" name="job_title" id="job_title" placeholder="Job Type" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description:</label>

                  <div class="col-sm-10">
                    <textarea required  class="form-control required" name="description" id="description" placeholder="Notes.">{{$job->job_description}}</textarea>
                  </div>
                </div>  

              	 


                 <div class="table-responsive">
                       <table id="myTable" class="table">
    <th>Task</th>
	<th>Job Phase</th>
    
    
    <th>User</th>
    <th>Add</th>
	<?php $task_id = []; ?>
    @foreach($jobs as $new)
	<?php if(!in_array($new->task_id, $task_id)):
	
	   $task_id[] =  $new->task_id; ?>
	
	
	<tr> 	
        <td>		  
		  <select  required="required" onchange="loadUsers(this)" class="form-control required" name="task_title[]" id="task">
		      <option value="">Select Task</option> 
			   
			  @foreach($tasks as $task)
			  <option <?php if($task->task_id == $new->task_id){ echo 'selected';} ?>  value="{{$task->task_id}}">{{$task->task_title}}</option>  
			  @endforeach
		   </select>
            
        </td>
		<td>
            <select  required="required" class="form-control required" name="job_phase[]" id="phase">
			  <option value="">Select Phase</option>
			  @foreach($phases as $phase)
			  <option style="background:{{$phase->task_state_color}};color:#ffffff;font-weight:bold;" value="{{$phase->task_state_id}}">{{$phase->task_state_name}}</option>  
			  @endforeach
			</select>
        </td>
   
        
        <td>
			<select  required="required" class="form-control required" id="user" name="user[]"><option value="">Select User</option></select>
        </td>
        <td id="btnAdd" class="button-add"><i class="fa fa-plus" aria-hidden="true"></i></td>
    </tr> 
	<?php endif; ?>
	@endforeach
</table>
</div>
				 
				  
  
                
				<input type="hidden" name="roles_id" value="">
              {!! csrf_field() !!}
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default btn-back">Cancel</button>
                <button type="button" onclick="checkFields()" class="btn btn-info pull-right">Submit</button>
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
	var phase = "phase" + ctr; 
    var user = "user" + ctr;
    var newTr = '<tr>';
	    newTr+= '<td><select onchange="loadUsers(this)"  class="form-control required" id=' + task + '  name="task_title[]"><option value="">Select Task</option>@foreach($tasks as $task) <option value="{{$task->task_id}}">{{$task->task_title}}</option>@endforeach</select></td>';
		
	    newTr+= ' <td><select class="form-control required" id=' + phase + ' name="job_phase[]"><option value="">Select Job Phase</option>@foreach($phases as $phase)<option style="background:{{$phase->task_state_color}}" value="{{$phase->task_state_id}}">{{$phase->task_state_name}}</option> @endforeach</select></td>';
	    
		newTr+= '<td><select class="form-control required" id=' + user + ' name="user[]" ><option value="">Select User</option></select></td>';
	    newTr+= '<td id="btnAdd" class=""><i class="fa fa-plus button-add" aria-hidden="true"></i>  &nbsp;&nbsp;&nbsp;<i class="fa fa-minus button-remove" aria-hidden="true"></i></td>';
		
		newTr+= '</tr>';

	$('#myTable').append(newTr);
});  

$('#myTable').on('click', '.button-remove', function (){
	$(this).parent().parent().remove();
});
		        
 </script>  
 <script type="text/javascript">
   function loadUsers(event){
	   //console.log(event.value);  
        var userSelect = $(event).parent().next().next().children();   
           		
	   $.get('/user/taskuser/'+event.value, function(data){  
	         $(userSelect).children().remove();
              var response = JSON.parse(data);  
              var user = response.user;			  
			    console.log(response);  
				
			for(i=0;i<response.length;i++){  
				userSelect.append($('<option>', {value:response[i].id, text:response[i].first_name + ' ' + response[i].last_name}));
			    
			}
			console.log(userSelect.filter(function(){return $(this).val() == ''}).length);
               		  
	   });
   }  
   
   
   function checkFields(){
	   var form  = document.getElementById("job_template");  
	    var submitForm = true;  
		 
		  $(".required").each(function(){
			  if($(this).val() != ''){
				  $(this).removeClass("requiredJob"); 
			  }  
			  else{
				 $(this).addClass("requiredJob"); 
				 submitForm = false; 
			  }
		  });  
		  
		  if(submitForm){
			  form.submit();
		  }
		  
   }
   
</script>