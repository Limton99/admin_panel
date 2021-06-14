@extends('layout.main')

@section('content')
    <div class="card" style="margin: 2%; padding: 2%">

        <section id="row-selection">
            <div>
                <div id="DataTables_Table_4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <a href="{{route('admin-register')}}" class="btn btn-primary">Добавить пользователя</a>
                    <div class="row">
                        <br>
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered selection-multiple-rows dataTable" id="DataTables_Table_4" role="grid" aria-describedby="DataTables_Table_4_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="">
                                        Username
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Email
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Действия
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $data)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>
                                            <a href="{{route('admin-edit', $data->id)}}" class="btn btn-warning"><i class="icon-edit"></i></a>
                                            <a href="{{route('admin-delete', $data->id)}}" class="btn btn-danger"><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$admins->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

