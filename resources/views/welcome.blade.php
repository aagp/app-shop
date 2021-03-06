@extends('layouts.app')

@section('title', 'Bienvenido a ' . config('app.name'))

@section('body-class', 'landing-page')

@section('styles')
    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }

        .team .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }

        .team .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }

        /***
            TYPEAHEAD for MDB
            by djibe
        ***/

        .typeahead {
            z-index: 1051;
        }


        /*If using icon span before input, like <i class="fa fa-asterisk prefix"></i>*/

        span.twitter-typeahead {
            width: calc(100% - 3rem);
            margin-left: 3rem;
        }


        /* Aspect of the dropdown of results*/

        .typeahead.dropdown-menu,
        span.twitter-typeahead .tt-menu {
            min-width: 100%;
            background: white;
            /*as large as input*/
            border: none;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
            border-radius: 0;
            font-size: 1.2rem;
        }


        /*Aspect of results, done*/

        span.twitter-typeahead .tt-suggestion {
            color: #4285F4;
            cursor: pointer;
            padding: 1rem;
            text-transform: capitalize;
            font-weight: 400;
        }

    </style>
@endsection

@section('content')

    <div class="header header-filter"
         style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Bienvenido a {{ config('app.name') }}</h1>
                    <h4>Realiza pedidos en línea y te contactaremos para coordinar la entrega.</h4>
                    <br/>
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"></i> ¿Cómo funciona?
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center section-landing">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title">¿Por qué App Shop?</h2>
                        <h5 class="description">Puedes revisar nuestra relación completa de productos, comparar precios
                            y realizar tus pedidos cuando estés seguro.</h5>
                    </div>
                </div>

                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">chat</i>
                                </div>
                                <h4 class="info-title">Atendemos tus dudas</h4>
                                <p>Atendemos rápidamente cualquier consulta que tengas vía chat. No estás sólo, sino que
                                    siempre estamos atentos a tus inquietudes.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Pago seguro</h4>
                                <p>Todo pedido que realices será confirmado a través de una llamada. Si no confías en
                                    los pagos en línea puedes pagar contra entrega el valor acordado.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <h4 class="info-title">Información privada</h4>
                                <p>Los pedidos que realices sólo los coocerás a través de tu panel de usuario. Nadie más
                                    tiene acceso a esta información.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section text-center">
                <h2 class="title">Visita nuestras categorías</h2>

                <form class="form-inline" method="get" action="{{ url('/search') }}">
                    <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" id="search">
                    <button type="submit" class="btn btn-primary btn-just-icon">
                        <i class="material-icons">search</i>
                    </button>
                </form>

                <div class="team">
                    <div class="row">

                        @foreach($categories as $category)

                            <div class="col-md-4">
                                <div class="team-player">
                                    {{--<img src="{{ $product->images->first()->image }}" alt="Thumbnail Image" class="img-raised img-circle">--}}
                                    <img src="{{ $category->featured_image_url }}"
                                         alt="Imagen representativa de la categoría {{ $category->name }}"
                                         class="img-raised img-circle">
                                    <h4 class="title">
                                        <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                                    </h4>
                                    <p class="description">{{ $category->description }}</p>
                                    {{--<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>--}}
                                    {{--<a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>--}}
                                    {{--<a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a>--}}
                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>

            </div>


            <div class="section landing-section">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center title">¿Aún no te has registrado?</h2>
                        <h4 class="text-center description">Regístrate ingresando tus datos básicos, y podrás realizar
                            tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas,
                            con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.</h4>
                        <form class="contact-form" method="get" action="{{ url('/register') }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <button class="btn btn-primary btn-raised">
                                        Iniciar Registro
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

    @include('includes.footer');

@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function () {
            // bloodhound
            var products = new Bloodhound({
               datumTokenizer: Bloodhound.tokenizers.whitespace,
               queryTokenizer: Bloodhound.tokenizers.whitespace,
               prefetch: '{{ url('/products/json') }}'
            });

           // inicializar typehead
           $('#search').typeahead({
              hint: true,
              highlight: true,
              minLenght: 1
           }, {
               name: 'products',
               source: products
           });
        });
    </script>
@endsection