$(function(){
      //alert('javascript');

      //########## PRIMER ANIO #####################################
      var claseActivo = $("#activosCorrientes").val();
      var claseActivoNo = $("#activosCorrientesNo").val();
      var grupoActivo = $("#totalActivos").val();

      var clasePasivo = $("#pasivosCorrientes").val();
      var clasePasivoNo = $("#pasivosCorrientesNo").val();
      var grupoPasivo = $("#totalPasivos").val();

      var grupoPatrimonio = $("#totalPatrimonio").val();

      $("#activoCorriente-razonLiquidez").val(claseActivo);
      $("#pasivoCorriente-razonLiquidez").val(clasePasivo);

      $("#pasivoCorriente-razonEfectivo").val(clasePasivo);

      $("#activoCorriente-razonRapida").val(claseActivo);
      $("#pasivoCorriente-razonRapida").val(clasePasivo);

      $("#activoCorriente-razonCapital").val(claseActivo);
      $("#pasivoCorriente-razonCapital").val(clasePasivo);
      $("#activoTotal-razonCapital").val(grupoActivo);
      $("#activoFijoNeto-razonActivoF").val(claseActivoNo);
      
      $("#activoTotal-razonIndiceA").val(grupoActivo);

      $("#activoTotal-razonRentActivo").val(grupoActivo);

      $("#pasivoTotal-razonEndeudo").val(grupoPasivo);
      $("#activoTotal-razonEndeudo").val(grupoActivo);

      $("#activoTotal-razonPropiedad").val(grupoActivo);
      $("#pasivoTotal-razonEndeudoPatr").val(grupoPasivo);

      $("#input_numerador_patrimonio_razonPropiedad").val(grupoPatrimonio);
      $("#input_numerador_patrimonioP_razonNetaP").val(grupoPatrimonio);

      /*$("#input_pasivoTotal_razonEndeudoPatr").val(grupoPasivo);
      $("#input_patrimonio_razonEndeudoPatr").val(grupoPatrimonio);
      
      var pasivo = $("#input_pasivoTotal_razonEndeudoPatr").val();
      var patrimonio = $("#input_patrimonio_razonEndeudoPatr").val();
      var grupoPasivoPatrimonio = (parseFloat(pasivo) + parseFloat(patrimonio)).toFixed(5);
      
      $("#input_numerador_patrimonioTotal_razonEndeudoPatr").val(grupoPasivoPatrimonio);*/
      $("#input_numerador_patrimonioTotal_razonEndeudoPatr").val(grupoPatrimonio);
      


      //########## SEGUNDO ANIO #####################################
      var claseActivo1 = $("#activosCorrientes1").val();
      var claseActivoNo1 = $("#activosCorrientesNo1").val();
      var grupoActivo1 = $("#totalActivos1").val();

      var clasePasivo1 = $("#pasivosCorrientes1").val();
      var clasePasivoNo1 = $("#pasivosCorrientesNo1").val();
      var grupoPasivo1 = $("#totalPasivos1").val();

      var grupoPatrimonio1 = $("#totalPatrimonio1").val();

      $("#activoCorriente-razonLiquidez1").val(claseActivo1);
      $("#pasivoCorriente-razonLiquidez1").val(clasePasivo1);

      $("#pasivoCorriente-razonEfectivo1").val(clasePasivo1);

      $("#activoCorriente-razonRapida1").val(claseActivo1);
      $("#pasivoCorriente-razonRapida1").val(clasePasivo1);

      $("#activoCorriente-razonCapital1").val(claseActivo1);
      $("#pasivoCorriente-razonCapital1").val(clasePasivo1);
      $("#activoTotal-razonCapital1").val(grupoActivo1);
      $("#activoFijoNeto-razonActivoF1").val(claseActivoNo1);

      $("#activoTotal-razonIndiceA1").val(grupoActivo1);

      $("#activoTotal-razonRentActivo1").val(grupoActivo1);

      $("#pasivoTotal-razonEndeudo1").val(grupoPasivo1);
      $("#activoTotal-razonEndeudo1").val(grupoActivo1);

      $("#activoTotal-razonPropiedad1").val(grupoActivo1);
      $("#pasivoTotal-razonEndeudoPatr1").val(grupoPasivo1);
      $("#input_numerador_patrimonio_razonPropiedad1").val(grupoPatrimonio1);
      //$("#input_numerador_patrimonioTotal_razonEndeudoPatr1").val(grupoPatrimonio1);
      $("#input_numerador_patrimonioP_razonNetaP1").val(grupoPatrimonio1);

      /*$("#input_pasivoTotal_razonEndeudoPatr1").val(grupoPasivo1);
      $("#input_patrimonio_razonEndeudoPatr1").val(grupoPatrimonio1);
      
      var pasivo1 = $("#input_pasivoTotal_razonEndeudoPatr1").val();
      var patrimonio1 = $("#input_patrimonio_razonEndeudoPatr1").val();
      var grupoPasivoPatrimonio1 = (parseFloat(pasivo1) + parseFloat(patrimonio1)).toFixed(5);
      
      $("#input_numerador_patrimonioTotal_razonEndeudoPatr1").val(grupoPasivoPatrimonio1);*/
      $("#input_numerador_patrimonioTotal_razonEndeudoPatr1").val(grupoPatrimonio1);

      //alert(input);
      var buenale=", esta bien";
      var malale=", necesita ajuste financiero";
      var zero="primero debe de presionar el boton calcular";
      //var vcRL=1;
      //var vcRA=1;
      //var vcREN=1;
      //var vcRE=1; 
  $(document).on('click',"#concuRLiq",function(){
      var vcRL=$("#valComRL").val();
      //var vcRL=1;
      //var vcRA=1;
      //var vcREN=1;
      //var vcRE=1; 
    function totalRL(){
      var nume1 = $("#inputTotal-razonLiquidez").val();
      var nume2 = $("#inputTotal-razonLiquidez1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrl").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<1 && totalls>0 ) {
        //alert("efe bru");
        $("#ttrl").val("el ratio promedio es: "+totalls+ " las empresas no pueden pagar a corto plazo").toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrl").val(zero).toFixed(5);
      }
      if (totalls<2 && totalls>1 && totalls>vcRL) {
        //alert("efe bru");
        $("#ttrl").val("el ratio promedio es: "+totalls+ " las empresas estan saludables y arriba del promedio nacional").toFixed(5);
      }
      if (totalls<2 && totalls>1 && totalls<vcRL) {
        //alert("efe bru");
        $("#ttrl").val("el ratio promedio es: "+totalls+ " las empresas estan saludables y abajo del promedio nacional").toFixed(5);
      }
      if (totalls>2) {
        //alert("efe bru");
        $("#ttrl").val("el ratio promedio es: "+totalls+ " las empresas tienen dinero ocioso").toFixed(5);
      }

    }
    function totalRE(){
      var nume1 = $("#inputTotal-razonEfectivo").val();
      var nume2 = $("#inputTotal-razonEfectivo1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttre").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRL ) {
        //alert("efe bru");
        $("#ttre").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttre").val(zero).toFixed(5);
      }
      else{
        $("#ttre").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    function totalRR(){
      var nume1 = $("#inputTotal-razonRapida").val();
      var nume2 = $("#inputTotal-razonRapida1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrr").val(totalls).toFixed(5);
     // alert(totalls);
     
      if (totalls<1 && totalls>0 ) {
        //alert("efe bru");
        $("#ttrr").val("el ratio promedio es: "+totalls+ " las empresas no pueden pagar a corto plazo").toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrr").val(zero).toFixed(5);
      }
      if (totalls<2 && totalls>1 && totalls>vcRL) {
        //alert("efe bru");
        $("#ttrr").val("el ratio promedio es: "+totalls+ " las empresas estan saludables y arriba del promedio nacional").toFixed(5);
      }
      if (totalls<2 && totalls>1 && totalls<vcRL) {
        //alert("efe bru");
        $("#ttrr").val("el ratio promedio es: "+totalls+ " las empresas estan saludables y abajo del promedio nacional").toFixed(5);
      }
      if (totalls>2) {
        //alert("efe bru");
        $("#ttrr").val("el ratio promedio es: "+totalls+ " las empresas tienen dinero ocioso").toFixed(5);
      }



    }
    function totalRC(){
      var nume1 = $("#inputTotal-razonCapital").val();
      var nume2 = $("#inputTotal-razonCapital1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrc").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRL ) {
        //alert("efe bru");
        $("#ttrc").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrc").val(zero).toFixed(5);
      }
      else{
        $("#ttrc").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    //inputTotal-razonCapital1

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var nume1 = $("#inputTotal-razonLiquidez").val();
      var nume2 = $("#inputTotal-razonLiquidez1").val();
      var total1 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonEfectivo").val();
      var nume2 = $("#inputTotal-razonEfectivo1").val();
      var total2 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonRapida").val();
      var nume2 = $("#inputTotal-razonRapida1").val();
      var total3 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonCapital").val();
      var nume2 = $("#inputTotal-razonCapital1").val();
      var total4 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);


      var data = google.visualization.arrayToDataTable([
        ["Element", "Resultado", { role: "style" } ],
        ["razonLiquidez",total1,"blue"],
        ["razonEfectivo",total2 , "#b87333"],
        ["razonCapital", total3, "silver"],
        ["razonRapida", total4, "gold"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Promedio de razones de liquidez entre dos empresas",
        width: 400,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChartL);
    function drawChartL() {

      var nume1 = $("#inputTotal-razonLiquidez").val();
      var nume2 = $("#inputTotal-razonLiquidez1").val();
      var num1 = parseFloat(nume1);
      var num2 = parseFloat(nume2);

      var nume3 = $("#inputTotal-razonEfectivo").val();
      var nume4 = $("#inputTotal-razonEfectivo1").val();
      var num3 = parseFloat(nume3);
      var num4 = parseFloat(nume4);      

      var nume5 = $("#inputTotal-razonRapida").val();
      var nume6 = $("#inputTotal-razonRapida1").val();
      var num5 = parseFloat(nume5);
      var num6 = parseFloat(nume6);

      var nume7 = $("#inputTotal-razonCapital").val();
      var nume8 = $("#inputTotal-razonCapital1").val();
      var num7 = parseFloat(nume7);
      var num8 = parseFloat(nume8);


      var data = google.visualization.arrayToDataTable([
        ["Element", "Resultado", { role: "style" } ],
        ["razonLiquidez1",num1,"blue"],
        ["razonLiquidez2",num2,"blue"],
        ["razonEfectivo1",num3 , "#b87333"],
        ["razonEfectivo2",num4 , "#b87333"],
        ["razonCapital1", num5, "silver"],
        ["razonCapital2", num6, "silver"],
        ["razonRapida", num7, "gold"],
        ["razonRapida", num8, "gold"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Razones de liquidez de cada empresa",
        width: 550,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_valuesL"));
      chart.draw(view, options);
  }
    
    var btn = document.querySelector('#concuRLiq');

    btn.addEventListener('click',totalRL, false);
    btn.addEventListener('click',totalRE, false);
    btn.addEventListener('click',totalRR, false);
    btn.addEventListener('click',totalRC, false);
    btn.addEventListener('click',drawChart,false);
    btn.addEventListener('click',drawChartL,false);

  });
  //

$(document).on('click',"#concuRAct",function(){
        var vcRA=$("#valComRA").val();
      //var vcRL=1;
      //var vcRA=1;
      //var vcREN=1;
      //var vcRE=1; 


    function totalIN(){
      var nume1 = $("#inputTotal-razonInventario").val();
      var nume2 = $("#inputTotal-razonInventario1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrin").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA ) {
        //alert("efe bru");
        $("#ttrin").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrin").val(zero).toFixed(5);
      }
      else{
        $("#ttrin").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    //inputTotal-razonDiasInventario1
    function totalDIN(){
      var nume1 = $("#inputTotal-razonDiasInventario").val();
      var nume2 = $("#inputTotal-razonDiasInventario1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttdin").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA ) {
        //alert("efe bru");
        $("#ttdin").val("el ratio promedio es: "+totalls+malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttdin").val(zero).toFixed(5);
      }
      else{
        $("#ttdin").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
     function totalRRCC(){
      var nume1 = $("#inputTotal-razonCxC").val();
      var nume2 = $("#inputTotal-razonCxC1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrrcc").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA  ) {
        //alert("efe bru");
        $("#ttrrcc").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrrcc").val(zero).toFixed(5);
      }
      else{
        $("#ttrrcc").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    function totalRMC(){
      var nume1 = $("#inputTotal-razonMedioC").val();
      var nume2 = $("#inputTotal-razonMedioC1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrmc").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA ) {
        //alert("efe bru");
        $("#ttrmc").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrmc").val(zero).toFixed(5);
      }
      else{
        $("#ttrmc").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    //inputTotal-razonCxP
    function totalRCP(){
      var nume1 = $("#inputTotal-razonCxP").val();
      var nume2 = $("#inputTotal-razonCxP1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrcp").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA ) {
        //alert("efe bru");
        $("#ttrcp").val("el ratio promedio es: "+totalls+malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrcp").val(zero).toFixed(5);
      }
      else{
        $("#ttrcp").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    //inputTotal-razonMedioP
    function totalPMP(){
      var nume1 = $("#inputTotal-razonMedioP").val();
      var nume2 = $("#inputTotal-razonMedioP1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttpmp").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA ) {
        //alert("efe bru");
        $("#ttpmp").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttpmp").val(zero).toFixed(5);
      }
      else{
        $("#ttpmp").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }

    

    //inputTotal-razonIndiceA1
function totalRAT(){
      var nume1 = $("#inputTotal-razonIndiceA").val();
      var nume2 = $("#inputTotal-razonIndiceA1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrat").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA  ) {
        //alert("efe bru");
        $("#ttrat").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrat").val(zero).toFixed(5);
      }
      else{
        $("#ttrat").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }

    //inputTotal-razonActivosF1
function totalRAF(){
      var nume1 = $("#inputTotal-razonActivosF").val();
      var nume2 = $("#inputTotal-razonActivosF1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttraf").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA  ) {
        //alert("efe bru");
        $("#ttraf").val("el ratio promedio es: "+totalls+malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttraf").val(zero).toFixed(5);
      }
      else{
        $("#ttraf").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    //inputTotal-razonMargenB
    function totalMB(){
      var nume1 = $("#inputTotal-razonMargenB").val();
      var nume2 = $("#inputTotal-razonMargenB1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttmb").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA  ) {
        //alert("efe bru");
        $("#ttmb").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttmb").val(zero).toFixed(5);
      }
      else{
        $("#ttmb").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }

    //inputTotal-razonMargenO1
    function totalMO(){
      var nume1 = $("#inputTotal-razonMargenO").val();
      var nume2 = $("#inputTotal-razonMargenO1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttmo").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRA  ) {
        //alert("efe bru");
        $("#ttmo").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttmo").val(zero).toFixed(5);
      }
      else{
        $("#ttmo").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var nume1 = $("#inputTotal-razonInventario").val();
      var nume2 = $("#inputTotal-razonInventario1").val();
      var total = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonDiasInventario").val();
      var nume2 = $("#inputTotal-razonDiasInventario1").val();
      var total1 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonCxC").val();
      var nume2 = $("#inputTotal-razonCxC1").val();
      var total2 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonMedioC").val();
      var nume2 = $("#inputTotal-razonMedioC1").val();
      var total3 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonCxP").val();
      var nume2 = $("#inputTotal-razonCxP1").val();
      var total4 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonMedioP").val();
      var nume2 = $("#inputTotal-razonMedioP1").val();
      var total5 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonIndiceA").val();
      var nume2 = $("#inputTotal-razonIndiceA1").val();
      var total6 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonActivosF").val();
      var nume2 = $("#inputTotal-razonActivosF1").val();
      var total7 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonMargenB").val();
      var nume2 = $("#inputTotal-razonMargenB1").val();
      var total8 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonMargenO").val();
      var nume2 = $("#inputTotal-razonMargenO1").val();
      var total9 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);


      var data = google.visualization.arrayToDataTable([
        ["Element", "Resultado", { role: "style" } ],
        ["razonInventario",total,"blue"],
        ["razonDiasInventario",total1,"red"],
        ["razonCxC",total2 , "#b87333"],
        ["razonMedioC", total3, "silver"],
        ["razonCxP", total4, "gold"],
        ["razonMedioP", total5, "gray"],
        ["razonIndiceA", total6, "green"],
        ["razonActivosF", total7, "yellow"],
        ["razonMargenB", total8, "orange"],
        ["razonMargenO", total9, "purple"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Promedio de razones de actividad entre dos empresas",
        width: 450,
        height: 350,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values1"));
      chart.draw(view, options);
    }

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChartA);
    function drawChartA() {

      var nume1 = $("#inputTotal-razonInventario").val();
      var nume2 = $("#inputTotal-razonInventario1").val();
      var num1 =parseFloat(nume1);
      var num2 =parseFloat(nume2);
      

      var nume3 = $("#inputTotal-razonDiasInventario").val();
      var nume4 = $("#inputTotal-razonDiasInventario1").val();
      var num3 =parseFloat(nume3);
      var num4 =parseFloat(nume4);
      

      var nume5 = $("#inputTotal-razonCxC").val();
      var nume6 = $("#inputTotal-razonCxC1").val();
      var num5 =parseFloat(nume5);
      var num6 =parseFloat(nume6);
      

      var nume7 = $("#inputTotal-razonMedioC").val();
      var nume8 = $("#inputTotal-razonMedioC1").val();
      var num7 =parseFloat(nume7);
      var num8 =parseFloat(nume8);
      

      var nume9 = $("#inputTotal-razonCxP").val();
      var nume10 = $("#inputTotal-razonCxP1").val();
      var num9 =parseFloat(nume9);
      var num10 =parseFloat(nume10);
      

      var nume11 = $("#inputTotal-razonMedioP").val();
      var nume12 = $("#inputTotal-razonMedioP1").val();
      var num11 =parseFloat(nume11);
      var num12 =parseFloat(nume12);
      

      var nume13 = $("#inputTotal-razonIndiceA").val();
      var nume14 = $("#inputTotal-razonIndiceA1").val();
      var num13 =parseFloat(nume13);
      var num14 =parseFloat(nume14);
      

      var nume15 = $("#inputTotal-razonActivosF").val();
      var nume16 = $("#inputTotal-razonActivosF1").val();
      var num15 =parseFloat(nume15);
      var num16 =parseFloat(nume16);
      

      var nume17 = $("#inputTotal-razonMargenB").val();
      var nume18 = $("#inputTotal-razonMargenB1").val();
      var num17 =parseFloat(nume17);
      var num18 =parseFloat(nume18);
      

      var nume19 = $("#inputTotal-razonMargenO").val();
      var nume20 = $("#inputTotal-razonMargenO1").val();
      var num19 =parseFloat(nume19);
      var num20 =parseFloat(nume20);
      

      var data = google.visualization.arrayToDataTable([
        ["Element", "Resultado", { role: "style" } ],
        ["razonInventario1",num1,"blue"],
        ["razonInventario2",num2,"blue"],
        ["razonDiasInventario1",num3,"red"],
        ["razonDiasInventario2",num4,"red"],
        ["razonCxC1",num5 , "#b87333"],
        ["razonCxC2",num6 , "#b87333"],
        ["razonMedioC1", num7, "silver"],
        ["razonMedioC2", num8, "silver"],
        ["razonCxP1", num9, "gold"],
        ["razonCxP2", num10, "gold"],
        ["razonMedioP1", num11, "gray"],
        ["razonMedioP2", num12, "gray"],
        ["razonIndiceA1", num13, "green"],
        ["razonIndiceA2", num14, "green"],
        ["razonActivosF1", num15, "yellow"],
        ["razonActivosF2", num16, "yellow"],
        ["razonMargenB1", num17, "orange"],
        ["razonMargenB2", num18, "orange"],
        ["razonMargenO1", num19, "purple"],
        ["razonMargenO2", num20, "purple"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Razones de actividad de cada empresa",
        width: 500,
        height: 350,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_valuesA"));
      chart.draw(view, options);
  }

    var btn = document.querySelector('#concuRAct');

    btn.addEventListener('click',totalIN, false);
    btn.addEventListener('click',totalDIN, false);
    btn.addEventListener('click',totalRRCC, false);
    btn.addEventListener('click',totalRMC, false);
    btn.addEventListener('click',totalRCP, false);
    btn.addEventListener('click',totalPMP, false);
    btn.addEventListener('click',totalRAT, false);
    btn.addEventListener('click',totalRAF, false);
    btn.addEventListener('click',totalMB, false);
    btn.addEventListener('click',totalMO, false);
    btn.addEventListener('click',drawChart1, false);
    btn.addEventListener('click',drawChartA, false);
});

$(document).on('click',"#concuRRen",function(){
      var vcREN=$("#valComRR").val();
      //var vcRL=1;
      //var vcRA=1;
      //var vcREN=1;
      //var vcRE=1; 
    function totalNP(){
      var nume1 = $("#inputTotal-razonNetaPatr").val();
      var nume2 = $("#inputTotal-razonNetaPatr1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttnp").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcREN ) {
        //alert("efe bru");
        $("#ttnp").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttnp").val(zero).toFixed(5);
      }
      else{
        $("#ttnp").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }

    //inputTotal-razonAccion
    function totalRA(){
      var nume1 = $("#inputTotal-razonAccion").val();
      var nume2 = $("#inputTotal-razonAccion1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttra").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcREN  ) {
        //alert("efe bru");
        $("#ttra").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttra").val(zero).toFixed(5);
      }
      else{
        $("#ttra").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }

    function totalRDA(){
      var nume1 = $("#inputTotal-razonActivoTotal").val();
      var nume2 = $("#inputTotal-razonActivoTotal1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrda").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcREN ) {
        //alert("efe bru");
        $("#ttrda").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrda").val(zero).toFixed(5);
      }
      else{
        $("#ttrda").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
     function totalRV(){
      var nume1 = $("#inputTotal-razonRentVentas").val();
      var nume2 = $("#inputTotal-razonRentVentas1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrv").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcREN  ) {
        //alert("efe bru");
        $("#ttrv").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrv").val(zero).toFixed(5);
      }
      else{
        $("#ttrv").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    function totalRSI(){
      var nume1 = $("#inputTotal-razonInversion").val();
      var nume2 = $("#inputTotal-razonInversion1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrsi").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcREN  ) {
        //alert("efe bru");
        $("#ttrsi").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrsi").val(zero).toFixed(5);
      }
      else{
        $("#ttrsi").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var nume1 = $("#inputTotal-razonNetaPatr").val();
      var nume2 = $("#inputTotal-razonNetaPatr1").val();
      var total = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonAccion").val();
      var nume2 = $("#inputTotal-razonAccion1").val();
      var total1 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonActivoTotal").val();
      var nume2 = $("#inputTotal-razonActivoTotal1").val();
      var total2 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonRentVentas").val();
      var nume2 = $("#inputTotal-razonRentVentas1").val();
      var total3 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonInversion").val();
      var nume2 = $("#inputTotal-razonInversion1").val();
      var total4 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);


      var data = google.visualization.arrayToDataTable([
        ["Element", "Resultado", { role: "style" } ],
        ["razonNetaPatr",total,"blue"],
        ["razonAccion",total1,"red"],
        ["razonActivoTotal",total2 , "#b87333"],
        ["razonRentVentas", total3, "silver"],
        ["razonInversion", total4, "purple"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Promedio de razones de rentabilidad entre dos empresas",
        width: 400,
        height: 350,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values2"));
      chart.draw(view, options);
    }

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChartR);
    function drawChartR() {

      var nume1 = $("#inputTotal-razonNetaPatr").val();
      var nume2 = $("#inputTotal-razonNetaPatr1").val();
      var num1 = parseFloat(nume1);
      var num2 = parseFloat(nume2);

      var nume3 = $("#inputTotal-razonAccion").val();
      var nume4 = $("#inputTotal-razonAccion1").val();
      var num3 = parseFloat(nume3);
      var num4 = parseFloat(nume4);      

      var nume5 = $("#inputTotal-razonActivoTotal").val();
      var nume6 = $("#inputTotal-razonActivoTotal1").val();
      var num5 = parseFloat(nume5);
      var num6 = parseFloat(nume6);

      var nume7 = $("#inputTotal-razonRentVentas").val();
      var nume8 = $("#inputTotal-razonRentVentas1").val();
      var num7 = parseFloat(nume7);
      var num8 = parseFloat(nume8);

      var nume9 = $("#inputTotal-razonInversion").val();
      var nume10 = $("#inputTotal-razonInversion1").val();
      var num9 = parseFloat(nume9);
      var num10 = parseFloat(nume10);


      var data = google.visualization.arrayToDataTable([
        ["Element", "Resultado", { role: "style" } ],
        ["razonNetaPatr1",num1,"blue"],
        ["razonNetaPatr2",num2,"blue"],
        ["razonAccion1",num3,"red"],
        ["razonAccion2",num4,"red"],
        ["razonActivoTotal1",num5 , "#b87333"],
        ["razonActivoTotal2",num6 , "#b87333"],
        ["razonRentVentas1", num7, "silver"],
        ["razonRentVentas2", num8, "silver"],
        ["razonInversion1", num9, "purple"],
        ["razonInversion2", num10, "purple"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Razones de rentabilidad de cada empresa",
        width: 550,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_valuesR"));
      chart.draw(view, options);
  }

    var btn = document.querySelector('#concuRRen');

    btn.addEventListener('click',totalNP, false);
    btn.addEventListener('click',totalRA, false);
    btn.addEventListener('click',totalRDA, false);
    btn.addEventListener('click',totalRV, false);
    btn.addEventListener('click',totalRSI, false);
    btn.addEventListener('click',drawChart, false);
});



$(document).on('click',"#concuREdn",function(){

      var vcRE=$("#valComRE").val();
      //var vcRL=1;
      //var vcRA=1;
      //var vcREN=1;
      //var vcRE=1; 

    function totalGE(){
      var nume1 = $("#inputTotal-razonGradoEnd").val();
      var nume2 = $("#inputTotal-razonGradoEnd1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttge").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRE  ) {
        //alert("efe bru");
        $("#ttge").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttge").val(zero).toFixed(5);
      }
      else{
        $("#ttge").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    function totalGP(){
      var nume1 = $("#inputTotal-razonPropiedad").val();
      var nume2 = $("#inputTotal-razonPropiedad1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttgp").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRE ) {
        //alert("efe bru");
        $("#ttgp").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttgp").val(zero).toFixed(5);
      }
      else{
        $("#ttgp").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    function totalREP(){
      var nume1 = $("#inputTotal-razonEndeudoPatr").val();
      var nume2 = $("#inputTotal-razonEndeudoPatr1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //$("#ttrep").val(totalls).toFixed(5);
      //alert(totalls);
      if (totalls<vcRE ) {
        //alert("efe bru");
        $("#ttrep").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttrep").val(zero).toFixed(5);
      }
      else{
        $("#ttrep").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
    }
    function totalCGF(){
      var nume1 = $("#inputTotal-razonGastosF").val();
      var nume2 = $("#inputTotal-razonGastosF1").val();
      var totalls = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);
      //alert(totalls);
      if (totalls<vcRE) {
        
        $("#ttcgf").val("el ratio promedio es: "+totalls+ malale).toFixed(5);
      }
      if(isNaN(totalls)){
        $("#ttcgf").val(zero).toFixed(5);
      }
      else{
        $("#ttcgf").val("el ratio promedio es: "+totalls+buenale).toFixed(5);
      }
      
      //alert(totalls);
    }

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

      var nume1 = $("#inputTotal-razonGradoEnd").val();
      var nume2 = $("#inputTotal-razonGradoEnd1").val();
      var total = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonPropiedad").val();
      var nume2 = $("#inputTotal-razonPropiedad1").val();
      var total1 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonEndeudoPatr").val();
      var nume2 = $("#inputTotal-razonEndeudoPatr1").val();
      var total2 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var nume1 = $("#inputTotal-razonGastosF").val();
      var nume2 = $("#inputTotal-razonGastosF1").val();
      var total3 = ( (parseFloat(nume1) + parseFloat(nume2) ) /2);

      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["razonGradoEnd",total,"blue"],
        ["razonPropiedad",total1,"red"],
        ["razonEndeudoPatr",total2 , "#b87333"],
        ["razonGastosF", total3, "silver"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Promedio de razones de endeudamiento entre dos empresas",
        width: 400,
        height: 350,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values3"));
      chart.draw(view, options);
    }

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChartE);
    function drawChartE() {

      var nume1 = $("#inputTotal-razonGradoEnd").val();
      var nume2 = $("#inputTotal-razonGradoEnd1").val();
      var num1 = parseFloat(nume1);
      var num2 = parseFloat(nume2);

      var nume3 = $("#inputTotal-razonPropiedad").val();
      var nume4 = $("#inputTotal-razonPropiedad1").val();
      var num3 = parseFloat(nume3);
      var num4 = parseFloat(nume4);      

      var nume5 = $("#inputTotal-razonEndeudoPatr").val();
      var nume6 = $("#inputTotal-razonEndeudoPatr1").val();
      var num5 = parseFloat(nume5);
      var num6 = parseFloat(nume6);

      var nume7 = $("#inputTotal-razonGastosF").val();
      var nume8 = $("#inputTotal-razonGastosF1").val();
      var num7 = parseFloat(nume7);
      var num8 = parseFloat(nume8);



      var data = google.visualization.arrayToDataTable([
        ["Element", "Resultado", { role: "style" } ],
        ["razonGradoEnd1",num1,"blue"],
        ["razonGradoEnd2",num2,"blue"],
        ["razonPropiedad1",num3,"red"],
        ["razonPropiedad2",num4,"red"],
        ["razonEndeudoPatr1",num5 , "#b87333"],
        ["razonEndeudoPatr2",num6 , "#b87333"],
        ["razonGastosF1", num7, "silver"],
        ["razonGastosF2", num8, "silver"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Razones de endeudamiento de cada empresa",
        width: 550,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_valuesE"));
      chart.draw(view, options);
  }

    var btn = document.querySelector('#concuREdn');

    btn.addEventListener('click',totalGE, false);
    btn.addEventListener('click',totalGP, false);
    btn.addEventListener('click',totalREP, false);
    btn.addEventListener('click',totalCGF, false);

});




  //$(document).on('click',"#resultados-razonLiquidez",function(){
  //$("body").on("click", "#resultados-razonLiquidez", function() {
  
  function razonPromedio(){
    var numerador = $("#activoCorriente-razonLiquidez2").val();
    var denominador = $("#activoCorriente-razonLiquidez3").val();
    var total = (numerador/ ((parseFloat(numerador) + parseFloat(denominador))/2));
    
    $("#inputTotal-razonLiquidezP").val(total).toFixed(5);
    }

  function razonLiquidez(){
    var numerador = $("#activoCorriente-razonLiquidez").val();
    var denominador = $("#pasivoCorriente-razonLiquidez").val();
    var total = (numerador / denominador);
    
    $("#inputTotal-razonLiquidez").val(total).toFixed(5);
    }

//########################################################
function razonEfectivo(){
    var numerador1 = 0;
    $(".input_numerador_efectivo").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );
  var denominador1 = 0;
    $(".input_numerador_valorCortoPlazo").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador1 += eval($(this).val());
        }
      }
    );
    //var pc = document.getElementById('pasivoCorriente-razonEfectivo');
    var pc = $("#pasivoCorriente-razonEfectivo").val();
    //console.log(pc);
    var total1 = ((numerador1 + denominador1) / pc).toFixed(5);

    
    $("#inputTotal-razonEfectivo").val(total1);

    $("#id_numerador_efectivo").change(function() {
    var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros = texto.replace(/[^0-9.]/g, '');
    $(".input_numerador_efectivo").val(numeros);
  });

  $("#id_numerador_valorCortoPlazo").change(function() {
    var texto1 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros1 = texto1.replace(/[^0-9.]/g, '');
    $(".input_numerador_valorCortoPlazo").val(numeros1);
  });

}
    //#########################################33
function razonCapital(){
    var numerador2 = $("#activoCorriente-razonCapital").val();
    var denominador2 = $("#pasivoCorriente-razonCapital").val();
    var at = $("#activoTotal-razonCapital").val();
    var total2 = ((numerador2 - denominador2) / at).toFixed(5);
    
    $("#inputTotal-razonCapital").val(total2);

    }

function razonRapida(){
    var numerador2 = $("#activoCorriente-razonRapida").val();
    var denominador2 = $("#pasivoCorriente-razonRapida").val();
    var inv = $("#inventario-razonRapida").val();
    var total2 = ((numerador2 - inv) / denominador2).toFixed(5);
    
    $("#inputTotal-razonRapida").val(total2);

    }    

var btn = document.querySelector('#resultados-razonLiquidez');

    btn.addEventListener('click',razonLiquidez, false);
    btn.addEventListener('click',razonCapital, false);
    btn.addEventListener('click',razonEfectivo, false);
    btn.addEventListener('click',razonRapida, false);
    btn.addEventListener('click',razonPromedio, false);

  //});

//############################# RATIOS 2 ##################################
  //$(document).on('click',"#resultados-razonLiquidez1",function(){
  //$("body").on("click", "#resultados-razonLiquidez", function() {
  
  

  function razonLiquidez1(){
    var numerador = $("#activoCorriente-razonLiquidez1").val();
    var denominador= $("#pasivoCorriente-razonLiquidez1").val();
    //var denominador1 = $("#pasivoCorriente-razonLiquidez").val();
    //var total = (numerador / ((parseFloat(denominador) + parseFloat(denominador1))/2));
    var total = (numerador / denominador);
    
    $("#inputTotal-razonLiquidez1").val(total).toFixed(5);
    }

//########################################################
function razonEfectivo1(){
    var numerador1 = 0;
    $("#input_numerador_efectivo1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );
  var denominador1 = 0;
    $("#input_numerador_valorCortoPlazo1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador1 += eval($(this).val());
        }
      }
    );
    //var pc = document.getElementById('pasivoCorriente-razonEfectivo');
    var pc = $("#pasivoCorriente-razonEfectivo1").val();
    //console.log(pc);
    var total1 = ((numerador1 + denominador1) / pc).toFixed(5);

    
    $("#inputTotal-razonEfectivo1").val(total1);

    $("#id_numerador_efectivo1").change(function() {
    var texto = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros = texto.replace(/[^0-9.]/g, '');
    $("#input_numerador_efectivo1").val(numeros);
  });

  $("#id_numerador_valorCortoPlazo1").change(function() {
    var texto1 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros1 = texto1.replace(/[^0-9.]/g, '');
    $("#input_numerador_valorCortoPlazo1").val(numeros1);
  });

}
    //#########################################33
function razonCapital1(){
    var numerador2 = $("#activoCorriente-razonCapital1").val();
    var denominador2 = $("#pasivoCorriente-razonCapital1").val();
    var at = $("#activoTotal-razonCapital1").val();
    var total2 = ((numerador2 - denominador2) / at).toFixed(5);
    
    $("#inputTotal-razonCapital1").val(total2);

    }

function razonRapida1(){
    var numerador2 = $("#activoCorriente-razonRapida1").val();
    var denominador2 = $("#pasivoCorriente-razonRapida1").val();
    var inv = $("#inventario-razonRapida1").val();
    var total2 = ((numerador2 - inv) / denominador2).toFixed(5);
    
    $("#inputTotal-razonRapida1").val(total2);

    }    

var btn = document.querySelector('#resultados-razonLiquidez1');

    btn.addEventListener('click',razonLiquidez1, false);
    btn.addEventListener('click',razonCapital1, false);
    btn.addEventListener('click',razonEfectivo1, false);
    btn.addEventListener('click',razonRapida1, false);
    //btn.addEventListener('click',razonPromedio, false);

  //});
//#########################RATIOS DE ACTIVIDAD###########################################

  //$(document).on('click',"#resultados-razonActividad",function(){

function razonInventario(){
    
    var numerador12 = $("#id_numerador_costosVentas_razonInventario").val();
    var denominador12 = $("#inventario-razonInventario").val();
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonInventario").val(total12);    

}

    function razonDiasInventario(){
    

    var numerador12 = $("#id_numerador_costosVentas_razonDiasInventario").val();
    var denominador12 = $("#inventario-razonDiasInventario").val();
  
    var total12 = (denominador12 / (numerador12 / 365)).toFixed(5);

    $("#inputTotal-razonDiasInventario").val(total12);    

}

function razonCxC(){

    var numerador12 = $("#id_numerador_ventasNetas_razonCxC").val();
    var denominador12 = $("#CxC-razonCxC").val();
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonCxC").val(total12);    

}

function razonMedioC(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonMedioC").val();
    var denominador12 = $("#CxC-razonMedioC").val();
  
    var total12 = ((denominador12 * 365) / numerador12).toFixed(5);

    $("#inputTotal-razonMedioC").val(total12);    

}

function razonCxP(){
      
    var numerador1 = $("#id_numerador_compras_razonCxP").val();
    var denominador1 = $("#CxP-razonCxP").val();
    var total1 = ((numerador1 ) / denominador1).toFixed(5);

    $("#inputTotal-razonCxP").val(total1);

}

function razonMedioP(){

    var numerador1 = $("#id_numerador_compras_razonMedioP").val();  
    var denominador1 = $("#mCxP-razonCxP").val();
    var total1 = ((denominador1 * 365 ) / numerador1).toFixed(5);

    $("#inputTotal-razonMedioP").val(total1);  

}

function razonIndiceA(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonIndiceA").val();
    var denominador12 = $("#activoTotal-razonIndiceA").val();
  
    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonIndiceA").val(total12);    

}

function razonActivosF(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonActivosF").val();
    var denominador12 = $("#activoFijoNeto-razonActivoF").val();

    var total12 = (numerador12 / denominador12).toFixed(5);

    $("#inputTotal-razonActivosF").val(total12);    

}

function razonMargenB(){
   

/*    var ingreso = $("#id_numerador_ventasNetas_razonMedioC").val();
    var costosv = $("#id_numerador_costosVentas_razonInventario").val();

    var utilidadB = (ingreso - costosv);

    $("#utilidadB-razonMargenB").val(utilidadB);*/

    var numerador12 = $("#id_numerador_ventasNetas_razonMargenB").val();
    var denominador12 = $("#utilidadB-razonMargenB").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonMargenB").val(total12);    

}

function razonMargenO(){
    
    var numerador12 = $("#id_numerador_ventas_razonMargenO").val();

    var denominador12 = $("#utilidadO-razonMargenO").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonMargenO").val(total12);    

}

var btn1 = document.querySelector('#resultados-razonActividad');

    btn1.addEventListener('click',razonInventario, false);
    btn1.addEventListener('click',razonDiasInventario, false);
    btn1.addEventListener('click',razonCxC, false);
    btn1.addEventListener('click',razonMedioC, false);
    btn1.addEventListener('click',razonCxP, false);
    btn1.addEventListener('click',razonMedioP, false);
    btn1.addEventListener('click',razonIndiceA, false);
    btn1.addEventListener('click',razonActivosF, false);
    btn1.addEventListener('click',razonMargenB, false);
    btn1.addEventListener('click',razonMargenO, false);


  //});

//#########################RATIOS DE ACTIVIDAD 1 ###########################################

  //$(document).on('click',"#resultados-razonActividad1",function(){

function razonInventario1(){
    
    var numerador12 = $("#id_numerador_costosVentas_razonInventario1").val();
    var denominador1 = $("#inventario-razonInventario1").val();
    //var denominador2 = $("#inventario-razonInventario").val();
  
    var total12 = (numerador12 / (denominador1)  ).toFixed(5);

    $("#inputTotal-razonInventario1").val(total12);    

}

    function razonDiasInventario1(){
    
    var numerador12 = $("#id_numerador_costosVentas_razonDiasInventario1").val();
    var denominador1 = $("#inventario-razonDiasInventario1").val();
    //var denominador2 = $("#inventario-razonDiasInventario").val();
  
    //var total12 = (numerador12 / ((parseFloat(denominador1) + parseFloat(denominador2))/2)).toFixed(5);
    var total12 = ( ((denominador1 )) / (numerador12 / 365)).toFixed(5);

    $("#inputTotal-razonDiasInventario1").val(total12);    

}

function razonCxC1(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonCxC1").val();

    var denominador1 = $("#CxC-razonCxC1").val();
    //var denominador2 = $("#CxC-razonCxC").val();
  
    var total12 = ( numerador12 / denominador1 ).toFixed(5);

    $("#inputTotal-razonCxC1").val(total12);    

}

function razonMedioC1(){
    
    var numerador12 = $("#id_numerador_ventasNetas_razonMedioC1").val();
    var denominador1 = $("#CxC-razonMedioC1").val();
   // var denominador2 = $("#CxC-razonMedioC").val();
  
    var total12 = ( (denominador1  * 365) / numerador12).toFixed(5);

    $("#inputTotal-razonMedioC1").val(total12);    

}

function razonCxP1(){
  
    var numerador1 = $("#id_numerador_compras_razonCxP1").val();  
    var denominador1 = $("#CxP-razonCxP1").val();
    //var denominador2 = $("#CxP-razonCxP").val();
    //var total1 = ( / numerador1).toFixed(5);
    var total1 = ( (numerador1) / (denominador1) ).toFixed(5);

    
    $("#inputTotal-razonCxP1").val(total1);

}

function razonMedioP1(){
    
    var numerador1 = $("#id_numerador_compras_razonMedioP1").val();
    var denominador1 = $("#mCxP-razonCxP1").val();
    //var denominador2 = $("#CxP-razonCxP").val();
    var total1 = ( ( (denominador1 )*365 ) / numerador1).toFixed(5);
    
    $("#inputTotal-razonMedioP1").val(total1);
}

function razonIndiceA1(){
    var numerador12 = $("#id_numerador_ventasNetas_razonIndiceA1").val();
    var denominador1 = $("#activoTotal-razonIndiceA1").val();
    //var denominador2 = $("#activoTotal-razonIndiceA").val();
  
    var total12 = (numerador12 / (( denominador1 ))).toFixed(5);

    $("#inputTotal-razonIndiceA1").val(total12);    

}

function razonActivosF1(){


     var numerador12 = $("#id_numerador_ventasNetas_razonActivosF1").val();
     var denominador1 = $("#activoFijoNeto-razonActivoF1").val();
     //var denominador2 = $("#activoFijoNeto-razonActivoF").val();
  
    var total12 = (numerador12 / ((denominador1 ))).toFixed(5);

    $("#inputTotal-razonActivosF1").val(total12);    

}

function razonMargenB1(){
    
    /*
    var ingreso = $("#id_numerador_ventasNetas_razonMedioC").val();
    var costosv = $("#id_numerador_costosVentas_razonInventario").val();

    var utilidadB = (ingreso - costosv);

    $("#utilidadB-razonMargenB1").val(utilidadB);*/

    var numerador12 = $("#id_numerador_ventasNetas_razonMargenB1").val();
    var denominador12 = $("#utilidadB-razonMargenB1").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonMargenB1").val(total12);    

}

function razonMargenO1(){
    var numerador12 = $("#id_numerador_ventas_razonMargenO1").val();

    var denominador12 = $("#utilidadO-razonMargenO1").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonMargenO1").val(total12);    

}

var btn1 = document.querySelector('#resultados-razonActividad1');

    btn1.addEventListener('click',razonInventario1, false);
    btn1.addEventListener('click',razonDiasInventario1, false);
    btn1.addEventListener('click',razonCxC1, false);
    btn1.addEventListener('click',razonMedioC1, false);
    btn1.addEventListener('click',razonCxP1, false);
    btn1.addEventListener('click',razonMedioP1, false);
    btn1.addEventListener('click',razonIndiceA1, false);
    btn1.addEventListener('click',razonActivosF1, false);
    btn1.addEventListener('click',razonMargenB1, false);
    btn1.addEventListener('click',razonMargenO1, false);


  //});

//#########################RATIOS DE RENTABILIDAD###########################################

//$(document).on('click',"#resultados-razonRentabilidad",function(){


function razonNetaPatr(){
  /*
    var numerador12 = 0;
    $("#input_numerador_patrimonioP_razonNetaP").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonioP_razonNetaP").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonioP_razonNetaP").val(numeros12);
  });*/

    var numerador12 = $("#input_numerador_patrimonioP_razonNetaP").val();
    var denominador12 = $("#utilidadN-razonNetaP").val();
  
    var total12 = (denominador12/ numerador12).toFixed(5);

    $("#inputTotal-razonNetaPatr").val(total12);    

}

function razonAccion(){
    
    var numerador = $("#utilidadN-razonAccion").val();
    var denominador = $("#numeroAcciones").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonAccion").val(total);    

}

function razonActivoTotal(){
    
    var numerador = $("#utilidadN-razonRentActivo").val();
    var denominador = $("#activoTotal-razonRentActivo").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonActivoTotal").val(total);    

}

function razonRentVentas(){
    
    var numerador = $("#utilidadN-razonRentVentas").val();
    var denominador = $("#id_numerador_ventas_razonRentVentas").val();
/*
    var denominador = 0;
    $("#input_numerador_ventas_razonRentVentas").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador += eval($(this).val());
        }
      }
    );

    $("#id_numerador_ventas_razonRentVentas").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventas_razonRentVentas").val(numeros12);
  });
  */
    
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonRentVentas").val(total);    

}

function razonInversion(){
    
   
    var denominador1 = 0;
    $("#input_numerador_inv_razonInversion").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador1 += eval($(this).val());
        }
      }
    );


    $("#id_numerador_inv_razonInversion").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_inv_razonInversion").val(numeros12);
  });

    var numerador1 = $("#id_numerador_ing_razonInversion").val();
  
    var total1 = ((numerador1 - denominador1)/ denominador1).toFixed(5);

    $("#inputTotal-razonInversion").val(total1);

}


var btn2 = document.querySelector('#resultados-razonRentabilidad');

    btn2.addEventListener('click',razonNetaPatr, false);
    btn2.addEventListener('click',razonAccion, false);
    btn2.addEventListener('click',razonActivoTotal, false);
    btn2.addEventListener('click',razonRentVentas, false);
    btn2.addEventListener('click',razonInversion, false);





//###############################################
 // $("body").on("click", "#resultados_razonEfectivo", function() {
  
  //});

  

//});

//#########################RATIOS DE RENTABILIDAD###########################################

//$(document).on('click',"#resultados-razonRentabilidad1",function(){


function razonNetaPatr1(){
  /*
    var numerador12 = 0;
    $("#input_numerador_patrimonioP_razonNetaP1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador12 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonioP_razonNetaP1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonioP_razonNetaP1").val(numeros12);
  });
  */
    //var numerador2 = $("#input_numerador_patrimonioP_razonNetaP").val();
    var numerador12 = $("#input_numerador_patrimonioP_razonNetaP1").val();
    var denominador12 = $("#utilidadN-razonNetaP1").val();
  
    var total12 = (denominador12/ (numerador12)).toFixed(5);

    $("#inputTotal-razonNetaPatr1").val(total12);    

}

function razonAccion1(){
    
    var numerador = $("#utilidadN-razonAccion1").val();
    var denominador = $("#numeroAcciones1").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonAccion1").val(total);    

}

function razonActivoTotal1(){
    
    var numerador = $("#utilidadN-razonRentActivo1").val();
    var denominador1 = $("#activoTotal-razonRentActivo1").val();
    //var denominador2 = $("#activoTotal-razonRentActivo").val();
  
    var total = (numerador / (denominador1) ).toFixed(5);

    $("#inputTotal-razonActivoTotal1").val(total);    

}

function razonRentVentas1(){
    
    var numerador = $("#utilidadN-razonRentVentas1").val();
    var denominador = $("#id_numerador_ventas_razonRentVentas1").val();
/*
    var denominador = 0;
    $("#input_numerador_ventas_razonRentVentas1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador += eval($(this).val());
        }
      }
    );

    $("#id_numerador_ventas_razonRentVentas1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_ventas_razonRentVentas1").val(numeros12);
  });
  */  
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonRentVentas1").val(total);    

}

function razonInversion1(){
    
   
    var denominador12 = 0;
    $("#input_numerador_inv_razonInversion1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        denominador12 += eval($(this).val());
        }
      }
    );


    $("#id_numerador_inv_razonInversion1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_inv_razonInversion1").val(numeros12);
  });

    var numerador12 = $("#id_numerador_ing_razonInversion1").val();

  
    var total12 = ((numerador12 - denominador12)/ denominador12).toFixed(5);

    $("#inputTotal-razonInversion1").val(total12);    

}


var btn2 = document.querySelector('#resultados-razonRentabilidad1');

    btn2.addEventListener('click',razonNetaPatr1, false);
    btn2.addEventListener('click',razonAccion1, false);
    btn2.addEventListener('click',razonActivoTotal1, false);
    btn2.addEventListener('click',razonRentVentas1, false);
    btn2.addEventListener('click',razonInversion1, false);

//###############################################
 // $("body").on("click", "#resultados_razonEfectivo", function() {
  
  //});

//});

//#########################RATIOS DE RENTABILIDAD###########################################

//$(document).on('click',"#resultados-razonGradoEnd",function(){

function razonGradoEnd(){
    
    var numerador = $("#pasivoTotal-razonEndeudo").val();
    var denominador = $("#activoTotal-razonEndeudo").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonGradoEnd").val(total);    

}

function razonPropiedad(){
/*    
    var numerador1 = 0;
    $("#input_numerador_patrimonio_razonPropiedad").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonio_razonPropiedad").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonio_razonPropiedad").val(numeros12);
  });
  */
    var numerador1 = $("#input_numerador_patrimonio_razonPropiedad").val();
    var denominador1 = $("#activoTotal-razonPropiedad").val();
  
    var total1 = (numerador1 / denominador1).toFixed(5);

    $("#inputTotal-razonPropiedad").val(total1);    

}

function razonEndeudoPatr(){
    /*
    var numerador1 = 0;
    $("#input_numerador_patrimonioTotal_razonEndeudoPatr").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonioTotal_razonEndeudoPatr").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonioTotal_razonEndeudoPatr").val(numeros12);
  });*/
    var numerador1 = $("#input_numerador_patrimonioTotal_razonEndeudoPatr").val();
    var denominador1 = $("#pasivoTotal-razonEndeudoPatr").val();
  
    var total1 = (denominador1 / numerador1).toFixed(5);

    $("#inputTotal-razonEndeudoPatr").val(total1);    

}

function razonGastosF(){
    
    var numerador1 = $("#id_numerador_g_razonGastosF").val();
    var denominador1 = $("#cobertura-razonGastosF").val();
  
    var total1 = (denominador1 / numerador1).toFixed(5);

    $("#inputTotal-razonGastosF").val(total1);    

}

var btn3 = document.querySelector('#resultados-razonGradoEnd');

    btn3.addEventListener('click',razonGradoEnd, false);
    btn3.addEventListener('click',razonPropiedad, false);
    btn3.addEventListener('click',razonEndeudoPatr, false);
    btn3.addEventListener('click',razonGastosF, false);

//});


//#########################RATIOS DE RENTABILIDAD###########################################

//$(document).on('click',"#resultados-razonGradoEnd1",function(){

function razonGradoEnd1(){
    
    var numerador = $("#pasivoTotal-razonEndeudo1").val();
    var denominador = $("#activoTotal-razonEndeudo1").val();
  
    var total = (numerador / denominador).toFixed(5);

    $("#inputTotal-razonGradoEnd1").val(total);    

}

function razonPropiedad1(){
    /*
    var numerador1 = 0;
    $("#input_numerador_patrimonio_razonPropiedad1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonio_razonPropiedad1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonio_razonPropiedad1").val(numeros12);
  });
  */
    var numerador1 = $("#input_numerador_patrimonio_razonPropiedad1").val();
    var denominador1 = $("#activoTotal-razonPropiedad1").val();
  
    var total1 = (numerador1 / denominador1).toFixed(5);

    $("#inputTotal-razonPropiedad1").val(total1);    

}

function razonEndeudoPatr1(){
    /*
    var numerador1 = 0;
    $("#input_numerador_patrimonioTotal_razonEndeudoPatr1").each(function(index, value) {
        if ( $.isNumeric( $(this).val() ) ){
        numerador1 += eval($(this).val());
        }
      }
    );

    $("#id_numerador_patrimonioTotal_razonEndeudoPatr1").change(function() {
    var texto12 = $(this).find('option:selected').text(); // Capturamos el texto del option seleccionado
    var numeros12 = texto12.replace(/[^0-9.]/g, '');
    $("#input_numerador_patrimonioTotal_razonEndeudoPatr1").val(numeros12);
  });*/
    var numerador1 = $("#input_numerador_patrimonioTotal_razonEndeudoPatr1").val();
    var denominador1 = $("#pasivoTotal-razonEndeudoPatr1").val();
  
    var total1 = (denominador1 / numerador1).toFixed(5);

    $("#inputTotal-razonEndeudoPatr1").val(total1);    

}

function razonGastosF1(){
    
    var numerador1 = $("#id_numerador_g_razonGastosF1").val();
    var denominador1 = $("#cobertura-razonGastosF1").val();
  
    var total1 = (denominador1 / numerador1).toFixed(5);

    $("#inputTotal-razonGastosF1").val(total1);    

}

var btn3 = document.querySelector('#resultados-razonGradoEnd1');

    btn3.addEventListener('click',razonGradoEnd1, false);
    btn3.addEventListener('click',razonPropiedad1, false);
    btn3.addEventListener('click',razonEndeudoPatr1, false);
    btn3.addEventListener('click',razonGastosF1, false);

//});

});