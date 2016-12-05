@include('/users/common/header')  
<style>

 .mycolor{
            color : #008000;
        }        
        .myborder{
            padding: 20px;;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: 0px 0px 3px 0px #72c02c;
            -moz-box-shadow:    0px 0px 3px 0px #72c02c;
            box-shadow:         0px 0px 3px 0px #72c02c;
        }
        .mybutton{
            position: relative;
            left: 50%;
            top: 193px;

        }
        .margin-bottom-20 {
            margin-bottom: 20px;

        }
        .btn-u:hover {
            background: #5fb611;
        }
        .btn-u:hover, .btn-u:focus, .btn-u:active, .btn-u.active, .open .dropdown-toggle.btn-u {
            background: #ffffff;  
			border:1px solid #008000;
        }
        .btn-u:hover {
            color: #008000;
            text-decoration: none;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .btn-u {
            background: #72c02c;
        }
        .btn-u {
            white-space: nowrap;
            border: 0;
            color: #fff;
            font-size: 14px;
            cursor: pointer;
            font-weight: 400;
            padding: 6px 13px;
            position: relative;
            background: #008000;
            display: inline-block;
            text-decoration: none; 
			border:1px solid #008000;
        }
        .input-group-addon {
            border-right: 0;
            /*color: #b3b3b3;*/
            font-size: 14px;
            background: #fff;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1;
            color: #555;
            text-align: center;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .input-group .form-control {
            float: left;
            width: 100%;
            margin-bottom: 0;
        }
        .form-control {
            box-shadow: none;
        }
        .form-control {
            display: block;
            width: 100%;
            height: 34px !important;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.428571429;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid  #008000; !important;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        }
</style>
	
	
	
	<div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
	   <form role="form" method="POST" action="">
	   {!! csrf_field() !!}
         <div class="row myborder">
             <h4 style="color: #7EB59E; margin: initial; margin-bottom: 10px;">Personal Details</h4><hr>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope mycolor"></i></span>
                <input size="80" maxlength="255" class="form-control" placeholder="Email" value="{{old('email')}}" name="email" id="email" type="email" required />    
          
				</div>  
				<span>
			   @if($errors->has('email'))
			   {{$errors->first('email')}} 
		      @endif	   
			</span>
				
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Password" name="password" id="password" type="password" required />                                    </div>
			<span>
			   @if($errors->has('password'))
			   {{$errors->first('password')}} 
		      @endif	   
			</span>
			<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Confirm Password" name="confpass" id="confpass" type="password" required />                                    </div>	
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="First Name" value="{{old('first_name')}}" name="first_name" id="first_name" type="text" required />                                    </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Last Name" value="{{old('last_name')}}" name="last_name" id="last_name" type="text" required />                                    </div>
            
            <!--<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Contact Number" name="UserRegistration[contactnumber]" id="UserRegistration_contactnumber" type="text">                                    </div>-->
            <h4 style="color: #7EB59E; margin: initial; margin-bottom: 10px;margin-top:50px;">Company Details</h4><hr>
			<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Company Name" value="{{old('company_name')}}" name="company_name" id="company_name" type="text" required />                                    </div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
				<select name="company_type" class="form-control" required />
				  @foreach($company_type as $type)
								<option value="{{$type->id}}">{{$type->company_type}}</option>      
                                @endforeach
				</select>
                                               </div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Address" value="{{old('address')}}" name="address" id="address" type="text" required />                                    </div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-globe mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="City" value="{{old('city')}}" name="city" id="city" type="text" required />                                    </div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-globe mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="State" value="{{old('state')}}" name="state" id="state" type="text" required />                                    </div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-globe mycolor"></i></span>
                <select name="country" class="form-control" required />
				  <option>Usa</option>
				</select>
				                                    </div>
				<div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Phone" value="{{old('phone')}}" name="phone" id="phone" type="phone" required />                                    </div>
			<div class="row">
                <div class="col-md-12">
                    <button class="btn-u pull-left" type="submit">Sign Up</button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
	   </form>
    </div>
      </div>
@include('users/common/footer')