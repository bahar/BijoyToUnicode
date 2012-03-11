<?php

/*
    Document   : Bijoy to Unicode (UTF-8) converter
    Created on : Mar 10, 2012, 10:23:43 AM
    @author    : Habib Ullah Bahar
    Email      : bahar@progmaatic.com
    Organization  : http://progmaatic.com

    Description: Converts any string (no virtual length limitation) written in Bijoy fonts (SutonnyMJ etc) to Unicode format.
  
    Usage:      1. include 'bijoy2unicode.php' 
                2.Call convertBijoyToUnicode($stringToFormat) function, Unicode formatted string will be returned.
    
    Pre-requisite: Multibyte Support (mbstring) must be present.
  
    Credits: Original javascript character mapping was done by Abdullah Ibne Alam. Shohag, www.repulsivecoder.com/2009/06/04/bijoy-to-unicode-converter/
    
    Copyright:
               GNU AFFERO GENERAL PUBLIC LICENSE, Version 3 (AGPL-3.0)
 
  
*/




$preConversionMap = array(
    ' +' => ' ',
    'yy' => 'y', //Double Hrosh-u-Kar
    'vv' => 'v', //Double Aa-Kar
    '­­' => '­', //Double Jukto-L - L+Double-L = Triple L
    'y&' => 'y', //Hoshonto+Hrosh-u
    '„&' => '„', //Hoshonto+Ri-Kar
    '‡u' => 'u‡', //ChondroBindu Error /Typing Mistake
    'wu' => 'uw', //ChondroBindu Error /Typing Mistake
    ' ,' => ',',
    ' \\|' => '\\|',
    '\\\\ ' => '',
    ' \\\\' => '',
    '\\\\' => '',
    '\n +' => '\n',
    ' +\n' => '\n',
    '\n\n\n\n\n' => '\n\n',
    '\n\n\n\n' => '\n\n',
    '\n\n\n' => '\n\n'
);

