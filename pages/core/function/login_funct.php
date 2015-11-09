<?php
	function is_logged_in()
		{
			if (!isset($_SESSION['active']))
				{
					header('location:/root5/admin/template/index.php');
				}
		}
	function login($username,$password)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `admin_login` WHERE admin_username=? AND admin_password=? ");
			$result->execute(array($username,$password));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
	function get_all_hotel()
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `hotels`" );
			$result->execute(array());
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
	function get_all_emp($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `offer_hotel1`WHERE `hotel_id`=?" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
	function add_data($data)
		{
			global $connect;
			$result=$connect->prepare("INSERT INTO `offer_hotel1`( `hotel_id`,`offers_name`,`offers_description`) VALUES (?,?,?)");
			$result->execute($data);
			$result->rowCount();
			return($result->rowCount())?true:false;
		}

	function delete($id)
		{
			global $connect;
			$result=$connect->prepare("DELETE FROM `offer_hotel1` WHERE `offer_id`=?");
			$result->execute(array($id));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
	function get_all_event($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `event_hotel1` WHERE `hotel_id`=?" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
	function add_data_event($data)
		{
			global $connect;
			$result=$connect->prepare("INSERT INTO `event_hotel1`( `hotel_id`,`event_title`,`event_description`,`image_path`) VALUES (?,?,?,?)");
			$result->execute($data);
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
	function delete_event1($id)
		{
			global $connect;
			$result=$connect->prepare("DELETE FROM `event_hotel1` WHERE `event_id`=?");
			$result->execute(array($id));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
	function view_data1($id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `offer_hotel1` WHERE `offer_id`=?");
			$result->execute(array($id));
			return $result->fetch(PDO::FETCH_OBJ);
		}
	function update1($title,$description,$id)
		{
			global $connect;
			$result=$connect->prepare("UPDATE `offer_hotel1` SET `offers_name`=?,`offers_description`=? WHERE `offer_id`=? ");
			$result->execute(array($title,$description,$id));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
	function view_data1_event($id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `event_hotel1` WHERE `event_id`=?");
			$result->execute(array($id));
			return $result->fetch(PDO::FETCH_OBJ);
		}
	function update_query($page_id,$title,$description,$filepath,$id)
		{
			global $connect;
			$result=$connect->prepare("UPDATE `event_hotel1` SET `hotel_id`=?,`event_title`=?,`event_description`=?,`image_path`=? WHERE `event_id`=?");
			$result->execute(array($page_id,$title,$description,$filepath,$id));
			echo $result->rowCount();
			return($result->rowCount())?true:false;
		}
	function get_all_booking($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `booking_hotel1`WHERE `hotel_id`=?" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
	function get_all_servicing($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `service_hotel1`WHERE `hotel_id`=?" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}

	function update($page_id,$servicer_name,$servicer_email,$servicer_checkin,$servicer_checkout,$servicer_requestdate,$servicer_detail,$servicer_contact,$servicer_priority,$servicer_status,$servicer_id)
		{
			global $connect;
			$result=$connect->prepare("UPDATE `service_hotel1` SET `hotel_id`=?,`servicer_name`=?,`servicer_email`=?,`servicer_checkin`=?,`servicer_checkout`=?,`servicer_requestdate`=?,`servicer_detail`=?,`servicer_contact`=?,`servicer_priority`=?,`status`=? WHERE `service_id`=?");
			$result->execute(array($page_id,$servicer_name,$servicer_email,$servicer_checkin,$servicer_checkout,$servicer_requestdate,$servicer_detail,$servicer_contact,$servicer_priority,$servicer_status,$servicer_id));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
	function get_all_status($servicer_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT `status` FROM `service_hotel1` WHERE `service_id`=?");
			$result->execute(array($servicer_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}