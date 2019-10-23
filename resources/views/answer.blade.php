@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ответ</div>
					<div class="alert alert-Light">
					   <form action="{{url('answer',[$id])}}" method="POST" enctype="multipart/form-data">
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
					        <div class="form-group text-right">
					            <button type="submit" class="btn btn-primary">Отправить</button>
					        </div>
					    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection