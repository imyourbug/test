@extends('admin.main')


@section('content')
    <form action="" class="search m-b-30 m-t-10" style=" width: 60%; margin-left: 200px" >
        <input name="key-search" placeholder="Tìm kiếm "  class="input-search ">
        <button type="submit" class="btn-search">
            <i class="fa fa-search" style="color: #0c84ff" ></i>
        </button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>level</th>
            <th>&nbsp;</th>
        </tr>
        </thead>

        <tbody>
        @foreach($acounts as $key => $acount)
            <tr>
                <td> {{ $acount->id }}</td>
                <td> {{ $acount->name }}</td>
                <td> {{ $acount->email }}</td>
                <td> {{ $acount->level }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/acounts/edit/ {{$acount->id}}">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a class="btn btn-danger btn-sm"
                       href="#" onclick="removeRow({{$acount->id}}, '/admin/acounts/destroy')">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
