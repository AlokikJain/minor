<!-- Landing page -->

<div id="header_msg">
	<h3> Welcome, guest</h3>
</div>

<div id="intro">
	<div id="intro_body">
		<p> This site act as a digital platform for clinics and hospital <br>to digitally prescribe
		prescription to their patients. </p>
		<p> Even if you repeat a quantum experiment by preparing a quantum particle <br>in exactly the same initial state, subjecting it to the exact same conditions, <br>measuring its orientation after the same amount of time, you can still end up <br>with totally different results. 
		</p>

		<br>
		<p> We strongly support <span id="qu"> GO GREEN !GO GGITAN</span></p>
	</div>
</div>

<div>
	<!-- Alters the last button of homepage -->
	<div id="goahead">
		<?php if(!empty($_SESSION['id'])): ?>
			Continue <span class="glyphicon glyphicon-menu-right" style="padding-left:1px;"></span>
		<?php else: ?>
			Login to continue 
		<?php endif ?>
	</div>
</div>

<script>
	/* if the user clicks the homepage bottom button then redirect them */
	$("#goahead").click( function (){
		<?php if(!empty($_SESSION['id'])): ?>
			location.href='bg-Patientdetails.php';
		<?php else: ?>
			$("#login").modal();
			
		<?php endif ?>
	})
</script>