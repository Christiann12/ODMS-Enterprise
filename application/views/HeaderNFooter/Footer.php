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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
  		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script> -->
		<script src="<?php echo base_url(); ?>application/assets/js/ClientPagesJs/support.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/js/ClientPagesJs/products.js"></script>
		<!-- <script src="<?php echo base_url(); ?>application/assets/js/ClientPagesJs/services.js"></script> -->
		
		<!-- PRODUCTS Script -->
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
			$('#modConProd1').on('show.bs.modal', function (event) {

			var button = $(event.relatedTarget);
			var Cat = button.data('cat');
			var Desc = button.data('desc');
			var name = button.data('name');
			var Price = button.data('price');
			var pic = button.data('pic');
			var id = button.data('id');
			var sessid = button.data('sessid');
			var base_url = "<?= base_url('application/assets/attachments/') ?>";
			var url = base_url+pic;
		
			var modal = $(this)
			
			modal.find('.modal-body .modCat').text(Cat);
			modal.find('.modal-body .modProdName').text(name);
			modal.find('.modal-body .modProdDesc').text(Desc);
			modal.find('.modal-body .modProdPri').text(Price);
			modal.find('.modal-body #test').attr("src", url);
			modal.find('.modal-body #prodId').val(id);
			modal.find('.modal-body #sessid').val(sessid);
			modal.find('.modal-body #prodTitle').val(name);
			modal.find('.modal-body #prodPic').val(pic);
			modal.find('.modal-body #prodPrice').val(Price);
			})
		</script>

		<!-- FINANCIAL ASSISTANCE Script -->
		<script>
			$('#fACompanyModal').on('show.bs.modal', function (event) {

			var button = $(event.relatedTarget);
			var comp_desc = button.data('desc');
			var comp_name = button.data('name');
			var comp_contact = button.data('contact');
			var comp_email = button.data('email');
			var comp_img = button.data('pic');
			// var comp_id = button.data('id');
			var base_url = "<?= base_url('application/assets/attachments/') ?>";
			var url = base_url+comp_img;

			var modal = $(this)

			modal.find('.modal-body .fACompanyName').text(comp_name);
			modal.find('.modal-body .fADescription').text(comp_desc);
			modal.find('.modal-body .fAContact').text(comp_contact);
			modal.find('.modal-body .fAEmail').text(comp_email);
			modal.find('.modal-body #fACompanyPic').attr("src", url);

			})
		</script>

		<script>
			$('serviceView'),function(event){
				var button = $(event.relatedTarget);
				var srvcsPicture = button.data('srvcsPicture');
				var srvcsTitle = button.data('srvcsTitle');
				var srvcsPrice = button.data('srvcsPrice');
			}
		</script>
		
	</body>
</html>
