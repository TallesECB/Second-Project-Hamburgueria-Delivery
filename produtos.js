let bt = document.getElementById('btSubmit');
bt.className = "btn btn-outline-secondary mt-2";
let btSalvar =  document.getElementById('btSalvar');
btSalvar.className = "btn btn-outline-secondary mt-2";
btSalvar.style.display = 'none';

let btCliente = document.getElementById('btRegistrarCliente');

let btlala = document.getElementById('lala')
btlala.style.display = 'none';
let btlalala = document.getElementById('lalala')
btlalala.style.display = 'none';

let form = document.getElementById('form1');
let mensagem = document.getElementById('dvProdutos');
let xhr = new XMLHttpRequest();

//////////////////////////
//inclusao
//////////////////////////
bt.addEventListener('click',function(e){

    let dados = serialize(form);
    xhr.open('POST', 'inclui.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=utf-8');
    xhr.send(encodeURI(dados));

    xhr.onreadystatechange = function() {
      if(xhr.readyState === 4) {
        
        if(xhr.status === 200) { 
        
        if (xhr.responseText != '0'){
            alert('erro SQL' + xhr.responseText);
        }
        carregaProdutos();
        } else {
            alert('Erro na requisição: ' +  xhr.status + ' ' + xhr.statusText);
        } 
      }
    }
});

//////////////////////////
//// Listagem
//////////////////////////
function cardapioProdutos(dados,idDiv) {
  
  let divrow = document.getElementById(idDiv);
  let busca = document.getElementById('busca');
  let buscalength = busca.value;

  objJSON = JSON.parse(dados);
  divrow.innerHTML = '';
  
  let cardapioselect = document.getElementById('selectcategorias');
  
  for (let i in objJSON) {
    if(buscalength.length > 0) {
      if(busca.value == `${decodeURI(objJSON[i].pronome)}` || busca.value == `${decodeURI(objJSON[i].prodesc)}` || busca.value == `${decodeURI(objJSON[i].provalue)}`) {
        $(divrow).append (`
          <div class="col pb-2">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="https://i.pinimg.com/${decodeURI(objJSON[i].proimg)}" alt="Imagem de capa do card">
              <div class="card-body">
                <h5 class="card-title text-center">${decodeURI(objJSON[i].pronome)}</h5>
                <p class="card-text text-center">${decodeURI(objJSON[i].prodesc)}</p>
              </div>
              <div class="card-body d-flex justify-content-between">
                <a href="#" class="card-link mt-2">Valor:${decodeURI(objJSON[i].propreco)}</a>
                <button type="button" class="btn btn-outline-secondary card-link">Comprar</button>
              </div>
            </div>
          </div>  
        `)
        let btAdiciona = criaElemento("button",{"class":"btAdic","data-codigo":objJSON[i].procodig,"data-nome":objJSON[i].pronome},"+");
        //adiciona elemento no carrinho
        btAdiciona.addEventListener('click',function(e){
            //pega referencia ao botao adicionar que foi pressionado
            let bt = e.target;
            //cria um objeto com os dados
            let objeto = {codigo: bt.dataset.codigo, nome: bt.dataset.nome};
            adicionaNoCarrinho(objeto,'carrinho');
        });
        //cria o botao excluir de cada elemento da lista
        divrow.appendChild(btAdiciona);
      }
    } else {
      if (cardapioselect.value == `${decodeURI(objJSON[i].catcodig)}`) {
        $(divrow).append (`
          <div class="col pb-2">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="https://i.pinimg.com/${decodeURI(objJSON[i].proimg)}" alt="Imagem de capa do card">
              <div class="card-body">
                <h5 class="card-title text-center">${decodeURI(objJSON[i].pronome)}</h5>
                <p class="card-text text-center">${decodeURI(objJSON[i].prodesc)}</p>
              </div>
              <div class="card-body d-flex justify-content-between">
                <a href="#" class="card-link mt-2">Valor:${decodeURI(objJSON[i].propreco)}</a>
                <button type="button" class="btn btn-outline-secondary card-link">Comprar</button>
              </div>
            </div>
          </div>  
        `)
        let btAdiciona = criaElemento("button",{"class":"btAdic","data-codigo":objJSON[i].procodig,"data-nome":objJSON[i].pronome},"+");
        //adiciona elemento no carrinho
        btAdiciona.addEventListener('click',function(e){
            //pega referencia ao botao adicionar que foi pressionado
            let bt = e.target;
            //cria um objeto com os dados
            let objeto = {codigo: bt.dataset.codigo, nome: bt.dataset.nome};
            adicionaNoCarrinho(objeto,'carrinho');
        });
        //cria o botao excluir de cada elemento da lista
        divrow.appendChild(btAdiciona);
      }  else if (cardapioselect.value == 0) {
        $(divrow).append (`
          <div class="col pb-2">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="https://i.pinimg.com/${decodeURI(objJSON[i].proimg)}" alt="Imagem de capa do card">
              <div class="card-body">
                <h5 class="card-title text-center">${decodeURI(objJSON[i].pronome)}</h5>
                <p class="card-text text-center">${decodeURI(objJSON[i].prodesc)}</p>
              </div>
              <div class="card-body d-flex justify-content-between">
                <a href="#" class="card-link mt-2">Valor:${decodeURI(objJSON[i].propreco)}</a>
                <button type="button" style="width: 50%;" class="btn btn-outline-secondary card-link">Comprar > <img src="imgs/comprar.png" class="mb-1" style="width:15%;"></button>
              </div>
            </div>
          </div>  
        `)
        let btAdiciona = criaElemento("button",{"class":"btAdic","data-codigo":objJSON[i].procodig,"data-nome":objJSON[i].pronome},"+");
        //adiciona elemento no carrinho
        btAdiciona.addEventListener('click',function(e){
            //pega referencia ao botao adicionar que foi pressionado
            let bt = e.target;
            //cria um objeto com os dados
            let objeto = {codigo: bt.dataset.codigo, nome: bt.dataset.nome};
            adicionaNoCarrinho(objeto,'carrinho');
        });
        //cria o botao excluir de cada elemento da lista
        divrow.appendChild(btAdiciona);
      } 
    }  
  }
  busca.value = '';
  buscalength = busca;
}

