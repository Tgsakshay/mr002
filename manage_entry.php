<div class="page-content">
  <div id="test_ajax"></div>
  <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
  <div id="portlet-config" class="modal container hide fade" style="width:50%; position:absolute;left:620px;">
    <div class="modal-header"> <a class="btn red icn-only" data-dismiss="modal" style="float:right" href="#"><i class="icon-remove icon-white"></i></a>
      <h3>Manage Petrol</h3>
    </div>
    <div class="modal-body">
      <form method='post'  name="frmadd"  action="<?php echo base_url('admin/HRD00017/add_petrol'); ?>" >
        <div class="row-fluid">
          <div class="span3 ">
            <div class="control-group">
              <label class="control-label" for="Gender">A/C of</label>
              <div class="controls">
                <input type="text" id="petr_acc" value="" name='petr_acc' class="m-wrap span12"  >
                <!-- <input type="hidden" id="bstock_id" value="" name='bstock_id'   >--> 
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="control-group">
              <label class="control-label" for="Gender">Organization</label>
              <select id="petr_orgid" name="petr_orgid"     class="m-wrap span12" >
                <option value="">Select Type</option>
                <option value="1">Metro Hospital</option>
                <option value="2">Global</option>
              </select>
            </div>
          </div>
          <div class="span3 ">
            <div class="control-group">
              <label class="control-label" for="Gender">Department</label>
              <select id="emp_dep" name="emp_dep" class="m-wrap span12" onchange='selectpos(this.value)'>
                <option value="">Select Department</option>
                <?php 
                             foreach ($dep as $key=>$value)
					  {
							?>
                <option  value="<?php echo $value['dep_id'];?>"  ><?php echo $value['dep_name'];?></option>
                <?php 
					  }  
					  ?>
              </select>
            </div>
          </div>
          <div class="span3 ">
            <div class="control-group">
              <label class="control-label" for="Gender">Vehicle</label>
              <div class="controls">
                <input type="text" id="petr_vehicle" value="" name='petr_vehicle' class="m-wrap span12"  >
                <input type="hidden" id="bstock_id" value="" name='bstock_id'   >
              </div>
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div class="span3 ">
            <div class="control-group">
              <label class="control-label" for="Gender">Petrol Type</label>
              <div class="controls">
                <select  id="petr_type" value="" name='petr_type' class="m-wrap span12"  style="width:100%;">
                  <option>Select type</option>
                  <option value="Petrol Speed">Petrol Speed</option>
                  <option value="Petrol">Petrol</option>
                  <option value="Hi-speed diesel">Hi-speed diesel</option>
                  <option value="diesel">diesel</option>
                  <option value="Oil">Oil</option>
                </select>
              </div>
            </div>
          </div>
          <div class="span3 ">
            <div class="control-group">
              <label class="control-label" for="Gender">Liters</label>
              <div class="controls">
                <input type="text" id="petr_liter" value="" name='petr_liter' class="m-wrap span12" >
              </div>
            </div>
          </div>
          <div class="span3 ">
            <div class="control-group">
              <label class="control-label" for="Gender">Amount</label>
              <div class="controls">
                <input type="text" id="petr_amt" value="" name='petr_amt' class="m-wrap span12"  >
              </div>
            </div>
          </div>
          <div class="span3 ">
            <div class="control-group">
              <label class="control-label" for="Gender">Date</label>
              <div class="controls">
                <input type="text" id="petr_date" value="" name='petr_date' class="m-wrap span12" >
               
              </div>
            </div>
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" name='sub' value='sub' id='sub1' onclick="return validate();" class="btn blue"><i class="icon-ok"></i> Save</button>
          <button type="button" class="btn" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
  <script src="<?php echo base_url().'../assets/shortcut/shortcut.js'; ?>"></script> 
  <script>
    shortcut.add('ctrl+s', function(){
    $( '#sub1').trigger('click')
    });
    </script>
    
	<script>
 function validate1()
	{
		if(checkCorrect3(document.frmadd.petr_acc,"A/C of",true)==false)
		return false;
		if(checkDropDown(document.frmadd.petr_orgid,"Organization Name",true)==false)
		return false;
		if(checkDropDown(document.frmadd.emp_dep,"Department Name",true)==false)
		return false;
		if(checkCorrect3(document.frmadd.petr_vehicle,"Vehicle Number",true)==false)
		return false;
		if(checkCorrect3(document.frmadd.petr_liter,"Liter",true)==false)
		return false;
		if(checkCorrect3(document.frmadd.petr_amt,"Amount",true)==false)
		return false;
		if(checkCorrect3(document.frmadd.petr_date,"Date",true)==false)
		return false;
	}
