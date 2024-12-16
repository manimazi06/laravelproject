<h5>Create user</h5>
<form action="save" method="POST">
    <label>Name</label>
<input type="text" name="name" id="name">
<label>Email</label>
<input type="text" name="email" id="email">

<input type="submit" name="submit" value="save">
@csrf
</form>