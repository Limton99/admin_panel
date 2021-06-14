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


                    <form class="form" method="POST" action="{{route('alias-store')}}">
                        @csrf
                        <div class="form-body">

                            <div class="form-group">
                                <label for="issueinput1">Название</label>
                                <input type="text" value="" id="issueinput1" class="form-control" placeholder="Название" name="name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>


                            <div class="form-group">
                                <label for="issueinput4">Сервис</label>
                                <select name="service_id" id="issueinput4" class="form-control" >
                                    <option value="" disabled selected>Выберите сервис</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <div class="form-actions">
                            <a href="{{route('aliases')}}" class="btn btn-warning mr-1">
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

