<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Modules\HR\Entities\Experience;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $model;
    protected $columns;
    protected $where;
    protected $with = "";


    public function saveModel(Request $request, $model, $imagePath)
    {
        if (Arr::get($request->all(), 'id')) {
            $obj = $model::findOrFail(Arr::get($request->all(), 'id'));
        } else {
            $obj = new $model();
        }

        if($request->avatar_remove == '1'){
            $path = $imagePath . $obj->image;
            if(Storage::disk('public')->exists($path)){
                Storage::disk('public')->delete($path);
                $obj->image = null;
            }
        }

        if (Arr::has($request->all(), 'image')) {
            $file = $request->image;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $path = $imagePath. $fileName;
            Storage::disk('public')->put($path, file_get_contents($file));
            $obj->image = $fileName;
        }
        if ($obj instanceof User && Arr::has($request->all(), 'password')) {
            if($request->password)
            $obj->password = \Hash::make($request->password);
        }
        $obj->forceFill(Arr::except($request->all(), ['image','file', 'permissions', '_token', 'password', 'avatar_remove']));
        $obj->save();

        // if ($obj instanceof User && Arr::has($request->all(), 'permissions')) {
        //     $obj->syncPermissions($request->permissions);
        // }
        return $obj;

    }

    public function destroyModel($id, $model)
    {
        $model::destroy([$id]);
        return 'ok';
    }
    public function dataJson(Request $request)
    {
        $valid_columns = $this->columns;

        $columns = $request->get('columns');
        $draw = intval($request->get('draw'));
        $start = intval($request->get('start'));
        $length = intval($request->get('length'));
        $order_column_id = $request->get('order')[0]['column'];
        $order = $columns[$order_column_id]['data'];
        $order = in_array($order, $valid_columns) ? $order : 'id';
        $dir = $request->get('order')[0]['dir'];
        $dir = in_array($dir, ['desc', 'asc']) ? $dir : 'desc';
        $q = new $this->model;
        if($this->model == Page::class)
        $count_all = $this->model::where('custom',0)->count();
        else
        $count_all = $this->model::count();
        $query = $this->filter($q);

        $count_filtered = $query->count();
        $some = $query->offset($start)
            ->limit($length)
            ->orderBy($order, $dir)->get();


        $response = [
            "draw" => $draw,
            "recordsTotal" => $count_all,
            "recordsFiltered" => $count_filtered,
            "data" => $some->toArray(),
        ];

        return json_encode($response);
    }

    public function filter($q)
    {

    }
    protected function createGateUnauthorizedException(
        $ability,
        $arguments,
        $message = 'This action is unauthorized.',
        $previousException = null
    ) {
        throw $previousException;
    }
}
