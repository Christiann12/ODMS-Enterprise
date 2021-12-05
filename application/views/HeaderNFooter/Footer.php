<!-- Footer -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-4 col-lg-4 left">
				<p class="pt-2 titlePar">Navigate to:</p>
				<ul class="navigation pt-3">
					<li><a href="<?php echo base_url() ?>main/index/HomePage" class="navFooter" onclick="setActive(1)">Home</a></li>
					<li><a href="<?php echo base_url() ?>main/index/FAQ" class="navFooter" onclick="setActive(2)">FAQs</a></li>
					<li><a href="<?php echo base_url() ?>main/index/FinancialAssistance" class="navFooter" onclick="setActive(3)">Financial Assistance</a></li>
					<li><a href="<?php echo base_url() ?>main/index/Ping" class="navFooter" onclick="setActive(4)">Ping</a></li>
					<li><a href="<?php echo base_url() ?>main/index/Transaction" class="navFooter" onclick="setActive(5)">Transaction</a></li>
					<li><a href="<?php echo base_url() ?>main/index/Tips" class="navFooter" onclick="setActive(6)">Tips</a></li>
					<li><a href="<?php echo base_url() ?>main/index/Support" class="navFooter" onclick="setActive(7)">Support</a></li>
				</ul>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-4 mid">
				<p class="pt-2 titlePar">Follow us:</p>
				<ul class="social pt-3">
					<li><a href="" target="_blank"><i class="fab fa-facebook"></i></a></li>
					<li><a href="" target="_blank"><i class="fab fa-twitter"></i></a></li>
					<li><a href="" target="_blank"><i class="fab fa-instagram"></i></a></li>
				</ul>
			</div>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4 right">
				<p class="pt-2 titlePar">Contact us:</p>
				<ul class="contact pt-3">
					<li><i class="fas fa-envelope icon"></i><p class="contactp align-middle pl-2">companyname@domain.com</p></li>
					<li><i class="fas fa-phone icon"></i><p class="contactp align-middle pl-2">09xx-xxx-xxxx</p></li>
				</ul>
				
		</div>
	</div>
</footer>
<!-- Script Source Files -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		

		<script>
			$(window).scroll(function(){
				$('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
				$('.navbar-brand').toggleClass('scrolled', $(this).scrollTop() > 100);
				$('.nav-link').toggleClass('scrolled', $(this).scrollTop() > 100);
				// $('.nav').classList.remove('.navbar-dark', $(this).scrollTop() > 100);
			});
			
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
