<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TSF Bank</title>
    <link rel="stylesheet" href="style_transfer.css">

</head>

<body>
    <header>
        <img src="logo1.png" alt="bank logo">
        <h1>TSF Bank</h1>

        <nav id="nav_bar">
            <a href="index.html">Home</a>
            <a href="about.html">About</a>
            <a href="view.php">Customers</a>

        </nav>
    </header>
    <section class="transfer">

        
        <?php


        $tid = $_GET['id'];
        include('connectivity.php');
    
        $sqlget = "SELECT * FROM transaction WHERE fromcustid = '$tid'";
        $sqldata = mysqli_query($conn,$sqlget) or die('Error Getting the data');
        echo "<table border='1'>";
        echo "<caption>Withdrawals</caption>";
        echo "<tr>
            <th>Receiver's ID</th>
            <th>Receiver's Name</th>
            <th>Cash transfer</th>
            <th>Date</th>
            <th>Particulars</th>
            </tr>";
        $rowcount=mysqli_num_rows($sqldata);
        for($i=1 ;$i <= $rowcount;$i++){
        while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
            echo "<tr><td>";
                echo $row['tocustid'];
            echo "</td><td>";
                echo $row['receivername'];
            echo "</td><td>";
                echo $row['cashtransfer'];
            echo "</td><td>";
                echo $row['date'];
            echo "</td><td>";
                echo $row['msgforreceiver'];
            echo "</td></tr>";
           }
        }
    

          echo "</table>";
        echo "<br/>";
        
        $sqlget1 = "SELECT * FROM transaction WHERE tocustid = '$tid'";
        $sqldata1 = mysqli_query($conn,$sqlget1) or die('Error Getting the data');
    

        echo "<table border='1'>";
        echo "<caption>Deposists</caption>";
        echo "<tr>
            <th>Transferer's ID</th>
            <th>Transferer's Name</th>
            <th>Cash transfer</th>
            <th>Date</th>
            <th>Particulars</th>
            </tr>";
        $rowcount=mysqli_num_rows($sqldata1);
        for($i=1 ;$i <= $rowcount;$i++){
         while($row = mysqli_fetch_array($sqldata1, MYSQLI_ASSOC)){
            echo "<tr><td>";
                echo $row['fromcustid'];
            echo "</td><td>";
                echo $row['transferername'];
            echo "</td><td>";
                echo $row['cashtransfer'];
            echo "</td><td>";
                echo $row['date'];
            echo "</td><td>";
                echo $row['msgforreceiver'];
            echo "</td></tr>";
        }
    }

          echo "</table>";
        echo "<br/>";
  

         echo '<form action="transfer.php">';
        echo  "<input type='hidden' name='id' value='$tid'>";
        echo "<button>Back</button>
        </form>";
        

       
        ?>
    </section>

    <footer>
        &copy;siman.parveen29@gmail.com
        <p>This Page is created by <b>Siman Parveen</b> as a Web Development and Designing Intern at The Sparks Foundation</p>
    </footer>
</body>
</html>