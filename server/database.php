<?php include("dbinfo.php"); ?>

<html>
    <head>
        <title>Database</title>
    </head>

    <body>
        <table width="100%" border="1px solid black">
            <tr><td>
                <a href="../">Home</a>
                <!--<a href="/database.php">Database</a>-->
                <a href="/graph.php">Graph</a>

                </td></tr>
            <tr><td><h1>Database</h1></td></tr>
        </table><br>


        <?php


            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM sensors_table ORDER BY time DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                ?>
                <table border="1px"><tr>
                    <td>Time</td><td>Location</td><td>Temperature1</td><td>Temperature2</td><td>Humidity1</td><td>Humidity2</td>
                </tr>
                <?php
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["time"]."</td><td>".$row["location"]."</td><td>".$row["temperature1"]."</td><td>".$row["temperature2"]."</td><td>".$row["humidity1"]."</td><td>".$row["humidity2"]."</tr>";
                }
                ?></table><?php
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
    </body>
</html>
