<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ItemHelper
{
    /**
     * gets the type info for a given type_id
     * @param int $type_id
     * @return Model
     */
    public static function getTypeInfo(int $type_id)
    {
        $mname = "pi_m_" .$type_id;
        if (Cache::has($mname)) {
            return Cache::get($mname);
        } else {
            $data = DB::table('invTypes as it')
                ->select('it.groupID', 'it.mass', 'it.volume', 'it.portionSize', 'it.typeName', 'ig.CategoryId')
                ->join('invGroups as ig', 'it.groupID', '=', 'ig.groupID')
                ->where('typeID', '=', $type_id)
                ->first();
            Cache::put($mname, $data, 86400);

            return $data;
        }
    }
}
