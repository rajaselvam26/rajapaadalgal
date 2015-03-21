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
                    <table width="112" border="0" cellspacing="0" cellpadding="0" style="margin-left: 2px;">
                      <tr>                      
                        <td width="112" height="54" align="left"  background="raja-images/letters-bg-head.png">
                          <table width="100%" height="34" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="3%" height="26">&nbsp;</td>                              
                              <td width="97%" valign="top" style="color: #662117 !important; padding-top: 12px !important; padding-left:1px; font-size:13px;" class="txt-hd-white">Search by Letters</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td valign="top" height="19" background="raja-images/side-bg-under.png" style="background-repeat:no-repeat;" colspan="3"> </td>
                      </tr>
                    </table>
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
                          <table width="60" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="8">&nbsp;</td>
                              <?php include("side.php"); ?>
                            </tr> 
                          </table>
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
                  <td width="129" style="height:45px !important;" height="40" valign="top" background="raja-images/letters-bg-head.png">
                    <table width="129" height="45" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="12%" height="45" valign="middle" class="txt-hd-white">&nbsp;</td>
                        <td width="88%" valign="middle" class="txt-hd-white">
                          <div style="padding-top:10px; padding-left: -10px;"  align="left">
                            <span class="txt-hd-brown" style="font-size: 14px;">  Film Search</span>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td width="660" align="right" valign="top">
                    <?php include_once("search_box.php"); ?>
                  </td>
                  <td width="29" valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td height="19" colspan="3" valign="top" background="raja-images/side-bg-under.png" style="background-repeat:no-repeat;">&nbsp;</td>
                </tr>

              </table>
              <table>
                <tr>
                  <td border="1" width="100%" height="100%">
                    <?php include_once("film_result.php"); ?>
                  </td>
                </tr>
              </table>

              
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</td>
</tr>
</table>
<?php include("footer.php"); ?>