document.addEventListener("DOMContentLoaded", () => {
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
    document.querySelector(".duodecimo"), // Índice 11: Final/Salvar
  ];

  const progressIndicators = document.querySelectorAll("#container div");

  let currentStepIndex = 0;

  const STORAGE_KEY = "empreendedor_profile_v3";

  function showStep(index) {
    steps.forEach((step, i) => {
      if (step) {
        if (i === index) {
          step.classList.remove("hidden");

          if (step.classList.contains("oitavo")) {
            calcularResultadoFinal();
          }
          if (step.classList.contains("oitavo")) {
            calcularResultadoFinal();
          }
          if (step.classList.contains("nono")) {
            preencherTitulosCategorias("fortes");
          }
          if (step.classList.contains("decimo")) {
            preencherTitulosCategorias("fracos");
          }
        } else {
          step.classList.add("hidden");
        }
      }
    });
    updateProgressBar(index);

    window.scrollTo(0, 0);
  }

  function updateProgressBar(index) {
    progressIndicators.forEach((indicator, i) => {
      const stepCorrespondente = i + 1;

      indicator.classList.remove("active");
      indicator.classList.remove("completed");

      if (index > stepCorrespondente) {
        indicator.classList.add("completed");
        indicator.textContent = "✓";
      } else if (index === stepCorrespondente) {
        indicator.classList.add("active");
        indicator.textContent = i + 1;
      } else {
        indicator.textContent = i + 1;
      }
    });
  }

  function validarEtapa(index) {
    const aviso = document.getElementById("aviso");
    const currentStep = steps[index];

    if (index === 0) {
      const inputs = currentStep.querySelectorAll("input[required]");
      let valido = true;

      inputs.forEach((input) => {
        if (!input.value.trim()) {
          valido = false;
          input.style.border = "2px solid red";
        } else {
          input.style.border = "1px solid #ccc";
        }
      });

      if (!valido) {
        if (aviso)
          aviso.textContent =
            "Por favor, preencha seu nome e e-mail antes de começar.";
        setTimeout(() => {
          aviso.textContent = "";
        }, 2000);
        return false;
      }
    }

    const tabelasIndices = [1, 2, 3, 4, 5, 6];

    if (tabelasIndices.includes(index)) {
      const radios = currentStep.querySelectorAll('input[type="radio"]');
      const perguntasUnicas = new Set();
      radios.forEach((r) => perguntasUnicas.add(r.name));

      const respondidas = currentStep.querySelectorAll(
        'input[type="radio"]:checked',
      ).length;
      if (respondidas < perguntasUnicas.size) {
        const faltam = perguntasUnicas.size - respondidas;

        aviso.textContent = `Você precisa responder todas as perguntas desta etapa para prosseguir.\nFaltam ${faltam} resposta(s).`;

        setTimeout(() => {
          aviso.textContent = "";
        }, 2000);

        return false;
      }
    }

    return true;
  }

  document.querySelectorAll(".proximo").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      if (btn.hasAttribute("onclick")) return;

      e.preventDefault();

      if (validarEtapa(currentStepIndex)) {
        if (currentStepIndex < steps.length - 1) {
          currentStepIndex++;
          showStep(currentStepIndex);
          persistData();
        }
      }
    });
  });

  document.querySelectorAll(".voltar").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      e.preventDefault();
      if (currentStepIndex > 0) {
        currentStepIndex--;
        showStep(currentStepIndex);
      }
    });
  });
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

  function preencherTitulosCategorias(tipo) {
    const categoriasMap = [
      { selector: ".segundo", titulo: "Comprometimento e determinação" },
      { selector: ".terceiro", titulo: "Obsessão pelas oportunidades" },
      { selector: ".quarto", titulo: "Tolerância ao risco" },
      { selector: ".quinto", titulo: "Criatividade e auto-confiança" },
      { selector: ".sexto", titulo: "Motivação e superação" },
      { selector: ".setimo", titulo: "Liderança" },
    ];

    let resultados = [];

    categoriasMap.forEach((cat) => {
      const div = document.querySelector(cat.selector);
      if (!div) return;
      const checkedRadios = div.querySelectorAll('input[type="radio"]:checked');
      let somaPontos = 0;
      checkedRadios.forEach((r) => (somaPontos += parseInt(r.value)));

      const todosRadios = div.querySelectorAll('input[type="radio"]');
      const nomesUnicos = new Set();
      todosRadios.forEach((r) => nomesUnicos.add(r.name));
      const qtdPerguntas = nomesUnicos.size;
      const maximo = qtdPerguntas * 5;
      const percentual = maximo > 0 ? (somaPontos / maximo) * 100 : 0;

      resultados.push({
        titulo: cat.titulo,
        percentual: percentual,
      });
    });

    resultados.sort((a, b) => b.percentual - a.percentual);

    let textoFinal = "";
    if (tipo === "fortes") {
      const top3 = resultados.slice(0, 3);
      textoFinal = "As 3 áreas com maior pontuação foram:\n\n";
      top3.forEach((item, index) => {
        textoFinal += `${index + 1}. ${item.titulo} (${Math.round(item.percentual)}%)\n`;
      });
      textoFinal += "\n--- Comente sobre como você usa esses pontos fortes ---";
    } else if (tipo === "fracos") {
      const bottom3 = resultados.slice(-3).reverse();
      textoFinal = "As 3 áreas com menor pontuação foram:\n\n";
      bottom3.forEach((item, index) => {
        textoFinal += `${index + 1}. ${item.titulo} (${Math.round(item.percentual)}%)\n`;
      });
      textoFinal += "\n--- Comente sobre como melhorar esses pontos ---";
    }

    const area = document.querySelector(`textarea[name="${tipo}"]`);
    if (area) {
      area.value = textoFinal;
    }
  }

  function calcularTotalGeral() {
    let total = 0;
    const allChecked = document.querySelectorAll('input[type="radio"]:checked');
    allChecked.forEach((radio) => {
      total += parseInt(radio.value);
    });
    return total;
  }

  function calcularResultadoFinal() {
    const total = calcularTotalGeral();
    const containerResultado = document.querySelector(".oitavo");
    let texto = "";
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

  document.body.addEventListener("change", (e) => {
    if (e.target.type === "radio") {
      updateTableCalculations(e.target);
      persistData();
    }
  });

  function updateTableCalculations(input) {
    const row = input.closest("tr");
    if (row) {
      const notaCell = row.querySelector(".nota-valor");
      if (notaCell) notaCell.textContent = input.value;
    }

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

  function persistData() {
    const data = {};
    const inputs = document.querySelectorAll("input, textarea");

    inputs.forEach((input) => {
      if (input.type === "radio") {
        if (input.checked) data[input.name] = input.value;
      } else {
        data[input.name || input.placeholder] = input.value;
      }
    });
    localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
  }

  function loadData() {
    const dataString = localStorage.getItem(STORAGE_KEY);
    if (!dataString) return;

    const data = JSON.parse(dataString);
    const inputs = document.querySelectorAll("input, textarea");

    inputs.forEach((input) => {
      const key = input.name || input.placeholder;
      if (data[key] !== undefined) {
        if (input.type === "radio") {
          if (input.value === data[key]) {
            input.checked = true;
            updateTableCalculations(input);
          }
        } else {
          input.value = data[key];
        }
      }
    });
  }

  loadData();
  showStep(currentStepIndex);
});

const market = document.getElementById("market");
const marketDriven = document.getElementById("market-driven");

market.addEventListener("click", () => {
  marketDriven.classList.remove("hidden");

  setTimeout(() => {
    marketDriven.classList.add("hidden");
  }, 5000);
});

const quo = document.getElementById("quo");
const quosig = document.getElementById("quo-sig");

quo.addEventListener("click", () => {
  quosig.classList.remove("hidden");

  setTimeout(() => {
    quosig.classList.add("hidden");
  }, 5000);
});

const tenacidade = document.getElementById("tenacidade");
const tenacidadesig = document.getElementById("tenacidade-sig");

tenacidade.addEventListener("click", () => {
  tenacidadesig.classList.remove("hidden");

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
