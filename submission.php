<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style type="text/css">
 body {
 color:white;
 font-size:14px;
 }
 .contact {
    text-align:center;
    background: none repeat scroll 0% 0% #8FBF73;
    padding: 20px 10px;
    box-shadow: 1px 2px 1px #8FBF73;
    border-radius: 10px;
 width:520px;
 }
 #no, #price {
    width: 250px;
    margin-bottom: 15px;
    background: none repeat scroll 0% 0% #AFCF9C;
    border: 1px solid #91B57C;
    height: 30px;
    color: #808080;
    border-radius: 8px;
    box-shadow: 1px 2px 3px;
}
#submit
{
    background:none repeat scroll 0% 0% #8FCB73;
    display: inline-block;
    padding: 5px 10px;
    line-height: 1.05em;
 box-shadow: 1px 2px 3px #8FCB73;
    border-radius: 8px;
    border: 1px solid #8FCB73;
    text-decoration: none;
    opacity: 0.9;
    cursor: pointer;
 color:white;
}
#er {
    color: #F00;
    text-align: center;
    margin: 10px 0px;
    font-size: 17px;
}
</style>
</head>
<body>
<?php
 error_reporting('E_ALL ^ E_NOTICE');
 if(isset($_POST['submit']))
 {
  mysql_connect('localhost','root','') or die(mysql_error());
  mysql_select_db('WebApp') or die(mysql_error());
  $no=$_POST['no'];
  $price=$_POST['price'];
  
  $q=mysql_query("select * from Purachase_Order where no='".$no."' or price='".$price."' ") or die(mysql_error());
  $n=mysql_fetch_row($q);
  if($n>0)
  {
   $er='The order no '.$no.'  is already present in our database';
  }
  else
  {
   $insert=mysql_query("insert into Purachase_Order(no,price) values('".$no."','".$price."')") 
   or die(mysql_error());
   if($insert)
   {
    $er='Values are registered successfully';
    }
   else
   {
    $er='Values are not registered';
   }
  }
 }
?>
<div class="contact">
<h1>Purchase Order Form</h1>
     <div id="er"><?php echo $er; ?></div>
     <form action="#" method="post">
      <table id="tbl" align="center">
       <tr><td>Order No</td><td><input type="text" name="no" id="no"></td></tr>
      <tr><td>Order Price:</td><td><input type="text" name="price" id="price"></td></tr>
       <tr><td></td><td><input type="submit" name="submit" id="submit" value="Submit"></td></tr>
      </table>
     </form>
</div>

<script type="text/javascript">
$(document).ready(function() {
$('#submit').click(function() {
var no=document.getElementById('no').value;
var price=document.getElementById('price').value;

var chk = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
if(no=='')
{
 $('#er').html('Enter Order No');
 return false;
}

if(price=='')
{
 $('#er').html('Enter Order Price');
 return false;
}

});
});
</script>
</body>

</html>