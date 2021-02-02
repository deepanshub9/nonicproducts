<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phoenix Toothbrush | nonicecoproduct.com</title>
    <a href="https://icons8.com/icon/103661/circled-menu"></a>
    <a href="https://icons8.com/icon/Xy10Jcu1L2Su/instagram"></a>
    <a href="https://icons8.com/icon/xuvGCOXi8Wyg/linkedin"></a>
    <a href="https://icons8.com/icon/uLWV5A9vXIPu/facebook"></a>
    <a href="https://icons8.com/icon/AltfLkFSP7XN/whatsapp"></a>
    <a href="https://icons8.com/icon/7rhqrO588QcU/mail"></a>
    <link rel="stylesheet" href="/phoenixProducts.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">


    <style>
        body {
            font-family: 'Varela Round', sans-serif;
        }
        
        .modal-confirm {
            color: #636363;
            width: 325px;
        }
        
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }
        
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        
        .btn1:focus {
            outline: 0;
        }
        
        .btn1:hover {
            -webkit-transform: scale(1.05);
            transform: scale(1.05);
        }
        
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }
        
        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }
        
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }
        
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }
        
        .modal-confirm .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #82ce34;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }
        
        .modal-confirm .icon-box i {
            font-size: 58px;
            position: relative;
            top: 3px;
        }
        
        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }
        
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #82ce34;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }
        
        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: #6fb32b;
            outline: none;
        }
        
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
        
        #pop {
            border: 2px solid green;
            background-color: green;
            color: white;
            border-radius: 25px;
            font-size: 25px;
            text-align: center;
            padding: 13px;
            margin-left: 45%;
            margin-right: 45%;
            border: none;
        }
        
        @media screen and (max-width: 1150px) {
            #pop {
                border: 2px solid green;
                background-color: green;
                color: white;
                border-radius: 25px;
                font-size: 25px;
                text-align: center;
                padding: 13px;
                margin-left: 35%;
                margin-right: 45%;
                border: none;
            }
        }
    </style>
    <script>
        function paymentProcess(amount) {


            var s = amount;

            var options = {
                "key": "rzp_live_sPOKsnXTeUXLZY", // Enter the Key ID generated from the Dashboard
                "amount": s * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 means 50000 paise or ₹500.
                "currency": "INR",
                "name": "Nonic Tooth Brush",
                "description": "Wave Product",
                "image": "assests/nonic_img/brandLogo2.png", // Replace this with the order_id created using Orders API (https://razorpay.com/docs/api/orders).
                "handler": function(response) {

                    $('#myModal').modal();
                },
                "prefill": {
                    "name": "Enter Name",
                    "email": "Enter Email",
                    "contact": "Phone no"
                },
                "notes": {
                    "address": "note value"
                },
                "theme": {
                    "color": "#9932CC"
                }
            }
            var propay = new Razorpay(options);
            propay.open();
        }
    </script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php


$link = mysqli_connect("localhost", "root", "", "nonicecoproduct");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$quants = mysqli_real_escape_string($link, $_REQUEST['quants']);
$amount=mysqli_real_escape_string($link, $_REQUEST['amount']);
$product=mysqli_real_escape_string($link, $_REQUEST['product']);
$date= date("Y/m/d");
if ($quants > 5) {
   $amount=(int)$amount*(int)$quants;
  } else {
    $amount=((int)$amount*(int)$quants)+40;
  }

  $sql = "INSERT INTO buyer (name, email ,phone,address,quantity,amount,product,date) VALUES ('$name','$email','$phone','$address','$quants','$amount','$product','$date')";


  if(mysqli_query($link, $sql)){
        
		  
    echo " <img style='width:20%;height:20%;margin-top:2%;margin-left:40%;' src='assests/nonic_img/brandLogo2.png' >";
    echo "<br>";
   echo " <h1 style='margin-top:2%;font-size:35px;text-align:center;margin-left:10%;margin-right:10%;'>To continue with transaction, Click 'Proceed' for Payment.</h1>";
    echo "<br>";


    }
else {
echo $sql;
  






               
}

mysqli_close($link);
?>
<button type="submit" id="pop" class="btn-success btn1" onclick="paymentProcess('<?php echo $amount ?>')">Proceed</button>
 <div id="myModal" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="icon-box">
                                    <i class="material-icons">&#xE876;</i>
                                </div>
                                <h4 class="modal-title">Awesome!</h4>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">Your booking has been confirmed. Check your email for detials.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="ourProducts.html" style="text-decoration:none;"><button class="btn btn-success btn-block" data-dismiss="modal">Ok</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</body>

</html>