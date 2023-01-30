<?php
 require_once('funcoes/config.php');
  if(!isset($_REQUEST['DarId']) && !empty( $_SERVER["HTTP_USER_AGENT"])){
      $_REQUEST['DarId'] = null;
  }else{
      $_REQUEST['DarId'] = str_replace('/', '', $_REQUEST['DarId']);
  }

  if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == "a.stoney.com.br"){
    $nome = 'Stoney';
    $detentora = 'VIVENTI';
    $whatsapp = '551144379010';
    $hotjarId = 3290827;
  }else if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == "b.lnss.com.br"){
    $nome = 'Stoney';
    $detentora = 'VIVENTI';
    $whatsapp = '551144379010';
    $hotjarId = 3290828;
  }else if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == "a.lnss.com.br"){
    $nome = 'Emprestimoney';
    $detentora = 'FHBS Tech';
    $whatsapp = '551144336771';
    $hotjarId = 3290823;
  }else{
    $nome = 'Emprestimoney';
    $detentora = 'FHBS Tech';
    $whatsapp = '551144336771';
    $hotjarId = 3290818;
  }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#ecd96f" >
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="language" content="Portuguese">
  <link rel="stylesheet" href="assets/css/style-<?=$nome?>.css?v=<?=rand(1111,9999)?>">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/animated.css">
  <link rel="stylesheet" href="assets/owl-carousel/css/owl.carousel.css">
  <link rel="icon" type="image/x-icon" href="assets/images/favicon-<?=$nome?>.ico">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">
  <title><?=$nome?> - Contratação</title>
</head>

