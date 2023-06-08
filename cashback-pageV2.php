
<?php
$uid= $_GET['uid']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="csahback-paheV2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 
  <script defer >

    var uid1 ='<?php echo $uid; ?>'
   // alert(uid1)
  


   var jsonBody= JSON.stringify({
    "qrData": "https://www.sureassure.com/pa?uid="+uid1,
    "usrAdrs": "Agra, Uttar Pradesh, 282004, India",
    "usrCntry": "India(+91)",
    "usrState": "Uttar Pradesh",
    "usrZip": "282004",
    "usrlatitude": 27.1407174,
    "usrlongitude": 78.0309542,
    "verificationMode": "Web",
    "verificationType": 2
  })
$.ajax({
        type: "POST",  
        data:jsonBody,
        contentType: "application/json; charset=utf-8",
        dataType   : "json",
      beforeSend:function(){
             $("#loading").show();
      // alert("before............")
         },
         complete:function(){
            $("#loading").hide();
             //alert("after ............")
         },
        url: "https://www.sureassure.com/api/PA/Verify",
        dataType: "html",        
        success: function(data) {   

      //  alert(data)



        var obj = JSON.parse(data); 


        if(obj.responseCode=='-3'){

          $("#form_div").show();
          $("#responseMessage").html(obj.responseMessage)
          $("#compId_hidden").html(obj.compId)
        }else{
            $("#error").show();

        }


        
            },
            error:function(error){
               alert("error"); 
                 return false;
               
            }      
        }); 
 
</script>


</head>
<body>
<div id='loading' class="ring"  >Loading
  <span></span>
</div>
<br> 
 
  <div class="container" id='form_div' style='display:none'>
   <div id='responseMessage' style='text-align: center; margin-bottom: 30px; color: #1893ac;font-size: 20px;'>
    
    </div>
    <div class="container-text" >

    <form action="cashback-page.php" method='post' id='cashBackForm'>

       <h1>Basic Details</h1>
       <input type="hidden"   id='uid_hidden' name='uid_hidden'>
       <input type="hidden"   id='compId_hidden' name='compId_hidden'>
      <input type="text" placeholder="Enter Name" id='name' name='name'>
      <input type="email" placeholder="Enter Email" id='email' name='email'>
      <input type="text" placeholder="Enter Phone No" id='phone' name='phone' maxlength='10'>
      <br><br>
      <button type="button" onclick='return submitForm()'>Submit</button>
      <br>

    </form>
    </div>
  </div>
 

</body>
<script>
 document.getElementById('uid_hidden').value='<?php echo $uid; ?>';
 
 function submitForm(){

    if($("#name").val()==null || $("#name").val().trim()==""){
        alert('Please Enter Name ');
        $("#name").focus();
        return false;
    }
    if($("#email").val()==null || $("#email").val().trim()==""){
        alert('Please Enter Email ');
        $("#email").focus();
        return false;
    }  

    var emailRegEx= /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
    if(!emailRegEx.test($("#email").val())){
        alert('Please Enter valid Email ');
        $("#email").val('');
        $("#email").focus();
        return false;
    }
    
     if($("#phone").val()==null || $("#phone").val().trim()==""){
        alert('Please Enter Phone No ' );
        $("#phone").focus();
        return false;
    }
    var mobileRegEx = /^[5-9][0-9]{9}$/;
    if(!mobileRegEx.test($("#phone").val())){
        alert('Please Enter valid Phone No ');
        $("#phone").val('');
        $("#phone").focus();
        return false;
    }
 
    $('#cashBackForm').submit();
    return true;
 }
 
 </script>
</html>
