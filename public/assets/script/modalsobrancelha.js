
function selecionarHorario(horario) {
    // Remove a seleção de todos os botões primeiro
    document.querySelectorAll('.horarios-grid button').forEach(btn => {
        btn.classList.remove('selecionado'); // Remove a classe de selecionado
    });

    // Marca o botão clicado como selecionado
    const botoes = document.querySelectorAll('.horarios-grid button');
    botoes.forEach(botao => {
        if (botao.innerText.trim() === horario) { // Usar trim() para remover possíveis espaços extras
            botao.classList.add('selecionado'); // Adiciona a classe de selecionado
        }
    });

    // Guarda o horário selecionado
    horarioSelecionadoSobrancelha = horario;
}

// Função para abrir o modal de contato
function openContactModal() {
    
    const dataInput = document.getElementById('dataSobrancelha').value.trim();
    

    if (dataInput === '' || horarioSelecionadoSobrancelha === '') {
        alert('Por favor, preencha todos os campos e selecione um horário antes de confirmar.');
        return; // Impede de abrir o modal se faltar algo
    }

    // Atualiza o conteúdo do modal com os dados preenchidos
   
    document.getElementById('resumoServico').innerHTML = `<strong>Serviço:</strong> ${sobrancelhaSelecionada}`;
    document.getElementById('resumoProfissional').innerHTML = `<strong>Profissional:</strong> ${profissionalSelecionadoSobrancelha}`;
    document.getElementById('resumoData').innerHTML = `<strong>Data:</strong> ${dataInput}`;
    document.getElementById('resumoHorario').innerHTML = `<strong>Horário:</strong> ${horarioSelecionadoSobrancelha}`;
    document.getElementById('resumoValor').innerHTML = `<strong>Valor:</strong> R$ ${valorSobrancelhaSelecionada}`; // Pode mudar o valor se quiser

    // Exibe o modal
    document.getElementById('resumoModal').style.display = 'block';
}

function confirmaAgendamento() {
    // Fecha o modal de resumo
    fecharModalCortes();

    // Abre o modal de sucesso
    document.getElementById("sucessoModalCortes").style.display = "block";
    
    confirmaSombrancelhaBackend(openContactModal);
    
}

// Função para fechar o modal de contato
function fecharModal() {
    document.getElementById("resumoModal").style.display = "none";
}

// // Função para pagar com Pix            
// function confirmaAgendamento() {
//     alert("Agendamento realizado com sucesso!");
//     fecharModal(); // Fecha o modal após o pagamento
// }

// ------------------------------------------------------------------------------------
function confirmaSombrancelhaBackend(callback) {
    const data = document.getElementById("dataSobrancelha").value.trim();

    // Dados que você quer enviar
    const dados = {
        data: data,
        horario: horarioSelecionadoSobrancelha,
        profissional: profissionalSelecionadoSobrancelha,
        servico: sobrancelhaSelecionada,
        valor: valorSobrancelhaSelecionada
    };

    // Envia os dados para o backend
    fetch("salvar_agendamento.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(dados)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            callback(); // Chama a função de callback se o agendamento for bem-sucedido
        } else {
            alert("Erro ao agendar: " + data.message);
        }
    })
    .catch(error => {
        console.error("Erro:", error);
        alert("Ocorreu um erro ao tentar agendar.");
    });
}