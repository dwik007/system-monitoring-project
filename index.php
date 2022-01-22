<?php 
require 'functions.php';

$query = "SELECT * FROM tb_project INNER JOIN tb_project_leader ON tb_project.id_leader = tb_project_leader.id_leader";

$project = get_data($query);

if(isset($_GET['delete_id'])) {
    $id_project = $_GET['delete_id'];
    $delete_status = delete_project($id_project);
    if($delete_status > 0) {
        echo 
            "<script>
                alert('Berhasil menghapus data');
                location.href='index.php';
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Monitoring Project</title>
    <link rel="stylesheet" href="./css/output.css">
</head>
<body class="bg-light-blue">

    <h1 class="text-center text-lg font-semibold text-gray-600 mb-10">Project Monitoring</h1>

    <a class="justify-center bg-blue-500 text-white font-semibold px-4 py-1 rounded-lg w-11/12 ml-24" href="./add_project.php"><span class="text-center">Add project</span></a>

    <div class="bg-white w-11/12 mx-auto p-4 rounded-md mt-8">
        <table class="w-full">
            <thead class="bg-soft-gray h-[50px] text-left">
                <tr class="text-gray-600 base-text">
                    <th class="px-6">PROJECT NAME</th>
                    <th class="px-6">CLIENT</th>
                    <th class="px-6">PROJECT LEADER</th>
                    <th class="px-6">START DATE</th>
                    <th class="px-6">END DATE</th>
                    <th class="px-6">PROGRESS</th>
                    <th class="px-6">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($project as $row) : ?>
                    <tr class="h-[75px] text-gray-600 justify-center">
                        <td class="px-6"><?= $row['project_name']?></td>
                        <td class="px-6"><?= $row['client_name']?></td>
                        <td class="px-6" class="flex flex-row">
                            <img class="w-10 h-10 rounded-full" src="./img/<?= $row['img_profile_leader']?>" alt="">
                            <div class="flex flex-col">
                                <p><?= $row['leader_name']?></p>
                                <p><?= $row['leader_email']?></p>
                            </div>
                            
                        </td>
                        <td class="px-6"><?= date("d M Y", strtotime($row['start_date']))?></td>
                        <td class="px-6"><?= date("d M Y", strtotime($row['end_date']))?></td>
                        <td class="">
                            <div class="leading-[25px] h-[10px] block bg-gray-400 rounded-lg w-8/12">
                                <div class="bg-blue-600 leading-[25px] h-[10px] block rounded-lg" style="width: <?= $row['progress']?>%"></div>
                            </div>
                            <p class="w-4/12"><?= $row['progress'] . " %"?></p>
                        </td>
                        
                        
                        <td class="px-6 flex items-center space-x-1">
                            <a href="index.php?delete_id=<?= $row['id_project']?>" onclick="alert('Apakah anda yakin akan menghapus project?')"><img class="w-6 h-6 bg-red-500 rounded-md p-1" src="./img/icon/trash.svg" alt="Trash Icon"></a>
                            <a href="edit_project.php?project_id=<?= $row['id_project']?>"><img class="w-6 h-6 bg-green-500 rounded-md p-1" src="./img/icon/pencil.svg" alt="Trash Icon"></a>
                        </td>
                    </tr>

                <?php endforeach ?>
                
            </tbody>
        </table>
    </div>
    
    <div class="w-11/12 text-right mt-10">
        <p class="text-gray-500 text-sm">Created by:</p>
        <p class="text-gray-600 font-bold">Dwi Nur Firmanto</p>
    </div>
    
</body>
</html>