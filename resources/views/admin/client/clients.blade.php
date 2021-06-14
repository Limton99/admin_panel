@extends('layout.main')

@section('content')
<div class="card" style="margin: 2%; padding: 2%">

    <section id="row-selection">
        <div>
            <div id="DataTables_Table_4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
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
                                    Имя клиента
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1" colspan="1"
                                    aria-label="">
                                    Город
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1" colspan="1"
                                    aria-label="">
                                    Создан ли профиль
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1"
                                    colspan="1"
                                    aria-label="">
                                    Номер телефон
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1"
                                    colspan="1"
                                    aria-label="">
                                    Потвержден ли телефон
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $data)
                            <tr role="row" class="odd">
                                <td class="sorting_1"><a href="{{route('client', $data->id)}}">{{$data->username}}</a></td>
                                <td>{{$data->city->ru_name}}</td>
                                <td>{{$data->profile}}</td>
                                <td>{{$data->telephone_number}}</td>
                                <td>{{$data->telnum_confirmed}}</td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                        {{$clients->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
