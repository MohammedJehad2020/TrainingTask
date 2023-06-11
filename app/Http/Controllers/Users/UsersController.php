<?php

namespace App\Http\Controllers\Users;
// require_once 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequests;
use App\Http\Requests\UserRequests;
use App\Models\Address;
use App\Models\User;
use App\Notifications\UserLoginDetails;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    protected $model = User::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query()->orderBy('id','desc')->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' =>$item->name,
                    'image'=> $item->image ? asset('storage/uploads/users-images/'.$item->image) : asset('assets/media/avatars/blank.png'),
                    'email' =>$item->email,
                    'last_login' => Carbon::parse($item?->last_login_at)->diffForHumans(), //,
                    'joined_date'=> $item->created_at->format('d-m-Y'),
                    'status' => $item?->status,
                ];
            })->toArray();
            $data =  response()->json( DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkboxes','dashboard.users.datatables.checkbox')
                ->addColumn('action', 'dashboard.users.datatables.action') 

                ->addColumn('status_user','dashboard.users.datatables.status_user')
                ->rawColumns(['action', 'checkboxes','status_user'])
                ->make(true));
                return $data->original;
        }

        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequests $request)
    {
        $password =Str::password(10);
        $req = $request->merge(['password'=> $password]);
        $obj = parent::saveModel($req, $this->model, 'uploads/users-images/');
        
        if($request->id == null){
           // $obj->notify(new UserLoginDetails($obj, $password));
           $this->generateQrCode($obj->id);
          }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    //     $user = User::findOrFail($request->id);
    //     $obj = parent::saveModel($request, $this->model, 'uploads/users-images/');
    //     $this->updateOrCreateAddress($request);
    }

    public function destroy( $id)
    {
            $item = User::find($id);
            $item->delete();
            return true;
    }
    public function del_ids(Request $request)
    {
        $item = User::whereIn('id', $request->ids)->delete();
        return true;
    }

    public function generateQrCode($userId)
    {
        $baseUrl = url("users/". $userId);
        $profileUrl = $baseUrl . $userId;

        $qrCode = QrCode::format('png')->size(300)->generate($profileUrl);

        // $imagePath = 'public/qrcodes/qrcode.png';

        // Storage::put($imagePath, $qrCode);

       header('Content-Type: image/png');

         $filename = "profile_".$userId."_qr.png";
         $qrCodeImagePath = 'QrProfileImages/'. $filename;

         Storage::disk('public')->put($qrCodeImagePath, file_get_contents($qrCode));
    }
}
