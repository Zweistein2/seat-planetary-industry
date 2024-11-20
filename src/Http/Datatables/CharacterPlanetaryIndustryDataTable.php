<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Http\Datatables;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CharacterPlanetaryIndustryDataTable extends PlanetaryIndustryDataTable {
    public function query(int $charID): Collection {
        $cache = "pla_ind_char_planets" . $charID;

        if (Cache::get($cache)) {
            return Cache::get($cache);
        } else {
            $data = DB::table('invTypeMaterials as m')
                ->select('m.materialTypeID', 't.groupID', 'm.quantity', 't.typeName')
                ->LeftJoin('invTypes as t', 'm.materialTypeID', '=', 't.typeID')
                ->where('m.typeID', '=', $charID)
                ->get();
            Cache::put($cache, $data, 86400);
            return $data;
        }
    }
}