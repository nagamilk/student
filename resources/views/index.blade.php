@extends('layout')
@section('title', 'Student Management System')
@section('content')
  <div class="col-sm-offset-2 col-sm-12 index-container">
    <h1>学生管理システム</h1>
    <div class="btn-container">
      <div class="btn-container-btn">
        <form action="search" method="GET" class="form-horizontal add-student-btn"> 
          <input type="text" name="keyword" id="task-name" class="form-control" value="{{ $keyword ?? '' }}">
          <button type="submit" class="btn btn-default" style="margin-left: 5px;">Search</button>
        </form>
        <form action="add" method="GET" class="form-horizontal add-student-btn" style="margin-left: 10px;"> 
          <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
      </div>
    </div>
    @if (count($students) > 0)
    <div class="panel panel-default" >
      <div class="panel-heading">
        学生リスト
      </div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>学籍番号</th>
              <th>クラス</th>
              <th>名前</th>
              <th>生年月日</th>
              <th>性別</th>
              <th>電話番号</th>
              <th>メールアドレス</th>
            </tr>
          </thead>
          <tbody>
          @foreach( $students as $student )
            <tr>
              <td>{{ $student->student_id }}</td>
              <td>{{ $student->class }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->birthday }}</td>
              <td>{{ $student->gender }}</td>
              <td>{{ $student->phone }}</td>
              <td>{{ $student->email }}</td>
              <td>
                <form action="edit" method="POST">
                  {{ csrf_field() }}
                  <input name="id" value="{{ $student->id }}" style="display:none">
                  <button class="btn btn-success"> Edit </button>
                </form>
              </td>
              <td>
                <form action="delete" method="POST">
                  {{ csrf_field() }}
                  <input name="id" value="{{ $student->id }}" style="display:none">
                  <button class="btn btn-danger"> Delete </button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
       </div>   
    </div>
    @endif
    @if(isset($keyword) && !empty($keyword))
      @if(!$hasResult)
      <div class="alert alert-danger">
      <p>キーワード「"{{ $keyword }}"」に関する情報を持っている生徒はいません</p>
      </div>
      @endif
      <a href="{{ url('/') }}"  ><button class="btn btn-default" style="margin-top: 5px">Go Back</button></a>
    @else
    <div class="panel panel-default">
      <div class="panel-heading">
        Filter
      </div>
      <div class="panel-body">
         <div class="form-group">
            <form action="filter" method="GET" class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="task-name" class=" control-label" style="margin-bottom: 10px;">Filter by</label>
                  <select class="form-control" id="sel1" name="filter_by" style="margin-bottom: 10px;">
                    <option value="name">名前</option>
                    <option value="class">クラス</option>
                    <option value="gender">性別</option>
                  </select>
                  <input type="text" name="content" id="task-name" class="form-control" style="margin-bottom: 10px;">
                  <button type="submit" class="btn btn-primary" >
                    Filter
                  </button>
                </div>
              </div>
            </form>
            <a href="{{ url('/') }}"><button class="btn btn-default">Cancel Filter</button></a>
          </div>   
      </div>    
    </div> 
    @endif
  </div>   
@endsection
