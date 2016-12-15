@include('common/header')
@include('common/userheader')




      <div class="row">
        <div class="col-md-9">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			@if(Session::has('message'))
               <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
             @endif
			
			<div class="box box-info">
            <div class="box-header with-border">
             <h3 class="box-title">Manage Developments / Subdivisions</h3>
			 <a href="{{URL::route('addcustomerdevelopment')}}" class="btn btn-info pull-right">Add Development</a>
            </div>
            <!-- /.box-header -->
           
		   <div class="box-body">
		   
              <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			 		 
			 
			  <div class="row">
			  <div class="col-sm-12">
			  <table id="dataTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="dataTable_info">
                <thead>
                <tr role="row">
				<th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Development: activate to sort column ascending" aria-sort="descending">Development</th>
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Address</th> 
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending" aria-sort="descending">Company</th>
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Project Manager: activate to sort column ascending">Project Manager</th>
				
				<th class="nosort" tabindex="0"  rowspan="1" colspan="1"  >Action</th>
				
				</tr>
                </thead>
                <tbody>
         
			   @foreach($dev as $development)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$development->development_name}}</td>
                  <td>{{$development->development_address}}</td>
				  <td>{{$development->company_name}}</td>
				  <td>{{$development->user_first}} {{$development->user_last}}</td>
				 
                  <td><a href="{{URL::route('editcustomerdevelopment', $development->development_id)}}"><i title="edit person" class="fa fa-pencil" aria-hidden="true"></i></a> 
                 <!-- | <a href="#"><i title="delete person" class="fa fa-trash-o" aria-hidden="true"></i></a>-->
                  </td>
                </tr>
			   @endforeach
				</tbody>  

                	
                   
                
                    
				
					   
								
				
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
		
		
		@include('/common/rightsidebar')
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->




@include('common/userfooter')

@include('common/footer')