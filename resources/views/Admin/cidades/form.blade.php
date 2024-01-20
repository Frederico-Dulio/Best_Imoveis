@extends('Admin.Leyouts.principal')

@section('conteudo-principal')
    <section class="section">
        <form action="{{ $action }}" method="post">
            @csrf
            @isset($cidade)
                @method('PUT')
            @endisset


            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{ old('nome', $cidade->nome ?? '') }}" />
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="right-align">
                <a href="{{ route('admin.cidades.index') }}" class="btn-flat waves-effect">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>
        </form>
    </section>
@endsection
