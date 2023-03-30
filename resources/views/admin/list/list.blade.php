@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên list nhạc</th>
            <th>Hình ảnh</th>
            <th>Người tạo</th>
            <th>Trạng Thái</th>
            <th>Cập Nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lists as $key => $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->name }}</td>
               
                <td><a href="{{ $list->thumb }}" target="_blank">
                        <img src="{{ $list->thumb }}" height="40px">
                    </a>
                </td>
                <td>{{ $list->user_id }}</td>
               
                <td>{{ $list->active }}</td>
                <td>{{ $list->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/listdetails/list/{{ $list->id }}">
                        <i class="far fa-clipboard"></i>
    
                    <a class="btn btn-secondary btn-sm" href="/admin/lists/edit/{{ $list->id }}">
                        <i class="fas fa-edit"></i>	
                    <!-- </a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{ $list->id}}, '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a> -->
                    <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow('{{ $list->id}} ', '/admin/lists/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    
@endsection


