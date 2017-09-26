	<?php
	$curdate = date('Y-m-d');
	$totaldischarge = $this->Common_model->get_data_by_query("select count(casu_id) as coun from casualty c left join patient pa on pa.id=c.casu_uhid left join ipd_admit i on i.admit_id = c.casu_id left join scheme s on s.id=pa.scheme where 0=0 and casu_mrd_file = 1");
	
	$totalrcv=$this->Common_model->get_data_by_query("SELECT count(*) as couns  FROM `mrdcheck` WHERE mrd_chk_ipdid IN (select casu_id from casualty c left join patient pa on pa.id=c.casu_uhid left join ipd_admit i on i.admit_id = c.casu_id left join scheme s on s.id=pa.scheme where 0=0 and casu_mrd_file = 1)");
	
	
	$totalrackseen=$this->Common_model->get_data_by_query("select count(*) as rackcount from mrdcheck where mrd_chk_rack!=''");
	
	$totalrackpending=$this->Common_model->get_data_by_query("select count(*) as rackcountpen from mrdcheck where mrd_chk_rack=''");
	
	$reqmrd=$this->Common_model->get_data_by_query("select count(*) as c from mrd_file_distribution where file_status in(1,2,3,4,5) and DATE_FORMAT(file_requested_dt,'%Y-%m-%d')='$curdate' ");
	
	
	$pendingformrd=$this->Common_model->get_data_by_query("select count(*) as c from mrd_file_distribution where file_status=1 and DATE_FORMAT(file_requested_dt,'%Y-%m-%d')='$curdate' ");
	
	$Approvedmrd=$this->Common_model->get_data_by_query("select count(*) as c from mrd_file_distribution where file_status=2 and DATE_FORMAT(file_requested_dt,'%Y-%m-%d')='$curdate' ");
	$receivedmrd=$this->Common_model->get_data_by_query("select count(*) as c from mrd_file_distribution where file_status=5 and DATE_FORMAT(file_requested_dt,'%Y-%m-%d')='$curdate' ");
    
	$decmrd=$this->Common_model->get_data_by_query("select count(*) as c from mrd_file_distribution where file_status=6 and DATE_FORMAT(file_requested_dt,'%Y-%m-%d')='$curdate' ");

			  $totalrows=0;
			  
			  foreach ($noReceived as $key=>$ft)
                               {
									$ipdid1 = $ft['casu_id'];
									$exist = $this->Common_model->get_data_by_query("select count(*) as tot from mrdcheck where mrd_chk_ipdid = $ipdid1");
									$totalrows += $exist[0]['tot'];
							   }
	
 
	
	?>
	<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					Widget settings form goes here
				</div>
			</div>
		
			
			
			<div id="getPatient_mod" class="modal  hide fade" >
						<div class="modal-header"> <a class="btn red icn-only" data-dismiss="modal" style="float:right" href="#"><i class="icon-remove icon-white"></i></a>
						<center><h3>Today Patient</h3></center>
						</div>
							<div class="modal-body">
							 
							  <table  id='' cellspacing="0" width="100%" border="0"   class="CSSTableGenerator11">
                                    <tr>
                                        <td><center>S.no</center></td>
										<td><center>Patient Name</center></td> 
										<td><center>UHID</center></td> 
										<td><center>Reg Id</center></td>  
										<td><center>Discharge Time</center></td> 
									</tr>
									<?php $slno=0;
									foreach($noReceived as $gp)
									{
										
										$slno++;
										// $ipdid = $gp['casu_id']; 
										$uhid = $gp['casu_uhid']; 
										$casu_id= $gp['casu_id'];
										$patDetail = $this->Common_model->getPatientDetails($uhid);
									
									?>
									<tr onclick="location.href='<?php echo base_url().'admin/MRD033/mrdDetails1/'.$uhid.'/'.$casu_id ?>'" style="cursor:pointer;">
                                        <td><center><?php echo $slno;?></center></td>
                                        <td><center><?php   echo @$patDetail[0]['first_name'].' '.$patDetail[0]['middle_name'].' '.$patDetail[0]['last_name'];?></center></td>
                                        <td><center><?php   echo @$uhid;?></center></td>
                                        <td><center><?php   echo $patDetail[0]['casu_id'];?></center></td> 
									    <td><center><?php   echo date('d-M-Y h:i:s a',strtotime(@$gp['admit_exitdt']));?></center></td>
									</tr>
									<?php }?>
							 </table>
                          
					 </div>
				</div>		

				<div id="viewMrd_mod" class="modal  hide fade" >
						<div class="modal-header"> <a class="btn red icn-only" data-dismiss="modal" style="float:right" href="#"><i class="icon-remove icon-white"></i></a>
						<center><h3>Today Patient</h3></center>
						</div>
							<div class="modal-body">
							 
							  <table  id='' cellspacing="0" width="100%" border="0"   class="CSSTableGenerator11">
                                    <tr>
                                        <td><center>S.no</center></td>
										<td><center>Patient Name</center></td> 
										<td><center>UHID</center></td> 
										<td><center>Reg Id</center></td> 
                                        
									</tr>
									<?php $mrd_check_seen=0;
									foreach ($rceve as $key=>$gp)
                                    {
										
										$ipdid12= $gp['casu_id'];
										$casu_uhid= $gp['casu_uhid'];
									$exist12 = $this->Common_model->get_data_by_query("select count(*) as tot from mrdcheck where mrd_chk_ipdid = $ipdid12");
									$totalrows12 = $exist12[0]['tot'];
										 
									
									// if($totalrows12 == '1' )
									// {
										$mrd_check_seen++;
										// $uhid = $ipdid12; 
										$patDetail = $this->Common_model->getPatientDetails($casu_uhid);
									
									?>
									<tr onclick="location.href='<?php echo base_url().'admin/MRD033/mrdDetails1/'.$casu_uhid.'/'.$ipdid12 ?>'" style="cursor:pointer;">
                                        <td><center><?php echo $mrd_check_seen;?></center></td>
                                        <td><center><?php   echo @$patDetail[0]['first_name'].' '.$patDetail[0]['middle_name'].' '.$patDetail[0]['last_name'];?></center></td>
                                        <td><center><?php   echo @$uhid;?></center></td>
                                        <td><center><?php   echo @$patDetail[0]['casu_id'];?></center></td>
                                        
										 
									</tr>
									<?php 
									 }?>
							 </table>
                          
					 </div>
				</div>	
				<div id="view_mrd_rack_not_seen" class="modal  hide fade" >
						<div class="modal-header"> <a class="btn red icn-only" data-dismiss="modal" style="float:right" href="#"><i class="icon-remove icon-white"></i></a>
						<center><h3>Today Patient</h3></center>
						</div>
							<div class="modal-body">
							 
							  <table  id='' cellspacing="0" width="100%" border="0"   class="CSSTableGenerator11">
                                    <tr>
                                        <td><center>S.no</center></td>
										<td><center>Patient Name</center></td> 
										<td><center>UHID</center></td> 
										<td><center>Reg Id</center></td> 
										<td><center>Entry Date</center></td> 
                                        
									</tr>
									<?php $count_not_seen=0;
									foreach ($pending as $key=>$gp)
                               {
										
										$mrd_uhid= $gp['mrd_chk_uhid'];
										$casu_id=$gp['mrd_chk_ipdid'];
										$mrd_rack_status= $gp['mrd_rack_status'];
									 
									
									// if($mrd_rack_status == '0' )
									// {
										$count_not_seen++;
										// $uhid = $mrd_uhid; 
										$patDetail = $this->Common_model->getPatientDetails($mrd_uhid);
									
									?>
									<tr onclick="location.href='<?php echo base_url().'admin/MRD033/mrdDetails1/'.$mrd_uhid.'/'.$casu_id ?>'" style="cursor:pointer;">
                                        <td><center><?php echo $count_not_seen;?></center></td>
                                        <td><center><?php   echo @$patDetail[0]['first_name'].' '.$patDetail[0]['middle_name'].' '.$patDetail[0]['last_name'];?></center></td>
                                        <td><center><?php   echo @$mrd_uhid;?></center></td>
                                        <td><center><?php   echo @$patDetail[0]['casu_id'];?></center></td>
                                       <td><center><?php   echo date('d-M-Y h:i:s a',strtotime(@$gp['mrd_chk_entrydt']));?></center></td>
                                        
										 
									</tr>
									<?php 
									 }?>
							 </table>
                          
					 </div>
				</div>		
				<div id="view_mrd_rack_seen" class="modal  hide fade" >
						<div class="modal-header"> <a class="btn red icn-only" data-dismiss="modal" style="float:right" href="#"><i class="icon-remove icon-white"></i></a>
						<center><h3>Today Patient</h3></center>
						 </div>
							<div class="modal-body">
							 
							  <table  id='' cellspacing="0" width="100%" border="0"   class="CSSTableGenerator11">
                                    <tr>
                                        <td><center>S.no</center></td>
										<td><center>Patient Name</center></td> 
										<td><center>UHID</center></td> 
										<td><center>Reg Id</center></td> 
										<td><center>Entry Date</center></td> 
                                        
									</tr>
									<?php $count_seen=0;
									foreach ($seen as $key=>$gp)
                                    {
										
										$mrd_uhid= $gp['mrd_chk_uhid'];
										$casu_id=$gp['mrd_chk_ipdid'];
										$mrd_rack_status= $gp['mrd_rack_status'];
									 
									
									// if($mrd_rack_status == '1' )
									// {
										$count_seen++;
										// $uhid = $mrd_uhid; 
										$patDetail = $this->Common_model->getPatientDetails($mrd_uhid);
									
									?>
									<tr onclick="location.href='<?php echo base_url().'admin/MRD033/mrdDetails1/'.$mrd_uhid.'/'.$casu_id ?>'" style="cursor:pointer;">
                                        <td><center><?php echo $count_seen;?></center></td>
                                        <td><center><?php   echo @$patDetail[0]['first_name'].' '.$patDetail[0]['middle_name'].' '.$patDetail[0]['last_name'];?></center></td>
                                        <td><center><?php   echo @$mrd_uhid;?></center></td>
                                        <td><center><?php   echo @$gp['mrd_chk_ipdid'];?></center></td>
                                       <td><center><?php   echo date('d-M-Y h:i:s a',strtotime(@$gp['mrd_chk_entrydt']));?></center></td>
                                        
										 
									</tr>
									<?php 
									 }?>
							 </table>
                          
					 </div>
				</div>
				
				<div id="gettotalPatient_mod" class="modal  hide fade" >
						<div class="modal-header"> <a class="btn red icn-only" data-dismiss="modal" style="float:right" href="#"><i class="icon-remove icon-white"></i></a>
						<center><h3><span id="diffmodal">Total Patient</span></h3></center>
						</div>
							<div class="modal-body">
							 
							 <span id="repdata"></span>
                          
					        </div>
				</div>
					
				
			 
			<div class="container-fluid">
			
			
			
				<div class="row-fluid">
					<div class="span12">
					    
						<h3 class="page-title">
							MRD DASHBOARD  <small></small>
						</h3>
	<form action="<?php echo base_url('admin/MRD033/dashbord'); ?>" method='post' name="allot" class="horizontal-form">						
						
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.html">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							
							<li><a href="#">Dashboard</a></li>
							<li class="pull-right no-text-shadow">
								
									<i class="icon-calendar"></i>
									<input type="text" id="srch_date" style="border:1px solid" name="srch_date"  value="<?php echo $setdattaa; ?>" placeholder="Date From"/>
									<input type="text" id="srch_date1" style="border:1px solid" name="srch_date1"  value="<?php echo $setdattaa1; ?>" placeholder="Date To"/>
									<input style="margin-top:-10px" type="submit" name="srch" class="btn blue " id="srch" value="Search" />
									
									 
								
							</li>
							 
						</ul>
					
					</div>
				</div>
			
			
			
				<div id="dashboard">
				
					<div class="row-fluid">
						
				 <div class="span3 responsive" data-tablet="span3" data-desktop="span3"  href="#getPatient_mod" data-toggle="modal" style="cursor:pointer;" >
						
							<div class="dashboard-stat blue" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class=" icon-plus-sign"></i>
								</div>
								<div class="details">
									<div class="number">
										<?php  echo count($noReceived); ?> 
										
									</div>
									<div class="desc">                           
										Total No of Dis.
									</div>
								</div>
								<a class="more"  >
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
							
						</div>
						
						
						<div class="span3 responsive" data-tablet="span3" data-desktop="span3" href="#viewMrd_mod" data-toggle="modal" style="cursor:pointer;">
						
							<div class="dashboard-stat green" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class="icon-eye-open"></i>
								</div>
								<div class="details">
									<div class="number">
									   <?php    //echo $mrd_check_seen; 
                                                echo count($rceve);									   ?> 
									</div>
									<div class="desc"> No of Received</div>
								</div>
								<a class="more" >
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
						
						
						<div class="span3 responsive" data-tablet="span3" data-desktop="span3" href="#view_mrd_rack_seen" data-toggle="modal" style="cursor:pointer;">
							<div class="dashboard-stat purple" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class="icon-eye-close"></i>
								</div>
								<div class="details">
									<div class="number">	<?php   echo count($seen);
									                             //echo $count_seen;
                                                                   // echo count($seen); ?></div>
									<div class="desc">  Rack Seen</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>			
						<div class="span3 responsive" data-tablet="span3" data-desktop="span3" href="#view_mrd_rack_not_seen" data-toggle="modal" style="cursor:pointer;">
							<div class="dashboard-stat purple" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<img src="<?php echo base_url().'../images/progress.gif '; ?>"" alt="logo"  style="width:95%;;margin-top:none"/> </i>
								</div>
								<div class="details">
									 <div class="number">	<?php   //echo $count_not_seen; 
									                              echo count($pending); ?></div>
									<div class="desc"> Pending Rack </div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
						
					</div>
	</form>				
						<!--				<div class="row-fluid">
						
				 <div class="span4 responsive" data-tablet="span6" data-desktop="span4"  href="#getPatient_mod" data-toggle="modal" style="cursor:pointer;" >
						
							<div class="dashboard-stat blue">
								<div class="visual">
									<i class=" icon-plus-sign"></i>
								</div>
								<div class="details">
									<div class="number">
										<?php //  echo count($tot_getPatient); ?> 
										
									</div>
									<div class="desc">                           
										Total Today Patient
									</div>
								</div>
								<a class="more"  >
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
							
						</div>
						
						
						<div class="span4 responsive" data-tablet="span6" data-desktop="span4" href="#viewPatient_mod" data-toggle="modal" style="cursor:pointer;">
						
							<div class="dashboard-stat green">
								<div class="visual">
									<i class="icon-eye-open"></i>
								</div>
								<div class="details">
									<div class="number">
									   <?php  // echo count($tot_viewPatient); ?> 
									</div>
									<div class="desc"> Total View Patient</div>
								</div>
								<a class="more" >
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
						
						
						<div class="span4 responsive" data-tablet="span6" data-desktop="span4" href="#pending_mod" data-toggle="modal" style="cursor:pointer;">
							<div class="dashboard-stat purple">
								<div class="visual">
									<i class="icon-eye-close"></i>
								</div>
								<div class="details">
									<div class="number">	<?php // echo count($tot_pendingView); ?></div>
									<div class="desc">Total Pending Patient</div>
								</div>
								<a class="more" href="#">
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>
						
					</div>-->
					<!-- END DASHBOARD STATS -->
					 
					
					
					
				</div>
			</div>
			
	 <div class="container-fluid">
			    <div class="row-fluid">
					<div class="span12">		
						
						<ul class="breadcrumb">
							<li>
								
							</li>	
							<li><a href="#">Dashboard</a></li>
							<li class="pull-right no-text-shadow">
								<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range" style="display: block;">
									
									<span>TOTAL RECORD </span>
									 
								</div>
							</li>
							 
						</ul>
					
					</div>
				</div>
			
			   <div id="dashboardother">
				
					 <div class="row-fluid">
						
				        <div class="span3 responsive" data-tablet="span3" data-desktop="span3" onClick="" data-toggle="modal"  >
						
							<div class="dashboard-stat blue" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class=" icon-plus-sign"></i>
								</div>
								<div class="details">
									<div class="number">
										<?php echo $totaldischarge[0]['coun']; ?> 
										
									</div>
									<div class="desc">                           
										Total No of Dis.
									</div>
								</div>
								               
							</div>
							
						</div>
						<div class="span3 responsive" data-tablet="span3" data-desktop="span3" onClick="" data-toggle="modal" >
						
							<div class="dashboard-stat green" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class="icon-eye-open"></i>
								</div>
								<div class="details">
									<div class="number">
									   <?php echo $totalrcv[0]['couns'];  ?> 
									</div>
									<div class="desc"> No of Received</div>
								</div>
								                 
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span3" data-desktop="span3" onClick="" data-toggle="modal" >
							<div class="dashboard-stat purple" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class="icon-eye-close"></i>
								</div>
								<div class="details">
									<div class="number">	<?php echo $totalrackseen[0]['rackcount']; ?></div>
									<div class="desc">  Rack Seen</div>
								</div>
								                
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span3" data-desktop="span3" onClick="" data-toggle="modal" >
							<div class="dashboard-stat purple" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<img src="<?php echo base_url().'../images/progress.gif '; ?>"" alt="logo"  style="width:95%;;margin-top:none"/> </i>
								</div>
								<div class="details">
									<div class="number">	<?php echo $totalrackpending[0]['rackcountpen'];   ?></div>
									<div class="desc"> Pending Rack </div>
								</div>
								               
							</div>
						</div>
						
						
						
					</div>
			
			   </div>
			
			</div>		
	 <div class="container-fluid" >
			    <div class="row-fluid">
					<div class="span12">		
						
						<ul class="breadcrumb">
							<li>
							
							</li>	
							<li><a href="#">Dashboard</a></li>
							<input style="margin-left:640px;border:1px solid;" onchange="getmrddata()" name="mrddate" id="mrddate" value="" placeholder="Enter date"/>
							<li class="pull-right no-text-shadow">
								<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="Change dashboard date range" style="display: block;">
									
									<span>MRD FILE</span>
									 
								</div>
							</li>
							 
						</ul>
					
					</div>
				</div>
				
				
			<div class="span2 responsive" data-tablet="span2" data-desktop="span2" onClick="showMrdData('req')" data-toggle="modal" style="cursor:pointer;width:170px;margin-left:5px;">
						
							<div class="dashboard-stat yellow" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class="icon-file"></i>
								</div>
								<div class="details">
									<div class="number" >
									<span id="requisition"><?php echo $reqmrd[0]['c']; ?></span> 
									</div>
									<div class="desc">File Req</div>
								</div>
								<a class="more" >
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>	
			<div class="span2 responsive" data-tablet="span2" data-desktop="span2" onClick="showMrdData('pending')" data-toggle="modal" style="cursor:pointer;width:170px;">
						
							<div class="dashboard-stat yellow" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class="icon-file-text"></i>
								</div>
								<div class="details">
									<div class="number" >
									<span id="pending">   <?php echo $pendingformrd[0]['c']; ?> </span>
									</div>
									<div class="desc">Pending </div>
								</div>
								<a class="more" >
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>		
			             <div class="span2 responsive" data-tablet="span2" data-desktop="span2" onClick="showMrdData('approve')" data-toggle="modal" style="cursor:pointer;width:170px;">
						
							<div class="dashboard-stat yellow" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class="icon-file-text"></i>
								</div>
								<div class="details">
									<div class="number" >
									 <span id="appp">  <?php echo $Approvedmrd[0]['c']; ?> </span>
									</div>
									<div class="desc">Appr.</div>
								</div>
								<a class="more" >
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>		
				 <div class="span2 responsive" data-tablet="span2" data-desktop="span2" onClick="showMrdData('receive')" data-toggle="modal" style="cursor:pointer;width:170px;">
						
							<div class="dashboard-stat yellow" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class="icon-file-text"></i>
								</div>
								<div class="details">
									<div class="number" >
									 <span id="rcv">  <?php echo $receivedmrd[0]['c']; ?> </span>
									</div>
									<div class="desc">Rece.</div>
								</div>
								<a class="more" >
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>	
				 <div class="span2 responsive" data-tablet="span2" data-desktop="span2" onClick="showMrdData('decline')" data-toggle="modal" style="cursor:pointer;">
						
							<div class="dashboard-stat yellow" style='box-shadow:5px 5px 5px #888;'>
								<div class="visual">
									<i class="icon-file-text"></i>
								</div>
								<div class="details">
									<div class="number" >
									 <span id="decl">  <?php echo $decmrd[0]['c']; ?> </span>
									</div>
									<div class="desc">Dec</div>
								</div>
								<a class="more" >
								View more <i class="m-icon-swapright m-icon-white"></i>
								</a>                 
							</div>
						</div>	
				
				
				
				
	
	</div>
	
	
	
	
			<!-- END PAGE CONTAINER-->    
		</div>
