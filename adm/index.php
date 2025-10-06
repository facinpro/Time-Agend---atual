<?php 
  include_once('../adm/services/controlBarber.php');
  include_once('../adm/services/controlService.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Importa o Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= BASE_URL?>/adm/assets/css/style.css">

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
                <i class='bx bxs-cog'></i>
                <span class="text">Configurações</span>
            </a>
        </li>
        <li>
            <a href="<?=BASE_URL?>/user/login.php" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Sair</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->

<!-- CONTEÚDO PRINCIPAL -->
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
    <main>
        <!-- Dashboard -->
        <div id="dashboard-content" class="content-section">
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li><a class="active" href="#">Home</a></li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3><?= $numAtendimentos ?></h3>
                        <p>Atendimentos</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3><?= $numUser ?></h3>
                        <p>Clientes</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
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

                    <!-- Modal filtro -->
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
                                    <p><?= htmlspecialchars($a['nome_cliente']); ?></p>
                                </td>
                                <td><?= htmlspecialchars($a['data']);?></td>
                                <td><?= htmlspecialchars($a['nome_servico']);?></td>
                                <td><?= htmlspecialchars($a['horario']);?></td>
                                <td>
                                    <span class="status <?= htmlspecialchars($a['status']) ?>">
                                        <?= htmlspecialchars($a['status']); ?>
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Lista de tarefas -->
            <div class="todo">
                <div class="head">
                    <h3>Lista de Tarefas</h3>
                    <i class='bx bx-plus' id="add-task" title="Adicionar Tarefa"></i>
                </div>
                <ul class="todo-list" id="todo-list"></ul>
            </div>
        </div>

       <!-- Meu Site -->
<div id="meu-site-content" class="content-section" style="display: none;">
  <h1>Meu Site</h1>
  <p class="info">Aqui estão as informações sobre o seu site.</p>

  <!-- Formulário de contato -->
  <form action="<?= BASE_URL ?>/adm/services/localiza.php" method="POST">
    <div class="meios">Meios de contato e endereços:</div>
    <div class="contact-info">
      <div>
        <label>Telefone</label>
        <input type="text" name="telefone" />
      </div>
      <div>
        <label>E-Mail</label>
        <input type="text" name="email" />
      </div>
      <div>
        <label>Cidade</label>
        <input type="text" name="cidade"/>
      </div>
      <div>
        <label>Endereço</label>
        <input type="text" name="local"/>
      </div>
    </div>
    <button type="submit" class="save-button">Salvar</button>
  </form>

  <!-- Serviços e preços -->
  <div class="services-prices">
    <h2>Serviços & Preços</h2>

    <!-- Tabela de Serviços -->
    <table class="services-table">
        <thead>
            <tr>
                <th>Nome do Serviço</th>
                <th>Categoria (Tipo)</th>
                <th>Preço</th>
                <th>Duração</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicos as $s): ?>
            <tr>
                <td><?= htmlspecialchars($s['nome_servico']); ?></td>
                <td><?= htmlspecialchars($s['tipo']); ?></td>
                <td>R$ <?= number_format($s['preco'], 2, ',', '.'); ?></td>
                <td><?= htmlspecialchars($s['duracao']); ?> min</td>
                <td><i class="fas fa-edit" style="cursor:pointer;"></i></td>
            </tr>
            <?php endforeach; ?>

            <!-- Serviço fictício -->
            <tr>
                <td>Corte Masculino Clássico</td>
                <td>Corte</td>
                <td>R$ 35,00</td>
                <td>30 min</td>
                <td><i class="fas fa-edit" style="cursor:pointer;"> Editar</i></td>
            </tr>
        </tbody>
    </table>

    <!-- Botão abrir modal -->
    <button class="add-service-btn" id="openModalBtn">+ Adicionar Serviço</button>
</div>

<style>
.services-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    font-size: 0.95rem;
    margin-bottom: 20px;
}

.services-table th, .services-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.services-table th {
    background-color: #4b0082;
    color: white;
}

.services-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.services-table tr:hover {
    background-color: #f1eef9;
}
</style>


    
</div>

