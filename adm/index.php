<?php 
  
  include_once('../adm/services/controlBarber.php');
  include_once('../adm/services/controlService.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="<?= BASE_URL?>/adm/assets/css/style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="#" data-target="dashboard-content">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" data-target="meu-site-content">
                <i class='bx bxs-shopping-bag-alt'></i>
                <span class="text">Meu Site</span>
            </a>
        </li>
        <li>
            <a href="#" data-target="analise-content">
                <i class='bx bxs-doughnut-chart'></i>
                <span class="text">Análise</span>
            </a>
        </li>
        <!-- <li> -->
            <!-- <a href="#" data-target="mensagens-content"> -->
                <!-- <i class='bx bxs-message-dots'></i> -->
                <!-- <span class="text">Mensagens</span> -->
            <!-- </a> -->
        <!-- </li> -->
        <li>
            <a href="#" data-target="equipe-content">
                <i class='bx bxs-group'></i>
                <span class="text">Equipe</span>
            </a>
        </li>
    </ul>

		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Configurações</span>
				</a>
			</li>
			<li>
				<a href="<?=BASE_URL?>/user/login.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Sair</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

<!-- CONTEÚDO PRINCIPAL -->


	<!-- CONTENT -->
	<section id="content">
		
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Pesquisar...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="<?= BASE_URL?>/adm/img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->
		

		<!-- MAIN -->
		<main >
			<div id="dashboard-content" class="content-section">
				<div class="head-title">
					<div class="left">
						<h1>Dashboard</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Dashboard</a>
							</li>
							<li><i class='bx bx-chevron-right' ></i></li>
							<li>
								<a class="active" href="#">Home</a>
							</li>
						</ul>
					</div>
					<a href="#" class="btn-download">
						<i class='bx bxs-cloud-download' ></i>
						<span class="text">Download PDF</span>
					</a>
				</div>
				<ul class="box-info">
					<li>
						<i class='bx bxs-calendar-check' ></i>
						<span class="text">
							<h3><?= $numAtendimentos ?></h3>
							<p>Atendimentos</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-group' ></i>
						<span class="text">
							<h3><?= $numUser ?></h3>
							<p>Clientes</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-dollar-circle' ></i>
						<span class="text">
							<h3>R$ <?= $totalLucro ?></h3>
							<p>Saldo total</p>
						</span>
					</li>
				</ul>
				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>Clientes Agendados</h3>
							<i class='bx bx-search' id="search-icon"></i>
										<i class='bx bx-filter' id="filter-icon"></i>
						</div>
						<!-- Modal para filtro -->
					  <div id="filter-modal" class="filter-modal">
					 <div class="modal-content">
						<span class="close" id="close-modal">&times;</span>
						<h2>Filtrar Clientes</h2>
						<form id="filter-form">
							<label for="filter-date">Data:</label>
							<input type="date" id="filter-date" name="date">
				
							<label for="filter-service">Serviço:</label>
							<input type="text" id="filter-service" name="service" placeholder="Digite o serviço">
				
							<button type="button" id="apply-filter">Aplicar Filtro</button>
						</form>
					  </div>
					 </div>
						<table id="client-table">
							<thead>
								<tr>
									<th>Cliente</th>
									<th>Data</th>
									<th>Serviço</th>
									<th>Horário</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody id="client-table-body">
								<?php foreach ($agendamentos as $a): ?>
									<tr>
										<td>
											<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
											<p><?php echo htmlspecialchars($a['nome_cliente']); ?></p>
										</td>
										<td><?php echo htmlspecialchars($a['data']);?></td>
										<td><?php echo htmlspecialchars($a['nome_servico']);?></td>
										<td><?php echo htmlspecialchars($a['horario']);?></td>
                                        <td><span class="status <?php echo htmlspecialchars($a['status'])?> ">
											<?php echo htmlspecialchars($a['status']);?></span></td>
									</tr>
								<?php endforeach; ?>
								<!-- <tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>John Doe</p>
									</td>
									<td>01-10-2024</td>
									<td>Corte de Cabelo</td>
									<td>10:00 AM</td>
									<td><span class="status completed">Completed</span></td>
								</tr>
								<tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>Jane Smith</p>
									</td>
									<td>01-10-2024</td>
									<td>Barba e Cabelo</td>
									<td>11:00 AM</td>
									<td><span class="status pending">Pending</span></td>
								</tr>
								<tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>Robert Brown</p>
									</td>
									<td>02-10-2024</td>
									<td>Sombrancelha</td>
									<td>02:00 PM</td>
									<td><span class="status process">In Process</span></td>
								</tr>
								<tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>Emily Davis</p>
									</td>
									<td>02-10-2024</td>
									<td>Corte de Cabelo</td>
									<td>03:30 PM</td>
									<td><span class="status pending">Pending</span></td>
								</tr>
								<tr>
									<td>
										<img src="<?= BASE_URL?>/adm/img/people.png" alt="Foto do cliente">
										<p>Chris Wilson</p>
									</td>
									<td>03-10-2024</td>
									<td>Tratamento Capilar</td>
									<td>05:00 PM</td>
									<td><span class="status completed">Completed</span></td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
				
					 </head>
					
						<div class="todo">
				<div class="head">
					<h3>Lista de Tarefas</h3>
					<i class='bx bx-plus' id="add-task" title="Adicionar Tarefa"></i>
				</div>
				<ul class="todo-list" id="todo-list">
					<!-- As tarefas serão inseridas aqui dinamicamente -->
				</ul>
						</div>
			</div>
            
			<!-- Meu site aqui -->
			<!-- <div id="meu-site-content" class="content-section" style="display: none;">
				<h1>Meu Site</h1>
				<p class="info">Aqui estão as informações sobre o seu site.</p>
				
                <div class="meios">Meios de contato e endereços:</div>
                <div class="contact-info">
               
                <div>
                    <label>Telefone</label>
                    <input type="text" value="+123-456-7890"/>
                </div>
                <div>
                    <label>E-Mail</label>
                    <input type="text" value="hello@reallygreatsite.com"/>
                </div>
                <div>
                    <label>Website</label>
                    <input type="text" value="www.reallygreatsite.com"/>
                </div>
                <div>
                    <label>Endereço</label>
                    <input type="text" value="123 Anywhere St., Any City"/>
                </div>
            </div>
            <button class="save-button">Salvar</button> -->
			<div id="meu-site-content" class="content-section" style="display: none;">
				<h1>Meu Site</h1>
				<p class="info">Aqui estão as informações sobre o seu site.</p>
				
				<form method="POST" action="<?= BASE_URL ?>adm/services/localiza.php">
					<div class="meios">Meios de contato e endereços:</div>
					<div class="contact-info">
						<div>
							<label>Telefone</label>
							<input type="text" name="telefone"  value=""/>
						</div>
						<div>
							<label>E-Mail</label>
							<input type="text" name="email" value=""/>
						</div>
						<div>
							<label>Website</label>
							<input type="text" name="site" value=""/>
						</div>
						<div>
							<label>Endereço</label>
							<input type="text" name="local" value=""/>
						</div>
					</div>
					<button type="submit" class="save-button">Salvar</button>
				</form>
			</div>


            <div class="services-prices">
                <h2>Serviços & preços:</h2>
                <div class="categories">
            
				        <?php foreach ($servicos as $s): ?>
							<div class="category">
								<div class="barber-card">
									<div class="edit-icon">
										<i class="fas fa-edit"></i>
									</div>
									<strong><?php echo htmlspecialchars($s['nome_servico']); ?></strong><br>
									Tipo: <?php echo htmlspecialchars($s['tipo']); ?><br>
									Preço: R$ <?php echo number_format($s['preco'], 2, ',', '.'); ?><br>
									Duração: <?php echo htmlspecialchars($s['duracao']); ?>
								</div>
						    </div>
						<?php endforeach; ?>
                </div>
			
				<h2>Inserir novo Serviço</h2>
				
				<div> 
					<form action="<?= BASE_URL?>/adm/services/controlService.php" method="POST">
                        <div>
							<label for="service-name">Nome do serviço :</label>
							<input type="text" name="service-name" placeholder="Nome do serviço" required>
                        </div>
						<div>
							<label for="service-tipo">Tipo de serviço: </label>
							<input type="text" name="service-tipo" placeholder="Tipo do serviço" required>
						</div>
                        <div>
							<label for="service-valor">Valor do serviço:</label>
							<input type="number" name="service-valor" placeholder="Valor do serviço" required>
						</div>
                         <div>
							<label for="service-duracao">Duração do serviço:</label>
							<input type="text" name="service-duracao" placeholder="Tempo do serviço" required>
						</div>
						<button type="submit" class="save-button-1">Salvar</button>
						
					</form>
				</div>
				

				
                
            </div>
			</div>
	
			<!-- Análise -->
			<div id="analise-content" class="content-section" style="display: none;">
				<h1>Análise</h1>
				<p>Relatórios e gráficos sobre o desempenho do site.</p>
			</div>
	
			<!-- Mensagens -->
			<!-- <div id="mensagens-content" class="content-section" style="display: none;"> -->
				<!-- <h1>Mensagens</h1> -->
				<!-- <p>Caixa de entrada para mensagens e notificações.</p> -->
			<!-- </div> -->
	
			<!-- Equipe -->
			<div id="equipe-content" class="content-section" style="display: none;">
				
				<p>Lista de membros e informações sobre a equipe.</p>

				<div class="barber-section">
					<h2>Adicione as imagens dos barbeiros junto com seus nomes</h2>
					<div class="barber-cards">

					      <?php foreach ($barbeiroList as $barbeiro): ?>
								<div class="barber-card">
									<img src="<?= $barbeiro['foto'] ?>" height="150" width="150" alt="Foto de <?= htmlspecialchars($barbeiro['nome_barbeiro']) ?>">
									<div class="edit-icon">
										<i class="fas fa-edit"></i>
									</div>
									<div class="name">
										Nome: <input type="text" value="<?= htmlspecialchars($barbeiro['nome_barbeiro']) ?>" />
										
									</div>
								</div>
						   <?php endforeach; ?>
			
						<!-- <div class="barber-card">
							<img alt="Barber 1" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 1" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 2" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 2" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 3" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 3" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 4" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 4" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 4" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 5" />
							</div>
						</div>
						<div class="barber-card">
							<img alt="Barber 4" height="150" src="<?= BASE_URL?>/adm/img/Captura de tela 2024-12-15 012952.png" width="150"/>
							<div class="edit-icon">
								<i class="fas fa-edit"></i>
							</div>
							<div class="name">
								Nome: <input type="text" value="BARBEIRO 6" />
							</div>
						</div> -->
						
					</div>
	                <button class="button-barber">Salvar</button>
				</div>
				<div class="barber-section">
					<div class="services-prices">
						<form action="<?= BASE_URL?>/adm/services/controlBarber.php" method="POST" enctype="multipart/form-data">
							<div>
								<label for="nome">Nome Funcionário:</label>
								<input type="text" id="nome" name="nome">
							</div>
							<div>
								<label for="email">Email:</label>
								<input type="text" id="email" name="email">
							</div>
							<div>
								<label for="senha">Senha:</label>
								<input type="password" id="senha" name="senha">
							</div>
							<div>
								<label for="obs">Descrição:</label>
								<input type="textarea" id="obs" name="obs">
							</div>
							<div>
								<label for="foto">Foto Perfil:</label>
								<input type="file" id="foto" name="foto">
							</div>
							<div>
								<button type="submit" class="button-barber">Salvar</button>
							</div>

						</form>
					</div>
				</div>	
			</div>

			</div>
		
			
		
			

	 <script src="<?= BASE_URL?>/adm/assets/script/script.js"></script>
	 <script src="<?= BASE_URL?>/adm/assets/script/menuhub.js"> </script>
	 <script src="<?= BASE_URL?>/adm/assets/script/filtro.js"> </script>

	
      
<!-- 
		let getClick = document.querySelector(".save-button-1");
		getClick.addEventListener("click", function() {
			let serviceName = document.querySelector("input[name ='service-name']").value;
			let serviceTipo = document.querySelector("input[name ='service-tipo']").value;
			let serviceValor = document.querySelector("input[name ='service-valor']").value;
			let serviceDuracao = document.querySelector("input[name ='service-duracao']").value;

			
			if (serviceName === '' || serviceTipo === '' || serviceValor === '' || serviceDuracao === '') {
            alert("Por favor, preencha todos os campos!");
            return;
        }

        // Enviar os dados para o servidor via AJAX
			let formData = new FormData();
			formData.append("service-name", serviceName);
			formData.append("service-tipo", serviceTipo);
			formData.append("service-valor", serviceValor);
			formData.append("service-duracao", serviceDuracao);

			// Usar fetch API ou XMLHttpRequest para enviar os dados
			fetch('URL_DO_SEU_BACKEND', {
				method: 'POST',
				body: formData
			})
			.then(response => response.json()) // Assumindo que o backend retorna JSON
			.then(data => {
				if (data.success) {
					alert("Serviço adicionado com sucesso!");
					// Opcional: Atualizar a interface ou limpar os campos
					document.querySelector("input[name ='service-name']").value = '';
					document.querySelector("input[name ='service-tipo']").value = '';
					document.querySelector("input[name ='service-valor']").value = '';
					document.querySelector("input[name ='service-duracao']").value = '';
				} else {
					alert("Erro ao adicionar serviço: " + data.message);
				}
			})
			.catch(error => {
				console.error('Erro ao enviar dados:', error);
				alert("Ocorreu um erro. Tente novamente.");
			});
		}) -->
	  
		
</main>
</section>
</body>
</html>