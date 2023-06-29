<?php
session_start();
if (empty($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<!-- ixsneba daloginebis shemdgom -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
    <link rel="stylesheet" href="./styles/panel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
</head>
<body>
    <?php if ($_SESSION["username"] == "admin" || $_SESSION["username"] == "system") : ?>
        <div class="header">
            <div class="headerleft">
                <div class="headerleftmessage">
                    <span>Welcome to the panel</span>
                    <span>You ave all the privilegies</span>
                </div>                
            </div>
        
    <?php else : ?>
        <div class="header">
            <div class="headerleft">
                <span>Welcome to our shop</span>
                <span>Wish you a good day!</span>
            </div>
        
    <?php endif; ?>

    
        <div class="headerright">
            <p >Logged in as&nbsp;<span class="username"><?php echo $_SESSION['username']; ?></span></p>
            <form method="post" action="./logout.php" class="container">
                <input type="submit" value="Logout" name="logout" class="logout-button btn btn-secondary" />
            </form>
        </div>
    </div>
    

 
    
    <div class="posters">
        <div class="baner">
            <p class="banerp banerp1"><a href="./phonesmain.php">Click here to <br>purchase phones</a></p>
        </div>

        <div class="servicebaner">
            <p class="banerp banerp2"><a href="./planvisit.php">Click here to <br>plan a visit to our phone technic</a></p>
        </div>       

        <div class="officebaner">
            <p class="banerp banerp3"><a href="./viewoffices.php">Click here to <br>see our offices</a></p>
        </div>  

    </div>

    <?php if ($_SESSION["username"] == "admin" || $_SESSION["username"] == "system") : ?>
        <div class="adminlinks">
            <a href="./coworkersmain.php" >Co-workers Database</a>
            <a href="./addphone.php">Add phone to the DataBase</a>
            <a href="./openoffice.php">Open new office</a>
            <a href="./viewvisits.php">View planned visits</a>    

        </div>

    <?php endif; ?>

    <div class="rate-service">
    <a href="./review.php"><button>Rate Our Service</button></a>
</div>

   
    




</body>
</html>
