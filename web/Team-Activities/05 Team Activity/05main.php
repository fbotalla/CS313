<?php
try
    {
        $dbUrl = getenv('DATABASE_URL');

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"],'/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $book = $_GET['book'];
        $chapter = $_GET['chapter'];
        $verse = $_GET['verse'];
        echo "<h1>Scripture Resources</h1>";

        foreach ($db->query('SELECT * FROM db WHERE book = \'' . $book . '\' AND chapter = \'' . $chapter . '\'') as $row)
        {
        if ($row['book'] == $_GET['book']) {
            echo "<p><strong>" . $row['book'] . " ";
            echo $row['chapter'] . ":";
            echo $row['verse'] . "</strong><br/>";
            echo "\"" . $row['content'] . "\"";
            echo "</p><br/>";
            }           

        }
    }
    catch (PDOException $ex)
    {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }

?>