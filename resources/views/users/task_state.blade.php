@include('common/header')
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Task Phase</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal']) !!}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="task_title" class="col-sm-2 control-label">Phase Title:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$state->task_state_name}}" required class="form-control" name="phase_title" id="phase_title" placeholder="Task Name" />
                  </div>
                </div>


                <div class="form-group">
                  <label for="task_type" class="col-sm-2 control-label">Phase Color:</label>

                  <div class="col-sm-10">
                   <input type="color" value="{{$state->task_state_color}}" required class="form-control" name="phase_color" id="phase_color" placeholder="Task Name" />
               
                  </div>
                </div>

          

                <div class="form-group">
                  <label for="task_comments" class="col-sm-2 control-label">Notes:</label>

                  <div class="col-sm-10">
                    <textarea  value="{{$state->task_state_note}}" class="form-control" name="phase_note" id="task_comments" placeholder="optional"></textarea>
                  </div>
                </div>
		      		<input type="hidden" name="task_id" value="">
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