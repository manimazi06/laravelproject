



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (session('status'))
    <div style="color: red">
        {{ session('status') }}
    </div>
@endif
<div class="container col-md-12 offset-1">
    <h3>User Registration</h3><br/>
    <table border="1" class="table table-striped m-3">
<tr class="text-center">
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
        

    <tr class="text-center">
<td>{{$no++}}</td>
<td>{{$item['name']}}</td>
<td>{{$item['email']}}</td>
<td>
    <a href="#" class="btn btn-outline-primary" onclick="clickit('{{$item['id']}}')">Edit</a>
    {{-- <a href="<?php echo url('ajaxdata',$item->id) ?>" class="btn btn-outline-primary" onclick="clickit('{{$item['id']}}')">Edit</a> --}}
    {{-- <a href="edit/{{$item->id}}">Edit</a> --}}

    <a href="<?php echo url('delete',$item->id) ?>" class="btn btn-outline-primary" onclick="return confirm('Are you sure want to delete-<?php echo $item->name ?>')">Delete</a>
    {{-- <a href="edit/{{$item->id}}">Edit</a> --}} 
</td>
    </tr>

    @endforeach
</body>

</table>
</div>

<div id="modal-add-unsent" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade col-lg-12">
    <div class="modal-dialog" style="max-width:50%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form add-unsent-form">

                </div>
            </div>
        </div>
    </div>
</div>
</html>

<script>
// function clickit()
// {
//     alert('hi');
// }


function clickit(val) {
        var val;
        //  alert(val);
            //    var val=$('{{$item['name']}}').val();
            //    alert(val);
        $(".add-unsent-form").html("<span class='text-center'>Fetching data!!!</span>");
        $("#modal-add-unsent").modal('show');

        $.ajax({
            async: true,
            dataType: "html",
            type: "get",
            url: '<?php echo url('ajaxdata/') ?>'+ '/'+val,
            // beforeSend: function(xhr) {
            // xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            // },
            success: function(data, textStatus) {
                //alert(data);
                $(".add-unsent-form").html(data);
            }
        });

    }
    </script>