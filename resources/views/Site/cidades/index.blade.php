@extends('Site.layouts.principal')

@section('conteudo-principal')
    <section class="section lighten-4 center">

        <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
            @foreach ($cidades as $cidade)
                <a href="{{ route('cidades.imoveis.index', $cidade->id) }}">
                    <div class="card-panel" style="width: 50; height: 80%;">
                        <i class="material-icons medium green-text text-lighten-3">room</i>
                        <h6 class="black-text">{{ $cidade->nome }}</h6>
                    </div>
                </a>
            @endforeach
        </div>

    </section>
@endsection

@section('slider')
    <section class="slider">
        <ul class="slides">
            <li>
                <img src="{{ asset('img/1.jpg') }}"/>
                <div class="caption center-align">
                    <h4 style="text-shadow: 2px 2px 8px #1b5e20;">
                        Encontre as melhores casas pra você!
                    </h4>
                </div>
            </li>

            <li>
                <img src="{{ asset('img/2.jpg') }}"/>
                <div class="caption left-align">
                    <h4 style="text-shadow: 2px 2px 8px #1b5e20;">
                        Melhores apartamentos para alugar ou comprar!
                    </h4>
                </div>
            </li>

            <li>
                <img src="{{ asset('img/3.jpg') }}"/>
                <div class="caption right-align">
                    <h4 style="text-shadow: 2px 2px 8px #1b5e20;">
                        Melhores casas ou apartamentos para venda!
                    </h4>
                </div>
            </li>
        </ul>
    </section>
@endsection
