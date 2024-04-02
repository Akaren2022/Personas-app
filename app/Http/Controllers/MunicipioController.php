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
        //
    }

    public function store(Request $request)
    {
        //
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
