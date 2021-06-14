@extends('layout.main')

@section('content')
    <div class="card" style="margin: 2%; padding: 2%">

        <section id="row-selection">
            <div>
                <div id="DataTables_Table_4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <a href="{{route('city-create')}}" class="btn btn-primary">Добавить город</a>
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
                                        Код города
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Название на русском
                                    </th>
                                    <th class="sorting"
                                        tabindex="0"
                                        aria-controls="DataTables_Table_4"
                                        rowspan="1" colspan="1"
                                        aria-label="">
                                        Название на англиском
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
                                @foreach($cities as $data)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$data->iata_code}}</td>
                                        <td>{{$data->ru_name}}</td>
                                        <td>{{$data->en_name}}</td>
                                        <td>
                                            <a href="{{route('city-edit', $data->id)}}" class="btn btn-warning"><i class="icon-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{$cities->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

