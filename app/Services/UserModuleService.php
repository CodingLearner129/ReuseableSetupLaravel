<?php

namespace App\Services;

use App\Helpers\Aws;
use App\Models\Admin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class UserModuleService
{
    private $model;

    public function __construct($model)
    {
        $this->model = new $model();
    }

    public function destroy($id, $modelName)
    {
        DB::beginTransaction();
        try {
            $model = $this->model->find(decrypt($id));
            if (!$model) {
                DB::rollback();
                return response()->json([
                    'status' => 500,
                    'message' => __('common.somethingWentWrong'),
                ]);
            }
            $delete = [];
            $delete['deleted_at'] = Carbon::now()->timestamp;
            $model->update($delete);
            // $model->delete();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => __('common.deletedSuccessfully', ['model' => $modelName]),
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 500,
                'message' => __('common.somethingWentWrong'),
            ]);
        }
    }
    public function data()
    {
        $data = $this->model->query()->where('deleted_at', 0);
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->editColumn('name', function ($row) {
                if (empty($row->name)) {
                    return '-';
                } else {
                    if (strlen($row->name) > 30) {
                        return substr($row->name, 0, 50) . '...';
                    } else {
                        return $row->name;
                    }
                }
            })
            ->editColumn('email', function ($row) {
                if (empty($row->email)) {
                    return '-';
                } else {
                    if (strlen($row->email) > 50) {
                        return substr($row->email, 0, 50) . '...';
                    } else {
                        return $row->email;
                    }
                }
            })
            ->addColumn('action', function ($row) {
                return view(
                    "partials.action",
                    [
                        'currentRoute' => 'admin.users',
                        'row' => $row,
                        'isApproved' => 0,
                        'isDelete' => 1,
                        'isView' => 0,
                        'isEdit' => 0,
                    ]
                )->render();
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
