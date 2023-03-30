@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên bài hát</th>
            <th>Ca sĩ</th>
            <th>Album</th>
            <th>Thể loại</th>
            <th>Likes</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($songs as $key => $song)
            <tr>
                <td>{{ $song->id }}</td>
                <td>{{ $song->name }}</td>
                <td>{{ $song->singer->name }}</td>
                <td>{{ $song->album->name }}</td>
                <td>{{ $song->menu->name }}</td>
                <td>{{ $song->likes }}</td>
                   
                <td>{!! \App\Helper\Helper::active( $song->active ) !!}</td>
                <td>{{ $song->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/songs/edit/{{ $song->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{ $song->id }}', '/admin/songs/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $songs->links() !!}
    </div>
@endsection


