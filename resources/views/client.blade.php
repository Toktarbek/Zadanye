@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" id="opros" style="display: none;">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;"><h5>Список запросов</h5>
                    <button class="btn btn-primary" id="btn1">Подать заявку</button>
                </div>

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
                                <th>Файл</th>
                                <th>Время создания</th>
                                <th>Тема отвата</th>
                                <th>Ответ</th>
                                <th>Время ответа</th>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($data as $dd)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $dd->tema }}</td>
                                    <td><textarea style="border:none; resize: none; width: 100%">{{ $dd->messages }}</textarea></td>
                                    <td><a href="{{ $dd->files }}" target="_blank">Файл</a></td>
                                    <td>{{ $dd->created_at }}</td>
                                    <td>{{ $dd->anstema }}</td>
                                    <td><textarea style="border:none; resize: none; width: 100%">{{ $dd->answer }}</textarea></td>

                                    <td>{{ $dd->ansdate }}</td>
                                </tr>
                                <?php $i++ ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-8" id="zaiavka" style="display: none;">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h5>Заявка</h5>
                    <button class="btn btn-primary" id="btn2">Список запросов</button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
@if($check==false)
<div class="alert alert-Light">
    <form action="{{url('send')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Тема</span>
            </div>
            <input type="text" class="form-control" name="tema" id="tema" required>
        </div>
        <div class="form-group">
          <label for="messages">Сообщение:</label>
          <textarea class="form-control" rows="5" id="messages" name="messages" required></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Файл</span>
            </div>
            <input type="file" class="form-control" name="files" id="files" required>
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </form>
</div>
@else
<div class="alert alert-success" role="alert">
    Ваша заявка успешно отправлена следующее будеть завтра.
</div>
@endif
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        var data = @json($data);
        var len = data.length;

        if (len > 0) {
           $("#opros").show();
           $("#zaiavka").hide();
        }else{
           $("#opros").hide();
           $("#zaiavka").show();
        }

      $("#btn1").click(function(){
        $("#opros").hide();
        $("#zaiavka").show();
      });
      $("#btn2").click(function(){
        $("#opros").show();
        $("#zaiavka").hide();
      });
    });
</script>
@endsection
