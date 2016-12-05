@include('common/header')
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Tasks</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal']) !!}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="task_title" class="col-sm-2 control-label">Task Name:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data->task_title}}" required class="form-control" name="task_title" id="task_title" placeholder="Task Name" />
                  </div>
                </div>


                <div class="form-group">
                  <label for="task_type" class="col-sm-2 control-label">Type:</label>

                  <div class="col-sm-10">
                   <select class="form-control"  name="task_type" id="task_type" required>
                      @foreach($tasktypes as $tasktype)
                      <option @if($tasktype->tasktypes_id==$data->task_type) selected @endif value="{{$tasktype->tasktypes_id}}">{{$tasktype->tasktype_title}}</option>
                      @endforeach
                    </select>
               
                  </div>
                </div>

           <!--     <div class="form-group">
                  <label for="task_type" class="col-sm-2 control-label">Role:
           
                  </label>
                  <div class="col-sm-10">
                   <select class="form-control"  name="task_type" id="task_type" required>
                      @foreach($tasktypes as $tasktype)
                      <option @if($tasktype->tasktypes_id==$data->task_type) selected @endif value="{{$tasktype->tasktypes_id}}">{{$tasktype->tasktype_title}}</option>
                      @endforeach
                    </select>
               
                  </div>
                </div>                  
          -->


                <div class="form-group">
                  <label for="task_comments" class="col-sm-2 control-label">Notes:</label>

                  <div class="col-sm-10">
                    <textarea  class="form-control" name="task_comments" id="task_comments" placeholder="Notes.">{{$data->task_comments	}}</textarea>
                  </div>
                </div>
		      		<input type="hidden" name="task_id" value="{{$data->task_id}}">
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