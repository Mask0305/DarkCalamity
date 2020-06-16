<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta http-equiv="cache-control" content="no-cache" />
  <meta charset="UTF-8">
  <title>DarkCalamity黑禍</title>
  <link href="css/job.css" rel="stylesheet">
</head>
<body>

<form>
<div class="container">
  <div class="nav">
    <ul>
      <li id="archer" class="item t1 on"  >
        <i></i>
        <em></em>
      </li>
      <!-- <li class="item t2">
        <i></i>
        <em></em>
      </li> -->
      <li id="warrior" class="item t3" >
        <i></i>
        <em></em>
      </li>
      <li id="knight" class="item t4">
        <i></i>
        <em></em>
      </li>
      <li class="item blank">
        <i></i>
        <em></em>
      </li>
      
      <li id="a" class="a catch" >
        <a></a>
      </li>
      
    </ul>
  </div>

  <div class="box">
    <div id="demo1" class="p p1 show" name="弓箭手">
      <span class="name">弓箭手</span>
      <img src="./images/p1n.png" alt="">
    </div>
    <!-- <div class="p p2">
      <span class="name"></span>
      <img src="./images/p2.png" alt="">
    </div> -->
    <div class="p p3" name="戰士">
      <span class="name"></span>
      <img src="./images/p3n.png" alt="">
    </div>
    <div class="p p4" name="騎士">
      <span class="name"></span>
      <img src="./images/p4n.png" alt="">
    </div>
  </div>
</div>
</form>
<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
 <script>

  $(function () {

    $('.nav li ').on('click', function () {
      var last=document.getElementsByClassName('on')[0].id;
      $(this).addClass('on').siblings().removeClass('on');
      $('.p').eq($(this).index()).addClass('show').siblings().removeClass('show');
    	var now=document.getElementsByClassName('on')[0].id;
    	if(now!='a'){              //這行看起來沒幹嘛  但是少了就bug  就留著吧
	  		}else if(now='a'){
	  			location.href="bulid.php?job="+last;
	  		}
  		})
    });

</script> 
 
<script language="javascript">
  // $('li a').click(function(e) {
  //   //e.preventDefault();
  //   var x=document.getElementsByClassName('on')[0].id;
  //   alert(x);
  // });
</script>
</body>
</html>



<!-- <?php

	/*
  echo "<script>";
  	 echo "$(function(){";
	    echo "$('.nav li').on('click', function(){";
	      echo "$(this).addClass('on').siblings().removeClass('on');";
	       echo "$('.p').eq($(this).index()).addClass('show').siblings().removeClass('show');";
	     echo "var x=document.getElementsByClassName('on')[0].id;";
	      echo "if(x!=''){alert(x);}";
	    echo "})";
 	 echo "});";
  echo "</script>";
  */
?> -->