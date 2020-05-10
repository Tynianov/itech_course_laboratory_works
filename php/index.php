<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
        <script src="script.js" type="text/javascript"></script>
        <title>Laba5</title>
        <style>

            .Tasks {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            input, select {
                display: block;
                margin-bottom: 15px;
                background-color: #ccd4e0
            }
            div {
                border: 1px solid black;
               padding: 5px;
            }

        </style>
    </head>

    <body>

        <?php
            include 'dbConnection.php'
        ?>
        <div class="Tasks">
        <div class="Task1">
            <p>Book by publisher</p>
            <?php
            ?>
            <select name="publisher" id="publisher">
                <?php
                    $stmt = $pdo->query("Select distinct publisher from literature where publisher is not null");
                    $result = $stmt->fetchAll();
                    foreach ($result as $key => $value) {
                        echo "<option label=\"$value[0]\" value=\"$value[0]\">$value[0]</option>";
                    }
                ?>
            </select>
            <button id="task1">Submit</button>
        </div>


        <div class="Task2">
            <p>By date</p>
            <input type="date" name="first_date" id="first_date">
            <input type="date" name="second_date" id="second_date">

            <button id="task2">Submit</button>
        </div>

        <div class="Task3">
            <p>By author</p>
            <select name="author" id="author">
                <?php
                    $stmt = $pdo->query("Select name from Authors");
                    $result = $stmt->fetchAll();
                    foreach ($result as $key => $value) {
                        echo "<option label=\"$value[0]\" value = \"$value[0]\">$value[0]</option>";
                    }
                ?>
            </select>
            <button id="task3">Submit</button>
        </div>
        </div>
        <table>
          <tr>
          <td><label for="xml">XML</label><br><textarea  cols="30" rows="10"></textarea></td>
          <td><label for="html">HTML</label><br><textarea id="html" cols="30" rows="10"></textarea></td>
          <td><label for="json">JSON</label><br><textarea id="json" cols="30" rows="10"></textarea></td>
          <div id="xml"></div>
          </tr>
      </table>
    </body>
</html>
