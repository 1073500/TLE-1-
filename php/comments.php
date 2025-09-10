<?php
//social media pagina 2 comments
//eerst comment zonder login, daarna met

// 1. connectie met database
//require_once 'includes/database.php';

$host = "127.0.0.1";
$database = "thegram";
$user = "root";
$password = "";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());


//de error functie
//als er op submit wordt gedrukt dan wordt de error uitgevoerd
if (isset($_POST['submit'])) {
    //altijd de variabele erboven zetten, zodat hij geen errors aangeeft.
    $errorName = '';
    $errorComment = '';


    //variabelen aanmaken
    //value in de post is altijd de id van de input
    $name = mysqli_escape_string($db, $_POST['name']);
    $comment = mysqli_escape_string($db, $_POST['comment']);

    //validatie bericht
    if ($name === '') {
        $errorName = 'Please put your name';
    }
    if ($comment === '') {
        $errorComment = 'Leave comment';
    }


    //ervoor zorgen dat we de query kunnen invoeren, door te zeggen dat het gebeurd wanneer de array leeg is.
    if ($name !== '' && $comment !== '') {
        $query = "INSERT INTO comments (user_id, name, comment)
        VALUES (0, '$name', '$comment',)";

        //dat de query uitgevoerd kan worden
        mysqli_query($db, $query)
        or die('Error' . mysqli_error($db) . 'with query' . $query);
    }


}
$comments = [];
$result = mysqli_query($db, "SELECT * FROM comments");
//echo $query;

while ($row = mysqli_fetch_assoc($result)) {
    // Add the row to the $reviews array
    $comments[] = $row;
}

mysqli_close($db);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <title>The gram - comments</title>
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4">Comment on thegram</h1>

    <section class="columns">


        <form class="is-flex-direction-column" action="" method="post">

            <div class="is-flex-direction-column">
                <div class="field-label is-normal">
                    <label class="label" for="name">Name</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <!-- als var niet herkend wordt ??-->
                            <input class="input" id="name" type="text" name="name"
                                   value="<?= htmlentities($_POST['name'] ?? '') ?>"/>
                        </div>
                        <p class="help is-danger">
                            <!-- ?? om te kijken of er iets in de string zit
                            , als hij leeg is geeft hij een leeg string terug (dus hij geeft niks aan)-->
                            <?= $errorName ?? '' ?>
                        </p>
                    </div>
                </div>

                <!--comment-->
                <div class="field-label is-normal">
                    <label class="label has-text-centered" for="comments">
                        comment
                    </label>
                </div>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control">

                                <label>
<textarea class="is-link textarea" cols="89" rows="6" name="comment"><?= htmlentities($_POST['comment'] ?? '') ?></textarea>
                                </label>

                                <p class="help is-danger">
                                    <?= $errorComment ?? '' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Voeg een hidden field toe-->
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <div class="field-body">
                            <button class="button is-outlined is-link " type="submit" name="submit">
                                Leave comment
                            </button>
                        </div>
                    </div>
                </div>

        </form>

    </section>

    <section>
        <div class="is-flex is-justify-content-center title is-3">
            <h1>comments</h1>
        </div>
        <!--loop through array-->

        <?php foreach ($comments as $comment) { ?>
            <div class="reviewBlock">
                <h2 class="p-0 pb-3"><?= htmlentities($comment['name']) ?></h2>
                <h2 class="p-0"><?= htmlentities($comment['comment']) ?></h2>
            </div>

        <?php } ?>

    </section>

    <a class="button mt-4" href="index.html">&laquo; Go back to homepage</a>
</div>
</body>
</html>