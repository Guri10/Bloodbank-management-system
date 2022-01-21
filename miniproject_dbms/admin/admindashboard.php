<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Blood bank management</title>
    <!-- favicon -->
    <link href="/favicons/favicon.ico" rel="icon" type="image/x-icon" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/dashboard.css">
    <!-- font awesome script -->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
</head>

<body>
    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-dark">

            <a class="navbar-brand" href="">Blood bank management</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse nav_elements" id="navbarTogglerDemo02">

                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_recipient_details.php">Recipient details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donor_details.php">Donor details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_stock.php">View blood stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_reci_list.php">View recipient list</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <!-- top part -->
    <div class="top">
        <h1 class="heading"><em><strong>XYZhospital</strong> </em> </h1>
        <img class="blood0" src="/images/blood0.jpg" alt="background image">
    </div>

    <!-- middle -->
    <div class="middle">

        <h2>
            <center>Things you should know before donating blood</center>
        </h2>
        <br>
        <ol>
            <li>You need to be 17 or older to donate whole blood.</li>
            <li>You have to weigh at least 50 Kg and be in good health to donate</li>
            <li>You need to provide information about medical conditions and any medications you’re taking.
                <br> These may affect your eligibility to donate blood.
            </li>
            <li>You must wait at least 8 weeks between whole blood donations and 16 weeks between double red cell donations.</li>
            <li>Platelet donations can be made every 7 days, up to 24 times per year.</li>
        </ol>
    </div>
    <hr size="3" noshade>
    <div class="middle">
        <h2>
            <center>Donation procedure</center>
        </h2>
        <br>
        <p>You must register to donate blood. This includes providing identification, your medical history, and undergoing a quick physical examination. You’ll also be given some information about blood donation to read.
            <br>
            Once you’re ready, your blood donation procedure will begin. Whole blood donation is the most common type of donation. This is because it offers the most flexibility. It can be transfused as whole blood or separated into red cells, platelets,
            and plasma for different recipients.
        </p>
        <ol>
            <li>You’ll be seated in a reclining chair. You can donate blood either sitting or lying down.</li>
            <li>A small area of your arm will be cleaned. A sterile needle will then be inserted.</li>
            <li>You’ll remain seated or lying down while a pint of your blood is drawn. This takes 8 to 10 minutes.</li>
            <li>When a pint of blood has been collected, a staff member will remove the needle and bandage your arm.</li>

        </ol>
    </div>
    <hr size="3" noshade>
    <!-- bottom -->
    <div class="bottom" id=aboutus>
        <h2>About us</h2>
        <p>
        <h4>This is DBMS Mini Project</h4>
        <br>
        <h5>Made by MITWPU students :</h5>

        <br>
        PE 04 Aniket Ghorpade
        <br>
        PE 09 Manoranjan Harsh
        <br>
        PE 13 Atharva Jadhav
        <br>
        PE 17 Atharva Gurav
        <br>
        PE 36 Aamir Hullur
        </p>

    </div>
</body>

</html>