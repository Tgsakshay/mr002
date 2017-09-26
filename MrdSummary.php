	<div class="page-content">
		<div id="test_ajax"></div>
		  <?php $cury=date('Y');?>
		  <div class="container-fluid">
			<div class="row-fluid">
			  <div class="span12">
				<div class="color-panel hidden-phone">
				  <div class="color-mode-icons icon-color-close"></div>
				</div>
				<h3 class="page-title"> <small></small> </h3>
			  </div>
			</div>
			<div class="row-fluid">
			  <div class="span12">
				<div class="tabbable tabbable-custom boxless">
				  <div class="tab-content1">
					<div class="tab-pane active" id="tab_1">
					
					<div class="portlet box blue">
						<div class="portlet-title">
						  <div class="caption"><i class='icon-list'></i>MRD SUMMARY</div>
						  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div>
						</div>
						<div class="portlet-body form">		
							<div class='row-fluid'>
								<form action='<?php echo base_url("admin/MRD033/MrdSummary")?>' method='POST'>
								<div class='span3'>
									<select name='suumary_month' id='suumary_month' class='m-wrap span12' required>
										<option value=''>Select Option</option>
										<option value='01'>January</option>
										<option value='02'>February</option>
										<option value='03'>March</option>
										<option value='04'>April</option>
										<option value='05'>May</option>
										<option value='06'>June</option>
										<option value='07'>July</option>
										<option value='08'>August</option>
										<option value='09'>September</option>
										<option value='10'>October</option>
										<option value='11'>November</option>
										<option value='12'>December</option>
									</select>
								</div>
								<div class='span3'>
									<select name='suumary_year' id='suumary_year' class='m-wrap span12' required>
										<option value=''>Select Year</option>
										<?php for($y =2014;$y<=date('Y');$y++) { ?>
										<option value='<?php echo $y; ?>'><?php echo $y?></option>
										<?php } ?>
									</select>
								</div>
								<div class='span2'>
									<button type='submit' name='submit'  id='submit' value='submit' class='btn span12 green' style='color:white;border:1px double black'><i class='icon-search'></i> Search </button>
									
								</div>
								<div class='span2'>
									<button type='button' onclick='exportexl("<?php echo date("F", mktime(0, 0, 0, $month, 10)).'-'.$year;?>")' class='btn span12 green' style='color:#fff;border:1px double black'><i class='icon-table'></i> Excel</button>
								</div>
								<div class='span2'>
									<button type='button' onclick='printDiv()' class='btn span12 green' style='color:#fff;border:1px double black'><i class='icon-print'></i> Print</button>
								</div>
								</form>
							</div>
							<br>
							<div class='row-fluid'>
								<div class='span12' id='excel1' width='100%' border='1px'>
									<table id='excel' border='1' class='table table2excel scroll table-bordered lightfont' style='border-collapse:collapse; width:100%'>
										<thead>
										<tr style='color:#fff;background:#f7c971'>
											<th colspan='5'><center>MRD SUMMARY OF : " <?php echo date("F", mktime(0, 0, 0, $month, 10)).'-'.$year?> " </center></th>
										</tr>
										<tr>
											<th>Sl</th>
											<th>Date</th>
											<th>Total Discharge</th>
											<th>Total Files Recieved</th>
											<th>Total Files peneding</th>
										</tr>
										</thead>
										<tbody>
										<?php $count=0; foreach($date as $date) { $count++; ?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo date('d-m-Y',strtotime($date)); ?></td>
												<td><?php echo $discharge[$count-1]; ?></td>
												<td><?php echo $filesrecieved[$count-1]; ?></td>
												<td><?php echo $discharge[$count-1] - $filesrecieved[$count-1]; ?></td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						</div>
						
					</div>
						</div>
						</div>
						</div>
						</div>
					</div>

			<script>
			function exportexl(name)
			{
					$(".table2excel").table2excel({
						exclude: ".noExl",
						name: "Excel Document Name",
						filename: name,
						fileext: ".xls",
						exclude_img: true,
						exclude_links: true,
						exclude_inputs: true
					});
			}
			</script>
			<script>
			function printDiv(divID) {
	// document.getElementById("pnt").style.display='none';
	// document.getElementById("heading").style.display='block';
	var divElements = document.getElementById('excel1').innerHTML;
	document.body.innerHTML = 
	"<html><head><title></title></head> <body>" + 
	divElements + "</body>";
	window.print();
	}
	</script>