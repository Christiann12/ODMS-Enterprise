<!-- Script Source Files -->
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		<script src="<?php echo base_url(); ?>application/assets/js/ClientPagesJs/support.js"></script>
		<!-- <script src="<?php echo base_url(); ?>application/assets/js/datatables.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/dataTables/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/dataTables/js/dataTables.semanticui.min.js"></script> -->
		<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
		<!-- <script src="<?php echo base_url(); ?>application/assets/js/responsive.dataTables.min.js"></script> -->
		
		<script src="https://code.highcharts.com/highcharts.js"></script>
		
		<!-- AdminPagesJs -->
		 <script src="<?php echo base_url(); ?>application/assets/js/AdminPagesJs/Ping.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/js/AdminPagesJs/Inventory.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/js/AdminPagesJs/DashboardCharts.js"></script>

		<script src="<?php echo base_url(); ?>application/assets/js/AdminPagesJs/support.js"></script>

		<script src="<?php echo base_url(); ?>application/assets/js/AdminPagesJs/transaction.js"></script> 


		<!-- HighChart.js -->
		<script src="https://code.highcharts.com/highcharts.src.js"></script>
		

		

		<script>
  
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
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
		
		<!-- Script for Inventory -->	
		<script>
			$(document).ready( function () {
				$('#inventoryTable').DataTable().destroy();
				var VtxtSearch=$("#txtSearch").val();
				loadInventoryTable(VtxtSearch);
			});
			$("#frmPatientSearch").submit(function(event){
				event.preventDefault();
				$('#inventoryTable').DataTable().destroy();
				var VtxtSearch=$("#txtSearch").val();
				loadInventoryTable(VtxtSearch);
			});
			function loadInventoryTable(txtSearch=''){
				
				var dataTable = $('#inventoryTable').DataTable({
					"lengthMenu": [[10, 25, 100, 1000, 3000, -1], [10, 25, 100, 1000, 3000]],
					"processing":true,
					"language": {
						processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
					},
					"serverSide":true,
					"responsive": true,
					"bPaginate": true,
					"sPaginationType": "full_numbers",
					"ajax": {
						"url": "<?php echo base_url('admin/inventoryAjax')?> ",
						"type": "POST",
						"data": {txtSearch:txtSearch}
					},
					"columnDefs":[{
						"targets":[0,7],
						"orderable":false,
					},],
					"order":[],
					"searching": false 
				});
			}
			$('#modal2').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var productTitle = button.data('name');
				var productDesc = button.data('desc');
				var productPrice = button.data('price');
				var productCat = button.data('cat');
				var productStock = button.data('stock') ; 
				var productId = button.data('id') ; 
				var file = button.data('file') ; 
				// alert(productId);
				var modal = $(this)
				
				modal.find('.modal-body #prodTitle').val(productTitle);
				modal.find('.modal-body #prodDesc').val(productDesc);
				modal.find('.modal-body #prodPrice').val(productPrice);
				modal.find('.modal-body #categoryField').val(productCat);
				modal.find('.modal-body #prodStock').val(productStock);
				modal.find('.modal-body #prodId').val(productId);
				modal.find('.modal-body #fileName').val(file);
			})
			
		</script>
	
		
	</body>
</html>
