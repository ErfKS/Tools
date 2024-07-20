<?php

namespace ErfanKatebSaber\tools;

class StrTools
{
    const NUMBERS = [
        '0',
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
    ];

    public static function ConvertPersianNumbers($persianNumber): string
    {
        return strtr($persianNumber, config('tools.str.persian_numbers'));
    }

    /**
     * @param string $guard_type
     * @return string
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public static function GetGuardName(?string $guard_type): string
    {
        if(!isset($guard_type)){
            return '';
        }
        $guard_type = AuthTools::AnalyseCurrentGuard($guard_type);
        return config('tools.auth.auth_guard_name')[$guard_type];
    }

    /**
     * @param string $attr_name
     * @return array|\Illuminate\Foundation\Application|string|\Illuminate\Contracts\Translation\Translator|\Illuminate\Contracts\Foundation\Application|null
     */
    public static function GetLangAttribute(string $attr_name)
    {
        $lang_path = 'validation.attributes.'.$attr_name;
        $attribute = __($lang_path);
        if($attribute == $lang_path){
            $attribute = str_replace('_',' ',$attr_name);
            $attribute = str_replace('-',' ',$attribute);
        }

        return $attribute;
    }

    /**
     * remove empty string between separator
     * @param string $separator
     * @param string $value
     * @return string
     */
    public static function RemoveEmptyExplode(string $separator,string $value) :string
    {
        $exploaded = explode($separator,$value);
        $filtered_exploade = [];
        $res = '';

        /* filter empty exploaded string between separator */
        foreach ($exploaded as $expload){
            if($expload !== '') {
                $filtered_exploade[] = $expload;
            }
        }

        /* create string with lowest separator */
        foreach ($filtered_exploade as $expload){
            if($filtered_exploade[0] !== $expload){
                $res .= $separator;
            }
            $res .= $expload;
        }

        return $res;
    }

    public static function IsEmptyString(string $value):bool{
        $replaces = [];
        foreach (config('tools.str.empty_chars') as $empty_char){
            $replaces[$empty_char] = '';
        }

        $res = strtr($value, $replaces);

        return $res == '' || $res = null;
    }

    /**
     * @param int $length
     * @return int
     */
    public static function RandomInt(int $length): int
    {
        /**
         * if incorrect $length
         */
        if ($length <= 0) {
            return 0;
        }

        $min = $max = '';
        for ($i = 0; $i < $length; $i++) {
            $min .= $i == 0 ? '1' : '0';
            $max .= '9';
        }

        return mt_rand(intval($min), intval($max));
    }

    public static function GetFirst(string $value):string
    {
        return substr($value, 0, 1)[0];
    }

    public static function AutoChangeWord($value): string
    {
        if(strtr($value,['‌'=>''])===''){
            return '';
        }
        $words = [ /* from => to*/
            'ي' => 'ی',
            'ة' => 'ه',
            'ك' => 'ک',
        ];

        return strtr($value, $words);
    }

    public static function JustNumber(string $value): bool
    {
        foreach (str_split($value) as $item){
            $is_not_number = false;
            foreach (self::NUMBERS as $number){
                if($item == $number){
                    $is_not_number = true;
                    break;
                }
            }
            if(!$is_not_number) {
                return false;
            }
        }
        return true;
    }

    public static function JustPhoneNumber(string $value): bool
    {
        return self::JustNumber($value) && strlen($value) === 11;
    }

    public static function getFileFormat(string $path):string{
        $path_properties = explode('/',$path);
        $file_name = self::getLastArray($path_properties);

        $file_name_explode = explode('.',$file_name);

        $last_section_file = self::getLastArray($file_name_explode);

        if(str_contains($last_section_file,'?')){
            $file_format = explode('?',$last_section_file);
            return $file_format[0];
        }

        return $last_section_file;
    }

    public static function detectCssProps(string $cssValues): array
    {
        $cssValueList = explode(';',$cssValues);
        $cssPropsList = [];
        foreach ($cssValueList as $cssValue){
            if($cssValue === ''){continue;}
            $cssProps = explode(':',$cssValue);
            $key = $cssProps[0];
            $value = $cssProps[1];
            $cssPropsList[$key]=$value;
        }
        return $cssPropsList;
    }

    public static function RepairNumber(string $value): string
    {
        return strtr(self::ConvertPersianNumbers($value), config('tools.str.wrong_numbers'));
    }
    private static function getLastArray(array $value)
    {
        $length = count($value);
        return $value[$length-1];
    }

    public static function RemoveLast(string $value,$length=1): string
    {
        return substr($value, 0, -$length);
    }

    public static function ConvertToUrlParams(array $values): string
    {
        $res = '?';
        foreach ($values as $key=>$value){
            $encode_val = urlencode($value);
            $res .= "$key=$encode_val&";
        }
        return self::RemoveLast($res);
    }

    public static function RepairPhoneNumber(string $value): string
    {
        $phone = str_replace(' ','',$value);
        $phone = str_replace('+98','0',$phone);
        if(StrTools::GetFirst($phone) != 0){
            $phone = '0'.$phone;
        }
        return $phone;
    }

    public static function StrContainsArray(string $haystack, array $needle,bool $caseSensitive = false): bool
    {
        if(!$caseSensitive){
            $needle = array_map('strtolower', $needle);
            $haystack = strtolower($haystack);
        }
        foreach ($needle as $needle_item){
            if(str_contains($haystack,$needle_item)){
                return true;
            }
        }
        return false;
    }

    public static function StrEqualArray(string $haystack, array $needle,bool $caseSensitive = false): bool
    {
        if(!$caseSensitive){
            $needle = array_map('strtolower', $needle);
            $haystack = strtolower($haystack);
        }

        return in_array($haystack, $needle);
    }
}
