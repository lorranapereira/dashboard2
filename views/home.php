<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("layout/navbar.php");
?>

  <!-- MAIN -->
  <div style="position:relative;width:50%;background-color: rgba(112, 150, 228, 0.07);" class="col">
    <br/>
    <h1>
    Dashboard
    </h1>
    <br/>
    <form action="">
        <label for=""> <strong>Assessor</strong></label>
        <select class="form-control" name="" id="select">
        <option value="null">Selecione um assessor</option>
        <? foreach ($assessores as $a): ?>
            <option value="<?= $a->id; ?>"><?= $a->nome;?></option>
        <? endforeach ?>
        </select>
    </form>
    <div class="card">
        <h4 class="card-header">Declarado e Aplicado </h4>
        <div class="card-body">
            <canvas id="monthChart" width="200" height="100"></canvas>
        </div>
    </div>
    <label for=""> <strong>Assessor</strong></label>
    <select class="form-control" name="" id="selectReceita">
    <option value="null">Selecione um assessor</option>
    <? foreach ($assessores as $a): ?>
        <option value="<?= $a->id; ?>"><?= $a->nome;?></option>
    <? endforeach ?>
    </select>
    <div class="card">
        <h4 class="card-header">Receita Total </h4>
        <div class="card-body">
            <canvas id="receitaChart" width="200" height="100"></canvas>
        </div>
    </div>
    <label for=""> <strong>Assessor</strong></label>
    <select class="form-control" name="" id="selectreceitapie">
    <option value="null">Selecione um assessor</option>
    <? foreach ($assessores as $a): ?>
        <option value="<?= $a->id; ?>"><?= $a->nome;?></option>
    <? endforeach ?>
    </select>
    <div class="card">
        <h4 class="card-header">Receita por produto </h4>
        <div class="card-body">
            <canvas id="porprodutoChart" width="200" height="100"></canvas>
        </div>
    </div>
</div>

<script>

var ctx = document.getElementById('monthChart').getContext('2d');
//chart declarado e aplicado
var mensalChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['01', '02', '03', '04', '05', '06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    callback: function(value, index, values) {
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                }
            }]
        }
    }
});

//chart receita total

var receitactx = document.getElementById('receitaChart').getContext('2d');

var receitaChart = new Chart(receitactx, {
    type: 'line',
    data: {
        labels: ['01', '02', '03', '04', '05', '06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31'],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    callback: function(value, index, values) {
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                }
            }]
        }
    }
});

//porproduto
var porprodutoctx = document.getElementById('porprodutoChart').getContext('2d');

var porprodutoChart = new Chart(porprodutoctx, {
    type: 'pie',
    data: {
        labels: ['ReceitaBovespa','ReceitaFuturos','ReceitaRFBancários','ReceitaRFPuclicos','ReceitaRFPrivados'],
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    callback: function(value, index, values) {
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                }
            }]
        }
    }
});




</script>
<script src="/js/requisicao.js"></script>
<script>
    var select = document.getElementById("select");
    $("#select").change(function(){
        if (select.options[select.selectedIndex].value!="null") {
            var assessor = select.options[select.selectedIndex].value;
            capitacao(assessor);
        }
    });
    var selectReceita = document.getElementById("selectReceita");
    $("#selectReceita").change(function(){
        if (selectReceita.options[selectReceita.selectedIndex].value!="null") {
            var assessor = selectReceita.options[selectReceita.selectedIndex].value;
            receitaTotal(assessor);
        }
    });
    var selectreceitapie = document.getElementById("selectreceitapie");
    $("#selectreceitapie").change(function(){
        if (selectreceitapie.options[selectreceitapie.selectedIndex].value!="null") {
            var assessor = selectreceitapie.options[selectreceitapie.selectedIndex].value;
            receitaPie(assessor);
        }
    });
</script>
 
</div><!-- Main Col END -->
  
</div><!-- body-row END -->


</div><!-- container -->
<?php
require_once("layout/footer.php");
?>