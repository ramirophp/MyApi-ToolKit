<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="./assets/favicon.png"/>
        <title>Add Tags POST</title>
        <script>
            var recurso = 'tags';
        </script>
    </head>
    <body>

        <ul>
            <li><a href="./index.php">home</a></li>
        </ul>

        <h2>ADD Html Tags</h2>

        <section class="form">
            <form>
                <label for="tag">
                    ADD TAG : 
                    <input type="text" name="tag" id="tag" placeholder="add tag">
                </label>
                <input type="submit" value="SAVE">
            </form>
        </section>

        <div id="result"></div>
 
        <script src="../API_View/post_dato.js"></script>
    </body>
</html>