 <link rel="stylesheet" type="text/css" href="css/easyui.css">
 <link rel="stylesheet" type="text/css" href="css/icon.css">
 <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
 <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
<?php
    $lang  = $_REQUEST["m"]; 
?>
<table id="songsTable" class="easyui-datagrid" style="width:800px;height:500px"
            url="lyrics_table2.php?char=<?php echo $_REQUEST["char"];?>&m=<?php echo $_REQUEST["m"];?>"
            autoRowHeight="false" pageSize="50" singleSelect="true"
            rownumbers="true">
<?php if($lang == 1) { ?> 
        <thead>
            <tr>                
                <th data-options="field:'Medium', width:70">Medium</th>
                <th data-options="field:'song_detail', width:250">Song Title</th>
                <th data-options="field:'film_info', width:150">Film Name</th>
                <th data-options="field:'singer_info', width:150">Singers</th>
                <th data-options="field:'lyricist', width:150">Lyricist</th>                
            </tr>
        </thead>
<?php } else {?>
        <thead>
            <tr>                
                <th data-options="field:'Medium', width:70">பதிவு ஊடகம்<</th>
                <th data-options="field:'song_detail', width:250">பாடல் பெயர்</th>
                <th data-options="field:'film_info', width:150">படப் பெயர்</th>
                <th data-options="field:'singer_info', width:150">பாடகர்கள</th>
                <th data-options="field:'lyricist', width:150">பாடலாசிரியர</th>                
            </tr>
        </thead>
<?php } ?>
    </table>
   