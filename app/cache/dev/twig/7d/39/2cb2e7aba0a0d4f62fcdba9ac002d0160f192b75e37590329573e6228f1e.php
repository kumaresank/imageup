<?php

/* imageuploadBundle:Default:index.html.html */
class __TwigTemplate_7d392cb2e7aba0a0d4f62fcdba9ac002d0160f192b75e37590329573e6228f1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
<style type=\"text/css\">
#container
{
position: relative;
height:300px;
width:300px;
background:white;
border:1px solid gray;
margin:0 auto;
}
.blurimage
{
position: absolute;
top:0px;
left:0px;
opacity:0.5;
height:300px;
width:300px;
}
.borderbox
{
height:150px;
width:150px;
border:1px solid white;
position:absolute;
top:0px;
left:0px
}
.cropbox
{
height:100%;
width:100%;
overflow: hidden;
position: absolute;
}
.cropimage
{
  height: 300px;
  width: 300px;
  position: absolute;
  left:0px;
  top:0px
}
.upload
{
margin-left: 500px;
}
.dot{
  background:rgb(255,255,255);
  position:absolute;
  height:10px;
  width:10px;
  -webkit-border-radius:5px;
}

.dot:active, .dot:hover{
  width:16px;
  height:16px;
  background:#FFF;
  margin:-3px;
  -webkit-border-radius:8px;
}

#dot1{
  left:-3px;
}
#dot2{
  right:-3px;
}
#dot3{
  bottom:-3px;
}
#dot4{
  bottom:-5px;
  right:-5px;
}
progress{
width:350px;
margin-top:10px;
border: none;
height: 20px;
}
progress[value]
 {
  background-color: #EFD8CC;
  border-radius: 2px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;
}
</style>
<script src=\"../js/jquery.min.js\"></script>
<script src='../js/jquery-ui.js'></script>
<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/jquery-ui.css\">
<script>
\$(document).ready(function(){
  \$('img').hide();
  \$('.borderbox').hide();
});
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                  \$('img').show();
                  \$('.borderbox').show();
                  \$('#container').css('background','#000000');
                    \$('img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
<script type=\"text/javascript\">
 \$(document).ready(function () {               
        \$( \".borderbox\" ).resizable({ handles: {\"nw\":\"#dot1\",\"ne\":\"#dot2\",\"sw\":\"#dot3\",\"se\":\"#dot4\"},containment: \".blurimage\"}).draggable({
            drag: function( event, ui ) {
              \$tp = \$(\".borderbox\").css('top');
              \$lt = \$(\".borderbox\").css('left');
              \$(\".cropimage\").css('top','-' + \$tp);
                \$(\".cropimage\").css('left','-' + \$lt);
                 },containment: \".blurimage\",cursor:\"crosshair\"
                  });
              });           
</script>
<script type=\"text/javascript\">
\$(document).ready(function () {
  \$(\"progress\").hide();
\$('#sub').click(function() {
\$x = \$(\".borderbox\").css('left');
\$y = \$(\".borderbox\").css('top');
\$w = \$(\".borderbox\").css('width');
\$h = \$(\".borderbox\").css('height');
var frmdt = new FormData(\$('form')[0]);
frmdt.append('x',\$x);
frmdt.append('y',\$y);
frmdt.append('w',\$w);
frmdt.append('h',\$h);
\$.ajax({
url: 'upload',
type: \"POST\",
data:  frmdt , 
contentType: false,
cache: false,
processData:false,
beforeSend: function() {
  \$(\"#status\").hide();
  \$(\"progress\").val(0);
  \$(\"progress\").show();
   },
  xhr: function() {
            myXhr = \$.ajaxSettings.xhr();
            if(myXhr.upload){
                myXhr.upload.addEventListener('progress',showProgress, false);
            } else {
                console.log(\"Upload progress is not supported.\");
            }
            return myXhr;
        }/*,
success: function(data)
{
  \$(\"#status\").show().html(data);
},
error : function()
{
  \$(\"#status\").show().html(\"Error\");
}  */
});
});
});
function showProgress(evt) {
    if (evt.lengthComputable) {
        var percentComplete = (evt.loaded / evt.total) * 100;
        \$(\"progress\").show();
        \$(\"#status\").show().html(\"Please wait...\");
        \$round = Math.round(percentComplete);
        \$(\"#percent\").text(\$round+ \"%\");
        \$('progress').val(percentComplete);
        \$('#total').html(\"Uploaded \"+evt.loaded+\" bytes of \"+evt.total);
            }  
            if(\$round == 100)
            {
              \$(\"#status\").show().html(\"Upload success\");
            }
}

</script>
</head>
<body>
  <div id=\"container\">
  <img src=\"#\" class=\"blurimage\">
  <div class=\"borderbox\">
  <div class=\"cropbox\">
  <img src=\"#\" class=\"cropimage\">
  <div id=\"dot1\" class=\"dot ui-resizable-handle ui-resizable-nw\"></div>
  <div id=\"dot2\" class=\"dot ui-resizable-handle ui-resizable-ne\"></div>
  <div id=\"dot3\" class=\"dot ui-resizable-handle ui-resizable-sw\"></div>
  <div id=\"dot4\" class=\"dot ui-resizable-handle ui-resizable-se\"></div>
  </div>
</div>
</div>
<div class=\"upload\">
<form method=\"post\" enctype=\"multipart/form-data\" id=\"form1\">
    <p>Upload Image:<input type=\"file\" onchange=\"readURL(this);\" name=\"image\" id=\"imageup\"></p>
    <input type=\"button\" value=\"upload\" id=\"sub\">
</form>
<progress value=\"0\" max=\"100\"></progress><span id=\"percent\"></span>
<p id=\"status\">Status</p>
<p id=\"total\">total</p>
</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "imageuploadBundle:Default:index.html.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
