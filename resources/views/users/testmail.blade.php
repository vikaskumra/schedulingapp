<!DOCTYPE html>
<html lang="en">
<head>
  <title>SchedulingApp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
  h3{
	  padding: 11px;
  }  
  
  .col{
	  background: #333b5b;
    color: #fff;
  }
</style>
  </head>
<body>  
<div class = "container">  
<div class="row">  
  <div class="col">
<h3>{{$auth_first}} {{$auth_last}} added you to SchedulingApp to help collaborate.</h3>  
  </div>
</div>   

<br>    


<p>Hi {{$first_name}},</p>

<p>{{$auth_first}} added you to SchedulingApp, an online tool to help teams prioritize tasks and communicate efficiently.</p>

<p>To access your account and get busy, you will first need to set up your profile.</p>

<p><a href="http://localhost:8000/user/security/token/{{$team_token}}" target="_blank">Click here to complete your registration.</a></p>

<p>We hope Schedulingapp works well for you. If you have any questions once you are underway, please let us know.</p>

<p>Regards,</p>

<p>The Schedulingapp team</p>

</div>
</body>
</html>