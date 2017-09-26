<!-- BEGIN PAGE -->

<div class="page-content">


            <div id="portlet-configa" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Make Call to <span id='callto'> </span></h3>
				</div>
				<div class="modal-body">
					<div id='diag'>
						<button class="call" onclick="">
							Call
						</button>
					<button class="hangup" onclick="">
						Hangup
					</button>
						<input type="text" id="number" name="number" placeholder="Enter a phone number to call"/>
						<div id="log">Loading pigeons...</div>
					</div>
				</div>
			</div>  

            <div id="feedback-submit" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Feedback <span id='callto'> </span></h3>
				</div>
				<form action='<?php echo base_url("admin/CALLCENTER/savefeedback");?>' method='post'>
				<div class="modal-body row-fluid">
					<div class=" row-fluid">
						<div class="span10">
							<select name='response' id='response' class='m-wrap span12' onchange='savefeedback(this.val,"1")'>
								<option value=''>Select</option>
								<option value='Positive'>Positive</option>
								<option value='Very Positive'>Very Positive</option>
								<option value='Extreme Negative'>Extreme Negative</option>
								<option value='Negative'>Negative</option>
								<option value='No Answer'>No Answer</option>
							</select>
						</div>
					</div>
					<div class="row-fluid" id=''>
						<div class="span10">
							<textarea class="m-wrap span12" onkeyup ='savefeedback(this.val,"2");' name='feedback' id='feedback' style='height:150px' placeholder='Enter Feedback'></textarea>
							<input type='hidden' name='casu_id' id='casu_id'>
						</div>
					</div>
					<div class="row-fluid" id=''>
						<div class="span10">
							<button class='btn red span12'>Submit</button>
						</div>
					</div>
					
				</div>
			</div>
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

<script>
		function printDiv(divID) {
			
			// var getfatefrom =$("#srch_date1").val();
	// var getfateto =$("#srch_date").val();

	// $("#date_from").val(getfatefrom);
	// $("#date_to").val(getfateto);
			// alert(getfatefrom);
		document.getElementById("pnt").style.display='none';
		//document.getElementById("url").style.display='none';
		//document.getElementById("paid").style.display='none';
		//document.getElementById("bck").style.display='none';
		var divElements = document.getElementById(divID).innerHTML;
		//alert(divID);
		document.body.innerHTML = 
		"<html><head><title></title></head><body>" + 
		divElements + "</body>";
		window.print();
	
        }
