@extends('Admin.Leyouts.principal')

@section('conteudo-principal')
    <h4>{{ $imovel->titulo }}</h4>

    <section class="section">

        {{-- Cidades --}}
        <div class="row">
            <span class="col s12">
                <h5>Cidade</h5>
                <p>{{ $imovel->cidade->nome }}</p>
            </span>
        </div>

        {{-- Tipo --}}
        <div class="row">
            <span class="col s12">
                <h5>Tipo de Imóvel</h5>
                <p>{{ $imovel->tipo->nome }}</p>
            </span>

        </div>

        {{-- Finalidade --}}
        <div class="row">
            <span class="col s12">
                <h5>Finalidade</h5>
                <p>{{ $imovel->finalidade->nome }}</p>
            </span>
        </div>

        {{-- Preço, dormitórios e salas --}}
        <div class="row">
            <span class="col s4">
                <h5>Preço</h5>
                <p>{{ $imovel->preco }}</p>
            </span>

            <span class="col s4">
                <h5>Dormitórios</h5>
                <p>{{ $imovel->dormitorios }}</p>
            </span>

            <span class="col s4">
                <h5>Salas</h5>
                <p>{{ $imovel->salas }}</p>
            </span>
        </div>

        {{-- Terreno, WC e garagens --}}
        <div class="row">
            <span class="col s4">
                <h5>Terreno (m²)</h5>
                <p>{{ $imovel->terreno }}</p>
            </span>

            <span class="col s4">
                <h5>WCs</h5>
                <p>{{ $imovel->banheiros }}</p>
            </span>

            <span class="col s4">
                <h5>Garagens</h5>
                <p>{{ $imovel->garagens }}</p>
            </span>
        </div>

        {{-- Pontos de Interesses --}}
        <div class="row">
            <span class="col s12">
                <h5>Pontos de interesse nas proximidades</h5>
                <div style="display: flex; flex-wrap: wrap;">

                    @forelse ($imovel->proximidades as $proximidade )
                        <span style="margin-right: 25px; font-weight: 600;">{{$proximidade->nome}}</span>
                    @empty
                        Sem pontos de interesse
                    @endforelse

                </div>
            </span>
        </div>

        {{-- Endereço --}}
        <div class="row">
            <span class="col s12">
                <h5>Endereço</h5>
                <p>
                    {{ $imovel->endereco->rua }}, nº {{ $imovel->endereco->numero }}
                    {{ $imovel->endereco->complemento }}, {{ $imovel->endereco->bairro }}.
                </p>
            </span>
        </div>

        {{-- Descrição --}}
        <div class="row">
            <span class="col s12">
                <h5>Descrição</h5>
                <p>{{ $imovel->descricao }}</p>
            </span>
        </div>

        {{-- Voltar --}}
        <div class="right-align">
            <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Voltar</a>
        </div>

    </section>
@endsection
