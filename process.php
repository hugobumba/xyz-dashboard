<?php
	session_start();
	$con = new mysqli('localhost', 'root', '', 'xyz');
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	if (isset($_POST['entrar'])){
		$sql = "SELECT * FROM dbuser WHERE dbuser_name='".$_POST['user']."' AND dbuser_password='".md5($_POST['pass'])."'";
		$res = $con->query($sql);
		if ($res->num_rows > 0) {
			$row = $res->fetch_assoc();
			$_SESSION['valid'] = TRUE;
			$_SESSION['username'] = $row["dbuser_name"];
			setcookie('username', $row["dbuser_name"], time()+3600, "/");
			header('Location: index.php');
		}else{
			header('Location: login.php');
		}
	}
	if(isset($_GET['op']) && ($_GET['op']) == 'sair'){
		$_SESSION["valid"] = FALSE;
		unset($_COOKIE);
		setcookie('username', null, time()-3600);
		session_destroy();
		header('Location: login.php');
	}
	$sqld = "SELECT count(*) as contagem FROM department";
	$resd = $con->query($sqld);
	if ($resd->num_rows > 0) {
		$rowd = $resd->fetch_assoc();
		$_SESSION['department'] = $rowd['contagem'];
	}
	$sqlf = "SELECT count(*) as contagem FROM employee";
	$resf = $con->query($sqlf);
	if ($resf->num_rows > 0) {
		$rowf = $resf->fetch_assoc();
		$_SESSION['employee'] = $rowf['contagem'];
	}
	$sqlc = "SELECT count(*) as contagem FROM category";
	$resc = $con->query($sqlc);
	if ($resc->num_rows > 0) {
		$rowc = $resc->fetch_assoc();
		$_SESSION['category'] = $rowc['contagem'];
	}
	$sqle = "SELECT count(*) as contagem FROM equipment";
	$rese = $con->query($sqle);
	if ($rese->num_rows > 0) {
		$rowe = $rese->fetch_assoc();
		$_SESSION['equipment'] = $rowe['contagem'];
	}
	if (isset($_GET['inserido'])) {
		if(($_GET['idep_nome'] != '')){
			$sql1 = "INSERT INTO department (department_name) VALUES ('".$_GET['idep_nome']."')";
			if($con->query($sql1) === TRUE) {
				header('Location: index.php');
			}
		}
		if(($_GET['ifunc_nome'] != '') && ($_GET['ifunc_tel'] != '') && ($_GET['ifunc_dep'] != '')){
			$sql2 = "INSERT INTO employee (employee_name, employee_phone, employee_department) VALUES ('".$_GET['ifunc_nome']."', ".$_GET['ifunc_tel'].", ".$_GET['ifunc_dep'].")";
			if($con->query($sql2) === TRUE) {
				header('Location: index.php');
			}
		}
		if($_GET['icat_nome']){
			$sql3 = "INSERT INTO category (category_name) VALUES ('".$_GET['icat_nome']."')";
			if($con->query($sql3) === TRUE) {
				header('Location: index.php');
			}
		}
		if(($_GET['iequip_ref'] != '') && ($_GET['iequip_cat'] != '') && ($_GET['iequip_func'] != '')){
			$sql1 = "INSERT INTO equipment (equipment_reference, equipment_category, equipment_employee) VALUES ('".$_GET['iequip_ref']."', ".$_GET['iequip_cat'].", ".$_GET['iequip_func'].")";
			if($con->query($sql1) === TRUE) {
				header('Location: index.phpos');
			}
		}
	}
	if (isset($_GET['addobs'])) {
		$sql = "INSERT INTO observation (observation_equipment, observation_content) VALUES (".$_GET['addobs'].", '".$_GET['insobs']."')";
		if($con->query($sql) === TRUE) {
			header('Location: index.php');
		}
	}
	if (isset($_GET['rem'])) {
		$sql4 = "DELETE FROM observation WHERE observation_equipment =".$_GET['rem'];
		if($con->query($sql4) === TRUE) {
			header('Location: index.php');
		}
	}
?>