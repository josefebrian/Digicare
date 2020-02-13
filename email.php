<?php
if($_POST){
	
    if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['company']) || empty($_POST['industry']) || empty($_POST['employed'])){
		echo '<script>
			$(document).ready(function(){
				swal("Ops...","harpa diisi ya","warning");
			});
			</script>';
	}else{
		$name 		= utf8_decode($_POST['name']);
		$phone 		= utf8_decode($_POST['phone']);
		$email     	= utf8_decode($_POST['email']);
        $company 	= utf8_decode($_POST['company']);
        $industry 	= utf8_decode($_POST['industry']);
        $employed 	= utf8_decode($_POST['employed']);
		$assunto 	= 'Kontak dikirim oleh situs web';
		
		
        require_once('assets/plugin/PHPMailer/class.phpmailer.php');
		$Email = new PHPMailer();
		$Email->IsSMTP(); 
		$Email->SMTPAuth = true; 
		$Email->Host = 'smtp.gmail.com'; 
		$Email->Port = 587; 
		$Email->SMTPSecure = 'tls';
		$Email->Username = 'gunswinger0@gmail.com';
		$Email->Password = 'Gunungsindur'; 
		$Email->IsHTML(true); 
		$Email->From = $_POST["email"];
        $Email->FromName = $_POST["name"];
        $Email->addAddress('gunswinger0@gmail.com', 'support@DigiCareId'); 
        $Email->WordWrap = 50;
        $Email->IsHTML(true);
        $Email->Subject =  $_POST["email"];
        $Email->Body = '<h3>Name : '.$_POST["name"].' <br/> Phone : '.$_POST["phone"].' 
        <br/> Email : '.$_POST["email"].'  <br/> Company : '.$_POST["company"].'
        <br/> Industry : '.$_POST["industry"].' <br/> Employed : '.$_POST["employed"].' </h3>';
		if(!$Email->Send()){				
			 echo'
			<script>
				$(document).ready(function(){
					swal("Ops..!! '.utf8_encode($name).'...","An error occurred while sending the message, please try again!", "error");
				});
			</script>';

		}else{
			 echo'
		<script>
			$(document).ready(function(){
				swal("Success '.utf8_encode($name).'...", "Your message has been sent. Thank you for contacting us!", "success")
			});
		</script>';

		}		
	}
}
