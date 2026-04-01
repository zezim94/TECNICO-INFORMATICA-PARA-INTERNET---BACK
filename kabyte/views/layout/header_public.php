<?php
// Se a configuração não foi carregada no controller, carrega aqui
if (!isset($config)) {
    require_once __DIR__ . '/../../models/Configuracao.php';
    $config = Configuracao::get();
}

// LÓGICA: Verifica se estamos na página da VITRINE para exibir o carrinho
$rotaAtual = $_GET['rota'] ?? '';
$ehPaginaVitrine = ($rotaAtual == 'vitrine');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo - <?= htmlspecialchars($config['nome_loja'] ?? 'Loja') ?></title>

    <link rel="icon" href="<?= BASE_URL ?>public/uploads/logo-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/header_public.css">
    <meta name="google-site-verification" content="cewLTqSJ-DR4m_I07HHno2zznAe6nHe1H74SZIBWouQ" />

    <style>
        /* =========================================
           RESETS E TRAVAS GERAIS
           ========================================= */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            background-color:
                <?= $config['cor_fundo'] ?? '#f4f7f6' ?>;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* =========================================
           ESTRUTURA DO HEADER (100% RESPONSIVO)
           ========================================= */
        .vitrine-header {
            background-color:
                <?= $config['cor_header'] ?? '#2c3e50' ?>;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            gap: 15px;
            z-index: 1000 !important;
        }

        .header-left {
            flex: 0 0 auto;
            min-width: 0;
            display: flex;
            align-items: center;
        }

        .vitrine-logo {
            max-width: 100%;
            display: flex;
            align-items: center;
        }

        .vitrine-logo img {
            max-height: 70px;
            max-width: 100%;
            object-fit: contain;
            transition: max-height 0.3s ease;
        }

        .header-center {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-right {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 15px;
        }

        /* =========================================
           BARRA DE PESQUISA ANIMADA
           ========================================= */
        .header-search-form {
            display: flex;
            align-items: center;
            background-color: transparent;
            border-radius: 25px;
            transition: background-color 0.4s ease;
        }

        .header-search-form:hover,
        .header-search-form:focus-within {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .header-search-input {
            width: 0;
            padding: 0;
            border: none;
            background: transparent;
            color: #fff;
            outline: none;
            font-size: 0.95rem;
            transition: width 0.4s ease, padding 0.4s ease;
        }

        .header-search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .header-search-form:hover .header-search-input,
        .header-search-form:focus-within .header-search-input {
            width: 280px;
            padding: 8px 15px;
        }

        .header-search-btn {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 50%;
            transition: transform 0.3s;
        }

        .header-search-form:hover .header-search-btn {
            transform: scale(1.1);
        }

        /* =========================================
           CORREÇÃO DE CAMADAS
           ========================================= */
        .nav-overlay {
            z-index: 990 !important;
        }

        .header-nav {
            z-index: 1005 !important;
        }

        .hamburger {
            z-index: 1006 !important;
        }

        /* =========================================
           MODAL DO CARRINHO (NOVO)
           ========================================= */
        .cart-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2000;
            display: none;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .cart-modal-overlay.active {
            display: flex;
            opacity: 1;
        }

        .cart-modal-box {
            background: #fff;
            width: 90%;
            max-width: 500px;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            max-height: 85vh;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .cart-modal-overlay.active .cart-modal-box {
            transform: translateY(0);
        }

        .cart-modal-header {
            padding: 15px 20px;
            background:
                <?= $config['cor_header'] ?? '#2c3e50' ?>;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-modal-header h3 {
            margin: 0;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-close-modal {
            background: transparent;
            border: none;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .btn-close-modal:hover {
            transform: scale(1.1);
        }

        .cart-modal-body {
            padding: 20px;
            overflow-y: auto;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .cart-modal-item {
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .cart-modal-item img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            border-radius: 8px;
            border: 1px solid #eee;
            background: #fafafa;
            padding: 5px;
        }

        .cart-modal-item-info {
            flex: 1;
        }

        .cart-modal-item-info h4 {
            margin: 0 0 5px 0;
            font-size: 1rem;
            color: #333;
        }

        .cart-modal-item-price {
            font-size: 0.85rem;
            color: #666;
        }

        .cart-modal-item-price strong {
            color: #27ae60;
            font-size: 1rem;
        }

        .cart-modal-item-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cart-modal-btn-qty {
            background: #f5f5f5;
            border: 1px solid #ddd;
            color: #333;
            width: 30px;
            height: 30px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .cart-modal-btn-qty:hover {
            background: #e0e0e0;
        }

        .btn-trash {
            background: #fff0f0;
            color: #e74c3c;
            border: 1px solid #fadbd8;
            width: 35px;
            height: 35px;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 5px;
            transition: 0.2s;
        }

        .btn-trash:hover {
            background: #e74c3c;
            color: white;
        }

        .cart-modal-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            background: #f9f9f9;
        }

        .cart-modal-total {
            font-size: 1.4rem;
            font-weight: 800;
            color: #2c3e50;
            text-align: right;
            margin-bottom: 15px;
        }

        .cart-modal-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-clear-cart {
            flex: 1;
            padding: 12px;
            background: white;
            border: 2px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            color: #777;
            transition: 0.2s;
        }

        .btn-clear-cart:hover:not(:disabled) {
            border-color: #e74c3c;
            color: #e74c3c;
        }

        .btn-checkout-modal {
            flex: 2;
            padding: 12px;
            background: #27ae60;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            font-size: 1.1rem;
            transition: 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-checkout-modal:hover:not(:disabled) {
            background: #219150;
        }

        .btn-checkout-modal:disabled,
        .btn-clear-cart:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* =========================================
           MEDIA QUERIES
           ========================================= */
        @media (max-width: 850px) {
            .vitrine-header {
                padding: 10px 15px;
                gap: 10px;
            }

            .header-right {
                gap: 10px;
            }

            .vitrine-logo img {
                max-height: 50px;
            }

            .btn-header-cart {
                margin-right: 0 !important;
                padding: 8px 10px;
            }

            .header-search-form:hover .header-search-input,
            .header-search-form:focus-within .header-search-input {
                width: 140px;
            }

            .header-nav {
                background-color:
                    <?= $config['cor_header'] ?? '#2c3e50' ?>;
            }
        }

        @media (max-width: 400px) {
            .vitrine-logo img {
                max-height: 40px;
            }

            .header-search-form:hover .header-search-input,
            .header-search-form:focus-within .header-search-input {
                width: 110px;
            }

            .header-right {
                gap: 5px;
            }

            .cart-modal-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="nav-overlay" onclick="toggleMenu()"></div>

    <header class="vitrine-header">

        <div class="header-left">
            <div class="vitrine-logo">
                <?php
                $caminhoBanco = $config['logo_loja'] ?? '';
                $caminhoLimpo = explode('?', $caminhoBanco)[0];
                $caminhoFisico = __DIR__ . '/../../' . $caminhoLimpo;
                ?>

                <?php if (!empty($caminhoLimpo) && file_exists($caminhoFisico)): ?>
                    <a href="<?= BASE_URL ?>vitrine">
                        <img src="<?= BASE_URL . $caminhoBanco ?>" alt="<?= htmlspecialchars($config['nome_loja']) ?>">
                    </a>
                <?php else: ?>
                    <i class="fas fa-bicycle"></i> <span
                        style="margin-left:8px; font-size:1.2rem; color:white;"><?= htmlspecialchars($config['nome_loja']) ?></span>
                <?php endif; ?>
            </div>
        </div>

        <div class="header-center">
            <form action="index.php" method="GET" class="header-search-form">
                <input type="hidden" name="rota" value="vitrine">
                <input type="text" name="busca" class="header-search-input" placeholder="O que procura?"
                    value="<?= htmlspecialchars($_GET['busca'] ?? '') ?>">
                <button type="submit" class="header-search-btn" title="Buscar">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <div class="header-right">
            <?php if ($ehPaginaVitrine): ?>
                <button onclick="abrirModalCarrinho()" class="btn-header-cart" title="Ver Carrinho">
                    <i class="fas fa-shopping-basket"></i>
                    <span id="headerCartCount" style="margin-left: 4px;"></span>
                </button>
            <?php endif; ?>

            <button class="hamburger" onclick="toggleMenu()">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <nav class="header-nav">
                <?php if (isset($_SESSION['cliente_id'])): ?>
                    <a href="<?= BASE_URL ?>cliente/painel" class="user-link">
                        <i class="fas fa-user"></i>
                        <span>Olá, <?= htmlspecialchars(explode(' ', $_SESSION['cliente_nome'])[0]) ?></span>
                    </a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>cliente/login" class="user-link"><i class="fas fa-user-circle"></i> Login</a>
                <?php endif; ?>

                <a href="<?= BASE_URL ?>vitrine" class="btn-nav"><i class="fas fa-store"></i> Loja</a>
                <a href="<?= BASE_URL ?>sobre" class="btn-nav"><i class="fas fa-info-circle"></i> Sobre Nós</a>

                <?php if (isset($_SESSION['cliente_id'])): ?>
                    <a href="<?= BASE_URL ?>cliente/dados" class="btn-nav"><i class="fas fa-id-card"></i> Dados</a>
                    <a href="<?= BASE_URL ?>cliente/sair" class="btn-nav btn-logout"><i class="fas fa-sign-out-alt"></i>
                        Sair</a>
                <?php endif; ?>
            </nav>
        </div>

    </header>

    <div id="modalCarrinho" class="cart-modal-overlay" onclick="fecharModalCarrinho(event)">
        <div class="cart-modal-box">
            <div class="cart-modal-header">
                <h3><i class="fas fa-shopping-cart"></i> Meu Carrinho</h3>
                <button class="btn-close-modal" onclick="fecharModalCarrinho(event)">&times;</button>
            </div>

            <div class="cart-modal-body" id="cartModalBody">
            </div>

            <div class="cart-modal-footer">
                <div class="cart-modal-total">Total: R$ <span id="cartModalTotal">0,00</span></div>
                <div class="cart-modal-buttons">
                    <button class="btn-clear-cart" onclick="limparCarrinhoModal()"><i class="fas fa-trash-alt"></i>
                        Limpar Tudo</button>
                    <button class="btn-checkout-modal" onclick="irParaCheckout()"><i class="fas fa-check"></i> Ir para
                        Pagamento</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Menu Mobile
        function toggleMenu() {
            const hamburger = document.querySelector(".hamburger");
            const navMenu = document.querySelector(".header-nav");
            const overlay = document.querySelector(".nav-overlay");
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
            overlay.classList.toggle("active");
        }

        // Funções do Modal do Carrinho
        function abrirModalCarrinho() {
            renderizarModalCarrinho();
            document.getElementById('modalCarrinho').classList.add('active');
            document.body.style.overflow = 'hidden'; // Trava a rolagem do site no fundo
        }

        function fecharModalCarrinho(e) {
            // Fecha se clicar no "X" ou fora da caixa branca (no fundo escuro)
            if (!e || e.target.classList.contains('cart-modal-overlay') || e.target.classList.contains('btn-close-modal')) {
                document.getElementById('modalCarrinho').classList.remove('active');
                document.body.style.overflow = ''; // Libera a rolagem do site
            }
        }

        // Constrói o HTML do modal puxando as infos da tela da vitrine
        function renderizarModalCarrinho() {
            const body = document.getElementById('cartModalBody');
            let total = 0;
            let html = '';
            let qtdItens = 0;

            // 'carrinho' é a variável global da vitrine.php
            if (typeof carrinho !== 'undefined') {
                for (let id in carrinho) {
                    let qtd = carrinho[id];
                    if (qtd > 0) {
                        // Vasculha o HTML da vitrine para achar o card do produto e roubar o Nome, Preço e Imagem
                        const card = document.querySelector(`.card-produto[data-id="${id}"]`);

                        if (card) {
                            qtdItens++;
                            const nome = card.getAttribute('data-nome');
                            const preco = parseFloat(card.getAttribute('data-preco'));
                            const imgEl = card.querySelector('img');
                            const imagem = imgEl ? imgEl.src : '';

                            const subtotal = preco * qtd;
                            total += subtotal;

                            html += `
                                <div class="cart-modal-item">
                                    ${imagem ? `<img src="${imagem}" alt="${nome}">` : '<div style="width:70px;height:70px;background:#eee;border-radius:8px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-image fa-2x" style="color:#ccc;"></i></div>'}
                                    
                                    <div class="cart-modal-item-info">
                                        <h4>${nome}</h4>
                                        <div class="cart-modal-item-price">
                                            ${qtd}x R$ ${preco.toLocaleString('pt-BR', { minimumFractionDigits: 2 })} 
                                            <br><strong>Subtotal: R$ ${subtotal.toLocaleString('pt-BR', { minimumFractionDigits: 2 })}</strong>
                                        </div>
                                    </div>

                                    <div class="cart-modal-item-actions">
                                        <button class="cart-modal-btn-qty" onclick="alterarQtdModal(${id}, -1)">-</button>
                                        <span style="font-weight:bold; width:20px; text-align:center;">${qtd}</span>
                                        <button class="cart-modal-btn-qty" onclick="alterarQtdModal(${id}, 1)">+</button>
                                        
                                        <button class="btn-trash" onclick="removerItemCarrinho(${id})" title="Remover Produto"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            `;
                        }
                    }
                }
            }

            // Controle visual de botões vazios
            const btnCheckout = document.querySelector('.btn-checkout-modal');
            const btnClear = document.querySelector('.btn-clear-cart');

            if (qtdItens === 0) {
                html = `
                    <div style="text-align:center; padding: 40px 20px; color:#999;">
                        <i class="fas fa-shopping-cart fa-4x" style="margin-bottom:15px; color:#ddd;"></i>
                        <h3 style="color: #555; margin-bottom: 5px;">Carrinho Vazio</h3>
                        <p>Volte à loja e adicione produtos.</p>
                    </div>`;
                btnCheckout.disabled = true;
                btnClear.disabled = true;
            } else {
                btnCheckout.disabled = false;
                btnClear.disabled = false;
            }

            body.innerHTML = html;
            document.getElementById('cartModalTotal').innerText = total.toLocaleString('pt-BR', {
                minimumFractionDigits: 2
            });
        }

        // Atalho: Altera a quantidade e já redesenha o modal na hora
        function alterarQtdModal(id, delta) {
            if (typeof alterarQtd === 'function') {
                alterarQtd(id, delta); // Chama a função que já existe na sua vitrine.php
                renderizarModalCarrinho();
            }
        }

        // Função de lixeirinha individual
        function removerItemCarrinho(id) {
            if (typeof carrinho !== 'undefined') {
                delete carrinho[id]; // Apaga do objeto

                // 1. Zera o contador visual na grade normal da vitrine (ou página de detalhes)
                const elVitrine = document.getElementById('qtd-' + id);
                if (elVitrine) elVitrine.innerText = '0';

                // 2. Zera o contador visual se o produto também estiver no Carrossel de Ofertas
                const elCarrossel = document.getElementById('qtd-car-' + id);
                if (elCarrossel) elCarrossel.innerText = '0';

                // Salva e atualiza
                localStorage.setItem('meu_carrinho_pdv', JSON.stringify(carrinho));

                if (typeof atualizarBarraInferior === 'function') {
                    atualizarBarraInferior();
                }

                renderizarModalCarrinho(); // Recarrega o modal instantaneamente
            }
        }

        // Esvazia o carrinho de uma vez
        function limparCarrinhoModal() {
            if (confirm('Tem certeza que deseja esvaziar todo o carrinho?')) {
                if (typeof carrinho !== 'undefined') {
                    // Limpa o objeto JS e o LocalStorage
                    for (let prop in carrinho) {
                        delete carrinho[prop];
                    }
                    localStorage.removeItem('meu_carrinho_pdv');

                    // Zera todos os números verdes das bolinhas da vitrine
                    document.querySelectorAll('.qty-display').forEach(el => el.innerText = '0');
                    document.querySelectorAll('.detalhe-qty-display').forEach(el => el.innerText = '0');

                    if (typeof atualizarBarraInferior === 'function') atualizarBarraInferior();
                    fecharModalCarrinho();
                }
            }
        }
    </script>

</body>

</html>