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


                    <form class="form" method="POST" action="{{route('serviceCategories-update', $category->id)}}">
                        @csrf
                        <div class="form-body">

                            <div class="form-group">
                                <label for="issueinput1">Название</label>
                                <input type="text" value="{{$category->name}}" id="issueinput1" class="form-control" placeholder="Название" name="name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput3">Коммиссия</label>
                                <input type="number" value="{{$category->сommission}}" id="issueinput3" class="form-control" placeholder="Коммиссия" name="сommission" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput4">Цена визита</label>
                                <input type="number" value="{{$category->visit_price}}" id="issueinput4" class="form-control" placeholder="Цена визита" name="visit_price" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput5">Цена коммиссии</label>
                                <input type="number" value="{{$category->visit_commision}}" id="issueinput5" class="form-control" placeholder="Цена коммиссии" name="visit_commision" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>


                        </div>

                        <div class="form-actions">
                            <a href="{{route('serviceCategories')}}" class="btn btn-warning mr-1">
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

