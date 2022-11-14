@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            @include('admin.alert')
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input value="{{$menu->name}}" type="text" class="form-control" id="menu" name="name" placeholder="Nhập tên danh mục" >
            </div>

            <div class="form-group">
                <label for="">Danh mục</label>
                <select class="form-control" name="parent_id" id="parent_id">
                    <option value=" {{$menu->parent_id == 0 ? 'selected': ''}}>">Danh mục cha</option>
                    @foreach($menus as $menuParent)
                        <option value="{{$menuParent->id}}"
                            {{$menu->parent_id == $menuParent->id ? 'selected': ''}}>
                            {{$menuParent->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for=""> Mô tả </label>
                <textarea type="text" class="form-control"  name="description" placeholder="Mô tả" >
                    {{$menu->description}}
                </textarea>
            </div>

            <div class="form-group">
                <label for=""> Mô tả chi tiết </label>
                <textarea type="text" class="form-control" id="content"  name="content" placeholder="Mô tả chi tiết" >
                    {{$menu->content}}
                </textarea>
            </div>

            <div class="form-group">
                <label for="">Ảnh danh mục</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $menu->thumb }}" target="_blank">
                        <img src="{{ $menu->thumb }}" width="60px" height="60px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{ $menu->thumb }}">
            </div>

            <div class="form-group">
                <label for=""> Kích hoạt </label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{$menu->active == 1 ? 'checked' : ''}}
                    >
                    <label for="active" class="custom-control-label">Có</label>
                </div>

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{$menu->active == 0 ? 'checked' : ''}}
                    >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit"  class="btn btn-primary">Cập nhật danh mục</button>
        </div>

        @csrf
    </form>

@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection

