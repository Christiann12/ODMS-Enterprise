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
		<script src="<?php echo base_url(); ?>application/assets/js/AdminPagesJs/UserManagement.js"></script>  
		<script src="<?php echo base_url(); ?>application/assets/js/AdminPagesJs/ServicesInventory.js"></script>  
		<script src="<?php echo base_url(); ?>application/assets/js/AdminPagesJs/FinancialAssistance.js"></script>  


		<!-- HighChart.js -->
		<script src="https://code.highcharts.com/highcharts.src.js"></script>
		
		<!-- ToolTip toggle -->
		<script>
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})
		</script>
		
		<!-- general script -->
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
			<?php
				if($this->uri->segment(2)=="inventory" || $this->uri->segment(2)=="updateInventoryRecord"){
					echo '
					
					$(document).ready( function () {
						$(\'#inventoryTable\').DataTable().destroy();
						var VtxtSearch=$("#txtSearch").val();
						loadInventoryTable(VtxtSearch);
					});
					
					';
				}
			?>
			
			$("#inventorySearch").submit(function(event){
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
						"url": "<?php echo base_url('admin/inventoryAjax')?>",
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

		<!-- script for create user -->
		<script>
			<?php
				if($this->uri->segment(2)=="userManagement" || $this->uri->segment(2) == "updateUser"){
					echo '
					
					$(document).ready( function () {
						$(\'#userTable\').DataTable().destroy();
						var searchString=$("#txtSearch").val();
						loadUserTable(searchString);
					});
					
					';
				}
			?>
			
			$("#userSearch").submit(function(event){
				event.preventDefault();
				$('#userTable').DataTable().destroy();
				var searchString=$("#txtSearch").val();
				loadUserTable(searchString);
			});
			function loadUserTable(txtsearch){
				// alert('asd');
				var dataTable = $('#userTable').DataTable({
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
						"url": "<?php echo base_url('admin/userAjax')?>",
						"type": "POST",
						"data": {txtSearch:txtsearch}
					},
					"columnDefs":[{
						"targets":[0],
						"orderable":false,
					},],
					"order":[],
					"searching": false 
				});
			}
		</script>

		<!-- ping script  -->
		<script>
			<?php
				if($this->uri->segment(2)=="ping" || $this->uri->segment(2)=="updatePingRecord"){
					echo '
					
					$(document).ready( function () {
						$(\'#pingTable\').DataTable().destroy();
						var searchString=$("#pingTextSearch").val();
						loadPingTable(searchString);
					});
					
					';
				}
			?>
			$("#pingSearch").submit(function(event){
				event.preventDefault();
				$('#pingTable').DataTable().destroy();
				var searchString=$("#pingTextSearch").val();
				loadPingTable(searchString);
			});
			function loadPingTable(txtsearch){
				// alert('asd');
				var dataTable = $('#pingTable').DataTable({
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
						"url": "<?php echo base_url('admin/pingDetailAjax')?>",
						"type": "POST",
						"data": {txtSearch:txtsearch}
					},
					"columnDefs":[{
						"targets":[0,5],
						"orderable":false,
					},],
					"order":[],
					"searching": false 
				});
			}
			$('#updatePingModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var status = button.data('status') ;
				var pingId = button.data('pingid') ; 
				// alert(productId);
				var modal = $(this)
				
				modal.find('.modal-body #pingStatusField').val(status);
				modal.find('.modal-body #pingIdField').val(pingId);
			})
		</script>
		<!-- support script  -->
		<script>
			$(document).ready( function () {
				$('#supTable').DataTable().destroy();
				var searchString=$("#supportTxtSearch").val();
				loadSupportTable(searchString);
			});
			$("#supportSearch").submit(function(event){
				event.preventDefault();
				$('#supTable').DataTable().destroy();
				var searchString=$("#supportTxtSearch").val();
				loadSupportTable(searchString);
			});
			function loadSupportTable(txtsearch){
				// alert('asd');
				var dataTable = $('#supTable').DataTable({
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
						"url": "<?php echo base_url('admin/supportDetailAjax')?>",
						"type": "POST",
						"data": {txtSearch:txtsearch}
					},
					"columnDefs":[{
						"targets":[0],
						"orderable":false,
					},],
					"order":[],
					"searching": false 
				});
			}
			$('#updateSupportDetailModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var status = button.data('status') ;
				var supportId = button.data('suppid') ; 
				// alert(productId);
				var modal = $(this)
				
				modal.find('.modal-body #supportStatusField').val(status);
				modal.find('.modal-body #supportIdField').val(supportId);
			})
			// TICKET OVERVIEW CHART
			document.addEventListener('DOMContentLoaded', function () {
				const chart1 = Highcharts.chart('supportOverviewChart', {
					chart: {
						type: 'areaspline',
						scrollablePlotArea: {
							minWidth: 400,
							scrollPositionX: 1
						}
					},
					title: {
						text: 'Weekly Ticket Overview'
					},
					legend: {
						layout: 'vertical',
						align: 'left',
						verticalAlign: 'top',
						x: 150,
						y: 100,
						floating: true,
						borderWidth: 1,
						backgroundColor:
							Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
					},
					xAxis: {
						categories: [
							'Monday',
							'Tuesday',
							'Wednesday',
							'Thursday',
							'Friday',
							'Saturday',
							'Sunday'
						],
						plotBands: [{ // visualize the weekend
							from: 4.5,
							to: 6.5,
							color: 'rgba(68, 170, 213, .2)'
						}]
					},
					yAxis: {
						title: {
							text: 'Number of tickets'
						}
					},
					tooltip: {
						shared: true,
						valueSuffix: ' tickets'
					},
					credits: {
						enabled: false
					},
					plotOptions: {
						areaspline: {
							fillOpacity: 0.5
						}
					},
					series: [{
						name: 'Open/Pending',
						data: [<?php echo (isset($info1) ? $info1 : 0)?>, <?php echo (isset($info2) ? $info2 : 0)?>, <?php echo (isset($info3) ? $info3 : 0)?>, <?php echo (isset($info4) ? $info4 : 0)?>, <?php echo (isset($info5) ? $info5 : 0)?>, <?php echo (isset($info6) ? $info6 : 0)?>, <?php echo (isset($info7) ? $info7 : 0)?>],
						color: '#FFB36C'
					}]
				})
			});
		</script>

		<!-- Script for Financial Assistance (company) -->	
		<script>
			<?php
				if($this->uri->segment(2)=="financialAssistance" || $this->uri->segment(2)=="updateFACompanyRecord"){
					echo '
					
					$(document).ready( function () {
						$(\'#fAssistanceAdminTable\').DataTable().destroy();
						var VtxtSearch=$("#txtSearch").val();
						loadFACompanyTable(VtxtSearch);
					});
					
					';
				}
			?>
			
			$("#fACompanySearch").submit(function(event){
				event.preventDefault();
				$('#fAssistanceAdminTable').DataTable().destroy();
				var VtxtSearch=$("#txtSearch").val();
				loadFACompanyTable(VtxtSearch);
			});
			function loadFACompanyTable(txtSearch=''){
				
				var dataTable = $('#fAssistanceAdminTable').DataTable({
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
						"url": "<?php echo base_url('admin/fACompanyAjax')?>",
						"type": "POST",
						"data": {txtSearch:txtSearch}
					},
					"columnDefs":[{
						"targets":[0,6],
						"orderable":false,
					},],
					"order":[],
					"searching": false 
				});
			}
			$('#FACompanyModal2').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var companyName = button.data('name');
				var companyDesc = button.data('desc');
				var companyContactNum = button.data('contact');
				var companyEmail = button.data('email');
				var companyId = button.data('id') ; 
				var companyFileName = button.data('file') ; 
				// alert(productId);
				var modal = $(this)
				
				modal.find('.modal-body #fACompanyName').val(companyName);
				modal.find('.modal-body #fACompanyDesc').val(companyDesc);
				modal.find('.modal-body #fACompanyContactNum').val(companyContactNum);
				modal.find('.modal-body #fACompanyEmail').val(companyEmail);
				modal.find('.modal-body #fACompanyId').val(companyId);
				modal.find('.modal-body #fACompanyFileName').val(companyFileName);
			})
			
		</script>
	</body>
</html>
