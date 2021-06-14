@extends('layout.main')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="container-fluid">
                        <div class="card card-blue" style="padding: 15px">
                            <div class="card-header">
                                <h3 class="card-title">Изменить пароль</h3>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{route('reset-run')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Текущий пароль</label>
                                                <input type="password"
                                                       autocomplete="on"
                                                       class="form-control"
                                                       name="oldPassword"
                                                       placeholder="Введите текущий пароль ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Введите новый пароль</label>
                                                <input type="password"
                                                       class="form-control"
                                                       autocomplete="on"
                                                       name="newPassword"
                                                       placeholder="Введите новый пароль...">
{{--                                                <label class="col-form-label text-danger">Пароль должен быть больше 8 символов</label>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Повторите новый пароль</label>
                                                <input type="password"
                                                       class="form-control"
                                                       autocomplete="on"
                                                       name="confirmNewPassword"
                                                       placeholder="Повторите новый пароль...">
{{--                                                <label>Пароли не совпадают</label>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button
                                            type="submit" class="btn btn-primary">Обновить
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
