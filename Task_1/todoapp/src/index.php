<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ./login.php');
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TodoApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-image: url('https://www.vietnamworks.com/hrinsider/wp-content/uploads/2023/12/hay-vung-tin-vao-nhung-uoc-mong-ban-da-gui-den-vu-tru.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh; width: 100vw;">
    <nav class="navbar bg-body-tertiary">
        <form class="container-fluid justify-content-end" action="./logout.php" method="post">
            <button type="submit" class="btn btn-outline-success me-2 justify-content-end" type="button"> Logout</button>
        </form>
    </nav>
    <h1 class="text-center  py-3" style="color: #ffffff;"> 🦄 Welcome TodoList App, <?php echo $_SESSION['username'] ?> !</h1>
    <div class="w-50 m-auto mb-4 " style="border-radius: 10px; border: 2px solid black;">
        <p class="bg-success p-2 text-dark bg-opacity-50" style="border-radius: 10px 10px 0px 0px;" style="color: #ffffff;">New Task</p>
        <div style="margin: 20px;">
            <form action="./create.php" method="post" autocomplete="off">
                <input type="hidden" name="session_id" value="<?php echo $_SESSION['id']; ?>">
                <label for="title" class="form-label" style="color: #ffffff;">Task: </label>
                <input class="form-control" type="text" name="title" id="title" required placeholder="thêm task mới tại đây"></br>
                <button class="btn btn-success">
                    + Add Task
                </button>
            </form>
        </div>
        </<br>


    </div>
    </<br>
    <div class="w-50 m-auto mb-4 " style="border-radius: 10px;border: 2px solid black;">
        <p class="bg-success p-2 text-dark bg-opacity-50" style="border-radius: 10px 10px 0px 0px;">Current Tasks</p>
        <div style="margin: 20px;">

            <div style="height: 200px; overflow-y: auto;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tasks</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'database.php';
                        // echo $_SESSION['id'];
                        // echo $_SESSION['username'];
                        $user_id =  $_SESSION['id'];
                        $sql = "SELECT * FROM user_task WHERE user_id = $user_id";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $task_id = $row['task_id'];
                                $user_id = $row['user_id'];
                                $title = $row['task'];
                                // echo $title;
                                // echo $task_id;
                                // echo $user_id;
                        ?>

                                <tr>
                                    <th><?php echo $task_id; ?></th>
                                    <td><?php echo $title; ?></td>
                                    <td>

                                        <a href="./delete.php?task_id=<?php echo $task_id ?>&user_id=<?php echo $user_id ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        </<br>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>