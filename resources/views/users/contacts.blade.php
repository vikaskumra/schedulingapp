@include('common/header')
@include('common/userheader')




      <div class="row">
        <div class="col-md-9">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
			<div class="box box-info">
            <div class="box-header with-border">
             <h3 class="box-title">Manage Your Contacts</h3>
			 <h4><b>{{$customer->first_name}} {{$customer->last_name}}</b><h4>
			 <a href="{{URL::route('addcontact', $customer->id)}}" class="btn btn-info pull-right">Add New Contact</a>
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
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Active: activate to sort column ascending">Communication Preference</th>
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Notes</th>
				<th class="nosort" tabindex="0"  rowspan="1" colspan="1"  >Action</th>
				
				</tr>
                </thead>
                <tbody>
         
			      @foreach($contacts as $contact)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$contact->first_name}}</td>
                  <td>{{$contact->last_name}}</td>
				  <td>{{$contact->email}}</td>
				  <td style="text-align:center">{{$contact->communication_preference}}</td>
				  <td>{{$contact->notes}}</td>
                  <td><a href="{{URL::route('editcustomercontact', $contact->id)}}"><i title="edit person" class="fa fa-pencil" aria-hidden="true"></i></a> 
                  | <a href="#"><i title="delete person" class="fa fa-trash-o" aria-hidden="true"></i></a>
                  </td>
                </tr>	
                  @endforeach				
				</tbody>  

                	
                   
                
                    
				
					   
								
				
               <!-- <tfoot>
                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                </tfoot> -->
              </table></div></div>
			  
			</div> 
			@if(Session::has('message'))
               <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
			
			
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