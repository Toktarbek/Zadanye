@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Выполнить заявку</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-Light" role="alert">
                        <form action="{{url('orser/update',[$id])}}" method="POST">
                            {{csrf_field()}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Имя клиента</span>
                                </div>
                                <input type="text" class="form-control" value="{{$orders->name}}" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Почта клиента</span>
                                </div>
                                <input type="text" class="form-control" value="{{$orders->email}}" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Дата</span>
                                </div>
                                <input type="text" class="form-control" value="{{$orders->created_at}}" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Тема</span>
                                </div>
                                <input type="text" class="form-control" value="{{$orders->tema}}" readonly>
                            </div>
                            <div class="form-group">
                              <label for="messages">Сообщение:</label>
                              <textarea class="form-control" rows="5" readonly>{{$orders->messages}}</textarea>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Файл</span>
                                </div>
                                <div style="border:solid 1px #ccc;" class="form-control">
                                    <a href="{{url($orders->files)}}" target="_blank">
                                        Ссылка на прикрепленный файл
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ответ</button>
                                <a href="{{url('/')}}" class="btn btn-danger">Отмена</a>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
