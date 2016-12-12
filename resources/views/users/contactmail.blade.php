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


<p>Hi {{$contact_first}},</p>

<p>{{$auth_first}} added you to SchedulingApp, an online tool to help teams prioritize tasks and communicate efficiently.</p>

<p>To access your account, you will need your login details.</p>

<p>Username:<b>{{$email}}</b> Password:<b>{{$password}}</b></p>

<p><a href="http://scheduling.w3sols.com/users/login" target="_blank">Click here to login.</a></p>

<p>We hope Schedulingapp works well for you. If you have any questions once you are underway, please let us know.</p>

<p>Regards,</p>

<p>The Schedulingapp team</p>

</div>
</body>
</html>