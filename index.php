<html>
    <head>
        <title>Les carées</title>
    </head>
    <?php
    // 1. INPUT
    //on cherche les valeurs, GET, POST
    //htmlspecialchars
    $x = htmlspecialchars($_POST["x"]);
    $y = htmlspecialchars($_POST["y"]);
    $color = htmlspecialchars($_POST["color"]);
    $valide = false;

    // 2. VALIDE LES INPUTS
    if($x != '' && $y != '' && $color != ''){
        //is_numeric
        if(is_numeric($x) && is_numeric($y)){
            //0 - 50
            if ($x > 0 && $x < 50 && $y > 0 && $y < 50){
                //red, blue, RGB, 0-255
                if(preg_match("([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})", $color)){
                    //Valide
                    $valide = true;
                } else {echo "Erreur, la couleur est invalide.";}
            } else {echo "Erreur, les valeur doivent être entre 0 et 50.";}
        } else {echo "Erreur, les champs x et y doivent êtres des nombre.";}
    } else {echo "Erreur, les champs doivent tous avoir une valeurs.";}

    //3. business logic
    //$to_print .= "<div..."
    $to_print = 
    "<p id='erreur'></p>
    <!-- Formulaire pour entrer le nombre de carré (X et Y) et la couleur -->
    <form action='index.php' method='post' style='border:1px solid #000000; width:250px;'>
        X : <input type='number' name='x' required><br />
        Y : <input type='number' name='y' required><br />
        Color : <input type='color' name='color' required><br />
        <input type='submit'>
    </form>

    <canvas id='canvas' width='1800' height='1000' style='border:1px solid #000000;'></canvas>";

    //4. output
    echo($to_print);

    ?>
    <body>
        <script>
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');

            if (<?= $valide ?>){
                // Permet de mettre une espace entre les carré sur l'axe des Y
                let espace_Y = 10;

                // Définit la couleur
                context.fillStyle = '<?php echo($color); ?>';

                // Boucle les Y
                for(i = 0; i < '<?php echo($y); ?>'; i++){
                    // Permet de mettre une espace entre les carré sur l'axe des X
                    let espace_X = 10;

                    // Boucle les X
                    for(n = 0; n < '<?php echo($x); ?>'; n++){
                        // Déssine un carré
                        context.fillRect(espace_X, espace_Y, 30, 30); 
                        espace_X += 50;
                    }
                    espace_Y += 50;
                }
            }
        </script>
    </body>
</html>