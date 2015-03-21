<table width="630" style="float:right;" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left" width="500">            
			<table width="100%" class="" cellpadding="0" cellspacing="0">
			<form method="post" action="overallsearch.php">
				<tr>
					<td class="search-bg-big" >
						<input name = "fname" style = "width: 410px; margin-left: 19px; margin-top: 4px; border:none;height:25px;" type = "text" class = "form-txt" 
							   search_index = "textfield3" size = "70" onblur = 'if (this.value == "" ) {this.value = "Search for Raja songs"}' 
							   onfocus = 'if (this.value == "Search for Raja songs") { this.value = "" }'
							   value = "<?php echo (isset($_REQUEST['fname'])) ? $_REQUEST['fname'] : "Search for Raja songs" ?>" />
					</td>
					<td class="" style="text-decoration:none; font-size: 12px; color:#662117; font-weight: bold; width="85px">
						<input type = "radio" checked="true" class="" name = "search_index" value = "1">Starts with<br>
						<input type = "radio" class="" name = "search_index" value = "2"><span style="text-decoration:none; font-size: 12px; color:#662117;">Overall</span>
					</td>
					<td width="75px;" align="center" border="0" valign="top">
						<input type="image" border="0" src="raja-images/search_icon.png" alt="Submit" width="64" height="46">
					</td>
				</tr>
			</form>
			</table>            
        </td>
        <!--<td width="70"><button type="submit" style="margin:-18px 0 0 12px;"><img src="raja-images/search_button.png"  /></button></td>
        <td width="110"><input type="submit" name="button" id="searchbutton" value="Search" /></td>-->
    </tr>
</table>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		var search_index_new = "<?php echo @$_REQUEST['search_index']; ?>";
		jQuery("input[name=search_index][value=" + search_index_new + "]").prop('checked', true);
	});
</script>

