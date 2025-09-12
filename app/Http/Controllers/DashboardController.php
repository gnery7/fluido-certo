<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer; // Importante: importar nosso Model
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Exibe o painel principal com a lista de montadoras.
     */
    public function index()
    {
        // 1. Busca no banco todas as montadoras, ordenadas por nome
        $manufacturers = Manufacturer::orderBy('name')->get();

        // 2. Retorna a view 'dashboard' e envia a lista de montadoras para ela
        return view('dashboard', ['manufacturers' => $manufacturers]);
    }
}