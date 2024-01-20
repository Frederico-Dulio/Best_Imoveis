@extends('Admin.Leyouts.principal')

@section('conteudo-principal')
{{-- Filtro de Pesquisa --}}
<section class="section">
    <form action="{{ route('admin.imoveis.index') }}" method="GET">
        <div class="row valign-wrapper">
            <div class="input-field col s6">
                <select name="cidade_id" id="cidade">
                    <option value="">Selecione uma cidade</option>

                    @foreach ($cidades as $cidade)
                        <option value="{{$cidade->id}}" {{$cidade->id == $cidade_id ? 'selected' : ''}}>{{$cidade->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-field col s6">
                <input type="text" name="titulo" id="titulo" value="{{$titulo}}" />
                <label for="titulo">Titulo</label>
            </div>
        </div>

        <div class="row right-align">
            <a href="{{ route('admin.imoveis.index') }}" class="btn-flat waves-effevt">Exibir Todas</a>
            <button type="submit" class="btn waves-effect waves-light">
                Pesquisar
            </button>
        </div>
    </form>
</section>

<hr />

{{-- Lista de IMoveis --}}
<section class="section">

        <table class="hightlight">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($imoveis as $imovel)
                    <tr>
                        <td>
                            {{ $imovel->cidade->nome }}
                        </td>
                        <td>
                            {{ $imovel->endereco->bairro}}
                        </td>
                        <td>
                            {{ $imovel->titulo }}
                        </td>
                        <td class="right-align">

                            {{-- Visualizar Fotos --}}
                            <a href="{{ route('admin.imoveis.fotos.index', $imovel->id) }}" title="foto">
                                <span>
                                    <i class="material-icons green-text text-lighten-1">insert_photo</i>
                                </span>
                            </a>

                            {{-- Ver --}}
                            <a href="{{ route('admin.imoveis.show', $imovel->id) }}" title="ver">
                                <span>
                                    <i class="material-icons indigo-text text-darken-2">remove_red_eye</i>
                                </span>
                            </a>

                            {{-- Editar --}}
                            <a href="{{ route('admin.imoveis.edit', $imovel->id) }}" title="editar">
                                <span>
                                    <i class="material-icons blue-text text-accent-2">edit</i>
                                </span>
                            </a>

                            {{-- Remover --}}
                            <form action="{{ route('admin.imoveis.destroy', $imovel->id) }}" method="POST"
                                style="display: inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" style="background: transparent; border: 0;" title="remover">
                                    <span style="cursor: pointer">
                                        <i class="material-icons red-text text-accent-3">delete</i>
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Não existem imóveis cadastrados ou imoveis que não atendam aos critérios de pesquisa</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <div class="center">
            {{$imoveis->links('Shared.pagination')}}
        </div>

        <div class="fixed-action-btn">
            <a href="{{ route('admin.imoveis.create') }}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>

    </section>
@endsection
