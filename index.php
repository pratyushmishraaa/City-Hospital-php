<?php
session_start();

// Check if the user is logged in (authenticated)
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;

    // Redirect to the login page
    header('Location: login.php');
    exit; // Terminate script execution after the redirect
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Hospital🏥</title>

    <!-- aos css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- magnific popup css cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- bootstrap cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">

    <!-- font awesome cdn link  -->


    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include CountUp.js library -->
    <script src="https://cdn.jsdelivr.net/npm/countup.js@2.0.7/dist/countUp.min.js"></script>




</head>

<body>





    <!-- header section starts  -->

    <header>
        <div class="container">
            <a href="#" class="logo"><span>C</span>ity<span>H</span>ospital</a>
            <nav class="nav">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#facility">Facility</a></li>
                    <li><a href="#review">Review</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="#post">Post</a></li>


                </ul>
            </nav>


            <?php if ($isLoggedIn) : ?>
                <div class="user-menu">
                    <span class="user-name">Hello, <?php echo $username; ?>!</span>
                    <a href="logout.php" class="signout-button"> Sign Out
                    </a>
                </div>
            <?php else : ?>
                <div class="user-menu">
                    <a href="login.php" class="signin-button">Sign In</a>
                </div>
            <?php endif; ?>

        </div>


    </header>

    <!-- header section ends  -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="container">


            <div class="row min-vh-100 align-items-center text-center text-md-left">

                <div class="col-md-6 pr-md-5" data-aos="zoom-in">
                    <img src="img/home.png" width="100%" alt="">
                </div>

                <div class="col-md-6 pl-md-5 content" data-aos="fade-left">
                    <h1 style="text-shadow: 2px 1px 3px #0188DF;"><span style="text-shadow: 2px 1px 3px ;">City</span> <span>Hospital, </span> <span>Welcomes You.</span> </h1>
                    <h3 style="text-shadow:2px 1px 3px #354046;">We Are There For You.</h3>
                    <a href="appointment.php"><button class="button">Take Appointment</button></a>
                    <a href="ambulance.php"><button class="button">Book Ambulance</button></a>
                </div>

            </div>

        </div>

    </section>


    <!-- home section ends -->

    <!-- about section start  -->

    <section class="about" id="about">

        <div class="container">
            <h1 class="heading">About Us</h1>


            <div class="row min-vh-100 align-items-center">

                <div class="col-md-6 content" data-aos="fade-right">

                    <div class="box">
                        <h3> <a href="ambulance.php"> <i class="fas fa-ambulance"></i> ambulance services </h3></a>
                        <p>24 * 7 Ambulance Service facility is available in Our Hospital </p>
                    </div>

                    <!-- <div class="box">
                        <h3> <i class="fas fa-procedures"></i> emergency rooms </h3>
                        <p>We Provide 100+ Emergency Wards </p>
                    </div> -->

                    <div class="box">
                        <h3> <a href="checkup.php"> <i class="fas fa-stethoscope"></i> free check-ups </h3></a>
                        <p>Our Hospital Organises free check-up camps every month</p>
                    </div>

                </div>

                <div class="col-md-6 d-none d-md-block" data-aos="fade-left">
                    <img id="nur" src="img/nurse-2019420_640.jpg" width="100%" alt="">
                </div>

            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- facility section starts  -->

    <section class="facility" id="facility">

        <div class="container">

            <h1 class="heading">Our Facilities</h1>

            <div class="box-container">

                <div class="box" data-aos="zoom-in">
                    <a href="img/our team.jpg" title="our team">
                        <img src="img/our team.jpg" alt="">
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="img/our lab.jpg" title="our lab">
                        <img src="img/our lab.jpg" alt="">
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="img/emergency rooms.jpg" title="emergency rooms">
                        <img src="img/emergency rooms.jpg" alt="">
                    </a>
                </div>


                <div class="box" data-aos="zoom-in">
                    <a href="img/ambulance.jpg" title=" 24*7 Ambulance Services">
                        <img src="img/ambulance.jpg" alt="">
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="img/bed.jpg" title="Enough beds">
                        <img src="img/bed.jpg" alt="">
                    </a>
                </div>

                <div class="box" data-aos="zoom-in">
                    <a href="img/mri.jpg" title="MRI Service">
                        <img src="img/mri.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- facility section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <div class="container">

            <h1 class="heading"> People's Review</h1>

            <div class="box-container">

                <div class="box" data-aos="fade-right">
                    <p>Recently visited health check up department of City Hospital for a whole body check up. The entire process from check in to the end was seamless. The staff at the health check department was courteous, helpful and very attentive. I would highly recommend this hospital to anyone looking for something similar services.</p>
                    <h3>Vikas</h3>
                    <span>jan 5, 2021</span>
                    <img src="img/vikas.jpeg" alt="">
                </div>

                <div class="box" data-aos="fade-up">
                    <p>Recently visited health check up department of City Hospital for a whole body check up. The entire process from check in to the end was seamless. The staff at the health check department was courteous, helpful and very attentive. I would highly recommend this hospital to anyone looking for something similar services.</p>
                    <h3>Piyush</h3>
                    <span>jan 7, 2021</span>
                    <img src="img/piyush.jpeg" alt="">
                </div>

                <div class="box" data-aos="fade-left">
                    <p>Dr. Shree kumar Reddy is very experienced opthalmologist doctor . I have been consulting him for 10+ years for me, family and my Friends. He did cataracts surgery for my mother and now she can see like a normal person.</p>
                    <h3>Vimal</h3>
                    <span>jan 10, 2021</span>
                    <img src="img/vimal.jpeg" alt="">
                </div>

            </div>

        </div>

    </section>

    <!-- review section ends  -->

    <!-- counter section starts  -->


    <section class="counter">
        <div class="container">
            <div class="box-container">
                <?php
                // counters and target values
                $counters = array(
                    'hospitals' => 10,
                    'staff' => 4000,
                    'patients' => 10000,
                    'beds' => 2500
                );

                foreach ($counters as $key => $target) {
                    $iconClass = '';


                    switch ($key) {
                        case 'hospitals':
                            $iconClass = 'fas fa-hospital';
                            break;
                        case 'staff':
                            $iconClass = 'fas fa-user';
                            break;
                        case 'patients':
                            $iconClass = 'fas fa-procedures';
                            break;
                        case 'beds':
                            $iconClass = 'fas fa-bed';
                            break;
                    }


                    echo "<div class='box' data-aos='fade-up'>
                    <i class='$iconClass'></i>
                    <span class='counter-value' data-target='{$target}'>0</span>
                    <h3>{$key}</h3>
                </div>";
                }
                ?>
            </div>
        </div>
    </section>


    <script>
        // JavaScript to start the counters
        var counters = document.querySelectorAll('.counter-value');
        counters.forEach(function(counter) {
            var target = parseInt(counter.getAttribute('data-target'));
            var count = 0;
            var increment = 1; // You can adjust the increment value
            var speed = 15; // You can adjust the animation speed in milliseconds

            var updateCounter = function() {
                if (count < target) {
                    count += increment;
                    counter.textContent = count;
                    setTimeout(updateCounter, speed);
                } else {
                    counter.textContent = target;
                }
            };

            updateCounter();
        });
    </script>

    <!-- counter section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">


        <div class="container min-vh-100">

            <div class="row justify-content-center">

                <h1 class="heading"> Contact Us </h1>

                <div class="col-md-10" data-aos="flip-down">

                    <form action="contact.php" method="POST">

                        <div class="inputBox">
                            <input type="text" placeholder="Full Name" name="full_name">
                            <input type="number" placeholder="Enter Your Phone" name="phone">
                        </div>

                        <div class="inputBox">
                            <input type="email" placeholder="Your Email" name="email">
                            <input type="text" placeholder="Enter Your Address" name="address">
                        </div>

                        <textarea name="query" cols="30" rows="10" placeholder="Mention The Query"></textarea>
                        <input type="Submit" name="submit" value="Submit" class="button">

                    </form>


                </div>

            </div>

        </div>

    </section>

    <!-- contact section ends -->

    <!-- post section starts  -->

    <section class="post" id="post">


        <div class="container min-vh-100">

            <h1 class="heading"> out posts </h1>

            <div class="box-container">


                <div class="box" data-aos="fade-right">
                    <img src="img/post1.jpg" alt="">
                    <div class="content">
                        <span>jan 5, 2021</span>
                        <a href="blog1.php">
                            <h3>Bacteria Testing: A Closer Look into Microbial Analysis</h3>
                        </a>
                        <p>
                            Bacteria are microscopic organisms that play a significant role in various aspects of our lives, from aiding digestion to causing infections. Whether you're in the food industry, healthcare, or simply concerned about the quality of your environment, bacteria testing is a crucial process that helps maintain public health and safety.
                        </p>
                        <a href="blog1.php"><button class="button">learn more</button></a>
                    </div>
                </div>

                <div class="box" data-aos="fade-up">
                    <img src="img/post2.jpg" alt="">
                    <div class="content">
                        <span>jan 5, 2021</span>
                        <a href="blog2.php">
                            <h3>Corona virus</h3>
                        </a>
                        <p>
                            The coronavirus, officially named SARS-CoV-2, has gained worldwide attention and significance as the cause of the ongoing COVID-19 pandemic. COVID-19 stands for "Coronavirus Disease 2019," signifying the year it was first identified. This highly contagious and novel virus has impacted nearly every aspect of our lives, from health and economy to travel and social interactions.
                        </p>
                        <a href="blog2.php"><button class="button">learn more</button></a>
                    </div>
                </div>

                <div class="box" data-aos="fade-left">
                    <img src="img/post3.jpg" alt="">
                    <div class="content">
                        <span>jan 5, 2021</span>
                        <a href="blog3.php">
                            <h3>Exploring the Nervous System</h3>
                        </a>
                        <p>
                            The nervous system is an intricate and marvelously complex network of cells, tissues, and organs that serves as the command center of the human body. It is responsible for overseeing and regulating virtually every physiological process and cognitive function, making it one of the most crucial and fascinating systems in the human anatomy.
                        </p>
                        <a href="blog3.php"><button class="button">learn more</button></a>
                    </div>

                </div>



            </div>

        </div>
        <a href="index.php" class="arrow-button">
            <button class="arrow">
                <i class="fa-solid fa-arrow-up-long fa-2x"></i>
            </button>
        </a>



    </section>

    <!-- post section ends -->

    <!-- footer section starts  -->

    <section class="footer">

        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center" data-aos="fade-right">
                    <a href="#" class="logo"><span>C</span>ity<span>H</span>ospital.</a>
                    <p>Charitavan,Buxar,Bihar 802101</p>
                </div>

                <div class="col-md-4 text-center" data-aos="fade-up">
                    <p>24*7 Services</p>
                    <!-- Add any content related to your 24*7 services here -->
                </div>

                <div class="col-md-4 text-center" data-aos="fade-left">
                    <h3>share</h3>
                    <a href="#">facebook</a>
                    <a href="#">twitter</a>
                    <a href="#">instagram</a>
                </div>
            </div>
        </div>


        <h1 class="credit text-center mx-auto">created by <span>Mr. Pratyush Mishra</span> | all rights reserved.</h1>

    </section>

    <!-- footer section ends -->




    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- magnific popup js link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <!-- aos js file cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- custom js link  -->
    <script src="main.js"></script>


    <script>
        AOS.init({
            duration: 1000,
            delay: 300
        });
    </script>




</body>

</html>