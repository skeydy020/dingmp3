@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên MV</label>
                        <input type="text" name="name" value="{{ $mv->name }}" class="form-control"
                               placeholder="Nhập tên MV">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ca sĩ</label>
                        <select class="form-control" name="singer_id">
                            @foreach($singers as $singer)
                                <option value="{{ $singer->id }}" {{ $mv->singer_id == $singer->id ? 'selected' : '' }}>
                                    {{ $singer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">likes</label>
                        <input type="number" name="likes" value="{{ $mv->likes }}"  class="form-control" >
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ $mv->description }}</textarea>
            </div>

            

            <div class="form-group">
                <label for="menu">Ảnh MV</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $mv->thumb }}" target="_blank">
                        <img src="{{ $mv->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $mv->thumb }}" id="thumb">
            </div>
            <div class="form-group">
                <label>link </label>
                <textarea name="link" class="form-control">{{ $mv->link }}</textarea>
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $mv->active == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $mv->active == 0 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật MV</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
