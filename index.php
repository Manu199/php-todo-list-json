<?php

$error_msg = "";

if(isset($_posty["text"])){
    echo "ok";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title  >PHP ToDo List JSON</title>
</head>
<body>
    
<div class="container">
    <form action="index.php">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label fs-1">Example textarea</label>
            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" placeholder="Your text here" rows="3"></textarea>
            <button type="submit" class="btn btn-primary my-3" @release>Submit</button>
        </div>
    </form>
</div>

</body>
</html>