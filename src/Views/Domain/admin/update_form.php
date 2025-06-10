
  <form action="/domains/<?php echo $data['domain']->id();?>" method="POST">
    <input type="text" name="name" placeholder="Nombre" value="<?php echo $data['domain']->name();?>">
    <input type="text" name="code" placeholder="Codigo" value="<?php echo $data['domain']->code();?>">
    <input type="submit" value="Editar">
  </form>
