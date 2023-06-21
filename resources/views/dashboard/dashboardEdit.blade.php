@extends('templates.templateAdmin')

@section('css')
@endsection

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"> Dashboard</h1>

        <form action="{{ url('/dashboard/update-user').'/'.base64_encode($data_user->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-xxl-5 ">
                    <label class="form-label" for="first_name">ชื่อ</label> 
                    <input type="text" id="first_name"  name="first_name" class="form-control" value="{{ $data_user->first_name }}" />
                </div>
                <div class="col-xl-6 col-xxl-5 ">
                    <label class="form-label" for="last_name">นามสกุล</label> 
                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $data_user->last_name }}" />
                </div>
                <div class="col-xl-6 col-xxl-5">
                    <label class="form-label" for="position_id">ตำแหน่ง</label> 
                    <select class="form-select mb-3" id="position_id" name="position_id">
                        <option >เลือกตำแหน่ง</option>
                        @foreach ($data_position as $key => $val_position)
                            <option value="{{ $val_position->id }}" {{ $val_position->id == $data_user->position_id ? "selected":"" }}>{{ $val_position->position_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-primary text-sm">บันทึก</button>
            <a href="{{url('/dashboard')}}" class="btn btn-sm btn-warning text-sm">กลับ</a>
        </form>
    </div>


   
@endsection

@section('javascipt')
@endsection
