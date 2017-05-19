<link rel="stylesheet" type="text/css" href="css/easyui.css">
<link rel="stylesheet" type="text/css" href="css/icon.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
<?php
if (@$_REQUEST['search'] != "Advanced Search") {
    $lang = (isset($_REQUEST["m"])) ? $_REQUEST["m"] : "";
    $search_char = (isset($_REQUEST["char"])) ? $_REQUEST["char"] : "";
    $film_search = (isset($_REQUEST["search"])) ? $_REQUEST["search"] : "";
    $film_id = (isset($_REQUEST["id"])) ? trim($_REQUEST["id"]) : "";
    $album_search = (isset($_REQUEST["album_search"])) ? trim($_REQUEST["album_search"]) : "";
    
    $song_title = ($lang == SONG_ENGLISH) ? "Song name" : "பாடல் பெயர்";
    if (($search_char != "" || $film_search != "" ) && isset($lang)) {
        ?>
        <table id="songsTable" title="Songs  <?php echo "starts with " . $search_char; ?>" class="easyui-datagrid" style="width:850px;height:600px;"
               url="results_grid.php?flm_search=<?php echo $film_search; ?>&char=<?php echo $search_char; ?>&m=<?php echo $lang; ?>&film_id=<?php echo $film_id; ?>&album_search=<?php echo $album_search; ?>"
               autoRowHeight="true" singleSelect="true"  rownumbers="true"  iconCls="icon-save" toolbar="#tb" pagination="true">
                   <?php if ($lang == 1) { ?> 
                <thead>
                    <tr>                
                        <!-- <th data-options="field:'Medium', width:55" resizable="false">Medium</th> -->
                        <th data-options="field:'sname', width:200" resizable="false" sortable="true">Song Title</th>
                        <th data-options="field:'film_info', width:150" resizable="false" sortable="true">Film Name</th>
                        <th data-options="field:'singer_info', width:240" resizable="false" sortable="true">Singers</th>
                        <th data-options="field:'lyricist', width:150" resizable="false" sortable="true">Lyricist</th>                
                    </tr>
                </thead>
            <?php } else if ($lang == 2) { ?>
                <thead>
                    <tr>                
                        <!-- <th data-options="field:'Medium', width:55" resizable="false">ஊடகம்</th> -->
                        <th data-options="field:'sname', width:200" resizable="false" sortable="true">பாடல் பெயர்</th>
                        <th data-options="field:'film_info', width:150" resizable="false" sortable="true">படப் பெயர்</th>
                        <th data-options="field:'singer_info', width:240" resizable="false" sortable="true">பாடகர்கள</th>
                        <th data-options="field:'lyricist', width:150" resizable="false" sortable="true">பாடலாசிரியர</th>                
                    </tr>
                </thead>
            <?php } ?> </table>
    <?php } else if (@$_REQUEST['fname'] != "") { ?>    

        <table id="songsTable" title="Songs  <?php echo "starts with" . $search_char; ?>" class="easyui-datagrid" style="width:850px;height:600px;"
               url="results_grid.php?fname=<?php echo $_REQUEST['fname']; ?>&search_index=<?php echo $_REQUEST['search_index']; ?>&album_search=<?php echo @$album_search?>"
               autoRowHeight="true" singleSelect="true" toolbar="#tb"
               rownumbers="true"  iconCls="icon-save" pagination="true">
            <thead>
                <tr>                
                    <!-- <th data-options="field:'Medium', width:55" resizable="false">ஊடகம்<</th> -->
                    <th data-options="field:'sname', width:250" resizable="false" sortable="true">பாடல் பெயர்</th>
                    <th data-options="field:'film_info', width:150" resizable="false" sortable="true">படப் பெயர்</th>
                    <th data-options="field:'singer_info', width:180" resizable="false" sortable="true">பாடகர்கள</th>
                    <th data-options="field:'lyricist', width:150" resizable="false" sortable="true">பாடலாசிரியர</th>                
                </tr>
            </thead>
        </table> 

        <?php
    }
} else {
    extract($_REQUEST);
    $lang = (isset($_REQUEST["lang"])) ? $_REQUEST["lang"] : "";
    $song_title = ($lang == SONG_ENGLISH) ? "Song name" : "பாடல் பெயர்";
    $search_params = "fname=$fname&actor=$actor&banner=$banner&actress=$actress&producer=$producer&artist=$artist&director=$director&lyricist=$lyricist&male=$male&female=$female";
    $search_params.="&ch=$lang&search=$search";
    ?>
    <table id="songsTable" class="easyui-datagrid" style="width:856px;height:600px;"
           url="advanced_grid.php?<?php echo $search_params; ?>"
           autoRowHeight="true" title="Advance Search results" singleSelect="true" remoteSort="true" sortName="sname" sortOrder="asc"
           rownumbers="true"  iconCls="icon-save" pagination="true">
               <?php if ($lang == 1) { ?> 
            <thead>
                <tr>                
                    <!-- <th data-options="field:'Medium', width:55" resizable="false">Medium</th> -->
                    <th data-options="field:'sname', width:250" resizable="false" sortable="true">Song Title</th>
                    <th data-options="field:'film_info', width:150" resizable="false" sortable="true">Film Name</th>
                    <th data-options="field:'singer_info', width:180" resizable="false" sortable="true">Singers</th>
                    <th data-options="field:'lyricist', width:150" resizable="false" sortable="true">Lyricist</th>                
                </tr>
            </thead>
        <?php } else { ?>
            <thead>
                <tr>                
                    <!-- <th data-options="field:'Medium', width:55" resizable="false">ஊடகம்<</th> -->
                    <th data-options="field:'sname', width:250" resizable="false" sortable="true">பாடல் பெயர்</th>
                    <th data-options="field:'film_info', width:150" resizable="false" sortable="true">படப் பெயர்</th>
                    <th data-options="field:'singer_info', width:180" resizable="false" sortable="true">பாடகர்கள</th>
                    <th data-options="field:'lyricist', width:150" resizable="false" sortable="true">பாடலாசிரியர</th>                
                </tr>
            </thead>
        <?php } ?> 
    </table>

<?php } ?>
<?php
$path_parts = pathinfo($_SERVER['REQUEST_URI']);
if ($path_parts['basename'] != "advanced_tamil.php" && $path_parts['basename'] != "advanced_english.php") {
    ?>
    <div id="tb" style="padding:5px; right:10px;">        
        <div class="ui-widget" style="border-radius:5px; font-size: 12px; padding:4px 2px;" >
            <span style="padding:5px; right:10px;"><?php echo $song_title; ?>: </span>
            <input id="song_name" style="line-height:26px;border:1px solid #ccc">
            <a href="#"  class="mybutton" plain="true" onclick="doSearch();">Search</a>
        </div>           
    </div>


<?php } ?>

<script>
    $(document).ready(function() {
		
        $('#songsTable').datagrid({
            onLoadSuccess: function(data) {
                if (data.total == 0) {
                    showNoRecordsMessage($('#songsTable'));
                } else {
					var vc = $('#songsTable').datagrid('getPanel').children('div.datagrid-view');
					vc.children('div.datagrid-empty').remove();
				}
            }
        })
    });

    function showNoRecordsMessage(target) {
        var vc = $(target).datagrid('getPanel').children('div.datagrid-view');
        vc.children('div.datagrid-empty').remove();
        if (!$(target).datagrid('getRows').length) {
            var d = $('<div class="datagrid-empty"></div>').html('No Songs found for your search!!!').appendTo(vc);
            d.css({
                position: 'absolute',
                left: 0,
                top: 50,
                width: '100%',
                textAlign: 'center'
            });
        } else {
            vc.children('div.datagrid-empty').remove();
        }
    }
</script>