<?php
session_start()
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student Result</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1006/1006771.png" type="image/x-icon">

</head>

<style>
    html {
        height: 100%;
    }

    body {
        background-image: url("./pic/back.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .blur {
        filter: blur(5px)brightness(90%);
    }

    #fihead {
        font-size: 30px;
        text-align: center;
        font-family: monospace;
        font-weight: bold;

    }

    #flo {
        text-align: center;
    }

    #hea2 {
        font-size: 20px;
        text-align: center;
        font-family: monospace;

    }


    #changecolo {
        color: white;
    }

    .card {
        border-radius: 1rem;
        border: 1px solid transparent;
        backdrop-filter: blur(1rem);
        box-shadow: 1.3rem 1.3rem 1.3rem rgba(0, 0, 0, 0.5);
        border-top-color: rgba(225, 225, 255, 0.5);
        border-left-color: rgba(225, 225, 255, 0.5);
        border-bottom-color: rgba(225, 225, 255, 0.1);
        border-right-color: rgba(225, 225, 255, 0.1);

    }

    #blu {
        background-color: rgba(225, 225, 255, 0.1);
    }

    .datachan {
        font-family: monospace;
        font-weight: bold;
        font-size: 1.5rem;
    }

    #blues {
        background-color: rgba(225, 225, 255, 0.5);
    }
</style>

<body>

    <!-- Student_viewing_model -->

    <div class="modal fade" id="studentVIEWModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="blues">
                <div class="modal-header">
                    <h5 class="modal-title datachan" id="exampleModalLabel">STUDENT DATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="student_viewing_data">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Student_viewing_model -->

    <!-- student edit modal -->

    <div class="modal fade" id="h" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true" role="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="blues">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Edit Student Data </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="code.php" method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="">Roll Number</label>
                            <input type="text" name="roll" id="ed_roll" class="form-control" placeholder="roll number">
                        </div>
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="fname" id="ed_fname" class="form-control" placeholder="full name">
                        </div>
                        <div class="form-group">
                            <label for="">Class</label>
                            <input type="text" name="class" id="ed_class" class="form-control" placeholder="class">
                        </div>
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" name="subct" id="ed_subject" class="form-control" placeholder="subject">
                        </div>
                        <div class="form-group">
                            <label for="">Total Marks</label>
                            <input type="text" name="tmarks" id="ed_tmark" class="form-control" placeholder="total marks">
                        </div>
                        <div class="form-group">
                            <label for="">Obtained Marks</label>
                            <input type="text" name="omarks" id="ed_omark" class="form-control" placeholder="obtained marks">
                        </div>
                        <div class="form-group">
                            <label for="">Grade</label>
                            <input type="text" name="grade" id="ed_grade" class="form-control" placeholder="grade">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_student" class="btn btn-primary edit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- student edit modal -->



    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="blu">
                    <?php
                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Your</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card-header">
                        <h2 id="fihead">Student Results</h2>
                        <!-- Button trigger modal -->
                        <br>
                        <center><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#studentModal">
                                Insert Data Students</button>
                        </center>
                        <br>
                        <!-- Button trigger modal -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-4 col-md-4">
                                <form action="">
                                    <div class="input-group">
                                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="searchbutton">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">CLASS</th>
                                        <th scope="col">SUBJECTS</th>
                                        <th scope="col">TOTAL MARKS</th>
                                        <th scope="col">OBTAINED MARKS</th>
                                        <th scope="col">GRADE</th>
                                        <th scope="col">ACTIONS</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $dbname = "students";
                                    $localhost = "localhost";

                                    $conn = mysqli_connect($localhost, "root", "", $dbname)  or die("Database can't connect");
                                    $sql = "SELECT * FROM `students`;";
                                    $result = mysqli_query($conn, $sql);


                                    // while ($row = mysqli_fetch_array($result))
                                    ?>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '

                                            <tr id="changecolo">
                                                <td class="stud_id">' . $row['roll'] . '</td>
                                                <td>' . $row['fname'] . '</td>
                                                <td>' . $row['class'] . '</td>
                                                <td>' . $row['subct'] . '</td>
                                                <td>' . $row['tmarks'] . ' </td>
                                                <td>' . $row['omarks'] . ' </td>
                                                <td>' . $row['grade'] . ' </td>
                                                <td>
                                                    <a href="edit.php?id=' . $row['roll'] . '"  class ="btn btn-outline-danger">Edit</a>
                                                    <a href="#" class="btn btn-outline-primary veiw">VIEW</a>

                                                    <a href="delete.php?id=' . $row['roll'] . ' "  class="btn btn-outline-danger">DELETE</a>
                                                </td>
                                            </tr>

                                    ';
                                        }
                                    } else {
                                        echo "no data found ";
                                    }
                                    ?>




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true" role="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="blues">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Insert New Student Data </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Roll Number</label>
                            <input type="text" name="roll" class="form-control" placeholder="roll number">
                        </div>
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="full name">
                        </div>
                        <div class="form-group">
                            <label for="">Class</label>
                            <input type="text" name="class" class="form-control" placeholder="class">
                        </div>
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" name="subct" class="form-control" placeholder="subject">
                        </div>
                        <div class="form-group">
                            <label for="">Total Marks</label>
                            <input type="text" name="tmarks" class="form-control" placeholder="total marks">
                        </div>
                        <div class="form-group">
                            <label for="">Obtained Marks</label>
                            <input type="text" name="omarks" class="form-control" placeholder="obtained marks">
                        </div>
                        <div class="form-group">
                            <label for="">Grade</label>
                            <input type="text" name="grade" class="form-control" placeholder="grade">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_student" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <?php
    $search = $_GET['search'] ?? "";

    if ($search != null) {

        $search = $_GET['searchbutton'];
        $sql = "SELECT * FROM students WHERE fname like '%$search%'";
    };

    if (isset($_POST['insert'])) {

        $_POST['roll'];
        $_POST['fname'];
        $_POST['class'];
        $_POST['subct'];
        $_POST['tmarks'];
        $_POST['omarks'];
        $_POST['grade'];
    };



    ?>
    <script>
        $(document).ready(function() {
            // veiw

            $('.veiw').click(function(e) {
                e.preventDefault();

                var stud_id = $(this).closest('tr').find('.stud_id').text();
                $.ajax({
                    type: "Post",
                    url: "code.php",
                    data: {
                        'checking_viewbtn': true,
                        'student_id': stud_id,
                    },
                    success: function(response) {
                        console.log(response)
                        $('.student_viewing_data').html(response);
                        $('#studentVIEWModal').modal('show');
                    }
                });

            });
        });
        // view


        // blur

        $(document).ready(function() {
            $('.modal').on('show.bs.modal', function() {
                    if (!$(this).parent().is('body')) {
                        $(this).appendTo('body');
                    };
                    $(this).removeClass('blur');
                    $('body').children().not(this).addClass('blur');
                })
                .on('hide.bs.modal', function() {
                    var modal = $('.modal.show').not(this);
                    modal = modal.eq(modal.length - 1);

                    var blurItems = $('body').children().not(this);

                    if (modal.length) {
                        modal.removeClass('blur');
                    } else {
                        blurItems.removeClass('blur');
                    };

                });
        });


        // blur
    </script>
</body>

</html>