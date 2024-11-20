<?php

namespace Zweistein2\Seat\PlanetaryIndustry\Http\Datatables;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;

abstract class PlanetaryIndustryDataTable extends DataTable {
    abstract public function query(int $charID): Collection;

    public function getColumns(): array {
        return [
            ['data' => 'character_name', 'title' => 'Character'],
            ['data' => 'ratted_money', 'title' => 'Ratted Money'],
        ];
    }

    public function html(): Builder {
        $days = intval(request()->query("days")) ?: 30;
        $system = intval(request()->query("system")) ?: 30000142;

        return $this->builder()
            ->postAjax()
            ->parameters([
                'dom'          => '<"row"<"col-sm-12 col-md-4"l><"col-sm-12 col-md-4 text-center"B>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                'buttons' => ['csv', 'excel'],
                'drawCallback' => "function(d) { d.system = $system; d.days = $days; }",
            ])
            ->columns($this->getColumns())
            ->orderBy(1);
    }

    public function ajax(): JsonResponse {
        $charID = 0;

        $ajax = datatables()
            ->of($this->query($charID))
            ->editColumn('character_name', function ($row) {
                return view("rattingmonitor::charactername",[
                    "character_id"=>$row->character_id,
                    "name"=>$row->character_name
                ])->render();
            })
            ->editColumn('ratted_money', function ($row) {
                return number($row->ratted_money) . " ISK";
            })
            ->rawColumns(["character_name"]);

        return $ajax->make();
    }
}