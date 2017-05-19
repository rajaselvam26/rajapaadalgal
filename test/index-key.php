
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xml:lang="ta" xmlns="http://www.w3.org/1999/xhtml" lang="ta"><head>
<meta name="google-site-verification" content="7FLBlgP-QTu5k1lS5SmHyupZWELXK2sTHm7AM3UeYlk">
<script src="tamil_files/analytics.js" async=""></script><script type="text/javascript" src="tamil_files/tamil.js"></script>
<script type="text/javascript" src="tamil_files/converter.js"></script><!--<link rel="stylesheet" href="tamil_files/style.css" type="text/css">-->
<meta property="og:title" content="Transliterate to  தமிழ்  (tamil) - English to  தமிழ்  (tamil) Converter">
<meta property="og:description" content="Our Transliteration site supports Tamil, Hindi, Sanskrit, Telugu, Malayalam, Oriya, Punjabi, Bengali, Gujarati, Kannada.">
<meta property="og:type" content="website">
<meta property="og:url" content="http://vengayam.net/translate/tamil/">
 
<style>@import url(http://fonts.googleapis.com/earlyaccess/notosanstamil.css);#convarea .converted_text textarea,code{font-family:'Noto Sans Tamil',serif;}</style>
<!--[if lt IE 8]>
<style>
    #convarea  { width: 98%; }
    #convarea td.many_words_text, #convarea  td.converted_text  { width: 98%; }
    #convarea td.many_words_text textarea, #convarea  td.converted_text  textarea, #convarea .html_text textarea { width: 95%; }
    #convarea td.many_words_text, #convarea  td.converted_text  { width: 50%; }
    .vowels div, .consonants div { width: 50px;float: left }
	.translate_header{
		
	}
</style>
<![endif]-->
<head>
</head>
<body>
<div id="content">

<body>
<div class="wrapper" style="left: 64px;position: absolute;
    top: 40px;">
<div class="wrapp-it">
<div id="convarea">
<form id="lang-convarea" name="convarea" action="">
<table>
<tbody>
<tr><td style="text-decoration:none; font-weight: bold; font-size: 14px; color:#662117; padding:0 8px 0 0;" align="center">தமிழ் எழுதி</td></tr>
<tr>
<td class="many_words_text">
<textarea placeholder="Rajaapaadal" style="border-radius:5px; height: 20px; width: 253px;" name="many_words_text" rows="1" cols="10" onfocus="javascript:print_many_words()" onkeyup="javascript:print_many_words()"></textarea>
</td></tr>
<tr>
<td class="converted_text">
<textarea placeholder="ராஜாபாடல்" style="border-radius:5px;  height: 20px; width: 253px;" id="contenteditable" name="converted_text" rows="1" cols="8" readonly="readonly"></textarea>
</td>
</tr>
</tbody></table>
</form>
</div>
</div>
</div> 
</div> 



<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-6209435-4', 'vengayam.net');
  ga('send', 'pageview');

</script>
<script src="tamil_files/jquery.js"></script>
<script>
function AppendCharacter ( ChrToAppend ) {
	document.convarea.many_words_text.value += ChrToAppend;
	}
$("#toggle_html").click(function() {
  $(".html_text_toggle").fadeToggle("slow", "linear");
});
</script>
<script>
var container = document.querySelector('#convarea');
var typer = container.querySelector('#contenteditable');
var output = container.querySelector('output');

const MIME_TYPE = 'text/plain';

// Rockstars use event delegation!
document.body.addEventListener('dragstart', function(e) {
  var a = e.target;
  if (a.classList.contains('dragout')) {
    e.dataTransfer.setData('DownloadURL', a.dataset.downloadurl);
  }
}, false);

document.body.addEventListener('dragend', function(e) {
  var a = e.target;
  if (a.classList.contains('dragout')) {
    cleanUp(a);
  }
}, false);

document.addEventListener('keydown', function(e) {
  if (e.keyCode == 27) {  // Esc
    document.querySelector('details').open = false;
  } else if (e.shiftKey && e.keyCode == 191) { // shift + ?
    document.querySelector('details').open = true;
  }
}, false);

var cleanUp = function(a) {
  a.textContent = 'Downloaded';
  a.dataset.disabled = true;

  // Need a small delay for the revokeObjectURL to work properly.
  setTimeout(function() {
    window.URL.revokeObjectURL(a.href);
  }, 1500);
};

var downloadFile = function() {

  //_gaq.push(['_trackEvent', 'Download', 'Click_create_file', 'tamil']);

  window.URL = window.webkitURL || window.URL;

  var prevLink = output.querySelector('a');
  if (prevLink) {
    window.URL.revokeObjectURL(prevLink.href);
    output.innerHTML = '';
  }

  //var bb = new Blob([typer.textContent], { type: MIME_TYPE });
  var bb = new Blob([typer.value], { type: MIME_TYPE });

  var a = document.createElement('a');
  a.download = container.querySelector('input[type="text"]').value;
  a.href = window.URL.createObjectURL(bb);
  a.textContent = 'Download ready!';

  a.dataset.downloadurl = [MIME_TYPE, a.download, a.href].join(':');
  a.draggable = true; // Don't really need, but good practice.
  a.classList.add('dragout');

  output.appendChild(a);

  a.onclick = function(e) {
    if ('disabled' in this.dataset) {
      return false;
    }

    cleanUp(this);
  };
  //_gaq.push(['_trackEvent', 'Download', 'Click_download', 'tamil']);
};
</script>
</body></html>