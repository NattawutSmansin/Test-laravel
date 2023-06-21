<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\UserModel;
use App\Models\PositionModel;

class DashboardController extends Controller
{
    public $user_model;
    public $position_model;
    public $dt_now;
    function __construct()
    {
        $this->user_model = new UserModel();
        $this->position_model = new PositionModel();
        $this->dt_now = Carbon::now();
    }

    public function IndexDashboard()
    {
        $data_user = $this->user_model->GetDataUser();
        $data_position = $this->position_model->GetDataPosition();

        return view('dashboard/dashboardIndex', compact('data_user', 'data_position'));
    }

    public function EditDasboardPage($user_id=null)
    {
        if($user_id == null) {return back()->with('error', 'ไม่พบข้อมูล');};
        $data_position = $this->position_model->GetDataPosition();
        $data_user = $this->user_model->GetDataUser(base64_decode($user_id));
        return view('dashboard/dashboardEdit', compact('data_user', 'data_position'));
    }

    public function DeleteDasboard($user_id = null)
    {
        if($user_id == null) {return back()->with('error', 'ไม่พบข้อมูล');};
        $user_id = base64_decode($user_id);
        $this->user_model->DeleteDataUser($user_id);

        return back()->with('success', "ลบสำเร็จ");

    }

    public function EditDasboard(Request $request, $user_id = null)
    {
        if($user_id == null) {return back()->with('error', 'ไม่พบข้อมูล');};
        $user_id = base64_decode($user_id);
        $list_arr = [
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "position_id" => $request->position_id,
            "updated_at" => $this->dt_now
        ];

        $this->user_model->UpdateDataUser($user_id, $list_arr);

        return back()->with('success', "บันทึกสำเร็จ");
    }
}