$conversionMap = array(
    // Vowels Start
    'Av' => 'আ',
    'A' => 'অ',
    'B' => 'ই',
    'C' => 'ঈ',
    'D' => 'উ',
    'E' => 'ঊ',
    'F' => 'ঋ',
    'G' => 'এ',
    'H' => 'ঐ',
    'I' => 'ও',
    'J' => 'ঔ',
    // Constants
    'K' => 'ক',
    'L' => 'খ',
    'M' => 'গ',
    'N' => 'ঘ',
    'O' => 'ঙ',
    'P' => 'চ',
    'Q' => 'ছ',
    'R' => 'জ',
    'S' => 'ঝ',
    'T' => 'ঞ',
    'U' => 'ট',
    'V' => 'ঠ',
    'W' => 'ড',
    'X' => 'ঢ',
    'Y' => 'ণ',
    'Z' => 'ত',
    '_' => 'থ',
    '`' => 'দ',
    'a' => 'ধ',
    'b' => 'ন',
    'c' => 'প',
    'd' => 'ফ',
    'e' => 'ব',
    'f' => 'ভ',
    'g' => 'ম',
    'h' => 'য',
    'i' => 'র',
    'j' => 'ল',
    'k' => 'শ',
    'l' => 'ষ',
    'm' => 'স',
    'n' => 'হ',
    'o' => 'ড়',
    'p' => 'ঢ়',
    'q' => 'য়',
    'r' => 'ৎ',
    's' => 'ং',
    't' => 'ঃ',
    'u' => 'ঁ',
    // Numbers
    '0' => '০',
    '1' => '১',
    '2' => '২',
    '3' => '৩',
    '4' => '৪',
    '5' => '৫',
    '6' => '৬',
    '7' => '৭',
    '8' => '৮',
    '9' => '৯',
    // Kars
    '•' => 'ঙ্',
    'v' => 'া', // Aa-Kar
    'w' => 'ি', // i-Kar
    'x' => 'ী', // I-Kar
    'y' => 'ু', // u-Kar
    'z' => 'ু', // u-Kar
    '“' => 'ু', // u-kar
    '–' => 'ু', // u-kar
    '~' => 'ূ', // U-kar
    'ƒ' => 'ূ', // U-kaar
    '‚' => 'ূ', // U-kaar
    '„„' => 'ৃ', //Double Rri-kar Bug
    '„' => 'ৃ', // Ri-Kar
    '…' => 'ৃ', // Ri-Kar
    '†' => 'ে', // E-Kar
    '‡' => 'ে', // E-Kar
    'ˆ' => 'ৈ', // Oi-Kar
    '‰' => 'ৈ', // Oi-Kar
    'Š' => 'ৗ', // Ou-Kar
    '\\|' => '।', // Full-Stop
    '\\&' => '্‌', // Ho-shonto
    //	Jukto Okkhor
    '\\^' => '্ব',
    '‘' => '্তু',
    '’' => '্থ',
    '‹' => '্ক',
    'Œ' => '্ক্র',
    '”' => 'চ্',
    '—' => '্ত',
    '˜' => 'দ্',
    '™' => 'দ্',
    'š' => 'ন্',
    '›' => 'ন্',
    'œ' => '্ন',
    'Ÿ' => '্ব',
    '¡' => '্ব',
    '¢' => '্ভ',
    '£' => '্ভ্র',
    '¤' => 'ম্',
    '¥' => '্ম',
    '¦' => '্ব',
    '§' => '্ম',
    '¨' => '্য',
    '©' => 'র্',
    'ª' => '্র',
    '«' => '্র',
    '¬' => '্ল',
    '­' => '্ল',
    '®' => 'ষ্',
    '¯' => 'স্',
    '°' => 'ক্ক',
    '±' => 'ক্ট',
    '²' => 'ক্ষ্ণ', //shu(kkhno)
    '³' => 'ক্ত',
    '´' => 'ক্ম',
    'µ' => 'ক্র',
    '¶' => 'ক্ষ',
    '·' => 'ক্স',
    '¸' => 'গু',
    '¹' => 'জ্ঞ',
    'º' => 'গ্দ',
    '»' => 'গ্ধ',
    '¼' => 'ঙ্ক',
    '½' => 'ঙ্গ',
    '¾' => 'জ্জ',
    '¿' => '্ত্র',
    'À' => 'জ্ঝ',
    'Á' => 'জ্ঞ',
    'Â' => 'ঞ্চ',
    'Ã' => 'ঞ্ছ',
    'Ä' => 'ঞ্জ',
    'Å' => 'ঞ্ঝ',
    'Æ' => 'ট্ট',
    'Ç' => 'ড্ড',
    'È' => 'ণ্ট',
    'É' => 'ণ্ঠ',
    'Ê' => 'ণ্ড',
    'Ë' => 'ত্ত',
    'Ì' => 'ত্থ',
    'Í' => 'ত্ম',
    'Î' => 'ত্র',
    'Ï' => 'দ্দ',
    'Ð' => '-',
    'Ñ' => '-',
    'Ò' => '"',
    'Ó' => '"',
    'Ô' => "'",
    'Õ' => "'",
    'Ö' => '্র',
    '×' => 'দ্ধ',
    'Ø' => 'দ্ব',
    'Ù' => 'দ্ম',
    'Ú' => 'ন্ঠ',
    'Û' => 'ন্ড',
    'Ü' => 'ন্ধ',
    'Ý' => 'ন্স',
    'Þ' => 'প্ট',
    'ß' => 'প্ত',
    'à' => 'প্প',
    'á' => 'প্স',
    'â' => 'ব্জ',
    'ã' => 'ব্দ',
    'ä' => 'ব্ধ',
    'å' => 'ভ্র',
    'æ' => 'ম্ন',
    'ç' => 'ম্ফ',
    'è' => '্ন',
    'é' => 'ল্ক',
    'ê' => 'ল্গ',
    'ë' => 'ল্ট',
    'ì' => 'ল্ড',
    'í' => 'ল্প',
    'î' => 'ল্ফ',
    'ï' => 'শু',
    'ð' => 'শ্চ',
    'ñ' => 'শ্ছ',
    'ò' => 'ষ্ণ',
    'ó' => 'ষ্ট',
    'ô' => 'ষ্ঠ',
    'õ' => 'ষ্ফ',
    'ö' => 'স্খ',
    '÷' => 'স্ট',
    'ø' => 'স্ন', //(sn)eho //†ønØ
    'ù' => 'স্ফ',
    'ú' => '্প',
    'û' => 'হু',
    'ü' => 'হৃ',
    'ý' => 'হ্ন',
    'þ' => 'হ্ম'
);

$proConversionMap = array('্্' => '্');



