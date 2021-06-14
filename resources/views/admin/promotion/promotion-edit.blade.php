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


                    <form class="form" method="POST" action="{{route('promotion-update', $promotion->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">

                            <div class="form-group">
                                <label for="issueinput1">Загаловок</label>
                                <input type="text" id="issueinput1" value="{{$promotion->banner->title}}" class="form-control" placeholder="Загаловок" name="title" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput3" class="formFile">Картинка</label>
                                <input type="file" id="issueinput3" name="image_banner">
                            </div>

                            <div >
                                <img src="{{$promotion->banner->image}}" alt="banner_image" style="max-height: 400px">
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="issueinput3" class="formFile">Картинка списка</label>
                                <input type="file" id="issueinput3" name="image_structure">
                            </div>

                            <div >
                                <img src="{{$promotion->data->image}}" alt="banner_image" style="max-height: 400px">
                            </div>

                            <div class="form-group">
                                <label for="issueinput4">Заголовок списка</label>
                                <input type="text" id="issueinput4" value="{{$promotion->data->title}}" class="form-control" placeholder="Заголовок списка" name="title_list_main" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>
                            </div>

                            <hr>

                            <div class="paragraph" id="paragraph">
                                @foreach($promotion->data->list as $list)
                                    <div class="form-group">
                                        <label for="issueinput5">Заголовок пункта</label>
                                        <input type="text" value="{{$list->title}}" id="issueinput5" class="form-control" placeholder="Заголовок пункта" name="list_title[]" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="">
                                    </div>

                                    <div class="form-group">
                                        <label for="issueinput6">Текст пункта</label>
                                        <textarea name="list_text[]" id="issueinput6" class="form-control">{{$list->text}}</textarea>
                                    </div>
                                @endforeach
                            </div>
                            <a href="" class="more btn btn-outline-primary">+</a>
                            <hr >

                            <div class="form-group">
                                <label for="issueinput5">Дата начала</label>
                                <input type="date" id="issueinput5" value="{{\Carbon\Carbon::parse($promotion->from)->format('Y-m-d')}}" class="form-control" placeholder="Дата начала" name="from" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>
                            </div>
                            <div class="form-group">
                                <label for="issueinput6">Дата окончания</label>
                                <input type="date" id="issueinput6" value="{{\Carbon\Carbon::parse($promotion->to)->format('Y-m-d')}}" class="form-control" placeholder="Дата окончания" name="to" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput7">Активна</label>
                                <select name="active" id="issueinput7" class="form-control">
                                    @if($promotion->active)
                                        <option value="true" selected>Да</option>
                                        <option value="false">Нет</option>
                                    @else
                                        <option value="true">Да</option>
                                        <option value="false" selected>Нет</option>
                                    @endif
                                </select>
                            </div>



                        </div>

                        <div class="form-actions">
                            <a href="{{route('promotions')}}" class="btn btn-warning mr-1">
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

