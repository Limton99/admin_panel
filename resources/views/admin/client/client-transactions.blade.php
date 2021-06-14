@extends('layout.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div id="user-profile">
                <section id="timeline" class="timeline-center timeline-wrapper">
                    <h1>Баланс на щете: {{$client['client']->wallets->balance}}</h1>
                        <div class="card" style="padding: 20px; margin-left: 10px">
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
                                        Статус транзакции
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Сумма транзакции
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1"
                                        colspan="1"
                                        aria-label="">
                                        Метод оплаты
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($client['transactions'] as $data)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><a href="{{route('order', $data->id)}}">{{$data->order_number}}</a></td>
                                        @foreach($data->transaction as $transaction)
                                            <td>
                                                {{$transaction->status}}
                                            </td>
                                            <td>{{$transaction->sum}}</td>
                                            <td>{{$transaction->paymentMethod->label}}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$client['transactions']->links("pagination::bootstrap-4")}}
                        </div>
                </section>
            </div>

        </div>
    </div>
@endsection
