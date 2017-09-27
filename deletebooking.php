
<html>
<head>
<title>Delete Booking</title>
<style type="text/css">

.image  {height:100%;
         width:100%;
         position: absolute;
         top:0px;
         left:0px;
         right:0px;}
.button1 {background-color: #f44336;
          border-radius: 12px;
          color: white;
          padding: 9px 18px;
          text-align: center;
          font-size: 15px;
          margin: 4px 2px;
          cursor: pointer;
          position:absolute;
          top:0px;
          right:190px;
          float:right;}
.button2 {background-color: #f44336;
          border-radius: 12px;
          color: white;
          padding: 9px 18px;
          text-align: center;
          font-size: 15px;
          margin: 4px 2px;
          cursor: pointer;
          position:absolute;
          top:0px;
          right:10px;
          float:right;}
div.menu {position:absolute;
          top:15px;
           right:360px;
           float:right;}
div.menu a{  color: white;
              font-size:15pt;
              text-decoration:none;
             }
.clickbutton1 {background-color: orange;
          width:250px;
          color: white;
          border: none;
          padding: 9px 18px;
          text-align: center;
          font-size: 15px;
          margin: 4px 2px;
          cursor: pointer;
          }
.textbox {width: 250px;
          height:35px;
          font-size: 15px;
          border-style: groove;
          border-color:orange;
          border-radius: 8px;
          color:white;
          background-color:transparent;
          } 
div.form1 { position: absolute;
           top:50%;
           left:50%; 
           border-style: solid;
           border-width:0.09px;
           border-color:black;
           box-shadow:0.1px 0.1px 0.1px 0.1px black;
           margin-left : -110px;            
           margin-top  : -200px;
           padding: 18px 27px;
           background-color:transparent;
           text-align:left;
           color:white;
           font-size:20px;    
          }  
.clickbutton2 {background-color: orange;
          width:250px;
          color: white;
          border: none;
          padding: 9px 18px;
          text-align: center;
          font-size: 15px;
          margin: 4px 2px;
          cursor: pointer;
          position:absolute;
          top:60%;
          left:42%;
          }
.enterid { width: 250px;
          height:35px;
          font-size: 15px;
          border-style: groove;
          border-color:orange;
          border-radius: 8px;
          color:white;
          background-color:transparent;
          }  

</style>
<script type="text/javascript">
function do_change(){
document.getElementById('btnHolder').innerHTML = '<input type="submit" name="delete" class="clickbutton2" value="Cancel Booking">';
}
function disablesubmit(){
document.getElementById('formfirst').style.display="none";
}
function disabledetails(){
document.getElementById('formdetails').style.display="none";
}
function copyTextValue(bf) {
                if(bf.checked)
                
                      var text1 = document.getElementById("id1").value;
                else 
					  text1='';
                document.getElementById("id2").value = text1;
}
</script>
</head>
<body>
<img class="image" id="img1" src="image4.jpg"/>
<div class="menu">
<a href = "home.html"> HOME </a>
</div>
<div class="form1" id="formfirst">
<center><form method="post" action="">
<p><label>enter your reservation number</label></br>
<input name="revid" class="enterid" type = "text" id="id1" value="<?php if(isset($_POST['submit'])) echo $_POST['revid'];?>" onchange="copyTextValue(this);"></p>
<input type="submit" name="submit" class="clickbutton1" value="submit" style="display:block;"></br>
</form>
</div>
<center><form method="post" action="">
<input name="rev" type = "text" id="id2" value="<?php if(isset($_POST['submit'])) echo $_POST['revid'];?>" style="display:none;"></br>
<div id="btnHolder"></div>
</br>
</form>
<?php
include 'display.php';
if(isset($_POST['delete'])){
extract($_POST);
$rev=$_POST["rev"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM booking where resno=$rev";
if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">',
     'disabledetails();',
     '</script>'
    ;
    echo '<script type="text/javascript">',
     'disablesubmit();',
     '</script>'
    ;
    echo "<div class='form1'>Your Booking with reservation id ".$rev." is Cancelled.</br> Thank You!</div>";
} else {
    //echo "Error deleting record: " . $conn->error;
}
$conn->close();
}
?>
</center>
</body>
</html>