<!-- Modal para adicionar serviço -->
<div id="serviceModal" class="modal">
  <div class="modal-content">
    <span class="close-modal" id="closeModalBtn">&times;</span>
    <h3>Adicionar Novo Serviço:</h3><br>
    <form action="<?= BASE_URL?>/adm/services/controlService.php" method="POST">
      <div><label>Nome do serviço:</label><input type="text" name="service-name" required></div>
      <div><label>Tipo de serviço:</label><input type="text" name="service-tipo" required></div>
      <div><label>Valor do serviço:</label><input type="number" name="service-valor" required></div>
      <div><label>Duração do serviço:</label><input type="text" name="service-duracao" required></div>
      <button type="submit" class="save-button-1">Salvar</button>
    </form>
  </div>
</div>

<!-- ====== CSS ====== -->
<style>
#meu-site-content {
  max-width: 1000px;
  margin: 0 auto;
  padding: 25px;
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.08);
  font-family: 'Segoe UI', Tahoma, sans-serif;
}

#meu-site-content h1 {
  font-size: 2rem;
  color: #4b0082;
  margin-bottom: 10px;
  text-align: center;
}

#meu-site-content .info {
  color: #555;
  text-align: center;
  margin-bottom: 25px;
  font-size: 1rem;
}

/* Formulário de contato */
.meios {
  font-weight: bold;
  color: #4b0082;
  margin-bottom: 10px;
  font-size: 1.1rem;
}

.contact-info {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
  gap: 15px;
  margin-bottom: 20px;
}

.contact-info input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  transition: border-color 0.3s;
}

.contact-info input:focus {
  border-color: #4b0082;
  box-shadow: 0 0 5px rgba(75,0,130,0.3);
}

.save-button {
  background-color: #4b0082;
  color: white;
  padding: 10px 18px;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  cursor: pointer;
  display: block;
  margin: 0 auto;
}

