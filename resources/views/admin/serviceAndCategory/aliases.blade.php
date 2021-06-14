@extends('layout.main')

@section('content')
    <div class="card" style="margin: 2%; padding: 2%">

        <section id="row-selection">
            <div>
                <div id="DataTables_Table_4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <a href="{{route('alias-create')}}" class="btn btn-primary">Добавить псевдоним</a>
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
                                        Название
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Сервис
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Категория сервиса
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Дата создания
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
                                @foreach($alias as $data)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$data->name}}</td>
                                        <td>{{$data->service->name}}</td>
                                        <td>{{$data->service->category->name}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <a href="{{route('alias-edit', $data->id)}}" class="btn btn-warning"><i class="icon-edit"></i></a>
                                            <a href="{{route('alias-delete', $data->id)}}" class="btn btn-danger"><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$alias->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

