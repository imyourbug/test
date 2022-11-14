@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            @include('admin.alert')

            <div style="display: flex; justify-content: space-between">
                <div class="form-group" style="width: 48%">
                    <label for="menu">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="menu" name="name"
                           placeholder="Nhập tên sản phẩm" value="{{ old('name') }}" >
                </div>

                <div class="form-group" style="width: 48%">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="menu_id" id="menu_id">
                        @foreach($menus as $menu)
                            <option value="{{$menu->id}}">{{$menu->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div style="display: flex; justify-content: space-between">
                <div class="form-group"style="width: 48%">
                    <label for="menu">Giá gốc</label>
                    <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                </div>

                <div class="form-group" style="width: 48%">
                    <label for="menu">Giá sale</label>
                    <input type="number" class="form-control" name="price_sale" value="{{ old('price_sale') }}" >
                </div>
            </div>


            <div class="form-group">
                <label for=""> Mô tả </label>
                <textarea type="text" class="form-control"  name="description" placeholder="Mô tả" id="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for=""> Mô tả chi tiết </label>
                <textarea type="text" class="form-control" id="content"  name="content" placeholder="Mô tả chi tiết" >{{ old('content') }}</textarea>
            </div>




            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label for=""> Kích hoạt </label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit"  class="btn btn-primary">Thêm sản phẩm</button>
        </div>

        @csrf
    </form>

@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
