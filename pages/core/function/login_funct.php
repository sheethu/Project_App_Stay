<?php
	function is_logged_in()
		{
			if (!isset($_SESSION['active']))
				{
					header('location:/root5/admin/template/index.php');
				}
		}
/**
    * get the passwordand username data from databae
    *
    * @param  variables  $username   admin username
    * @param  variables  $password   admin password
    * @return true or false
*/  
	function login($username,$password)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `admin_login` WHERE admin_username=? AND admin_password=? ");
			$result->execute(array($username,$password));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
/**
    * get the all hotel name and hotel id from database 
    *
    * @return all data from database as an array
*/
	function get_all_hotel()
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `hotels`" );
			$result->execute(array());
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
/**
    * get the all data from database about offers
    *
    * @param  variables  $page_id hotel_id
    * @return all data from database
*/
	function get_all_emp($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `offer_hotel1` WHERE `hotel_id`=?" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
/**
    * get the all data from database about offers in ascending order
    *
    * @return all data from databas
*/
	function get_all_emp_order($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `offer_hotel1` WHERE `hotel_id`=?  ORDER BY `offers_name` ASC");
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
/**
    * Insert the data into the database
    *
    * @param  variables  $page_id hotel_id
    * @param  variables  $_POST['offered'] About the offer title
    * @param  variables  $_POST['description'] descripes about the offer
    * @return true or false
*/
	function add_data($data)
		{
			global $connect;
			$result=$connect->prepare("INSERT INTO `offer_hotel1`( `hotel_id`,`offers_name`,`offers_description`) VALUES (?,?,?)");
			$result->execute($data);
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
/**
    * Delete the offer from database
    *
    * @param  variables  $id offer_id
    * @return true or false
*/ 
	function delete($id)
		{
			global $connect;
			$result=$connect->prepare("DELETE FROM `offer_hotel1` WHERE `offer_id`=?");
			$result->execute(array($id));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
/**
    * get the all data from database about events
    *
    * @param  variables  $page_id hotel_id
    * @return all data from databas
*/
	function get_all_event($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `event_hotel1` WHERE `hotel_id`=?" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
/**
    * get the all data from database about events in ascending order
    *
    * @return all data from databas
*/
	function get_all_event_order($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `event_hotel1` WHERE `hotel_id`=?  ORDER BY `event_title` ASC" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
		
/**
    * Insert the data into the database
    *
    * @param  variables  $page_id hotel_id
    * @param  variables  $event_title About the event title
    * @param  variables  $event_description descripes about the event
    * @param  variables  $filepath uploading images related with events
    * @return true or false
*/
	function add_data_event($data)
		{
			global $connect;
			$result=$connect->prepare("INSERT INTO `event_hotel1`( `hotel_id`,`event_title`,`event_description`,`image_path`) VALUES (?,?,?,?)");
			$result->execute($data);
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
/**
    * Delete the event from database
    *
    * @param  variables  $id event_id
    * @return true or false
*/ 
	function delete_event1($id)
		{
			global $connect;
			$result=$connect->prepare("DELETE FROM `event_hotel1` WHERE `event_id`=?");
			$result->execute(array($id));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
/**
    * get the all data from database about offers
    *
    * @param  variables  $id hotel_id
    * @return all data from database
*/
	function view_data1($id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `offer_hotel1` WHERE `offer_id`=?");
			$result->execute(array($id));
			return $result->fetch(PDO::FETCH_OBJ);
		}
/**
    * get the Update from database
    *
    * @param  variables  $title About the offer title
    * @param  variables  $description description about the offer
    * @param  variables  $id event id
    * @return true or false
*/
	function update1($title,$description,$id)
		{
			global $connect;
			$result=$connect->prepare("UPDATE `offer_hotel1` SET `offers_name`=?,`offers_description`=? WHERE `offer_id`=? ");
			$result->execute(array($title,$description,$id));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
/**
    * get the all data from database about events
    *
    * @param  variables  $event_id hotel_id
    * @return all data from database
*/ 
	function view_data1_event($id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `event_hotel1` WHERE `event_id`=?");
			$result->execute(array($id));
			return $result->fetch(PDO::FETCH_OBJ);
		}
/**
    * get the Update from database
    *
    * @param  variables  $page_id hotel_id
    * @param  variables  $title About the event title
    * @param  variables  $description description about the event
    * @param  variables  $filepath uploading images related with events
    * @param  variables  $id event id
    * @return true or false
*/
	function update_query($page_id,$title,$description,$filepath,$id)
		{
			global $connect;
			$result=$connect->prepare("UPDATE `event_hotel1` SET `hotel_id`=?,`event_title`=?,`event_description`=?,`image_path`=? WHERE `event_id`=?");
			$result->execute(array($page_id,$title,$description,$filepath,$id));
			echo $result->rowCount();
			return($result->rowCount())?true:false;
		}
/**
    * get the all data from database about booking
    *
    * @param  variables  $page_id hotel_id
    * @return all data from database
*/ 
	function get_all_booking($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `booking_hotel1`WHERE `hotel_id`=?" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
/**
    * get the all data from database about booking in ascending order
    *
    * @param  variables  $page_id hotel_id
    * @return all data from database
*/
	function get_all_booking_order($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `booking_hotel1`WHERE `hotel_id`=? ORDER BY `booker_name` ASC" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
/**
    * get the all data from database about servicer
    *
    * @param  variables  $page_id hotel_id
    * @return all data from database
*/
	function get_all_servicing($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `service_hotel1`WHERE `hotel_id`=?" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
/**
    * get the all data from database about servicer in ascending order
    *
    * @param  variables  $page_id hotel_id
    * @return all data from database
*/
	function get_all_servicing_order($page_id)
		{
			global $connect;
			$result=$connect->prepare("SELECT * FROM `service_hotel1`WHERE `hotel_id`=? ORDER BY `servicer_name` ASC" );
			$result->execute(array($page_id));
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
/**
    * get the Update from database
    *
    * @param  variables  $servicer_id hotel_id
    * @param  variables  $servicer_name Servicer name
    * @param  variables  $servicer_email Servicer Email address
    * @param  variables  $servicer_checkin Servicer Check in date
    * @param  variables  $servicer_checkout Servicer Check out date  
    * @param  variables  $servicer_requestdate Servicer Request date
    * @param  variables  $servicer_detail Details of Servicer
    * @param  variables  $servicer_contact Servicer Contact Number
    * @param  variables  $servicer_priority Servicer Priority
    * @param  variables  $servicer_status Servicer Status
    * @return true or false
*/ 
	function update($page_id,$servicer_name,$servicer_email,$servicer_checkin,$servicer_checkout,$servicer_requestdate,$servicer_detail,$servicer_contact,$servicer_priority,$servicer_status,$servicer_id)
		{
			global $connect;
			$result=$connect->prepare("UPDATE `service_hotel1` SET `hotel_id`=?,`servicer_name`=?,`servicer_email`=?,`servicer_checkin`=?,`servicer_checkout`=?,`servicer_requestdate`=?,`servicer_detail`=?,`servicer_contact`=?,`servicer_priority`=?,`status`=? WHERE `service_id`=?");
			$result->execute(array($page_id,$servicer_name,$servicer_email,$servicer_checkin,$servicer_checkout,$servicer_requestdate,$servicer_detail,$servicer_contact,$servicer_priority,$servicer_status,$servicer_id));
			$result->rowCount();
			return($result->rowCount())?true:false;
		}
