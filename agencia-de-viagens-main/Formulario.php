<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; // Usuário padrão do XAMPP
$password = ""; // Senha padrão do XAMPP
$dbname = "agencia_viagens";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $partida = $_POST['partida'];
    $chegada = $_POST['chegada'];
    $origem = $_POST['origem'];
    $destino = $_POST['destino'];
    $infantil = $_POST['infantil'];
    $preferencias = isset($_POST['preferencias']) ? implode(", ", $_POST['preferencias']) : "";

    // Inserir no banco de dados
    $sql = "INSERT INTO formularios (nome, email, celular, partida, chegada, origem, destino, infantil, preferencias)
            VALUES ('$nome', '$email', '$celular', '$partida', '$chegada', '$origem', '$destino', '$infantil', '$preferencias')";

    if ($conn->query($sql) === TRUE) {
        echo "Formulário enviado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
$conn->close();
?>

<?php
// Inclui o header
include 'Includ/header.php'; 
?>

    <main>
        <section class="formulario" id="orcamento">
            <div class="orcamento limitar-secao">
                <img src="imagens/aviao.png" alt="">
                <p>Solicite um orçamento</p>
            </div>
            <div class="dados limitar-secao">
                <div class="limitar-largura">
                    <h1>Insira seus dados</h1>
                </div>
                <form method="post" action="Formulario.php" class="limitar-largura">
                    <!-- Campo oculto para identificar o tipo de usuário -->
                    <input type="hidden" name="user_type" value="user"> <!-- Mude para "admin" se necessário -->

                    <!-- Campos do formulário -->
                    <div class="label">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input">
                        <input id="nome" type="text" name="nome" placeholder="Nome Completo" required>
                    </div>

                    <div class="label">
                        <label for="email">Email</label>
                    </div>
                    <div class="input">
                        <input id="email" type="email" name="email" placeholder="Email para contato" required>
                    </div>

                    <div class="label">
                        <label for="celular">Celular</label>
                    </div>
                    <div class="input">
                        <input id="celular" type="tel" name="celular" placeholder="(XX)XXXXX-XXXX" required>
                    </div>

                    <div class="datas">
                        <div class="container-data">
                            <div class="label">
                                <label>Data da ida</label>
                            </div>
                            <div class="input">
                                <input type="date" name="partida" min="2023-10-31" id="ida" required>
                            </div>
                        </div>
                        <div class="container-data">
                            <div class="label">
                                <label>Data da volta</label>
                            </div>
                            <div class="input">
                                <input type="date" name="chegada" id="volta">
                            </div>
                        </div>
                    </div>

                    <div class="datas">
                        <div class="container-dest">
                            <div class="label">
                                <label>Origem</label>
                            </div>
                            <div class="select">
                                <select name="origem" id="origem" required>
                                    <option selected>Partindo de</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                </select>   
                            </div>
                        </div>

                        <div class="container-dest">
                            <div class="label">
                                <label>Destino</label>
                            </div>
                            <div class="select">
                                <select name="destino" id="destino" required>
                                    <option selected>Indo para</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                </select>   
                            </div>
                        </div>
                    </div>

                    <div class="label">
                        <label for="">Quarto com cama infantil?</label>
                    </div>
                    <div class="radio-container">
                        <div class="radio">
                            <input id="sim" type="radio" name="infantil" value="sim" required>
                            <label for="sim">Sim</label>
                        </div>
                        <div class="radio">
                            <input id="nao" type="radio" name="infantil" value="nao" required>
                            <label for="nao">Não</label>
                        </div>
                    </div>

                    <div class="label">
                        <label for="hosp">Preferência de hospedagem</label>
                    </div>
                    <div class="checkbox-cointainer">
                        <div class="checkbox">
                            <input type="checkbox" name="preferencias[]" id="piscina" value="piscina">
                            <label for="piscina">Piscina</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="preferencias[]" id="wifi" value="wifi">
                            <label>Wi-Fi</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="preferencias[]" id="garagem" value="garagem">
                            <label for="garagem">Garagem</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="preferencias[]" id="suite" value="suite">
                            <label for="suite">Suíte</label>
                        </div>
                    </div>
                    <button type="submit">Solicitar orçamento</button>
                </form>
            </div>
        </section>
    </main>

<?php
//chama o footer
include 'Includ/footer.php';
?>