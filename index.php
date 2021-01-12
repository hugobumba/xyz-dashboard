<?php
	session_start();
	$con = new mysqli('localhost', 'root', '', 'xyz');
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>XYZ - Admin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="img/logo.jpg">
		<link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.min.css">
		<script src="node_modules/jquery/dist/jquery.min.js"></script>
		<script src="node_modules/popper.js/dist/umd/popper.js"></script>
		<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		<link href="style.css" rel="stylesheet">
		<script src="myjs.js"></script>
	</head>
	<?php if(isset($_COOKIE['username']) && $_SESSION['valid'] == TRUE){ ?>
	<body onload="funcionalidades();" id="body">
		<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="" style="text-align: center;">XYZ</a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<h6 style="color: white;">Administração</h6>
			<div class="dropdown">
				<button class="dropbtn"><?php echo "Utilizador: ".$_COOKIE['username']; ?></button>
				<div class="dropdown-content">
					<a href="#" data-toggle="modal" data-target="#insert_data">Inserir dados</a>
					<h6 class="dropdown-header"><ion-icon name="git-branch-outline"></ion-icon>Conexões</h6>
					<a href="./project">Project</a>
					<a href="./team">Team</a>
					<div class="dropdown-divider"></div>
					<a href="process.php?op=sair">Sair</a>
				</div>
			</div>
		</nav>
		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
					<div class="sidebar-fixed pt-3">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link" href="#" id="btn-funcdd">
									<ion-icon name="settings-outline"></ion-icon>
									Funcionalidades
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" id="btn-list">
									<ion-icon name="list-circle-outline"></ion-icon>
									Listagens
								</a>
								<ul style="list-style-type: none;">
									<li>
										<ion-icon name="business-outline"></ion-icon>
										<a href="#" style="color: black" id="btn-dep">Departamentos</a>
									</li>
									<li>
										<ion-icon name="man-outline"></ion-icon>
										<a href="#" style="color: black" id="btn-funcn">
										Funcionários</a>
									</li>
									<li>
										<ion-icon name="funnel-outline"></ion-icon>
										<a href="#" style="color: black" id="btn-cat">
										Categorias</a>
									</li>
									<li>
										<ion-icon name="phone-portrait-outline"></ion-icon>
										<a href="#" style="color: black" id="btn-equip">
										Equipamentos</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
					<div id="funcionalidades" class="div-top">
						<h2>Funcionalidades</h2>
						<div class="container">
							<div class="row">
								<div class="col-md-4 col-xl-3 zoom">
									<div class="card bg-c-blue order-card">
										<a href="#" style="text-decoration: none; color: #fff" id="btn-list1">
											<div class="card-block">
											<h6 class="m-b-20">Listagens</h6>									
												<h2 class="text-right"><ion-icon name="list-circle-outline"></ion-icon></h2>
												<p class="m-b-0">Tabelas a listar:<span class="f-right">4</span></p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-4 col-xl-3 zoom">
									<div class="card bg-c-yellow order-card">
										<a href="#" data-toggle="modal" data-target="#insert_data" style="text-decoration: none; color: #fff">
											<div class="card-block">
												<h6 class="m-b-20">Inserir dados</h6>
												<h2 class="text-right"><ion-icon name="add-circle-outline"></ion-icon></h2>
												<p class="m-b-0">(Funcionários, Categorias..)</p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-4 col-xl-3 zoom">
									<div class="card bg-c-pink order-card">
										<a href="logout.php" style="text-decoration: none; color: #fff">
											<div class="card-block">
											<h6 class="m-b-20">Terminar sessão</h6>
												<h2 class="text-right"><ion-icon name="log-out-outline"></ion-icon></h2>
												<p class="m-b-0">(Logout)</p>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="listagens" class="div-top">
						<h2>Listagens</h2>
						<div class="container">
							<div class="row">
								<div class="col-md-4 col-xl-3 zoom">
									<div class="card bg-c-blue order-card">
										<a href="#" style="text-decoration: none; color: #fff" id="btn-dep2">
											<div class="card-block">
											<h6 class="m-b-20">Departamentos</h6>
												<h2 class="text-right"><ion-icon name="business-outline"></ion-icon></h2>
												<p class="m-b-0">Nº de Departamentos:<span class="f-right"><?php echo($_SESSION['department']); ?></span></p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-4 col-xl-3 zoom">
									<div class="card bg-c-yellow order-card">
										<a href="#" style="text-decoration: none; color: #fff" id="btn-funcn2">
											<div class="card-block">
											<h6 class="m-b-20">Funcionários</h6>									
												<h2 class="text-right"><ion-icon name="man-outline"></ion-icon></h2>
												<p class="m-b-0">Nº de Funcionários:<span class="f-right"><?php echo($_SESSION['employee']); ?></span></p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-4 col-xl-3 zoom">
									<div class="card bg-c-green order-card">
										<a href="#" style="text-decoration: none; color: #fff" id="btn-cat2">
											<div class="card-block">
											<h6 class="m-b-20">Categorias</h6>
												<h2 class="text-right"><ion-icon name="funnel-outline"></ion-icon></h2>
												<p class="m-b-0">Nº de Categorias:<span class="f-right"><?php echo($_SESSION['category']); ?></span></p>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-4 col-xl-3 zoom">
									<div class="card bg-c-pink order-card">
										<a href="#" style="text-decoration: none; color: #fff" id="btn-equip2">
											<div class="card-block">
											<h6 class="m-b-20">Equipamentos</h6>
												<h2 class="text-right"><ion-icon name="phone-portrait-outline"></ion-icon></h2>
												<p class="m-b-0">Nº de Equipamentos:<span class="f-right"><?php echo($_SESSION['equipment']); ?></span></p>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="departamentos" class="div-top">
						<h2>Departametos</h2>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Funcionários</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$sql1 = "SELECT * FROM department";
									$res1 = $con->query($sql1);
									if ($res1->num_rows > 0) {
										while($row1 = $res1->fetch_assoc()){?>
											<tr>
												<td><?php echo($row1['department_name']); ?></td>
												<td>
													<button class="accordion-toggle btn btn-primary" data-toggle="collapse" href="#d<?php echo ($row1['department_id']); ?>">Ver</button>
													<div id="d<?php echo ($row1['department_id']); ?>" class="collapse">
														<table class="table table-striped table-condensed">
															<tr>
																<th>Nome</th>
																<th>Telemóvel</th>
																<th>Departamento</th>
															</tr>
															<?php
																$sql2 = "SELECT * FROM employee, department WHERE employee_department = department_id AND employee_department=".$row1['department_id'];
																$res2 = $con->query($sql2);
																if ($res2->num_rows > 0) {
																	while($row2 = $res2->fetch_assoc()){?>
																	<tr>
																		<td><?php echo ($row2['employee_name']); ?></td>
																		<td><?php echo ($row2['employee_phone']); ?></td>
																		<td><?php echo ($row2['department_name']); ?></td>
																	</tr>
																<?php }} ?>
														</table>
													</div>
												</td>
											</tr>
								<?php }} ?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="funcionarios" class="div-top">
						<h2>Funcionários</h2>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Telemóvel</th>
										<th>Departamento</th>
										<th>Equipamentos</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql3 = "SELECT * FROM employee, department WHERE employee_department = department_id;";
										$res3 = $con->query($sql3);
										if ($res3->num_rows > 0) {
											while($row3 = $res3->fetch_assoc()) {?>
												<tr>
													<td><?php echo ($row3['employee_name']); ?></td>
													<td><?php echo ($row3['employee_phone']); ?></td>
													<td><?php echo ($row3['department_name']); ?></td>
													<td>
														<button class="accordion-toggle btn btn-primary" data-toggle="collapse" href="#e<?php echo ($row3['employee_id']); ?>">Ver</button>
														<div id="e<?php echo ($row3['employee_id']); ?>" class="collapse">
															<table class="table table-striped table-condensed">
																<tr>
																	<th>Referência</th>
																	<th>Categoria</th>
																	<th>Funcionário</th>
																	<th>Observação</th>
																</tr>
																<?php
																	$sql4 = "SELECT equipment_reference, category_name, employee_name, observation_content from equipment INNER JOIN category ON equipment_category = category_id INNER JOIN employee ON equipment_employee = employee_id LEFT JOIN observation ON equipment_id = observation_equipment WHERE employee_id = ".$row3['employee_id'];
																	$res4 = $con->query($sql4);
																	if ($res4->num_rows > 0) {
																		while($row4 = $res4->fetch_assoc()){
																			if($row4['observation_content'] == NULL){
																				$obs ="Sem observação";
																			}else{$obs = $row4['observation_content'];}?>
																		<tr>
																			<td><?php echo ($row4['equipment_reference']);?></td>
																			<td><?php echo ($row4['category_name']); ?></td>
																			<td><?php echo ($row4['employee_name']); ?></td>
																			<td><?php echo ($obs); ?></td>
																		</tr>
																	<?php }} ?>
															</table>
														</div>
													</td>
												</tr>
									<?php }} ?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="categorias" class="div-top">
						<h2>Categorias</h2>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Equipamentos</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql5 = "SELECT * FROM category";
										$res5 = $con->query($sql5);
										if ($res1->num_rows > 0) {
											while($row5 = $res5->fetch_assoc()) {?>
												<tr>
													<td><?php echo ($row5['category_name']); ?></td>
													<td>
														<button class="accordion-toggle btn btn-primary" data-toggle="collapse" href="#c<?php echo ($row5['category_id']); ?>">Ver</button>
														<div id="c<?php echo ($row5['category_id']); ?>" class="collapse">
															<table class="table table-striped table-condensed">
																<tr>
																	<th>Referência</th>
																	<th>Categoria</th>
																	<th>Funcionário</th>
																	<th>Observação</th>
																</tr>
																<?php
																	$sql6 = "SELECT equipment_id, equipment_reference, category_name, employee_name, observation_content from equipment INNER JOIN category ON equipment_category = category_id INNER JOIN employee ON equipment_employee = employee_id LEFT JOIN observation ON equipment_id = observation_equipment WHERE category_id = ".$row5['category_id'];
																	$res6 = $con->query($sql6);
																	if ($res6->num_rows > 0) {
																		while($row6 = $res6->fetch_assoc()){
																			if($row6['observation_content'] == NULL){
																				$obs ="Sem observação";
																			}else{$obs = $row6['observation_content'];}?>
																		<tr>
																			<td><?php echo ($row6['equipment_reference']);?></td>
																			<td><?php echo ($row6['category_name']); ?></td>
																			<td><?php echo ($row6['employee_name']); ?></td>
																			<td><?php echo ($obs); ?></td>
																		</tr>
																	<?php }} ?>
															</table>
														</div>
													</td>
												</tr>
									<?php }} ?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="equipamentos" class="div-top">
						<h2>Equipamentos</h2>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#id#</th>
										<th>Referência</th>
										<th>Categoria</th>
										<th>Funcionário</th>
										<th>Observação</th>
										<th>Ação: Observação</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql = "SELECT * from equipment INNER JOIN category ON equipment_category = category_id INNER JOIN employee ON equipment_employee = employee_id LEFT JOIN observation ON equipment_id = observation_equipment";
										$res = $con->query($sql);
										if ($res->num_rows > 0) {
											while($row = $res->fetch_assoc()) {
												if($row['observation_content'] == NULL){?>
													<tr>
														<td><?php echo($row['equipment_reference']); ?></td>
														<td><?php echo($row['category_name']); ?></td>
														<td><?php echo($row['employee_name']); ?></td>
														<td><i>Sem observação</i></td>
														<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#<?php echo($row["equipment_id"]); ?>'><ion-icon name="add-circle-outline" style="font-size: 25px;"></ion-icon></button></td>
													</tr>
												<?php }else{ ?>
														<input type='number' name='mirzia' id='mirzia' value=<?php echo($row['equipment_id']);?> hidden>
														<tr>
															<td><?php echo($row['equipment_reference']); ?></td>
															<td><?php echo($row['category_name']); ?></td>
															<td><?php echo($row['employee_name']); ?></td>
															<td><?php echo($row['observation_content']); ?></td>
															<td><button type='button' class='btn btn-danger' onclick='confirmar(getElementById("mirzia").value);'><ion-icon name="trash-outline" style="font-size: 25px;"></ion-icon></button></td>
														</tr>
												<?php } ?>
													<div class='modal fade' id='<?php echo($row["equipment_id"]); ?>' tabindex='-1' role='dialog'>
														<div class='modal-dialog' role='document'>
															<div class='modal-content'>
																<div class='modal-header'>
																	<h5 class='modal-title' id='exampleModalLabel'>Inserir observação em: <?php echo($row['equipment_id']); ?></h5>
																	<button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
																		<span>&times;</span>
																	</button>
																</div>
																<div class='modal-body'>
																	<form action='process.php' method='get'>
																		<div class='form-group'>
																			<label>OBS:</label>
																			<input type='text' class='form-control form-control-lg' name='insobs' id='insobs'>
																		</div>
																		<div>
																			<button class='btn btn-outline-primary' name='addobs' id='addobs' value="<?php echo($row['equipment_id']); ?>">Inserir</ion-icon></button>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
											<?php }
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</main>
			</div>
		</div>
		<div class="modal fade" id="insert_data" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Inserir dados</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
							<span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<form action="process.php" method="get">
						    <div>
						    	<label>Inserir em:</label>
						        <select id="insercao">
						            <option>--Selecione a tabela--</option>
						            <option value="dep">Departamento</option>
						            <option value="func">Funcionário</option>
						            <option value="cat">Categoria</option>
						            <option value="equip">Equipamento</option>
						        </select>
						    </div>
						    <div class="dep box">
								<div class="form-group">
									<label>NOME DEPARTAMENTO</label>
									<input type="text" class="form-control" name="idep_nome" id="idep_nome">
								</div>
						    </div>

					    	<div class="func box">
								<div class="form-group">
									<label>NOME FUNCIONÁRIO</label>
									<input type="text" class="form-control" name="ifunc_nome" id="ifunc_nome">
								</div>
								<div class="form-group">
									<label>TELEFONE FUNCIONÁRIO</label>
									<input type="text" class="form-control" name="ifunc_tel" id="ifunc_tel">
								</div>
								<div class="form-group">
									<label>DEPARTAMENTO FUNCIONÁRIO</label>
									<select name="ifunc_dep" id="ifunc_dep">
									<?php
										$sql7 = "SELECT * FROM department";
										$res7 = $con->query($sql7);
										if ($res7->num_rows > 0) {
											echo'<option>--Selecione o Departamento--</option>';
											while($row7 = $res7->fetch_assoc()) {
												echo'<option value='.$row7["department_id"].'>'.$row7["department_name"].'</option>';
											}
										}
									?>
									</select>
								</div>
					    	</div>

						    <div class="cat box">
								<div class="form-group">
									<label>NOME CATEGORIA</label>
									<input type="text" class="form-control" name="icat_nome" id="icat_nome">
								</div>
						    </div>

						    <div class="equip box">
								<div class="form-group">
									<label>REFERÊNCIA EQUIPAMENTO</label>
									<input type="text" class="form-control" name="iequip_ref" id="iequip_ref">
								</div>
								<div class="form-group">
									<label>CATEGORIA EQUIPAMENTO: </label>
									<select name="iequip_cat" id="iequip_cat">
									<?php
										$sql8 = "SELECT * FROM category";
										$res8 = $con->query($sql8);
										if ($res8->num_rows > 0) {
											echo'<option >--Selecione a Categoria--</option>';
											while($row8 = $res8->fetch_assoc()) {
												echo'<option value='.$row8["category_id"].'>'.$row8["category_name"].'</option>';
											}
										}
									?>
									</select>
								</div>
								<div class="form-group">
									<label>FUNCIONÁRIO EQUIPAMENTO</label>
									<select name="iequip_func" id="iequip_func">
									<?php
										$sql9 = "SELECT * FROM employee";
										$res9 = $con->query($sql9);
										if ($res9->num_rows > 0) {
											echo'<option>--Selecione o Funcionário--</option>';
											while($row9 = $res9->fetch_assoc()) {
												echo'<option value='.$row9["employee_id"].'>'.$row9["employee_name"].'</option>';
											}
										}
									?>
									</select>
								</div>
						    </div>
						    <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="inserido" id="inserido">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
		<script src="dashboard.js"></script>
	</body>
	<?php
		}else{
			header('Location: login.php');
		}
	?>
</html>