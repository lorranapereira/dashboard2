<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("layout/navbar.php");
?>
<div class="container">
<br/>
<h1>Inserir Dados</h1>
<div class="card">
<div class="container">
    </br>
    <?php
        if ($this->session->flashdata('success')) {
        ?>
            <div class="alert alert-success text-center" style="margin-top:20px;">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php
        }
    ?> 
    <form method="POST" action="upload" method="POST" enctype="multipart/form-data">
        <label>Arquivo</label>
        <input type="file" name="arquivo"  value=" 7139328" ><br><br>
        <input type="submit" value="Enviar">
    </form>
    </div>
</div>
</br>
</br>

</div>

<?php
require_once("layout/footer.php");
?>