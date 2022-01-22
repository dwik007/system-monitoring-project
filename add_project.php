<?php 

require 'functions.php';

if(isset($_POST['submit'])) {
    $add_data = add_new_project($_POST);
    if($add_data['is_ok'] === true) {
        echo 
            "<script>
                alert('" . $add_data['msg'] . "');
                location.href='index.php';
            </script>";
    }
}

$query = "SELECT * FROM tb_project_leader";

$leader = get_data($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project</title>
</head>
<body>
    <h1>Add New Project</h1>
    <a href="./">Home</a>
    <form action="" method="POST">

        <label for="name">Project name: </label>
        <input type="text" name="name" id="name">

        <label for="client_name">Client name: </label>
        <input type="text" name="client_name" id="client_name">

        <label for="project_leader">Project leader: </label>
        <select name="project_leader" id="project_leader">
            <?php foreach($leader as $row) : ?>
            <option value="<?= $row['id_leader']?>"><?= $row['leader_name']?></option>
            <?php endforeach ?>
        </select>

        <label for="start_date">Start date: </label>
        <input type="date" name="start_date" id="start_date">

        <label for="end_data">End date: </label>
        <input type="date" name="end_date" id="end_date">

        <button type="submit" name="submit">Add new project</button>
    </form>
</body>
</html>