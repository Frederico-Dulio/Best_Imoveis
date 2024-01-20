@extends('Site.layouts.principal')

@section('conteudo-principal')
    <h3 class="center">
        Imoveis disponíveis em {{ $cidade->nome }}
    </h3>

    {{-- <div class="divider"></div> --}}
    <hr>

    <div style="display: flex; flex-wrap: wrap;">
        @forelse ($imoveis as $imovel)
            <div class="card" style="width: 200px; margin: 10px;">
                <div class="card-image">
                    @if (count($imovel->fotos) > 0)
                        <img src="{{ asset("storage/{$imovel->fotos[0]->url}") }}" w />
                    @endif
                </div>

                <div class="card-content">
                    <p class="card-title">
                        {{ $imovel->titulo }}
                    </p>

                    <p>
                        Finalidade: <strong>{{ $imovel->finalidade->nome }}</strong>
                    </p>

                    <p>
                        Preço: <strong>{{ $imovel->preco }} Kzs</strong>
                    </p>
                </div>
                <div class="card-action">
                    <a href="{{ route('cidades.imoveis.show', [$cidade->id, $imovel->id]) }}" class="green-text">
                        Ver detalhes
                    </a>
                </div>
            </div>
        @empty
            <p>
                Não exitem imóveis cadastrados nessa cidade!
            </p>
        @endforelse
    </div>

    <div class="center">
        {{ $imoveis->links('Shared.pagination') }}
    </div>
@endsection
