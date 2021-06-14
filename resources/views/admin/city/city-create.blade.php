@extends('layout.main')

@section('content')
    <div>
        <div class="card" style="margin: 50px">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-tooltip">Create</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">


                    <form class="form" method="POST" action="{{route('city-store')}}">
                        @csrf
                        <div class="form-body">

                            <div class="form-group">
                                <label for="issueinput1">Код города</label>
                                <input type="text" id="issueinput1" class="form-control" placeholder="Код города" name="iata_code" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput3">Название на русском</label>
                                <input type="text" id="issueinput3" class="form-control" placeholder="Название на русском" name="ru_name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput4">Название на англиском</label>
                                <input type="text" id="issueinput4" class="form-control" placeholder="Название на англиском" name="en_name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>
                            </div>



                        </div>

                        <div class="form-actions">
                            <a href="{{route('cities')}}" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="icon-check2"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

