<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("layout/navbar.php");
?>
<div class="container">
    <br/>
    <h1>Aprovar usuários</h1>
    <br/>
    <?php
        if ($this->session->flashdata('success')) {
        ?>
            <div class="alert alert-success text-center" style="margin-top:20px;">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php
        }
        if ($this->session->flashdata('danger')) {
        ?>
            <div class="alert alert-danger text-center" style="margin-top:20px;">
                <?php echo $this->session->flashdata('danger'); ?>
            </div>
            <?php
        }
    ?> 
    <table class="table table-dark">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">Aprovar</th>
        <th scope="col">Deletar</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($users as $user){  ?>
        <tr>
        <td><?= $user->nome ?></td>
        <td><a href="/index.php/Usuario/aprovar/?id=<?= $user->id; ?>" class="btn btn-primary">Aprovar</a></td>
        <td><a href="/index.php/Usuario/deletar/?id=<?= $user->id; ?>" class="btn btn-danger">Deletar</a></td>
        <td></td>
        </tr>
        <? } ?>
    </tbody>
    </table> 
</div>
<?php
require_once("layout/footer.php");
?>