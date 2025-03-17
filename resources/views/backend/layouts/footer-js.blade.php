<!-- Bootstrap JS -->
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<!-- CORE JS FRAMEWORK - START --> 
<script src="{{asset('backend/assets/js/jquery-1.11.2.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('backend/assets/js/jquery.easing.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('backend/assets/plugins/pace/pace.min.js')}}" type="text/javascript"></script>  
<script src="{{asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('backend/assets/plugins/viewport/viewportchecker.js')}}" type="text/javascript"></script>  
<!-- CORE JS FRAMEWORK - END --> 


<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<!-- <script src="{{asset('backend/assets/plugins/rickshaw-chart/vendor/d3.v3.js')}}" type="text/javascript"></script> 
<script src="{{asset('backend/assets/plugins/jquery-ui/smoothness/jquery-ui.min.js')}}" type="text/javascript">
</script> <script src="{{asset('backend/assets/plugins/rickshaw-chart/js/Rickshaw.All.js')}}"></script>
<script src="{{asset('backend/assets/plugins/sparkline-chart/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/morris-chart/js/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/morris-chart/js/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/gauge/gauge.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/js/dashboard.js')}}" type="text/javascript"></script> -->
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<script src="{{asset('backend/assets/plugins/messenger/js/messenger.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/messenger/js/messenger-theme-future.js')}}" type="text/javascript">
</script>
<script src="{{asset('backend/assets/plugins/messenger/js/messenger-theme-flat.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/js/messenger.js')}}" type="text/javascript"></script>
<!-- CORE TEMPLATE JS - START --> 
<script src="{{asset('backend/assets/js/scripts.js')}}" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 

<!-- Sidebar Graph - START --> 
<script src="{{asset('backend/assets/plugins/sparkline-chart/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/js/chart-sparkline.js')}}" type="text/javascript"></script>
<!-- Sidebar Graph - END --> 
<!-- @yeild('morescripts') -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
		@if(session()->has('error'))
		showErrorMessage('{{ session()->get('error') }}');
		@elseif(session()->has('success'))
		showSuccess('{{ session()->get('success') }}');
		@endif
	
    });
</script>
<script type="text/javascript">
$(document).ready(function() {
	// Making 2 variable month and day
	var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
	var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

	// make single object
	var newDate = new Date();
	// make current time
	newDate.setDate(newDate.getDate());
	// setting date and time
	$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

	setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);

	setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	},1000);

	setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	}, 1000); 
});
function formatAMPM(date) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}
</script>

