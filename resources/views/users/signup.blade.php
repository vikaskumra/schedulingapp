@include('/users/common/header')  
<style>
form * {
    border-radius:0 !important;
}

form > fieldset > legend {
    font-size:120%;
}  
.container{
	    margin-top: 20px;
    margin-bottom: 20px;
}
</style>
<div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <form role="form" method="POST" action="">

                    <legend class="text-center">Register</legend>

                    <fieldset>
                        <legend>Personal Details</legend>

                        <div class="form-group col-md-6">
                            <label for="first_name">First name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="last_name">Last name</label>
                            <input type="text" class="form-control" name="last_name" id="" placeholder="Last Name" required />
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="Email" required  />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="confpass" id="confirm_password" placeholder="Confirm Password" required/>
                        </div>


                    </fieldset>

                    <fieldset>
                        <legend>Company Details</legend>

                        <div class="form-group col-md-6">
                            <label for="company_name">Company name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" required/>
                        </div>
						
						<div class="form-group col-md-6">
                            <label for="company_type">Company Type</label>
                            <select name="company_type" class="form-control"  id="company_type" required>
                                @foreach($company_type as $type)
								<option value="{{$type->id}}">{{$type->company_type}}</option>      
                                @endforeach								
                            </select>
                        </div>
						<div class="form-group col-md-12">
                            <label for="company_name">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required />
                        </div>  
						<div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City" required />
                        </div>
						<div class="form-group col-md-6">
                            <label for="state">State</label>
                            <input type="text" class="form-control" name="state" id="state" placeholder="State" required />
                        </div>
						<div class="form-group col-md-6">
                            <label for="country">Country</label>
                            <select class="form-control" name="country" id="country" placeholder="Country" required >
                                <option id="us">U.S.A</option>
                            </select>

                        </div>
						<div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required />
                        </div>
						

                        

                        

                    </fieldset>

                   

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                          
                        </div>
                    </div>
                       {!! csrf_field() !!}
                </form>
            </div>

        </div>
    </div>
@include('users/common/footer')