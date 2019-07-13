<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生管理系统</title>
</head>
<body>
    <form action="{{url('student_edit_do')}}" method="post">
    <input type="hidden" name="id" value="{{$info->id}}">
    @csrf
        <table>
           <tr>
              <td>学生姓名</td>
              <td><input type="text" name="name" value="{{$info->name}}"></td>
           </tr>
           <tr>
              <td>学生年龄</td>
              <td><input type="text" name="age" value="{{$info->age}}"></td>
           </tr>
           <!-- <tr>
              <td>学生性别</td>
              <td>
                 
                 <input type="radio" name="sex"  {if $info.sex=='男'}checked{/if}>男
                 <input type="radio" name="sex"  {if $info.sex=='女'}checked{/if}>女
              </td>
           </tr> -->
           <tr>
              <td></td>
              <td><input type="submit" value="修改"></td>
           </tr>
        </table>
    </form>
</body>
</html>