$postConversionMap = array(
    //Colon with Number/Space
    '০ঃ' => '০:',
    '১ঃ' => '১:',
    '২ঃ' => '২:',
    '৩ঃ' => '৩:',
    '৪ঃ' => '৪:',
    '৫ঃ' => '৫:',
    '৬ঃ' => '৬:',
    '৭ঃ' => '৭:',
    '৮ঃ' => '৮:',
    '৯ঃ' => '৯:',
    ' ঃ' => ' :',
    '\nঃ' => '\n:',
    ']ঃ' => ']:',
    '\\[ঃ' => '\\[:',
    '  ' => ' ',
    'অা' => 'আ',
    '্‌্‌' => '্‌'
);

function IsBanglaDigit($c) {
    if ($c >= '০' && $c <= '৯')
        return true;
    return false;
}

function IsBanglaPreKar($c) {
    if ($c == 'ি' || $c == 'ৈ' || $c == 'ে')
        return true;
    return false;
}

function IsBanglaPostKar($c) {
    if ($c == 'া' || $c == 'ো' || $c == 'ৌ' || $c == 'ৗ' || $c == 'ু' || $c == 'ূ' || $c == 'ী' || $c == 'ৃ')
        return true;
    return false;
}

function IsBanglaKar($c) {
    if (IsBanglaPreKar($c) || IsBanglaPostKar($c))
        return true;
    return false;
}

function IsBanglaBanjonborno($c) {
    if ($c == 'ক' || $c == 'খ' || $c == 'গ' || $c == 'ঘ' || $c == 'ঙ' || $c == 'চ' || $c == 'ছ' || $c == 'জ' || $c == 'ঝ' || $c == 'ঞ' || $c == 'ট' || $c == 'ঠ' || $c == 'ড' || $c == 'ঢ' || $c == 'ণ' || $c == 'ত' || $c == 'থ' || $c == 'দ' || $c == 'ধ' || $c == 'ন' || $c == 'প' || $c == 'ফ' || $c == 'ব' || $c == 'ভ' || $c == 'ম' || $c == 'য' || $c == 'র' || $c == 'ল' || $c == 'শ' || $c == 'ষ' || $c == 'স' || $c == 'হ' || $c == 'ড়' || $c == 'ঢ়' || $c == 'য়' || $c == 'ৎ' || $c == 'ং' || $c == 'ঃ' || $c == 'ঁ')
        return true;
    return false;
}

function IsBanglaSoroborno($c) {
    if ($c == 'অ' || $c == 'আ' || $c == 'ই' || $c == 'ঈ' || $c == 'উ' || $c == 'ঊ' || $c == 'ঋ' || $c == 'ঌ' || $c == 'এ' || $c == 'ঐ' || $c == 'ও' || $c == 'ঔ')
        return true;
    return false;
}

function IsBanglaNukta($c) {
    if ($c == 'ঁ')
        return true;
    return false;
}

function IsBanglaHalant($c) {
    if ($c == '্')
        return true;
    return false;
}

function IsSpace($c) {
    if ($c == ' ' || $c == '\t' || $c == '\n' || $c == '\r')
        return true;
    return false;
}

