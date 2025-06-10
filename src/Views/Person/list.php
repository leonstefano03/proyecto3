<html>
    <body>
        <?php foreach ($data["persons"] as $person) { ?>
            <a href="/person/<?php echo $person->id() ?>"><?php echo $person->name() ?></a> <br>
        <?php } ?>
    </body>
</html>