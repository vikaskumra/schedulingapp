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
                  <fieldset>
                    <legend class="text-center">Register</legend>

                   

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

          <input type="hidden" name="team_token" value="{{$team_token}}">
						
						


                   

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                          
                        </div>
                    </div>
                       {!! csrf_field() !!}
                </form>  
			  </fieldset>	
            </div>

        </div>
    </div>
@include('users/common/footer')