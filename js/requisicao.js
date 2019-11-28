function capitacao(id) {
    $.ajax ({
        url: '/index.php/Lancamentos/capitacao',
        type: 'POST',
        async: true,
        dataType: 'json',
        data:{'id': id},

        success: function (result)
        {
            var select = document.getElementById("select");    
            var a = select.options[select.selectedIndex].text;
            var assessor = a.split(' ')[0]; 
            console.log(result.mensal[24][0].soma)    
            mensalChart.data.datasets.push({
                label: 'Aplicado - '+assessor,
                fill: false,
                borderColor:'rgba(48, 165, 29, 0.57)',
                backgroundColor: 'rgba(48, 165, 29, 0.57)',
                data: [ 
                    (result.mensal[0][0].realizado), (result.mensal[1][0].realizado), (result.mensal[2][0].realizado), (result.mensal[3][0].realizado), (result.mensal[4][0].realizado), (result.mensal[5][0].realizado), (result.mensal[6][0].realizado), (result.mensal[7][0].realizado), (result.mensal[8][0].realizado), (result.mensal[9][0].realizado), (result.mensal[10][0].realizado), (result.mensal[11][0].realizado), (result.mensal[12][0].realizado), (result.mensal[13][0].realizado), (result.mensal[14][0].realizado), (result.mensal[15][0].realizado), (result.mensal[16][0].realizado), (result.mensal[17][0].realizado), (result.mensal[18][0].realizado), (result.mensal[19][0].realizado), (result.mensal[20][0].realizado), (result.mensal[21][0].realizado), (result.mensal[22][0].realizado), (result.mensal[23][0].realizado), (result.mensal[24][0].realizado), (result.mensal[25][0].realizado), (result.mensal[26][0].realizado), (result.mensal[27][0].realizado), (result.mensal[28][0].realizado), (result.mensal[29][0].realizado), (result.mensal[30][0].realizado)]
              });
            mensalChart.update();
            mensalChart.data.datasets.push({
                label: 'Declarado - '+assessor,
                fill: false,
                backgroundColor: 'rgba(222, 139, 63, 0.70)',
                borderColor: 'rgba(222, 139, 63, 0.70)',
                data: [ 
                    (result.mensal[0][0].soma), (result.mensal[1][0].soma), (result.mensal[2][0].soma), (result.mensal[3][0].soma), (result.mensal[4][0].soma), (result.mensal[5][0].soma), (result.mensal[6][0].soma), (result.mensal[7][0].soma), (result.mensal[8][0].soma), (result.mensal[9][0].soma), (result.mensal[10][0].soma), (result.mensal[11][0].soma), (result.mensal[12][0].soma), (result.mensal[13][0].soma), (result.mensal[14][0].soma), (result.mensal[15][0].soma), (result.mensal[16][0].soma), (result.mensal[17][0].soma), (result.mensal[18][0].soma), (result.mensal[19][0].soma), (result.mensal[20][0].soma), (result.mensal[21][0].soma), (result.mensal[22][0].soma), (result.mensal[23][0].soma), (result.mensal[24][0].soma), (result.mensal[25][0].soma), (result.mensal[26][0].soma), (result.mensal[27][0].soma), (result.mensal[28][0].soma), (result.mensal[29][0].soma), (result.mensal[30][0].soma)]
              });
          mensalChart.update();

        }
    })
}

function receitaTotal(id) {
    $.ajax ({
        url: '/index.php/Lancamentos/receitaTotal',
        type: 'POST',
        async: true,
        dataType: 'json',
        data:{'id': id},

        success: function (result)
        {
            var select = document.getElementById("selectReceita");    
            var a = select.options[select.selectedIndex].text;
            var assessor = a.split(' ')[0]; 
            receitaChart.data.datasets.push({
                label: assessor,
                fill: false,
                borderColor:'rgba(48, 165, 29, 0.57)',
                backgroundColor: 'rgba(48, 165, 29, 0.57)',
                data: [ 
                    (result.receita_total[0][0].total), (result.receita_total[1][0].total), (result.receita_total[2][0].total), (result.receita_total[3][0].total), (result.receita_total[4][0].total), (result.receita_total[5][0].total), (result.receita_total[6][0].total), (result.receita_total[7][0].total), (result.receita_total[8][0].total), (result.receita_total[9][0].total), (result.receita_total[10][0].total), (result.receita_total[11][0].total), (result.receita_total[12][0].total), (result.receita_total[13][0].total), (result.receita_total[14][0].total), (result.receita_total[15][0].total), (result.receita_total[16][0].total), (result.receita_total[17][0].total), (result.receita_total[18][0].total), (result.receita_total[19][0].total), (result.receita_total[20][0].total), (result.receita_total[21][0].total), (result.receita_total[22][0].total), (result.receita_total[23][0].total), (result.receita_total[24][0].total), (result.receita_total[25][0].total), (result.receita_total[26][0].total), (result.receita_total[27][0].total), (result.receita_total[28][0].total), (result.receita_total[29][0].total), (result.receita_total[30][0].total)]
              });
            receitaChart.update();

        }
    })
}


function receitaPie(id) {
    $.ajax ({
        url: '/index.php/Lancamentos/receitapie',
        type: 'POST',
        async: true,
        dataType: 'json',
        data:{'id': id},

        success: function (result)
        {
            var select = document.getElementById("selectreceitapie");    
            var a = select.options[select.selectedIndex].text;
            var assessor = a.split(' ')[0]; 
            console.log(result.receita_pie[0].ReceitaBovespa);
            var assessor = a.split(' ')[0]; 
            porprodutoChart.data.datasets.push({
                label: assessor,
                fill: false,
                borderColor:'rgba(48, 165, 29, 0.57)',
                backgroundColor: ["red", "blue", "green", "orange","yellow"],
                data: [ 
                result.receita_pie[0].ReceitaBovespa,result.receita_pie[0].ReceitaFuturos,result.receita_pie[0].ReceitaRFBancarios,result.receita_pie[0].ReceitaRFPublicos,result.receita_pie[0].ReceitaRFPrivados]
              });
            porprodutoChart.update();

    
        }
    })
}