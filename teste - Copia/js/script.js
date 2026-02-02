// Aguarda o HTML carregar completamente antes de rodar o script.
// Isso evita erros de "elemento não encontrado" se o script rodar antes da página montar.
document.addEventListener("DOMContentLoaded", () => {
  // --- CONFIGURAÇÃO INICIAL E VARIÁVEIS DE ESTADO ---

  // Cria uma lista (Array) contendo todas as DIVs que representam as telas do passo a passo.
  // Cada document.querySelector pega o elemento pela classe CSS.
  const steps = [
    document.querySelector(".primeiro"), // Índice 0: Formulário de dados
    document.querySelector(".segundo"), // Índice 1: Perguntas 1-6
    document.querySelector(".terceiro"), // Índice 2: Perguntas 7-9
    document.querySelector(".quarto"), // Índice 3: Perguntas 10-14
    document.querySelector(".quinto"), // Índice 4: Perguntas 15-19
    document.querySelector(".sexto"), // Índice 5: Perguntas 20-25
    document.querySelector(".setimo"), // Índice 6: Perguntas 26-30
    document.querySelector(".oitavo"), // Índice 7: Resultado Final
    document.querySelector(".nono"), // Índice 8: Pontos Fortes
    document.querySelector(".decimo"), // Índice 9: Pontos Fracos
    document.querySelector(".undecimo"), // Índice 10: Estratégia
    document.querySelector(".duodecimo"), // Índice 11: Impressão/Final
  ];

  // Seleciona todas as bolinhas (indicadores) lá do topo do HTML (#container).
  const progressIndicators = document.querySelectorAll("#container div");

  // Variável que controla em qual tela o usuário está (começa na 0).
  let currentStepIndex = 0;

  // Nome da chave para salvar os dados no navegador (LocalStorage).
  const STORAGE_KEY = "empreendedor_profile_v3";

  // --- FUNÇÃO DE NAVEGAÇÃO PRINCIPAL ---

  // Esta função é chamada toda vez que precisamos trocar de tela.
  // Ela recebe o número do índice para onde queremos ir.
  function showStep(index) {
    // Percorre todas as telas (steps)
    steps.forEach((step, i) => {
      if (step) {
        // Verifica se a div existe para evitar erro
        if (i === index) {
          // Se o índice do loop for igual ao índice desejado, remove a classe 'hidden' para MOSTRAR.
          step.classList.remove("hidden");

          // --- GATILHOS AUTOMÁTICOS ---
          // Aqui verificamos se chegamos em telas específicas para rodar cálculos.

          // Se chegou na tela de resultado (oitavo), calcula a nota total.
          if (step.classList.contains("oitavo")) {
            calcularResultadoFinal();
          }
          // Se chegou na tela de Pontos Fortes, calcula o ranking e preenche o texto.
          if (step.classList.contains("nono")) {
            preencherTitulosCategorias("fortes");
          }
          // Se chegou na tela de Pontos Fracos, faz o mesmo.
          if (step.classList.contains("decimo")) {
            preencherTitulosCategorias("fracos");
          }
        } else {
          // Se não for a tela atual, adiciona 'hidden' para ESCONDER.
          step.classList.add("hidden");
        }
      }
    });

    // Atualiza as bolinhas lá em cima.
    updateProgressBar(index);

    // Rola a página para o topo (útil em celulares).
    window.scrollTo(0, 0);
  }

  // --- BARRA DE PROGRESSO VISUAL ---

  function updateProgressBar(index) {
    // Loop pelas bolinhas indicadoras
    progressIndicators.forEach((indicator, i) => {
      // Ajuste: A bolinha visual 1 (índice 0) corresponde à tela de Perguntas 1 (índice 1 no array steps).
      // A tela de introdução (índice 0) não tem bolinha ativa.
      const stepCorrespondente = i + 1;

      // Reseta as classes para o estado "neutro" antes de aplicar a lógica
      indicator.classList.remove("active");
      indicator.classList.remove("completed");

      // Lógica de cores:
      if (index > stepCorrespondente) {
        // Se já passamos dessa fase -> Marca como completado (Verde com Check)
        indicator.classList.add("completed");
        indicator.textContent = "✓";
      } else if (index === stepCorrespondente) {
        // Se estamos nessa fase agora -> Marca como ativo (Azul)
        indicator.classList.add("active");
        indicator.textContent = i + 1; // Mostra o número original
      } else {
        // Se for uma fase futura -> Deixa cinza
        indicator.textContent = i + 1;
      }
    });
  }

  // --- VALIDAÇÃO DE CAMPOS ---

  // Impede que o usuário avance sem preencher os dados. Retorna true (pode passar) ou false (bloqueia).
  function validarEtapa(index) {
    const aviso = document.getElementById("aviso"); // Pega o elemento de mensagem de erro (se existir no HTML)
    const currentStep = steps[index]; // Pega a div da tela atual

    // 1. Validação da Introdução (Nome e Email)
    if (index === 0) {
      const inputs = currentStep.querySelectorAll("input[required]"); // Pega inputs obrigatórios
      let valido = true;

      inputs.forEach((input) => {
        if (!input.value.trim()) {
          // .trim() remove espaços em branco. Se estiver vazio:
          valido = false;
          input.style.border = "2px solid red"; // Borda vermelha de erro
        } else {
          input.style.border = "1px solid #ccc"; // Borda normal
        }
      });

      if (!valido) {
        if (aviso)
          aviso.textContent =
            "Por favor, preencha seu nome e e-mail antes de começar.";
        setTimeout(() => {
          aviso.textContent = ""; // Limpa erro se tiver tudo ok
        }, 1500);
        return false; // Bloqueia o avanço
      }
      if (aviso)
      return true; // Libera
    }

    // 2. Validação das Tabelas de Perguntas (Telas 1 a 6)
    const tabelasIndices = [1, 2, 3, 4, 5, 6];

    if (tabelasIndices.includes(index)) {
      // Truque para contar quantas perguntas existem:
      // Pegamos todos os radios, e usamos um "Set" (conjunto) para pegar apenas os nomes únicos (name="1", name="2"...)
      const radios = currentStep.querySelectorAll('input[type="radio"]');
      const perguntasUnicas = new Set();
      radios.forEach((r) => perguntasUnicas.add(r.name));

      // Conta quantos radios estão marcados (:checked) na tela atual
      const respondidas = currentStep.querySelectorAll(
        'input[type="radio"]:checked',
      ).length;

      // Se o número de marcados for menor que o número de perguntas, bloqueia.
      if (respondidas < perguntasUnicas.size) {
        const faltam = perguntasUnicas.size - respondidas;

        aviso.textContent = `Você precisa responder todas as perguntas desta etapa para prosseguir.\nFaltam ${faltam} resposta(s).`;

        setTimeout(() => {
          aviso.textContent = "";
        }, 2000);

        return false;
      }
    }

    return true; // Se não for tela de formulário nem de tabela, libera direto.
  }

  // --- EVENTOS DE CLIQUE (BOTÕES) ---

  // Configura todos os botões com a classe "proximo"
  document.querySelectorAll(".proximo").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      // Se for o botão de imprimir, não faz a navegação padrão (o onclick no HTML cuida disso)
      if (btn.hasAttribute("onclick")) return;

      e.preventDefault(); // Evita recarregar a página (comportamento padrão de form)

      // Chama a validação antes de mudar
      if (validarEtapa(currentStepIndex)) {
        // Se validou e não é a última tela...
        if (currentStepIndex < steps.length - 1) {
          currentStepIndex++; // Aumenta o índice
          showStep(currentStepIndex); // Mostra a nova tela
          persistData(); // Salva no navegador
        }
      }
    });
  });

  // Configura todos os botões com a classe "voltar"
  document.querySelectorAll(".voltar").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      // Se não estiver na primeira tela...
      if (currentStepIndex > 0) {
        currentStepIndex--; // Diminui o índice
        showStep(currentStepIndex); // Mostra a tela anterior
      }
    });
  });

  // Configura o formulário inicial para aceitar "Enter" como envio
  const firstForm = document.querySelector(".primeiro form");
  if (firstForm) {
    firstForm.addEventListener("submit", (e) => {
      e.preventDefault();
      if (validarEtapa(0)) {
        currentStepIndex++;
        showStep(currentStepIndex);
        persistData();
      }
    });
  }

  // --- LÓGICA DE RANKING (PONTOS FORTES E FRACOS) ---

  function preencherTitulosCategorias(tipo) {
    // Mapa manual conectando a classe HTML (.segundo) ao Título da categoria ("Comprometimento...")
    const categoriasMap = [
      { selector: ".segundo", titulo: "Comprometimento e determinação" },
      { selector: ".terceiro", titulo: "Obsessão pelas oportunidades" },
      { selector: ".quarto", titulo: "Tolerância ao risco" },
      { selector: ".quinto", titulo: "Criatividade e auto-confiança" },
      { selector: ".sexto", titulo: "Motivação e superação" },
      { selector: ".setimo", titulo: "Liderança" },
    ];

    let resultados = [];

    // Loop para calcular a nota de cada categoria
    categoriasMap.forEach((cat) => {
      const div = document.querySelector(cat.selector);
      if (!div) return;

      // Soma os pontos marcados na categoria
      const checkedRadios = div.querySelectorAll('input[type="radio"]:checked');
      let somaPontos = 0;
      checkedRadios.forEach((r) => (somaPontos += parseInt(r.value)));

      // Descobre quantos pontos ERAM possíveis (caso você mude o número de perguntas no futuro)
      const todosRadios = div.querySelectorAll('input[type="radio"]');
      const nomesUnicos = new Set();
      todosRadios.forEach((r) => nomesUnicos.add(r.name));
      const qtdPerguntas = nomesUnicos.size;

      // Calcula % de aproveitamento
      const maximo = qtdPerguntas * 5; // 5 é a nota máxima por pergunta
      const percentual = maximo > 0 ? (somaPontos / maximo) * 100 : 0;

      // Guarda no array de resultados
      resultados.push({
        titulo: cat.titulo,
        percentual: percentual,
      });
    });

    // Ordena do Maior para o Menor percentual
    resultados.sort((a, b) => b.percentual - a.percentual);

    let textoFinal = "";

    // Preenche o texto baseado no tipo pedido ('fortes' ou 'fracos')
    if (tipo === "fortes") {
      const top3 = resultados.slice(0, 3); // Pega os 3 primeiros (maiores)
      textoFinal = "As 3 áreas com maior pontuação foram:\n\n";
      top3.forEach((item, index) => {
        textoFinal += `${index + 1}. ${item.titulo} (${Math.round(item.percentual)}%)\n`;
      });
      textoFinal += "\n--- Comente sobre como você usa esses pontos fortes ---";
    } else if (tipo === "fracos") {
      const bottom3 = resultados.slice(-3).reverse(); // Pega os 3 últimos e inverte (Pior primeiro)
      textoFinal = "As 3 áreas com menor pontuação foram:\n\n";
      bottom3.forEach((item, index) => {
        textoFinal += `${index + 1}. ${item.titulo} (${Math.round(item.percentual)}%)\n`;
      });
      textoFinal += "\n--- Comente sobre como melhorar esses pontos ---";
    }

    // Injeta o texto na Textarea correta
    const area = document.querySelector(`textarea[name="${tipo}"]`);
    if (area) {
      area.value = textoFinal;
    }
  }

  // --- CÁLCULOS E RESULTADO FINAL ---

  // Soma TODOS os radios marcados na página inteira
  function calcularTotalGeral() {
    let total = 0;
    const allChecked = document.querySelectorAll('input[type="radio"]:checked');
    allChecked.forEach((radio) => {
      total += parseInt(radio.value);
    });
    return total;
  }

  // Gera a tela de resultado final baseada na pontuação
  function calcularResultadoFinal() {
    const total = calcularTotalGeral();
    const containerResultado = document.querySelector(".oitavo");
    let texto = "";

    // Lógica de feedback baseada na pontuação total
    if (total >= 120) {
      texto =
        "Você provavelmente já é um empreendedor, possui as características comuns aos empreendedores e tem tudo para se diferenciar em sua organização.";
    } else if (total >= 90) {
      texto =
        "Você possui muitas características empreendedoras e às vezes se comporta como um, porém você pode melhorar ainda mais se equilibrar os pontos ainda fracos com os pontos já fortes.";
    } else if (total >= 60) {
      texto =
        "Você ainda não é muito empreendedor e provavelmente se comporta, na maior parte do tempo, como um administrador e não um “fazedor”. Para se diferenciar e começar a praticar atitudes empreendedoras procure analisar os seus principais pontos fracos e definir estratégias pessoais para eliminá-los.";
    } else {
      texto =
        "Você não é empreendedor e se continuar a agir como age dificilmente será um. Isto não significa que você não tem qualidades, apenas que prefere seguir a ser seguido. Se seu anseio é ser reconhecido como empreendedor, reavalie sua carreira e seus objetivos pessoais, bem como suas ações para concretizar tais objetivos.";
    }

    // Injeta HTML dinamicamente na div .oitavo
    containerResultado.innerHTML = `
            <h2>Análise de desempenho</h2>
            <div id="resultado-texto">
                <span id="pontuacao-final">Sua Pontuação: ${total}</span>
                <p>${texto}</p>
            </div>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        `;

    // IMPORTANTE: Como criamos botões novos com innerHTML, precisamos
    // adicionar os eventos de clique neles novamente, pois os antigos sumiram.
    containerResultado
      .querySelector(".voltar")
      .addEventListener("click", () => {
        currentStepIndex--;
        showStep(currentStepIndex);
      });
    containerResultado
      .querySelector(".proximo")
      .addEventListener("click", () => {
        currentStepIndex++;
        showStep(currentStepIndex);
      });
  }

  // --- CÁLCULOS EM TEMPO REAL DAS TABELAS ---

  // Ouve qualquer mudança (click) em inputs do tipo radio na página
  document.body.addEventListener("change", (e) => {
    if (e.target.type === "radio") {
      updateTableCalculations(e.target); // Atualiza visual
      persistData(); // Salva no navegador
    }
  });

  // Atualiza a coluna "Nota" e o "Total" lá embaixo da tabela
  function updateTableCalculations(input) {
    // 1. Atualiza a célula "Nota" na linha
    const row = input.closest("tr");
    if (row) {
      const notaCell = row.querySelector(".nota-valor");
      if (notaCell) notaCell.textContent = input.value;
    }

    // 2. Atualiza o Total da Tabela
    const table = input.closest("table");
    if (table) {
      const totalSpan = table.querySelector(".total-tabela");
      if (totalSpan) {
        let tableTotal = 0;
        const checkedRadios = table.querySelectorAll(
          'input[type="radio"]:checked',
        );
        checkedRadios.forEach((radio) => {
          tableTotal += parseInt(radio.value);
        });
        totalSpan.textContent = tableTotal;
      }
    }
  }

  // --- PERSISTÊNCIA DE DADOS (LOCALSTORAGE) ---

  // Salva tudo o que foi digitado/marcado no navegador
  function persistData() {
    const data = {};
    const inputs = document.querySelectorAll("input, textarea");

    // Varre todos os inputs
    inputs.forEach((input) => {
      if (input.type === "radio") {
        if (input.checked) data[input.name] = input.value; // Salva só se estiver marcado
      } else {
        // Salva texto/email. Usa 'name' ou 'placeholder' como chave.
        data[input.name || input.placeholder] = input.value;
      }
    });

    // Converte objeto JS em texto JSON e salva
    localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
  }

  // Carrega os dados quando a página abre
  function loadData() {
    const dataString = localStorage.getItem(STORAGE_KEY);
    if (!dataString) return; // Se não tem nada salvo, para aqui.

    const data = JSON.parse(dataString); // Converte texto JSON de volta para Objeto
    const inputs = document.querySelectorAll("input, textarea");

    // Preenche os campos com os dados salvos
    inputs.forEach((input) => {
      const key = input.name || input.placeholder;
      if (data[key] !== undefined) {
        if (input.type === "radio") {
          // Se o valor salvo bater com o valor deste radio, marca ele
          if (input.value === data[key]) {
            input.checked = true;
            updateTableCalculations(input); // Atualiza os totais visuais
          }
        } else {
          // Se for texto, só preenche
          input.value = data[key];
        }
      }
    });
  }

  // --- INICIALIZAÇÃO ---
  loadData(); // 1. Tenta carregar dados antigos
  showStep(currentStepIndex); // 2. Mostra a primeira tela
});

