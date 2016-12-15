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
             <h3 class="box-title">Manage Projects</h3>
			 <a href="{{URL::route('addcustomersitelocation')}}" class="btn btn-info pull-right">Add New Location</a>
            </div>
            <!-- /.box-header -->
           
		   <div class="box-body">
		   
              <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
			 		 
			 
			  <div class="row">
			  <div class="col-sm-12">
			  <table id="dataTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="dataTable_info">
                <thead>
                <tr role="row">
				<th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Lot Number: activate to sort column ascending" aria-sort="descending">Lot Number</th>
				
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Subdivision: activate to sort column ascending">Subdivision</th> 
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Street Address: activate to sort column ascending">Street Address</th> 
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" aria-sort="descending">Customer</th>
				<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Active: activate to sort column ascending">Project Manager</th>
				
				<th class="nosort" tabindex="0"  rowspan="1" colspan="1"  >Action</th>
				
				</tr>
                </thead>
                <tbody>
         
			   @foreach($locations as $location)
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$location->lot_number}}</td>
                  <td>{{$location->development_name}}</td>
				  <td>{{$location->street_address}}</td>
				  <td>@if(!empty($location->company_name))
				  {{$location->company_name}}
			      @else
				  {{$location->customer_first}} {{$location->customer_last}}
			      @endif
				  </td>
				  <td>{{$location->user_first}} {{$location->user_last}}</td>
                  <td><a href="{{URL::route('editcustomersitelocation', $location->location_id)}}"><i title="edit person" class="fa fa-pencil" aria-hidden="true"></i></a> 
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