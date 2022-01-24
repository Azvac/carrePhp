<html>
    <body>
        <!-- Formulaire pour entrer le nombre de carré (X et Y) et la couleur -->
        <form action="index.php" method="get" style="border:1px solid #000000; width:250px;">
            X : <input type="number" name="x"><br />
            Y : <input type="number" name="y"><br />
            Color :
            <input list="colors" name="color" id="color">
                <datalist id="colors">
                    <option value="red">
                    <option value="blue">
                    <option value="green">
                    <option value="yellow">
                    <option value="orange">
                    <option value="purple">
                    <option value="pink">
                    <option value="cyan">
                </datalist>
            <br /><br />

            <input type="submit">
        </form>

        <canvas id="canvas" width="1800" height="1000" style="border:1px solid #000000;"></canvas>

        <script>
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');

            // Permet de mettre une espace entre les carré sur l'axe des Y
            let espace_Y = 10;

            // Définit la couleur
            context.fillStyle = '<?php echo $_GET["color"]; ?>';

            // Boucle les Y
            for(let i = 0; i < <?php echo $_GET["y"]; ?>; i++){
                // Permet de mettre une espace entre les carré sur l'axe des X
                let espace_X = 10;

                // Boucle les X
                for(let n = 0; n < <?php echo $_GET["x"]; ?>; n++){
                    // Déssine un carré
                    context.fillRect(espace_X, espace_Y, 30, 30); 
                    espace_X += 50;
                }
                espace_Y += 50;
            }
        </script>
    </body>
</html>