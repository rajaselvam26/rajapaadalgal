<?php include('header.php'); ?>

	<table width="998" border="0" align="left" cellpadding="0" cellspacing="0">
		<tr>
			<td height="333" colspan="2" valign="top" bgcolor="#F3EDDD">
				<table width="993" border="0" align="left" cellpadding="0" cellspacing="0">
					<tr>
						<td width="112" height="265" valign="top">
							<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td width="112" height="73" valign="top">
					                    <?php include("search_by_letter.php"); ?>                   
					                  </td>
								</tr>
								<tr>								
									<td height="33">
										<table width="112" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-left:3px;">
											<tr>
												<td width="112" align="left" height="14" valign="bottom">
													<img src="raja-images/lett-bg1.png"  style="margin-left: px;" width="112px" height="13" />
												</td>
											</tr>
											<tr>
												<td valign="top" class="ltr-bg2">
													 <?php include("side.php"); ?>
												</td>
											</tr>
											<tr>
												<td>
													<img src="raja-images/lett-bg3.png" width="112px" height="9" style="" />
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
						<td width="827" valign="top" border=1>
							<table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
							  <tr>
				                  <?php 
				                    $_SESSION['title_name'] = 'Film Search';
				                    include('content_title.php'); 
				                  ?>
				                  <td width="660" valign="top">
				                    <?php 
				                      include_once("search_box.php"); 
				                    ?>
				                  </td>
				                  <td width="29" valign="top">&nbsp;</td>
				                </tr>
				                <tr>
				                  <td colspan="3" valign="top" background="raja-images/side-bg-under.png" style="background-repeat:no-repeat;">&nbsp;</td>
				                </tr>
				                <tr>
				                  <td colspan="3" valign="top" >
				                  		<?php
								// if($_REQUEST["search_index"] == 1) {
									$_GET["search"] = $_REQUEST["fname"];
									$_GET["search_index"] = $_REQUEST["search_index"];
									include_once("songs_result.php"); 
								// }  else {
									// $_GET["fname"] = $_REQUEST["fname"];
									// $_GET["search_index"] = $_REQUEST["search_index"];
									// include_once("songs_result.php"); } 
									?>
							<!-- Overall Search Results - Ends -->
				                  </td>
				                </tr>
				              </table>
				              <!-- Overall Search Results - Starts -->
							

							</table>
							
							

						</td>
					</tr>
					<tr>
						<td height="50"> &nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</td>
</tr>
</table>
<?php include("footer.php"); ?>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="ddsmoothmenu.js"></script>
<script type="text/javascript">

    function doSearch(){
      var song_name = $('#song_name').val();
      $('#songsTable').datagrid('load',{
        fname: song_name        
      });
    }

    $(document).ready(function(){    
      $('#song_name').bind('keypress', function(e) { 
          if(e.keyCode==13){
            doSearch();
            }
        }); 
      })

</script>