<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/png" href="./assets/favicon.png"/>
        <title>Add Attrs POST</title>
        <script>
            var recurso = 'attrs';
        </script>
    </head>
    <body>

        <ul>
            <li><a href="./index.php">home</a></li>
        </ul>

        <h2>ADD Html Attrs</h2>

        <section class="form">
            <form>
                <label for="attr">
                    ADD ATTR : 
                    <input type="text" name="attr" id="attr" placeholder="add attr">
                </label>
                <input type="submit" value="SAVE">
            </form>
        </section>

        <div id="result"></div>
 
        <script src="../API_View/post_dato.js"></script>
    </body>
</html>