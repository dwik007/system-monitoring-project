<?php 

require 'functions.php';

$project_id = $_GET['project_id'];

if(isset($_POST['edit'])) {
    $edit_data = edit_project($project_id, $_POST);
    if($edit_data['is_ok'] === true) {
        echo 
            "<script>
                alert('" . $edit_data['msg'] . "');
                location.href='index.php';
            </script>";
    }
}

$project = get_data("SELECT * FROM tb_project WHERE id_project = '$project_id'");

$leader = get_data("SELECT * FROM tb_project_leader");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit project</title>
</head>
<body>
    <h1>Edit Project</h1>
    <a href="./">Home</a>
    <form action="" method="POST">
        <?php foreach($project as $row) : ?>

            <label for="name">Project name: </label>
            <input type="text" name="name" id="name" value="<?= $row['project_name']?>">

            <label for="client_name">Client name: </label>
            <input type="text" name="client_name" id="client_name" value="<?= $row['client_name']?>">

            <label for="project_leader">Project leader: </label>
            <select name="project_leader" id="project_leader">
                <?php foreach($leader as $row1) : ?>
                <option value="<?= $row1['id_leader']?>"><?= $row1['leader_name']?></option>
                <?php endforeach ?>
            </select>

            <label for="start_date">Start date: </label>
            <input type="date" name="start_date" id="start_date" value="<?= $row['start_date']?>">

            <label for="end_data">End date: </label>
            <input type="date" name="end_date" id="end_date" value="<?= $row['end_date']?>">

            <label for="progress">Progress</label>
            <input type="text" name="progress" id="progress" value="<?= $row['progress']?>">

        <?php endforeach ?>
        

        <button type="submit" name="edit" onclick="alert('Apakah anda yakin ingin mengubah project?')">Edit project</button>
    </form>
    
</body>
</html>