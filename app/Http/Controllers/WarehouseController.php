<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;

class WarehouseController extends Controller
{
    public function index() {
        $warehouses = Warehouse::all();
        return $warehouses;
    }
}
