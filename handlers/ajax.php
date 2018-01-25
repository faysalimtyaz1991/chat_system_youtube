<?php

include("../config.php");

if( isset($_REQUEST['action']) ){


	switch( $_REQUEST['action'] ){



		case "SendMessage":

			session_start();

			$query = $db->prepare("INSERT INTO chat SET user=?, message=?");

			$query->execute([$_SESSION['user'], $_REQUEST['message']]);

			echo 1;


		break;




		case "getChat":


			$query = $db->prepare("SELECT * from chat");
			$query->execute();

			$rs = $query->fetchAll(PDO::FETCH_OBJ);
			

			$chat = '';
			foreach( $rs as $r ){

				$chat .=  '<div class="siglemessage"><strong>'.$r->user.' says:  </strong>'.$r->message.'</div>';

			}

			echo $chat;


		break;



	}


}


?>