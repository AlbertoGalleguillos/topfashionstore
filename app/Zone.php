<?php

namespace App;
use Illuminate\Support\Facades\DB;

class Zone extends Model
{
    public function getSales($startDate, $endDate = null) {
        if (!$endDate) $endDate = $startDate;

        $dataZone = DB::Table('legacy.ventas_rtl_det')
        ->select(DB::raw('sum(cantidad) as quantity'), DB::raw('sum(subtotal) as total'), 'name')    
        ->join('stores', function ($join) {
            $join->on('stores.id', 'legacy.ventas_rtl_det.codsucursal'); })
        ->where('zone_id', $this->id)
        ->whereBetween('fechaventa', [$startDate, $endDate])
        ->groupBy('name')
        ->get();
    
        return $dataZone;
    }
}