//////////////////////////
//Listagem Admin
//////////////////////////
function montaLista(dados,idDestino){

  let lt = document.getElementById(idDestino);
  lt.innerHTML = '';

  objJSON = JSON.parse(dados);

  for (let i in objJSON){
    let divcol = document.createElement("div");
    divcol.className = 'dvLinha col pb-2 pt-2 d-flex justify-content-center';
    
      let divcard = document.createElement("div")
        divcard.className = 'card';
        divcard.style = 'width: 18rem';
        
        let  divcardbody = document.createElement("div")
          divcardbody.className = 'card-body';
          $(divcardbody).append (`
            <h5 class="card-title text-center text-madeira">Nome > <span class="text-dark">${decodeURI(objJSON[i].pronome)}</span></h5>
            <p class="card-text text-center text-madeira">Descrição > <span class="text-dark">${decodeURI(objJSON[i].prodesc)}</span></p>
            <p class="card-text text-center text-madeira">Categoria > <span class="text-dark">${decodeURI(objJSON[i].catdescr)}</span></p>
            <p class="card-text text-center text-madeira">URL > https://i.pinimg.com/ Complete URL MySql > <span class="text-dark">${decodeURI(objJSON[i].proimg)}</span></p>
          `)

        let divvalorbody = document.createElement("div")
          divvalorbody.className = 'card-body d-flex justify-content-center';
          $(divvalorbody).append (`
            <a href="#" class="mt-2 text-madeira">Valor > <span class="text-dark">${decodeURI(objJSON[i].propreco)}$</span</a>
          `)
      
        let divbuttons = document.createElement('div')
          divbuttons.className = 'card-body d-flex justify-content-between';

          let botaoExclui = document.createElement("button");
            botaoExclui.className = 'excluir btn btn-outline-secondary';
            botaoExclui.innerText = 'Excluir';
            botaoExclui.id= objJSON[i].procodig;
            
            botaoExclui.addEventListener('click',function(e){
              excluiProduto(e.target.id);  
            });
          
          let botaoAltera = document.createElement("button");
            botaoAltera.className = 'alterar btn btn-outline-secondary';
            botaoAltera.innerText = 'Alterar';
            botaoAltera.id= objJSON[i].procodig;
            
            botaoAltera.addEventListener('click',function(e){
              carregaProduto(e.target.id);
              btSalvar.style.display = 'block';
              btlala.style.display = 'block';
              btlalala.style.display = 'block';
            });
   
    divbuttons.appendChild(botaoAltera)
    divbuttons.appendChild(botaoExclui)
    divcard.appendChild(divcardbody)
    divcard.appendChild(divvalorbody)
    divcard.appendChild(divbuttons)
    divcol.appendChild(divcard)
    lt.appendChild(divcol);
  }
}
  
