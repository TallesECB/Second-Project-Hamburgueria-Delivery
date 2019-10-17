<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Goblin</title>
  </head>
  <body>
    <!-- Cabeçalho -->
    <?php 
      session_start();
      $codigocli = $_SESSION['codigo'];
      $namecli = $_SESSION['user'];
    ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" id="navbarheader">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><img class="rounded-circle" src="imgs/Logo.png"></a>
            <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
              <div></div>
              <nav id="menu">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link hoverhome" onclick="homenav()" href="#"><img id="homeimg" src="imgs/home.png"><br><span id="hometexto">Home</span></a>
                  </li>
                  <li class="nav-item cardapioleft">
                    <a class="nav-link cardapiomobile hovercardapio" onclick="carregaCategoriasCardapio();cardapionav();carregaProdutos();" href="#"><span><img id="cardapioimg" src="imgs/cardapio.png"></span><br>Cardapio</a>
                  </li>
                  <li class="nav-item sobreleft">
                    <a class="nav-link sobremobile hoversobre" onclick="sobrenav()" href="#"><img id="sobreimg" src="imgs/sobre.png"><br><span id="sobretexto">Sobre</span></a>
                  </li>
                </ul>
              </nav>  
              <div>
                <form class="form-inline">
                  <input class="form-control mr-sm-1" type="search" id="busca" placeholder="Pesquisar" aria-label="Pesquisar">
                  <button class="btn my-2 my-sm-0" id="buttonestilo" type="submit" onclick="carregaCategoriasCardapio();cardapionav();carregaProdutos();"><img src="imgs/lupa.png" id="lupaimg"></button>
                </form>
                <nav class="nav flex-column" id="usuarioprincipal">
                  <form action="logout.php" method="post"> 
                    <input type="submit" class="btn btn-outline-secondary text-light" href="#" value="Sair">> <span class="text-light"><?php echo($namecli)?></span><img id="loginimg" src="imgs/login.png"></a>
                  </form>
                  <a class="nav-link carrinho" data-toggle="modal" data-target="#myModalCarrinho" href="#">Carrinho ><img id="carrinhoimg" src="imgs/carrinho.png"></a>
                </nav>
              </div>    
            </div>
          </nav>
    </header>

    <!-- Model Carrinho -->
    <div class="modal fade" id="myModalCarrinho" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-madeira" id="exampleModalLabel">Carrinho</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form1">
              Código do cliente:<input type="text" size="2" value="<?php echo($codigocli) ?>" readonly="readonly" name="clicodig">
              <div id="carrinho">
                
              </div>
            </form>
          </div>
          <div class="modal-footer bg-dark d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" id="btPedir" class="btn btn-primary" data-dismiss="modal">Fazer Pedido </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Model Login -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-madeira" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" action="login.php" method="post">
              <div class="form-group">
                <label for="username"><span class="glyphicon glyphicon-user"></span>Usuário</label>
                <input class="form-control" id="nome" name="nome" required="required" type="text" placeholder="Fulano">
              </div>
              <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-lock"></span>Senha</label>
                <input class="form-control" id="senha" name="senha" required="required" type="password" placeholder="1234">
              </div>
              <input type="submit" value="Logar"  name='envia'/>
            </form>
          </div>
          <div class="modal-footer bg-dark d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="registro()">Registrar sua Conta</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Logar em sua Conta</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Model Registro -->
    <div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-madeira" id="exampleModalLabel">Registrar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="form" action="cadastro.php" method="post">
              <div class="form-group">
                <label for="nome_cad"><span class="glyphicon glyphicon-user"></span>Usuário</label>
                <input id="nome_cad" name="nome" required="required" type="text" placeholder="Fulano da Silva" />
              </div>
              <div class="form-group">
                <label for="email_cad"><span class="glyphicon glyphicon-lock"></span>Email</label>
                <input id="email_cad" name="email" required="required" type="email" placeholder="fulano@gmail.com">
              </div>
              <div class="form-group">
                <label for="senha_cad"><span class="glyphicon glyphicon-lock"></span>Senha</label>
                <input id="senha_cad" name="senha" required="required" type="password" placeholder="1234"/>
              </div>
              <div id="relative" class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-primary" value="Cadastrar" name='envia'>
              </div>
            </form>
          </div>
          <div class="modal-footer bg-dark py-4"><br></div>
        </div>
      </div>
    </div>

    <!-- Modal de Cadastro De Produtos -->
    <div class="modal fade" id="myModalCrudProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h4 class="modal-title text-light" id="exampleModalLabel">Crud Produtos</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <h2 class="text-center text-dark pb-3 pl-1">Incluir Produto</h2>
            <form method="post" id="form1" class="text-madeira text-center">
              Codigo: <input type="text" name="procodig" id="procodig" class="bg-dark text-light" size="3" readonly="readonly"><br><br>
              Nome: <input type="text" name="pronome" id="pronome" class="bg-dark text-light"><br><br>
              Valor: <input type="text" name="propreco" id="propreco" class="bg-dark text-light"><br><br>
              Descrição: <input type="text" name="prodesc" id="prodesc" class="bg-dark text-light"><br><br>
              Imagem Url: <input type="url" name="proimg" id="proimg" class="bg-dark text-light"><br><br>
              Categoria: <select name="procateg" id="procateg" class="bg-dark text-light"></select><br>
              <div class="d-flex justify-content-around pt-2">
                <span id="lalala"></span>
                <input type="button" name="enviar" value="OK" id="btSubmit">
                <input type="button" name="salvar" value="Salvar" id="btSalvar">
                <span id="lala"></span>
              </div>  
            </form>
            <div class="pt-2" id="lista">
              
            </div>
          </div>
          <div class="modal-footer bg-dark d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ListarPedidos();">Visualizar Pedidos</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Pagina de Cardapio -->
    <section class="container-fluid cardapiosite">
      <div class="row">
        <div class="col text-center">
          <select id="selectcategorias" class="btn btn-outline-secondary mt-2" onclick="carregaProdutos();">

          </select>
        </div>
      </div>
      <div id="res" class="row py-5 px-2">
        <div class="col pb-2">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://source.unsplash.com/100x110/?burguer" alt="Imagem de capa do card">
            <div class="card-body">
              <h5 class="card-title text-center">Burguer +</h5>
              <p class="card-text text-center">Hamburgue Com Cheddar+ Batata Frita + Refri</p>
            </div>
            <div class="card-body d-flex justify-content-between">
              <a href="#" class="card-link mt-2">Valor</a>
              <button type="button" class="btn btn-outline-secondary card-link">Comprar</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Pagina Home -->
    <section class="container-fluid px-1 py-2 homesite">
      <div class="row no-gutters">
        <div class="col-sm-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="https://source.unsplash.com/1000x500/?hamburger" alt="Primeiro Slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><a class="nav-link cardapiomobile" onclick='carregaCategoriasCardapio();cardapionav();carregaProdutos();' href="#">Cardapio</a></h5>
                  <p>Escolha o combo que foi feito para você</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/1000x500/?hamburger" alt="Segundo Slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><a class="nav-link cardapiomobile" onclick='carregaCategoriasCardapio();cardapionav();carregaProdutos();' href="#">Cardapio</a></h5>
                  <p>Escolha o combo que foi feito para você</p>
                </div>              
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/1000x500/?hamburger" alt="Terceiro Slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><a class="nav-link cardapiomobile" onclick='carregaCategoriasCardapio();cardapionav();carregaProdutos();' href="#">Cardapio</a></h5>
                  <p>Escolha o combo que foi feito para você</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Próximo</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Pagina Sobre -->
    <section class="container-fluid sobresite">
        <div class="row mt-4 p-3 d-flex justify-content-around" id="titulosfooter">
          <div class="col-md-3 col-sm-12 text-light text-center">Carrosel de imagems da nossa cozinha</div>
          <div class="col-md-4 col-sm-12 text-light text-center">Informações</div>
          <div class="col-md-4 col-sm-12 text-light text-center">Informações da Empresa</div>
        </div>
        <div class="row no-gutters pt-4 pb-4 d-flex justify-content-around">
          <div class="col-md-3 col-sm-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="https://source.unsplash.com/350x500/?kitchen" alt="Primeiro Slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><a class="nav-link" href="#">-</a></h5>
                  <p>Com nossos respectivos funcionarios</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/350x500/?kitchen" alt="Segundo Slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><a class="nav-link" href="#">-</a></h5>
                  <p>Com nossos respectivos funcionarios</p>
                </div>              
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/350x500/?kitchen" alt="Terceiro Slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5><a class="nav-link" href="#">-</a></h5>
                  <p>Com nossos respectivos funcionarios</p>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="col-md-4 col-sm-12" id="informacoessobre">
            <div class="pl-2 pt-5 conteudo">  
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/location.png" style="width: 5%"> > </span> Rua Jozé Rizzolo N° 616 AP°11 
              </p>
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/whatsapp.png" style="width: 5%"> > </span> (51) 9-80401326
              </p> 
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/location.png" style="width: 5%" > > </span> Rua Jozé Rizzolo N° 616 AP°11 
              </p>
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/whatsapp.png" style="width: 5%"> > </span> 51) 9-80401326
              </p> 
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/location.png" style="width: 5%"> > </span> Rua Jozé Rizzolo N° 616 AP°11 
              </p>
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/whatsapp.png" style="width: 5%"> > </span> (51) 9-80401326
              </p> 
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/whatsapp.png" style="width: 5%"> > </span> (51) 9-80401326
              </p> 
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/location.png" style="width: 5%"> > </span> Rua Jozé Rizzolo N° 616 AP°11 
              </p>        
            </div>
          </div>
          <div class="col-md-4 col-sm-12" id="dadossobre">
            <div class="pl-2 conteudo pt-4">
              <p class="text-center text-light"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <span class="d-flex justify-content-center text-light pb-3 ml-4"><h6>Dados Da Empresa</h6></span>
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/whatsapp.png" style="width: 5%"> > </span> (51) 9-80401326
              </p> 
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/location.png" style="width: 5%"> > </span> Rua Jozé Rizzolo N° 616 AP°11 
              </p>  
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/whatsapp.png" style="width: 5%"> > </span> (51) 9-80401326
              </p> 
              <p class="pb-1 text-light text-center">
                <span class="text-primary pr-1"><img class="bg-light rounded-circle" src="imgs/location.png" style="width: 5%"> > </span> Rua Jozé Rizzolo N° 616 AP°11 
              </p>  
            </div>
          </div>
        </div>  
    </section>
    
    <!-- Rodape -->
    <footer>
      <div class="container-fluid" id="footerconteudo">
        <div class="row" id="rodape">
          <div class="col-md-1">
            
          </div>
          <div class="col-md-4 col-sm-12 pt-2">
              <span class="titulorodape text-primary" id="entreemcontato">Entre em Contato<br></span>
              <div id="contato" class="pt-3">
                  <p><img class="bg-light rounded-circle" style="width: 15%" src="imgs/whatsapp.png"> > (51) 9-80401326</p> <!-- Por icone (celular)-->
                  <p><img class="bg-light rounded-circle" style="width: 15%" src="imgs/email.png"> > Teduardo13@hotmail.com</p> <!-- Por icone (email)-->
                  <p><img class="bg-light rounded-circle"  style="width: 15%" src="imgs/instagram.png"> > TallesECB</p> <!-- Por icone (instagram) -->
                  <p><img class="bg-light rounded-circle" style="width: 15%" src="imgs/facebook.png"> > Talles Eduardo Carpes</p> <!-- Por icone (facebook) -->
              </div>
          </div>
          
          <div class="col-md-3 col-sm-12 pt-2">
              <span class="titulorodape text-primary">Informações<br></span>
              <div id="informacoes" class="pt-3">
                  <p><img class="bg-light rounded-circle" style="width: 15%" src="imgs/location.png"> > Endereço:</p>
                  <a href="#" id="comorealizarpedido"><img class="rounded-circle" style="width: 15%" src="imgs/duvida.png"> > Como realizar um pedido</a>
              </div>
          </div>

          <div class="col-md-4 col-sm-12">
             
          </div>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/nav.js"></script>
    <script src="serialize.js"></script>
		<script src="produtos.js"></script>
  </body>
</html>