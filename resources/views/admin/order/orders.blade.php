@extends('layout.main')

@section('content')
    <div class="card" style="margin: 2%; padding: 2%">

    <section id="row-selection">
        <div>
            <div id="DataTables_Table_4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <form class="form-inline" method="GET" action="{{url()->current()}}">
                    <div class="form-group" style="    display: flex; justify-content: flex-end;">
                        <select class="form-control" id="perPage" name="perPage">
                            <option value="15" @if($perPage == 15) selected @endif >15</option>
                            <option value="25" @if($perPage == 25) selected @endif >25</option>
                            <option value="50" @if($perPage == 50) selected @endif >50</option>
                        </select>
                    </div>
                </form>
                <br>
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
                                    Номер заказа
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1" colspan="1"
                                    aria-label="">
                                    Дата начала заказа
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1" colspan="1"
                                    aria-label="">
                                    Создание заказа
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1" colspan="1"
                                    aria-label="">
                                    Статус заказа
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1"
                                    colspan="1"
                                    aria-label="">
                                    Имя создателя заказа
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1"
                                    colspan="1"
                                    aria-label="">
                                    Адрес
                                </th>
                                <th class="sorting"
                                    tabindex="0"
                                    aria-controls="DataTables_Table_4"
                                    rowspan="1"
                                    colspan="1"
                                    aria-label="">
                                    Название услуги
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $data)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><a href="{{route('order', $data->id)}}">{{$data->order_number}}</a></td>
                                        <td>{{$data->job_start_date}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                                {{$data->info->status->name}}
                                        </td>
                                        <td>{{$data->client->username}}</td>
                                        <td>
                                            {{$data->addresses->city->ru_name}}, {{$data->addresses->address}}
                                        </td>
                                        <td>
                                                {{$data->info->service->name}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{$orders->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>

    </section>
    </div>
@endsection
