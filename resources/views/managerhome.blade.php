@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; padding-right: 5%;"><h5>Список заявок</h5><a href="{{url('arhive')}}">Архив</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-Light" role="alert">
                        <div class="table-responsive">
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <th>ID</th>
                                <th>Тема</th>
                                <th>Сообщение</th>
                                <th>Имя клиента</th>
                                <th>Почта клиента</th>
                                <th>Файл</th>
                                <th>Время создания</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->tema }}</td>
                                    <td><textarea style="border:none; resize: none; width: 100%">{{ $order->messages }}</textarea></td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td><a href="{{ $order->files }}" target="_blank">Файл</a></td>
                                    <td>{{ $order->created_at }}</td>
                                    <td><a href="{{url('order',[$order->id])}}" class="btn btn-primary">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
