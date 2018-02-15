<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Charts;
use App\Zone;
use App\Sales;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //TODO Refactor this controller (function daySales(period) and zoneSales(zoneId) )
    public function index() {

        $charts   = [];
        $today = Carbon::now()->format('Y-m-d');
        $daySales = $this->getDaySales($today);
        $zones    = Zone::all();
        
        foreach($zones as $zone) {
            $chart = Charts::create('bar', 'highcharts')
                ->title($zone->name)
                ->dimensions(0, 350) // Width x Height
                ->elementLabel('Prendas')
                //->template("material")
                ->colors(['#F44336'])
                ->values($zone->getSales($today)->pluck('quantity'))    
                ->labels($zone->getSales($today)->pluck('name'));
            array_push($charts, $chart);
        }
        
        return view('dashboard', compact('daySales', 'charts'));
    }

    public function getDaySales($startDate, $endDate = null) {
        if (!$endDate) $endDate = $startDate;
        
        $sales = DB::Table('legacy.ventas_rtl_det')
            ->select(DB::raw('sum(cantidad) as quantity'), DB::raw("sum(subtotal) as total"))
            ->join('stores', 'stores.id', 'legacy.ventas_rtl_det.codsucursal')
            ->whereBetween('fechaventa', [$startDate, $endDate])
            ->first();
        return $sales;
    }
}
