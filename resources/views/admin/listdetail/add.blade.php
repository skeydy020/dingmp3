@extends('admin.main')
@section('head')
@endsection

@section('content')
    <form action="" method="post">
                <div class="card-body">
                <div class="col-md-6">
                        <div class="form-group">
                            <label>Bài hát</label>
                            <select class="form-control" name="list_id">
                                @foreach($lists as $list)
                                    <option value="{{ $list->id }}">{{ $list->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bài hát</label>
                            <select class="form-control" name="song_id">
                                @foreach($songs as $song)
                                    <option value="{{ $song->id }}">{{ $song->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                    
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @csrf
              </form>
@endsection

@section('footer')
   
@endsection