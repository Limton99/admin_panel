@extends('layout.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><div id="user-profile">
                <div class="row">
                    <div class="col-12">
                        <div class="card profile-with-cover">
                            <div class="card-img-top img-fluid bg-cover"></div>
                            <div class="media profil-cover-details w-100">
                                <div class="media-left pl-2 pt-2">
                                    <a href="#" class="profile-image">
{{--                                                                                <img src="{{'http://185.22.65.104/'.$client['client']->profile_picture}}" class="rounded-circle img-border height-100" alt="Card image">--}}
                                        <img src="https://en.pimg.jp/068/451/310/1/68451310.jpg" class="rounded-circle img-border height-100" alt="Card image">
                                    </a>
                                </div>
                                <div class="media-body pt-3 px-2">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title">{{$client['client']->username}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <section id="timeline" class="timeline-center timeline-wrapper">
                    <div class="timeline-badge">
                        <span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="" data-original-title="Portfolio project work"><i class="fa fa-plane"></i></span>
                    </div>
                    <div class="flex">
                        <div class="timeline-card card border-grey border-lighten-2" style="height: fit-content">

                            <div class="card-content">
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="profile_info">
                                            <li><b>Город: </b>
                                                {{$client['client']->city->ru_name}}
                                            </li>
                                            <li><b>Номер телефона: </b>
                                                {{$client['client']->telephone_number}}
                                            </li>
                                            <li><b>Создан ли профиль: </b>
                                                {{$client['client']->profile}}
                                            </li>
                                            <li><b>Потвержден ли телефон: </b>
                                                {{$client['client']->telnum_confirmed}}
                                            </li>
                                            <li><b>Количество попыток входа: </b>
                                                {{$client['client']->auth_attempts}}
                                                <a href="{{route('reset-client-attempts', $client['client']->id)}}" class="btn btn-outline-primary">сбросить</a>
                                            </li>
                                            <li>
                                                <a href="{{route('client-transaction', $client['client']->id)}}">Транзакции</a>
                                            </li>

                                        </ul>
{{--                                        <div class="flex" style="margin: 2%">--}}
{{--                                            <li class="pr-1"><a href="#" class="btn btn-warning"><span class="fa fa-thumbs-o-up"></span> Редактировать</a></li>--}}
{{--                                            <li class="pr-1"><a href="#" class="btn btn-danger"><span class="fa fa-commenting-o"></span> Удалить</a></li>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                                <div class="card-footer px-0 py-0">
                                    <div class="card-body">
                                        <div class="media">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        Статус заказа
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
                                        rowspan="1"
                                        colspan="1"
                                        aria-label="">
                                        Сервис
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1"
                                        colspan="1"
                                        aria-label="">
                                        Адресс
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($client['orders'] as $data)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><a href="{{route('order', $data->id)}}">{{$data->order_number}}</a></td>
                                        <td>
                                                {{$data->info->status->name}}
                                        </td>
                                            <td>{{$data->info->service->name}}</td>
                                        <td>{{$data->job_start_date}}</td>

                                        <td>
                                            {{$data->addresses->city->ru_name}}, {{$data->addresses->address}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$client['orders']->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection
