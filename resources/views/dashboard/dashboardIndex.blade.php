@extends('templates.templateAdmin')

@section('css')
@endsection

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"> Dashboard</h1>

        <div class="row">
            <div class="col-xl-12 col-xxl-5 d-flex">
                <div class="table-responsive w-100">
                    <table class="table table-bordered table-hover">
                        <thead class="text-center">
                            <th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>เวลาใช้งานล่าสุด</th>
                            <th>เครื่องมือ</th>
                        </thead>
                        <tbody>
                            @foreach ($data_user as $key => $val_user)
                                <tr>
                                    <td class="text-center text-sm">{{ $key+1 }}</td>
                                    <td class="text-sm">{{ $val_user->first_name }}</td>
                                    <td class="text-sm">{{ $val_user->last_name }}</td>
                                    <td class="text-sm">{{ $val_user->ORMPosition == null? 'ยังไม่พบข้อมูลตำแหน่ง':$val_user->ORMPosition->position_name }}</td>
                                    <td class="text-center text-sm">{{ $val_user->last_login_at != NULL ? date('d-m-Y H:i:s', strtotime($val_user->last_login_at )) : 'ยังไม่ได้ลงชื่อใช้งาน' }}</td>
                                    <td class="text-center text-sm">
                                        <a href="{{ url('/dashboard').'/'.base64_encode($val_user->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                        <a href="{{ url('/dashboard/delete-user').'/'.base64_encode($val_user->id) }}" class="btn round btn-danger btn-sm">ลบ</a>
                                    </td>

                                </tr>
                                
                            @endforeach
                          
                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>


   
@endsection

@section('javascipt')


@endsection