function reArrangeUnicodeConvertedText($str) {

    mb_internal_encoding("UTF-8"); //force multi-byte UTF-8 encoding

    global $proConversionMap;

    for ($i = 0; $i < mb_strlen($str); ++$i) {

        // Change refs
        if ($i < (mb_strlen($str) - 1) && mbCharAt($str, $i) == 'র' && IsBanglaHalant(mbCharAt($str, $i + 1)) && !IsBanglaHalant(mbCharAt($str, $i - 1))) {
            $j = 1;
            while (true) {
                if ($i - $j < 0) {
                    break;
                }
                if (IsBanglaBanjonborno(mbCharAt($str, $i - $j)) && IsBanglaHalant(mbCharAt($str, $i - $j - 1))) {
                    $j += 2;
                } else if ($j == 1 && IsBanglaKar(mbCharAt($str, $i - $j))) {
                    $j++;
                } else {
                    break;
                }
            }
            $temp = subString($str, 0, $i - $j);
            $temp .= mbCharAt($str, $i);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= subString($str, $i - $j, $i);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
            $i += 1;
            continue;
        }
    }

    $str = doCharMap($str, $proConversionMap);



    for ($i = 0; $i < mb_strlen($str); ++$i) {


        if ($i < mb_strlen($str) - 1 && mbCharAt($str, $i) == 'র' && IsBanglaHalant(mbCharAt($str, $i + 1)) && !IsBanglaHalant(mbCharAt($str, $i - 1)) && IsBanglaHalant(mbCharAt($str, $i + 2))) {
            $j = 1;
            while (true) {
                if ($i - $j < 0) {
                    break;
                }
                if (IsBanglaBanjonborno(mbCharAt($str, $i - $j)) && IsBanglaHalant(mbCharAt($str, $i - $j - 1))) {
                    $j += 2;
                } else if ($j == 1 && IsBanglaKar(mbCharAt($str, $i - $j))) {
                    $j++;
                } else {
                    break;
                }
            }
            $temp = subString($str, 0, $i - $j);
            $temp .= mbCharAt($str, $i);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= subString($str, $i - $j, $i);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
            $i += 1;
            continue;
        }

        // for 'Vowel + HALANT + Consonant' it should be 'HALANT + Consonant + Vowel'
        if ($i > 0 && mbCharAt($str, $i) == '\u09CD' && (IsBanglaKar(mbCharAt($str, $i - 1)) || IsBanglaNukta(mbCharAt($str, $i - 1))) && $i < mb_strlen($str) - 1) {
            $temp = subString($str, 0, $i - 1);
            $temp .= mbCharAt($str, $i);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= mbCharAt($str, $i - 1);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
        }

        // for 'RA (\u09B0) + HALANT + Vowel' it should be 'Vowel + RA (\u09B0) + HALANT'
        if ($i > 0 && $i < mb_strlen($str) - 1 && mbCharAt($str, $i) == '\u09CD' && mbCharAt($str, $i - 1) == '\u09B0' && mbCharAt($str, $i - 2) != '\u09CD' && IsBanglaKar(mbCharAt($str, $i + 1))) {
            $temp = subString($str, 0, $i - 1);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= mbCharAt($str, $i - 1);
            $temp .= mbCharAt($str, $i);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
        }
        

        // Change pre-kar to post format suitable for unicode
        if ($i < mb_strlen($str) - 1 && IsBanglaPreKar(mbCharAt($str, $i)) && IsSpace(mbCharAt($str, $i + 1)) == false) {
            $temp = subString($str, 0, $i);

            $j = 1;

            while (($i + $j) < mb_strlen($str) - 1 && IsBanglaBanjonborno(mbCharAt($str, $i + $j))) {
                if (($i + $j) < mb_strlen($str) && IsBanglaHalant(mbCharAt($str, $i + $j + 1))) {
                    $j += 2;
                } else {
                    break;
                }
            }
            $temp .= subString($str, $i + 1, $i + $j + 1);

            $l = 0;
            if (mbCharAt($str, $i) == 'ে' && mbCharAt($str, $i + $j + 1) == 'া') {
                $temp .= "ো";
                $l = 1;
            } else if (mbCharAt($str, $i) == 'ে' && mbCharAt($str, $i + $j + 1) == "ৗ") {
                $temp .= "ৌ";
                $l = 1;
            } else {
                $temp .= mbCharAt($str, $i);
            }
            $temp .= subString($str, $i + $j + $l + 1, mb_strlen($str));
            $str = $temp;
            $i += $j;
        }

        // nukta should be placed after kars
        if ($i < mb_strlen($str) - 1 && IsBanglaNukta(mbCharAt($str, $i)) && IsBanglaPostKar(mbCharAt($str, $i + 1))) {
            $temp = subString($str, 0, $i);
            $temp .= mbCharAt($str, $i + 1);
            $temp .= mbCharAt($str, $i);
            $temp .= subString($str, $i + 2, mb_strlen($str));
            $str = $temp;
        }
    }

    return $str;
}


//main conversion function
function convertBijoyToUnicode($srcString) {

    global $preConversionMap, $conversionMap, $postConversionMap;


    $srcString = doCharMap($srcString, $preConversionMap);
    $srcString = doCharMap($srcString, $conversionMap);
    $srcString = reArrangeUnicodeConvertedText($srcString);
    $srcString = doCharMap($srcString, $postConversionMap);
    return $srcString;
}

function doCharMap($text, $charMap) {
    foreach ($charMap as $srcKey => $keyVal) {
        $format = "@$srcKey@";
        $text = preg_replace($format, $keyVal, $text);
    }

    return $text;
}

//returns the $i-th byte of the multi-byte string $str
function mbCharAt($str, $i) {
    return mb_substr($str, $i, 1);
}

//returns the javascript 'substring' method equivalent
function subString($string, $from, $to) {
    return mb_substr($string, $from, $to - $from);
}

?>