</script> 
    
  <div id="portlet-config1" class="modal hide">
    <div class="modal-header"> <a class="btn red icn-only" data-dismiss="modal" style="float:right" href="#"><i class="icon-remove icon-white"></i></a>
      <h3>Manage Heading</h3>
    </div>
    <div class="modal-body">
      <form method='post' class="form-horizontal" name="heading1"  action="<?php echo base_url('admin/PATH0005/heading'); ?>" >
        <div class="row-fluid">
          <div class="span8 ">
            <div class="control-group">
              <label class="control-label" for="Gender">Test Name 12</label>
              <div class="controls">
                <input type="text" id="" name='' class="m-wrap span12" placeholder="Test Name" >
              </div>
            </div>
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" name='sub'  value='sub' class="btn blue" onclick="manageheading();"><i class="icon-ok"></i> Save</button>
          <button type="button" class="btn" data-dismiss="modal" >Cancel</button>
        </div>
      </form>
    </div>
  </div>
  <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM--> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid"> 
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12"> 
        <!-- BEGIN STYLE CUSTOMIZER -->
        <div class="color-panel hidden-phone"> 
          <!--<div class="color-mode-icons icon-color"></div>-->
          <div class="color-mode-icons icon-color-close"></div>
          <div class="color-mode">
            <p>THEME COLOR</p>
            <ul class="inline">
              <li class="color-black current color-default" data-style="default"></li>
              <li class="color-blue" data-style="blue"></li>
              <li class="color-brown" data-style="brown"></li>
              <li class="color-purple" data-style="purple"></li>
              <li class="color-grey" data-style="grey"></li>
              <li class="color-white color-light" data-style="light"></li>
            </ul>
            <label> <span>Layout</span>
              <select class="layout-option m-wrap small">
                <option value="fluid" selected>Fluid</option>
                <option value="boxed">Boxed</option>
              </select>
            </label>
            <label> <span>Header</span>
              <select class="header-option m-wrap small">
                <option value="fixed" selected>Fixed</option>
                <option value="default">Default</option>
              </select>
            </label>
            <label> <span>Sidebar</span>
              <select class="sidebar-option m-wrap small">
                <option value="fixed">Fixed</option>
                <option value="default" selected>Default</option>
              </select>
            </label>
            <label> <span>Footer</span>
              <select class="footer-option m-wrap small">
                <option value="fixed">Fixed</option>
                <option value="default" selected>Default</option>
              </select>
            </label>
          </div>
        </div>
        <h3 class="page-title"> <small></small> </h3>
      </div>
    </div>
    <?php
				$uri=$this->uri->segment(4);
				if($uri=="sucess1")
				{
				?>
    <div class="alert alert-error" id="success1">
      <button class="close" data-dismiss="alert"></button>
      <strong>Success!</strong>Manage Equipment successfully Delete.!!!! </div>
    <?php } ?>
    <?php
				$uri=$this->uri->segment(4);
				if($uri=="sucess"){ ?>
    <div class="alert alert-success" id="success"> <strong>Success!</strong> Manage Equipment successfully Append.!!!! </div>
    <?php } ?>
    <?php $cury=date('Y');?>
    <div class="row-fluid">
      <div class="span12">
        <div class="tabbable tabbable-custom boxless">
          <div class="tab-content1">
            <div class="tab-pane active" id="tab_1">
              <div class="portlet box blue">
                <div class="portlet-title">
                  <div class="caption">Manage Entry</div>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a> </div>
                </div>
                <script>
				function searchpetro()
				{
					$("#replacetable1").html('<center><img src="<?php echo base_url().'../assets/img/loading.gif'; ?>" /> </center>');
					var srch_org     =$("#srch_org").val();
					var srch_month   =$("#srch_month").val();
					var srch_year    =$("#srch_year").val();
					var srch_date2    =$("#srch_date2").val();
				
					
					 $.ajax({   
						type: "GET",  
						url: "<?php echo base_url('admin/HRD00017/search_petrol'); ?>",  
						data: "srch_org="+srch_org+"&srch_month="+srch_month+"&srch_year="+srch_year+"&srch_date2="+srch_date2, 
						success: function(msg){  
						$("#replacetable1").html(msg); 
							// alert(msg);
							}  
						}); 
					
				}
				</script>
                <div class="portlet-body form">
                  <div class="row-fluid">
                    <div class="span3">
                      <div class="control-group">
                        <label class="control-label" for="Gender">Organization</label>
                        <select id="srch_org" name="srch_org"   onchange="searchpetro();" value="<?php if(isset($_REQUEST['srch_org']) && $_REQUEST['srch_org']!=""){echo $_REQUEST['srch_org'];}?>" class="m-wrap span12" >
                          <option value="">Select Type</option>
                          <option value="1"<?php if(isset($_REQUEST['srch_org']) && $_REQUEST['srch_org']==1){ echo "selected";}?>>Metro Hospital</option>
                          <option value="2"<?php if(isset($_REQUEST['srch_org']) && $_REQUEST['srch_org']==2){ echo "selected";}?>>Global</option>
                        </select>
                      </div>
                    </div>
                    <div class="span3 ">
                      <div class="control-group">
                        <label class="control-label" for="firstName">Search by Month</label>
                        <div class="controls">
                          <select id="srch_month" name="srch_month" class="m-wrap span12" onchange="searchpetro();">
                            <option value="">Select Month</option>
                            <?php
		  	$cur_month=date('m');

		   $month=array("January"=>"01",
                    "February"=>"02",
                    "March"=>"03",
                    "April"=>"04",
                    "May"=>"05",
                    "June"=>"06",
                    "July"=>"07",
                    "August"=>"08",
                    "September"=>"09",
                    "October"=>"10",
                    "November"=>"11",
                    "December"=>"12",
                    );
				   foreach($month as $x=>$x_value)
					{?>
                            <option value="<?php echo $x_value;?>"> <?php echo $x;?></option>
                            <?php 				    	
					}
					?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="span3 ">
                      <div class="control-group">
                        <label class="control-label" for="firstName">Search by Year </label>
                        <div class="controls">
                          <select id="srch_year" name="srch_year" class="m-wrap span12" onchange="searchpetro();">
                            <option value="">Select Year</option>
                            <?php for($s=2014;$s<=$cury;$s++)
		  {?>
                            <option value="<?php echo $s;?>"><?php echo $s; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="span3">
                      <div class="control-group">
                        <label class="control-label" for="Gender">Search by Date</label>
                        <input type="text"  id="srch_date2"  onchange="searchpetro();"  name="srch_date2" value="<?php if(isset($_REQUEST['srch_date2']) && $_REQUEST['srch_date2']!=""){echo $_REQUEST['srch_date2'];}?>" class="m-wrap span12"  >
                      </div>
                    </div>
                  </div>
                  <!-- BEGIN FORM--> 
                  <?php echo form_open();?>
                  <div class="horizontal-form">
                    <div class="portlet box blue1">
                     <?php  $count2=0;
			    foreach ($result as $key=>$ft2)
                               {
								   $count2++;
							   }
							   ?>
							   <div id='print'>
		<a href='javascript:void(0);' onclick='prints();' class="btn purple big" style='background-color: #204988;'>Total IPD :<?php echo $count2 ;?> <i class="m-icon-big-swapright m-icon-white"></i></a>
		<br>
		<br>
			  
                      <br />
                      <div  id='print'>
                        <div  id='replacetable1'>
                          <div id='repl'>
                         	<table cellpadding="4" cellspacing="0" width="100%" border="0" class="CSSTableGenerator8" table-hover lightfont">
			              
                              <tr>
                                <td>S.no</td>
                                <td>UHID</td>
								<td>Reg-no</td>
                                <td>Patient Name</td>
								<td>Father/husband Name</td>
                                <td>Scheme</td>
                                <td>Contact</td>
                                <td>Reg Date</td>
                                <td>Action</td>
                              </tr>
			                <?php
			                $count=1;
	  	             foreach ($result as $key=>$ft)
                               {
                                
							?>
       						  <tr class="odd">
                                <td class=" sorting_1"><?php echo $count;?></td>
                                <td class=" sorting_1"><?php echo $ft['casu_uhid'];?></td>
								<td><?php echo $ft['casu_id'] ;?></td>
                                <td class=" " width='10px'><?php echo $ft['first_name']." ".$ft['middle_name']." ".$ft['last_name']; ?></td>
                                <td class=" "><?php echo $ft['fa_hus_name'];?></td>
 
                                <td class=" "><?php $this->Common_model->getSchemeName($ft['casu_id'],$ft['id'],"IPD"); ?></td>
								
                                <td class=" "><?php echo $ft['contact_no'];?></td>
                                <td class=" "><?php echo date('d-m-Y',strtotime($ft['casu_entrydt'])) ; ;?></td>
                              
                                <td class="">
								
								<a href="<?php echo base_url().'admin/MRD033/mrdDetails/'.$ft['casu_uhid'].'/'.$ft['casu_id'];?>" data-toggle="modal" class="config">
								<button type="button" class="btn mini" style="background-color:#44DED8" onclick="" value="1" id="bt">
									View
									</button> 
								</a>
								</td>
                               
                              </tr>
                             <?php 
                               $count++;
							 }  
							 
							 ?>
							 
							 
					</table>
                          </div>
                        </div>
                      </div>
                      <br />
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
</div>
</div>
<script>
function editit(id)
{
	// $('#name_'+id).hide();    $('#name1_'+id).show();
	
	$('#tot_amt_'+id).hide(); $('#tot_amt1_'+id).show();
	$('#editit_'+id).hide();  $('#saveit_'+id).show();
}
</script> 
<script>
	function save_it(id)
	{
		
		var tot_amt= $('#tot_amt1_'+id).val();
		$.ajax
		({
			type : 'POST',
			url  : '<?php echo base_url("admin/HRD00017/edit_petrol_detail");?>',
			data : 'id='+id+'&tot_amt='+tot_amt,
			success: function(msg){  
									$("#repl").html(msg); 
								  }
			
		});
	}
</script> 
<script type="text/javascript">
function prints1(){
var m  =  document.getElementById('print').innerHTML;
var s  =  document.body.innerHTML;
 $('#hid').hide();
document.body.innerHTML= document.getElementById('print').innerHTML;
window.print();
document.body.innerHTML = s;
}
</script> 
<script>
		function search()
		{
		var name= document.getElementById('first_name').value;
		var uhid= document.getElementById('uhid').value;
		//var contact_no= document.getElementById('contact_no').value;
		//var date= document.getElementById('date').value;
	//alert(date);
		   try {
	
	$.ajax({   
        type: "GET",  
        url: "<?php echo base_url('admin/PATH0005/searchPatient'); ?>",  
        data: "name="+name+"&uhid="+uhid, 
		 
        success: function(msg){  
            $("#opdresult").html(msg); 
        }  
    }); 
	}
	catch (e) {
        alert(e);
    } 
		}
       </script> 
<script type="text/javascript">
	function confirm_delete(){
		if(confirm(" Are you sure you want to delete this Heading.")){
			return true;
		}else{
			return false;
		}
	}
</script> 
<script>
		function getPerformer(id,)
		{
		 $('#id').val(id);
		}
</script> 
<script >
$(".modal").on('shown', function() {
    $(this).find("[autofocus]:first").focus();
});
</script> 

<script>
setTimeout(function() {
    $('#success').fadeOut('fast');
    $('#success1').fadeOut('fast');
}, 3000); 
</script> 
<script>
		$(function() {
	$("#equip_instaldt").datepicker({changeMonth:true,changeYear:true,dateFormat: 'yy-mm-dd'});		
	$("#srch_date2").datepicker({changeMonth:true,changeYear:true,dateFormat: 'yy-mm-dd'});		
});
</script> 
        
<script>
$(function() {
$( "#petr_date" ).datepicker({changeMonth:true,changeYear:true,dateFormat: 'yy-mm-dd'});		
});
</script> 
<script type="text/javascript">
function prints(){
var m  =  document.getElementById('print').innerHTML;
var s  =  document.body.innerHTML;

document.body.innerHTML= document.getElementById('print').innerHTML;

 window.print();

document.body.innerHTML = s;
}

</script>