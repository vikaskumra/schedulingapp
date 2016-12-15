@include('common/header')
@include('common/userheader')
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Task Type</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			{!! Form::open(['class'=>'form-horizontal']) !!}
           
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">Role Title:</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$data->tasktype_title}}" required class="form-control" name="role_title" id="role_title" placeholder="Role Title" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="notes" class="col-sm-2 control-label">Notes:</label>

                  <div class="col-sm-10">
                    <textarea  class="form-control" name="role_notes" id="role_notes" placeholder="Notes.">{{$data->comments}}</textarea>
                  </div>
                </div>
				<input type="hidden" name="roles_id" value="{{$data->tasktypes_id}}">
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