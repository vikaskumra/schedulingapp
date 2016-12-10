@include('common/header')
@include('common/userheader')




      <div class="row">
        <div class="col-md-9">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
             <h3 class="box-title">Manage Company Jobs</h3>
			 <a href="{{URL::route('addjob')}}" class="btn btn-info pull-right">Add New Job</a>
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
                  <td>abc</td>
                  <td><a href="#"><i title="edit" class="fa fa-pencil" aria-hidden="true"></i></a> 
                 
                  </td>
                </tr>
			  	
				</tbody>
               
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
		
		
		@include('/common/rightsidebar')
		
		
		
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->




@include('common/userfooter')

@include('common/footer')