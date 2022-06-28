<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- Primary Meta Tags -->
<title>Pop-Riri!</title>
<meta name="title" content="Pop-It!">
<meta name="description" content="Pop your Waifu">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="http://pop-it.click/">
<meta property="og:title" content="Pop-It!">
<meta property="og:description" content="Pop your Waifu">
<meta property="og:image" content="http://pop-it.click/riri00.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="http://pop-it.click/">
<meta property="twitter:title" content="Pop-It!">
<meta property="twitter:description" content="Pop your Waifu">
<meta property="twitter:image" content="http://pop-it.click/riri00.jpg">
</head>
<script>
var counter = 0;
var audio = [];
var i;
var keyflag = 0;  

for (i = 0; i < 4; ++i)
{
  const sound = new Audio('pop.mp3');
  audio.push(sound);
  audio[i].load();
}
audio.volume = 0.2;


function checkMobile()
{
  var varUA = navigator.userAgent.toLowerCase();

  if ( varUA.indexOf('android') > -1) 
  {
    return "android";
  }
  else if( varUA.indexOf("iphone") > -1||varUA.indexOf("ipad") > -1||varUA.indexOf("ipod") > -1 )
  {
    return "ios";
  }
  else
  {
    return "other";
  }
}

function popclick()
{
  if(keyflag)
  {
    return;
  }
	var i;
	for (i = 0; i < 4; ++i)
	{
		if (audio[i].paused)
		{
			audio[i].play();
			break;
		}
	}

	++counter;
	document.getElementById('counter').value = counter;
  var randomColor = Math.floor(Math.random()*16777215).toString(16);
  document.getElementById('counter').style.color = "#" + randomColor;

	document.getElementById('img1').style.zIndex = 0;
	setTimeout(function()
	{
		document.getElementById('img1').style.zIndex = 100;
	}, 45);
}

function popkeydown()
{
  var i;
  if(!keyflag)
  {
    if(event.keyCode == 32)
    {
      return;
    }
    for (i = 0; i < 4; ++i)
    {
      if(keyflag)
      {
        //
      }
      else if (audio[i].paused)
      {
         audio[i].play();
         break;
      }
    }
    document.getElementById('img1').style.zIndex = 0;
    keyflag = 1;
  }
}

function popkeyup()
{
  if(keyflag)
  {
    ++counter;
  
    document.getElementById('counter').value = counter;
    var randomColor = Math.floor(Math.random()*16777215).toString(16);
    document.getElementById('counter').style.color = "#" + randomColor;

    document.getElementById('img1').style.zIndex = 100;
    keyflag = 0;
  }
}

