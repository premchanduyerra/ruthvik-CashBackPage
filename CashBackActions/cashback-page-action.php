 

<?php
 
$uid= $_POST['uid_hidden'];
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$compId=$_POST['compId_hidden'];
// $uid= 'g3lltYOyQ*jAEdiNTQXBxg';
// $name= 'name';
// $email= 'prem@gmail.com';
// $phone= '9999999999';
// $compId='133';
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CashBack</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
<style>
body
{
  margin:0;
  padding:0;
  background:#262626;
}
.ring
{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  width:150px;
  height:150px;
  background:transparent;
  border:3px solid #3c3c3c;
  border-radius:50%;
  text-align:center;
  line-height:150px;
  font-family:sans-serif;
  font-size:20px;
  color:#fff000;
  letter-spacing:4px;
  text-transform:uppercase;
  text-shadow:0 0 10px #fff000;
  box-shadow:0 0 20px rgba(0,0,0,.5);
}
.ring:before
{
  content:'';
  position:absolute;
  top:-3px;
  left:-3px;
  width:100%;
  height:100%;
  border:3px solid transparent;
  border-top:3px solid #fff000;
  border-right:3px solid #fff000;
  border-radius:50%;
  animation:animateC 2s linear infinite;
}
#loading span
{
  display:block;
  position:absolute;
  top:calc(50% - 2px);
  left:50%;
  width:50%;
  height:4px;
  background:transparent;
  transform-origin:left;
  animation:animate 2s linear infinite;
}
#loading span:before
{
  content:'';
  position:absolute;
  width:16px;
  height:16px;
  border-radius:50%;
  background:#fff000;
  top:-6px;
  right:-8px;
  box-shadow:0 0 20px #fff000;
}
@keyframes animateC
{
  0%
  {
    transform:rotate(0deg);
  }
  100%
  {
    transform:rotate(360deg);
  }
}
@keyframes animate
{
  0%
  {
    transform:rotate(45deg);
  }
  100%
  {
    transform:rotate(405deg);
  }
}
#images_div{
  background: #f3f3f4;
    border: 1px solid #d5cccc;
    margin: 10px 50px;
    border-radius: 12px;
    text-align: center;
}

 
#items_rating_div{ 
  border: 1px solid #d5cccc;
    margin: 10px;
    border-radius: 12px;
    text-align: center;
    box-shadow:
  0.9px 0px 5.3px rgba(0, 0, 0, 0.028),
  2.9px 0px 17.9px rgba(0, 0, 0, 0.042),
  13px 0px 80px rgba(0, 0, 0, 0.07)
;    height: 100px;
    width: 70%;
    margin-left: 15%;
    margin-top: -60px;
    background: #ffffff;
 }
.ratings{
  display: flex;
  flex-direction:row;
  align-items: baseline;
}

#prodSpecification td{
  width:50%;
}

/* #total_div  div .card{
  width:1098px !important;
  margin-right:398px;
  transform:translatex(192px) translatey(105px);
} */


</style>


</head>

