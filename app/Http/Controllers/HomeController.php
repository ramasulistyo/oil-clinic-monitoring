<?php

namespace App\Http\Controllers;

use App\Models\Equipment;

class HomeController extends Controller
{
    public function index()
    {
        $totalEquipment = Equipment::count();
        $readyCount     = Equipment::where('status', 'Ready')->count();
        $downCount      = Equipment::where('status', 'Down')->count();

        return view('home.index', compact(
            'totalEquipment',
            'readyCount',
            'downCount'
        ));
    }
}