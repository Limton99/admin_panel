@extends('layout.main')

@section('content')
    <div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-tooltip">EDIT</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">


                    <form class="form">
                        <div class="form-body">

                            <div class="form-group">
                                <label for="issueinput1">Номер заказа</label>
                                <input type="text" id="issueinput1" class="form-control" placeholder="Номер заказа" name="issuetitle" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title" data-original-title="" title="">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="issueinput3">Дата начала заказа</label>
                                        <input type="date" id="issueinput3" class="form-control" name="dateopened" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened" data-original-title="" title="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="issueinput4">Создание заказа</label>
                                        <input type="date" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed" data-original-title="" title="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issueinput2">Адрес</label>
                                <input type="text" id="issueinput2" class="form-control" placeholder="Адрес" name="openedby" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Opened By" data-original-title="" title="">
                            </div>




                            <div class="form-group">
                                <label for="issueinput5">Статус заказа</label>
                                <input type="text" id="issueinput5" class="form-control" placeholder="Статус заказа" name="issuetitle" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title" data-original-title="" title="">
                            </div>

                            <div class="form-group">
                                <label for="issueinput6">Название услуги</label>
                                <input type="text" id="issueinput6" class="form-control" placeholder="Название услуги" name="issuetitle" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title" data-original-title="" title="">
                            </div>


                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="icon-cross2"></i> Cancel
                            </button>
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
