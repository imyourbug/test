@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 80px">ID</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Ảnh danh mục</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            {!! App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection
