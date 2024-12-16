<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
    @if (session('status'))
    <div style="color: red">
        {{ session('status') }}
    </div>
@endif
    <table border="1">
<tr>
        <th> S.No </th>
        <th> Name</th>
        <th>Email</th>
        <th>Action</th>

</tr>

</head>
<body>
    <?php 
        $no=1;?>
    @foreach ($register as $item)
        

    <tr>
<td>{{$no++}}</td>
<td>{{$item['name']}}</td>
<td>{{$item['email']}}</td>
<td>
    <a href="<?php echo url('admin/edit',$item->id) ?>">Edit</a>
    {{-- <a href="edit/{{$item->id}}">Edit</a> --}}

    <a href="<?php echo url('delete',$item->id) ?>" onclick="return confirm('Are you sure want to delete-<?php echo $item->id ?>')">Delete</a>
    {{-- <a href="delele/{{$item->id}}">Delete</a> --}} 
</td>
    </tr>

    @endforeach
</body>

</table>
</html>