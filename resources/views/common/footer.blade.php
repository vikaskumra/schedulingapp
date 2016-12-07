  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2014-2016</strong> All rights
    reserved.
  </footer>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  
<!-- Bootstrap 3.3.6 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>  
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>

<script>
  $(function () {
 
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
	  'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': ['nosort']
    }],
      "info": true,
      "autoWidth": false
    });
  });
  $(".btn-back").on("click",function(){
		window.history.back();
	});  
	
	
	$(".right_nav_button").on("click", function(){  
	      
		$(".quick_slide_right").toggle( "slide" , {direction:"right"}, 1000);
	});
	
	        
		
</script>

</script>
</body>
</html>