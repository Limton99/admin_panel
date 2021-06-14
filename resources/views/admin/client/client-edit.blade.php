@extends('layout.main')

@section('content')
    <div>
        <div class="card" style="margin: 50px">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-tooltip">Edit</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">


                    <form class="form" method="POST" action="{{route('client-update', $service->id)}}">
                        @csrf
                        <div class="form-body">

                            <div class="form-group">
                                <label for="issueinput1">Название</label>
                                <input type="text" id="issueinput1" value="{{$service->name}}" class="form-control" placeholder="Название" name="name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput3">Цена</label>
                                <input type="number" id="issueinput3" value="{{$service->price}}" class="form-control" placeholder="Цена" name="price" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput4">Описание</label>
                                <textarea id="issueinput4" class="form-control" placeholder="Описание" name="description" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>{{$service->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="issueinput4">Категория</label>
                                <select name="service_category_id" id="issueinput4" class="form-control" >
                                    @if($service->category)
                                        <option value="{{$service->service_category_id}}" selected>{{$service->category->name}}</option>
                                    @else
                                        <option value="" disabled selected>Выберите категорию</option>
                                    @endif
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="issueinput4">Юнит</label>
                                <select name="unit_id" id="issueinput4" class="form-control" >
                                    @if($service->unit)
                                        <option value="{{$service->unit_id}}" selected>{{$service->unit->label}}</option>
                                    @else
                                        <option value="" disabled selected>Выберите категорию</option>
                                    @endif
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->label}}</option>
                                    @endforeach
                                </select>
                            </div>



                        </div>

                        <div class="form-actions">
                            <a href="{{route('clients')}}" class="btn btn-warning mr-1">
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

