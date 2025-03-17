<?php

use App\Models\Tenant\Empresa;
use App\Tenant\TenantFacade;
use Illuminate\Support\Facades\DB;

/*
    * Converter todos caracteres de um objeto para UTF8
    * @param  Object  $object
    * @return Object $object
    */
function utf8_converter($object)
{
    foreach ($object as $array) {
        $array = array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                // $item = utf8_encode($item);
                $item = mb_convert_encoding($item, 'UTF-8', 'ISO-8859-1');
            }
        });
    }
    return $object;
}


/**
 * Encode array from latin1 to utf8 recursively
 * @param $dat
 * @return array|string
 */
function convert_from_latin1_to_utf8_recursively($dat)
{
    if (is_string($dat)) {
        // return utf8_encode($dat);
        return mb_convert_encoding($dat, 'UTF-8', 'ISO-8859-1');
    } elseif (is_array($dat)) {
        $ret = [];
        foreach ($dat as $i => $d) $ret[$i] = convert_from_latin1_to_utf8_recursively($d);

        return $ret;
    } elseif (is_object($dat)) {
        foreach ($dat as $i => $d) $dat->$i = convert_from_latin1_to_utf8_recursively($d);

        return $dat;
    } else {
        return $dat;
    }
}

/* Use it for json_encode some corrupt UTF-8 chars
* useful for = malformed utf-8 characters possibly incorrectly encoded by json_encode
*/
function utf8ize($mixed)
{
    if (is_array($mixed)) {
        foreach ($mixed as $key => $value) {
            $mixed[$key] = utf8ize($value);
        }
    } elseif (is_string($mixed)) {
        return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
    }
    return $mixed;
}

function convert($dat)
{
    if (is_string($dat)) {
        // return utf8_encode($dat);
        return mb_convert_encoding($dat, 'UTF-8', 'ISO-8859-1');
    }

    if (!is_array($dat))
        return $dat;
    $ret = array();
    foreach ($dat as $i => $d)
        $ret[$i] = convert($d);
    return $ret;
}

function valorTabela($codtabelapreco)
{
    switch ($codtabelapreco) {
        case 1:
            return 'VL_T1';
            break;

        case 2:
            return 'VL_T2';
            break;

        case 3:
            return 'VL_T3';
            break;

        case 4:
            return 'VL_T4';
            break;
    }
}

//////////////////////CRIPTOGRAFIA/////////////////////////////////////
/**
 * @param string Palavra
 * @return string
 */
function enc($word)
{
    // $add_text = "147258369789654123159357RICA" . auth()->user()->CODIGO;
    $add_text = "147258369789654123159357RICA";
    $word .= $add_text;
    $s = strlen($word) + 1;
    $nw = "";
    $n = 97;
    for ($x = 1; $x < $s; $x++) {
        $m = $x * $n;
        if ($m > $s) {
            $nindex = $m % $s;
        } else if ($m < $s) {
            $nindex = $m;
        }
        if ($m % $s == 0) {
            $nindex = $x;
        }
        $nw = $nw . $word[$nindex - 1];
    }
    return $nw;
}

/**
 * @param string Palavra
 * @return string
 */
function dec($word)
{
    // $add_text = "147258369789654123159357RICA" . auth()->user()->CODIGO;
    $add_text = "147258369789654123159357RICA";
    $s = strlen($word) + 1;
    $nw = "";
    $n = 97;
    for ($y = 1; $y < $s; $y++) {
        $m = $y * $n;
        if ($m % $s == 1) {
            $n = $y;
            break;
        }
    }
    for ($x = 1; $x < $s; $x++) {
        $m = $x * $n;
        if ($m > $s) {
            $nindex = $m % $s;
        } else if ($m < $s) {
            $nindex = $m;
        }
        if ($m % $s == 0) {
            $nindex = $x;
        }
        $nw = $nw . $word[$nindex - 1];
    }
    $t = strlen($nw) - strlen($add_text);
    if (strpos($nw, $add_text) == false) {
        return 0;
    }
    return substr($nw, 0, $t);
}
//////////////////////CRIPTOGRAFIA/////////////////////////////////////


function formataDinheiro($valor)
{
    return NumberFormatter::create('pt-BR', NumberFormatter::CURRENCY)->format((float)$valor ?? 0);

    // Mais de 2 casas decimais
    // $v = NumberFormatter::create('pt-BR', NumberFormatter::CURRENCY);
    // $v->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 4);
    // return $v->format((float)$valor ?? 0);


    //JAVASCRIPT    
    // .toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')    

    //Input HTML
    // pattern="^\d+(?:\.\d{1,2})?$" min="0" step="0.01" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':''"
}

function formataCnpjCpf($value)
{
  $CPF_LENGTH = 11;
  $cnpj_cpf = preg_replace("/\D/", '', $value);
  
  if (strlen($cnpj_cpf) === $CPF_LENGTH) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
  } 
  
  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}

function formataTelefone($phone)
{
    $formatedPhone = preg_replace('/[^0-9]/', '', $phone);
    $matches = [];
    preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);
    if ($matches) {
        return '('.$matches[1].') '.$matches[2].'-'.$matches[3];
    }

    return $phone; // return number without format
}

function formataData($var)
{
    if ($var == null)
        return "";

    $var = convert($var);
    $hora = explode(' ', $var);

    if (explode(' ', $var) > 0) {
        $var = explode(' ', $var)[0];
        // dd($hora);
    }

    $arr = explode('-', $var);

    if (isset($hora[1])) {
        return $arr[2] . "/" . $arr[1] . "/" . $arr[0] . " " . $hora[1];
    }

    return $arr[2] . "/" . $arr[1] . "/" . $arr[0];
}

function stringToColorCode($str)
{
    $code = dechex(crc32($str));
    $code = substr($code, 0, 6);
    return $code;
}

function tirarAcentos($string)
{
    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
}
