<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = DB::table('tb_departamento')
        ->join('tb_pais', 'tb_departamento.pais_codi', '=', 'tb_pais.pais_codi')
        ->select('tb_departamento.*', 'tb_pais.pais_nomb')
        ->get();
        return view('departamento.index', ['departamentos' => $departamentos]);
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