function carregaProdutos(){
  let request = new XMLHttpRequest();
  request.open('get', 'consulta.php');
  request.send();
  
  request.onreadystatechange = function() {
    
    if(request.readyState === 4) {
      
      if(request.status === 200) { 
      
        cardapioProdutos(request.responseText,'res');

      } else {
        alert('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
    }
  }
}

function carregaProdutosAdmin(){
  let request = new XMLHttpRequest();
  request.open('get', 'consulta.php');
  request.send();
  
  request.onreadystatechange = function() {
    
    if(request.readyState === 4) {
     
      if(request.status === 200) { 
        
        montaLista(request.responseText,'lista');

      } else {
        alert('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
    }
  }
}

///////////////////////////
// exclusão
//////////////////////////
function excluiProduto(cod){
  let request = new XMLHttpRequest();
  request.open('get', 'exclui.php?cod=' + cod);
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
      
      if(request.status === 200) { 
        
        carregaProdutos();
      } else {
          alert('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
    }
  }
}

//////////////////////
//alteracao
//////////////////////
function carregaProduto(cod){
  let request = new XMLHttpRequest();
  request.open('get', 'consulta_produto.php?cod=' + cod);
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
      
      if(request.status === 200) { 
        carregaDadosForm(request.responseText);
      } else {
        alert('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
    }
  }
}


function carregaDadosForm(dados){
  objJSON = JSON.parse(dados);
  let nome = document.getElementById('pronome');
  nome.value = decodeURI(objJSON.pronome);
  let desc = document.getElementById('prodesc');
  desc.value = decodeURI(objJSON.prodesc);
  let valor = document.getElementById('propreco');
  valor.value = decodeURI(objJSON.propreco);
  let cod = document.getElementById('procodig');
  cod .value= objJSON.procodig;
  let categoria = document.getElementById('procateg');
  categoria.value = objJSON.procateg;
  let imagem = document.getElementById('proimg');
  imagem.value = objJSON.proimg;
}



btSalvar.addEventListener('click',function(){

    let dados = serialize(form);
    console.log(dados);
    xhr.open('POST', 'altera.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=utf-8');
    xhr.send(encodeURI(dados));

    xhr.onreadystatechange = function() {
      if(xhr.readyState === 4) {
        
        if(xhr.status === 200) { 
        
        if (xhr.responseText != '0'){
            alert('erro SQL' + xhr.responseText);
        }

        carregaProdutos();
        carregaProdutosCardapio();
        } else {
            alert('Erro na requisição: ' +  xhr.status + ' ' + xhr.statusText);
        } 
      }
    }
});



function carregaCategorias(){
  let request = new XMLHttpRequest();
  request.open('get', 'lista_categorias.php');
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
        montaSelectCategorias(request.responseText,'procateg');
      } 
      else 
      {
        console.log('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
  }  
}

function carregaCategoriasCardapio(){
  var request = new XMLHttpRequest();
  request.open('get', 'lista_categorias.php');
  request.send();

  request.onreadystatechange = function() {
    if(request.readyState === 4) {
        montaSelectCardapio(request.responseText,'procateg');
      } 
      else 
      {
        console.log('Erro na requisição: ' +  request.status + ' ' + request.statusText);
      } 
  }  
}

function montaSelectCardapio(dados,idDestino) {
  
  let cardapioselect = document.getElementById('selectcategorias');
  cardapioselect.innerHTML= '';
  $(cardapioselect).append (`
    <option value="0">Todos</option>
  `)
  objJSON = JSON.parse(dados);
  
  for (let i in objJSON){
    $(cardapioselect).append (`
      <option value="${objJSON[i].catcodig}">${decodeURI(objJSON[i].catdescr)}</option>
    `)
    }
}


function montaSelectCategorias(dados,idDestino){

  let select = document.getElementById(idDestino);
  let option = document.createElement("option");
  select.innerHTML= '';
  option.innerText =  "-----";
  option.value = '0';
  select.appendChild(option);
  objJSON = JSON.parse(dados);

  for (let i in objJSON){
      option = document.createElement("option");
      option.innerText =  decodeURI(objJSON[i].catdescr);
      option.value = objJSON[i].catcodig;
      select.appendChild(option);
    }
  
}


///////////////////////////////////////////////
//JS da tela principal e carrinho - VERSÃO 2.0
///////////////////////////////////////////////
let carrinho = []; 
let btPedir = document.getElementById("btPedir");


btPedir.addEventListener('click',function(e){
   
   let xhr = new XMLHttpRequest();
   
    e.preventDefault();
    
    let form = document.getElementById("form1");

    let dados = serialize(form);
    xhr.open('POST', 'grava_carrinho.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=utf-8');
    xhr.send((dados));
    xhr.onreadystatechange = function() {
      if(xhr.readyState === 4) {
        
        if(xhr.status === 200) { 
        
        if (xhr.responseText != '0'){
            alert('erro SQL' + xhr.responseText);
        }
        limpaCarrinho('carrinho');
        } else {
          alert('Erro na requisição: ' +  xhr.status + ' ' + xhr.statusText);
        } 
      }
    }
});

function limpaCarrinho(destino){
  let divDestino = document.getElementById(destino);
  
  while (divDestino.lastChild) {
     divDestino.removeChild(divDestino.lastChild);
  }
  
  carrinho = [];
}

function adicionaNoCarrinho(dados,destino){
  let divDestino = document.getElementById(destino);
  
  let index = carrinho.map(function(obj){ return obj.codigo; }).indexOf(dados.codigo);
  if (index === -1) {
    
    carrinho.push(dados);
    
    let qtd = criaElemento("input",{"type":"text","size":"2","value":"1","name":"qtd[]"});
    
    let campoCod = criaElemento("input",{"type":"hidden","value":dados.codigo,"name":"codigo[]"});
    
    let btRemoveDoCarrinho = criaElemento("button",{"data-codigo":dados.codigo},"X"); 
    
    btRemoveDoCarrinho.addEventListener('click',function(e){
      e.preventDefault();
        
        e.target.parentElement.innerHTML = "";
        
        let codigo = e.target.dataset.codigo;
        
        removeDoCarrinho(codigo);
    });
    
    let div = criaElemento("div",{},"(" + dados.codigo  + ") " + decodeURI(dados.nome));
   
    div.appendChild(campoCod);
    
    div.appendChild(qtd);
    
    div.appendChild(btRemoveDoCarrinho);

    divDestino.appendChild(div);
  } 
}


function removeDoCarrinho(codigo){
  let index = carrinho.map(function(obj){ return obj.codigo; }).indexOf(codigo);
  if (index !== -1) {
    carrinho.splice(index, 1);
  }
}

function criaElemento(element, attribute, inner) {
  if (typeof(element) === "undefined") {
    return false;
  }
  if (typeof(inner) === "undefined") {
    inner = "";
  }
  var el = document.createElement(element);
  if (typeof(attribute) === 'object') {
    for (var key in attribute) {
      el.setAttribute(key, attribute[key]);
    }
  }
  if (!Array.isArray(inner)) {
    inner = [inner];
  }
  for (var k = 0; k < inner.length; k++) {
    if (inner[k].tagName) {
      el.appendChild(inner[k]);
    } else {
      el.appendChild(document.createTextNode(inner[k]));
    }
  }
  return el;
}