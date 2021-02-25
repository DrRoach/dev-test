<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Rick and Morty</title>
    </head>
    <body>
        <h1>Rick and Morty</h1>
        <form action="/search" method="get">
        <input type="text" name="query" placeholder="Search" value="<?=$_GET['query'] ?? ''?>">
            <input type="submit" value="Search">
        </form>
        <?php foreach ($characters as $character): ?>
            <div>
                <h3><?= $character->name ?></h3>
                <p>Status: <?= $character->status ?></p>
                <p>Species: <?= $character->species ?></p>
                <p>Type: <?= $character->type ?></p>
                <p>Gender: <?= $character->gender ?></p>
                <p>Origin: <?= $character->origin->name ?></p>
                <p>Location: <?= $character->location->name ?></p>
                <p>Image: </p>
                <img src="<?= $character->image ?>"/>
                <p>Episode:</p>
                <?php foreach ($character->episode as $episode): ?>
                    <p><?= $episode ?></p>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <a href="<?=$prevButtonPath?>">Prev</a>
        <a href="<?=$nextButtonPath?>">Next</a>
        
        <?php if (empty($characters)): ?>
            <h3>Nobody found</h3>
        <?php endif; ?>
    </body>
</html>
