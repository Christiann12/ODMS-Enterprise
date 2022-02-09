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
			<?php
				if($this->uri->segment(2)=="support"){
					echo '
					
					$(document).ready( function () {
						$(\'#supTable\').DataTable().destroy();
						var searchString=$("#supportTxtSearch").val();
						loadSupportTable(searchString);
					});
					
					';
				}
			?>
			
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

		<!-- Script for Services Inventory -->	
		<script>
			<?php
				if($this->uri->segment(2)=="servicesInventory" || $this->uri->segment(2)=="updateServicesInventoryRecord"){
					echo '
					
					$(document).ready( function () {
						$(\'#servicesInventoryTable\').DataTable().destroy();
						var VtxtSearch=$("#txtSearch").val();
						loadSrvcsInventoryTable(VtxtSearch);
					});
					
					';
				}
			?>
			
			$("#servicesInventorySearch").submit(function(event){
				event.preventDefault();
				$('#servicesInventoryTable').DataTable().destroy();
				var VtxtSearch=$("#txtSearch").val();
				loadSrvcsInventoryTable(VtxtSearch);
			});
			function loadSrvcsInventoryTable(txtSearch=''){
				
				var dataTable = $('#servicesInventoryTable').DataTable({
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
						"url": "<?php echo base_url('admin/servicesInventoryAjax')?>",
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
			$('#updateServiceRecordModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var serviceTitle = button.data('name');
				var serviceDesc = button.data('desc');
				var servicePrice = button.data('price');
				var serviceAvailability = button.data('avlblty');
				var serviceId = button.data('id') ; 
				var serviceFile = button.data('file') ; 
				// alert(productId);
				var modal = $(this)
				
				modal.find('.modal-body #serviceTitle').val(serviceTitle);
				modal.find('.modal-body #serviceDesc').val(serviceDesc);
				modal.find('.modal-body #servicePrice').val(servicePrice);
				modal.find('.modal-body #serviceAvailability').val(serviceAvailability);
				modal.find('.modal-body #serviceId').val(serviceId);
				modal.find('.modal-body #serviceFileName').val(serviceFile);
			})
		</script>

		<!-- script for transaction -->
		<script>
			<?php
				if($this->uri->segment(2)=="transaction" || $this->uri->segment(2)=="prodTransRecUpdate"){
					echo '
					
					$(document).ready( function () {
						$(\'#transactprodTable\').DataTable().destroy();
						var VtxtSearch=$("#prodSearchTxT").val();
						loadProdTransTable(VtxtSearch);
					});
					
					';
				}
			?>
			
			$("#transactionProdSearchForm").submit(function(event){
				event.preventDefault();
				$('#transactprodTable').DataTable().destroy();
				var VtxtSearch=$("#prodSearchTxT").val();
				loadProdTransTable(VtxtSearch);
			});
			function loadProdTransTable(txtSearch=''){
				
				var dataTable = $('#transactprodTable').DataTable({
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
						"url": "<?php echo base_url('admin/prodTransTableAjax')?>",
						"type": "POST",
						"data": {txtSearch:txtSearch}
					},
					"columnDefs":[{
						"targets":[0],
						"orderable":false,
					},],
					"order":[],
					"searching": false 
				});
			}
			$('#prodTransModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var transId = button.data('trid');
				var fNameLabel = button.data('fname');
				var lNameLabel = button.data('lname');
				var emailAdd = button.data('email');
				var phoNum = button.data('phn') ; 
				var compName = button.data('compname') ; 
				var compAdd = button.data('compadd');
				var cityLabel = button.data('city');
				var provinceLabel = button.data('provi');
				var postalLabel = button.data('post');
				var prodIdLabel = button.data('prid') ; 
				var prodNameLabel = button.data('prdname') ; 
				var totalPriceLabel = button.data('total');
				var quanLabel = button.data('quan') ; 
				var dateLabel = button.data('date') ; 
				var statusProdTran = button.data('stat') ; 
				// alert(productId);
				var modal = $(this)
				
				modal.find('.modal-body #transId').val(transId);
				modal.find('.modal-body #fNameLabel').val(fNameLabel);
				modal.find('.modal-body #lNameLabel').val(lNameLabel);
				modal.find('.modal-body #emailAdd').val(emailAdd);
				modal.find('.modal-body #phoNum').val(phoNum);
				modal.find('.modal-body #compName').val(compName);
				modal.find('.modal-body #compAdd').val(compAdd);
				modal.find('.modal-body #cityLabel').val(cityLabel);
				modal.find('.modal-body #provinceLabel').val(provinceLabel);
				modal.find('.modal-body #postalLabel').val(postalLabel);
				modal.find('.modal-body #prodIdLabel').val(prodIdLabel);
				modal.find('.modal-body #prodNameLabel').val(prodNameLabel);
				modal.find('.modal-body #totalPriceLabel').val(totalPriceLabel);
				modal.find('.modal-body #quanLabel').val(quanLabel);
				modal.find('.modal-body #dateLabel').val(dateLabel);
				modal.find('.modal-body #statusProdTran').val(statusProdTran);
			})
		</script>

		<!-- serviceTransaction script  -->
		<script>
			<?php
				if($this->uri->segment(2)=="transaction" || $this->uri->segment(2)=="serviceTransactionUpdateRecord"){
					echo '
					
						$(document).ready( function () {
							$(\'#serviceTransactionTable\').DataTable().destroy();
							var VtxtSearch=$("#servSearchTxT").val();
							loadServiceTransTable(VtxtSearch);
						});	
					
					';
				}
			?>
			$("#transactionServSearchForm").submit(function(event){
				event.preventDefault();
				$('#serviceTransactionTable').DataTable().destroy();
				var VtxtSearch=$("#servSearchTxT").val();
				loadServiceTransTable(VtxtSearch);
			});
			function loadServiceTransTable(txtSearch=''){
				// alert('asd');
				var dataTable = $('#serviceTransactionTable').DataTable({
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
						"url": "<?php echo base_url('admin/serviceTransactionAjax')?>",
						"type": "POST",
						"data": {txtSearch:txtSearch}
					},
					"columnDefs":[{
						"targets":[0,8],
						"orderable":false,
					},],
					"order":[],
					"searching": false 
				});
			}
			$('#updateServiceTransRecord').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget);
				var service_transactionId = button.data('strid');
				var availed_serviceId = button.data('srid') ; 
				var availed_serviceName = button.data('servname') ; 
				var availed_servicePrice = button.data('price');
				var client_firstname = button.data('fname');
				var client_lastname = button.data('lname');
				var client_email = button.data('email');
				var client_contact = button.data('phn') ; 
				var client_compName = button.data('compname') ; 
				var client_compAdd = button.data('compadd');
				var client_city = button.data('city');
				var client_stateProvince = button.data('provi');
				var client_postalCode = button.data('post');
				var order_date = button.data('date') ; 
				var with_loan = button.data('loan')
				var availed_serviceStatus = button.data('stat') ; 
				// alert(productId);
				var modal = $(this)
				
				modal.find('.modal-body #service_transaction_id').val(service_transactionId);
				modal.find('.modal-body #availed_serviceId').val(availed_serviceId);
				modal.find('.modal-body #availed_serviceName').val(availed_serviceName);
				modal.find('.modal-body #service_price').val(availed_servicePrice);
				modal.find('.modal-body #first_name').val(client_firstname);
				modal.find('.modal-body #last_name').val(client_lastname);
				modal.find('.modal-body #email_address').val(client_email);
				modal.find('.modal-body #phone_number').val(client_contact);
				modal.find('.modal-body #company_name').val(client_compName);
				modal.find('.modal-body #company_address').val(client_compAdd);
				modal.find('.modal-body #city_name').val(client_city);
				modal.find('.modal-body #state_province').val(client_stateProvince);
				modal.find('.modal-body #postal_code').val(client_postalCode);
				modal.find('.modal-body #order_date').val(order_date);
				modal.find('.modal-body #with_loan').val(with_loan);
				modal.find('.modal-body #serviceTrans_status').val(availed_serviceStatus);
			})
		</script>
	</body>
</html>
