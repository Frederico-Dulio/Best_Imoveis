<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FotoResquest;
use App\Models\Foto;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use Intervention\Image\Facades\Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idImovel)
    {
        $imovel = Imovel::find($idImovel);

        $fotos = Foto::where('imovel_id', $idImovel)->get();

        return view('Admin.imoveis.fotos.index', compact('imovel', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idImovel)
    {
        $imovel = Imovel::find($idImovel);

        return view('Admin.imoveis.fotos.form', compact('imovel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoResquest $request, $idImovel)
    {
        //Verificar a chegada da foto
        if ($request->hasFile('foto')) {

            # Verificar se não houve erro ao carregar a foto
            if ($request->foto->isValid()) {

                //Armazenando o arquivo no disco publico e retornando o caminho(url) do arquivo
                $fotoURL = $request->foto->store("imoveis/$idImovel", 'public');


                //Armazenando o caminho da foto no DB
                $foto = new Foto();
                $foto->url = $fotoURL;
                $foto->imovel_id = $idImovel;
                $foto->save();


                #Forma correta de se carregar uma foto usando o Intervention Image

                // //Pegando o caminho e o nome do arquivo para salvar
                // $fotoURL = $request->foto->hashName("imoveis/$idImovel");

                // //Redimencionar a imagem
                // $imagem = Image::make($request->foto)->fit(env('FOTO_LARGURA'), env('FOTO_ALTURA'));

                // //Salvar
                // Storage::disk('public')->put($fotoURL, $imagem->encode());
            }
        }
        $request->session()->flash('sucesso', 'Foto incluida com sucesso');
        return redirect()->route('admin.imoveis.fotos.index', $idImovel);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idImovel, $idFoto)
    {
        $foto = Foto::find($idFoto);

        //Apagar a foto do meu servidor ou disco
        Storage::disk('public')->delete($foto->url);

        //Apagando o registro no BD
        $foto->delete();

        $request->session()->flash('sucesso', 'Foto excluida com sucesso');
        return redirect()->route('admin.imoveis.fotos.index', $idImovel);
    }
}
