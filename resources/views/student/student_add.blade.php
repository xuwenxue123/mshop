<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生管理系统</title>
</head>
<body>
    <form action="{{url('student_add_do')}}" method="post">
    @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
               @foreach ($errors->all() as $error)
                  <marquee behavior="" direction="">{{$error}}</marquee>
               @endforeach
         </ul>
      </div>
  @endif
    @csrf
        <table>
           <tr>
              <td>学生姓名</td>
              <td><input type="text" name="name"></td>
           </tr>
           <tr>
              <td>学生年龄</td>
              <td><input type="text" name="age"></td>
           </tr>
           <tr>
              <td>学生性别</td>
              <td>
                 <input type="radio" name="sex" value="男">男
                 <input type="radio" name="sex" value="女">女
              </td>
           </tr>
           <tr>
              <td></td>
              <td><input type="submit" value="添加"></td>
           </tr>
        </table>
    </form>
</body>
</html>