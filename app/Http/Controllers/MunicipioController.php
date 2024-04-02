<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = DB::table('tb_municipio')
        ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
        ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
        ->get();
        return view('municipio.index', ['municipios' => $municipios]);
    }

    public function create()
    {
        $departamentos = DB::table('tb_departamento')
        ->orderBy('depa_nomb')
        ->get();
        return view('municipio.new', ['departamentos' => $departamentos]);
    }

    public function store(Request $request)
    {
        $municipio = new Municipio();
        $municipio->muni_nomb = $request->name;
        $municipio->depa_codi = $request->code;
        $municipio->save();

        $municipios = DB::table('tb_municipio')
        ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
        ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
        ->get();
        return view('municipio.index', ['municipios' => $municipios]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
