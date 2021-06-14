@extends('layout.main')

@section('content')
    <div class="flex">
        <div class="aliases card" >
            @foreach($categories as $data)
                <li class="alias">
                    <a href="{{route('services', ['category_id'=>$data->id])}}">{{$data->name}}</a>
                </li>
            @endforeach
        </div>
        <div class="card" style="margin: 2%; padding: 2%; width: -webkit-fill-available;">
            <section id="row-selection">
                <div>
                    <div id="DataTables_Table_4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <a href="{{route('service-create')}}" class="btn btn-primary">Добавить услугу</a>
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
                                            Цена
                                        </th>
                                        <th class="sorting"
                                            tabindex="0"
                                            aria-controls="DataTables_Table_4"
                                            rowspan="1" colspan="1"
                                            aria-label="">
                                            Категория
                                        </th>
                                        <th class="sorting"
                                            tabindex="0"
                                            aria-controls="DataTables_Table_4"
                                            rowspan="1" colspan="1"
                                            aria-label="">
                                            Юнит
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
                                    @foreach($services as $data)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$data->name}}</td>
                                            <td>{{$data->price}}</td>
                                            <td>{{$data->category->name}}</td>
                                            <td>{{$data->unit_label}}</td>
                                            <td>
                                                <a href="{{route('service-edit', $data->id)}}" class="btn btn-warning"><i class="icon-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {{$services->links("pagination::bootstrap-4")}}
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
{{--        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
{{--                        <h4 class="modal-title">Modal title</h4>--}}
{{--                    </div>--}}
{{--                    <form action="{{route('alias-store')}}" class="form" method="POST">--}}
{{--                        @csrf--}}
{{--                    <div class="modal-body">--}}
{{--                            <div class="form-body">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="name">Наименование</label>--}}
{{--                                    <input type="text" name="name" id="name" class="form-control">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="service">Сервис</label>--}}
{{--                                    <select name="service_id" id="service" class="form-control">--}}
{{--                                        @foreach($allServices as $data)--}}
{{--                                            <option value="{{$data->id}}">{{$data->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>--}}
{{--                        <button type="submit" class="btn btn-primary">Добавить</button>--}}
{{--                    </div>--}}
{{--                    </form>--}}
{{--                </div><!-- /.modal-content -->--}}
{{--            </div><!-- /.modal-dialog -->--}}
{{--        </div><!-- /.modal -->--}}
    </div>
@endsection



