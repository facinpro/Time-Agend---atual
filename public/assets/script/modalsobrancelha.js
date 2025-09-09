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
    // // Fecha o modal de resumo
    // fecharModalCortes();

    // // Abre o modal de sucesso
    // document.getElementById("sucessoModalCortes").style.display = "block";
    
    const data = document.getElementById("dataSobrancelha").value.trim();

    const dados = {
        tipoServico: sobrancelhaSelecionada,
        profissional: profissionalSelecionadoSobrancelha,
        data: data,
        horario: horarioSelecionadoSobrancelha,
        valor: valorSobrancelhaSelecionada
    };

    fetch("assets/script/salvar_agendamento.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(dados)
    })
    .then(response => response.text())
    .then(resultado => {
        console.log("Resposta do servidor:", resultado);
        fecharModal(); // ✅ agora está certo
        document.getElementById("sucessoModalCortes").style.display = "block";
    })
    .catch(error => {
        console.error("Erro ao salvar agendamento:", error);
        alert("Ocorreu um erro ao salvar o agendamento.");
    });
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

// ----------------------------------------------------------------------------------