<?php

namespace App\DataTables;

use App\Models\Skill;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SkillDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('percent',function ($data){
                return $data->percent . '%';
            })
            ->addColumn('action',function($data){
                return ' <a href="">
                                <i title="تعديل"
                                class="fa fa-pen edit"  data-route="'.route('dashboard.skill.edit',['id'=>$data->id]).'"
                                style="cursor: pointer;color:green;font-size:17px"></i></a>
                                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="حذف" class="fa fa-trash delete"
                                data-id="'.$data->id.'" data-route="'.route('dashboard.skill.delete',['id'=>$data->id]).'"
                                 style="cursor: pointer;color:#ff0000;font-size:17px"></i>';

            })
            ->addColumn('created_At', function ($data) {
                //to create raw [created_At]
                return "<span style='color:#727E8C'>" . $data->created_at . "</span>";
            })
            ->addColumn('updated_At', function ($data) {
                //to create raw [updated_At]
                return " <span  style='color:#727E8C'>" . $data->updated_at. "</span>";
            })
            ->addColumn('status', function ($data) {

                $checked = $data->status == "enable" ?"checked" :'';
                return '<label class="form-switch" style="margin-bottom: 0px;">
                      <input type="checkbox" name="status" class="status" data-id="'.$data->id.'" '.$checked.'>
                      <i></i>
                    </label>';
            })
            ->addColumn('multi_delete', function ($data) {
                //to create raw [updated_At]
                return '<div class="form-check">
                          <input class="form-check-input row_check" type="checkbox" style="width: 1.5em !important; height: 1.5em !important;border: 1px solid #aaa;"
                           value="'.$data->id.'" id="flexCheckIndeterminate'.$data->id.'">
                          <label class="form-check-label" for="flexCheckIndeterminate'.$data->id.'"></label>
                        </div>';
            })
            ->rawColumns(['percent','status','action','created_At','updated_At','multi_delete']);
    }


    public function query(Skill $model)
    {
        return Skill::query()->select('skills.*');
    }


    public function html()
    {
        return $this->builder()
            ->setTableId('skill_table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orders([0])
            ->parameters([
                'searching' =>true,
                'paging'   => true,
                'bLengthChange'   => true,
                'bInfo'   => true,
                'responsive'   => true,
                'dom' => 'Blfrtip',
            ])

            ->addColumnBefore([
                'defaultContent' => '',
                'data'           => 'DT_RowIndex',
                'name'           => 'id',
                'title'          => '#',
                'render'         => null,
                'orderable'      => true,
                'searchable'     => true,
                'padding'=>'13px',
            ]);
    }


    protected function getColumns()
    {
        return [
            Column::computed('name')
                ->title('الاسم')
                ->orderable(true)
                ->searchable(true),
            Column::computed('percent')
                ->title('النسبة')
                ->orderable(false)
                ->searchable(true),
            Column::computed('created_At')
                ->title('تم الانشاء بتاريخ')
                ->orderable(true)
                ->searchable(true),
            Column::make('updated_At')
                ->title('تم التعديل بتاريخ')
                ->orderable(true)
                ->searchable(true),
            Column::computed('status')
                ->title('الحالة')
                ->orderable(true)
                ->searchable(true),
            Column::computed('multi_delete')
                ->title('<div class="form-check">
                          <input class="form-check-input" type="checkbox" id="main_row_check"
                           style="width: 1.8em !important; height: 1.8em !important;border: 1px solid #aaa;margin-top: -2px" >
                          <label class="form-check-label" for="main_row_check"></label>
                        </div>')
                ->orderable(false)
                ->searchable(false),
            Column::computed('action')
                ->title('الاعدادت')
                ->orderable(true)
                ->searchable(false),

        ];
    }

    protected function filename()
    {
        return 'Skill_' . date('YmdHis');
    }
}
