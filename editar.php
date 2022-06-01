<?php
require 'config.php';

?>
<h1>Cadastro de Usuário</h1>
<?php
$row = $pdo->query("select * from usuario where id ='".$_GET['id']."'")->fetch();
if($_POST){
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$sql = $pdo->prepare("update usuario  set nome= :nome, email = :email where id=:id");

$sql->bindValue(':id', $id);
$sql->bindValue(':nome', $nome);
$sql->bindValue(':email', $email);
$sql->execute();
}
?>
<form method="POST" action="editar.php?id=<?=$_GET['id']?>">
    <input type="hidden" value="<?=$row['id']?>">
    <label>
        Nome: <input type="text" name="nome" value="<?=$row['nome']?>"/>
    </label>
    <label>
        Email: <input type="email" name="email" value="<?=$row['email']?>"/>
</label>

<input type="submit" value="Salvar"/>
</form>