.save-button:hover { background-color: #5e12a8; }

/* Serviços */
.services-prices h2 {
  font-size: 1.4rem;
  color: #4b0082;
  margin-bottom: 15px;
  border-left: 4px solid #4b0082;
  padding-left: 10px;
}

.categories {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 15px;
  margin-bottom: 25px;
}

.barber-card {
  background-color: #f9f9f9;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  position: relative;
  transition: transform 0.2s, box-shadow 0.3s;
}

.barber-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.barber-card strong { font-size: 1.1rem; color: #333; }

.barber-card .edit-icon {
  position: absolute;
  top: 10px;
  right: 10px;
  color: #4b0082;
  cursor: pointer;
  transition: color 0.3s;
}

.barber-card .edit-icon:hover { color: #5e12a8; }

/* Botão adicionar serviço */
.add-service-btn {
  background-color: #4b0082;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  display: block;
  margin: 0 auto 20px;
  font-size: 1rem;
  transition: background 0.3s;

}

.add-service-btn:hover { background-color: #5e12a8; }

/* Modal */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
}

.modal-content {
  background-color: #fff;
  margin: 100px auto;
  padding: 25px;
  border-radius: 12px;
  max-width: 500px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.2);
  position: relative;
}

.close-modal {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 1.5rem;
  cursor: pointer;
  color: #4b0082;
}

.close-modal:hover { color: #5e12a8; }

.services-prices form {
  display: grid;
  gap: 10px;
}

.services-prices input {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

.services-prices input:focus {
  border-color: #4b0082;
  box-shadow: 0 0 5px rgba(75,0,130,0.3);
}

.save-button-1 {
  background-color: #4b0082;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  width: 100%;
  transition: background 0.3s;
}

.save-button-1:hover { background-color: #5e12a8; }

/* Responsividade */
@media (max-width: 600px) {
  #meu-site-content { padding: 15px; }
  #meu-site-content h1 { font-size: 1.6rem; }
  .categories { grid-template-columns: 1fr; }
}
</style>

<!-- ====== JavaScript ====== -->
<script>
const modal = document.getElementById('serviceModal');
const openBtn = document.getElementById('openModalBtn');
const closeBtn = document.getElementById('closeModalBtn');

openBtn.addEventListener('click', () => modal.style.display = 'block');
closeBtn.addEventListener('click', () => modal.style.display = 'none');
window.addEventListener('click', (e) => { if(e.target === modal) modal.style.display = 'none'; });
</script>


        
<!-- Análise -->
<div id="analise-content" class="content-section" style="display: none;">
  <h1>Análise</h1>
  <p>Relatórios e gráficos sobre o desempenho do site.</p>

  <!-- Container dos gráficos -->
  <div style="max-width: 800px; margin: 20px auto;">
    <!-- Gráfico de visitas -->
    <canvas id="visitasChart"></canvas>
  </div>

  <div style="max-width: 800px; margin: 20px auto;">
    <!-- Gráfico de serviços mais acessados -->
    <canvas id="servicosChart"></canvas>
  </div>

  <div style="max-width: 800px; margin: 20px auto;">
    <!-- Gráfico de crescimento -->
    <canvas id="crescimentoChart"></canvas>
  </div>
</div>

<script>
  // Gráfico de linhas - Visitas por mês
  const ctx1 = document.getElementById('visitasChart');
  new Chart(ctx1, {
    type: 'line',
    data: {
      labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set'],
      datasets: [{
        label: 'Visitas Mensais',
        data: [120, 190, 300, 500, 250, 320, 410, 460, 530],
        borderColor: '#6a0dad',
        backgroundColor: 'rgba(106, 13, 173, 0.2)',
        tension: 0.3,
        fill: true
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: true },
        title: { display: true, text: 'Visitas Mensais do Site' }
      }
    }
  });

  // Gráfico de barras - Serviços mais acessados
  const ctx2 = document.getElementById('servicosChart');
  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ['Cortes', 'Barba', 'Coloração', 'Sobrancelha', 'Pacotes'],
      datasets: [{
        label: 'Acessos',
        data: [350, 280, 150, 120, 200],
        backgroundColor: ['#6a0dad', '#8e44ad', '#9b59b6', '#bb8fce', '#d2b4de']
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        title: { display: true, text: 'Serviços Mais Acessados' }
      }
    }
  });

  // Gráfico de pizza - Crescimento percentual
  const ctx3 = document.getElementById('crescimentoChart');
  new Chart(ctx3, {
    type: 'pie',
    data: {
      labels: ['Novo Tráfego', 'Retornos', 'Indicações'],
      datasets: [{
        label: 'Crescimento',
        data: [45, 35, 20],
        backgroundColor: ['#6a0dad', '#9b59b6', '#d2b4de']
      }]
    },
    options: {
      responsive: true,
      plugins: {
        title: { display: true, text: 'Fontes de Crescimento do Site' }
      }
    }
  });
</script>


       <!-- Equipe -->
<div id="equipe-content" class="content-section" style="display: none;">
  <h1>Equipe</h1>
  <p class="info">Lista de membros e informações sobre a equipe.</p>

  <!-- Seção: Equipe existente -->
  <div class="barber-section">
    <h2>Membros cadastrados</h2>
    <div class="professional-cards">
      <?php foreach ($barbeiroList as $barbeiro): ?>
      <div class="professional-card">
        <div class="card-img">
          <img src="<?= $barbeiro['foto'] ?>" alt="Foto de <?= htmlspecialchars($barbeiro['nome_barbeiro']) ?>">
        </div>
        <div class="card-info">
          <strong><?= htmlspecialchars($barbeiro['nome_barbeiro']) ?></strong>
          <div class="feedback">
            ★★★★☆ <!-- Exemplo de feedback -->
          </div>
        </div>
        <div class="edit-icon"><i class="fas fa-edit"></i></div>
      </div>
      <?php endforeach; ?>

      <!-- Exemplo fictício -->
      <div class="professional-card">
        <div class="card-img">
         <img src="<?= BASE_URL ?>adm/img/Captura de tela 2024-12-15 012952.png" alt="Foto de João Silva">
        </div>
        <div class="card-info">
          <strong>João Silva</strong>
          <div class="feedback">★★★★★</div>
        </div>
        <div class="edit-icon"><i class="fas fa-edit"></i></div>
      </div>
    </div>
    <button class="button-barber">Salvar Alterações</button>
  </div>
  

  <!-- Seção: Adicionar novo barbeiro -->
  <div class="barber-section">
    <h2>Adicionar novo membro</h2>
    <form action="<?= BASE_URL?>/adm/services/controlBarber.php" method="POST" enctype="multipart/form-data" class="add-barber-form">
      <div><label>Nome:</label><input type="text" name="nome" required></div>
      <div><label>Email:</label><input type="text" name="email" required></div>
      <div><label>Senha:</label><input type="password" name="senha" required></div>
      <div><label>Descrição:</label><textarea name="obs" rows="3"></textarea></div>
      <div><label>Foto Perfil:</label><input type="file" name="foto" accept="image/*"></div>
      <div><button type="submit" class="button-barber">Salvar</button></div>
    </form>
  </div>
</div>

<style>
/* ===== Seção Equipe ===== */
#equipe-content {
  max-width: 1000px;
  margin: 0 auto;
  padding: 25px;
  background: #ffffff;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.08);
  font-family: 'Segoe UI', Tahoma, sans-serif;
}

#equipe-content h1 {
  text-align: center;
  color: #4b0082;
  margin-bottom: 10px;
}

#equipe-content .info {
  text-align: center;
  color: #555;
  margin-bottom: 25px;
}

.barber-section h2 {
  color: #4b0082;
  margin-bottom: 15px;
  border-left: 4px solid #4b0082;
  padding-left: 10px;
}

/* Container dos profissionais */
.professional-cards {
 display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 250px)); /* largura fixa máxima */
  gap: 20px;
  justify-content: center; /* centraliza os cards se sobrar espaço */
  margin: 20px;
}

.professional-card {
    background-color: #f9f9f9;
  border-radius: 12px;
  padding: 10px;
  text-align: center;
  position: relative;
  box-shadow: 0 3px 15px rgba(0,0,0,0.08);
  transition: transform 0.2s, box-shadow 0.3s;

}

.professional-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

/* Foto do profissional */
.professional-card .card-img img {
  border-radius: 12px;
  width: 100%;
  height: 150px;
  object-fit: cover;
  margin-bottom: 10px;
}

/* Informações do card */
.professional-card .card-info strong {
  display: block;
  font-size: 1.1rem;
  color: #333;
  margin-bottom: 5px;
}

.professional-card .feedback {
  color: #f5a623;
  font-size: 1rem;
}

/* Ícone de edição */
.professional-card .edit-icon {
  position: absolute;
  top: 10px;
  right: 10px;
  color: #4b0082;
  cursor: pointer;
  font-size: 1rem;
  transition: color 0.3s;
}

.professional-card .edit-icon:hover { color: #5e12a8; }

/* Botão salvar */
.button-barber {
  background-color: #4b0082;
  color: #fff;
  padding: 10px 18px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 1rem;
  display: block;
  margin: 0 auto;
  transition: background 0.3s;
}

.button-barber:hover { background-color: #5e12a8; }

/* Formulário adicionar barbeiro */
.add-barber-form div {
  margin-bottom: 10px;
  display: flex;
  flex-direction: column;
}

.add-barber-form label {
  font-size: 0.9rem;
  color: #444;
  margin-bottom: 3px;
}

.add-barber-form input,
.add-barber-form textarea {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

.add-barber-form input:focus,
.add-barber-form textarea:focus {
  border-color: #4b0082;
  outline: none;
  box-shadow: 0 0 5px rgba(75,0,130,0.3);
}

/* Responsividade */
@media(max-width:600px){
  .professional-cards { grid-template-columns: 1fr; }
}
</style>


<script src="<?= BASE_URL?>/adm/assets/script/script.js"></script>
<script src="<?= BASE_URL?>/adm/assets/script/menuhub.js"></script>
<script src="<?= BASE_URL?>/adm/assets/script/filtro.js"></script>
</body>
</html>