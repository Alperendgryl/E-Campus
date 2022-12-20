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
            <!-- Customized Bootstrap Stylesheet -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
                </head>

                <body class="bg-white">
                <section class="text-center">
                    <div class="card-body py-5 px-md-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="fw-bold mb-5 text-uppercase text-dark">REGISTER</h2>
                                <form action="RegisterDB.php" method="post">

                                    <!-- Role input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="role" class="form-control" placeholder="Role" required/>
                                    </div>
                                    <!-- Role input -->

                                    <!-- SSN input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="ssn" class="form-control" placeholder="Social Security Number" required/>
                                    </div>
                                    <!-- SSN input -->

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required/>
                                    </div>
                                    <!-- Password input -->

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-blue btn-block mb-4">REGISTER</button>   
                                    <!-- Submit button -->

                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
                </body>
                </html>