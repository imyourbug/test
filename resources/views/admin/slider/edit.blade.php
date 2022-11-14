@extends('admin.main')


@section('content')
    <form action="" method="post">
        <div class="card-body">
            @include('admin.alert')

            <div style="display: flex; justify-content: space-between">
                <div class="form-group" style="width: 48%">
                    <label for="menu">Tiêu đề</label>
                    <input type="text" class="form-control" id="menu" name="name"
                           value="{{ $slider->name }}" >
                </div>

                <div class="form-group" style="width: 48%">
                    <label for="">URL</label>
                    <input type="text" class="form-control" name="url"
                           value="{{ $slider->url }}" >
                </div>
            </div>

            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $slider->thumb }}">
                        <img src="{{ $slider->thumb }}" height="40px" alt="">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label for="menu">Sắp xếp</label>
                <input type="number" class="form-control" name="sort_by" value="{{ $slider->sort_by }}">
            </div>



            <div class="form-group">
                <label for=""> Kích hoạt </label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $slider->active == 1 ? 'checked=""':'' }}
                    >
                    <label for="active" class="custom-control-label">Có</label>
                </div>

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $slider->active == 0 ? 'checked=""':'' }}
                    >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit"  class="btn btn-primary">Cập nhật slider</button>
        </div>

        @csrf
    </form>

@endsection

