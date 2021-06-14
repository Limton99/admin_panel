@extends('layout.main')

@section('content')
    <div class="card" style="margin: 2%; padding: 2%">

        <section id="row-selection">
            <div>
                <div id="DataTables_Table_4_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                                        Тип транзакции
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Сумма
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Статус
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Номер заказа
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Дата создания
                                    </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $data)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$data->transaction_type}}</td>
                                        <td>{{$data->sum}}</td>
                                        <td>{{$data->status}}</td>
                                        <td>
                                            <a href="{{route('order', $data->order->id)}}">{{$data->order->order_number}}</a>
                                        </td>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$transactions->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

