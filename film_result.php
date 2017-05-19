<link rel="stylesheet" type="text/css" href="css/easyui.css">
<link rel="stylesheet" type="text/css" href="css/icon.css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
<?php
$lang = (isset($_REQUEST["lang"])) ? $_REQUEST["lang"] : 1;
$movie_title = ($lang == SONG_ENGLISH) ? "Movie name" : "படப் பெயர்";
$lead_actors = ($lang == SONG_ENGLISH) ? "Lead Actors" : "நடிகர், நடிகை";
$director = ($lang == SONG_ENGLISH) ? "Director" : "இயக்குநர்";
$producer = ($lang == SONG_ENGLISH) ? "Producer" : "தயாரிப்பாளர்";
?>
<table id="moviesTable" title="Film Search" class="easyui-datagrid" style="width:850px;height:600px;"
       url="film_grid.php?lang=<?php echo $lang; ?>" toolbar="#tb"
       autoRowHeight="true" singleSelect="true" 
       rownumbers="true"  iconCls="icon-save" pagination="true">

    <thead>
        <tr>                
            <th data-options="field:'movie', width:250" resizable="false"><?php echo $movie_title; ?></th>                
            <th data-options="field:'year', width:50" resizable="false" sortable="true">Year</th>
            <th data-options="field:'actor_info', width:150" resizable="false"><?php echo $lead_actors; ?></th>
            <th data-options="field:'director', width:150" resizable="false"><?php echo $director; ?></th>
            <th data-options="field:'fproducer', width:150" resizable="false"><?php echo $producer; ?></th>             
        </tr>
    </thead>      

</table>
<div id="tb" style="padding:5px; right:10px;">        
    <div class="ui-widget" style="border-radius:5px; font-size: 12px; padding:4px 2px;" >
        <span style="padding:5px; right:10px;"><?php echo $movie_title; ?>: </span>
        <input id="movie_name" style="line-height:26px;border:1px solid #ccc">
        <!-- <a href="#" class="easyui-linkbutton" plain="true" onclick="doSearch();">Search</a> -->
    </div> 
    <div style="position: absolute;  right:10px; top: 20px;">
        <?php if (@$_REQUEST['lang'] == SONG_TAMIL) { ?>
            <a class="mybutton" href="?lang=<?php echo SONG_ENGLISH; ?>">View in English</a>
        <?php } else { ?>
            <a class="mybutton" href="?lang=<?php echo SONG_TAMIL; ?>">View in Tamil</a>
        <?php } ?>
    </div>     
</div>

<script>
    $(document).ready(function() {
        $('#moviesTable').datagrid({
            onLoadSuccess: function(data) {
                if (data.total == 0) {
                    showNoRecordsMessage($('#moviesTable'));
                } else {
					var vc = $('#moviesTable').datagrid('getPanel').children('div.datagrid-view');
					vc.children('div.datagrid-empty').remove();
				}
				
            }
        })
    });

    function showNoRecordsMessage(target) {
        var vc = $(target).datagrid('getPanel').children('div.datagrid-view');
        vc.children('div.datagrid-empty').remove();
        if (!$(target).datagrid('getRows').length) {
            var d = $('<div class="datagrid-empty"></div>').html('No records match for your search!!!').appendTo(vc);
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