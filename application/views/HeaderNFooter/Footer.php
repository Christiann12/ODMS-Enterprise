<!-- Footer -->
<footer>
	<div class="footer d-flex justify-content-between">
		<p class="footer-text">
			Copyright © 2021 ODMS Enterprise. All rights reserved.
		</p>
		<div>
			<i class="fa fa-facebook-square footer-icons"aria-hidden="true"></i>
			<i class="fa fa-twitter-square footer-icons"aria-hidden="true" style="margin-left: 10px; margin-right:10px;"></i> 
			<i class="fa fa-linkedin-square footer-icons"aria-hidden="true"></i>  
		</div>
	</div>
</footer>
<!-- Script Source Files -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/css/support.js"></script>
		

		<script>
			// $(window).scroll(function(){
			// 	$('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
			// 	$('.navbar-brand').toggleClass('scrolled', $(this).scrollTop() > 100);
			// 	$('.nav-link').toggleClass('s crolled', $(this).scrollTop() > 100);
			// 	// $('.nav').classList.remove('.navbar-dark', $(this).scrollTop() > 100);
			// });
			
			document.onkeydown = function(e) {
				if(event.keyCode == 123) {
					return false;
				}
				if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
					return false;
				}
				if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
					return false;
				}
				if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
					return false;
				}
			}
		</script>
	</body>
</html>
