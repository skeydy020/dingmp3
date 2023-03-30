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
                        <label for="menu">Tên bài hát</label>
                        <input type="text" name="name" value="{{ $song->name }}" class="form-control"
                               placeholder="Nhập tên bài hát">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ca sĩ</label>
                        <select class="form-control" name="singer_id">
                            @foreach($singers as $singer)
                                <option value="{{ $singer->id }}" {{ $song->singer_id == $singer->id ? 'selected' : '' }}>
                                    {{ $singer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                        <label>Album</label>
                        <select class="form-control" name="album_id">
                        <option value="0"> Không thuộc album nào</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->id }}" {{ $song->album_id == $album->id ? 'selected' : '' }}>
                                    {{ $album->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="menu_id">
                        <option value="0"> Không thuộc thể loại nào</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $song->menu_id == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">likes</label>
                        <input type="number" name="likes" value="{{ $song->likes }}"  class="form-control" >
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ $song->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Lời bài hát </label>
                <textarea name="lyric" class="form-control">{{ $song->lyric }}</textarea>
            </div>

            

            <div class="form-group">
                <label for="menu">Ảnh bài hát</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $song->thumb }}" target="_blank">
                        <img src="{{ $song->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $song->thumb }}" id="thumb">
            </div>
            <div class="form-group">
                <label for="menu">Bài hát</label>
                <input type="file"  class="form-control" id="upload2">
                <div id="mp3_show">
                <a href="{{ $song->link }}" target="_blank">
                    <audio controls><source src="{{ $song->link }}" type="audio/mpeg"></audio>
                 </a>
                </div>
                <input type="hidden" name="link" value="{{ $song->link }}" id="link">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $song->active == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $song->active == 0 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật bài hát</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('lyric');
    </script>
@endsection
