@extends('layout.main')

@section('content')
    <div class="card" style="margin: 2%; padding: 2%">

        <section id="row-selection">
            <div>
                <div id="DataTables_Table_4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <a href="{{route('promotion-create')}}" class="btn btn-primary">Добавить акцию</a>
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
                                        Картинка
                                    </th>
                                    <th class="sorting_asc"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="">
                                        Загаловок
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Дата начала
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Дата окончания
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
                                @foreach($promotions as $data)
                                    <tr role="row" class="odd">
                                            <td class="sorting_1" style="text-align: center"><img src="{{$data->banner->image}}" alt="banner_image" style="max-height: 100px"></td>
                                            <td class="sorting_1">{{$data->banner->title}}</td>
                                        <td>{{\Carbon\Carbon::parse($data->from)->format('Y-m-d')}}</td>
                                        <td>{{\Carbon\Carbon::parse($data->to)->format('Y-m-d')}}</td>
                                        <td>
                                            <a href="{{route('promotion-edit', $data->id)}}" class="btn btn-warning"><i class="icon-edit"></i></a>
                                            <a href="{{route('promotion-delete', $data->id)}}" class="btn btn-danger"><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$promotions->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