<body>

  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>


  <div class="whatsapp ajd">
    <a target="_blank" rel="noopener noreferrer"
      href="https://wa.me/<?=$whatsapp?>?text=<?=isset($req['mensagemDisparoWhatsapp'])?urlencode($req['mensagemDisparoWhatsapp']):'Ol%C3%A1%20'.$nome.'!%20quero%20saber%20sobre%20as%20condi%C3%A7%C3%B5es%20de%20empr%C3%A9stimo'?>"><img
        src="assets/images/whatsapp.svg" alt="WhatsApp"></a>
    <div class="whatsapp smb"></div>
  </div>


  <div class="collapse" id="trilha_simulacao">

     <section class="section-home bg-home">
      <nav class="navbar" style="margin-bottom:0px;">
        <a href="javascript:void(0)" class="nav__ajuste"><img src="assets/images/logo-<?=$nome?>.svg" width="170" class="navbar__logo"></a>
      </nav>

        <div class="container">
          <div class="row">

            <div class="col-md-6">
              <div class="text-home">
                <h2 class="home-title wow slideInDown" data-wow-delay="0.3s">Comece 2023 com <b class="wow zoomInUp" data-wow-delay="1s"> dinheiro no bolso!</b></h2>
                <p class="home-p wow fadeIn">Com o aumento salarial do INSS foram liberados <span class="simulacao_valorLiberado" style="font-weight: 900;"></span> para você! Para reservar é só clicar no valor abaixo:</p>
                <div class="div-valor wow zoomInDown" data-wow-delay="1.2s">
                  <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'reservar'})"><h1 class="home-valor simulacao_valorLiberado">R$13.504.92</h1></a>
                </div>
              </div>
            </div>

            <div class="col-md-6 bg wow slideInRight" data-wow-durtation="0.6s">
            </div>
          </div>
        </div>
      </section>

    <section class="text-center section-padding">

      <div class="container container-text container-lock">
        <div class="col-md-7">
          <h1 class="h1-valor h1-lock wow bounceInDown" data-wow-delay="0.3s"> Isso mesmo! Este valor ja está liberado para você.</h1>  
          <h2 class="title-valor p-lock " style="padding-bottom: 30px; margin-top: 0px;">Para fazer a reserva é muito simples, basta clicar em:</h2>    
          <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'reservar'})" style="padding-bottom 40px" class="lock-a">Reserve agora!</a>
          <h1 class="title-valor p-lock" style="margin-top:30px !important;">É super rápido, simples e você não precisa nem sair de casa para começar 2023 com mais
          <span class="simulacao_valorLiberado" style="font-weight: 900;"></span> no bolso!</h1>
        </div>
        <div class="col-md-5 wow rotateInDownRight">
            <img src="assets/images/lock.png" class="img-lock" alt="">
          </div>
        <!-- <h1 class="h1-valor"><i class="fa fa-check i-icon"></i> Isso mesmo! Este valor ja está liberado para você.</h1>  
        <h2 class="title-valor" style="padding-bottom: 20px; margin-top: 0px;">Para fazer a reserva é muito simples, basta clicar em:</h2>
        <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'reservar'})" style="padding-bottom 40px" class="main-a">Reserve agora!</a> -->

      </div>
    </section>

    <section class="text-center section-padding" style="background-color:#f0f0f0;">

      <div class="container container-text container-lock-2">
       
        <div class="col-md-5">
            <img src="assets/images/clock.png" class="img-lock" alt="">
          </div>
    
        <div class="col-md-7">
          <h1 class="h1-valor h1-lock"> São apenas 4 passos!</h1>  
          <h2 class="title-valor p-lock" style="padding-bottom: 25px; margin:0px 25px;">É rápido e prático contratar o aumento da margem conosco, o processo leva apenas alguns minutos! Em apenas 4 passos, você ja sai com o dinheiro no bolso.</h2>
          <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'reservar'})" style="padding-bottom 40px" class="lock-a">Reserve agora!</a>
        </div>

      </div>
    </section>

    <section class="section-proposta">
      
      <div class="container container-text">
     
          <h1 class="h1-valor color-white h1-lock" style="padding-top:25px !important;"><i class="fa-sharp fa-solid fa-list-check i-icon color-white"></i>  Processo de contratação</h1>  
          <h2 class="title-valor p-lock color-white" style="padding-bottom: 20px; margin-top: 0px;">Confira abaixo quais são os 4 passos necessários para realizar a contratação:</h2>
      </div>

    
    <div class="main bg-light">
      <div class="container container-text">

        <div class="row-main">
          <div class="row row-adjust">
            <div class="col-lg-10 col-xl-3 py-3" style="padding:30px 0px;">

              <div class="col-md-3">
                <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'reservar'})">
                <div class="card-passo card-link  "> 
                <i class="fa-duotone fa-thumbs-up i-icon" style="font-size:40px; color:var(--secondary);"></i>  
                <h1>1° Passo</h1>
                <h2>Aceitar a proposta de <span style="font-weight:900;" class="simulacao_valorLiberado"></span></h2>
                </div>
                </a>
              </div>
              <div class="col-md-3">
                <div class="card-passo"> 
                <i class="fa-duotone fa-user-check i-icon" style="font-size:40px; color:var(--secondary);"></i>
                <h1>2° Passo</h1>
                <h2> Validar o nome (confirmação de identidade)</h2>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card-passo"> 
                <i class="fa-duotone fa-pen-to-square i-icon" style="font-size:40px; color:var(--secondary);"></i>
                <h1>3° Passo</h1>
                <h2>Formalizar proposta no banco (dados pessoais, selfie)</h2>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card-passo">
                <i class="fa-duotone fa-square-check i-icon" style="font-size:40px; color:var(--secondary);"></i>
                <h1>4° Passo</h1>
                <h2>Contratação finalizada!</h2>
                </div>
                
              </div>  

            </div>
          
          </div>
        </div> <!-- .container -->
      </div>
      </div>
      </section>

    
    <section class="section-padding">
      
      <div class="container container-text">
     
          <h1 class="h1-valor h1-lock" style="padding-top:25px !important;"><i class="fa-sharp fa-solid fa-envelope-open-dollar i-icon color-secondary"></i>  Confira a proposta que temos para você:</h1>  
          <h2 class="title-valor p-lock" style="padding-bottom: 20px; margin-top: 0px;">Abaixo você pode conferir valores, parcelas e taxas, tudo que precisa saber para contratar!</h2>
      </div>

    
    <div class="main bg-light">
      <div class="container container-text">

        <div class="row-main">
          <div class="row row-adjust">
            <div class="col-lg-7 col-xl-3 py-3 wow zoomIn">
              <div class="features">
                <div class="header mb-3">
                  <img src="assets/images/bancos/2.png" class="img-features financeira2 collapse" alt="">
                  <img src="assets/images/bancos/29.png" class="img-features financeira29 collapse" alt="">
                </div>
                <h5 class="h5-features simulacao_valorLiberado color-secondary"></h5>

                <p>Custo efetivo total: 1.9% a.m</span></p>
                <p>Valor da parcela: <span class="simulacao_valorParcela"></span></p>
                <p style="margin-bottom:25px;">Prazo: <span class="simulacao_prazo"></span></p>


                <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'reservar'})" class="main-a">Reserve agora!</a>
              </div>
            </div>
            <h1 style="padding-bottom:40px;" class="title-valor p-lock">Fazendo a pré-reserva agora você garante seus <span class="simulacao_valorLiberado" style="font-weight: 900;"></span> junto com o seu aumento salarial de 2023!</h1>
          </div>
        </div> <!-- .container -->
      </div>
      </div>
      </section>
      <!-- footer -->
      <div class="header g">
            <div class="container">
                <?php if ($nome == 'Emprestimoney') { ?><div class="title" data-aos="fade-up">Fale com a gente</div>
                <div class="description" data-aos="fade-up">
                    <div class="telephone">
                        <span>Capitais e regiões metropolitanas:</span>11 4977-4659
                    </div>
                    <div class="telephone">
                        <span>Demais localidades:</span>0800 878 2353
                    </div>
                </div>
                <?php } ?>
                <div class="lgpd" data-aos="fade-up">
                    <div style="color:#7a8895;"><?=$detentora?> detentora da marca “<?=$nome?>” é correspondente bancário credenciado em diversas instituições financeiras. O crédito é sujeito a margem disponível e adequação à política de concessão estabelecida por cada instituição. Valores de parcelas, prazos, taxa de juros, tarifas e CET (Custo Efetivo Total) podem variar conforme o INSS e a qualquer tempo. Taxa de Juros máxima de 2,14 a.m. e/ou 28,88 a.a. Todas as operações de crédito têm incidência de IOF, conforme legislação vigente. É direito ao mutuário o pagamento antecipado a qualquer tempo.</div>
                    <div><img src="assets/images/site-seguro.svg" alt="Google Seguro"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- end footer -->

    <nav class="navbar2" style="margin-bottom:0px;">
    <a href="javascript:void(0)" class="nav__ajuste"><img src="assets/images/logo-<?=$nome?>.svg" width="170" class="navbar__logo"></a>
  </nav>

    <div class="collapse" id="trilha_coletaNome">
      <section class="main-section">
        <div class="main">
          <div class="container">
            <div class="div-passos">
            <h1 class="h1-passos"> Passo <b class="circle-animation">2</b> de <b>4</b></h1>
            </div>
            <!-- <i class="fa-regular fa-circle i-circle"></i><i class="fa-solid fa-circle i-circle circle-animation"></i><i class="fa-regular fa-circle i-circle"></i><i class="fa-regular fa-circle i-circle"></i>
            <div class="text-center container-nome"> -->
              <h2 class="main-title"> Selecione seu nome:</h2>
             
          

                <div class="form__field listaNomes" id="listaNomes">

                  
                  
                </div>
                <div style="display: flex; justify-content: center;">
                  <p class="p-nome">Para podermos prosseguir, precisamos de seu nome completo para validação da sua
                    identidade. Verifique se selecionou corretamente e clique em "Continuar".</p>
                </div>
                <div class="alert alert-danger mt-1 warningNome collapse" role="alert">
                   Antes de continuar, selecione o seu nome. Se ele não estiver na lista, clique em 'Simular com outro CPF' para prosseguir.
                </div>
                <div class="btns-main">
                <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'coletaNome'})" class="btn-main-1 ">Continuar</a>
                <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'outroCpf'})" class="btn-main-2">Simular com outro CPF</a>
                </div>
        

              <div class="divider mx-auto"></div>
            </div>




          </div> <!-- .container -->
        </div> <!-- .page-section -->
      </section>
    </div>
    <div class="collapse" id="trilha_coletaNomeErro">
    <section class="main-section">
        <div class="main bg-light">
          <div class="container">
            <div class="text-center wow fadeInUp">
              <h2 class="main-title">Ops! Encontramos alguma divergência com seu nome.</h2>
              <p class="main-p" style="font-size:15px; padding-bottom: 0;">Selecione corretamente, por favor. Deve ser o mesmo nome que está no seu documento.</p>
              <div class="btns-main">
                <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'coletaNomeErro'})" class="btn-main-1"> <i class="fa fa-pencil"></i> Selecionar novamente</a>
              </div>    
              <div class="divider mx-auto"></div>
            </div>
            
            
              
      
          </div> <!-- .container -->
        </div> <!-- .page-section -->
      </section>
    </div>
    <div class="collapse" id="trilha_coletaCpfErro">
    <section class="main-section">
        <div class="main bg-light">
          <div class="container">
            <div class="text-center wow fadeInUp">
              <h2 class="main-title">Ops! Encontramos alguma divergência no seu CPF</h2>
              <p class="main-p" style="font-size:15px; padding-bottom: 0;">Por favor, digite novamente e confira se está igual ao seu documento antes de enviar.</p>
              <div class="btns-main">
                <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'coletaCpfErro'})" class="btn-main-1"> <i class="fa fa-pencil"></i> Digitar novamente</a>
              </div>    
              <div class="divider mx-auto"></div>
            </div>
            
            
              
      
          </div> <!-- .container -->
        </div> <!-- .page-section -->
      </section>
    </div>
    <div class="collapse" id="trilha_coletaNomeSucesso">
    <section class="main-section">
        <div class="main bg-light">
          <div class="container">
            <div class="text-center wow fadeInUp">
              <h2 class="main-title">Seu processo de contratação já começou!</h2>
              <div style="display:flex; justify-content:center;">
              <p class="main-p" style="font-size: 16px;max-width: 640px; margin-top: 7px;">Dentro de aproximadamente <span>10 minutos</span> você receberá um link em seu <span>Whatsapp ou SMS</span>. Esse é o último passo para você formalizar seu contrato conosco e garantir dinheiro no bolso em 2023!</p>
              </div>
              <div class="divider mx-auto"></div>
            </div>
            
          </div> <!-- .container -->
        </div> <!-- .page-section -->
        </section>
    </div>
    <div class="collapse" id="trilha_aguardaLink">
    <section class="main-section">
        <div class="main bg-light">
          <div class="container">
          <video class="video" controls autoplay loop>  <source src="assets/video/video.webm" type="video/webm"> </video>
            <div class="text-center wow fadeInUp">
              <h2 class="main-title aguardaLink">Estamos digitando sua proposta... O processo demora entre 1 e 2 minutos...</h2>
              <div style="display:flex; justify-content:center;">
              <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
              </div>
              <div class="divider mx-auto"></div>
            </div>
      
          </div> <!-- .container -->
        </div> <!-- .page-section -->
        </section>
    </div>
    <div class="collapse" id="trilha_foraHorario">
    <section class="main-section">
        <div class="main bg-light">
          <div class="container">
          <div class="text-center wow fadeInUp">
              <h2 class="main-title">Seu processo de contratação já começou!</h2>
              <div style="display:flex; justify-content:center;">
              <p class="main-p foraHorario" style="font-size: 16px;max-width: 640px; margin-top: 7px;"></p>
              </div>
              <div class="divider mx-auto"></div>
            </div>
      
          </div> <!-- .container -->
        </div> <!-- .page-section -->
        </section>
    </div>
    <div class="collapse" id="trilha_formalizar">
    <section class="main-section display-block">
        <div class="main bg-light" style="padding:50px 0px;">
          <div class="container">
            <div class="text-center wow fadeInUp">
            <div class="div-passos">
            <h1 class="h1-passos"> Passo <b class="circle-animation">3</b> de <b>4</b></h1>
            </div>
            <div class="container">


        <div class="owl-carousel owl-theme wow fadeInRight" id="difs">
          
          <div class="item">
            <div class="dif-card">
                  <img src="assets/images/c6/1.png" class="img-c6" alt="">
            </div>
          </div>


          <div class="item">
            <div class="dif-card testimonial">
              <img src="assets/images/c6/2.png" class="img-c6" alt="">
            </div>
          </div>
          

          <div class="item">
            <div class="dif-card">
              <img src="assets/images/c6/3.png" class="img-c6" alt="">
            </div>
          </div>

          <div class="item">
            <div class="dif-card">
              <img src="assets/images/c6/4.png" class="img-c6" alt="">
            </div>
          </div>

          <div class="item">
            <div class="dif-card">
              <img src="assets/images/c6/5.png" class="img-c6" alt="">
            </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/6.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/7.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/8.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/9.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/10.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/11.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/12.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/13.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/14.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/15.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/16.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/17.png" class="img-c6" alt="">
                </div>
          </div>

          <div class="item">
          <div class="dif-card">
            <img src="assets/images/c6/18.png" class="img-c6" alt="">
                </div>
          </div>    

        

      </div>
      </div>
              <h2 class="main-title aguardaLink">Sua proposta está pronta!</h2>
              <div style="display:flex; justify-content:center;">
                   <p class="main-p" style="font-size: 16px;max-width: 640px; margin-top: 7px;">Confira o passo a passo acima, e formalize seu contrato no <b><span class="simulacao_financeira">C6</span></b>. É o último passo para garantir seus <b><span class="simulacao_valorLiberado"></span></b> e não leva mais do que 2 minutos.</p>
              </div>
              <div class="btns-main">
                <a href="javascript:void(0)" onClick="gerenciarCampanha({funcao:'formalizar'})" id="btnFormalizacao" data-link="" class="btn-main-1 btnFormalizar"> <i class="fa fa-file-text"></i> Formalizar Proposta</a>
              </div>  
              <div class="divider mx-auto"></div>
            </div>
      
          </div> <!-- .container -->
        </div> <!-- .page-section -->
        </section>
    </div>
    <div class="collapse" id="trilha_coletaCpf">

      <section class="main-section">
        <div class="main">
          <div class="container">
            <div class="text-center container-nome">
              <h2 class="main-title">Digite seu CPF:</h2>
           


                <div class="form__field">
                  <input type="text" class="form__input" pattern="[0-9]*" inputmode="numeric" id="btncpf" onkeypress="mask(this, 'cpf');" name="CliCpf" placeholder="000.000.000-00" maxlength="14" required>
                </div>
                <div style="display: flex; justify-content: center;">
                  <p class="p-nome">Para podermos prosseguir, precisamos de seu cpf para validação da sua identidade.
                    Verifique se escreveu corretamente e clique em "Continuar".</p>
                </div>
                <a href="javascript:void(0)" class="btn-main-1" onClick="gerenciarCampanha({funcao:'coletaCpf'})">Continuar</a>

            

              <div class="divider mx-auto"></div>
            </div>




          </div> <!-- .container -->
        </div> <!-- .page-section -->
      </section>
    </div>
    <div class="collapse" id="trilha_coletaTelefone">

      <section class="main-section">
        <div class="main">
          <div class="container">
            <div class="text-center container-nome">
              <h2 class="main-title">Digite seu Celular:</h2>
           
                <div class="alert alert-danger mt-1 warningTelefone collapse" role="alert">
                  O celular informado é inválido! Por favor, digite corretamente.
                </div>

                <div class="form__field">
                  <input type="text" class="form__input" pattern="[0-9]*" inputmode="numeric" id="btncel" name="telefone" onkeypress="mask(this, 'mphone');" placeholder="(11) 90000-0000" required>
                </div>
                <div style="display: flex; justify-content: center;">
                  <p class="p-nome">Para podermos prosseguir, precisamos de seu telefone para validação da sua identidade.
                    Verifique se escreveu corretamente e clique em "Continuar".</p>
                </div>
                <a href="javascript:void(0)" class="btn-main-1" onClick="gerenciarCampanha({funcao:'coletaTelefone'})">Continuar</a>

            

              <div class="divider mx-auto"></div>
            </div>




          </div> <!-- .container -->
        </div> <!-- .page-section -->
      </section>
    </div>
    <div class="collapse" id="trilha_semPossibilidades">
      <section class="main-section">
        <div class="main bg-light">
          <div class="container">
            <div class="text-center wow fadeInUp">
              <h2 class="main-title">Que pena!</h2>
              <p class="main-p" style="font-size:15px; padding-bottom: 0;">Não encontramos produtos disponíveis para você no momento.<br>Mas vamos continuar buscando opções para você.</p>
              <div class="divider mx-auto"></div>
            </div>
          </div> <!-- .container -->
        </div> <!-- .page-section -->
      </section>
    </div>
    <div class="collapse" id="trilha_aguardaProcessamento">
      <section class="main-section">
        <div class="main bg-light">
          <div class="container">
            <div class="text-center wow fadeInUp">
              <h2 class="main-title aguardaProcessamento">Estamos buscando a melhor oferta para você! Aguarde um pouquinho</h2>
              <div style="display:flex; justify-content:center;">
              <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
              </div>
              <div class="divider mx-auto"></div>
            </div>
      
          </div> <!-- .container -->
        </div> <!-- .page-section -->
        </section>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/utils.js?v=<?=rand(1111,9999)?>"></script>
    <script src="assets/js/funcoes.js?v=<?=rand(1111,9999)?>" data-DarId="<?=$_REQUEST['DarId']?>" data-backend="<?=BACKEND?>" data-link="<?=isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] : ''?>" data-LaapId="<?=$nome=='Emprestimoney'? 1 : 16?>"></script>
    <script src="assets/js/js.js?v=<?=rand(1111,9999)?>"></script>
    <!-- Hotjar Tracking Code for Aumento 2023 -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:<?=$hotjarId?>,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</body>

</html>