@extends('layouts\app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <style>

    </style>
@endsection

@section('content')

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
                <li class="breadcrumb-item active" aria-current="page">聯絡表單管理</li>
            </ol>
        </nav>

        {{-- <a href="/admin/contacts/create" class="btn btn-success sm-3 mb-3">新增聯絡表單</a> --}}

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>主旨</th>
                    <th>問題描述</th>
                    <th>姓名</th>
                    <th>電話號碼</th>
                    <th>地址</th>
                    <th>信箱</th>
                    <th>狀態</th>
                    <th width="100">功能</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->content }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->phoneNumber }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->status }}</td>

                        <td>
                            <a href="contacts/edit/{{ $contact->id }}" class="btn btn-sm btn-primary">編輯</a>
                            <button class="btn btn-sm btn-danger btn-delete"
                                data-contact_id="{{ $contact->id }}">刪除</button>
                            {{-- <button class="btn btn-sm btn-danger">刪除</button>
                            --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>主旨</th>
                    <th>問題描述</th>
                    <th>姓名</th>
                    <th>電話號碼</th>
                    <th>地址</th>
                    <th>信箱</th>
                    <th>狀態</th>
                    <th>功能</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();

            //刪除按鈕套用sweetAlert2
            $("#example").on("click", ".btn-delete", function() {
                var contact_id = this.dataset.contact_id;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire(
                        // 'Deleted!',
                        // 'Your file has been deleted.',
                        // 'success'
                        // )
                        window.location.href = `/admin/contacts/destroy/${contact_id}`;

                    }
                })
            })
        });

    </script>
@endsection