</script>
<script>
function enterdate()
{
	var getfatefrom =$("#srch_date1").val();
	var getfateto =$("#srch_date").val();
	$("#date_from").val(getfatefrom);
	$("#date_to").val(getfateto);
}
</script>
<style>
.td {font-size:13px";}
</style>


<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
<!-- BEGIN PAGE HEADER--> 

<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->

<div class="row-fluid">
<div class="span12">
<div class="tabbable tabbable-custom boxless">
<ul class="nav nav-tabs">
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
  <div class="portlet box blue">
    <div class="portlet-title">
		<div class="caption"> 
		Discharged Patients List
		</div> 
    </div>
    <div class="portlet-body form"> 
      <!-- BEGIN FORM-->
      <div class="row-fluid">
        <div class="span12"> 
          
          <!-- BEGIN FORM-->
         
          <!-- END FORM-->
          
          <div class="row-fluid">
            <div class="span12"> 
              <!--BEGIN TABS-->
              <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                 <!-- <li class="active"><a data-toggle="tab" href="#tab_1_1">Current Patients</a></li>
                  <li><a data-toggle="tab" href="#tab_1_2">Low Balance Patients</a></li>
                  <li><a data-toggle="tab" href="#tab_1_3">Discharged Patients</a></li>-->
                </ul>
                <div class="tab-content">
                  <div id="tab_1_1" class="tab-pane active">
				 <form  method='post' name="pdisserch" class="horizontal-form">
					<div class="portlet-body form">
					  <div class="row-fluid">
					  
					   
						<div class="span3">
							<!--<div class="control-group">
								<label class="control-label" style='color:#4b8df8' for="Gender">Date From</label>
								 <input  id="srch_date1" name='srch_date1' placeholder="Enter Date"  type="text" class="m-wrap span12" value="<?php if(isset($_REQUEST['srch_date']) && $_REQUEST['srch_date']!=""){echo $_REQUEST['srch_date'];}?>" >
							</div>-->
							
					        <div class="control-group">
                              <label class="control-label" for="firstName" style='color:#4b8df8' >From Date</label>
						      
						       <div class="controls">
                                          <div class="input-append ">
                                            <input type="text" name='srch_date1' onchange='search();' id='srch_date1' class="span12 m-wrap date-picker" readonly="" size="16" value="">
                                            <span class="add-on"><i class="icon-calendar"></i></span> </div>
                               </div>
                            
                            </div>
						</div>
						
						<div class="span3">
							<!--<div class="control-group">
							<label class="control-label" style='color:#4b8df8' for="Gender">Date To</label>
							 <input  id="srch_date" name='srch_date' placeholder="Enter Date"  type="text" class="m-wrap span12" value="<?php if(isset($_REQUEST['srch_date']) && $_REQUEST['srch_date']!=""){echo $_REQUEST['srch_date'];}?>" >
							</div>-->
							
							<div class="control-group">
                                <label class="control-label" for="firstName" style='color:#4b8df8' >To Date</label>
						            <div class="controls">
                                               <div class="input-append ">
                                                 <input type="text" name='srch_date' onchange='search();' id='srch_date' class="span12 m-wrap date-picker" readonly="" size="16" value="">
                                                 <span class="add-on"><i class="icon-calendar"></i></span> </div>
                                    </div>
						
                            </div>
							
						</div>
						
						 <!--<div class="span3">
                        <div class="control-group">
                          <label class="control-label" for="firstName" style='color:#4b8df8' >Name</label>
                          <div class="controls">
                            <input type="text" onkeyup='search();' id="first_name" name='first_name' class="m-wrap span12" placeholder=" First Name">
                          </div>
                        </div>
                      </div>
                      <div class="span3">
                        <div class="control-group">
                          <label class="control-label" for="firstName" style='color:#4b8df8' > UHID</label>
                          <div class="controls">
                            <input type="text" onkeyup='search();' id="admit_uhid" name='admit_uhid' class="m-wrap span12" placeholder="UHID">
                          </div>
                        </div>
                      </div>
						
					  <div class="span3">
                        <div class="control-group">
                          <label class="control-label" for="firstName" style='color:#4b8df8' > Reg. No.</label>
                          <div class="controls">
                            <input type="text" onkeyup='search();' id="admit_id" name='admit_id' class="m-wrap span12" placeholder="Reg. No.">
                          </div>
                        </div>
                      </div>-->
						
						
						<div class="span4">
						  <div class="control-group">
							<label class="control-label" for="firstName">&nbsp;</label>
							
							<input type="button" align="left" value="Print" id="pnt" class="btn green" onClick="javascript:printDiv('searchresult');enterdate();" name="print"/>
							<input type="button" class="btn blue" onclick="tableToExcel('testTable')" value="Export to Excel">
							<div class="controls"> </div>
						  </div>
						</div>
						
					 </div>
					  <div class="row-fluid">
						
					  </div>
					 </div>
					</div>
					</form>
					<script>
					function searchrecord()
					{
						
						var srch_date   = document.getElementById('srch_date').value;
						var srch_date_1 = document.getElementById('srch_date1').value;
						var getfatefrom =$("#srch_date1").val();
						var getfateto =$("#srch_date").val();
						$("#date_from").val(getfatefrom);
						$("#date_to").val(getfateto);
						// alert(srch_date_1);
						// alert(srch_date);
						try {
						$('#searchresult').html("<center><img src='<?php echo  base_url().'../assets/img/loading_spinner.gif';?>'/></center>");
						$.ajax({   
							type: "GET",  
							url: "<?php echo base_url('admin/BILL00018/searchpdispatient'); ?>",  
							data: "srch_date="+srch_date+"&srch_date_1="+srch_date_1, 
							success: function(msg){  
								$("#searchresult").html(msg); 
								//alert(msg);
							}  
						}); 
						}
						catch (e) {
							alert(e);
						} 
						
						
					}
					</script>
					
					<div id="testTable">
					
					<div id="searchresult" class="">
					
					<?php 
					  //echo "<h6 ><strong>Total</strong>: ".count($discharge)."</h6>";
					  ?>
                    <table cellpadding="4" cellspacing="0" width="100%" border="0" class="CSSTableGenerator1">
						<tr role="row" style="background-color:#0c91e5;color:#fff">
							<td>S.No.</td>
							<td>UHID</td> 
							<td>Reg. No.</td> 
							<td>PATIENT NAME</td>
							<td>ADMIT Dt.</td>
							<td>DIS Dt.</td>
							<!--<td>ADMT Days.</td>-->
							<td>DISCHARGE TYPE</td>
							<td>CATEGORY</td>
							<td>ACTION</td>
						</tr>
                      <?php 
					  $total;
					  $count=1;
					  $inpatientdays=0;
                       
                        foreach($discharge as $ft1)
                        {	
						
						if($ft1['response']==''){$resbtn = 'red';}else{$resbtn = 'green';}
						
						$dis_type = @$this->Common_model->getDischargeType($ft1['admit_uhid'],$ft1['admit_id']);
						$data['patientDetails'] = $this->Common_model->getPatientDetails($ft1['admit_uhid']);
						foreach($data['patientDetails'] as $ft2){}
						if($dis_type != 'OTHER'){ ?>
						<tr class="odd">
                        <td><?php echo $count;?>.</td> 
						<td><?php echo $ft1['admit_uhid'];?></td>
						<td><?php echo $ft1['admit_id'];?></td>
                        <td>&nbsp;<?php echo  ucwords(strtolower($ft2['first_name']))." ". ucwords(strtolower($ft2['middle_name']))." ". ucwords(strtolower($ft2['last_name'])); ?></td>
						<td style="width:100px">&nbsp;<?php echo date('d-m-Y',strtotime($this->Common_model->getAdmitdate($ft1['admit_id'],'IPD')));?></td>
						<td style="width:80px">&nbsp;<?php echo date('d-m-Y',strtotime($this->Common_model->getDischargeDt($ft1['admit_id'])));?></td>
						<!--<td>&nbsp;<?php 
							
							$fromDate = date('Y-m-d', strtotime($this->Common_model->getAdmitdate($ft1['admit_id'],'IPD'))); //admit date
							$toDate = date('Y-m-d', strtotime($this->Common_model->getDischargeDt($ft1['admit_id']))); //discharge date
							echo count($this->Common_model->createDateRangeArray($fromDate,$toDate));
							$total = @$total + count($this->Common_model->createDateRangeArray($fromDate,$toDate));
							
							?>
						</td>-->
						<td>&nbsp;<?php echo $dis_type;?></td>
                        <td><?php @$this->Common_model->getSchemeName($ft1['admit_id'],$ft1['admit_uhid'],'IPD');?></td>
                        <!--<td><p style='width:300px;'><?php echo ucwords(strtolower($ft2['address']));?></p></td>-->
						<!--<td><?php 
						
						$contacts = $this->Common_model->getPatientContact($ft1['admit_id']);
						foreach($contacts as $ct){
							if($ct['casu_mob'] === $ct['attender_contact']){
								echo $ct['casu_mob'];
							}
							else{
								echo $ct['casu_mob']."</br>".$ct['attender_contact'];
							}
							
						}
						
						?></td>-->
						
						<td>
								<center>
								<a href="#feedback-submit"  onclick="setids(<?php echo $ft1['admit_id'];?>);" data-toggle="modal" class="config printhide">
								    <button type="button" class="btn mini <?php echo $resbtn;?>" value="1" id="bt">
									Response
									</button> 
								</a>
								
								<a href="#portlet-configa" onclick="setcontact(<?php echo $ft2['contact_no'];?>,'<?php echo $ft2['first_name']." ".$ft2['middle_name']." ".$ft2['last_name']; ?>');" data-toggle="modal" class=" printhide config">
									<button type="button" class="btn mini blue" style="background-color:#44DED8" value="1" id="bt">
									Call
									</button> 
								</a>
								</center>
						</td>
						
						
                      </tr>
						<?php } $count++; }
						
					  ?>
					<!--<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><strong>In-patient-days :</strong></td>
						
						<td><strong><?php echo $total; ?></strong></td>
						
						<td></td>
						<td></td>
						
					</tr>-->
                    </table>
					</div>
                  </div>
                  </div>
                
               
                
              </div>
              <!--END TABS--> 
            </div>
          </div>
        </div>
      </div>
      <!-- END FORM--> 
    </div>
  </div>
</div>
 
<!-- END PAGE --> 
<script>
	function setids(id)
		{
			$('#casu_id').val(id);
		}
</script>

<script>
		function search()
		{
		var fromdate= document.getElementById('srch_date1').value;
		var todate= document.getElementById('srch_date').value;
		
		//alert(todate)
		   try {
		 $("#testTable").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /> </center>');
	$.ajax({   
        type: "GET",  
        url: "<?php echo base_url('admin/MRD033/searchDischarge'); ?>",  
        data: "fromdate="+fromdate+"&todate="+todate, 
		 
        success: function(msg){  
            $("#testTable").html(msg); 
	   
        }  
    }); 
	}
	catch (e) {
        alert(e);
    } 
		
		}
		
</script> 

<script>
		function search2()
		{
		var fromdate= document.getElementById('srch_date1').value;
		var todate= document.getElementById('srch_date').value;
		var admit_uhid = $("#admit_uhid").val() ;
		var admit_id = $("#admit_id").val() ;
		//alert(todate)
		   try {
		 $("#testTable").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /> </center>');
	$.ajax({   
        type: "GET",  
        url: "<?php echo base_url('admin/MRD033/searchDischarge'); ?>",  
        data: "fromdate="+fromdate+"&todate="+todate+"&admit_uhid="+admit_uhid+"&admit_id="+admit_id, 
		 
        success: function(msg){  
            $("#testTable").html(msg); 
	   
        }  
    }); 
	}
	catch (e) {
        alert(e);
    } 
		
		}
		
</script> 

<script>
        var tableToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

<script>
		// function search()
		// {
		// var first_name= document.getElementById('first_name').value;
		// var uhid= document.getElementById('uhid').value;
		// var cont= document.getElementById('contact').value;
	
		   // try {
	
	// $.ajax({   
        // type: "GET",  
        // url: "<?php echo base_url('admin/BILL00018/searchPatient'); ?>",  
        // data: "first_name="+first_name+"&uhid="+uhid+"&cont="+cont, 
        // success: function(msg){ 
        // }  
    // }); 
	// }
	// catch (e) {
        // alert(e);
    // } 
		// }
</script> 
<script>
		function getPerformer1(uhid)
		{
		 $('#uhid').val(uhid);
		// $('#uhid').val(uhid);
		}
</script> 
<script>
$(function() {
	$("#srch_date").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});		
	$("#srch_date1").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});		
});
// $(function() {
	// $("#srch_date1").datepicker({changeMonth:true,changeYear:true,dateFormat: 'dd-mm-yy'});		
			
// });
</script>


<script>
	    function setcontact(contact,con_name)
		{
			maincontact="+91"+contact;
			
			$('#number').val(maincontact);
			$('#callto').html(con_name);
			
		}
</script>

