<?php include '../LoginDB.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <title>E-Campus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <!-- Customized Bootstrap Stylesheet -->
                <link href="../css/bootstrap.min.css" rel="stylesheet">
                    </head>
                    <!--Top Bar START-->
                    <body class="bg-white">
                    <div class="navbar p-0">
                        <div class="col py-2 pl-5">
                            <a href="InstructorPage.php" style="text-decoration: none;">
                                <img class="ml-5 p-0 my-0" src="https://w7.pngwing.com/pngs/751/3/png-transparent-logo-php-html-others-text-trademark-logo-thumbnail.png" style="height: 55px;">
                            </a>
                        </div>
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 mr-5">
                            <li><a class="nav-link text-success border-right"><i class="fa fa-circle mr-1"></i>Available</a></li>
                            <li><a class="nav-link text-gray border-right"><i class="fa fa-phone"></i></a></li>
                            <li><a class="nav-link text-gray border-right"><i class="fa fa-envelope"></i></a></li>
                            <li><a class="nav-link text-gray border-right"><i class="fas fa-user-alt pr-2"></i> <?php echo $_SESSION['iname'] ?> </a></li>
                            <a href="../index.php">
                                <button class="btn " style="height: 40px; width: 100px;">LOGOUT</button>
                            </a>
                        </ul>
                    </div>
                    <div class="container-fluid bg-blue mb-4" style="height: 60px">
                        <div class="container pt-1">
                            <nav class="navbar p-0">
                                <div class="col px-0">
                                    <a href="InstructorPage.php" style="text-decoration: none;">
                                        <button class="btn btn-blue btn-block mb-0" style="height: 50px;">Home</button>
                                    </a>
                                </div>
                                <div class="col px-0">
                                    <a href="" style="text-decoration: none;">
                                        <button class="btn btn-blue btn-block mb-0" style="height: 50px;">Academic Calendar</button>
                                    </a>
                                </div>
                                <div class="col px-0">
                                    <a href="" style="text-decoration: none;">
                                        <button class="btn btn-blue btn-block mb-0" style="height: 50px;">Course Schedule</button>
                                    </a>
                                </div>
                                <div class="col px-0">
                                    <a href="" style="text-decoration: none;">
                                        <button class="btn btn-blue btn-block mb-0" style="height: 50px;">Course Archive</button>
                                    </a>
                                </div>
                                <div class="col px-0">
                                    <a href="" style="text-decoration: none;">
                                        <button class="btn btn-blue btn-block mb-0" style="height: 50px;">Registration Help</button>
                                    </a>
                                </div>
                                <div class="col px-0">
                                    <a href="" style="text-decoration: none;">
                                        <button class="btn btn-blue btn-block mb-0" style="height: 50px;">User Guides</button>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!--Top Bar START--> 

                    <div class="container mb-5" style="min-height: 50vh; min-width: 90vw">
                        <div class="row">
                            <div class="col bg-white">
                                <div class="card">
                                    <div class="card-header bg-blue text-white">
                                        <h4 class="text-light" style="height: 8px; font-family: Arial; font-size:18px">Projects Working On</h4>
                                    </div>
                                    <li class="list-group-item border px-3 pb-3 pt-1">
                                        <?php
                                        $instructorNumber = $_SESSION['issn'];
                                        $sql = "SELECT P.pName, subject, budget, startDate, endDate, PI.workinghour "
                                                . "FROM project P,  project_has_instructor PI "
                                                . "WHERE PI.pName = P.pName AND PI.issn = '$instructorNumber'"
                                                . "ORDER BY startDate";
                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            echo "<br>"
                                            . "<table class='col text-dark' border='1' cellspacing='2' cellpadding='20'>"
                                            . "<tr>"
                                            . "<th>Project Name</th>"
                                            . "<th>Subject</th>"
                                            . "<th>Budget</th>"
                                            . "<th>Start Date</th>"
                                            . "<th>End Date</th>"
                                            . "</tr>";

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>       
                                                <tr>
                                                    <td>
                                                        <?php echo $row['pName']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['subject']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['budget']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['startDate']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['endDate']; ?>
                                                    </td>
                                                </tr>      
                                                <?php
                                            }
                                        }
                                        ?>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    </body>
                    </html>