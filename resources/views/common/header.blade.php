<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Scheduling App</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('assets/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/skin-blue.css')}}">
  <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
	
  <!-- iCheck -->
  <!--<link rel="stylesheet" href="{{URL::asset('assets/css/blue.css')}}">
-->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->  
  <script type="text/javascript">
     function checkClass(){
     var page = document.getElementById('pageId');  
	 var item = document.getElementById('setupteammember');   
	 var item1 = document.getElementById('setuproles');
	 var item2 = document.getElementById('setuptasks');
	 var item3 = document.getElementById('userdashboard');
        	 
	 if(item.id == page.className)
	 {
  
		 $('#setupteammember').next().addClass('arrow-up');
	 }  
	 
	 if(item1.id == page.className)
	 {
 
         $('#setuproles').next().addClass('arrow-up');		 
	 }
	 if(item2.id == page.className)
	 {
  
         $('#setuptasks').next().addClass('arrow-up');		 
	 }
	 if(item3.id == page.className)
	 {  
         $('#userdashboard').next().addClass('arrow-up');		 
	 }
	  
	 } 
	 
	 
	 
  </script>
  
</head>
<body onload="checkClass()" class="hold-transition {{Request::route()->getName()}}-page skin-blue sidebar-mini">  
<div style="display:none;" class="{{Request::route()->getName()}}" id="pageId">{{Request::route()->getName()}}</div>
<div class="wrapper">

