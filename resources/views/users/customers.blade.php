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
             <h3 class="box-title">Manage Customers</h3>
			 <a href="{{URL::route('addCustomer')}}" class="btn btn-info pull-right">Add New Customer</a>
            </div>
            <!-- /.box-header -->
           
		   <div class="box-body">
		   
              <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			 		 
			 
			  <div class="row">
			  <div class="col-sm-12">
			  <table id="dataTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="dataTable_info">
                <thead>
                <tr role="row">
				<th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending" aria-sort="descending">First Name</th>
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Last Name</th> 
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" aria-sort="descending">Email</th>
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Active: activate to sort column ascending">Manage Contacts</th>
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Phone</th>
				<th class="nosort" tabindex="0"  rowspan="1" colspan="1"  >Action</th>
				
				</tr>
                </thead>
                <tbody>
         
			   @foreach($customers as $customer)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$customer->first_name}}</td>
                  <td>{{$customer->last_name}}</td>
				  <td>{{$customer->email}}</td>
				  <td style="text-align:center"><a href="{{URL::route('managecontacts', $customer->id)}}" class = "btn btn-primary">Contacts</a></td>
				  <td>{{$customer->phone}}</td>
                  <td><a href="{{URL::route('editcontact', $customer->id)}}"><i title="edit person" class="fa fa-pencil" aria-hidden="true"></i></a> 
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