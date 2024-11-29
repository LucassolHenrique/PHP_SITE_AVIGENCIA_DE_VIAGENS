<?php
// Inclui o header
include '../Includ/header.php';
$title = "Criação de conta";
?>

<section id="sobre">
  <h1>SOBRE A AGÊNCIA</h1>
  <p>A mais de 20 anos a agência de viagens é lider em transportar pessoas e realizar sonhos por todo Brasil</p>
</section>
<section class="ofertas" id="ofertas">
  <div class="limitar-secao">
    <div class="inicio-ofertas ">
      <h1>Ofertas</h1>
      <p>Com até <span>50%</span> de desconto</p>
    </div>

    <div class="primeira-secao">
      <div class="imagem-rj">
        <figure><img src="../imagens/rio.jpg" alt=""></figure>
        <figcaption>Rio de Janeiro</figcaption>
      </div>

      <div class="imagens-cidades">
        <div class="cidades">
          <div>
            <figure><img src="../imagens/manaus.jpg" alt=""></figure>
            <figcaption>Manaus</figcaption>
          </div>
          <div>
            <figure><img src="../imagens/niteroi.jpg" alt=""></figure>
            <figcaption>Rio de janeiro</figcaption>
          </div>
        </div>
        <div class="cidades">
          <div>
            <figure><img src="../imagens/saopaulo.jpg" alt=""></figure>
            <figcaption>São Paulo</figcaption>
          </div>

          <div>
            <figure><img src="../imagens/maranhao.jpg" alt=""></figure>
            <figcaption>Maranhão</figcaption>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<section class="secao-explore">
  <div class="limitar-secao">
    <h1>Explore a natureza</h1>
    <p>Venha conosco e venha ver o melhor que a natureza tem a oferecer</p>
    <div class="primeira-secao">
      <div class="explore">
        <figure><img src="imagens/lencol.jpg" alt=""></figure>
        <div class="explore-conteudo">
          <h3>Lençois Maranhenses</h3>
          <p class="descricao">Ida e volta a partir de R$79</p>
        </div>
      </div>
      <div class="explore">
        <figure><img src="imagens/goias.jpg" alt=""></figure>
        <div class="explore-conteudo">
          <h3>Cachoeira Santa Bárbara</h3>
          <p>ida e volta por R$139</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="esperar">
  <div class="oque">
    <h1>O que esperar da agência?</h1>
    <ul>
      <li>Cuidado máximo com cumprimento de horário</li>
      <li>Atenção com o atendimento</li>
      <li>Conforto para o passageiro</li>
      <li>Satisfação garantida</li>
    </ul>
  </div>
</section>
<!-- INICIO DA TABELA -->
<section id="precos">
  <table>
    <caption>Tabela de Preços e Cidade</caption>
    <thead>
      <tr>
        <th>DE:</th>
        <th>PARA:</th>
        <th>GOIAS</th>
        <th>AMAZONAS</th>
        <th>RIO DE JANEIRO</th>
        <th>MARANHÃO</th>
        <th>SÃO PAULO</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>SÃO PAULO</td>
        <td></td>
        <td>R$259</td>
        <td>R$389</td>
        <td>R$261</td>
        <td>R$212</td>
        <td>---</td>
      </tr>
      <tr>
        <td>GOIAS</td>
        <td></td>
        <td>---</td>
        <td>R$437</td>
        <td>R$480</td>
        <td>R$319</td>
        <td>R$259</td>
      </tr>
      <tr>
        <td>AMAZONAS</td>
        <td></td>
        <td>R$437</td>
        <td>---</td>
        <td>R$543</td>
        <td>R$468</td>
        <td>R$389</td>
      </tr>
      <tr>
        <td>RIO DE JANEIRO</td>
        <td></td>
        <td>R$480</td>
        <td>R$543</td>
        <td>---</td>
        <td>R$299</td>
        <td>R$261</td>
      </tr>
      <tr>
        <td>MARANHÃO</td>
        <td></td>
        <td>R$319</td>
        <td>R$468</td>
        <td>R$299</td>
        <td>---</td>
        <td>R$212</td>
      </tr>
    </tbody>
  </table>
</section>
<!--Rodapé-->

<?php
//chama o footer
include '../Includ/footer.php';
?>