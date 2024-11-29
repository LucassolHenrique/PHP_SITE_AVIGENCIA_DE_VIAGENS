<?php
// Inclui o header
include '../Includ/header.php';
$title = "Criação de conta";
?>



<main>
    <section class="formulario" id="orcamento">
        <div class="orcamento limitar-secao">
            <img src="../imagens/aviao.png" alt="">
            <p>criação de conta</p>
        </div>
        <div class="dados limitar-secao">
            <div class="limitar-largura">
                <h1>Insira seus dados</h1>
            </div>
            <form action="../Includ/processa_form.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required><br><br>

                <label for="user_type">Tipo de Usuário:</label>
                <select id="user_type" name="user_type">
                    <option value="admin">Admin</option>
                    <option value="user" selected>Usuário</option>
                </select><br><br>

                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </section>
</main>
</html>

<?php
//chama o footer
include '../Includ/footer.php';
?>