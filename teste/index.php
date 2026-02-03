<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
    <title>Document</title>
</head>

<body>
    <h1>Auto-avaliação de seu perfil empreendedor</h1>

    <p id="aviso"></p>

    <div id="container">
        <div>1</div>
        <div>2</div>
        <div>3</div>
        <div>4</div>
        <div>5</div>
        <div>6</div>
        <div>7</div>
        <div>8</div>
        <div>9</div>
        <div>10</div>
    </div>

    <div>

        <div class="primeiro">
            <form action="#">
                <label>
                    <input type="text" placeholder="Nome completo" required>
                </label>
                <label>
                    <input type="text" placeholder="Email" required>
                </label>
            </form>

            <p>
                1) Atribua à sua pessoa uma nota de 1 a 5 para cada uma das características a seguir e escreva a nota na
                última coluna.
            </p>
            <p>
                2) Some as notas obtidas para todas as características.
            </p>
            <p>
                3) Analise seu resultado global com base nas explicações ao final.
            </p>
            <p>
                4) Destaque seus principais pontos fortes e pontos fracos.
            </p>
            <p>
                5) Quais dos pontos fortes destacados são mais importantes para o desempenho de suas atribuições atuais
                no seu trabalho?
            </p>
            <p>
                6) Quais dos pontos fracos destacados deveriam ser trabalhados para que o seu desempenho no trabalho
                seja melhorado?
            </p>

            <h2>É possível melhorá-los?</h2>

            <button class="proximo">Proximo</button>

        </div>

        <div class="hidden segundo">
            <h2>Comprometimento e determinação</h2>
            <table>
                <?php include 'tabela.php'; ?>
                <tr>
                    <td>1. Proatividade na tomada de decisão</td>
                    <td><input type="radio" name="1" value='5'></td>
                    <td><input type="radio" name="1" value='4'></td>
                    <td><input type="radio" name="1" value='3'></td>
                    <td><input type="radio" name="1" value='2'></td>
                    <td><input type="radio" name="1" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>2. <span id="tenacidade">Tenacidade, obstinação</span></td>
                    <td><input type="radio" name="2" value='5'></td>
                    <td><input type="radio" name="2" value='4'></td>
                    <td><input type="radio" name="2" value='3'></td>
                    <td><input type="radio" name="2" value='2'></td>
                    <td><input type="radio" name="2" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>3. Disciplina, dedicação</td>
                    <td><input type="radio" name="3" value='5'></td>
                    <td><input type="radio" name="3" value='4'></td>
                    <td><input type="radio" name="3" value='3'></td>
                    <td><input type="radio" name="3" value='2'></td>
                    <td><input type="radio" name="3" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>4. Persistência em resolver problemas</td>
                    <td><input type="radio" name="4" value='5'></td>
                    <td><input type="radio" name="4" value='4'></td>
                    <td><input type="radio" name="4" value='3'></td>
                    <td><input type="radio" name="4" value='2'></td>
                    <td><input type="radio" name="4" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>5. Disposição ao sacrifício para atingir metas</td>
                    <td><input type="radio" name="5" value='5'></td>
                    <td><input type="radio" name="5" value='4'></td>
                    <td><input type="radio" name="5" value='3'></td>
                    <td><input type="radio" name="5" value='2'></td>
                    <td><input type="radio" name="5" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>6. Imersão total nas atividades que desenvolve</td>
                    <td><input type="radio" name="6" value='5'></td>
                    <td><input type="radio" name="6" value='4'></td>
                    <td><input type="radio" name="6" value='3'></td>
                    <td><input type="radio" name="6" value='2'></td>
                    <td><input type="radio" name="6" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr class="total-row">
                    <td colspan="6" style="text-align: right;">Total:</td>
                    <td><span class="total-tabela">0</span></td>
                </tr>
            </table>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        </div>

        <div class="hidden terceiro">
            <h2>Obsessão pelas oportunidades</h2>
            <table>
                <?php include 'tabela.php'; ?>
                <tr>
                    <td>7. Procura ter conhecimento profundo das necessidades dos clientes</td>
                    <td><input type="radio" name="7" value='5'></td>
                    <td><input type="radio" name="7" value='4'></td>
                    <td><input type="radio" name="7" value='3'></td>
                    <td><input type="radio" name="7" value='2'></td>
                    <td><input type="radio" name="7" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>8. É dirigido pelo mercado <span id="market">(market driven)</span> </td>
                    <td><input type="radio" name="8" value='5'></td>
                    <td><input type="radio" name="8" value='4'></td>
                    <td><input type="radio" name="8" value='3'></td>
                    <td><input type="radio" name="8" value='2'></td>
                    <td><input type="radio" name="8" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>9. Obsessão em criar valor e satisfazer os clientes</td>
                    <td><input type="radio" name="9" value='5'></td>
                    <td><input type="radio" name="9" value='4'></td>
                    <td><input type="radio" name="9" value='3'></td>
                    <td><input type="radio" name="9" value='2'></td>
                    <td><input type="radio" name="9" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr class="total-row">
                    <td colspan="6" style="text-align: right;">Total:</td>
                    <td><span class="total-tabela">0</span></td>
                </tr>
            </table>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        </div>

        <div class="hidden quarto">
            <h2>Tolerância ao risco, ambigüidade e incertezas</h2>
            <table>
                <?php include 'tabela.php'; ?>
                <tr>
                    <td>10. Toma riscos calculados</td>
                    <td><input type="radio" name="10" value='5'></td>
                    <td><input type="radio" name="10" value='4'></td>
                    <td><input type="radio" name="10" value='3'></td>
                    <td><input type="radio" name="10" value='2'></td>
                    <td><input type="radio" name="10" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>11. Procura minimizar os riscos</td>
                    <td><input type="radio" name="11" value='5'></td>
                    <td><input type="radio" name="11" value='4'></td>
                    <td><input type="radio" name="11" value='3'></td>
                    <td><input type="radio" name="11" value='2'></td>
                    <td><input type="radio" name="11" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>12. Tolerância às incertezas</td>
                    <td><input type="radio" name="12" value='5'></td>
                    <td><input type="radio" name="12" value='4'></td>
                    <td><input type="radio" name="12" value='3'></td>
                    <td><input type="radio" name="12" value='2'></td>
                    <td><input type="radio" name="12" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>13. Tolerância ao stress e conflitos</td>
                    <td><input type="radio" name="13" value='5'></td>
                    <td><input type="radio" name="13" value='4'></td>
                    <td><input type="radio" name="13" value='3'></td>
                    <td><input type="radio" name="13" value='2'></td>
                    <td><input type="radio" name="13" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>14. Hábil em resolver problemas</td>
                    <td><input type="radio" name="14" value='5'></td>
                    <td><input type="radio" name="14" value='4'></td>
                    <td><input type="radio" name="14" value='3'></td>
                    <td><input type="radio" name="14" value='2'></td>
                    <td><input type="radio" name="14" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr class="total-row">
                    <td colspan="6" style="text-align: right;">Total:</td>
                    <td><span class="total-tabela">0</span></td>
                </tr>
            </table>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        </div>

        <div class="hidden quinto">
            <h2>Criatividade, auto-confiança e adaptação</h2>
            <table>
                <?php include 'tabela.php'; ?>
                <tr>
                    <td>15. Não convencional, cabeça aberta</td>
                    <td><input type="radio" name="15" value='5'></td>
                    <td><input type="radio" name="15" value='4'></td>
                    <td><input type="radio" name="15" value='3'></td>
                    <td><input type="radio" name="15" value='2'></td>
                    <td><input type="radio" name="15" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>16. Não se conforma com o status <span id="quo">quo</span></td>
                    <td><input type="radio" name="16" value='5'></td>
                    <td><input type="radio" name="16" value='4'></td>
                    <td><input type="radio" name="16" value='3'></td>
                    <td><input type="radio" name="16" value='2'></td>
                    <td><input type="radio" name="16" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>17. Hábil em adaptar a novas situações</td>
                    <td><input type="radio" name="17" value='5'></td>
                    <td><input type="radio" name="17" value='4'></td>
                    <td><input type="radio" name="17" value='3'></td>
                    <td><input type="radio" name="17" value='2'></td>
                    <td><input type="radio" name="17" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>18. Não tem medo de falhar</td>
                    <td><input type="radio" name="18" value='5'></td>
                    <td><input type="radio" name="18" value='4'></td>
                    <td><input type="radio" name="18" value='3'></td>
                    <td><input type="radio" name="18" value='2'></td>
                    <td><input type="radio" name="18" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>19. Hábil em definir conceitos</td>
                    <td><input type="radio" name="19" value='5'></td>
                    <td><input type="radio" name="19" value='4'></td>
                    <td><input type="radio" name="19" value='3'></td>
                    <td><input type="radio" name="19" value='2'></td>
                    <td><input type="radio" name="19" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr class="total-row">
                    <td colspan="6" style="text-align: right;">Total:</td>
                    <td><span class="total-tabela">0</span></td>
                </tr>
            </table>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        </div>

        <div class="hidden sexto">
            <h2>Motivação e superação</h2>
            <table>
                <?php include 'tabela.php'; ?>
                <tr>
                    <td>20. Orientação a metas e resultados</td>
                    <td><input type="radio" name="20" value='5'></td>
                    <td><input type="radio" name="20" value='4'></td>
                    <td><input type="radio" name="20" value='3'></td>
                    <td><input type="radio" name="20" value='2'></td>
                    <td><input type="radio" name="20" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>21. Necessidade de crescer</td>
                    <td><input type="radio" name="21" value='5'></td>
                    <td><input type="radio" name="21" value='4'></td>
                    <td><input type="radio" name="21" value='3'></td>
                    <td><input type="radio" name="21" value='2'></td>
                    <td><input type="radio" name="21" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>22. Não se preocupa com status e poder</td>
                    <td><input type="radio" name="22" value='5'></td>
                    <td><input type="radio" name="22" value='4'></td>
                    <td><input type="radio" name="22" value='3'></td>
                    <td><input type="radio" name="22" value='2'></td>
                    <td><input type="radio" name="22" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>23. Autoconfiança</td>
                    <td><input type="radio" name="23" value='5'></td>
                    <td><input type="radio" name="23" value='4'></td>
                    <td><input type="radio" name="23" value='3'></td>
                    <td><input type="radio" name="23" value='2'></td>
                    <td><input type="radio" name="23" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>24. Ciente de suas fraquezas e forças</td>
                    <td><input type="radio" name="24" value='5'></td>
                    <td><input type="radio" name="24" value='4'></td>
                    <td><input type="radio" name="24" value='3'></td>
                    <td><input type="radio" name="24" value='2'></td>
                    <td><input type="radio" name="24" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>25. Tem senso de humor</td>
                    <td><input type="radio" name="25" value='5'></td>
                    <td><input type="radio" name="25" value='4'></td>
                    <td><input type="radio" name="25" value='3'></td>
                    <td><input type="radio" name="25" value='2'></td>
                    <td><input type="radio" name="25" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr class="total-row">
                    <td colspan="6" style="text-align: right;">Total:</td>
                    <td><span class="total-tabela">0</span></td>
                </tr>
            </table>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        </div>

        <div class="hidden setimo">
            <h2>Liderança</h2>
            <table>
                <?php include 'tabela.php'; ?>
                <tr>
                    <td>26. Tem iniciativa</td>
                    <td><input type="radio" name="26" value='5'></td>
                    <td><input type="radio" name="26" value='4'></td>
                    <td><input type="radio" name="26" value='3'></td>
                    <td><input type="radio" name="26" value='2'></td>
                    <td><input type="radio" name="26" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>27. Poder de autocontrole</td>
                    <td><input type="radio" name="27" value='5'></td>
                    <td><input type="radio" name="27" value='4'></td>
                    <td><input type="radio" name="27" value='3'></td>
                    <td><input type="radio" name="27" value='2'></td>
                    <td><input type="radio" name="27" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>28. Integridade e confiabilidade</td>
                    <td><input type="radio" name="28" value='5'></td>
                    <td><input type="radio" name="28" value='4'></td>
                    <td><input type="radio" name="28" value='3'></td>
                    <td><input type="radio" name="28" value='2'></td>
                    <td><input type="radio" name="28" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>29. É paciente e sabe ouvir</td>
                    <td><input type="radio" name="29" value='5'></td>
                    <td><input type="radio" name="29" value='4'></td>
                    <td><input type="radio" name="29" value='3'></td>
                    <td><input type="radio" name="29" value='2'></td>
                    <td><input type="radio" name="29" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr>
                    <td>30. Sabe construir times</td>
                    <td><input type="radio" name="30" value='5'></td>
                    <td><input type="radio" name="30" value='4'></td>
                    <td><input type="radio" name="30" value='3'></td>
                    <td><input type="radio" name="30" value='2'></td>
                    <td><input type="radio" name="30" value='1'></td>
                    <td class="nota-valor">0</td>
                </tr>
                <tr class="total-row">
                    <td colspan="6" style="text-align: right;">Total:</td>
                    <td><span class="total-tabela">0</span></td>
                </tr>
            </table>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        </div>

        <div class="hidden oitavo">
        </div>

        <div class="hidden nono">
            <h2>Principais pontos fortes</h2>
            <textarea name="fortes" cols="30" rows="10"></textarea>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        </div>

        <div class="hidden decimo">
            <h2>Principais pontos fracos</h2>
            <textarea name="fracos" cols="30" rows="10"></textarea>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        </div>

        <div class="hidden undecimo">
            <h2>Definição de estratégia a seguir</h2>
            <textarea name="estrategia" cols="30" rows="10"></textarea>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo">Próximo</button>
            </div>
        </div>

        <div class="hidden duodecimo">
            <h2>Resultados desejados e prazo:</h2>
            <textarea name="resultados" cols="30" rows="10"></textarea>
            <div class="botoes-nav">
                <button class="voltar">Voltar</button>
                <button class="proximo salvar">Salvar</button>
            </div>
        </div>

    </div>

    <div id="market-driven" class="hidden clicado">
        <p>Market-driven significa orientado pelo mercado — ou seja, decisões são tomadas com base nas necessidades,
            preferências e comportamento dos clientes, e não apenas em ideias internas ou tradição.</p>
    </div>

    <div id="quo-sig" class="hidden clicado">
        <p>Não se conformar com o status quo é não aceitar a situação atual como definitiva, buscando mudanças,
            melhorias e novas soluções em vez de manter tudo como está.</p>
    </div>

    <div id="tenacidade-sig" class="hidden clicado">
        <p>Tenacidade
            É a capacidade de persistir, de continuar firme mesmo diante de dificuldades, cansaço ou obstáculos. Envolve
            resistência, constância e força de vontade ao longo do tempo.</p>
        <p>Obstinação
            É a insistência firme em uma ideia, objetivo ou comportamento, muitas vezes sem ceder ou mudar de opinião.
        </p>
    </div>

    <div id="finalizar" class="hidden clicado">

        <p>Dados salvos com sucesso!</p>

    </div>
</body>

</html>