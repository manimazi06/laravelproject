<h5>Edit user</h5>


<form action="<?php echo url('update',$register->id) ?>" method="POST">
    <label>Name</label>
<input type="text" name="name" id="name" value="<?php echo $register['name']; ?>">
<label>Email</label>
<input type="text" name="email" id="email" value="<?php echo $register['email']; ?>">

<input type="submit" name="submit" value="save">
@csrf
</form>