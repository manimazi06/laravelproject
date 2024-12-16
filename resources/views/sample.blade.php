<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample</title>
</head>
<body>
    <h2><?php echo $title;?></h2>

    <form action="<?php echo url('get-user-data') ?>" method="post">
<input type="text" name="name">
<input type="hidden" name="_token" value="<?php echo csrf_token()?>">

<input type="submit" value="submit">
</form>
</body>
</html>