function movetoimagechange()
{
  document.getElementById('getfilediv').style.zIndex = 499;
  document.getElementById('getfileform').style.zIndex = 500;
  document.getElementById('getfileform').style.color = 'black';
  document.getElementById('closefileform').style.zIndex = 501;
  document.getElementById('closefileform').style.color = 'black';
  document.getElementById('mosinori').style.zIndex = 501;
  document.getElementById('mosinori').style.color = 'black';
}
function closefile()
{
  document.getElementById('getfilediv').style.zIndex = -3;
  document.getElementById('getfileform').style.zIndex = -2;
  document.getElementById('getfileform').style.color = 'white';
  document.getElementById('closefileform').style.zIndex = -1;
  document.getElementById('closefileform').style.color = 'white';
  document.getElementById('mosinori').style.zIndex = -1;
  document.getElementById('mosinori').style.color = 'white';
}
</script>
<?
    $img1name = 'riri00.jpg';
    $img2name = 'riri01.jpg';

    if(isset($_POST['submit']))
    {
        $upload_dir = 'upload/';

        $upload_img1 = $upload_dir . $_FILES['BasicImage']['name'];
        $upload_img2 = $upload_dir . $_FILES['PopImage']['name'];

        $upload_img1 = str_ireplace(" ", "", $upload_img1);
        $upload_img2 = str_ireplace(" ", "", $upload_img2);

        $upload_img1 = $string = preg_replace ("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "",  $upload_img1); 
        $upload_img2 = $string = preg_replace ("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "",  $upload_img2); 

        $upload_img1 = preg_replace("/\.(php|phtm|htm|cgi|pl|exe|jsp|asp|inc)/i", "$0-x", $upload_img1);
        $upload_img2 = preg_replace("/\.(php|phtm|htm|cgi|pl|exe|jsp|asp|inc)/i", "$0-x", $upload_img2);

        $upload_img1 = iconv("utf-8", "CP949", $upload_img1);
        $upload_img2 = iconv("utf-8", "CP949", $upload_img2);

        move_uploaded_file($_FILES['BasicImage']['tmp_name'], $upload_img1);
        move_uploaded_file($_FILES['PopImage']['tmp_name'], $upload_img2);

        $img1name = $upload_img1;
        $img2name = $upload_img2;
    }

?>
<style>
  html
  {
    height : 100vh;
    width : 100vw;
  }
  body
  {
    height : 100vh;
    width : 100vw;

    margin : 0;
    
    overflow:hidden;
  }
  #counter
  {
    color:white;
    font-size : 14vh;

    width : 100vw;
    height : 100vh;

    max-width : 100vw;
    max-height : 100vh;

    user-select: none;

    margin : auto;

    position : fixed;
    z-index : 101;
  }
  #img1
  {
    width : 100vw;
    height : 100vh;

    margin : 0;
    padding : 0;
    
    background-image : url(<?php echo $img1name;?>);
    background-repeat : no-repeat;
    background-position : center;
    background-size : cover;

    position : fixed;
    z-index : 100;
  }
  #img2
  {
    width : 100vw;
    height : 100vh;

    margin : 0;
    padding : 0;
    
    background-image : url(<?php echo $img2name;?>);
    background-repeat : no-repeat;
    background-position : center;
    background-size : cover;

    position : fixed;
    z-index : 50;
  }
  #counterdiv
  {
    text-align : center;

    position : fixed;
    z-index : 0;

    text-align : center;
  }
  header
  {
    position : fixed;
    bottom : 0;
    left : 0;
    

    width : 4vw;
    height : 4vh;
    padding : 1rem;

    background : transparent;

    font-weight : bold;
    display : flex;
    justify-content : space-between;
    align-items : center;

    z-index : 200;
  }
  #imgchangebutton
  {
    width : 4vw;
    height : 4vh;
    overflow:hidden;
    font-size : 1vh;

    z-index : 201;

    /* color : randomcolor; */
  }
  @media only screen and (orientation:portrait)
  {
    header
  {
    position : fixed;
    bottom : 0;
    left : 0;
    

    width : 15vw;
    height : 15vh;
    padding : 1rem;

    background : transparent;

    font-weight : bold;
    display : flex;
    justify-content : space-between;
    align-items : center;

    z-index : 200;
  }
  #imgchangebutton
  {
    width : 15vw;
    height : 15vh;
    overflow:hidden;
    font-size : 2vh;

    z-index : 201;

    /* color : randomcolor; */
  } 
  }
  #getfilediv
  {
    width : 100vw;
    height : 100vh;

    font-size : 4vh;

    background-color : white;
    position : fixed;

    z-index : -3;
  }
  #getfileform
  {
    width : 100vw;
    height : 100vh;

    font-size : 4vh;
    color : white;

    background-color : white;
    position : fixed;

    z-index : -2;
  }
  #getfileform p
  {
    font-size : 3vh;
  }
  #mosinori
  {
    height : 33vh;
    width : 100vw;

    text-align : end;
    font-size : 3vh;

    bottom : 0;
    right : 0;

    background:transparent;
    border-right : 0px;
    border-top : 0px;
    border-left : 0px;
    border-bottom : 0px;

    color : white;
    position : fixed;

    z-index : -1;
  }
  #mosinori img
  {
    height : 30vh;

    position : relative;
    float : right;

    display : block;
  }
  #mosinori p
  {
    display : block;
  }
  #closefileform
  {
    width : 5vw;
    height : 5vh;

    font-size : 5vh;

    right : 0;
    top : 0;

    background:transparent;
    border-right : 0px;
    border-top : 0px;
    border-left : 0px;
    border-bottom : 0px;

    color : white;
    position : fixed;

    z-index : -1;
  }
</style>
<header>
  <nav>
    <button id = "imgchangebutton" style = "background : transparent;border:none; border-right : 0px; border-top : 0px; border-left : 0px; border-bottom : 0px;">Change<br>Image</button>
  </nav>
</header>
<body>
  <button id="img2" style = "border:none;border-right:0px;border-top:0px;border-left:0px;border-bottom:0px;"></button>
  <button id="img1" style = "border:none;border-right:0px;border-top:0px;border-left:0px;border-bottom:0px;"></button>
  <div id = "counterdiv" style="text-align:center"></div><input type="button" id="counter" value = "0" style = "background:transparent;border:none;border-right:0px;border-top:0px;border-left:0px;border-bottom:0px;"></input></div>

  <div id = "getfilediv">
    <button id="closefileform">X</button>
    <form id = "getfileform" action='<? echo $_SERVER['PHP_SELF']; ?>' method="post" enctype="multipart/form-data">
      Pop Riri<br>
      <p>
      <br>
      Only png or jpg files are allowed.<br>
      <br>
      Portrait images (around 16~20:9~10) would be highly recommended.<br>
      </p>
      
      <input name = "BasicImage" type = "file" accept = ".jpg, .png"/>Basic Image<br>
      <input name = "PopImage" type = "file" accept = ".jpg, .png"/>Pop Image<br>
      <input type = "submit" name = "submit" id = "submitbutton" value = "submit"><br>

      <p>
      For desktop users<br>
      : Making your browser vertical would make it look better.<br>
      </p>
  </form>
  </div>
  
  <div id=mosinori>
    <img src='kaonashi.png'><br>
    <p>
      made by<br>
      @mosinori2256<br>
      http://github.com/mosinori/pop-riri/<br>
    </p>
  </div>
</body>
</html>
<script>
  window.onload = function()
  {
    var mobile = (/iphone|ipad|ipod|android/i.test(navigator.userAgent.toLowerCase()));
 
    if (mobile)
    { 
      document.getElementById('counter').addEventListener('touchstart', popkeydown);
      document.getElementById('counter').addEventListener('touchend', popkeyup);
    }
    else
    {
      document.getElementById('counter').addEventListener('click', popclick);

      document.getElementById('counter').addEventListener('wheel', popkeydown);
      document.getElementById('counter').addEventListener('wheel', popkeyup);

      document.getElementById('counter').addEventListener('keydown', popkeydown);
      document.getElementById('counter').addEventListener('keyup', popkeyup);
    }

    document.getElementById('imgchangebutton').addEventListener('click', movetoimagechange);
    document.getElementById('closefileform').addEventListener('click', closefile);
  
    var randomColor = Math.floor(Math.random()*16777215).toString(16);
    document.getElementById('imgchangebutton').style.color = "#" + randomColor;
  }
</script>