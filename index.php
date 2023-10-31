<?php
$todo_list = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["text"]) && !empty($_POST["text"])) {
        $new_item = $_POST["text"];
        $todo_list[] = $new_item;
    } elseif (isset($_POST["remove"])) {
        $index_to_remove = $_POST["remove"];
        if (isset($todo_list[$index_to_remove])) {
            unset($todo_list[$index_to_remove]);
            $todo_list = array_values($todo_list);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>PHP To-Do List</title>
</head>
<body>

<div class="container">
    <form action="index.php" method="post">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Add a to-do item</label>
            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    <h2>To-Do List</h2>
    <ul id="todo-list" class="list-group rounded-0">
    <?php
        foreach ($todo_list as $index => $item) {
            $text = $item["text"];
            $done = $item["done"] ? "strikethrough" : "";
            echo "<li class='list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2'>
                <div class='d-flex justify-content-between align-items-center' style='width: 80%;'>
                    <p class='todo-text $done'>$text</p>
                    <div class='buttons'>
                        <form method='post' action='index.php' style='display: inline-block;'>
                            <input type='hidden' name='remove' value='$index'>
                            <button type='submit' class='btn btn-danger'>Remove</button>
                        </form>
                        <form method='post' action='index.php' style='display: inline-block;'>
                            <input type='hidden' name='toggle' value='$index'>
                            <button type='submit' class='btn btn-success toggle-button'>Toggle</button>
                        </form>
                    </div>
                </div>
            </li>";
        }
        
        ?>
    </ul>
</div>

<script>
    document.querySelector("form").addEventListener("submit", function (e) {
        e.preventDefault();
        var text = document.querySelector("#exampleFormControlTextarea1").value;
        if (text) {
            var todoList = document.querySelector("#todo-list");
            var listItem = document.createElement("li");

            var todoText = document.createElement("p");
            todoText.className = "todo-text";
            todoText.textContent = text;
            listItem.appendChild(todoText);

            var toggleButton = document.createElement("button");
            toggleButton.textContent = "Toggle";
            toggleButton.className = "btn btn-success toggle-button";
            toggleButton.addEventListener("click", function () {
                todoText.classList.toggle("strikethrough");
            });
            listItem.appendChild(toggleButton);

            var removeButton = document.createElement("button");
            removeButton.textContent = "Remove";
            removeButton.className = "btn btn-danger";
            removeButton.onclick = function () {
                todoList.removeChild(listItem);
            };

            listItem.appendChild(removeButton);
            todoList.appendChild(listItem);
            document.querySelector("#exampleFormControlTextarea1").value = "";
        }
    });
</script>


<style>
    li{
        width:100%;
        height: 50px;
        padding: 20px;
        list-style: none;
        text-transform: Capitalize;
        border-radius: 10px;
        border: 1px solid black;
        display: flex;
        margin-bottom:5px;
        justify-content: space-between;
        align-items: center;
    }
    li button{
        justify-self: end;
        /* display: grid; */
        /* float: right; */
    }
    .strikethrough {
    text-decoration: line-through;
}
</style>
</body>
</html>
