@include('common/header')
@include('common/userheader')




      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
             <h3 class="box-title">Manage Company Roles</h3>
			 <a href="{{URL::route('addteammember')}}" class="btn btn-info pull-right">Add New Member</a>
            </div>
            <!-- /.box-header -->
           
		   <div class="box-body">
              <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			 		 
			 
			  <div class="row">
			  <div class="col-sm-12">
			  <table id="dataTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="dataTable_info">
                <thead>
                <tr role="row">
				<th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" aria-sort="descending">Title</th>
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Notes: activate to sort column ascending">Notes</th>
				<th class="nosort" tabindex="0"  rowspan="1" colspan="1"  >Action</th>
				
				</tr>
                </thead>
                <tbody>
         
				
                <tr role="row" class="odd">
                  <td class="sorting_1">abc</td>
                  <td>def</td>
                  <td><a href="#"><i title="edit person" class="fa fa-pencil" aria-hidden="true"></i></a> 
                  | <a href="#"><i title="delete person" class="fa fa-trash-o" aria-hidden="true"></i></a>
                  </td>
                </tr>
				
				</tbody>  

                	
                   {{$team_members}}
								
				
               <!-- <tfoot>
                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                </tfoot> -->
              </table></div></div>
			  
			</div>
            </div>
		   
		   
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