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


                    <form class="form" method="POST" action="{{route('admin-update', $admin->id)}}">
                        @csrf
                        <div class="form-body">

                            <div class="form-group">
                                <label for="issueinput1">Имя</label>
                                <input type="text" id="issueinput1" value="{{$admin->name}}" class="form-control" placeholder="Имя" name="name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput3">Почта</label>
                                <input type="text" id="issueinput3" value="{{$admin->email}}" class="form-control" placeholder="Почта" name="email" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>

                            <div class="form-group">
                                <label for="issueinput4">Пароль</label>
                                <input type="password" id="issueinput4" class="form-control" placeholder="Пароль" name="password" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>
                            <div class="form-group">
                                <label for="issueinput4">Потвердить пароль</label>
                                <input type="password" id="issueinput4" class="form-control" placeholder="Потвердить пароль" name="confirmPassword" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-original-title="" title="" required>
                            </div>
                            @if($errors->any())
                                {!! implode('', $errors->all('<div style="color: red">:message</div>')) !!}
                            @endif



                        </div>

                        <div class="form-actions">
                            <a href="{{route('services')}}" class="btn btn-warning mr-1">
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

