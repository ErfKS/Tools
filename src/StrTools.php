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

    /**
     * data from: [https://gist.github.com/grexlort/00cd35c9e6f6e5d2c6f2](https://gist.github.com/grexlort/00cd35c9e6f6e5d2c6f2)
     */
    const PHONE_NUMBERS = [
        'UK (+44)'=> '44',
        'USA (+1)'=> '1',
        'Algeria (+213)'=> '213',
        'Andorra (+376)'=> '376',
        'Angola (+244)'=> '244',
        'Anguilla (+1264)'=> '1264',
        'Antigua & Barbuda (+1268)'=> '1268',
        'Argentina (+54)'=> '54',
        'Armenia (+374)'=> '374',
        'Aruba (+297)'=> '297',
        'Australia (+61)'=> '61',
        'Austria (+43)'=> '43',
        'Azerbaijan (+994)'=> '994',
        'Bahamas (+1242)'=> '1242',
        'Bahrain (+973)'=> '973',
        'Bangladesh (+880)'=> '880',
        'Barbados (+1246)'=> '1246',
        'Belarus (+375)'=> '375',
        'Belgium (+32)'=> '32',
        'Belize (+501)'=> '501',
        'Benin (+229)'=> '229',
        'Bermuda (+1441)'=> '1441',
        'Bhutan (+975)'=> '975',
        'Bolivia (+591)'=> '591',
        'Bosnia Herzegovina (+387)'=> '387',
        'Botswana (+267)'=> '267',
        'Brazil (+55)'=> '55',
        'Brunei (+673)'=> '673',
        'Bulgaria (+359)'=> '359',
        'Burkina Faso (+226)'=> '226',
        'Burundi (+257)'=> '257',
        'Cambodia (+855)'=> '855',
        'Cameroon (+237)'=> '237',
        'Canada (+1)'=> '1',
        'Cape Verde Islands (+238)'=> '238',
        'Cayman Islands (+1345)'=> '1345',
        'Central African Republic (+236)'=> '236',
        'Chile (+56)'=> '56',
        'China (+86)'=> '86',
        'Colombia (+57)'=> '57',
        'Comoros (+269)'=> '269',
        'Congo (+242)'=> '242',
        'Cook Islands (+682)'=> '682',
        'Costa Rica (+506)'=> '506',
        'Croatia (+385)'=> '385',
        'Cuba (+53)'=> '53',
        'Cyprus North (+90392)'=> '90392',
        'Cyprus South (+357)'=> '357',
        'Czech Republic (+42)'=> '42',
        'Denmark (+45)'=> '45',
        'Djibouti (+253)'=> '253',
        'Dominica (+1809)'=> '1809',
        'Dominican Republic (+1809)'=> '1809',
        'Ecuador (+593)'=> '593',
        'Egypt (+20)'=> '20',
        'El Salvador (+503)'=> '503',
        'Equatorial Guinea (+240)'=> '240',
        'Eritrea (+291)'=> '291',
        'Estonia (+372)'=> '372',
        'Ethiopia (+251)'=> '251',
        'Falkland Islands (+500)'=> '500',
        'Faroe Islands (+298)'=> '298',
        'Fiji (+679)'=> '679',
        'Finland (+358)'=> '358',
        'France (+33)'=> '33',
        'French Guiana (+594)'=> '594',
        'French Polynesia (+689)'=> '689',
        'Gabon (+241)'=> '241',
        'Gambia (+220)'=> '220',
        'Georgia (+7880)'=> '7880',
        'Germany (+49)'=> '49',
        'Ghana (+233)'=> '233',
        'Gibraltar (+350)'=> '350',
        'Greece (+30)'=> '30',
        'Greenland (+299)'=> '299',
        'Grenada (+1473)'=> '1473',
        'Guadeloupe (+590)'=> '590',
        'Guam (+671)'=> '671',
        'Guatemala (+502)'=> '502',
        'Guinea (+224)'=> '224',
        'Guinea - Bissau (+245)'=> '245',
        'Guyana (+592)'=> '592',
        'Haiti (+509)'=> '509',
        'Honduras (+504)'=> '504',
        'Hong Kong (+852)'=> '852',
        'Hungary (+36)'=> '36',
        'Iceland (+354)'=> '354',
        'India (+91)'=> '91',
        'Indonesia (+62)'=> '62',
        'Iran (+98)'=> '98',
        'Iraq (+964)'=> '964',
        'Ireland (+353)'=> '353',
        'Israel (+972)'=> '972',
        'Italy (+39)'=> '39',
        'Jamaica (+1876)'=> '1876',
        'Japan (+81)'=> '81',
        'Jordan (+962)'=> '962',
        'Kazakhstan (+7)'=> '7',
        'Kenya (+254)'=> '254',
        'Kiribati (+686)'=> '686',
        'Korea North (+850)'=> '850',
        'Korea South (+82)'=> '82',
        'Kuwait (+965)'=> '965',
        'Kyrgyzstan (+996)'=> '996',
        'Laos (+856)'=> '856',
        'Latvia (+371)'=> '371',
        'Lebanon (+961)'=> '961',
        'Lesotho (+266)'=> '266',
        'Liberia (+231)'=> '231',
        'Libya (+218)'=> '218',
        'Liechtenstein (+417)'=> '417',
        'Lithuania (+370)'=> '370',
        'Luxembourg (+352)'=> '352',
        'Macao (+853)'=> '853',
        'Macedonia (+389)'=> '389',
        'Madagascar (+261)'=> '261',
        'Malawi (+265)'=> '265',
        'Malaysia (+60)'=> '60',
        'Maldives (+960)'=> '960',
        'Mali (+223)'=> '223',
        'Malta (+356)'=> '356',
        'Marshall Islands (+692)'=> '692',
        'Martinique (+596)'=> '596',
        'Mauritania (+222)'=> '222',
        'Mayotte (+269)'=> '269',
        'Mexico (+52)'=> '52',
        'Micronesia (+691)'=> '691',
        'Moldova (+373)'=> '373',
        'Monaco (+377)'=> '377',
        'Mongolia (+976)'=> '976',
        'Montserrat (+1664)'=> '1664',
        'Morocco (+212)'=> '212',
        'Mozambique (+258)'=> '258',
        'Myanmar (+95)'=> '95',
        'Namibia (+264)'=> '264',
        'Nauru (+674)'=> '674',
        'Nepal (+977)'=> '977',
        'Netherlands (+31)'=> '31',
        'New Caledonia (+687)'=> '687',
        'New Zealand (+64)'=> '64',
        'Nicaragua (+505)'=> '505',
        'Niger (+227)'=> '227',
        'Nigeria (+234)'=> '234',
        'Niue (+683)'=> '683',
        'Norfolk Islands (+672)'=> '672',
        'Northern Marianas (+670)'=> '670',
        'Norway (+47)'=> '47',
        'Oman (+968)'=> '968',
        'Palau (+680)'=> '680',
        'Panama (+507)'=> '507',
        'Papua New Guinea (+675)'=> '675',
        'Paraguay (+595)'=> '595',
        'Peru (+51)'=> '51',
        'Philippines (+63)'=> '63',
        'Poland (+48)'=> '48',
        'Portugal (+351)'=> '351',
        'Puerto Rico (+1787)'=> '1787',
        'Qatar (+974)'=> '974',
        'Reunion (+262)'=> '262',
        'Romania (+40)'=> '40',
        'Russia (+7)'=> '7',
        'Rwanda (+250)'=> '250',
        'San Marino (+378)'=> '378',
        'Sao Tome & Principe (+239)'=> '239',
        'Saudi Arabia (+966)'=> '966',
        'Senegal (+221)'=> '221',
        'Serbia (+381)'=> '381',
        'Seychelles (+248)'=> '248',
        'Sierra Leone (+232)'=> '232',
        'Singapore (+65)'=> '65',
        'Slovak Republic (+421)'=> '421',
        'Slovenia (+386)'=> '386',
        'Solomon Islands (+677)'=> '677',
        'Somalia (+252)'=> '252',
        'South Africa (+27)'=> '27',
        'Spain (+34)'=> '34',
        'Sri Lanka (+94)'=> '94',
        'St. Helena (+290)'=> '290',
        'St. Kitts (+1869)'=> '1869',
        'St. Lucia (+1758)'=> '1758',
        'Sudan (+249)'=> '249',
        'Suriname (+597)'=> '597',
        'Swaziland (+268)'=> '268',
        'Sweden (+46)'=> '46',
        'Switzerland (+41)'=> '41',
        'Syria (+963)'=> '963',
        'Taiwan (+886)'=> '886',
        'Tajikstan (+7)'=> '7',
        'Thailand (+66)'=> '66',
        'Togo (+228)'=> '228',
        'Tonga (+676)'=> '676',
        'Trinidad & Tobago (+1868)'=> '1868',
        'Tunisia (+216)'=> '216',
        'Turkey (+90)'=> '90',
        'Turkmenistan (+7)'=> '7',
        'Turkmenistan (+993)'=> '993',
        'Turks & Caicos Islands (+1649)'=> '1649',
        'Tuvalu (+688)'=> '688',
        'Uganda (+256)'=> '256',
        'Ukraine (+380)'=> '380',
        'United Arab Emirates (+971)'=> '971',
        'Uruguay (+598)'=> '598',
        'Uzbekistan (+7)'=> '7',
        'Vanuatu (+678)'=> '678',
        'Vatican City (+379)'=> '379',
        'Venezuela (+58)'=> '58',
        'Vietnam (+84)'=> '84',
        'Virgin Islands - British (+1284)'=> '84',
        'Virgin Islands - US (+1340)'=> '84',
        'Wallis & Futuna (+681)'=> '681',
        'Yemen (North)(+969)'=> '969',
        'Yemen (South)(+967)'=> '967',
        'Zambia (+260)'=> '260',
        'Zimbabwe (+263)'=> '263',
    ];

    /**
     * converts persian numbers into english numbers
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#convertpersiannumbers
     * @param string $persianNumber like this: ۰۱۲۳۴۵۶۷۸۹
     * @return string like this: 0123456789
     */
    public static function ConvertPersianNumbers(string $persianNumber): string
    {
        return strtr($persianNumber, config('tools.str.persian_numbers'));
    }

    /**
     * Returns app parsed url
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#gethosturl
     * @param ?string $prefix add custom prefix
     * @param int $component [optional] <p>
     * @return array{scheme: string,host: string,post: int, user: string, pass: string, query: string, path: string, fragment: string}|false|int|string|null
     */
    public static function ParsCurrentUrl(?string $prefix = null, int $component = -1){
        $parse_url = parse_url(config('app.url'),$component);
        if(isset($prefix) && !static::HaveInFirst($parse_url['host'],$prefix)) {
            $parse_url['host'] = $prefix.$parse_url['host'];
        }
        return $parse_url;
    }

    /**
     * Removes file format prefix
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#removefileformat
     * @param string $path
     * @return string
     */
    public static function RemoveFileFormat(string $path): string
    {
        $extention = static::GetFileFormat($path);
        return static::RemoveLast($path, strlen($extention)+1);
    }

    /**
     * Returns user guard name by guard type ([see config](https://github.com/ErfKS/Tools/blob/master/README.md#auth_guard_name)).
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#getguardname
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
     * Returns translated word by attribute part of `validation.php` language file
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#getlangattribute
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
     * Removes empty string between separator
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#removeemptyexplode
     * @example StrTools::RemoveEmptyExplode(',','val1, val2, val3,,,');
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

    /**
     * Detect empty chars ([see config](https://github.com/ErfKS/Tools/blob/master/README.md#empty_chars))
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#isemptystring
     * @param string $value
     * @return bool
     */
    public static function IsEmptyString(string $value):bool{
        $replaces = [];
        foreach (config('tools.str.empty_chars') as $empty_char){
            $replaces[$empty_char] = '';
        }

        $res = strtr($value, $replaces);

        return $res == '' || $res = null;
    }

    /**
     * Returns random integer
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#randomint
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

    /**
     * Returns first char of string(s).
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#getfirst
     * @param string $value
     * @param int $length
     * @return string first $value
     */
    public static function GetFirst(string $value,int $length = 1):string
    {
        return substr($value, 0, $length);
    }

    /**
     * Replace same words. ([see config](https://github.com/ErfKS/Tools/blob/master/README.md#words_to_change))
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#autochangeword
     * @param string $value
     * @return string
     */
    public static function AutoChangeWord(string $value): string
    {
        if(self::IsEmptyString($value)){
            return '';
        }

        return strtr($value, config('tools.str.words_to_change'));
    }

    /**
     * Check if value just have number or not. (see config [wrong_numbers](https://github.com/ErfKS/Tools/blob/master/README.md#wrong_numbers) and [persian_numbers](https://github.com/ErfKS/Tools/blob/master/README.md#persian_numbers))
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#justnumber
     * @param string $value
     * @param bool $withRepair check with repair $value
     * @return bool
     */
    public static function JustNumber(string $value,bool $withRepair = true): bool
    {
        if($withRepair) {
            $value = self::RepairNumber($value);
        }
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

    /**
     * Check if value just have number and 11 chars or not. (see config [wrong_numbers](https://github.com/ErfKS/Tools/blob/master/README.md#wrong_numbers) and [persian_numbers](https://github.com/ErfKS/Tools/blob/master/README.md#persian_numbers))
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#justphonenumber
     * @param string $value
     * @param bool $withRepair
     * @return bool
     */
    public static function JustPhoneNumber(string $value,bool $withRepair = true): bool
    {
        if($withRepair) {
            $value = self::RepairNumber($value);
        }
        return self::JustNumber($value,false) && strlen($value) === 11;
    }

    /**
     * Returns file extension by file name.
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#getfileformat
     * @param string $path
     * @return string
     */
    public static function GetFileFormat(string $path):string{
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

    /**
     * Returns CSS props from text to array.
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#detectcssprops
     * @param string $cssValues
     * @return array
     */
    public static function DetectCssProps(string $cssValues): array
    {
        $cssValueList = explode(';',$cssValues);
        $cssPropsList = [];
        foreach ($cssValueList as $cssValue){
            if($cssValue === ''){continue;}
            $cssProps = explode(':',$cssValue);

            $key = trim($cssProps[0]);
            $value = trim($cssProps[1]);
            $cssPropsList[$key]=$value;
        }
        return $cssPropsList;
    }

    /**
     * Returns replaced correct number characters.
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#repairnumber
     * @param string $value
     * @return string
     */
    public static function RepairNumber(string $value): string
    {
        return strtr(self::ConvertPersianNumbers($value), config('tools.str.wrong_numbers'));
    }

    private static function getLastArray(array $value)
    {
        $length = count($value);
        return $value[$length-1];
    }

    /**
     * Returns value without last character(s).
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#removelast
     * @param string $value
     * @param int $length to remove last chars
     * @return string
     */
    public static function RemoveLast(string $value,int $length=1): string
    {
        return substr($value, 0, -$length);
    }

    /**
     * Returns value without first character(s).
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#removelast
     * @param string $value
     * @param int $length to remove last chars
     * @return string
     */
    public static function RemoveFirst(string $value,int $length=1): string
    {
        return substr($value, $length, strlen($value));
    }

    /**
     * Returns url query params from array.
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#converttourlparams
     * @param array $params
     * @return string
     */
    public static function ConvertToUrlParams(array $params): string
    {
        $res = '?';
        foreach ($params as $key=>$value){
            $encode_val = urlencode($value);
            $res .= "$key=$encode_val&";
        }
        return self::RemoveLast($res);
    }

    /**
     * Returns value without any space and country code and replaces persian numbers.
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#repairphonenumber
     * @param string $value
     * @return string
     */
    public static function RepairPhoneNumber(string $value): string
    {
        $value = self::RepairNumber($value);

        $phoneCode = self::GetPhoneCode($value);

        /* remove all spaces */
        $phone = str_replace(' ','',$value);

        /* convert local code into 0*/
        $phone = self::RemovePhonePlus($phone);
        if(self::HaveInFirst($phone,$phoneCode['code'])) {
            $phone = self::RemoveFirst($phone, strlen($phoneCode['code']));
        }

        /* add 0 as a first char */
        if(StrTools::GetFirst($phone) != 0){
            $phone = '0'.$phone;
        }

        return $phone;
    }

    /**
     * Returns code of phone number.
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#getphonecode
     * @param string $value
     * @return array{name: string,code: string}
     */
    public static function GetPhoneCode(string $value): array{
        $value = self::RemovePhonePlus($value);
        foreach (self::PHONE_NUMBERS as $name=>$phoneNumber){
            if(self::HaveInFirst($value,$phoneNumber)){
                return [
                    'name' => $name,
                    'code' => $phoneNumber
                ];
            }
        }
        return [];
    }

    /**
     * Returns code of phone number.
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#haveinfirst
     * @param string $mainValue
     * @param string $searchValue
     * @return bool
     */
    public static function HaveInFirst(string $mainValue, string $searchValue): bool
    {
        return self::GetFirst($mainValue,strlen($searchValue)) == $searchValue;
    }

    private static function RemovePhonePlus(string $value): string
    {
        if(self::GetFirst($value) == '+'){
            $value = self::RemoveFirst($value);
        }
        return $value;
    }

    /**
     * Check if string contain in array or not
     * @link https://github.com/ErfKS/Tools/blob/master/README-STR.md#strcontainsarray
     * @param string $haystack
     * @param array $needle
     * @param bool $caseSensitive
     * @return bool
     */
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
