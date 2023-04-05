@extends('layout')
@section('title', 'Add Student')
@section('content')
<div class="col-sm-offset-2 col-sm-8">
  <div class="panel panel-default panel-default-top">
    <div class="panel-heading">
     <p>学生追加</p>
    </div>
    <div class="panel-body">
      <form name="add-form" action="addStudent" method="POST" class="form-add" onsubmit="return validateForm()">
        @csrf
        <div class="mb-3">
          <label for="student_id" class="form-label">学籍番号<span class="required"> *</span></label>
          <input type="text" class="form-control" id="student_id" name="student_id">
        </div>
        <div class="mb-3">
          <label for="class" class="form-label">クラス<span class="required"> *</span></label>
          <input type="text" class="form-control" id="class" name="class">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">名前<span class="required"> *</span></label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
          <label for="birthday" class="form-label">生年月日<span class="required"> *</span></label>
          <input type="date" class="form-control" id="birthday" name="birthday">
        </div>
        <div class="mb-3">
          <label for="gender" class="form-label">性別<span class="required"> *</span></label>
          <select class="form-control" id="gender" name="gender">
            <option>男性</option>
            <option>女性</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">電話番号</label>
          <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">メールアドレス</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn2 btn-primary">Add Student</button>
      </form>
      <a href="{{ url('/') }}"  ><button class="btn btn-default" style="margin-top: 15px">Go Back</button></a>
    </div>

  </div>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    <script>
      $(document).ready(function(){
        setTimeout(function(){
          $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
          });
        }, 3000);
      });
    </script>
  @endif
</div>  
<script>
    function validateForm() {
        var student_id = document.forms["add-form"]["student_id"].value;
        var class_name = document.forms["add-form"]["class"].value;
        var name = document.forms["add-form"]["name"].value;
        var birthday = document.forms["add-form"]["birthday"].value;
        var phone = document.forms["add-form"]["phone"].value;
        var email = document.forms["add-form"]["email"].value;
        if (student_id == "") {
            alert("学籍番号を入力してください");
            return false;
          }else if(student_id.length > 10) {
            alert("学籍番号が無効です。10文字以内で入力してください");
            return false;
        }
        if (class_name == "") {
            alert("クラスを入力してください");
            return false;
          }else if(class_name.length > 5) {
            alert("クラスが無効です。5文字以内で入力してください");
            return false;
        }
        if (name == "") {
            alert("名前を入力してください");
            return false;
          } else if (!/^[\u3040-\u309f\u30a0-\u30ff\u3400-\u4dbf\u4e00-\u9fff\w\s]+$/.test(name)) {
            alert("「無効な名前です。日本語の漢字、ひらがな、カタカナ、および英数字とスペースのみを入力してください」");
            return false;
        }else if(name.length > 50) {
            alert("無効な名前です。50文字以内で入力してください");
            return false;
        }
        if (birthday == "") {
            alert("生年月日を入力してください");
            return false;
        }
        if (phone && !/^\d+$/.test(phone)) {
            alert("電話番号が無効です。番号のみを入力してください");
            return false;
        }else if(phone.length > 11) {
            alert("無効な名前です。11番号以内で入力してください");
            return false;
        }
        if (email && !/^\S+@\S+\.\S+$/.test(email)) {
            alert("正しいメールアドレスを入力してください");
            return false;
        }else if(email.length > 100) {
            alert("無効なメールアドレスです。100文字以内で入力してください");
            return false;
        }
    }
</script>
@endsection
