<?php
session_start();
include("controller.php"); 
if(isset($_SESSION['user_id'])):
	$right=0;
	$write_right=0;
	for($i=0;$i<count($_SESSION['permission']);$i++){
	if($_SESSION['permission'][$i][$i]['pid']==20):
	  $right=1;
	  break;
	endif;
	}
	
	if($right==0):
			$host  = $_SERVER['HTTP_HOST'];
			$extra = 'ibniapp/includes/401.php';
			header("Location: http://$host/$extra");
			exit;
	endif;
else:
	$host  = $_SERVER['HTTP_HOST'];
	$extra = '/account/login';
	header("Location: http://$host/$extra");
endif;

?>
<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!-->
<html class="no-js" lang="en">
	<!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Ibni Spa Resorts : Inventory Management Solution</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">

		<!-- http://www.kylejlarson.com/blog/2012/iphone-5-web-design/ -->
		<meta name="viewport" content="user-scalable=0, initial-scale=1.0">

		<?php
        include (SERVER_FILE_PATH . "includes/scripts.php");
		?>
		<link rel="stylesheet" href="<?php echo MAIN_PATH ?>js/libs/glDatePicker/developr.fixed.css?v=1">
		<link rel="stylesheet" href="<?php echo MAIN_PATH ?>js/libs/formValidator/developr.validationEngine.css?v=1">
		 <link rel="stylesheet" href="<?php echo MAIN_PATH ?>css/styles/table.css?v=1">
		  <link rel="stylesheet" href="<?php echo MAIN_PATH ?>css/styles/modal.css?v=1">
		 
		 <link rel="stylesheet" href="<?php echo MAIN_PATH ?>css/autocomplete.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="<?php echo MAIN_PATH ?>js/libs/DataTables/jquery.dataTables.css?v=1">
		<!-- Microsoft clear type rendering -->
		<meta http-equiv="cleartype" content="on">

		<!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
		<meta name="application-name" content="Developr Admin Skin">
		<meta name="msapplication-tooltip" content="Cross-platform admin template.">
		<meta name="msapplication-starturl" content="http://www.display-inline.fr/demo/developr">
		<!-- These custom tasks are examples, you need to edit them to show actual pages -->
		<meta name="msapplication-task" content="name=Agenda;action-uri=http://www.display-inline.fr/demo/developr/agenda.html;icon-uri=http://www.display-inline.fr/demo/developr/img/favicons/favicon.ico">
		<meta name="msapplication-task" content="name=My profile;action-uri=http://www.display-inline.fr/demo/developr/profile.html;icon-uri=http://www.display-inline.fr/demo/developr/img/favicons/favicon.ico">
		<script src="<?php echo MAIN_PATH ?>js/jquery.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/dimensions.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/autocomplete.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/autocomplete1.js"></script>
           <script src="<?php echo MAIN_PATH ?>js/autocompleteProductgrp1.js"></script>
		<style>
		table.display {
margin: 0 auto;
width: 100%;
clear: both;
border-collapse: collapse;
table-layout: fixed; // ***********add this 
word-wrap:break-word; // ***********and this 

}
table.display1 {
margin: 0 auto;
width: 100%;
clear: both;
border-collapse: collapse;
table-layout: fixed; // ***********add this 
word-wrap:break-word; // ***********and this 

}
.word
{
word-wrap: break-word;
width:10%;
display: inline-block;
}
		</style>
	</head>

	<body class="clearfix with-menu with-shortcuts">

		<!-- Prompt IE 6 users to install Chrome Frame -->
		<!--[if lt IE 7]><p class="message red-gradient simpler">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

		<?php
        include (SERVER_FILE_PATH . "includes/header.php");
		?>

		<!-- Button to open/hide menu -->
		<a href="#" id="open-menu"><span>Menu</span></a>

		<!-- Button to open/hide shortcuts -->
		<a href="#" id="open-shortcuts"><span class="icon-thumbs"></span></a>

		<!-- Main content -->
		<section role="main" id="main">

			<noscript class="message black-gradient simpler">
				Your browser does not support JavaScript! Some features won't work as expected...
			</noscript>
			
            <ul style="margin-left:20px; margin-top: 43px;" class="blocks-list anthracite" >
        <li>
        <a href="<?php echo MAIN_PATH ?>">&nbsp;Home&nbsp;</a>&gt;&nbsp;Purchase&nbsp;&gt;&nbsp;<a href="<?php echo MAIN_PATH ?>purchase/view" >Purchase&nbsp;</a>&gt;&nbsp;Add&nbsp;&nbsp;
        </li>
        </ul>  
        
			<hgroup id="main-title" class="thin anthracite">
				<h1>PURCHASE</h1>

			</hgroup>

			<div class="with-padding">
				<div class="columns">

	
                     <ul class="blocks-list square-46 children-tooltip" data-tooltip-options="{"classes":["anthracite-gradient","big-text","with-padding"]}" style="margin-left:2.25%;">
            	<li title="List Purchase"><a href="<?php echo MAIN_PATH ?>purchase/view?from=mst" class="icon-list icon-size2"></a></li>
            </ul>
           
					<div class="new-row-mobile ten-columns twelve-columns-portrait twelve-columns-tablet twelve-columns-mobile">

					<div class="standard-tabs margin-bottom same-width">

						<ul class="tabs" id="tabs">
							<li class="active anthracite"><a href="#tab-1">Header</a></li>
							<li class="anthracite"><a href="#tab-2" id="tb2">Item Details</a></li>
                            <li class="anthracite"><a href="#tab-3" id="tb3" >Single Item Details</a></li>
							<!--<li class="anthracite"><a href="#tab-3" id="tb3" >View Single Items</a> </li>-->
						</ul>

						<div class="tabs-content">

							<div id="tab-1" class="with-padding">

								
						<form id="AddPurchase">
							<div class="block margin-bottom">

								<h3 class="block-title">
                                <?php if(isset($_GET['id'])):
                               			echo " Edit Purchase";
									else:
                                		echo "Add New Purchase";
									endif; ?>
                                
                        </h3>

								<div class="with-padding">  
									
                                    <p class="block-label button-height" id="ordernum">
										<label for="validation-select" class="label anthracite">Reference No/PO Number</label>
										<select id="ordernum" name="validation-select" class="select validate[required]" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
                                        <option value="">Select Reference/PO Number</option>
											<?php
												if(count($po_lists)>0)
												{
												$i=0;
												foreach($po_lists as $po_list)
												{
											?>
										<option value="<?php echo $po_list[$i]['po_id']; ?>"><?php echo $po_list[$i]['po_id']; ?></option>
														<?php
														$i++; }} ?>
                                             <option value="0">Others</option>
										</select>
                                         <div id="loading" style="margin-left: 63%;  margin-top: -4%; display:none;"></div>
                                        </p>
                                       
                                        <p>
                                        <input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['refno']; } ?>" class="input anthracite validate[required,custom[onlyLetterNumber],funcCall[checkPrev_req]]" id="ordernum" name="ordernum" data-tooltip-options='{"position":"right"}' maxlength="5" style="display:none;" size="26"  >
                                        
                                        
                                    </p>
                                  
	
                                     <p class="block-label button-height" id="vendor">
										<label class="label anthracite" for="validation-required">Supplier Name</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['vname']; } ?>" maxlength="50" invid="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['vid']; } ?>" class="input anthracite full-width validate[required,funcCall[checkvendor]]" id="vid" name="vid" data-tooltip-options='{"position":"right"}' <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?> <?php if(!empty($editInfo)): echo 'disabled'; endif; ?>>
                                        <div id="loadvendor" style="margin-left:57%; margin-top: -7%; display:none;"></div>
									</p>
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Invoice No: </label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['inv_num']; } ?>" class="input anthracite  validate[required,custom[onlyLetterNumber],funcCall[checkPrev_invoice]]" id="inv_no" name="inv_no" data-tooltip-options='{"position":"right"}' maxlength="8"  size="25" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
									</p>
          							
                                    
                        				
                                    
                              	<div class="right-column">
					             	<p class="button-height">
                                        <label class="label anthracite" for="validation-required"><strong>Invoice Date</strong> </label><br />
                                        <span class="input">
                                                <span class="icon-calendar"></span>
                                                <input type="text" name="datepicker" id="datepicker" class="input-unstyled datepicker validate[required,funcCall[checkHELLO1]]" value="<?php if(!empty($editInfo)){  $sqldate=$editInfo[0][0]['inv_dt']; $date = new DateTime($sqldate); echo $date->format('d-m-Y'); } else { echo date("d-m-Y");}
												
												//echo $editInfo[0][0]['inv_dt']; } ?>" size="22" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
                                        </span>
									</p>
                                      <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Name of Transport</label>
										<input type="text" value="<?php if(!empty($editInfo)){  echo $editInfo[0][0]['transport_name']; }  ?>" class="input anthracite  " id="trname" name="trname" data-tooltip-options='{"position":"right"}' maxlength="100" size="25" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
									</p>
                                    
                                    <p class="block-label button-height">
										<label class="label anthracite" for="block-label-1">Terms of Delivery<small>(255 chars max.)</small></label>
										<textarea class="input anthracite full-width autoexpanding" id="terms" name="autoexpanding" style="overflow: hidden; resize: none; height: 190px;" maxlength="255" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?> ><?php  if(!empty($editInfo)){ echo $editInfo[0][0]['terms']; } ?></textarea>										
									</p>

									<div id="inline-datepicker"></div>
								</div>
                                    <fieldset class="fieldset two-columns">
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Tax Amount</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['tax_amt']; } ?>" class="input anthracite full-width" id="tax" name="tax" data-tooltip-options='{"position":"right"}' readonly style="width: 200px;" >
									</p>
                                    
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Discount </label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['disc_amt']; } ?>" class="input anthracite full-width" id="disc" name="disc" data-tooltip-options='{"position":"right"}' readonly style="width: 200px;">
									</p>
                                    
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Total Amount</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['total_amt']; }  ?>" class="input anthracite full-width" id="total_amt" name="total_amt" data-tooltip-options='{"position":"right"}' readonly style="width: 200px;" product_total="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['pdctsum']; }  ?>" >
                                       
                                        
									</p>
                                   </fieldset>
                                   
                                   <fieldset class="fieldset two-columns" style="margin-top: -224px; margin-left: 260px;">
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Invoice Tax Amount</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['inv_tax']; } ?>" class="input anthracite full-width validate[required,custom[number]]" id="invtax" name="invtax" data-tooltip-options='{"position":"right"}'  style="width: 200px;" maxlength="14" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
									</p>
                                    
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Invoice Discount </label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['inv_disc']; } ?>" class="input anthracite full-width validate[required,custom[number]]" id="invdisc" name="invdisc" data-tooltip-options='{"position":"right"}'  style="width: 200px;" maxlength="14" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
									</p>
                                    
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Invoice Amount</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['inv_amt']; }  ?>" class="input anthracite full-width validate[required,custom[number]]" id="inv_amt" name="inv_amt" data-tooltip-options='{"position":"right"}'  style="width: 200px;" maxlength="14" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
                                       
                                        
									</p>
                                   </fieldset>
                                   
                                   <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Loading/Unloading Cost</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['load']; }  ?>" class="input anthracite validate[custom[number]]" id="load_cost" name="load_cost" data-tooltip-options='{"position":"right"}' maxlength="14" size="25" onKeyUp="totalamountchange(this.id,event)" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
									</p>
                                    
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Freight Cost</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['ship']; }  ?>" class="input anthracite  validate[custom[number]]" id="ship_cost" name="ship_cost" data-tooltip-options='{"position":"right"}' maxlength="14" size="25" onKeyUp="totalamountchange(this.id,event)" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
									</p>
                                    
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Others</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['others_cost']; }  ?>" class="input anthracite  validate[custom[number]]" id="others_cost" name="others_cost" data-tooltip-options='{"position":"right"}' maxlength="14" size="25" onKeyUp="totalamountchange(this.id,event)" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
									</p>
                                    
                                   <!-- <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Adjustment Amount</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['adjamnt']; }  ?>" class="input anthracite validate[custom[number]]" id="adj_amt" name="adj_amt" data-tooltip-options='{"position":"right"}' maxlength="14" size="25" onkeyup="totalamountchange(this.id,event)">
									</p>-->
                                    
                                    
                                    <p class="block-label button-height" id="warehouse">
										<label for="validation-select" class="label anthracite">Warehouse</label>
										<select id="warehouse" name="validation-select" class="select validate[required]" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
                                        <option value="">Select Warehouse</option>
											<?php
												if(count($warehouselist)>0)
												{
												$i=0;
												foreach($warehouselist as $whlist)
												{
											?>
										<option value="<?php echo $whlist[$i]['wid']; ?>"><?php echo $whlist[$i]['wname']; ?></option>
														<?php
														$i++; }} ?>
										</select>
                                    </p>
                                    
                                    	<div class="right-column">
					             	<p class="button-height">
                                        <label class="label anthracite" for="validation-required"><strong>Received Date</strong> </label><br />
                                        <span class="input">
                                                <span class="icon-calendar"></span>
                                                <input type="text" name="datepicker" id="datepicker1" class="input-unstyled datepicker validate[required,funcCall[checkHELLO]]" value="<?php if(!empty($editInfo)){  $sqldate1=$editInfo[0][0]['received_date']; $date1 = new DateTime($sqldate1); echo $date1->format('d-m-Y'); } else { echo date("d-m-Y");} ?>" size="22" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
                                        </span>
									</p>

									<div id="inline-datepicker"></div>
								</div>
                                
                                <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Receiver Name</label>
										<input type="text" value="<?php if(!empty($editInfo)){  echo $editInfo[0][0]['receiver_name']; }  ?>" class="input anthracite  validate[required] " id="rc_name" name="rc_name" data-tooltip-options='{"position":"right"}' maxlength="100"  size="25" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
									</p>
                                    
                                    <p class="block-label button-height">
										<label class="label anthracite" for="validation-required">Designation</label>
										<input type="text" value="<?php if(!empty($editInfo)){ echo  $editInfo[0][0]['designation']; }  ?>" class="input anthracite  validate[required] " id="desig" name="desig" data-tooltip-options='{"position":"right"}' maxlength="100" size="25" refno="<?php if(!empty($editInfo)){  echo $editInfo[0][0]['refno']; }  ?>" wrhsid="<?php if(!empty($editInfo)){  echo $editInfo[0][0]['wid']; }  ?>" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>>
									</p>
                                    
                                   
                                    
									 
                                    <p class="block-label button-height">
										<label class="label anthracite" for="block-label-1">Note <small>(255 chars max.)</small></label>
										<textarea class="input anthracite full-width autoexpanding" id="note" name="autoexpanding" style="overflow: hidden; resize: none; height: 190px;" maxlength="255" <?php if($_GET['type']=="mst"): echo 'disabled'; endif; ?>><?php  if(!empty($editInfo)){ echo $editInfo[0][0]['note']; } ?></textarea>										
									</p>
                                   
									<div class=" button-height">

										 <?php
											if( (!isset($_GET['type']))){
											
											?>
										<button class="button glossy mid-margin-right anthracite with-tooltip"  flg="" id="addpurchase" name="addpurchase" purid="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['id']; } ?>" type="submit" chkbutton="next">
											<span class="button-icon"><span class="icon-forward"></span></span>
											Next
										</button>
                                        
                                       
                                        
										
                                            
                                             <button class="button glossy mid-margin-right anthracite with-tooltip" title="Save Purchase as Draft" flg="" id="addpurchase" name="addpurchase" purid="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['id']; } ?>" type="submit" chkbutton="draft" >
											<span class="button-icon"><span class="icon-save"></span></span>
											Save As Draft
										</button>
                                            
                                            <button style="display:none;" class="button glossy anthracite  with-tooltip"  type="button" id="FinishPurchase" purid="" onClick="finishpurchase('FinishPurchase',event)">
											<span class="button-icon"><span class="icon-download"></span></span>
											Finish
										</button>
                                        
                                        <button class="button glossy anthracite with-tooltip" title="Cancel Purchase" type="reset" id="purchasecancel" purid="">
											<span class="button-icon red-gradient"><span class="icon-cross-round"></span></span>
											Cancel
										</button>
										<?php } ?>
										
										                                        
									</div>
								</div>

							</div>
						</form>

							</div>

							<div id="tab-2" class="with-padding">
						
					<table class="table responsive-table responsive-table-on" id="sorting-example1">
							<?php
							
								if( (!isset($_GET['type']))){?>
							<button type="submit" lastpurid="<?php echo $id; ?>" class="button glossy mid-margin-right anthracite with-tooltip" title="Add Items" id="additems" style="float: right; margin-bottom: 5px;">
								<span class="button-icon left-side"><span class="icon-plus"></span></span>Add Item
							</button>
							<?php }
							//}
							?>
                            
							
							
					
				<thead>
                <tr>
						
                            
                            <th scope="col" width="2%">
							<input type="checkbox" name="check-all" id="check-all" class="checkbox mid-margin-left" value="1">
							</th>
							<th class="anthracite" width="1%" scope="col">Sl No</th>
                           <th scope="col" width="3%" class="anthracite">Item</br>Code</th>
							<th scope="col" width="10%" class="anthracite">Item Name</th>
							<th scope="col" width="10%" class="hide-on-mobile align-left anthracite">Specifi</br>cation</th>
							<!--<th scope="col" width="2%" class="hide-on-mobile anthracite">UOM</th>
							<th scope="col" width="3%" class="hide-on-mobile-portrait anthracite">Type</th>
							<th scope="col" width="2%" class="hide-on-mobile-portrait anthracite">Mod</th>-->
                            <th scope="col" width="3%" class="hide-on-mobile-portrait anthracite">Qty</th>
                            <th scope="col"  width="10%" class="hide-on-tablet anthracite">Rate</th>
							<!--<th scope="col" width="6%" class="hide-on-tablet anthracite">Disc</th>-->
							<th scope="col" width="6%" class="hide-on-tablet anthracite">Tax(%)</th>
                            <th scope="col"  width="10%" class="hide-on-mobile anthracite">Total</th>
							<th scope="col" width="15%" class="align-left anthracite">Actions</th>
                            
					</tr>
                
				</thead>
					<tfoot>
						<tr>
                        <td colspan="13">
                        	<?php if (!isset($_GET['type'])) {
									?>
                                     <button type="submit" class="button glossy mid-margin-right anthracite with-tooltip" title="Delete Items" id="Alldelete" onClick="Allpdctdelete(event);" >
								<span class="button-icon red-gradient left-side"><span class="icon-trash"></span></span>Delete
							</button>
                           
                                    <p class="block-label button-height" style="margin-top:16px;">
                                   
										<label class="label anthracite" for="block-label-1">Remarks <small>(255 chars max.)</small></label>
										<textarea class="input anthracite full-width autoexpanding" id="remarks" name="autoexpanding" style="overflow: hidden; resize: none; height: 190px; width: 90%;" maxlength="255" ><?php  if(!empty($editInfo)){ if($editInfo[0][0]['remarks']=='undefined'  || $editInfo[0][0]['remarks']==" "){echo "";} else{         echo $editInfo[0][0]['remarks']; }}else { echo "";} ?></textarea>										
									</p>
                                    
                                     <button  class="button glossy mid-margin-right anthracite with-tooltip" title="Save Purchase as Draft" flg="" id="saveas" name="saveas" purid="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['id']; } ?>" type="submit" chkbutton="draft" onClick="saveasdraft(event)" >
											<span class="button-icon"><span class="icon-save"></span></span>
											Save As Draft
										</button> 
                                    
                                     <button style="display:none;" class="button glossy anthracite  with-tooltip"  type="button" id="FinishthisPurchase" onClick="finishpurchase('FinishthisPurchase',event)" purid="">
											<span class="button-icon"><span class="icon-download"></span></span>
											Finish
										</button>&nbsp;&nbsp;
                                    
                                    
							
                            
                            <button class="button glossy anthracite with-tooltip" title="Cancel Purchase" type="reset" id="purcancel" onClick="purchasecancel('purcancel',event)" purid="">
											<span class="button-icon red-gradient"><span class="icon-cross-round"></span></span>
											Cancel
										</button>
                            
							<?php } ?>
							</td>
						</tr>
					</tfoot>
		

				<tbody>
				
					
                     <?php
					 
                        if(count($itemsdatas)>0)
                        {
                          
                        $i=0;
                        foreach($itemsdatas as $itemsdata)
                        {?>
					<tr id="<?php echo $itemsdata[$i]['id']; ?>">
						<td scope="row" class="checkbox-cell"><input type="checkbox" class="checkbox mid-margin-left"  name="type" id="check-1" value="<?php echo $itemsdata[$i]['id']; ?>"></td>
						<td style=" overflow: hidden; word-wrap: break-word;" id="headerid<?php echo $itemsdata[$i]['id']; ?>"><?php echo $itemsdata[$i]['id1']; ?></td>
                       <td style=" overflow: hidden; word-wrap: break-word;" id="prd_code<?php echo $itemsdata[$i]['id']; ?>" disctype="<?php echo $itemsdata[$i]['discount_type']; ?>" discamount="<?php echo $itemsdata[$i]['disc_val']; ?>" taxamount="<?php echo $itemsdata[$i]['tax_val']; ?>" ><?php echo wordwrap($itemsdata[$i]['prd_code'],4, "\n", true);   ?></td>
                       
                        <td  style=" overflow: hidden; word-wrap: break-word;" id="prdname<?php echo $itemsdata[$i]['id']; ?>" prdid="<?php echo $itemsdata[$i]['prd_id']; ?>"  grpid="<?php echo $itemsdata[$i]['grpid']; ?>"  other="<?php echo $itemsdata[$i]['othercost']; ?>" ><?php echo wordwrap($itemsdata[$i]['prdname'],5, "\n", true);  ?></td>
                        
                        <td class="hide-on-mobile" style=" overflow: hidden; word-wrap: break-word;" id="vend_name<?php echo $itemsdata[$i]['id']; ?>" uom="<?php echo $itemsdata[$i]['puom']; ?>" type="<?php echo $itemsdata[$i]['ptype']; ?>" sel_uom="<?php echo $itemsdata[$i]['sel_uom']; ?>" ><?php 
						
						//echo $itemsdata[$i]['specification']; 
						echo wordwrap($itemsdata[$i]['specification'],8, "\n", true);
						?></td>
                        
						<!--<td class="hide-on-mobile" style="overflow: hidden; word-wrap: break-word;" id="puom<?php echo $itemsdata[$i]['id']; ?>"><?php echo $itemsdata[$i]['puom']; ?></td>
                        <td class="hide-on-mobile-portrait" style="overflow: hidden; word-wrap: break-word;" id="ptype<?php echo $itemsdata[$i]['id']; ?>"><?php echo $itemsdata[$i]['ptype']==1 ? 'Single' : 'Bulk'; ?></td>
						<td class="hide-on-mobile-portrait" style="overflow: hidden; word-wrap: break-word;" id="pmodel<?php echo $itemsdata[$i]['id']; ?>"><?php echo $itemsdata[$i]['model']==1 ? 'Paid' : 'Free'; ?></td>-->
                       <td class="hide-on-mobile-portrait" style="overflow: hidden; word-wrap: break-word;" id="pqty<?php echo $itemsdata[$i]['id']; ?>" qty="<?php echo $itemsdata[$i]['qty']; ?>" ><?php //echo floatval($itemsdata[$i]['qty'])."</br>(".$itemsdata[$i]['puom'].")";
					   				 if($itemsdata[$i]['ptype']==1)
								   {
								   
									 echo (int)$itemsdata[$i]['qty']."(".$itemsdata[$i]['puom'].")"; 
								   }
								   else
								   {
										if($itemsdata[$i]['puom']=="KG")
										{
											if($itemsdata[$i]['sel_uom']=="TON")
											{
												$qty=$itemsdata[$i]['qty']/1000;
												echo floatval($qty)."(".$itemsdata[$i]['sel_uom'].")"; 
												
											}
											else
											{
												echo floatval($itemsdata[$i]['qty'])."(".$itemsdata[$i]['puom'].")"; 
											}
										}
										else
										{
											echo floatval($itemsdata[$i]['qty'])."(".$itemsdata[$i]['puom'].")"; 
										}
										
									
								   }	
					   	
					   
					    ?>
                       
                       
                       
                       
                       
                       </td>
                         
                       <td class="hide-on-tablet" style="overflow: hidden; word-wrap: break-word;" id="prate<?php echo $itemsdata[$i]['id']; ?>" disc="<?php echo $itemsdata[$i]['disc']; ?>" rate="<?php echo $itemsdata[$i]['rate']; ?>"><?php //echo $itemsdata[$i]['rate']; 
					   			 if($itemsdata[$i]['ptype']==1)
								   {
								   
									 echo  $itemsdata[$i]['rate'];
								   }
								   else
								   {
										if($itemsdata[$i]['puom']=="KG")
										{
											if($itemsdata[$i]['sel_uom']=="TON")
											{
												if($itemsdata[$i]['rate']!=""):
													$rate=$itemsdata[$i]['rate']*1000;
												else :
													$rate="";
												endif;
												echo $rate; 
												
											}
											else
											{
												echo $itemsdata[$i]['rate'];
											}
										}
										else
										{
											echo $itemsdata[$i]['rate'];
										}
										
									
								   }	
					   
					   
					   
					   ?></td>
                       
                       <!--<td class="hide-on-tablet" style="overflow: hidden; word-wrap: break-word;" id="pdisc<?php echo $itemsdata[$i]['id']; ?>"><?php echo $itemsdata[$i]['disc']; ?></td>-->
						<td class="hide-on-tablet" style="overflow: hidden; word-wrap: break-word;" id="ptax<?php echo $itemsdata[$i]['id']; ?>" mod="<?php echo $itemsdata[$i]['model']; ?>" ><?php echo $itemsdata[$i]['tax']; ?></td>
                        
                       <td class="hide-on-mobile" style=" overflow: hidden; word-wrap: break-word;" id="pamount<?php echo $itemsdata[$i]['id']; ?>" pspec="<?php echo $itemsdata[$i]['specification']; ?>"><?php echo $itemsdata[$i]['amount']; ?></td>
                       
                       <td class="low-padding">
                       <?php if (!isset($_GET['type'])) {
									?>
                       <ul classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="Edit <?php //echo $vendordata[$i]['vendor']; ?>"><a href="javascript:void(0)" id="purdtledit"  onClick="purdtledit('<?php echo $itemsdata[$i]['id']; ?>',event);" detailid="<?php echo $itemsdata[$i]['id']; ?>" class="icon-pencil icon-size2"></a></li> <?php if($itemsdata[$i]['ptype']==1){?><li title="View Single Items <?php //echo $vendordata[$i]['vendor']; ?>"><a href="javascript:void(0)" id="singleview" onClick="singleviewitem('<?php echo $itemsdata[$i]['id']; ?>',event);"  detail_id="<?php echo $itemsdata[$i]['id']; ?>" class="icon-numbered-list icon-size2"></a></li> <?php } ?></ul>
                       
                       
                       <?php //if($itemsdata[$i]['ptype']==1){?>
                       <!-- <ul style="margin-top: -224px; margin-left: 31px;" classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="View Single Items <?php //echo $vendordata[$i]['vendor']; ?>"><a href="javascript:void(0)" id="singleview" onClick="singleviewitem('<?php echo $itemsdata[$i]['id']; ?>',event);"  detail_id="<?php echo $itemsdata[$i]['id']; ?>" class="icon-numbered-list icon-size2"></a></li></ul>-->
                       <?php // }
					    }
					   else
					   {
					   if($itemsdata[$i]['ptype']==1){
					   ?>
                       <ul  classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="View Single Items "><a href="javascript:void(0)" id="singleview" detail_id="<?php echo $itemsdata[$i]['id']; ?>" onClick="singleviewitem('<?php echo $itemsdata[$i]['id']; ?>',event);" class="icon-numbered-list icon-size2"></a></li></ul>
                    <?php
					}}
					?>
                   
                       
                       </td>
                       
						
					</tr>
					
					<?php  
                         $i++; 
                            }}
                        ?>
				
						
				</tbody>

			</table>

							</div>
                                <div id="tab-3" class="with-padding">
                                
                                <form id="Addsingle">
                                
                                
								<table class="table responsive-table responsive-table-on" id="sorting-example2">
							
				<thead>
                <tr>
						<!--<th width="10%" scope="col">
							<input type="checkbox" name="check-all" id="check-all" class="checkbox mid-margin-left" value="1">
							</th>-->
							<th width="10%" class="anthracite" scope="col">Item</th>  
                               <th width="12%" class="hide-on-portrait anthracite" scope="col">Specification</th>
                            <th width="15%" class="anthracite" scope="col">SL NO</th> 
                            <th width="15%" class="hide-on-mobile anthracite" scope="col">Model</th>  
                            <th width="15%" class="hide-on-mobile anthracite" scope="col">Warranty </br>Expiry Date</th>
                         
                                             
							<?php //if (!isset($_GET['type'])) { ?><th width="16%" scope="col" class="align-left anthracite">Actions</th><?php //} ?>
					</tr>
                
				</thead>
					<tfoot>
						<tr>
                        <td colspan="13">
                        <?php if (!isset($_GET['type'])) {
									?>
                        	<button  class="button glossy mid-margin-right anthracite with-tooltip" title="Save Purchase as Draft" flg="" id="saveas" name="saveas" purid="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['id']; } ?>" type="submit" chkbutton="draft" onClick="saveasdraft(event)" >
											<span class="button-icon"><span class="icon-save"></span></span>
											Save As Draft
										</button> 
                                    
                                     <button style="display:none;" class="button glossy anthracite  with-tooltip"  type="button" id="FinishmyPurchase" onClick="finishpurchase('FinishmyPurchase',event)" purid="">
											<span class="button-icon"><span class="icon-download"></span></span>
											Finish
										</button>&nbsp;&nbsp;
                                    
                                    
							
                            
                            <button class="button glossy anthracite with-tooltip" title="Cancel Purchase" type="reset" id="purcancelitem" onClick="purchasecancel('purcancelitem',event)" purid="">
											<span class="button-icon red-gradient"><span class="icon-cross-round"></span></span>
											Cancel
										</button>
                        	<?php } ?>
							</td>
						</tr>
					</tfoot>
		

				<tbody >
				
					
                     <?php
					 
                        if(count($singledatas)>0)
                        {
                          
                        $i=0;
                        foreach($singledatas as $singledata)
                        {?>
					<tr id="<?php echo $singledata[$i]['id']; ?>" class='edit_tr'>
						
					<td style=" overflow: hidden; word-wrap: break-word;" id="bprd<?php echo $singledata[$i]['id']; ?>"  bprdid="<?php echo $singledata[$i]['prd_id']; ?>"><?php echo $singledata[$i]['name']; ?></td>
                    
                     <td style=" overflow: hidden; word-wrap: break-word;" id="bexp<?php echo $singledata[$i]['id']; ?>" class="hide-on-portrait">
                     
                     <span id='four_<?php echo $singledata[$i]['id']; ?>' class='text'><?php if($singledata[$i]['spec']=="undefined" || $singledata[$i]['spec']==""){ 				$spec = wordwrap($singledata[$i]['description'], 16, "\n", true);
						echo "$spec\n" ;//echo "";
					  }else { //echo $singledata[$i]['spec']; 
					  $spec = wordwrap($singledata[$i]['spec'], 16, "\n", true);
						echo "$spec\n";
					 
					  }?></span>
                      
                      <textarea class="editbox input anthracite autoexpanding" id='four_input_<?php echo $singledata[$i]['id']; ?>'  name="autoexpanding" style="overflow: hidden; resize: none; height: 190px; display: none; width:77%;" maxlength="200" ><?php if($singledata[$i]['spec']=="undefined" || $singledata[$i]['spec']==""){  $spec = wordwrap($singledata[$i]['description'], 16, "\n", true);
						echo "$spec\n" ; 
					  }
					  else { //echo $singledata[$i]['spec']; 
					  $spec = wordwrap($singledata[$i]['spec'], 16, "\n", true);
						echo "$spec\n";
					 
					  }
					  ?></textarea>					
                      
                      
                      
                    
                     
                     </td>
                     <td style=" overflow: hidden; word-wrap: break-word;" id="bslno<?php echo $singledata[$i]['id']; ?>">
                     
                     <span id='one_<?php echo $singledata[$i]['id']; ?>' class='text'><?php if($singledata[$i]['slnum']=="undefined" || $singledata[$i]['slnum']==""){ echo ""; }else { //echo $singledata[$i]['slnum'];
					 
					$newtext = wordwrap($singledata[$i]['slnum'], 8, "\n", true);
						echo "$newtext\n";
						 //echo $slnum; 
					  }?></span>
                      <input type='text' style="border: 1px inset #FFFFFF;  display: none;"  value='<?php if($singledata[$i]['slnum']=="undefined" || $singledata[$i]['slnum']==""){ echo ""; }else { echo $singledata[$i]['slnum']; 
					  }?>' class='editbox validate[required] input anthracite' id='one_input_<?php echo $singledata[$i]['id']; ?>' maxlength="100" size="10" / >
                     
                     </td>
                     
                     <td class="hide-on-mobile" style=" overflow: hidden; word-wrap: break-word;" id="bmodel<?php echo $singledata[$i]['id']; ?>">
                     <span id='two_<?php echo $singledata[$i]['id']; ?>' class='text'><?php if($singledata[$i]['model']=="undefined" || $singledata[$i]['model']==""){ echo ""; }else { //echo $singledata[$i]['model']; 
					 $modal = wordwrap($singledata[$i]['model'], 8, "\n", true);
						echo "$modal\n";
					  }?></span>
                      <input type='text' style="border: 1px inset #FFFFFF;  display: none;"  value='<?php if($singledata[$i]['model']=="undefined" || $singledata[$i]['model']==""){ echo ""; }else { echo $singledata[$i]['model']; 
					  }?>' class='editbox input anthracite' id='two_input_<?php echo $singledata[$i]['id']; ?>' maxlength="14" size="8" />
                     </td>
                    
                     
                     <td class="hide-on-mobile edit_tr" style="overflow: hidden; word-wrap: break-word;" id="bwar<?php echo $singledata[$i]['id']; ?>" >
                     
                     <span id='three_<?php echo $singledata[$i]['id']; ?>' class='text'><?php if($singledata[$i]['warnty']==0000-00-00){ echo "";} else if($singledata[$i]['warnty']!="" || $singledata[$i]['warnty']!=0000-00-00){$sqldate=$singledata[$i]['warnty']; $date = new DateTime($sqldate); echo $date->format('d-m-Y');} else { echo "";} ?></span>
           
                      <span class="input1" id='three_input_<?php echo $singledata[$i]['id']; ?>' style="display: none;">
                                                <span class="icon-calendar"></span>
                                                <input type="text" style="border: 1px inset #FFFFFF;  " name="datepicker" id='datepicker1_<?php echo $singledata[$i]['id']; ?>' class="input-unstyled input anthracite datepicker" size="8" value='<?php
								$sqldate=$singledata[$i]['warnty']; 
							if( $sqldate==""){echo " ";}else{$date = new DateTime($sqldate); echo $date->format('d-m-Y');}
											
												 ?>' onClick="setdatepicker(<?php echo $singledata[$i]['id']; ?>,event);">
                                        </span> 
                                        <div id="inline-datepicker"></div>
                     </td>
                    <!-- <td class="hide-on-mobile-portrait edit_tr" style="overflow: hidden; word-wrap: break-word;" id="bexp<?php echo $singledata[$i]['id']; ?>">
                     <span id='four_<?php echo $singledata[$i]['id']; ?>' class='text'><?php if($singledata[$i]['expdt']==0000-00-00){echo "";} else if($singledata[$i]['expdt']!=""){ $sqldate1=$singledata[$i]['expdt']; $date1 = new DateTime($sqldate1); echo $date1->format('d-m-Y'); } else { echo""; }?></span>
                      
                      <span class="input2" id='four_input_<?php echo $singledata[$i]['id']; ?>' style="display: none;">
                                                <span class="icon-calendar"></span>
                                                <input type="text" style="border: 1px inset #FFFFFF;"  name="datepicker" id='datepicker2_<?php echo $singledata[$i]['id']; ?>' class="input-unstyled datepicker" value='<?php //echo $singledata[$i]['expdt']; 
												$sqldate=$singledata[$i]['expdt'];
												if( $sqldate==""){echo " ";}else { $date = new DateTime($sqldate); echo $date->format('d-m-Y');}
												?>'  onclick="setdatepicker1(<?php echo $singledata[$i]['id']; ?>,event);">
                                        </span>
                     </td>-->
                    
                     
						<td class="low-padding">
								 
                                 <?php if (!isset($_GET['type'])) {
									?>
                                 
                                 <ul  classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="Update"><a href="javascript:void(0)" id="bulkitemedit" onClick="singleitemsave('<?php echo $singledata[$i]['id']; ?>',event);"  bulkid="<?php echo $singledata[$i]['id']; ?>" class="icon-tick icon-size2" pur="<?php echo $id; ?>"></a></li>
                                 
                                 <li title="Edit "><a href="javascript:void(0)" id="bulkitemedit_showtxtbox" onClick="singleshowtxtbox('<?php echo $singledata[$i]['id']; ?>',event);"  bulkid="<?php echo $singledata[$i]['id']; ?>" class="icon-pencil icon-size2" pur="<?php echo $id; ?>"></a></li>
                                 
                                   <li title="Delete "><a href="javascript:void(0)" id='singledlt_<?php echo $singledata[$i]['id']; ?>' onClick="singleitemdelete('<?php echo $singledata[$i]['id']; ?>','<?php echo $singledata[$i]['purchid']; ?>',event);"  bulkid="<?php echo $singledata[$i]['id']; ?>" class="icon-trash icon-size2" pur="<?php echo $id; ?>"></a></li></ul>
                                 
                            <?php }
						else { ?>
								 <ul  classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="Update"><a href="javascript:void(0)" id="bulkitemedit" onClick="singleitemsave('<?php echo $singledata[$i]['id']; ?>',event);"  bulkid="<?php echo $singledata[$i]['id']; ?>" class="icon-tick icon-size2" pur="<?php echo $id; ?>"></a></li>
                                 
                                 <li title="Edit "><a href="javascript:void(0)" id="bulkitemedit_showtxtbox" onClick="singleshowtxtbox('<?php echo $singledata[$i]['id']; ?>',event);"  bulkid="<?php echo $singledata[$i]['id']; ?>" class="icon-pencil icon-size2" pur="<?php echo $id; ?>"></a></li></ul>
						
						<?php } ?>     
							
						</td>
					</tr>
					
					<?php  
                         $i++;
                            }}
                        ?>
                        
                        
				
						
				</tbody>

			</table>
</form>
								
								</div>

						</div>

					</div>


						<div class="facts clearfix">

						</div>

					</div>

				</div>

			</div>

		</section>
		<!-- End main content -->

		<!-- Side tabs shortcuts -->

		<?php
        include (SERVER_FILE_PATH . "includes/left.php");
		?>
		<!-- Side tabs shortcuts with legends under the icons -->
		<!-- <ul id="shortcuts" role="complementary" class="children-tooltip tooltip-right with-legend">
		<li class="current"><a href="./" class="shortcut-dashboard" title="Dashboard"><span class="shortcut-legend">Dashboard</span></a></li>
		<li><a href="inbox.html" class="shortcut-messages" title="Messages"><span class="shortcut-legend">Messages</span></a></li>
		<li><a href="agenda.html" class="shortcut-agenda" title="Agenda"><span class="shortcut-legend">Agenda</span></a></li>
		<li><a href="tables.html" class="shortcut-contacts" title="Contacts"><span class="shortcut-legend">Contacts</span></a></li>
		<li><a href="explorer.html" class="shortcut-medias" title="Medias"><span class="shortcut-legend">Medias</span></a></li>
		<li><a href="sliders.html" class="shortcut-stats" title="Stats"><span class="shortcut-legend">Stats</span></a></li>
		<li class="at-bottom"><a href="form.html" class="shortcut-settings" title="Settings"><span class="shortcut-legend">Settings</span></a></li>
		<li><span class="shortcut-notes" title="Notes"><span class="shortcut-legend">Notes</span></span></li>
		</ul> -->

		<!-- Sidebar/drop-down menu -->
		<?php
        include (SERVER_FILE_PATH . "includes/right.php");


		?>
		<!-- End sidebar/drop-down menu -->

		<!-- JavaScript at the bottom for fast page loading -->

		<!-- Scripts -->
		
		   
		<!--
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
				<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->
		<script src="<?php echo MAIN_PATH ?>js/libs/jquery-1.10.2.min.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/setup.js"></script>
		
		<!-- Template functions -->
		<script src="<?php echo MAIN_PATH ?>js/developr.input.js"></script>
        <script src="<?php echo MAIN_PATH ?>js/developr.auto-resizing.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/developr.navigable.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/developr.notify.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/developr.scroll.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/developr.tooltip.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/developr.table.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/developr.tabs.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/developr.confirm.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/developr.modal.js"></script>
		


		<!-- Plugins -->
		<script src="<?php echo MAIN_PATH ?>js/libs/glDatePicker/glDatePicker.min.js?v=1"></script>
		<script src="<?php echo MAIN_PATH ?>js/libs/jquery.tablesorter.min.js"></script>
		<script src="<?php echo MAIN_PATH ?>js/libs/DataTables/jquery.dataTables.min.js"></script>
		
		<script>
		// To position the datepicker(inline edition)
		$('.datepicker').focus(function() { $(window).resize() });
		
		 
		 
		 function myFunctionproduct(pdct)
		 {
		 var t_amount=0;
		var t_tax=0;
		var t_disc=0;
		//alert(pdct);
		 if(pdct==null || pdct == ""){
				//alert("ifff");
			 $('#sorting-example1').dataTable().fnClearTable();
			
			}
			 else if(pdct.length >0)
			{
					//alert("elseee");
					$('#sorting-example1').dataTable().fnClearTable();
					for ( i = 0; i < pdct.length; i++) 
					{
						if(pdct[i][i].ptype==1)
						{
							var type="Single";
							var qty_uom=parseInt(pdct[i][i].qty)+'('+pdct[i][i].puom+')';
							var rate=pdct[i][i].rate;
							
						}
						else
						{
							var type="Bulk";
							//var qty_uom=parseFloat(pdct[i][i].qty)+'('+pdct[i][i].puom+')';
							
							if(pdct[i][i].puom=="KG")
							{
								if(pdct[i][i].sel_uom=="TON")
								{
									var qty=pdct[i][i].qty/1000;
									var qty_uom=parseFloat(qty)+'('+pdct[i][i].sel_uom+')';
									var rate=pdct[i][i].rate *1000;
								}
								else
								{
									var qty_uom=parseFloat(pdct[i][i].qty)+'('+pdct[i][i].puom+')';
									var rate=pdct[i][i].rate;
								}
															
							}
							else
							{
								var qty_uom=parseFloat(pdct[i][i].qty)+'('+pdct[i][i].puom+')';
								var rate=pdct[i][i].rate;
							}
							
							
						}
						if(pdct[i][i].model ==1)
						{
							var item="Paid";
						}
						else
						{
							var item = "Free";
						}
						var detailid=pdct[i][i].id;
						//alert(pdct[i][i].tax);
						
		/*				if(pdct[i][i].tax==null)
						{
							
							pdct[i][i].tax=0;
						}
						if(pdct[i][i].disc==null)
						{
							
							pdct[i][i].disc=0;
						}
						if(pdct[i][i].tax=="")
						{
							
							pdct[i][i].tax=0;
						}
						if(pdct[i][i].disc=="")
						{
							pdct[i][i].disc=0;
						}
						
						t_amount=parseFloat(t_amount)+parseFloat(pdct[i][i].amount);
						
						t_tax=parseFloat(t_tax)+parseFloat(pdct[i][i].tax);
						t_disc=parseFloat(t_disc)+parseFloat(pdct[i][i].disc);*/
						//alert(pdct[i][i].prdname);
						var chk='<span class="checkbox mid-margin-left replacement" id="checkspan'+pdct[i][i].id+'"  tabindex="0" onClick="checkchange('+pdct[i][i].id+',event);"><span class="check-knob"></span><input id="check'+pdct[i][i].id+'" class="" type="checkbox" value="'+pdct[i][i].id+'" name="type" tabindex="-1"   ></span>';
						if(pdct[i][i].ptype==1)
						{
							var action ='<ul classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="Edit'+pdct[i][i].prdname+'"><a href="javascript:void(0)" id="purdtledit" detailid="'+pdct[i][i].id+'" onclick="purdtledit('+detailid+',event);" class="icon-pencil icon-size2"></a></li><li  title="View Single Items"><a href="javascript:void(0)" id="singleview" detail_id="'+pdct[i][i].id+'" onclick="singleviewitem('+detailid+',event);"  class="icon-numbered-list icon-size2"></a></li></ul>';
						
						//alert(action);	
										
						}
						else
						{
							var action ='<ul classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="Edit'+pdct[i][i].prdname+'"><a href="javascript:void(0)" id="purdtledit" detailid="'+pdct[i][i].id+'" onclick="purdtledit('+detailid+',event);"  class="icon-pencil icon-size2"></a></li></ul>';
						}
					
						$('#sorting-example1').dataTable().fnAddData( [
																	chk,
																	pdct[i][i].id1,
																	pdct[i][i].prd_code,
																	pdct[i][i].prdname,
																	pdct[i][i].specification,
																	qty_uom,
																	rate,
																	pdct[i][i].tax,
																	pdct[i][i].amount,
																	action
															] );
															
															
						
															$('#sorting-example1 tr:last').attr('id',pdct[i][i].id);
			$(' #sorting-example1 tr:last td:nth-child(1) ').addClass("checkbox-cell");
			$(' #sorting-example1 tr:last td:first input:checkbox[id="check-1"]').addClass("checkbox");
			$(' #sorting-example1 tr:last td:nth-child(2)').attr('id',"headerid"+pdct[i][i].id);
			$(' #sorting-example1 tr:last td:nth-child(3)').attr('id',"prd_code"+pdct[i][i].id).attr('disctype',pdct[i][i].discount_type).attr('discamount',pdct[i][i].disc_val).attr('taxamount',pdct[i][i].tax_val);
			$(' #sorting-example1 tr:last td:nth-child(4)').attr('id',"prdname"+pdct[i][i].id).attr('prdid',pdct[i][i].prd_id).attr('grpid',pdct[i][i].grpid).attr('other',pdct[i][i].othercost).addClass("hide-on-mobile");
			
			$(' #sorting-example1 tr:last td:nth-child(5)').attr('id',"vend_name"+pdct[i][i].id).attr('uom',pdct[i][i].puom).attr('type',pdct[i][i].ptype).attr('sel_uom',pdct[i][i].sel_uom).addClass("hide-on-mobile");
			$(' #sorting-example1 tr:last td:nth-child(6)').attr('id',"pqty"+pdct[i][i].id).attr('qty',pdct[i][i].qty).addClass("hide-on-mobile-portrait");
			$(' #sorting-example1 tr:last td:nth-child(7)').attr('id',"prate"+pdct[i][i].id).attr('disc',pdct[i][i].disc).attr('rate',pdct[i][i].rate).addClass("hide-on-tablet");
			$(' #sorting-example1 tr:last td:nth-child(8)').attr('id',"ptax"+pdct[i][i].id).attr('mod',pdct[i][i].model).addClass("hide-on-tablet");
			$(' #sorting-example1 tr:last td:nth-child(9)').attr('id',"pamount"+pdct[i][i].id).attr('pspec',pdct[i][i].specification).addClass("");
			//$(' #sorting-example1 tr:last td:nth-child(9)').attr('id',"pamount"+pdct[i][i].id).attr('pspec',pdct[i][i].specification).addClass("hide-on-tablet");
						
					}
					
					
					
					//var ldcst=$("input#load_cost").val();
					//var shpcst=	$("input#ship_cost").val();
					//var othrcst=$("input#others_cost").val();
					
					//var sumcst=Number(ldcst)+Number(shpcst)+Number(othrcst)+Number(t_amount);
				
					//$ ("input#total_amt" ).val(sumcst);
			
					//$( "input#tax" ).val(t_tax);		
					//$( "input#disc" ).val(t_disc);				
					
							$('button#FinishthisPurchase').show();
							$('button#FinishmyPurchase').show();	
								
							$('button#FinishPurchase').show();
					
			 }
		 }
		 
	
		 
		 
		 
		 
		 
		 
		
		function myFunction(single)
		{
			
			if(single==null || single == ""){
						
						 $('#sorting-example2').dataTable().fnClearTable();
			}
			 
				else if(single.length >0){
				$('#sorting-example2').dataTable().fnClearTable();
					for ( i = 0; i < single.length; i++) 
					{
						var warnty="";
						var slnum="";
						var model="";
						var expdt="";
						var specific="";
						
						if(single[i][i].slnum ==null)
						{
							 slnum='';
						}
						else if(single[i][i].slnum =='undefined')
						{
							 slnum='';
						}
						else
						{
							var slnum = single[i][i].slnum;
						}
						
						
						
						
						if(single[i][i].model ==null)
						{
							
							model="";
						}
						else if(single[i][i].model =='undefined')
						{
							
							model="";
						}
						else
						{
							var model=single[i][i].model;
						}
						//alert(single[i][i].spec);
						if(single[i][i].spec ==null || single[i][i].spec =="")
						{
							
							//specific="";
							specific=single[i][i].description;
						}
						else if(single[i][i].spec =='undefined')
						{
							
							//specific="";
							specific=single[i][i].description;
						}
						else
						{
							var specific=single[i][i].spec;
						}
						
						
						
						if(single[i][i].expdt ==null)
						{
							
							 expdt="";
						}
						else if(single[i][i].expdt=='NaN-NaN-NaN')
						{
							 expdt="";
						}
						else
						{
							 expdt=single[i][i].expdt;
						}
											
						if(single[i][i].warnty==null)
						{
							 warnty="";
						}
						else if(single[i][i].warnty=='NaN-NaN-NaN')
						{
							 warnty="";
						}
						
						else
						{
							date=single[i][i].warnty;
							var warntys=date.split(' ');
							var dt=warntys[0].split('-');
							warnty=dt[2]+'-'+dt[1]+'-'+dt[0];
						}
						//alert(specific);
					
					
						var bulkid =single[i][i].id;
						var seccloumn='<span id="one_'+single[i][i].id+'" class="text"> '+slnum+'</span><input type="text" class="editbox input anthracite " id="one_input_'+single[i][i].id+'" value="'+slnum+'" size="10" maxlength="100" >';
						var thrdcolumn='<span id="two_'+single[i][i].id+'" class="text"> '+model+'</span><input type="text" class="editbox input anthracite " id="two_input_'+single[i][i].id+'" value="'+model+'" size="8">';
						
						var fourthcolumn='<span id="three_'+single[i][i].id+'" class="text"> '+warnty+'</span><span class="input1" id="three_input_'+single[i][i].id+'"><span class="icon-calendar" ></span><input type="text" style="border: 1px inset #FFFFFF;"  name="datepicker"   id="datepicker1_'+single[i][i].id+'" class="input-unstyled input anthracite datepicker" value=" '+warnty+'" onclick="setdatepicker('+single[i][i].id+',event);" size="8"></span><div id="inline-datepicker"></div>';
						//var fifthcolumn='<span id="four_'+single[i][i].id+'" class="text"> '+specific+'</span><input type="text" class="editbox input anthracite " id="four_input_'+single[i][i].id+'" value="'+specific+'" size="15">';
						
						
						var fifthcolumn='<span id="four_'+single[i][i].id+'" class="text"> '+specific+'</span><textarea class="editbox input anthracite autoexpanding" id="four_input_'+single[i][i].id+'"  name="autoexpanding" style="overflow: hidden; resize: none; height: 16px; display: none; width:64px;" maxlength="200" >'+specific+'</textarea>';
						
						var action='<ul  classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="Save "><a href="javascript:void(0)" id="bulkitemedit" onclick="singleitemsave('+bulkid+',event);"  bulkid="'+single[i][i].id+'" class="icon-tick icon-size2" pur=""></a></li></ul><ul style="margin-top: -224px; margin-left: 31px;" classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="Edit "><a href="javascript:void(0)" id="bulkitemedit_showtxtbox" onClick="singleshowtxtbox('+bulkid+',event);"  bulkid="'+bulkid+'" class="icon-pencil icon-size2" pur="'+bulkid+'"></a></li></ul><ul style="margin-top: -224px; margin-left: 31px;" classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="Delete "><a href="javascript:void(0)" id="singledlt_'+single[i][i].id+'" onClick="singleitemdelete('+single[i][i].id+','+single[i][i].purchid+',event);" class="icon-trash icon-size2" ></a></li></ul>';
						
						$('#sorting-example2').dataTable().fnAddData( [
																	single[i][i].name,
																	fifthcolumn,
																	seccloumn,
																	thrdcolumn,
																	fourthcolumn,
																	
																	action
															] );
															
						
					$('#sorting-example2 tr:last').attr('id',single[i][i].id).addClass("edit_tr");
					$(' #sorting-example2 tr:last td:nth-child(1)').attr('id',"bprd"+single[i][i].id);
					$(' #sorting-example2 tr:last td:nth-child(3)').attr('id',"bslno"+single[i][i].id);
					//).css({"word-wrap": "break-word","width":"40%","display": "inline-block"})
					$(' #sorting-example2 tr:last td:nth-child(4)').attr('id',"bmodel"+single[i][i].id).addClass("word hide-on-mobile ");
					$(' #sorting-example2 tr:last td:nth-child(5)').attr('id',"bwar"+single[i][i].id).addClass("hide-on-mobile");
					$(' #sorting-example2 tr:last td:nth-child(2)').attr('id',"bexp"+single[i][i].id).addClass("hide-on-portrait").css({"word-wrap": "break-word","width":"40%","display": "inline-block"});
				$(' #sorting-example2 tr:last td:nth-child(4)').addClass("hide-on-mobile");
					
					}
				}
		
		
		
		}
		
		/*$('html').click(function() {
$('.gldp-default').hide();
});
*/

