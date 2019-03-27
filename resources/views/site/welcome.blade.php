{{-- <!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravell</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="/css/theme.css" type="text/css">
  <title>Fliick - Slideshow para eventos</title>
  <meta name="description" content="Suas fotos do instagram direto no telão no seu evento.">
  <meta name="keywords" content="Slideshow instagram telão monitor tela celular responsivo redes sociais casamento festa evento Flick App apresentação recife Pernambuco para"> </head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-light">
    <div class="container">
      <a class="navbar-brand text-primary" href="/">Fliick</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item text-primary">
            <a class="nav-link text-primary" href="#vantagens">Vantagens</a>
          </li>
          <li class="nav-item text-primary">
            <a class="nav-link text-primary" href="#eventos">Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-primary" href="#duvidas">Dúvidas</a>
          </li>
          <li class="nav-item text-primary">
            <a class="nav-link text-primary" href="#planos">Planos</a>
          </li>
          <li class="nav-item text-primary">
            <a class="nav-link text-primary" href="#contato">Contato</a>
          </li>
        </ul>
        <form class="form-inline m-0">
          <input class="form-control mr-2" type="text" placeholder="#PesquisarEvento">
          <button class="btn btn-light" type="submit">Buscar</button>
        </form>
      </div>
    </div>
    <a class="btn navbar-btn ml-2 btn-outline-primary" href="/register"> Cadastrar</a>
    <a class="btn navbar-btn ml-2 btn-primary" href="/login"> Login</a>
  </nav>
  <div class="py-5 bg-light">
    <div class="container" id="vantagens">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="pb-4 text-secondary">Vantagens do Aplicativo</h2>
        </div>
      </div>
      <div class="row">
        <div class="align-self-center text-md-right text-center col-md-4">
          <h3 class="text-primary">Responsivo</h3>
          <p class="mb-5">Se adapta em qualquer tela, de qualquer tamanho</p>
          <h3 class="text-primary">Customizável</h3>
          <p class="mb-5">Insira, entre as fotos, publicações que você queira ou de seus clientes e valorize ainda mais sua marca&nbsp;</p>
          <h3 class="text-primary">Leve</h3>
          <p class="">Construído para não consumir toda sua franquia de dados</p>
        </div>
        <div class="my-3 col-md-4">
          <img class="img-fluid d-block ml-1 mx-auto" src="/svg/photopearls-goliath-ios-app-588x1024.png"> </div>
        <div class="align-self-center text-md-left text-center col-md-4">
          <h3 class="text-primary">Gerenciável</h3>
          <p class="mb-5">Escolha quais fotos aparecem no telão e evite surpresas indesejadas</p>
          <h3 class="text-primary">Multi-tela</h3>
          <p class="mb-5">Mostre seu evento em quantas telas quiser. Sem pagar mais por isso</p>
          <h3 class="text-primary">Ilimitado</h3>
          <p class="">Não importa o número de fotos que seu evento tenha, mostraremos todas</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1 bg-light">
    <div class="container" id="eventos">
      <div class="row">
        <div class="col-md-12">
          <h1 class="pb-3 text-secondary text-center">Últimos eventos criados</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1 bg-light">
    <div class="container">
      <div class="row">
        <div class="text-center col-md-12">
          <a class="btn btn-primary btn-lg" href="./tela">Criar meu evento</a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light">
    <div class="container" id="eventos">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center"> #CasamentoDaMariaeJoao
              <span class="badge badge-primary badge-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"> #CamilaFez18
              <span class="badge badge-primary badge-pill">12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"> #CarnavalÉAqui
              <span class="badge badge-pill badge-primary">20</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">#FormaturaMedicina2018
              <span class="badge badge-primary badge-pill">51</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center bg-light">
    <div class="container" id="duvidas">
      <div class="row">
        <div class="col-md-12">
          <h1 class="pb-3 text-secondary">Vamos fazer as coisas do jeito certo. Tire suas dúvidas.</h1>
        </div>
      </div>
      <div class="row">
        <div class="text-right col-md-6">
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center">
              <i class="d-block fa fa-columns fa-3x"></i>
            </div>
            <div class="col-10 text-lg-right text-left order-lg-1">
              <h4 class="text-primary">Responsive design</h4>
              <p>Based on fluid design principles.
                <br>Works with screen resolution</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center">
              <i class="d-block fa fa-circle-thin fa-4x"></i>
            </div>
            <div class="col-10 text-lg-right text-left order-lg-1">
              <h4 class="text-primary">Customized settings</h4>
              <p>Choose settings depending on the criteria you value the most</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 order-lg-2 col-2 text-center">
              <i class="d-block fa  fa-comment-o fa-3x"></i>
            </div>
            <div class="col-10 text-lg-right text-left order-lg-1">
              <h4 class="text-primary">Connect</h4>
              <p>In-app chat panel 24/7 active.
                <br>The support you need, right there.</p>
            </div>
          </div>
        </div>
        <div class="text-left col-md-6">
          <div class="row my-5">
            <div class="col-2 text-center">
              <i class="d-block fa fa-battery-empty fa-3x"></i>
            </div>
            <div class="col-10">
              <h4 class="text-primary">Battery-friendly</h4>
              <p>Non consuming background operation
                <br>Pingendo enhance the battery duration.</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 text-center">
              <i class="d-block mx-auto fa  fa-clone fa-3x"></i>
            </div>
            <div class="col-10">
              <h4 class="text-primary">Multilayers</h4>
              <p>Work simultaneously on different panels.</p>
            </div>
          </div>
          <div class="row my-5">
            <div class="col-2 text-center">
              <i class="d-block fa  fa-heart-o fa-3x"></i>
            </div>
            <div class="col-10">
              <h4 class="text-primary">Share the love</h4>
              <p>Help us spreading the word.
                <br>Tell your friends with just one-click</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container" id="planos">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center text-secondary">Nossos planos</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2"> </div>
        <div class="col-md-8">
          <table class="table text-center">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th class="text-center">Standard</th>
                <th class="text-center">Pro app</th>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td class="bg-light">Bootstrap 4 builder.
                  <br>Create and customize web pages.
                  <br>Export/import HTML and SASS</td>
                <td>Productivity tool.&nbsp;
                  <br>Prototype and develop websites.
                  <br>Work locally and offline</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Drag drop builder</td>
                <td class="bg-light">
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
                <td>
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
              </tr>
              <tr>
                <td>Bootstrap 4 support</td>
                <td class="bg-light">
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
                <td>
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
              </tr>
              <tr>
                <td>Responsive preview</td>
                <td class="bg-light">
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
                <td>
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
              </tr>
              <tr>
                <td>SASS compiler</td>
                <td class="bg-light">
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
                <td>
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
              </tr>
              <tr>
                <td>Continuous updates</td>
                <td class="bg-light"></td>
                <td>
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
              </tr>
              <tr>
                <td>Email Support</td>
                <td class="bg-light"></td>
                <td>
                  <i class="fa fa-check fa-lg text-primary"></i>
                </td>
              </tr>
              <tr>
                <td></td>
                <td class="bg-light">
                  <h1>R$ 150</h1>
                </td>
                <td>
                  <h1>R$ 300</h1>
                </td>
              </tr>
              <tr>
                <td></td>
                <td class="bg-light">
                  <a href="#" class="btn btn-outline-primary text-primary btn-lg">Eu quero</a>
                </td>
                <td>
                  <h1>
                    <a href="#" class="btn btn-primary btn-lg">Eu quero</a>
                  </h1>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="text-white bg-light">
    <div class="container" id="contato">
      <div class="row">
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-primary">FlickApp</h2>
          <p class="text-primary">A company for whatever you may need, from website prototyping to publishing</p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-primary">Mapa do Site</h2>
          <ul class="list-unstyled text-primary">
            <a href="#" class="text-primary">Home</a>
            <br>
            <a href="#" class="text-primary">About us</a>
            <br>
            <a href="#" class="text-primary">Our services</a>
            <br>
            <a href="#" class="text-primary">Stories</a>
          </ul>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-primary">Contato</h2>
          <p class="text-primary">
            <a href="tel:+55 81 99909 1010" class="text-primary">
              <i class="fa d-inline mr-3 text-primary fa-phone"></i>+55 81 99909 1010</a>
          </p>
          <p>
            <a href="mailto:contato@fliickapp.com" class="text-primary">
              <i class="fa d-inline mr-3 text-primary fa-envelope-o"></i>contato@flickapp.com</a>
          </p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-primary">Novidades</h2>
          <form>
            <fieldset class="form-group text-primary">
              <label for="exampleInputEmail1">Fique por dentro das novidades. Não enviamos spam.</label>
              <input type="email" class="form-control" placeholder="Enter email"> </fieldset>
            <button type="submit" class="btn btn-outline-primary">Enviar</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-primary">Fliick - As fotos dos seus convidados no telão do seu evento.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {
  
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();
  
        // Store hash
        var hash = this.hash;
  
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
  
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });
  </script> 
</body>

</html>