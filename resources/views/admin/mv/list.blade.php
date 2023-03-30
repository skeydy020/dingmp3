@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên MV</th>
            <th>Ca sĩ</th>
            <th>Likes</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($mvs as $key => $mv)
            <tr>
                <td>{{ $mv->id }}</td>
                <td>{{ $mv->name }}</td>
                <td>{{ $mv->singer->name }}</td>
                <td>{{ $mv->likes }}</td>
                   
                <td>{!! \App\Helper\Helper::active( $mv->active ) !!}</td>
                <td>{{ $mv->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/mvs/edit/{{ $mv->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{ $mv->id }}', '/admin/mvs/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">  
        {!! $mvs->links() !!}
    </div>
@endsection