/*$( "input.datepicker" ).blur(function() {

 $('.gldp-default').hide();
});*/
		 
		 function setdatepicker(idval,event)
		 {
		 	$('.gldp-default').hide();
		  event.preventDefault();
		 	
			 $('#datepicker1_'+idval).glDatePicker({
			 	zIndex : 100,
				showAlways: true,
				onClick: function(target, cell, date, data) {
				target.val(('0'+date.getDate()).slice(-2) + '-' +
               ("0"+(date.getMonth()+1)).slice(-2) + '-' +
                date.getFullYear());

            if(data != null) {
                alert(data.message + '\n' + date);
            }
			$('.gldp-default').hide();
        }   
			 });
		
		 
		 }
		 
		  function setdatepicker1(idval1,event)
		 {
		 	$('.gldp-default').hide();
		  event.preventDefault();
		 	
			 $('#datepicker2_'+idval1).glDatePicker({
			 	zIndex : 100,
				showAlways: true,
				onClick: function(target, cell, date, data) {
				target.val(('0'+date.getDate()).slice(-2) + '-' +
               ("0"+(date.getMonth()+1)).slice(-2) + '-' +
                date.getFullYear());

            if(data != null) {
                alert(data.message + '\n' + date);
            }
			$('.gldp-default').hide();
        }   
			 });
		 
		 }
		 
		  function singleitemdelete(singleid,purchid,event) {
		  	
			var data="";
			var headerdata="";
			var pdct="";
			var product="";
			var product1="";
			var result="";
			var amount="";
			var remark="";
			var amount="";
                event.preventDefault();
                $('a#singledlt_'+singleid).confirm({
                    message : 'Are you really sure?',
                    onConfirm : function() {
									var dataString = "singleid=" + singleid +"&pur_id="+purchid+ "&action=singleitemdlt";	
									//alert(dataString);
									$.ajax({
												type : "GET",
												async : false,
												url : "controller",
												data : dataString,
												success : function(text) {
												//alert(text);
												  result = text.split("single");
												
												 data=result[0];
												 headerdata =result[1];
												 pdct=$.parseJSON(result[2]);
												 remark=result[3];
												 	amount=$.parseJSON(result[4]);
													var producttotal=result[5];
												
												if(result[0]=="itemdeleted")
												{
													
														$('tr.row-drop').remove();
														$('tr#' + singleid).slideUp(300, function() {
															table.fnDeleteRow(document.getElementById(singleid));
														});
														/*if(headerdata =="//")
														{
															$( "input#total_amt" ).val(0);
															$( "input#tax" ).val(0);		
															$( "input#disc" ).val(0);
														}
														else
														{
														
															amount = headerdata.split("/");
						 									
														 	$( "input#total_amt" ).val(amount[2]);
															
															$( "input#tax" ).val(amount[0]);		
															$( "input#disc" ).val(amount[1]);
														}	*/
														if(amount.length >0)
														{
															$ ("input#total_amt" ).val(amount[0][0].total_amt);
								
															$( "input#tax" ).val(amount[0][0].tax_amt);		
															$( "input#disc" ).val(amount[0][0].disc_amt);	
														}
														$("input#total_amt" ).attr("product_total",producttotal);
														if(pdct == null)
														{
															
														$('#sorting-example1').dataTable().fnClearTable();
														}
														else{
																//alert("in else");
																if(pdct.length > 0)
																{
																	//alert("pdct present");
																 myFunctionproduct(pdct);
															}
					}	
					
				}	
				
			}
												
		});
        return false;
	}
    });
}
			
		 /*
		 
		 function purdtldel(sid,event) {
                event.preventDefault();
                $('button.nuyuo').confirm({
                    message : 'Are you really sure?',
                    onConfirm : function() {
							var retrn_cmmtd_id="";
							var t_amount=0;
							var t_tax=0;
							var t_disc=0;
							var pdct="";
                        	var dataString = "prdtl_id=" + sid + "&action=selectdeletepurdtl";
                       // alert(dataString);
                        $.ajax({
                            type : "GET",
                            async : false,
                            url : "controller",
                            data : dataString,
                            success : function(text) {
								
								//alert(text);
								 var res = text.split("single");
							  single=$.parseJSON(res[1]);
								myFunction(single);
								 pdct=$.parseJSON(res[2]);
								
								if(pdct!=null)
							 {
							 	
								 for ( j = 0; j < pdct.length; j++) {
								  t_amount=parseFloat(t_amount)+parseFloat(pdct[j][j].amount);
								  t_tax=parseFloat(t_tax)+parseFloat(pdct[j][j].tax);
									t_disc=parseFloat(t_disc)+parseFloat(pdct[j][j].disc);
							 	 }
								 
								 var ldcst=$("input#load_cost").val();
								var shpcst=	$("input#ship_cost").val();
								var others_cost=	$("input#others_cost").val();
								var sumcst=Number(ldcst)+Number(shpcst)+Number(others_cost)+Number(t_amount);
							
					$ ("input#total_amt" ).val(sumcst);
							  //$( "input#total_amt" ).val(t_amount);
									$( "input#tax" ).val(t_tax);		
									$( "input#disc" ).val(t_disc);
							  }
							  else
							  {
						
							  	$( "input#total_amt" ).val(0);
								$( "input#tax" ).val(0);		
								$( "input#disc" ).val(0);
							  }
								 var singledata="";
								 if (res[0] == "deleted") {
									
									$('tr.row-drop').remove();
									$('tr#' + sid).slideUp(300, function() {
										table.fnDeleteRow(document.getElementById(sid));
									});
								}
							
							}
                        });
                        return false;
                    }
                });
			}
			
		*/
		function Allpdctdelete(event){
				event.preventDefault();
				if(!$("input:checkbox[name=type]").is(':checked'))
			{
			
			$.modal.alert('Please select Item');
			return false;
			}
			
				$('button#Alldelete').confirm({
					message : 'Are you really sure?',
					onConfirm : function() {
						var prdtl_id = "";
						$("input:checkbox[name=type]:checked").each(function() {
							prdtl_id += $(this).val();
							//alert($(this).val());
							prdtl_id += ",";

						});
						$("input:checkbox[name=type]").prop("checked",false);
						prdtl_id = prdtl_id.slice(0, -1);
					
						var retrn_cmmtd_id="";
						var t_amount=0;
						var t_tax=0;
						var t_disc=0;
						var j;	
						var pdct="";
						var dltedrow="";
						var purch_id= $("button#additems").attr("lastpurid");
						
						var amount="";
						var dataString = "prdtl_id=" + prdtl_id +"&purch_id="+purch_id+ "&action=selectdeletepurdtl";
					//alert(dataString);
						$.ajax({
							type : "GET",
							async : false,
							url : "controller",
							data : dataString,
							success : function(text) {
							
                             // alert(text);
							  var res = text.split("single");
							
							  single=$.parseJSON(res[1]);
							  myFunction(single);
							  var singledata="";
							  pdct=$.parseJSON(res[2]);
							  dltedrow=$.parseJSON(res[3]);
							 amount=$.parseJSON(res[4]);
							  	var producttotal=res[5];
							 if(amount.length >0)
								{
										$ ("input#total_amt" ).val(amount[0][0].total_amt);
			
										$( "input#tax" ).val(amount[0][0].tax_amt);		
										$( "input#disc" ).val(amount[0][0].disc_amt);	
								}
							     $ ("input#total_amt" ).attr("product_total",producttotal);
							 
							 /*if(pdct!=null)
							 {
							  for ( j = 0; j < pdct.length; j++) {
								  t_amount=parseFloat(t_amount)+parseFloat(pdct[j][j].amount);
								  t_tax=parseFloat(t_tax)+parseFloat(pdct[j][j].tax);
									t_disc=parseFloat(t_disc)+parseFloat(pdct[j][j].disc);
							  }
							  
							  var ldcst=$("input#load_cost").val();
							var shpcst=	$("input#ship_cost").val();
								var others_cost=$("input#others_cost").val();
								var sumcst=Number(ldcst)+Number(shpcst)+Number(others_cost)+Number(t_amount);
							
							$ ("input#total_amt" ).val(sumcst);
							  
							  $( "input#total_amt" ).val(sumcst);
								$( "input#tax" ).val(t_tax);		
								$( "input#disc" ).val(t_disc);
							  }
							  else
							  {
							  	$( "input#total_amt" ).val(0);
								$( "input#tax" ).val(0);		
								$( "input#disc" ).val(0);
							  }*/
							   for ( j = 0; j < dltedrow.length; j++) {
							   
							   	
								
										$('tr#' + dltedrow[j]).slideUp(300, function() {
										table.fnDeleteRow(document.getElementById(dltedrow[j]));
									});
		
											if($("td").hasClass('dataTables_empty'))
											{
											
												$("button#Allpdctdelete").remove();
												
											}
										
									
							   }
							  
							
                         
					}
						});
						return false;
					}
				});
			}
			</script>
			
		<script>
            // Call template init (optional, but faster if called manually)
            var sid;
			var forobj;

			$.template.init();

			// Table sort - DataTables
			var table = $('#sorting-example1');
			var forobj = table.dataTable({
				'aoColumnDefs' : [{
					'bSortable' : false,
					'aTargets' : [0, 5]
				}],
				'sPaginationType' : 'full_numbers',
				'sDom' : '<"dataTables_header"lfr>t<"dataTables_footer"ip>',
				"oLanguage": {
        		"sEmptyTable":     "No Item Available"},
				
        		"aoColumnDefs": [
			      { "bSortable": false, "aTargets": [ 0,2,3,4,5,6,7,8 ] }
			  	] ,
				'fnInitComplete' : function(oSettings) {
					// Style length select
					table.closest('.dataTables_wrapper').find('.dataTables_length select').addClass('select blue-gradient glossy').styleSelect();
					tableStyled = true;
				}
			});

            // Table sort - styled
            
            $('#sorting-example1').tablesorter({
                headers : {
                    0 : {
                        sorter : false
                    },
                    5 : {
                        sorter : false
                    }
                }
            }).on('click', 'tbody td', function(event) {/*
                // Do not process if something else has been clicked
                	//alert("test");
                if (event.target !== this) {
                    return;
                }

                var tr = $(this).parent(), row = tr.next('.row-drop'), rows;
                var sid = $(tr).attr('id');
                var delbut = "<?php echo $tablepurchaseitems; ?>";
				//alert(delbut);
              if(delbut=="tmp_purchase_details")
              		{
              	var removebut ='<button type="submit" class="button glossy nuyuo anthracite with-tooltip" title="Remove Product" onclick="purdtldel(' + sid + ',event);">' + '<span class="button-icon red-gradient"><span class="icon-cross"></span></span>' + 'Remove' + '</button>';
              		}
              		else if(delbut=="tbl_purchase_details")
              		{
              			var removebut = "";
              		} 
					else
					{
						var removebut ='<button type="submit" class="button glossy nuyuo anthracite with-tooltip" title="Remove Product" onclick="purdtldel(' + sid + ',event);">' + '<span class="button-icon red-gradient"><span class="icon-cross"></span></span>' + 'Remove' + '</button>';
					}
                var prdctname = $('td#prdname' + sid).text();
                var type = $('td#ptype' + sid).text();
                var qty = $('td#pqty' + sid).text();
                var total = $('td#pamount' + sid).text();
			
                // If click on a special row
             
                if (tr.hasClass('row-drop')) {
                                  return;
                              }
              

                // If there is already a special row
                if (row.length > 0) {
                    // Un-style row
                    tr.children().removeClass('anthracite-gradient glossy');

                    // Remove row
                    row.remove();

                    return;
                }

                // Remove existing special rows
                rows = tr.siblings('.row-drop');
                if (rows.length > 0) {
                    // Un-style previous rows
                    rows.prev().children().removeClass('anthracite-gradient glossy');

                    // Remove rows
                    rows.remove();
                }

                // Style row
                tr.children().addClass('anthracite-gradient glossy');
					tr.children().addClass('anthracite-gradient glossy');
				if (typeof $(tr).attr('id') == "undefined")
				{	
					$('tr .row-drop').hide();
					//alert ("haii");
				}
				
				
				else
				{
                // Add fake row
				
                $('<tr class="row-drop" id="' + sid + '">' + '<td id="' + sid + '" colspan="' + tr.children().length + '">' + '<div class="float-right">'  +removebut+ '</div>' + '<strong>Name:</strong> ' + prdctname + '<br>' + '<strong>Type:</strong> ' + type + '<br>' + '<strong>Quantity:</strong>' + qty + ' <br>' + '<strong>Amount:</strong> ' + total + '<br>'+'</td>' + '</tr>').insertAfter(tr);
}
            */}).on('sortStart', function() {
                var rows = $(this).find('.row-drop');
                if (rows.length > 0) {
                    // Un-style previous rows
                    rows.prev().children().removeClass('anthracite-gradient glossy');

                    // Remove rows
                    rows.remove();
                }
            });

            

        </script>
        	<script>
            // Call template init (optional, but faster if called manually)
            var sid;
			var forobj;
			var ID="";
			$.template.init();

			// Table sort - DataTables
			var table1 = $('#sorting-example2');
			var forobj1 = table1.dataTable({
				'sPaginationType' : 'full_numbers',
				"aoColumns": [
								,
								{ "sClass": "hide-on-portrait" },
								,
								{ "sClass": "hide-on-mobile" },
								{ "sClass": "hide-on-mobile" },
								,
								
							],
				'sDom' : '<"dataTables_header"lfr>t<"dataTables_footer"ip>',
				"oLanguage": {
        		"sEmptyTable":     "No Item Available"},
				"aoColumnDefs": [
			      { "bSortable": false, "aTargets": [1,2,3,4,5] }
			  	] ,
				'fnInitComplete' : function(oSettings) {
					// Style length select
					table1.closest('.dataTables_wrapper').find('.dataTables_length select').addClass('select blue-gradient glossy').styleSelect();
					tableStyled = true;
				}
			});

            // Table sort - styled
            
            $('#sorting-example2').tablesorter({
                headers : {
                    0 : {
                        sorter : false
                    },
                    1 : {
                        sorter : false
                    }
                }
            }).on('click', 'tbody td', function(event) {
				
				//var urlString = unescape(window.location)

				
					var field = 'type';
				   var url = window.location.href;
					
				if(url.indexOf('&' + field + '=') == -1)
				{ 

				var id=$(this).attr('id');
				var tr = $(this).parent(), row = tr.next('.row-drop'), rows;
				ID = $(tr).attr('id');
				}
 
              
            }).on('sortStart', function() {
                var rows = $(this).find('.row-drop');
                if (rows.length > 0) {
                    // Un-style previous rows
                    rows.prev().children().removeClass('anthracite-gradient glossy');

                    // Remove rows
                    rows.remove();
                }
            });

            

        </script>

		<!-- jQuery Form Validation -->
		<script src="<?php echo MAIN_PATH ?>js/libs/formValidator/jquery.validationEngine.js?v=1"></script>
		<script src="<?php echo MAIN_PATH ?>js/libs/formValidator/languages/jquery.validationEngine-en.js?v=1"></script>
	
		<script>
			// Call template init (optional, but faster if called manually)
			$.template.init();

			// Color
			$('#anthracite-inputs').change(function() {
				$('#main')[this.checked ? 'addClass' : 'removeClass']('black-inputs');
			});

			// Switches mode
			$('#switch-mode').change(function() {
				$('#switch-wrapper')[this.checked ? 'addClass' : 'removeClass']('reversed-switches');
			});

			// Disabled switches
			$('#switch-enable').change(function() {
				$('#disabled-switches').children()[this.checked ? 'enableInput' : 'disableInput']();
			});

			// Tooltip menu
			$('#select-tooltip').menuTooltip($('#select-context').hide(), {
				classes : ['no-padding']
			});

			// Date picker
			/*$('.datepicker').glDatePicker({
			zIndex : 100
			});*/
			$("#state").trigger('silent-change');
			// Form validation

