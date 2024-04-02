<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComunaController extends Controller
{
    public function index()
    {
        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
        ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
        ->get();
        return view('comuna.index', ['comunas' => $comunas]);
    }

    public function create()
    {
        $municipios = DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();
        return view('comuna.new', ['municipios' => $municipios]);
    }

    public function store(Request $request)
    {
        $comuna = new Comuna();
        $comuna->comu_nomb = $request->name;
        $comuna->muni_codi = $request->code;
        $comuna->save();

        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
        ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
        ->get();
        return view('comuna.index', ['comunas' => $comunas]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $comuna = Comuna::find($id);

        $municipios = DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();
        return view('comuna.edit', ['comuna' => $comuna, 'municipios' => $municipios]);
    }

    public function update(Request $request, $id)
    {
        $comuna = Comuna::find($id);

        $comuna->comu_nomb = $request->name;
        $comuna->muni_codi = $request->code;
        $comuna->save();

        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
        ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
        ->get();
        return view('comuna.index', ['comunas' => $comunas]);
    }

    public function destroy($id)
    {
        $comuna = Comuna::find($id);
        $comuna->delete();

        $comunas = DB::table('tb_comuna')
        ->join('tb_municipio', 'tb_comuna.muni_codi', '=', 'tb_municipio.muni_codi')
        ->select('tb_comuna.*', 'tb_municipio.muni_nomb')
        ->get();
        return view('comuna.index', ['comunas' => $comunas]);
    }
}
