@extends('admin.main')

@section('content')
    <a href='/admin/listdetails/add'>
    <button >Thêm bài hát vào list nhạc</button>
    </a>

    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên bài hát</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($listdetails as $key => $listdetail)
            <tr>
                <td>{{ $listdetail->id }}</td>
                <td>{{ $listdetail->song->name }}</td>
                   
                <td>{!! \App\Helper\Helper::active( $listdetail->active ) !!}</td>
                <td>{{ $listdetail->updated_at }}</td>
                <td>
                    
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{ $listdetail->id }}', '/admin/listdetails/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $listdetails->links() !!}
    </div>
@endsection


