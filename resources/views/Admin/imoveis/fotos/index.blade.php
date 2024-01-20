@extends('Admin.Leyouts.principal')

@section('conteudo-principal')
    <h4>{{ $imovel->titulo }}</h4>

    <section class="section">
        <div class="flex-container">
            @forelse ($fotos as $foto)
                <div class="flex-iten">
                    <span class="btn-fechar">

                        {{-- Remover --}}
                        <form action="{{ route('admin.imoveis.fotos.destroy', [$imovel->id, $foto->id]) }}" method="POST"
                            style="display: inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" style="background: transparent; border: 0;" title="remover">
                                <span style="cursor: pointer">
                                    <i class="material-icons red-text text-accent-3">delete</i>
                                </span>
                            </button>
                        </form>

                    </span>
                    <img src="{{ asset("storage/$foto->url") }}" width="500" height="500" />
                </div>
            @empty
                <div>Não existe fotos para este imóvel</div>
            @endforelse
        </div>
        <div class="fixed-action-btn">
            <a href="{{ route('admin.imoveis.fotos.create', $imovel->id) }}"
                class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>
@endsection