$('.datepicker').glDatePicker({
				zIndex : 100,
				onClick: function(target, cell, date, data) {
				target.val(('0'+date.getDate()).slice(-2) + '-' +
               ("0"+(date.getMonth()+1)).slice(-2) + '-' +
                date.getFullYear());

            if(data != null) {
                alert(data.message + '\n' + date);
            }
        }   
			});
		
		</script>
		
		
		
		
		
		<script language="javascript" type="text/javascript">
			
		function checkHELLO1(field, rules, i, options){
		
			var start_date=field.val();
			var dt=start_date.split('-');
		 if(typeof dt[1]=='undefined')
			{
				 start_date=field.val();
			}
			else
			{
			start_date=dt[2]+'-'+dt[1]+'-'+dt[0];
			}
			var matches1 = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(start_date);
			if(matches1 == null)
			{
			var bb = new Date(Date.parse(start_date));
			var start_dd =bb.getDate();
			var start_dd =("0" + bb.getDate()).slice(-2);
			var start_mn=("0" + (bb.getMonth() + 1)).slice(-2);
			var start_date = bb.getFullYear()+"-"+start_mn+"-"+start_dd;
			}
			var matches = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(start_date);
			
			if(matches == null)
			{
				return options.allrules.onlyDate.alertText;
				
			}
			else
			{
				
				var today = new Date();
				
				var bb1 = new Date(Date.parse(today));
				var start_dd1 =bb1.getDate();
				var start_dd1 =("0" + bb1.getDate()).slice(-2);
				var start_mn1=("0" + (bb1.getMonth() + 1)).slice(-2);
				var to_day = bb1.getFullYear()+"-"+start_mn1+"-"+start_dd1;
				
				if(start_date > to_day)
				{
					return options.allrules.futureDate.alertText;
				}
			}
			
			
			
 	}
			 var id;
			var proc;

					 $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
					$("button#addpurchase").click(function() {
					   
									var button = $(this).attr("chkbutton");
									//chkbutton="draft"
								//alert(button);
						$('form#AddPurchase').validationEngine('attach', {
							onValidationComplete : function(form, status) {// when validate is on and the form scan is completed
								if (status == true) {// equiv to success everythings is OK
									// we disable the default from action to make our own action like alert or other function
									$('form#AddPurchase').bind('submit', function(e) {
										e.preventDefault();
									});
									
									var id = $("button#addpurchase").attr("purid");
									if (id == "") {
										id = 0;
									}
									var selectval=$("select#ordernum").val();
									
									if(selectval==0)
									{
								
										var refno = $('input#ordernum').val();
									}
									else
									{
										
										var refno = $('select#ordernum').val();
									}
									
									var vndr_id  = $("input#vid").attr('invid');
									
									var inv_no = $("input#inv_no").val();
									var inv_dt = $("input#datepicker").val();
									var matches = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(inv_dt);
									if(matches == null)
									{
										var dt=inv_dt.split('-');
										 if(typeof dt[1]=='undefined')
										{
											var d = new Date(Date.parse(inv_dt));
											var date = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
										}
										else
										{
											date=dt[2]+'-'+dt[1]+'-'+dt[0];
										}
									}
									else
									{
										var date =inv_dt;
									}
									
									var tax = $('input#tax').val();
									var discount = $('input#disc').val();
									var total_amt = $('input#total_amt').val();
									var invtax = $('input#invtax').val();
									var invdiscount = $('input#invdisc').val();
									var inv_amt = $('input#inv_amt').val();
									//var adj_amt = $('input#adj_amt').val();
									var warehouse = $('select#warehouse').val();
									var note = $('textarea#note').val();
									
									var loadcost = $('input#load_cost').val();
								
									var shipcost = $('input#ship_cost').val();
									var othercost = $('input#others_cost').val();

									var desttable = "<?php echo $tablepurchase; ?>";
									var types="<?php echo $typ; ?>";
									
									if(desttable=="tbl_purchase_header")
									{
										
										  table="tbl_purchase_header";
									}
									else
									{
										
										 table="tmp_purchase_header";
									}
									var recv_date = $("input#datepicker1").val();
									var matches = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(recv_date);
									if(matches == null)
									{
										var dtt=recv_date.split('-');
										 if(typeof dtt[1]=='undefined')
										{
											var d = new Date(Date.parse(recv_date));
											var revdate = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
										}
										else
										{
											revdate=dtt[2]+'-'+dtt[1]+'-'+dtt[0];
										}
									}
									else
									{
										var revdate =recv_date;
									}
									var rc_name = $('input#rc_name').val();
									var desig = $('input#desig').val();
									var trname = $('input#trname').val();
									var terms = $('textarea#terms').val();
									var remarks=$('textarea#remarks').val();
									//var allamnt=Number(total_amt)+Number(loadcost)+Number(shipcost);
									
									var allamnt=Number(loadcost)+Number(shipcost)+Number(othercost);
									var totalpdctamnt=0;
									var heder_total=0;
									var dataString ="id=" + id +"&vndr_id=" + vndr_id 
									+ "&inv_no=" + inv_no + "&inv_dt=" + date +"&total_tax=" + tax + "&total_discount=" + discount + "&total_amt=" + total_amt +"&inv_tax=" + invtax + "&inv_disc=" + invdiscount + "&inv_amt=" + inv_amt+"&warehouse=" + warehouse +"&ref_no=" + refno +"&load_cost=" + loadcost + "&ship_cost=" + shipcost+"&note=" + note+"&table="+table+"&receivedate="+revdate+"&rename="+rc_name+"&designation="+desig+"&transport="+trname+"&termsof="+terms+"&remarks="+remarks+"&othercost="+othercost+"&action=addheader" ; 
								//alert(dataString);
								var pdct="";
								var single="";
								var remark="";
                                         $.ajax({
                                                      type : "GET",
                                                      async : false,
                                                      url : "controller",
                                                      data : dataString,
                                                      success : function(text) {
                                                       			//alert(text);
																if($.isNumeric(text))
																{
																	$("button#addpurchase").attr("flg",1);
																	$("button#addpurchase").attr("purid",lastid);
																	$("button#saveas").attr("purid",lastid);
                                                           	  		$("button#additems").attr("lastpurid",lastid);
                                                      		 		$('#tb2').unbind('click');
																	$('#tb3').unbind('click');
																	
																	if(button == "next")
																	{	
																	
																	$("a#tb2").click();	
																	 $('input#total_amt').val(allamnt);								
                                                            		//var msg= "Added Successully";
																	//notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});aler("jj")
																	
																	}
																	else
																	{
																		var msg= "Purchase Successully Saved As Draft";
																		notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
																		//window.location.href = "add?id="+id+"&action=edit"
																		window.location.href = "<?php echo MAIN_PATH ?>purchase/view?from=tmp";
																	}
																}
																else if (text == "updated")
																{
																	 if(button=="next")
																	 {
																		//var msg= 'Updated Successully';
																		$("a#tb2").click();		
																	 }
																	 else
																	{
																			var msg= "Purchase Successully Saved As Draft";
																			notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
																			window.location.href = "<?php echo MAIN_PATH ?>purchase/view?from=tmp";
																	}
																		
																		
																		/*if(types=="mst")
																		{
																			//window.location.href = "add?id="+id+"&action=edit&type=mst&tab=tab2"
																			window.location.href = "add?id="+id+"&action=edit&type=mst"
																			
																		}
																		else
																		{
																		 // window.location.href = "add?id="+id+"&action=edit&tab=tab2"
																		 //window.location.href = "add?id="+id+"&action=edit"
																			$("a#tb2").click();				
																		 } */
																		 
																}
																 else if(text == "Duplicate entry"){
                                                          				var msg= 'Email-id Exists';
                                                 				}
																
																else
																{
																	var res = text.split("product");
																	var lastid=$.parseJSON(res[0]);
																	
																	pdct=$.parseJSON(res[1]);
																	single=$.parseJSON(res[2]);
																	remark=res[3];
																	
																	if(typeof(remark) == "undefined")
																	{
																		var remark="";
																	}
																	
																	 
															  if ($.isNumeric(lastid)) 
															  {
																	$("button#addpurchase").attr("flg",1);
																	$("button#additems").attr("lastpurid",lastid);
																	
																	$("button#addpurchase").attr("purid",lastid);
																	$("button#saveas").attr("purid",lastid);
																	$('#tb2').unbind('click');
																	$('#tb3').unbind('click');										
																	//var msg= "Added Successully";
																	if(pdct!= null)
																	{
																		
																		if(pdct.length >0)
																		{
																			 myFunctionproduct(pdct);
																		
																		}
																	//$('button#FinishthisPurchase').show();
																	//$('button#FinishPurchase').show();
																	//$('button#FinishmyPurchase').show();
																	}
																	if(single!=null)
																	{
																		myFunction(single);
																	}
																	if(button == "next")
																		{	
																		$("a#tb2").click();	
																		
																		 heder_total=parseFloat(allamnt) + parseFloat(totalpdctamnt);
																		 $('input#total_amt').val(heder_total);		
																								
																		//var msg= "Added Successully";
																		//notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
																		}
																		else
																		{
																			
																		 heder_total=parseFloat(allamnt) + parseFloat(totalpdctamnt);
																		 $('input#total_amt').val(heder_total);		
																
																			var msg= "Purchase Successully Saved As Draft";
																			notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
																		}
																	
																	//$("a#tb2").click();
																	
															  } 
															  
															  }
														
                                                         
                                                            
                                                      }
                                                  });
                                                  
                                                
                                                  
                                                   $('form').validationEngine('detach');
                                  
								}
							}
						});

					});
					
					/*$("button#purchasecancel").click(function() {
						
				 					document.location="<?php echo MAIN_PATH ?>purchase/view";
						});*/
			
		</script>
		<script language="javascript" type="text/javascript">
				
				
				
		      /* var whid= "<?php if(!empty($editInfo)){ echo $editInfo[0][0]['wid']; } ?>";
			   alert(whid);
		        if(whid!="")
		        {
		   			alert(whid);
					var wname = $("select#warehouse option[value="+whid+"]").text();
					$("p#warehouse").find('select#warehouse').val(whid);
				 	$("p#warehouse").find("span.select-value").text(wname);
				}
				var orderid="<?php if(!empty($editInfo)){ echo $editInfo[0][0]['refno']; } ?>";
				alert(orderid);
				if(orderid!="")
				{
			alert(orderid);
					var option='<option selected="selected" value="'+orderid+'">'+orderid+'</option>';
				
					$('select#ordernum').append(option);
					$("p#ordernum").find('select#ordernum').val(orderid);
				 	$("p#ordernum").find("span.select-value").text(orderid);
					$('select#ordernum').prop('disabled', 'disabled');
				}
				 */
				
				
		
		function checkvalue(field, rules, i, options){
			var  qty=field.val();
			
			var type=$("input#prdtype").val();
		
			
			if(type=="Single" ||type=="single"  )
			{
				var matches = /^[\-\+]?\d+$/.exec(qty);
			
				if(matches == null)
				{
					return options.allrules.integer.alertText;
			
				}
				
				
			}
			else
			{
				var matches = /^[\-\+]?((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/.exec(qty);
				if(matches == null)
				{
					return options.allrules.number.alertText;
			
				}
			}
		
 }
				
		  </script>    
		       
       
        
			
			<script>
				$("button#additems").click(function() {
				
					var dataString = "action=findproductgrp" ; 
					var txresult="";
					var res="";
					var test="";
					alert(dataString);
					$.ajax({
							  	 type : "GET",
							  	 async : false,
							   	url : "controller",
							 	 data : dataString,
								 success : function(data) {
						   			//alert(data);
									  res = data.split("taxnames");
									result=$.parseJSON(res[0]);
									//txresult=$.parseJSON(res[1])
							                
										}  
							});		
						var option ="";
					
						for(var i=0;i<result.length;i++)
						 {
							var path=result[i][i].cpath;
							var res = 	path.replace(/\//g, "->");
							var name=res+ result[i][i].name
							option += '<option value="' + result[i][i].gid + '">' + name+ '</option>';
						 } 
						 var purid = "<?php echo $id; ?>";
					
						if(purid==0 )
						{
							var purid= $("button#additems").attr("lastpurid");
						}
						
						 
						 //tax list
						 /*var taxoption="";
						 for(var i=0;i<txresult.length;i++)
						 {
							
							taxoption += '<option value="' + txresult[i][i].tax_name + '">' +  txresult[i][i].tax_name+ '</option>';
						 } 
						 
		alert(taxoption);*/
		var content='<form id="additemf" detid=""><div class="block margin-bottom"><div class="with-padding"><p class="block-label button-height" id="group"><label class="label anthracite" for="validation-required">Item Group</label><select id="pdctgroup" name="validation-select" class="select validate[required]"><option value="">Select Item Group</option>'+option+'</select></p><p class="block-label button-height" id="auto"><label class="label anthracite" for="validation-required">Item Name/Code</label><input type="text" value="" inpid="" onclick="autsugproduct();"  class="input anthracite full-width validate[required,funcCall[checkitem]]" id="pid" name="pid" data-tooltip-options="{"position":"right"}" data-prompt-position="topRight:-30,10" ><div id="load" style="margin-left:57%; margin-top: -7%; display:none;"></div>  </p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Specification</label><input type="text" value="" class="input anthracite full-width validate[required]" id="spec" name="spec" actual_uom="" data-tooltip-options="{"position":"right"}"  ></p><p class="block-label button-height"><label for="validation-select" class="label anthracite">Type</label><input type="text" value="" class="input anthracite full-width validate[required]" id="prdtype" name="prdtype" data-tooltip-options="{"position":"right"}" readonly></p><p class="block-label button-height" id="inp_uom"><label class="label anthracite" for="validation-required">UOM</label><input type="text" value="" class="input anthracite full-width validate[required]" id="uom" name="uom" data-tooltip-options="{"position":"right"}" readonly></p><p class="block-label button-height" id="sel_uom" style="display:none;" ><label class="label anthracite" for="validation-required">UOM</label><select style="width:170px;" id="sel_uom" name="validation-select" class="select validate[required]" onChange="change_textbox(event);";><option value="">Select</option><option value="TON">TON</option><option value="KG">KG</option></select></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Quantity</label><input type="text" value="" maxlength="14" class="input anthracite full-width validate[required,funcCall[checkvalue]]" id="qty" name="qty" onkeyup="genamount(event)" data-tooltip-options="{"position":"right"}"></p><p class="block-label button-height" id="mod"><label class="label anthracite" for="validation-required">Mode of Payment</label><select id="mod" name="validation-select" class="select validate[required]" onchange="changerate(event)" data-prompt-position="topRight:-5,10"><option value="1" selected>Paid</option><option value="2">Free</option></select></p><p class="block-label button-height" id="disc_mod"><label class="label anthracite" for="validation-required">Discount Type</label><select id="disc_mod" name="validation-select" class="select validate[required]" onchange="genamount(event)" data-prompt-position="topRight:-5,10"><option value="1" selected>Percentage</option><option value="2">Amount</option></select></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Rate</label><input type="text" value="" class="input anthracite full-width validate[required,custom[number]]" maxlength="14" id="rate" rateval=""  name="rate" onkeyup="genamount(event)"  data-tooltip-options="{"position":"right"}"></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Discount</label><input type="text" maxlength="14" value="" class="input anthracite full-width validate[required,custom[number],funcCall[checkvaluedis]]" id="discit" name="discit" onkeyup="genamount(event)" discval="" discountchange=""  data-tooltip-options="{"position":"left"}"></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Tax <small>(In %)</small></label></p><p><div id="tablediv" ><table id="tbl_taxselect" class="table responsive-table responsive-table-on"  ><tr class="anthracite" ><th colspan="3"><strong>Select Tax</strong><div style=" margin-left: 296px; margin-top: -18px;"><ul classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list children-tooltip"><li title="Add Tax"><a href="javascript:void(0)" id="addtax" onclick="showtaxtable('+purid+',event);" class="icon-list-add icon-size2"></a></li></ul></div></th></tr><tr class="anthracite"><th scope="col" width="10%">Tax Name</th><th class="hide-on-tablet" scope="col" width="10%">Amount<small>(in %)</small></th><th scope="col" width="10%">Actions</th></tr></table></div></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Total Tax <small>(In %)</small></label><input type="text" value="0" maxlength="14" class="input full-width validate[required,custom[number],min[0],max[100]]" onkeyup="genamount(event)"  id="taxit"  disabled  name="taxit" taxval="" taxamount="" data-tooltip-options="{"position":"right"}"></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Others</label><input type="text" maxlength="14" value="" class="input anthracite full-width validate[custom[number]]" id="others" name="others" onkeyup="genamount(event)" discval=""  data-tooltip-options="{"position":"left"}"></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Total</label><input type="text" value="" maxlength="14" class="input anthracite full-width validate[required,custom[number]]" id="amt" name="amt" data-tooltip-options="{"position":"right"}"></p><div class="field-block button-height"><button class="button glossy mid-margin-right anthracite with-tooltip" title="Save Item" id="additem" onclick="foritem(event);" type="submit"><span class="button-icon"><span class="icon-tick"></span></span>Save</button><button class="button glossy anthracite with-tooltip" title="Close" type="reset" onclick="cancelpurdtl(event);" id="cancel"><span class="button-icon red-gradient"><span class="icon-cross-round"></span></span>Close</button></div></div></div></form>';  
					  
					
				$.modal({
	title: 'Add Items',
	content: content,
	buttons:false,
	 //scrolling: false
	
});
	 		
	});
	
	
	
	
	
	function showtaxtable(purid,event)
	{
		
		 var prdid = $("input#pid").attr("inpid");
		 if(prdid=="")
		 {
			$.modal.alert('Please Select An Item');
			return false;  
		 }
		var dataString = "action=findtaxnames" ; 
		var result="";
		var taxoption="";
		$.ajax({
					type : "GET",
					async : false,
					url : "controller",
					data : dataString,
					success : function(data) {
					  			
							 result=$.parseJSON(data);
							
					}  
				});	
		
		var rowCount = $('table#tbl_taxselect tr').length;
		
		if(rowCount==2)
		{
			for(var i=0;i<result.length;i++)
			{
				taxoption += '<option value="' + result[i][i].tax_code + '">' +  result[i][i].tax_name+ '</option>';
			}
	
		}
		else
		{var k=0;
		var selected_names=new Array();
			for(var j=2;j<rowCount;j++)
			{
				var selname=$("#taxname_select_"+j+" option:selected").text();
				selected_names[k]=selname;
				k=Number(k)+1;
			}
			
			for(var i=0;i<result.length;i++)
			{
				if ($.inArray(result[i][i].tax_name, selected_names) == -1)
				{
					taxoption += '<option value="' + result[i][i].tax_code + '">' +  result[i][i].tax_name+ '</option>';
				}
				
			}
		}
	 
		
	//	var newrow='<tr id="rowid'+rowCount+'"><td taxname="" taxcode="" id="tax'+rowCount+'" ><select onchange="set_tablerowvalue('+rowCount+',event)"; id="taxname_select_'+rowCount+'" auto_id="" name="validation-select" class="select"><option value="">Select Tax</option>'+taxoption+'</select></td><td id="amount'+rowCount+'" tamount="" ><input type="text" maxlength="14" size="6" value="" id="edittax_amount_'+rowCount+'"   onkeyup="set_taxamount('+rowCount+',event)";  class="input anthracite name="edittax_amount" data-tooltip-options="{"position":"left"}" /></td><td><ul classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li title="Save"><a href="javascript:void(0)" id="savetax_'+rowCount+'" onclick="savetax('+purid+','+prdid+','+rowCount+',event);" class="icon-save icon-size2"></a></li><li  title="Delete"><a href="javascript:void(0)" id="deletetax" onclick="deletetax(event);"  class="icon-trash icon-size2"></a></li></ul></td></tr> '
	
	if(taxoption!="")
	{
		var newrow='<tr id="rowid'+rowCount+'"><td taxname="" taxcode="" id="tax'+rowCount+'" ><select class="select" onchange="set_tablerowvalue('+rowCount+',event)"; id="taxname_select_'+rowCount+'" auto_id="" name="validation-select" ><option value="">Select Tax</option>'+taxoption+'</select></td><td id="amount'+rowCount+'" tamount="" dtltaxid="" ><input type="text" maxlength="14" size="6" value="" id="edittax_amount_'+rowCount+'"   onkeyup="set_taxamount('+rowCount+',event)";  class="input anthracite name="edittax_amount" data-tooltip-options="{"position":"left"}" /></td><td><ul classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li  title="Delete Tax"><a href="javascript:void(0)" id="deletetax_'+rowCount+'" onclick="deletetax('+rowCount+',event);"  class="icon-trash icon-size2"></a></li></ul></td></tr>'
		
		
		$('head').append('<link rel="stylesheet" href="http://www.ibniapp.in/ibniapp/css/reset.css?v=1" type="text/css" />');
		$('head').append('<link rel="stylesheet" href="http://www.ibniapp.in/ibniapp/css/styles/form.css?v=1" type="text/css" />');
	$('table#tbl_taxselect').append(newrow);
	
		
	}
	else
	{
		$.modal.alert('Sorry! No More Taxs are Available');
			return false;  
	}
	
		
		
		
	}
	
	function set_tablerowvalue(count,event)
	{
		var taxcode=$("select#taxname_select_"+count).val(); 
		var taxname=$("#taxname_select_"+count+" option:selected").text();
		$("td#tax"+count).attr("taxname",taxname);
		$("td#tax"+count).attr("taxcode",taxcode);
	}
	
	
	function set_taxamount(count,event)
	{
		var amount=$("input#edittax_amount_"+count).val();
		
		$("td#amount"+count).attr("tamount",amount);
		var rowCount2 = $('table#tbl_taxselect tr').length;
		
		var totamount=0;
		var TxData1 = new Array();
		
		$('#tbl_taxselect tr').each(function(row, tr){
			
		TxData1[row]={
			 "amount" :$(tr).find('td:eq(1)').attr("tamount")
		   
		}
		}); 
		TxData1.shift(); 	
		TxData1.shift(); 
		for(i=0;i<TxData1.length;i++)
		{
			totamount=Number(totamount)+Number(TxData1[i]['amount']);
			
		}
		
		$("input#taxit").val(totamount);
		 genamount1();
	}
	
	function deletetax(rcount,event)
	{
		event.preventDefault();
		var taxcode=$("select#taxname_select_"+rcount).val(); 
		var amount=$("input#edittax_amount_"+rcount).val();
		var totaltax=$("input#taxit").val();
		var dtltaxid=$("td#amount"+rcount).attr("dtltaxid");
		alert(dtltaxid);
		var pur = '<?php echo $_GET['id']; ?>';
		
		if(pur==0 )
		{
			var pur= $("button#additems").attr("lastpurid");
		}
		if(taxcode=="")
		{
			$.modal.alert('Please Select Tax');
			return false;  
		}
		else{
				 $("a#deletetax_"+rcount).confirm({
					 
							message : 'Are you really sure?',
							onConfirm : function() {
								if(dtltaxid=="")
								{
									var blnc_tax=totaltax-amount;
									$("tr#rowid"+rcount).remove();
									$("input#taxit").val(blnc_tax);
									genamount1(); 
								}
								else
								{
									var blnc_tax=totaltax-amount;
									$("input#taxit").val(blnc_tax);
									genamount1();
									var tax = 	$("input#taxit").val();
									var amt = 	$("input#amt").val();
									var tax_amount=$("input#taxit").attr("taxamount");
									 var detid = $("form#additemf").attr("detid");
									 var prdid = $("input#pid").attr("inpid");
									var dataString = "dtltaxid=" + dtltaxid +"&purch_id="+pur+"&tax="+tax+"&amt="+amt+"&tax_amount="+tax_amount+ "&detid="+detid+ "&prdid="+prdid+"&action=deleteTax";
									alert(dataString);
									var result="";
									var taxoption="";
									$.ajax({
												type : "GET",
												async : false,
												url : "controller",
												data : dataString,
												success : function(data) {
															alert(data)
															 var res = data.split("deleted");
															 alert(res[0])
														if(res[0]=="taxdel")
														{
															alert("ifloop");
															$("tr#rowid"+rcount).remove();
															var amount=$.parseJSON(res[1]);
															var producttotal=res[2];
															if(amount.length >0)
															{
																$ ("input#total_amt" ).val(amount[0][0].total_amt);
																$( "input#tax" ).val(amount[0][0].tax_amt);		
																$( "input#disc" ).val(amount[0][0].disc_amt);	
															}
															 $ ("input#total_amt" ).attr("product_total",producttotal);
															 var totam=$("input#amt").val();
															  $ ("td#pamount"+detid ).text(totam);
															   $ ("td#ptax"+detid ).text(tax);
															    $ ("td#prd_code"+detid ).attr("taxamount",tax_amount);
														}
														
														
												}  
											});
									
								}
								
							
					 }
						
				 });
		}
	}
	
	function savetax(purid,prdid,count,event)
	{
		/*var TableData="";
		alert("ffggg");
		$('#tbl_taxselect tr').each(function(row, tr){
     TableData = TableData 
        + $(tr).find('td:eq(0)').attr("chk") + ' '  // Task No.
        + $(tr).find('td:eq(1)').text() + ' '  // Date 
        + '\n';
});
		
	alert(TableData);*/
		var TableData1 = new Array();
		$('#tbl_taxselect tr').each(function(row, tr){
			
		TableData1[row]={
			"taxname" : $(tr).find('td:eq(0)').attr("taxname")
			, "taxcode" :$(tr).find('td:eq(1)').attr("taxcode")
			, "amount" :$(tr).find('td:eq(1)').attr("tamount")
		   
		}
	}); 
	TableData1.shift(); 	
	TableData1.shift(); 	
	
		
		
		
		
		
		/* var taxcode=$("select#taxname_select_"+count).val(); a
		var taxname=$("#taxname_select_"+count+" option:selected").text();
		var amount=$("input#edittax_amount_"+count).val();
		var auto_id=$("select#taxname_select_"+count).attr("auto_id");
		alert(auto_id);
		if(auto_id=="")
		{
			
			var dataString = "purid=" + purid +"&prdid=" + prdid  + "&taxcode=" + taxcode +"&taxname=" + taxname +"&amount=" + amount +"&action=savetax";
		}
		else
		{
			var dataString = "purid=" + purid +"&prdid=" + prdid  + "&taxcode=" + taxcode +"&taxname=" + taxname +"&amount=" + amount +"&auto_id="+auto_id+"&action=updatetax";
			
		}
		
		
		alert(dataString);
		
		$.ajax({
					type : "GET",
					async : false,
					url : "controller",
					data : dataString,
					success : function(data) {
					  			
							alert(data);
							var res = data.split("totaltax");
							if(data!="")
							{
								alert(res[0]);
								alert(res[1])
								$("select#taxname_select_"+count).attr("auto_id",res[0]);
								$("input#taxit").val(res[1]);
								 genamount(event);
								
								var msg= 'Tax Saved Successfully';
							}
							 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
					}  
				});	*/
		
	}
	
	
	function autsugproduct()
	{
		//setAutoComplete1("pid", "results1", "controller?product=",0,20);
			setAutoCompleteProductgrp1("pid","pdctgroup", "results1", "controller?product=",0,20); 
	}	
	function cancelpurdtl() 
	{
		$( ".modal" ).closeModal();
	}	
	
	
		</script>
			
			
			  <script type="text/javascript">	
	
		
	    setAutoComplete("vid", "results", "controller?vendor=",0,20);
		
			</script>
           
			
			<script>
			
				function foritem(event) {
					
					
					var purid = "<?php echo $id; ?>";
					
					
					var from;
					if(purid==0 )
					{
						var purid= $("button#additems").attr("lastpurid");
					}
					
				
					 var detid = $("form#additemf").attr("detid");
				
					if(detid=="")
					{
						var action = "additems";
					}	
					else
					{
						var action = "updateitem"
					}
					
				$('form#additemf').validationEngine('attach',{ promptPosition: 'topRight:-100',
							
							onValidationComplete : function(form, status) {// when validate is on and the form scan is completed
								if (status == true) {// equiv to success everythings is OK
									// we disable the default from action to make our own action like alert or other function
									$('form').bind('submit', function(e) {
										e.preventDefault();
									});
									
									var prdid = $("input#pid").attr("inpid");
							
									var mod = 	$("select#mod").val();
									//var qty = 	$("input#qty").val();
									var code = 	$("input#code").val();
									var actual_uom=$("input#spec").attr("actual_uom");
									if(actual_uom=="KG")
									{
										var sel_uom = 	$("select#sel_uom").val();
									}
									else
									{
										
										var sel_uom = 	$("input#uom").val();		
									}
									if(actual_uom=="KG" && sel_uom=="TON")
									{
										var enter_qty = 	$("input#qty").val();
										var qty=enter_qty*1000;
										var enter_rate=$("input#rate").val();
										var rate=enter_rate/1000;
										
										
									}
									else
									{
										var qty = 	$("input#qty").val();
										var rate = 	$("input#rate").val();
									}
												
												
									//var uom = 	$("input#uom").val();
									
									var type = 	$("input#prdtype").val();
									var tax = 	$("input#taxit").val();
									var disc = 	$("input#discit").val();
									var amt = 	$("input#amt").val();
									var spec = 	$("input#spec").val();
									var desttable = "<?php echo $tablepurchaseitems; ?>";
									var pdct="";
									var single="";
									var product="";
									var singledata="";
									var t_amount=0;
									var t_tax=0;
									var t_disc=0;
									var group = 	$("select#pdctgroup").val();
									var others  = $("input#others").val();
									var remark="";
									var amount="";
									if(desttable=="" || desttable=="tmp_purchase_details")
									{
										  from= "";
										  table="tmp_purchase_details";
									}
									else
									{
										 from  = "&type=mst";
										 table="tbl_purchase_details";
									}
									
									var disc_type=$('select#disc_mod').val();
									var discount_amount=$("input#discit").attr("discountchange");
									var tax_amount=$("input#taxit").attr("taxamount");
									
									
									//**************************************************************************************************
											var TableData1 = new Array();
											$('#tbl_taxselect tr').each(function(row, tr){
												
											TableData1[row]={
												"taxname" : $(tr).find('td:eq(0)').attr("taxname")
												, "taxcode" :$(tr).find('td:eq(0)').attr("taxcode")
												, "amount" :$(tr).find('td:eq(1)').attr("tamount")
												, "dtltaxid" :$(tr).find('td:eq(1)').attr("dtltaxid")
											   
											}
										}); 
										TableData1.shift(); 	
										TableData1.shift(); 
										var myJsonString = JSON.stringify(TableData1);
									
									
								
								
								//**************************************************************************************************	
								
								//alert(stringData);
					var dataString = "purid=" + purid +"&prdid=" + prdid  + "&mod=" + mod +"&code=" + code +"&uom=" + actual_uom +"&type="+ type +"&qty=" + qty + "&rate=" + rate + "&tax=" + tax + "&disc=" + disc +"&amt=" + amt+"&spec="+spec+"&action="+action+"&table="+table+"&dtid="+detid+"&groupid="+group+"&othrs="+others+"&disc_type="+disc_type+"&discount_amount="+discount_amount+"&tax_amount="+tax_amount+"&sel_uom="+sel_uom+"&TableData1="+myJsonString; 
									alert(dataString);
					$.ajax({
                            	 type : "GET",
								 async : false,
                                 url : "controller",
                                 data : dataString,
                                 success : function(text) {
                              
								if(text=="enter qty less")
								{
									$.modal.alert('Please Delete Items ');
									return false;
								}
								else {
								 var res = text.split("single");
								
								pdct=$.parseJSON(res[0]);
								single=$.parseJSON(res[1]);
								amount=$.parseJSON(res[3]);
								remark=res[2];
								//amount=$.parseJSON(res[3]);
								var producttotal=res[4];

								if(remark=='undefined')
								{
									remark="";
								}
								if(amount.length >0)
								{
										$ ("input#total_amt" ).val(amount[0][0].total_amt);
			
										$( "input#tax" ).val(amount[0][0].tax_amt);		
										$( "input#disc" ).val(amount[0][0].disc_amt);	
								}
								 $ ("input#total_amt" ).attr("product_total",producttotal);
								if(pdct.length >0)
								{
									
									 myFunctionproduct(pdct);
									
						if(action == "additems"){
						 //$('#additemf')[0].reset(); 
						// $("p#group").find("span.select-value").text("Select Item Group");
				 			//$("p#mod").find("span.select-value").text("Select Mode");
							$('input#pid').val('');
							$('input#spec').val('');
							$('input#prdtype').val('');
							$('input#uom').val('');
							$('input#rate').val('');
							$('input#discit').val('');
							$('input#taxit').val('');
							$('input#others').val('');
							$('input#amt').val('');
							$('input#qty').val('');
							
							$('#tbl_taxselect tr').each(function(row, tr){
								if ($("table#tbl_taxselect tr").length != 2) {
									
									 $("table#tbl_taxselect tr:last").remove();
								}
							});
							
						 var msg= "Added Successully";
						  notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
						 }
						 else
						 {
						 	var msg= "Updated Successully";
							
						  notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
						 }
					
					}
					
					 myFunction(single);
					 
					 
					 }
					
				 }
                                         });
                                   
                                                         
                                                  
                         $('form').validationEngine('detach');
                                  
								}
							}
						});
				  
				}
				
				
			</script>
			
			<script>
			
	

			function genamount1()
			{
					var disc_type=$('select#disc_mod').val();
					var qty = $("input#qty").val();
					var rate = $("input#rate").val();
					var taxit = $("input#taxit").val();
					var discit = $("input#discit").val();
					var other  = $("input#others").val();
					
					if(disc_type==1)
					{
						var grossvalue=qty*rate;
						
						var discountchange=(grossvalue*discit)/100;
						
						$("input#discit").attr("discountchange",discountchange)
						var netamount=grossvalue-discountchange;
						var taxamount=(netamount*taxit)/100;
						
						$("input#taxit").attr("taxamount",taxamount)
						var amount=netamount+taxamount;
						var totalamount=Number(amount)+Number(other);
						var grntamount=Number(totalamount).toFixed(2);
						$('input#amt').val(grntamount);
					}
					else
					{
						var grossvalue=qty*rate;
						$("input#discit").attr("discountchange",discit)
						var netamount=grossvalue-discit;
						
						var taxamount=(netamount*taxit)/100;
						$("input#taxit").attr("taxamount",taxamount)
						var amount=netamount+taxamount;
						var totalamount=Number(amount)+Number(other);
						
					var grntamount=Number(totalamount).toFixed(2);
						$('input#amt').val(grntamount);
					}
					
					
				
				}
				
				
			function genamount(event)
			{
					event.preventDefault();
					
					var disc_type=$('select#disc_mod').val();
					var qty = $("input#qty").val();
					var rate = $("input#rate").val();
					var taxit = $("input#taxit").val();
					var discit = $("input#discit").val();
					var other  = $("input#others").val();
					//alert(disc_type);
					//alert(rate);
					//alert(taxit);
					//alert(discit);
					//alert(other);
					if(disc_type==1)
					{
						var grossvalue=qty*rate;
						//alert(grossvalue);
						var discountchange=(grossvalue*discit)/100;
						//alert(discountchange);
						$("input#discit").attr("discountchange",discountchange)
						var netamount=grossvalue-discountchange;
						var taxamount=(netamount*taxit)/100;
						//alert(discountchange);
						$("input#taxit").attr("taxamount",taxamount)
						var amount=netamount+taxamount;
						var totalamount=Number(amount)+Number(other);
						var grntamount=Number(totalamount).toFixed(2);
						$('input#amt').val(grntamount);
					}
					else
					{
						var grossvalue=qty*rate;
						$("input#discit").attr("discountchange",discit)
						var netamount=grossvalue-discit;
						
						var taxamount=(netamount*taxit)/100;
						$("input#taxit").attr("taxamount",taxamount)
						var amount=netamount+taxamount;
						var totalamount=Number(amount)+Number(other);
						
					var grntamount=Number(totalamount).toFixed(2);
						$('input#amt').val(grntamount);
					}
					
					/*amt =Number(rate)+Number(taxit)+Number(other)-Number(discit);
					amt=amt*qty;
					amt=Number(amt).toFixed(2);
					$('input#amt').val(amt); */
					
					
				}
			function changerate(event)
			{
		
				event.preventDefault();
				var mod = $('select#mod').val();
				if(mod==2)
				{
					$("input#rate").val(0);	
					$("input#taxit").val(0);
					 $("input#discit").val(0);
					 $("input#amt").val(0);
					 document.getElementById("rate").readOnly = true;
					 document.getElementById("taxit").readOnly = true;
					 document.getElementById("discit").readOnly = true;
					 document.getElementById("amt").readOnly = true;
					 
				}
				else
				{
				
				var pdcost = $("input#rate").attr("rateval");
				var pdtax = $("input#taxit").attr("taxval");
				var pddisc = $("input#discit").attr("discval");
				$("input#rate").val(pdcost);	
					$("input#taxit").val(pdtax);
					 $("input#discit").val(pddisc);
					 var pdqty = $("input#qty").val();
					// pdamnt=(pdcost*pdqty)+Number(pdtax)-Number(pddisc);
					pdamnt=Number(pdcost)+Number(pdtax)-Number(pddisc);
					pdamnt=pdamnt*pdqty;
					 $("input#amt").val(pdamnt);
					 document.getElementById("rate").readOnly = false;
					 document.getElementById("taxit").readOnly = false;
					 document.getElementById("discit").readOnly = false;
				
				}
				
						
			}
									
				function settextbox() 
				{
					
					document.getElementById("uom").value= "";
					document.getElementById("prdtype").value= "";
					document.getElementById("qty").value= "";
					document.getElementById("rate").value= "";
					document.getElementById("taxit").value= "";
					document.getElementById("discit").value= "";
					document.getElementById("amt").value= "";
					document.getElementById("spec").value= "";
				}
					       
			</script>
			
			<script>

 function purdtledit(detailid,event) 
	{
			var zeroval="0.00";
			var tx_result="";

		var dataString = "action=findproductgrp" ; 
		//alert(dataString);
		$.ajax({
					type : "GET",
					async : false,
					url : "controller",
					 data : dataString,
					success : function(data) {
						   //alert(data);
						   	//result=$.parseJSON(data)
							 res = data.split("taxnames");
									result=$.parseJSON(res[0]);
									
									 tx_result=$.parseJSON(res[1]);
							                
					}  
				});		
				var option ="";
				for(var i=0;i<result.length;i++)
				 {
					var path=result[i][i].cpath;
					var res = 	path.replace(/\//g, "->");
					var name=res+ result[i][i].name
					option += '<option value="' + result[i][i].gid + '">' + name+ '</option>';
				} 
	
	var sino = $("td#headerid"+detailid).text();
	var prdname = $("td#prdname"+detailid).text();
	var prdid = $("td#prdname"+detailid).attr("prdid");
	//var puom = $("td#puom"+detailid).text();
	var puom = $("td#vend_name"+detailid).attr("uom");
	var model = $("td#ptax"+detailid).attr("mod");
	var sel_uom=$("td#vend_name"+detailid).attr("sel_uom");
	if(model==1)
	{
	 var pmodel="Paid";
	}
	else
	{
		 var pmodel="Free";
	}
	//var pmodel = $("td#pmodel"+detailid).text();
	var pqtyy = $("td#pqty"+detailid).attr("qty");
	
	var type = $("td#vend_name"+detailid).attr("type");
	if(type==1)
	{
	 	var ptype="Single";
		var pqtyz=pqtyy.split('.');
		var pqty=pqtyz[0];
		//var prate = $("td#prate"+detailid).text();
		var prate = $("td#prate"+detailid).attr("rate");
	 
	}
	else
	{
		 var ptype="Bulk";
		// var pqty=pqtyy;
		if(puom=="KG")
		{
			if(sel_uom=="TON")
			{
				var qty=$("td#pqty"+detailid).attr("pqty");
				var pqty=pqtyy/1000;
				//var rate = $("td#prate"+detailid).text();
				var rate = $("td#prate"+detailid).attr("rate");
				var prate =rate *1000;
			}
			else
			{
				var pqty =pqtyy;
				//var prate = $("td#prate"+detailid).text();
				var prate = $("td#prate"+detailid).attr("rate");
			}
		}
		else
		{
			var pqty = pqtyy;
			//var prate = $("td#prate"+detailid).text();
			var prate = $("td#prate"+detailid).attr("rate");
		}
	}
	//var pqty = $("td#pqty"+detailid).text();
	
	
	
	var ptax = $("td#ptax"+detailid).text();
	var pdisc = $("td#prate"+detailid).attr("disc");
	var pamount = $("td#pamount"+detailid).text();
	var grop= $("td#prdname"+detailid).attr("grpid");
	var otheramnt= $("td#prdname"+detailid).attr("other");
	//alert(otheramnt)
	if (typeof(otheramnt) == 'undefined' || otheramnt == null || otheramnt == "")
	{
		//alert("ttt");
		otheramnt=zeroval;
	}
	
	var pspec = $("td#pamount"+detailid).attr("pspec");
	var disctypes = $("td#prd_code"+detailid).attr("disctype");
	var tot_discmnt = $("td#prd_code"+detailid).attr("discamount");
	var tot_tax = $("td#prd_code"+detailid).attr("taxamount");
	if (typeof(pdisc) == 'undefined' || pdisc == null || pdisc == "")
	{
		//alert("ttt");
		pdisc=0;
	}
	if (typeof(prate) == 'undefined' || prate == null || prate == "")
	{
		//alert("ttt");
		prate=zeroval;
	}
	if (typeof(tot_tax) == 'undefined' || tot_tax == null || tot_tax == "")
	{
		//alert("ttt");
		tot_tax=0;
	}
	if (typeof(ptax) == 'undefined' || ptax == null || ptax == "")
	{
		//alert("ttt");
		ptax=0;
	}
	if (typeof(pamount) == 'undefined' || pamount == null || pamount == "")
	{
		//alert("ttt");
		pamount=zeroval;
	}
	 var purid12 = "<?php echo $id; ?>";
					
	if(purid12==0 )
	{
		var purid12= $("button#additems").attr("lastpurid");
	}
	var dataString = "prdid=" + prdid+"&slno=" + detailid+"&purid12=" + purid12+"&action=findtax_selected";
		//alert(dataString)
		var result12="";
		$.ajax({
					type : "GET",
					async : false,
					url : "controller",
					 data : dataString,
					success : function(data) {
						   
						   	result12=$.parseJSON(data)	 
							
					}  
				});	
				var newrow="";
				var rowCount=2;
				  
				  if(result12==null)
				  {
					  newrow="";
				  }
				  else
				  {
					  	
				
					for(var i=0;i<result12.length;i++)
					{
						var option12="";
						var s_tcd=result12[i][i].tax_code;
						
						for(var j=0;j<tx_result.length;j++)
						{
							
							if(tx_result[j][j].tax_code == s_tcd)
							{
								
								 option12 += '<option value="' + tx_result[j][j].tax_code + '" selected>' +  tx_result[j][j].tax_name+ '</option>';
							}
							else
							{
								 option12 += '<option value="' + tx_result[j][j].tax_code + '">' +  tx_result[j][j].tax_name+ '</option>';
							}
						}
					
						  newrow +='<tr id="rowid'+rowCount+'" dtltaxid='+result12[i][i].id+' ><td taxname="'+result12[i][i].tax_name+'" taxcode="'+s_tcd+'" id="tax'+rowCount+'" ><select onchange="set_tablerowvalue('+rowCount+',event)"; id="taxname_select_'+rowCount+'" auto_id="" name="validation-select" class="select"><option value="">Select Tax</option>'+option12+'</select></td><td id="amount'+rowCount+'" tamount="'+result12[i][i].tax_amount+'" dtltaxid='+result12[i][i].id+' ><input type="text" maxlength="14" size="6" value='+result12[i][i].tax_amount+' id="edittax_amount_'+rowCount+'"   onkeyup="set_taxamount('+rowCount+',event)";  class="input anthracite name="edittax_amount" data-tooltip-options="{"position":"left"}" /></td><td><ul classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list  children-tooltip"><li  title="Delete Tax"><a href="javascript:void(0)" id="deletetax_'+rowCount+'" onclick="deletetax('+rowCount+',event);"  class="icon-trash icon-size2"></a></li></ul></td></tr>'
						  
						  
					rowCount=Number(rowCount)+1;
					//$('table#tbl_taxselect').append(newrow);
					
				}
			
				  }
				
	
	
	var content='<form id="additemf" detid="'+detailid+'"><div class="block margin-bottom"><div class="with-padding"><p class="block-label button-height" id="group"><label class="label anthracite" for="validation-required">Item Group</label><select disabled id="pdctgroup" name="validation-select" class="select validate[required]"><option value="">Select Item Group</option>'+option+'</select></p><p class="block-label button-height" id="auto"><label class="label anthracite" for="validation-required">Item Name/Code</label><input type="text" value="'+prdname+'" inpid="'+prdid+'"  readonly class="input anthracite full-width validate[required]" id="pid" name="pid" data-tooltip-options="{"position":"right"}" data-prompt-position="topRight:-30,10" ></p><p class="block-label button-height"><label class="label anthracite"  for="validation-required">Specification</label><input type="text" value="'+pspec+'" actual_uom="'+puom+'" class="input anthracite full-width validate[required]" id="spec" name="spec" data-tooltip-options="{"position":"right"}" maxlength="100" ></p><p class="block-label button-height"><label for="validation-select" class="label anthracite">Type</label><input type="text" value="'+ptype+'" class="input anthracite full-width validate[required]" id="prdtype" name="prdtype" data-tooltip-options="{"position":"right"}" readonly></p><p class="block-label button-height" id="inp_uom"><label class="label anthracite" for="validation-required">UOM</label><input type="text" value="'+puom+'" class="input anthracite full-width validate[required]"  id="uom" name="uom" data-tooltip-options="{"position":"right"}" readonly></p><p class="block-label button-height" id="sel_uom" style="display:none;" ><label class="label anthracite" for="validation-required">UOM</label><select style="width:170px;" id="sel_uom" name="validation-select" class="select validate[required]" onChange="change_textbox(event);"><option value="">Select</option><option value="TON">TON</option><option value="KG">KG</option></select></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Quantity</label><input type="text" value="'+pqty+'" maxlength="14" class="input anthracite full-width validate[required,funcCall[checkvalue]]" id="qty" name="qty" onkeyup="genamount(event)" data-tooltip-options="{"position":"right"}"></p><p class="block-label button-height" id="mod"><label class="label anthracite" for="validation-required">Mode of Payment</label><select id="mod" name="validation-select" class="select validate[required]" onchange="changerate(event)" data-prompt-position="topRight:-5,10"><option value="1">Paid</option><option value="2">Free</option></select></p><p class="block-label button-height" id="disc_mod"><label class="label anthracite" for="validation-required">Discount Type</label><select id="disc_mod" name="validation-select" class="select validate[required]" onchange="genamount(event)" data-prompt-position="topRight:-5,10"><option value="1">Percentage</option><option value="2">Amount</option></select></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Rate</label><input type="text" maxlength="14" value="'+prate+'" rateval="'+prate+'" onkeyup="genamount(event)" class="input anthracite full-width validate[required,custom[number]]" id="rate" name="rate" data-tooltip-options="{"position":"right"}"></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Discount</label><input type="text" maxlength="14"  value="'+pdisc+'" discval="'+pdisc+'" discountchange="'+tot_discmnt+'" onkeyup="genamount(event)" class="input anthracite full-width validate[required,custom[number]]" id="discit" name="discit" data-tooltip-options="{"position":"left"}"></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Tax<small>(In %)</small></label></p><p><div id="tablediv" ><table id="tbl_taxselect" class="table responsive-table responsive-table-on"  ><tr class="anthracite" ><th colspan="3"><strong>Select Tax</strong><div style=" margin-left: 296px; margin-top: -18px;"><ul classes":["anthracite-gradient","big-text","with-padding"]"="" data-tooltip-options="" class="blocks-list children-tooltip"><li title="Add Tax"><a href="javascript:void(0)" id="addtax" onclick="showtaxtable('+purid12+',event);" class="icon-list-add icon-size2"></a></li></ul></div></th></tr><tr class="anthracite"><th scope="col" width="10%">Tax Name</th><th class="hide-on-tablet" scope="col" width="10%">Amount<small>(in %)</small></th><th scope="col" width="10%">Actions</th></tr>'+newrow+'</table></div></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Total Tax <small>(In %)</small></label><input type="text" value="'+ptax+'" maxlength="14" taxval="'+ptax+'" taxamount="'+tot_tax+'" onkeyup="genamount(event)" class="input anthracite full-width validate[required,custom[number]]" id="taxit" name="taxit" data-tooltip-options="{"position":"right"}" disabled></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Others</label><input type="text" maxlength="14" value="'+otheramnt+'"  class="input anthracite full-width validate[custom[number]]" id="others" name="others" onkeyup="genamount(event)" discval=""  data-tooltip-options="{"position":"left"}"></p><p class="block-label button-height"><label class="label anthracite" for="validation-required">Total</label><input type="text" value="'+pamount+'" maxlength="14" class="input anthracite full-width validate[required,custom[number]]" id="amt" name="amt" data-tooltip-options="{"position":"right"}"></p><div class="field-block button-height"><button class="button glossy mid-margin-right anthracite with-tooltip" title="Update Item" id="additem"  onclick="foritem(event);" type="submit"><span class="button-icon"><span class="icon-tick"></span></span>Save</button><button class="button glossy anthracite with-tooltip" title="Close" type="reset" onclick="cancelpurdtl(event);" id="cancel"><span class="button-icon red-gradient"><span class="icon-cross-round"></span></span>Close</button></div></div></div></form>';  
						  
					
				
						
					$.modal({
		title: 'Add Items',
		content: content,
		buttons:false
		
							});
							
	if(pmodel=="Free")
		          {
	
					var value=2;
					}
					else if(pmodel=="Paid")
					{
					var value=1;
					}
					
				$("p#mod").find('select#mod').val(value);
				 $("p#mod").find("span.select-value").text(pmodel);
	if(grop!="")
	{
			var grpname = $("select#pdctgroup option[value="+grop+"]").text();
	
			$("p#group").find('select#pdctgroup').val(grop);
			 $("p#group").find("span.select-value").text(grpname);
	}		

if(disctypes=="" || disctypes==null)
{
		disctypes=1;
		var dtype = $("select#disc_mod option[value="+disctypes+"]").text();
	
			$("p#disc_mod").find('select#disc_mod').val(disctypes);
			 $("p#disc_mod").find("span.select-value").text(dtype);
}
else
{
	var dtype = $("select#disc_mod option[value="+disctypes+"]").text();
	
			$("p#disc_mod").find('select#disc_mod').val(disctypes);
			 $("p#disc_mod").find("span.select-value").text(dtype);
}


	if(puom=="KG")
		{
			$("p#inp_uom").hide();
			$("p#sel_uom").show();
			$("p#sel_uom").find('select#sel_uom').val(sel_uom);
			$("p#sel_uom").find("span.select-value").text(sel_uom);
		}
		else
		{
			$("p#inp_uom").show();
			$("p#sel_uom").hide();
		}	
	
	/*if(disctypes!="" ||disctypes!=null ||disctypes!="null" || disctypes!="NULL" )
	{
		alert("kkk");
			var dtype = $("select#disc_mod option[value="+disctypes+"]").text();
	
			$("p#disc_mod").find('select#disc_mod').val(disctypes);
			 $("p#disc_mod").find("span.select-value").text(dtype);
	}	
	else
	{
		alert("gghhhjj");
	disctypes=1;
	 alert(disctypes);
		var dtype = $("select#disc_mod option[value="+disctypes+"]").text();
	
			$("p#disc_mod").find('select#disc_mod').val(disctypes);
			 $("p#disc_mod").find("span.select-value").text(dtype);
			 alert(dtype);
	}*/
}
			</script>
					
<script>

	function change_textbox(event)
	{
		//alert("tttt");
		$("input#qty").val('')
		$('input#rate').val('');
		$('input#amt').val('');
							
	}

	
	function singleitemsave(bulkid,event) 
	{
		
		var dtlids = '<?php echo $itemid; ?>';
			var type='<?php echo $typ; ?>';
			
			var pur = $("button#additems").attr("lastpurid");
			var prdname = $("td#bprd"+bulkid).text();
			var prdid = $("td#bprd"+bulkid).attr("bprdid");
		
			
			var slno =$("#one_input_"+bulkid).val();
			var model =$("#two_input_"+bulkid).val();
			var spec=$("#four_input_"+bulkid).val();
			
			if(slno=="")
			{
				$.modal.alert('Please Enter Serial Number');
				return false;

			}
			if(model=="")
			{
				$.modal.alert('Please Enter Model');
				return false;

			}		
			
			var warnty=$("#datepicker1_"+bulkid).val();
			
			if(warnty ==" " ||warnty==null )
			{
				$.modal.alert('Please Enter Waranty Date');
				return false;

			}	
			
			var dt=warnty.split('-');
		 	if(typeof dt[1]=='undefined')
			{
				 warnty=field.val();
			}
			else
			{
			warnty=dt[2]+'-'+dt[1]+'-'+dt[0];
			}
			
			
			
			var matches = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(warnty);
			if(matches == null)
			{
				var d = new Date(Date.parse(warnty));
				var war_date = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
			}
			else
			{
				var war_date =warnty;
			}
			
			if(war_date=='NaN-NaN-NaN'){
				var msg= "Invalid Date Format";
				 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/Iconsmal.png",closeDelay:"3000",classes:["green"]});
				 return false;
				war_date="";	}
			
				
				if(slno!=""){
				var matche = /^[0-9a-zA-Z]+$/.exec(slno);
				if(matche == null)
				{
				 var msg= "Invalid Serial Number";
				 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/Iconsmal.png",closeDelay:"3000",classes:["green"]});
				 return false;
				}
				}
				if(model!=""){
				var matchew = /^[0-9a-zA-Z ]+$/.exec(model);
				if(matchew == null)
				{
				 var msg= "Invalid Model Number";
				 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/Iconsmal.png",closeDelay:"3000",classes:["green"]});
				 return false;
				}
				}
				
				/*if(war_date>exp_date)
				{
					
					var msg= "Warranty Must be less than Expiry  date ";
				 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
				 return false;
				}*/
				
			var dataString = "bulitemid=" + bulkid +"&prdid=" + prdid + "&warrnty=" + war_date +"&sino="+ slno+ "&model="+ model+"&specification="+spec+"&type="+type+"&action=updatebulkitem"; 
	//alert(dataString);
			$.ajax({
                          type : "GET",
                          async : false,
                          url : "controller",
                          data : dataString,
						 
                          success : function(text) {
                         	// alert(text);
							 var result=text.split('single');
							
                               if (text == "inserted") {
                                      var msg= "Added Successully";
                                      window.location.href = "add?id="+pur+"&action=edit"+from;
									  	notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
                                  } 
								  else if (result[0] == "updated"){
								  
								  var pdct=$.parseJSON(result[1]);
								  	var msg= 'Updated Successully';
									
									$("input#one_input_"+bulkid).hide();
									$("#two_input_"+bulkid).hide();
									$("#three_input_"+bulkid).hide();
									$("#four_input_"+bulkid).hide();
									$(".text").show();
									//alert(pdct[0][0].name);
									
									
									
									
									$("#one_"+bulkid).text(pdct[0][0].slnum);
									$("#two_"+bulkid).text(pdct[0][0].model);
									
									var dt=war_date.split('-');
								
		 							war_date=dt[2]+'-'+dt[1]+'-'+dt[0];
			
									
									$("#three_"+bulkid).text(war_date);
									//var dtt=exp_date.split('-');
							
		 							//exp_date=dtt[2]+'-'+dtt[1]+'-'+dtt[0];
									//alert(spec);
									$("#four_"+bulkid).text(pdct[0][0].spec);
										notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
									
									}
                                    else if(text == "Duplicate entry"){
                                      var msg= 'Serial Number Already Exists';
									  	notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/Iconsmal.png",closeDelay:"3000",classes:["green"]});
                                      }
                                                
					
                           }
              });
			  
			
	
	}


	var dtl_id="";
	//$("a#singleview").click(function() 
	function singleviewitem(detailid,event) 
	
	{
		
		var pur = '<?php echo $_GET['id']; ?>';
		
		if(pur==0 )
		{
			var pur= $("button#additems").attr("lastpurid");
		}
		
		//alert(pur);
		var type = '<?php echo $typ; ?>';
		//alert(type);
		if(type=="")
		{
			window.location.href = "add?id="+pur+"&dtlid="+detailid+"&action=edit&tab=tab3";
		}
		else
		{
			window.location.href = "add?id="+pur+"&dtlid="+detailid+"&type="+type+"&action=edit&tab=tab3";
		}
		}
	//});

	var tb="<?php echo $tab; ?>";
	if(tb =="tab3")
	{
		$("a#tb3").click();
		$(".input1").hide();
		$(".input2").hide();
		$(".editbox").hide();
		$(".text").show();
	}
	else if(tb=="tab2")
	{
		$("a#tb2").click();
	}

	

</script>
<script>
$('a#tb3').click(function() {
		
		$(".input1").hide();
		$(".input2").hide();
		$(".editbox").hide();
		$(".text").show();
	});
</script>
<script>

	function finishpurchase(idname,event)
	{	
			event.preventDefault();
	 
	 if(idname==100)
		{
			idname="FinishthisPurchase";
			
		}
	
	
			 $('button#'+idname).confirm({
                    message : 'Are you sure want to finish? </br>after finish you cannot able to edit or delete </br> the purchase entry',
                    onConfirm : function() {
					//alert("ttt");
			var prch_id = $("button#addpurchase").attr("purid");
			var totalamnt=$('input#total_amt').val();
			var invoiceamnt=$('input#inv_amt').val();
		
			if(totalamnt!=invoiceamnt)
			{
			if(totalamnt>invoiceamnt)
			{
				var adj_value=Number(totalamnt)-Number(invoiceamnt);
			}
			else
			{
				var adj_value=Number(invoiceamnt)-Number(totalamnt);
			}
				var content='<form id="adjust" prch_id="'+prch_id+'" ><div class="block margin-bottom"><div class="with-padding"><p class="block-label button-height"><label class="label anthracite" for="validation-required">Adjustment Amount</label><input type="text" value="'+adj_value+'" maxlength="14" class="input anthracite full-width validate[required,custom[number]]" id="adjustment" name="adjustment" totalamnt="'+totalamnt+'" invoice="'+invoiceamnt+'"  data-tooltip-options="{"position":"right"}"></p><div class="button-height"><button class="button glossy mid-margin-right anthracite with-tooltip" title="Finish" id="finishpopup" onclick="finishpurdtl(event);" type="submit"><span class="button-icon"><span class="icon-download"></span></span>Finish</button><button class="button glossy anthracite with-tooltip" title="Close" type="reset" onclick="cancelpurdtl(event);" id="cancel"><span class="button-icon red-gradient"><span class="icon-cross-round"></span></span>Close</button></div></div></div></form>'
				
				$.modal({
					title: 'Finish Purchase',
					content: content,
					buttons:false,
					 //scrolling: false
	
				});
			}
			else
			{
				var adj_amount=0;
				var dataString = "prch_id=" + prch_id +"&invoiceamnt="+invoiceamnt+"&adj_amount="+adj_amount+ "&action=Savepurchase";
				//alert(dataString);
					$.ajax({
							type : "GET",
							async : false,
							url : "controller",
							data : dataString,
							success : function(text) {
								//alert(text);
								 if (text == "Saved") 
								 {
									var msg= "Saved Successully";
									window.location.href = "view?from=mst";
								 }
								else if(text == "Fill SingleItem"){
																	
									var msg= 'Pls Fill out Item Details';
																  
								 }
																  
								notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
							}
					});
					return false;
				}
				}
				});
			}
			
	


	

	function saveasdraft(event)
	{
		event.preventDefault();
		var prch_id = $("button#saveas").attr("purid");
		var remarks=$('textarea#remarks').val();
		
		var selectval=$("select#ordernum").val();
									
									if(selectval==0)
									{
								
										var refno = $('input#ordernum').val();
									}
									else
									{
										
										var refno = $('select#ordernum').val();
									}
									
									var vndr_id  = $("input#vid").attr('invid');
									var inv_no = $("input#inv_no").val();
									var inv_dt = $("input#datepicker").val();
									var matches = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(inv_dt);
									if(matches == null)
									{
										var dt=inv_dt.split('-');
										 if(typeof dt[1]=='undefined')
										{
											var d = new Date(Date.parse(inv_dt));
											var date = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
										}
										else
										{
											date=dt[2]+'-'+dt[1]+'-'+dt[0];
										}
									}
									else
									{
										var date =inv_dt;
									}
									
									var tax = $('input#tax').val();
									var discount = $('input#disc').val();
									var total_amt = $('input#total_amt').val();
									var invtax = $('input#invtax').val();
									var invdiscount = $('input#invdisc').val();
									var inv_amt = $('input#inv_amt').val();
									var adj_amt = $('input#adj_amt').val();
									var warehouse = $('select#warehouse').val();
									var note = $('textarea#note').val();
									
									var loadcost = $('input#load_cost').val();
								
									var shipcost = $('input#ship_cost').val();
									var othercost = $('input#others_cost').val();
									 table="tmp_purchase_header";
									
									var recv_date = $("input#datepicker1").val();
									var matches = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(recv_date);
									if(matches == null)
									{
										var dtt=recv_date.split('-');
										 if(typeof dtt[1]=='undefined')
										{
											var d = new Date(Date.parse(recv_date));
											var revdate = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
										}
										else
										{
											revdate=dtt[2]+'-'+dtt[1]+'-'+dtt[0];
										}
									}
									else
									{
										var revdate =recv_date;
									}
									var rc_name = $('input#rc_name').val();
									var desig = $('input#desig').val();
									var trname = $('input#trname').val();
									var terms = $('textarea#terms').val();
									
									var dataString ="id=" + prch_id +"&vndr_id=" + vndr_id 
									+ "&inv_no=" + inv_no + "&inv_dt=" + date +"&total_tax=" + tax + "&total_discount=" + discount + "&total_amt=" + total_amt +"&inv_tax=" + invtax + "&inv_disc=" + invdiscount + "&inv_amt=" + inv_amt+"&adj_amt=" + adj_amt +"&warehouse=" + warehouse +"&ref_no=" + refno +"&load_cost=" + loadcost + "&ship_cost=" + shipcost+"&note=" + note+"&table="+table+"&receivedate="+revdate+"&rename="+rc_name+"&designation="+desig+"&transport="+trname+"&termsof="+terms+"&remarks="+remarks+"&othercost="+othercost+"&action=Saveasdraft" ; 
								//alert(dataString);
								$.ajax({
						type : "GET",
						async : false,
						url : "controller",
						data : dataString,
						success : function(text) {
							 //alert(text);
							 if (text == "saveasdraft") 
							 {
								var msg= "Purchase Successully Saved As Draft";
								window.location.href = "<?php echo MAIN_PATH ?>purchase/view?from=tmp";
							 }
							notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
						}
				});
				return false;
								
						
	}


	
	$( window ).load(function() {
	//$(function() {
		//alert("jjj");
			var id = $("button#addpurchase").attr("purid");
		if(id!="")
			{
		
				var dataString = "pid=" + id + "&action=findcount";
                       //alert(dataString);
                        $.ajax({
                            type : "GET",
                            async : false,
                            url : "controller",
                            data : dataString,
                            success : function(text) {
							//alert(text);
							if(text>0)
							{
								$('button#FinishPurchase').show();
								$('button#FinishthisPurchase').show();
									$('button#FinishmyPurchase').show();
							}
							else
							{
								$('button#FinishPurchase').hide();
								$('button#FinishthisPurchase').hide();
									$('button#FinishmyPurchase').hide();
							}
							
							}
                        });
                       
			}
						
  			var checkid= "<?php echo $_GET['id']; ?>";
			if(checkid== "")
			{
			$('a#tb2').bind('click', function(){ return false; });
			$('a#tb3').bind('click', function(){ return false; });
			
			}
			else
			{
				$('a#tb2').unbind('click' );
				
			}
			var whid = $("input#desig").attr("wrhsid");
			//alert(whid);
			var orderid = $("input#desig").attr("refno");
			//alert(orderid);
			if(whid!="")
		        {
		   			//alert(whid);
					var wname = $("select#warehouse option[value="+whid+"]").text();
					$("p#warehouse").find('select#warehouse').val(whid);
				 	$("p#warehouse").find("span.select-value").text(wname);
				}
			if(orderid!="")
				{
			//alert(orderid);
					var option='<option selected="selected" value="'+orderid+'">'+orderid+'</option>';
				
					$('select#ordernum').append(option);
					$("p#ordernum").find('select#ordernum').val(orderid);
				 	$("p#ordernum").find("span.select-value").text(orderid);
					$('select#ordernum').prop('disabled', 'disabled');
				}
			
			
		});
		
		function singleshowtxtbox(bulkid,event) 
	 {
	
	
	$(".input2").hide();
	$(".input1").hide();
	$(".editbox").hide();
	$(".text").show();
	
	
	$("#one_input_"+bulkid).show();
	$("#two_input_"+bulkid).show();
	$("#three_input_"+bulkid).show();
	$("#four_input_"+bulkid).show();
	//$("#datepicker1_"+bulkid).show();
	//$("#datepicker2_"+bulkid).show();
	$("#one_"+bulkid).hide();
	$("#two_"+bulkid).hide();
	$("#three_"+bulkid).hide();
	$("#four_"+bulkid).hide();
	 }
	 
	
</script>

<script>
	$('select#ordernum').change(function() {
	
		var po_num=$('select#ordernum').val();
		//alert(po_num);
		if(po_num=="")
		{
			$('input#ordernum').hide();
			$('form#AddPurchase')[0].reset();
			$("input#vid").attr("disabled", false); 
		}
		else if(po_num ==0)
		{
			$('input#ordernum').show();
			$('form#AddPurchase')[0].reset();
			$("input#vid").attr("disabled", false); 
			var other = $("select#ordernum option[value="+po_num+"]").text();
			$("p#ordernum").find('select#ordernum').val(po_num);
			$("p#ordernum").find("span.select-value").text(other);
			
		}
		else
		{
			$('input#ordernum').hide();
			var dataString = "order_id=" + po_num+"&action=issuedetails"  ; 
			//alert(dataString);
			var result="";
			var zeroval="0.00";
			$.ajax({
						   	type : "GET",
						  	async : false,
						   	url : "controller",
						 	data : dataString,
							 beforeSend: function() {
							 		$('div#loading').show();
									$('div#loading').html("<img src='<?php echo MAIN_PATH ?>img/loader.gif'  />Please wait Loading details...");
								
 							 },

						  	success : function(data) {
					   					//alert(data);
					   					result=$.parseJSON(data);      
										$('div#loading').hide();
										           
									}  
							
				});
				
			$("input#vid").attr("invid",result[0][0].vid)
			 $("input#vid").attr("disabled", true);           
		    $('input#vid').val(result[0][0].vname); 
	
			if(result[0][0].tax ==null)
			{
				
				var tax=zeroval;
			}
			else
			{
				
				var tax=result[0][0].tax;
			}
			if(result[0][0].discount==null)
			{
				var discount=zeroval;
			}
			else
			{
				var discount=result[0][0].discount;
			}
			if(result[0][0].others==null)
			{
				var others=zeroval;
			}
			else
			{
				var others=result[0][0].others;
			}
			/*$('input#tax').val(tax);
			$('input#disc').val(result[0][0].discount);
			$('input#total_amt').val(result[0][0].rate);*/
			$('input#tax').val(zeroval);
			$('input#disc').val(zeroval);
				var newto=Number(result[0][0].ship_cost)+Number(others);
			$('input#total_amt').val(newto);
			
			$('input#invtax').val(tax);
			$('input#invdisc').val(discount);
			$('input#inv_amt').val(result[0][0].rate); 
			$('input#ship_cost').val(result[0][0].ship_cost);
			$('input#load_cost').val(zeroval);
			$('input#others_cost').val(others);
			
			//('input#adj_amt').val(others);
		}

	});
	
	
	function checkPrev_req(field, rules, i, options){
		
			var req=field.val();
		var req_msg;
		var id = $("button#addpurchase").attr("purid");
		if (id == "") {
						id = 0;
					}
	
		var dataString ="id=" + id +"&req_num=" + req + "&action=dup_check"; 
					//alert(dataString);

                    $.ajax({
                                type : "GET",
                                 async : false,
                                url : "controller",
                                data : dataString,
                                success : function(text) {
									//alert(text);
									if(text>0){
								req_msg="Duplicate";
								 
								}
								}
			});
			if(req_msg=="Duplicate"){
			return options.allrules.referenceDup.alertText;	
			}
			
 	}
	
	function checkPrev_invoice(field, rules, i, options){
		
			var invoice=field.val();
		
		var req_msg;
		//return options.allrules.validate2fields.alertText;	
		var id = $("button#addpurchase").attr("purid");
		if (id == "") {
						id = 0;
					}
	
		var dataString ="id=" + id +"&invoice=" + invoice + "&action=dup_checkinvoice"; 
					//alert(dataString);

                    $.ajax({
                                type : "GET",
                                 async : false,
                                url : "controller",
                                data : dataString,
                                success : function(text) {
									//alert(text);
									if(text>0){
								req_msg="Duplicate";
								 
								}
								}
			});
			if(req_msg=="Duplicate"){
			return options.allrules.InvoiceDup.alertText;	
			}
			
 	}
	
	function checkvendor(field, rules, i, options)
	{
	
		var vendid = $("input#vid").attr("invid");
		//alert(vendid);
		if(vendid=="")
		{
			return options.allrules.InvSpplier.alertText;	
		}
	}
	
	function checkitem(field, rules, i, options)
	{
	
	var itmdid = $("input#pid").attr("inpid");
	//alert(vendid);
	if(itmdid=="")
	{
		return options.allrules.InvItem.alertText;	
	}
	
	
	}
	$("button#purchasecancel").click(function(event) {
			
			event.preventDefault();
				var purid =$("button#addpurchase").attr("purid");
				
					if(purid==""){
					
					$('#AddPurchase')[0].reset();
					}
					else
					{
						
						$('button#purchasecancel').confirm({
					message : 'Are you really want to Cancel this Purchase?',
					onConfirm : function() {
						
						var dataString = "id=" + purid + "&action=delete";
						//alert(dataString);
						$.ajax({
									type : "GET",
									async : false,
									url : "controller",
									data : dataString,
									success : function(text) {
										 		//alert(text);
												if(text=="null")
												{	
													 var msg= 'An Error Occured while cancelling Purchase';
													 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/Iconsmal.png",closeDelay:"3000",classes:["green"]});
												}
												else
												{
													retrn_cmmtd_id=$.parseJSON(text)
													
													if(purid==retrn_cmmtd_id[0])
													{
													 var msg= 'Cancel Successully';
													 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
													window.location.href = "<?php echo MAIN_PATH ?>purchase/view";
													}
													else
													{
														 var msg= 'An Error Occured while cancelling Request';
														 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/Iconsmal.png",closeDelay:"3000",classes:["green"]});													}
												}
												
											}
											});
										
						return false;
					}
				});
					}
			
					
		});
		
		
		function purchasecancel(idname,event) {
			
			event.preventDefault();
				var purid =$("button#addpurchase").attr("purid");
				if(idname==200)
				{
					idname="purcancel";
				}
				
				$('button#'+idname).confirm({
					message : 'Are you really want to Cancel this Purchase?',
					onConfirm : function() {
						
						var dataString = "id=" + purid + "&action=delete";
						//alert(dataString);
						$.ajax({
									type : "GET",
									async : false,
									url : "controller",
									data : dataString,
									success : function(text) {
										 		//alert(text);
												if(text=="null")
												{	
													 var msg= 'An Error Occured while cancelling Purchase';
													 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/Iconsmal.png",closeDelay:"3000",classes:["green"]});
												}
												else
												{
													retrn_cmmtd_id=$.parseJSON(text)
													
													if(purid==retrn_cmmtd_id[0])
													{
													 var msg= 'Cancel Successully';
													 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
													window.location.href = "<?php echo MAIN_PATH ?>purchase/view";
													}
													else
													{
														 var msg= 'An Error Occured while cancelling Purchase';
														 notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/Iconsmal.png",closeDelay:"3000",classes:["green"]});
													}
												}
												
											}
									});
										
						return false;
					}
				});
			}
			
			// To remove page scrolling
	$(document).on('mousewheel touchmove', '#modals', function(event)
	{
		event.preventDefault();
	});	
	
	
	
	function checkHELLO(field, rules, i, options){
		var start_date=$("input#datepicker").val();
			
		var enddate=field.val();
		var dt=enddate.split('-');
		 if(typeof dt[1]=='undefined')
			{
				 enddate=field.val();
			}
			else
			{
			enddate=dt[2]+'-'+dt[1]+'-'+dt[0];
			}
		var matches = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(enddate);
		if(matches == null)
		{
		var d = new Date(Date.parse(enddate));
		var end_dd =("0" + d.getDate()).slice(-2);
		var end_mn=("0" + (d.getMonth() + 1)).slice(-2);
		var enddate = d.getFullYear()+"-"+end_mn+"-"+end_dd;
		}
		var det=start_date.split('-');
		 if(typeof dt[1]=='undefined')
			{
				 start_date=field.val();
			}
			else
			{
			start_date=det[2]+'-'+det[1]+'-'+det[0];
			}
		var matches1 = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(start_date);
		if(matches1 == null)
		{
		var bb = new Date(Date.parse(start_date));
		var start_dd =("0" + bb.getDate()).slice(-2);
		var start_mn=("0" + (bb.getMonth() + 1)).slice(-2);
		var start_date = bb.getFullYear()+"-"+start_mn+"-"+start_dd;
		}
		
		var matches = /(\d{4})[-\/](\d{2})[-\/](\d{2})/.exec(enddate);
		if(matches == null)
		{
			return options.allrules.onlyDate.alertText;
		}
		
		 if(enddate<start_date){
		 	return options.allrules.fieldscheck.alertText;
 		 }
 }
	function checkchange(id,event)
	{
				event.preventDefault();
				if($("#check"+id).prop("checked")==true)
				{
   					$("#check"+id).prop('checked', false);
					$("span#checkspan"+id).removeClass( "checked");
				}
				else
				{
					$("#check"+id).prop('checked', true);
				$("span#checkspan"+id).addClass( "checked");
				}
	}
			
			
			
			
			function totalamountchange(nowid,event)
			{
				event.preventDefault();
				//alert(nowid);
				var currentamount=$("input#total_amt").attr("product_total");
				var chng_load=$("input#load_cost").val();
				var chng_frght=$("input#ship_cost").val();
				var chng_other=$("input#others_cost").val();
				//var adjamount=$( "input#adj_amt" ).val();
				var invoiceamount=$( "input#inv_amt" ).val();
				//alert(invoiceamount);
				var newamount=Number(currentamount)+Number(chng_load)+Number(chng_frght)+Number(chng_other);
				$( "input#total_amt" ).val(newamount);
				
			}	
			
			/*function finishpopup(event)
			{
				$('form#adjust').validationEngine('attach', {promptPosition: 'topRight:-100',
							onValidationComplete : function(form, status) {// when validate is on and the form scan is completed
								if (status == true) {
                                	$('form').bind('submit', function(e) {
										e.preventDefault();
									});
									alert("hhhh");
									 $('form').validationEngine('detach');
									 return false;
									 
                                }
							}
						});
			}*/
			function finishpurdtl(event)
			{
				//alert("tyyy");
				$('form#adjust').validationEngine('attach', {promptPosition: 'topRight:-100',
							onValidationComplete : function(form, status) {// when validate is on and the form scan is completed
								if (status == true) {
                                	$('form').bind('submit', function(e) {
										e.preventDefault();
									});
									//alert("hhhh");
									var prch_id = $("form#adjust").attr("prch_id");
									var adjustment_amount=$("input#adjustment").val();
									var invoiceamnt = $("input#adjustment").attr("invoice");
									//alert(invoiceamnt);
									var totalamnt = $("input#adjustment").attr("totalamnt");
									//alert(totalamnt);
									if(Number(invoiceamnt) > Number(totalamnt))
									{
									//alert("invoiceamnt greater");
										var newamnt=totalamnt+adjustment_amount;
										if(newamnt!=invoiceamnt)
										{
											$.modal.alert('Invoice Amount must be equal to Sum of Total Amount And Adjustment Amount');
											$('form').validationEngine('detach');
											return false;
										}
										else
										{
											//var dataString = "prch_id=" + prch_id +"&invoiceamnt="+invoiceamnt+ "&action=Savepurchase";
											var dataString = "prch_id=" + prch_id +"&invoiceamnt="+invoiceamnt+"&adj_amount="+adjustment_amount+ "&action=Savepurchase";
											//alert(dataString);
												$.ajax({
															type : "GET",
															async : false,
															url : "controller",
															data : dataString,
															success : function(text) {
																//alert(text);
																 if (text == "Saved") 
																 {
																	var msg= "Saved Successully";
																	window.location.href = "view?from=mst";
																 }
																else if(text == "Fill SingleItem"){
																									
																	var msg= 'Pls Fill out Item Details';
																								  
																 }
																								  
																notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
															}
													});
										}
									}
									else
									{
									//alert("invoiceamnt less");
										var newamnt=totalamnt-adjustment_amount;
										if(newamnt!=invoiceamnt)
										{
											$.modal.alert('Invoice Amount must be equal to Difference of Total Amount And Adjustment Amount');
											$('form').validationEngine('detach');
											return false;
										}
										else
										{
											var dataString = "prch_id=" + prch_id +"&invoiceamnt="+invoiceamnt+"&adj_amount="+adjustment_amount+ "&action=Savepurchase";
											//alert(dataString);
												$.ajax({
															type : "GET",
															async : false,
															url : "controller",
															data : dataString,
															success : function(text) {
																//alert(text);
																 if (text == "Saved") 
																 {
																	var msg= "Saved Successully";
																	window.location.href = "view?from=mst";
																 }
																else if(text == "Fill SingleItem"){
																									
																	var msg= 'Pls Fill out Item Details';
																								  
																 }
																								  
																notify('Notification',msg,{hPos:"center",vPos:"top",icon:"<?php echo MAIN_PATH ?>img/demo/icon.png",closeDelay:"3000",classes:["green"]});
															}
													});
										}
									}
									
									 $('form').validationEngine('detach');
									 return false;
									 
                                }
							}
						});
			}
			
			function checkvaluedis(field, rules, i, options)
			{
				var disc=field.val();
				var disctype=$("select#disc_mod").val();
				if(disctype==1)
				{
					if(disc<0)
					{
						return options.allrules.Minimumv.alertText;	
					}
					else if(disc>100)
					{
						return options.allrules.Maxmumv.alertText;	
					}
				}
			}
</script>
	</body>
	</html>