const market = document.getElementById("market");
const marketDriven = document.getElementById("market-driven");

market.addEventListener("click", () => {
  // mostra
  marketDriven.classList.remove("hidden");

  // esconde após 5 segundos (5000 ms)
  setTimeout(() => {
    marketDriven.classList.add("hidden");
  }, 5000);
});

const quo = document.getElementById("quo");
const quosig = document.getElementById("quo-sig");

quo.addEventListener("click", () => {
  // mostra
  quosig.classList.remove("hidden");

  // esconde após 5 segundos (5000 ms)
  setTimeout(() => {
    quosig.classList.add("hidden");
  }, 5000);
});

const tenacidade = document.getElementById("tenacidade");
const tenacidadesig = document.getElementById("tenacidade-sig");

tenacidade.addEventListener("click", () => {
  // mostra
  tenacidadesig.classList.remove("hidden");

  // esconde após 5 segundos (5000 ms)
  setTimeout(() => {
    tenacidadesig.classList.add("hidden");
  }, 10000);
});

const finalizar = document.getElementById("finalizar");
const btnfim = document.querySelector(".salvar");

btnfim.addEventListener("click", () => {
  finalizar.classList.remove("hidden");
  setTimeout(() => {
    finalizar.classList.add("hidden");
  }, 5000);
});
