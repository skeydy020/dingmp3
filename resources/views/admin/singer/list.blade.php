@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên ca sĩ</th>
            <th>Hình ảnh</th>
            <th>Số người theo dõi</th>
            <th>Trang Thái</th>
            <th>Cập Nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($singers as $key => $singer)
            <tr>
                <td>{{ $singer->id }}</td>
                <td>{{ $singer->name }}</td>
               
                <td><a href="{{ $singer->thumb }}" target="_blank">
                        <img src="{{ $singer->thumb }}" height="40px">
                    </a>
                </td>
                <td>{{ $singer->subcriber }}</td>
               
                <td>{!! \App\Helper\Helper::active( $singer->active ) !!}</td>
                <td>{{ $singer->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/singers/edit/{{ $singer->id }}">
                        <i class="fas fa-edit"></i>
                    <!-- </a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{ $singer->id}}, '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a> -->
                    <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow('{{ $singer->id}} ', '/admin/singers/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $singers->links() !!}
@endsection


