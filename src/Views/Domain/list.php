<html>
    <body>
        <?php foreach ($data["domains"] as $domain) { ?>
            <a href="/domains/<?php echo $domain->id() ?>"><?php echo $domain->name() ?></a> <br>
        <?php } ?>
    </body>
</html>