<script>

    var uid1 ='<?php echo $uid; ?>'
    var name1 ='<?php echo $name; ?>'
    var email1 ='<?php echo $email; ?>'
    var phone1 ='<?php echo $phone; ?>'
    var compId1 ='<?php echo $compId; ?>'

    
    //alert(uid1)
 

  //  var jsonBody= JSON.stringify({
  //   "qrData": "https://www.sureassure.com/pa?uid="+uid1,
  //   "usrAdrs": "Agra, Uttar Pradesh, 282004, India",
  //   "usrCntry": "India(+91)",
  //   "usrState": "Uttar Pradesh",
  //   "usrZip": "282004",
  //   "usrlatitude": 27.1407174,
  //   "usrlongitude": 78.0309542,
  //   "verificationMode": "Web",
  //   "verificationType": 2
  // })

  var jsonBody= JSON.stringify({
    "askCompId": compId1, //Company ID from previous API
    "askForDetailsFilled": true, //Fixed value
    "compId": compId1, //Company ID from previous API
    "email": email1, //Entered User’s Email ID
    "mobNo": phone1, //Entered User’s Paytm Number
    "qrData": "https://www.sureassure.com/pa?uid="+uid1,
    "usrAdrs": "Sector 26, Nithari, Noida, Dadri, Gautam Buddha Nagar, Uttar Pradesh, 201301, India", //User’s Address
    "usrCntry": "India(+91)", //User’s Country
    "usrState": "Uttar Pradesh", //User’s State
    "usrZip": "201301", //User’s Pin code
    "usrlatitude": 28.5784173, //User’s User Latitude
    "usrlongitude": 77.3346074, //User’s Longitude
    "usrname": name1, //Entered User’s Name
    "verificationMode": "Web",
    "verificationType": 2,
    "verifiedBy": name1 //Entered User’s Name
});

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


        if(obj.responseCode=='200'){

          $("#total_div").show();
            var data=obj.data
            var prodSpecification=data.prodSpecification;



            $("#productImg").attr('src',data.productImg[0])
            $("#compLogo").attr('src',data.compLogo)
            $("#responseMessage").html(obj.responseMessage)
            $("#productNm").html(data.productNm)
            $("#productRating").html(data.productRating)
            $("#totalRating").html(data.totalRating)
 
            prodSpecification.forEach((item)=>{
            
              if(item.key==='Email'){
            $("#prodSpecification > tbody").append("<tr><th>"+item.key+"</th><td><a href='mailto:"+item.value+"'>"+item.value+"</a></td></tr>")
                
              }
              else if(item.key==='Website'){
                $("#prodSpecification > tbody").append("<tr><th>"+item.key+"</th><td><a href='"+item.value+"'>"+item.value+"</a></td></tr>")

              }
              else{
            $("#prodSpecification > tbody").append("<tr><th>"+item.key+"</th><td>"+item.value+"</td></tr>")

              }

            })


            $("#prodSpecificationKey1").html(obj.data.prodSpecification[0].key)
            $("#prodSpecificationValue1").html(obj.data.prodSpecification[0].value)

       
        }else{
          $("#error").show();
          $("#total_div").hide();
        }


        
            },
            error:function(error){

              $("#error").show();
              $("#total_div").hide();
                 return false;
               
            }      
        }); 

</script>


<body style='background:#F3F3F4'>

 
<div id='loading' class="ring"  >Loading
  <span></span>
</div>
<br>
<div id='total_div' style='display:none'>
<div style='display: flex; flex-direction: column; align-items: center;'>
        <div class="card" style="width:70% "> 

        <h5 id='' style='margin: 20px 30px;'>PRODUCT AUTHENTICATION</h5>
          <br>

        <div id='responseMessage' style='text-align: center; margin-bottom: 30px; color: #1893ac;font-size: 20px;'>

        </div>


<div id='images_div'>

        <img src="" id="productImg" class="card-img-top" alt="" style='width: 35%; margin: 20px;'>
        <img src="" id="compLogo" class="card-img-top" alt="" style='width: 20%; margin: 20px; right: 7%; position: absolute;'>

      </div>
      
      <div id='items_rating_div'>

      <h5 id='productNm' style='margin-top:10px;'></h5>
        
      <div style='display:flex;justify-content: space-around;'>
<div class='ratings'>
      <i class="fa-regular fa-star"></i>&nbsp;
      <p id='productRating'></p>(<p id='totalRating'></p>)
      </div>
      <div class='ratings'>
      <i class="fa-regular fa-message"></i>&nbsp;<p>Feedback</p>
      </div>
      <div class='ratings'>
      <i class="fa-solid fa-share"></i>&nbsp;<p>Share</p>

      </div>
      
        </div>

      </div>
            <div class="card-body">
                <table class='table' id='prodSpecification'>

                <tbody>


                </tbody>
                </table>
            </div>

            </div>
</div>

 <div id='error' style='display:none'>

<h1> Please  try again after some time</h1>

 </div>

      </div>
    <br>
</body>
</html>