@extends('layout.main')

@section('content')
    <div class="card" style="margin: 2%">
        <div class="card-header">
            <h4 id="basic-forms" class="card-title">{{$order->order_number}}</h4>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-body collapse in" aria-expanded="true">
            <div class="card-block">
                <p><b>Дата создания заказа: </b>{{$order->created_at}}</p>
                <p><b>Статус заказа: </b>
                        {{$order->info->status->name}}
                </p>
                <p><b>Адрес заказа: </b>
                        {{$order->addresses->address}}
                </p>
                <p><b>Услуга: </b>
                        {{$order->info->service->name}}
                </p>
                <p><b>Дата исполнения: </b>{{$order->job_start_date}}</p>
                <br>
                <p><b><h5>Исполнитель:</h5></b></p>
                <p><b>Имя исполнителя : </b>
                        {{$order->info->specialist_name}}
                    </p>
                <p><b>Cтатус исполнителя : </b>
                        {{$order->info->specialist_status}}
                </p>

{{--                <br>--}}
{{--                <p><b><h5>Отзыв по заказу:</h5></b></p>--}}
{{--                <p><b>Имя исполнителя : </b>--}}
{{--                    @foreach($order->info as $info)--}}
{{--                        {{$info->specialist->username}}--}}
{{--                    @endforeach--}}
{{--                </p>--}}
{{--                <p><b>Cтатус исполнителя : </b>--}}
{{--                    @foreach($order->info as $info)--}}
{{--                        {{$info->specialistStatus->label}}--}}
{{--                    @endforeach--}}
{{--                </p>--}}
                <br>
                <p><b><h5>Оплата:</h5></b></p>
                @foreach($order->transaction as $transaction)
                    <p><b>Статус оплаты: </b>
                            {{$transaction->status}}
                    </p>
                    <p><b>Метод оплаты: </b>
                            {{$transaction->paymentMethod->label}}
                    </p>
                    <p><b>Сумма оплаты: </b>
                            {{$transaction->sum}}
                    </p>
                @endforeach

                <br>
                <p><b><h5>Список прикрепленных смет:</h5></b></p>
                @foreach($order->estimates as $estimate)
                <p><b>Дата создания: </b>
                        {{$estimate->created_at}}
                </p>
{{--                <p><b>Услуги сметы: </b>--}}
{{--                    @foreach($estimate->estimateService as $service)--}}
{{--                        {{$service->name}}--}}
{{--                    @endforeach--}}
{{--                </p>--}}
                <p><b>Сумма: </b>
                        {{$estimate->total_amount}}
                </p>
                <p><b>Метод оплаты : </b>
                        {{$estimate->paymentMethod_name}}
                </p>
                <p><b>Статус сметы: </b>
                        {{$estimate->estimateStatus->label}}
                </p>
                    <p><b>Полная информация: </b>
                        <br>
                        @foreach(json_decode($estimate->data) as $data)
                            <b>Название: </b> {{$data->name}}
                            &nbsp;
                            <b>Цена: </b> {{$data->price}}
                            <br>
                        @endforeach
                    </p>
                    <hr>
                @endforeach


            </div>
        </div>
    </div>
@endsection