<script>
function getdataonmodel(type)
{
	
		$.ajax({   
        type: "POST",  
        url: "<?php echo base_url('admin/MRD033/getdataonmodel'); ?>",  
        data: 'type='+type,
        success: function(msg){  
               $("#gettotalPatient_mod").modal('show');
               $("#repdata").html(msg); 

        }  
        });
	
}
</script>		
<script>
function getmrddata()
{   var mrddate=$('#mrddate').val();

	$.ajax({   
        type: "POST",  
        url: "<?php echo base_url('admin/MRD033/getmrddata'); ?>",  
        data: "mrddate="+mrddate,
        success: function(msg){  
            obj = JSON.parse(msg);
			
			var req=obj.req;
			var pen=obj.penmrd;
			var app=obj.appmrd;
			var rcv=obj.rcvmrd;
			var dec=obj.declmrd;
			$('#requisition').html(req);
			$('#pending').html(pen);
			$('#appp').html(app);
			$('#rcv').html(rcv);
			$('#decl').html(dec);
        }  
        });
}
</script>
<script>
function showMrdData(val)
{
	var mrddate=$('#mrddate').val();
	$.ajax({   
        type: "POST",  
        url: "<?php echo base_url('admin/MRD033/showMrdData'); ?>",  
        data: "mrddate="+mrddate+"&val="+val,
        success: function(msg){  
		$("#gettotalPatient_mod").modal('show');
		$('#repdata').html(msg);
		$('#diffmodal').html('MRD FILE');
           
        }  
        });
}
</script>
<script>
$(function() {
    $("#srch_date").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});		
			});
	
</script>
<script>
$(function() {
    $("#srch_date1").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});		
			});
	
</script>
<script>
$(function() {
    $("#mrddate").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});		
			});
	
</script>