<?php
    //Configurando o fuso horário
    date_default_timezone_set('America/Sao_Paulo');

    //Obtendo os meses anteriores e posteriores
    if(isset($_GET['mes'])) {
        $mes = $_GET['mes'];
    }
    else {
        //Este mês
        $mes = date('Y-m');
    }

    //Checando o formato da hora
    $timestamp = strtotime($mes . '-01');
    if($timestamp === false) {
        $mes = date('Y-m');
        $timestamp = strtotime($mes . '-01');
    }

    //Hoje
    $hoje = date('Y-m-j', time());

    //Título da tag <H3>
    $titulo = date('Y / m', $timestamp);

    //Criando os links para os meses anteriores e posteriores mktime (hora, minuto, segundo, mes, dia, ano)
    $anterior = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $proximo = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

    //Contagem dos dias no mês
    $cont_dias = date('t', $timestamp);

    //0:Dom 1:Seg 2:Ter 3:qua 4:qui 5:sex 6:sab
    $dias =date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

    //Criando o calendário
    $semanas = [];
    $semana = '';

    //Adiciona células vazias
    $semana .= str_repeat('<td></td>', $dias);

    for( $dia = 1; $dia <= $cont_dias; $dia++, $dias++) {

        $data = $mes. '-'. $dia;

        if ($hoje == $data) {
            $semana .= '<td class="today">'. $dia;
        }
        else {
            $semana .= '<td>'. $dia;
        }
        $semana .= '</td>';

        //Fim da semana ou fim do mês
        if ($dias % 7 == 6 || $dia == $cont_dias) {

            if ($dia == $cont_dias) {
                //Adiciona células vazias
                $semana .= str_repeat('<td></td>', 6 - ($dias % 7));
            }

            $semanas[] = '<tr>' .$semana. '</tr>';

            //Prepara para uma nova semana
            $semana = '';
        }
    }  
?>