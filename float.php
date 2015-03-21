  <style>
  #floatDiv {
	  background: url("images/social-media/bg.png") repeat scroll 0 0 rgba(0, 0, 0, 0);
	  border-radius: 13px;
	  height: 400px;
	  left: 89%;
	  margin-left: 0;
	  margin-top: 150px;
	  padding: 10px;
	  position: absolute;
	  width: 50px;
	  z-index: 99;
  }
  </style>
  
  <script language="javascript">
  $(document).ready(function(){
	  //on window scroll fire it will call a function.
	  $(window).scroll(function () {
	  //after window scroll fire it will add define pixel added to that element.
	  set = $(document).scrollTop()+"px";
	  //this is the jQuery animate function to fixed the div position after scrolling.
	  $('#floatDiv').animate({top:set},{duration:300,queue:false});
	  });
  });
  </script>
  <div id="floatDiv" style="top: 0px;">
  <a target="_blank" href="#">
  <img border="0"  src="photos/facebook.png">
  </a>
  <a target="_blank" href="#">
  <img border="0"  style=" margin-top:10px;" src="photos/twitter_new.png">
  </a>
  <a target="_blank" href="#">
  <img border="0" style=" margin-top:10px;" src="photos/youtube.png">
  </a>
  </div>
