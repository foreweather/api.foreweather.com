<?php
declare(strict_types=1);

/**
 * @param string|null $path
 * @param integer     $count
 * @param integer     $offset
 * @param integer     $limit
 *
 * @return array
 */
function pagination(string $path = null, int $count = 0, int $offset = 0, int $limit = 10): array
{
    if (!is_int($offset) or !is_int($count) or !is_int($limit)) {
        throw new BadFunctionCallException('limit and offset should be integer');
    }

    if ($offset % $limit) {
        throw new BadFunctionCallException('offset must be a number divisible by limit.');
    }

    if ($count === 0 or $limit === 0) {
        return [];
    }

    $aspect = @($count / $limit);

    $next        = $offset + $limit;
    $current     = ceil(@($offset / $limit)) + 1;
    $before      = false;
    $last        = floor($aspect) * $limit;
    $total_pages = ceil($aspect);

    if ($offset > 0) {
        $before = $offset - $limit;
        if ($next >= $count) {
            $next = false;
            $last = false;
        }
    } else {
        if ($next >= $count) {
            $next = false;
            $last = false;
        }
        $offset = 0;
    }

    if ($last == $count) {
        $last = $count - $limit;
    }

    if ($last < 0) {
        $last = 0;
    }

    return array(
        'limit'        => $limit,
        'offset'       => $offset,
        'next_offset'  => $next,
        'prev_offset'  => $before,
        'last_offset'  => $last,
        'current_page' => $current,
        'page_count'   => $total_pages,
        'items_count'  => $count,
        'path'         => $path,
    );
}

/**
 * @param        $data
 * @param        $total
 * @param string $path
 * @param int    $offset
 * @param int    $limit
 *
 * @return array
 */
function collection(array $data, int $total, string $path = '/', int $offset = 0, int $limit = 30): array
{
    return array(
        'pagination' => pagination($path, $total, $offset, $limit),
        'length'     => count($data),
        'items'      => $data,

    );
}

/**
 * Get timezones list
 * @return array
 */
function getTimeZones(): array
{
    return [
        'Africa/Algiers'         => 'Algeria (+01:00)',
        'Africa/Gaborone'        => 'Botswana (+02:00)',
        'Africa/Douala'          => 'Cameroon (+01:00)',
        'Africa/Bangui'          => 'Central African Republic (+01:00)',
        'Africa/Ndjamena'        => 'Chad (+01:00)',
        'Africa/Kinshasa'        => 'Democratic Republic of the Congo (+01:00)',
        'Africa/Djibouti'        => 'Djibouti (+03:00)',
        'Africa/Cairo'           => 'Egypt (+02:00)',
        'Africa/Malabo'          => 'Equatorial Guinea (+01:00)',
        'Africa/Asmara'          => 'Eritrea (+03:00)',
        'Africa/Addis_Ababa'     => 'Ethiopia (+03:00)',
        'Africa/Libreville'      => 'Gabon (+01:00)',
        'Africa/Banjul'          => 'Gambia (+00:00)',
        'Africa/Accra'           => 'Ghana (+00:00)',
        'Africa/Conakry'         => 'Guinea (+00:00)',
        'Africa/Bissau'          => 'Guinea-Bissau (+00:00)',
        'Africa/Abidjan'         => 'Ivory Coast (+00:00)',
        'Africa/Nairobi'         => 'Kenya (+03:00)',
        'Africa/Maseru'          => 'Lesotho (+02:00)',
        'Africa/Monrovia'        => 'Liberia (+00:00)',
        'Africa/Tripoli'         => 'Libya (+02:00)',
        'Africa/Blantyre'        => 'Malawi (+02:00)',
        'Africa/Bamako'          => 'Mali (+00:00)',
        'Africa/Nouakchott'      => 'Mauritania (+00:00)',
        'Africa/Casablanca'      => 'Morocco (+01:00)',
        'Africa/Maputo'          => 'Mozambique (+02:00)',
        'Africa/Windhoek'        => 'Namibia (+01:00)',
        'Africa/Niamey'          => 'Niger (+01:00)',
        'Africa/Lagos'           => 'Nigeria (+01:00)',
        'Africa/Brazzaville'     => 'Republic of the Congo (+01:00)',
        'Africa/Kigali'          => 'Rwanda (+02:00)',
        'Africa/Sao_Tome'        => 'Sao Tome and Principe (+00:00)',
        'Africa/Dakar'           => 'Senegal (+00:00)',
        'Africa/Freetown'        => 'Sierra Leone (+00:00)',
        'Africa/Mogadishu'       => 'Somalia (+03:00)',
        'Africa/Johannesburg'    => 'South Africa (+02:00)',
        'Africa/Juba'            => 'South Sudan (+03:00)',
        'Africa/Khartoum'        => 'Sudan (+03:00)',
        'Africa/Mbabane'         => 'Swaziland (+02:00)',
        'Africa/Dar_es_Salaam'   => 'Tanzania (+03:00)',
        'Africa/Lome'            => 'Togo (+00:00)',
        'Africa/Tunis'           => 'Tunisia (+01:00)',
        'Africa/Kampala'         => 'Uganda (+03:00)',
        'Africa/El_Aaiun'        => 'Western Sahara (+00:00)',
        'Africa/Lusaka'          => 'Zambia (+02:00)',
        'Africa/Harare'          => 'Zimbabwe (+02:00)',
        'America/Nassau'         => 'Bahamas (-04:00)',
        'America/Belize'         => 'Belize (-06:00)',
        'America/Noronha'        => 'Brazil (-02:00)',
        'America/Tortola'        => 'British Virgin Islands (-04:00)',
        'America/St_Johns'       => 'Canada (-02:30)',
        'America/Cayman'         => 'Cayman Islands (-05:00)',
        'America/Santiago'       => 'Chile (-04:00)',
        'America/Bogota'         => 'Colombia (-05:00)',
        'America/Costa_Rica'     => 'Costa Rica (-06:00)',
        'America/Havana'         => 'Cuba (-04:00)',
        'America/Curacao'        => 'Curaçao (-04:00)',
        'America/Dominica'       => 'Dominica (-04:00)',
        'America/Santo_Domingo'  => 'Dominican Republic (-04:00)',
        'America/Guayaquil'      => 'Ecuador (-05:00)',
        'America/El_Salvador'    => 'El Salvador (-06:00)',
        'America/Cayenne'        => 'French Guiana (-03:00)',
        'America/Godthab'        => 'Greenland (-02:00)',
        'America/Grenada'        => 'Grenada (-04:00)',
        'America/Guadeloupe'     => 'Guadeloupe (-04:00)',
        'America/Guatemala'      => 'Guatemala (-06:00)',
        'America/Guyana'         => 'Guyana (-04:00)',
        'America/Port-au-Prince' => 'Haiti (-05:00)',
        'America/Tegucigalpa'    => 'Honduras (-06:00)',
        'America/Jamaica'        => 'Jamaica (-05:00)',
        'America/Martinique'     => 'Martinique (-04:00)',
        'America/Mexico_City'    => 'Mexico (-05:00)',
        'America/Montserrat'     => 'Montserrat (-04:00)',
        'America/Managua'        => 'Nicaragua (-06:00)',
        'America/Panama'         => 'Panama (-05:00)',
        'America/Asuncion'       => 'Paraguay (-04:00)',
        'America/Lima'           => 'Peru (-05:00)',
        'America/Puerto_Rico'    => 'Puerto Rico (-04:00)',
        'America/St_Kitts'       => 'Saint Kitts and Nevis (-04:00)',
        'America/St_Lucia'       => 'Saint Lucia (-04:00)',
        'America/Marigot'        => 'Saint Martin (-04:00)',
        'America/Miquelon'       => 'Saint Pierre and Miquelon (-02:00)',
        'America/St_Vincent'     => 'Saint Vincent and the Grenadines (-04:00)',
        'America/Lower_Princes'  => 'Sint Maarten (-04:00)',
        'America/Paramaribo'     => 'Suriname (-03:00)',
        'America/Port_of_Spain'  => 'Trinidad and Tobago (-04:00)',
        'America/Grand_Turk'     => 'Turks and Caicos Islands (-04:00)',
        'America/St_Thomas'      => 'U.S. Virgin Islands (-04:00)',
        'America/New_York'       => 'United States (-04:00)',
        'America/Montevideo'     => 'Uruguay (-03:00)',
        'Europe/Vatican'         => 'Vatican (+02:00)',
        'America/Caracas'        => 'Venezuela (-04:30)',
        'Arctic/Longyearbyen'    => 'Svalbard and Jan Mayen (+02:00)',
        'Asia/Thimphu'           => 'Bhutan (+06:00)',
        'Asia/Phnom_Penh'        => 'Cambodia (+07:00)',
        'Asia/Shanghai'          => 'China (+08:00)',
        'Asia/Nicosia'           => 'Cyprus (+03:00)',
        'Asia/Dili'              => 'East Timor (+09:00)',
        'Asia/Tbilisi'           => 'Georgia (+04:00)',
        'Asia/Hong_Kong'         => 'Hong Kong (+08:00)',
        'Asia/Kolkata'           => 'India (+05:30)',
        'Asia/Jakarta'           => 'Indonesia (+07:00)',
        'Asia/Tehran'            => 'Iran (+04:30)',
        'Asia/Baghdad'           => 'Iraq (+03:00)',
        'Asia/Jerusalem'         => 'Israel (+03:00)',
        'Asia/Tokyo'             => 'Japan (+09:00)',
        'Asia/Amman'             => 'Jordan (+03:00)',
        'Asia/Almaty'            => 'Kazakhstan (+06:00)',
        'Asia/Kuwait'            => 'Kuwait (+03:00)',
        'Asia/Bishkek'           => 'Kyrgyzstan (+06:00)',
        'Asia/Vientiane'         => 'Laos (+07:00)',
        'Asia/Beirut'            => 'Lebanon (+03:00)',
        'Asia/Macau'             => 'Macao (+08:00)',
        'Asia/Kuala_Lumpur'      => 'Malaysia (+08:00)',
        'Asia/Ulaanbaatar'       => 'Mongolia (+08:00)',
        'Asia/Rangoon'           => 'Myanmar (+06:30)',
        'Asia/Kathmandu'         => 'Nepal (+05:45)',
        'Asia/Pyongyang'         => 'North Korea (+09:00)',
        'Asia/Muscat'            => 'Oman (+04:00)',
        'Asia/Karachi'           => 'Pakistan (+05:00)',
        'Asia/Gaza'              => 'Palestinian Territory (+02:00)',
        'Asia/Manila'            => 'Philippines (+08:00)',
        'Asia/Qatar'             => 'Qatar (+03:00)',
        'Asia/Riyadh'            => 'Saudi Arabia (+03:00)',
        'Asia/Singapore'         => 'Singapore (+08:00)',
        'Asia/Seoul'             => 'South Korea (+09:00)',
        'Asia/Colombo'           => 'Sri Lanka (+05:30)',
        'Asia/Damascus'          => 'Syria (+03:00)',
        'Asia/Taipei'            => 'Taiwan (+08:00)',
        'Asia/Dushanbe'          => 'Tajikistan (+05:00)',
        'Asia/Bangkok'           => 'Thailand (+07:00)',
        'Asia/Ashgabat'          => 'Turkmenistan (+05:00)',
        'Asia/Samarkand'         => 'Uzbekistan (+05:00)',
        'Asia/Ho_Chi_Minh'       => 'Vietnam (+07:00)',
        'Asia/Aden'              => 'Yemen (+03:00)',
        'Atlantic/Cape_Verde'    => 'Cape Verde (-01:00)',
        'Atlantic/Stanley'       => 'Falkland Islands (-03:00)',
        'Atlantic/Faroe'         => 'Faroe Islands (+01:00)',
        'Atlantic/Reykjavik'     => 'Iceland (+00:00)',
        'Atlantic/St_Helena'     => 'Saint Helena (+00:00)',
        'Atlantic/South_Georgia' => 'South Georgia and the South Sandwich Islands (-02:00)',
        'Europe/Minsk'           => 'Belarus (+03:00)',
        'Europe/Zagreb'          => 'Croatia (+02:00)',
        'Europe/Prague'          => 'Czech Republic (+02:00)',
        'Europe/Copenhagen'      => 'Denmark (+02:00)',
        'Europe/Tallinn'         => 'Estonia (+03:00)',
        'Europe/Helsinki'        => 'Finland (+03:00)',
        'Europe/Paris'           => 'France (+02:00)',
        'Europe/Berlin'          => 'Germany (+02:00)',
        'Europe/Gibraltar'       => 'Gibraltar (+02:00)',
        'Europe/Athens'          => 'Greece (+03:00)',
        'Europe/Guernsey'        => 'Guernsey (+01:00)',
        'Europe/Budapest'        => 'Hungary (+02:00)',
        'Europe/Dublin'          => 'Ireland (+01:00)',
        'Europe/Isle_of_Man'     => 'Isle of Man (+01:00)',
        'Europe/Rome'            => 'Italy (+02:00)',
        'Europe/Jersey'          => 'Jersey (+01:00)',
        'Europe/Riga'            => 'Latvia (+03:00)',
        'Europe/Vaduz'           => 'Liechtenstein (+02:00)',
        'Europe/Vilnius'         => 'Lithuania (+03:00)',
        'Europe/Luxembourg'      => 'Luxembourg (+02:00)',
        'Europe/Skopje'          => 'Macedonia (+02:00)',
        'Europe/Malta'           => 'Malta (+02:00)',
        'Europe/Chisinau'        => 'Moldova (+03:00)',
        'Europe/Monaco'          => 'Monaco (+02:00)',
        'Europe/Podgorica'       => 'Montenegro (+02:00)',
        'Europe/Amsterdam'       => 'Netherlands (+02:00)',
        'Europe/Oslo'            => 'Norway (+02:00)',
        'Europe/Warsaw'          => 'Poland (+02:00)',
        'Europe/Lisbon'          => 'Portugal (+01:00)',
        'Europe/Bucharest'       => 'Romania (+03:00)',
        'Europe/Kaliningrad'     => 'Russia (+03:00)',
        'Europe/San_Marino'      => 'San Marino (+02:00)',
        'Europe/Belgrade'        => 'Serbia (+02:00)',
        'Europe/Bratislava'      => 'Slovakia (+02:00)',
        'Europe/Ljubljana'       => 'Slovenia (+02:00)',
        'Europe/Madrid'          => 'Spain (+02:00)',
        'Europe/Stockholm'       => 'Sweden (+02:00)',
        'Europe/Zurich'          => 'Switzerland (+02:00)',
        'Europe/Istanbul'        => 'Turkey (+03:00)',
        'Europe/Kiev'            => 'Ukraine (+03:00)',
        'Europe/London'          => 'United Kingdom (+01:00)',
        'Indian/Chagos'          => 'British Indian Ocean Territory (+06:00)',
        'Indian/Christmas'       => 'Christmas Island (+07:00)',
        'Indian/Cocos'           => 'Cocos Islands (+06:30)',
        'Indian/Comoro'          => 'Comoros (+03:00)',
        'Indian/Kerguelen'       => 'French Southern Territories (+05:00)',
        'Indian/Antananarivo'    => 'Madagascar (+03:00)',
        'Indian/Maldives'        => 'Maldives (+05:00)',
        'Indian/Mauritius'       => 'Mauritius (+04:00)',
        'Indian/Mayotte'         => 'Mayotte (+03:00)',
        'Indian/Reunion'         => 'Reunion (+04:00)',
        'Indian/Mahe'            => 'Seychelles (+04:00)',
        'Pacific/Rarotonga'      => 'Cook Islands (-10:00)',
        'Pacific/Fiji'           => 'Fiji (+12:00)',
        'Pacific/Tahiti'         => 'French Polynesia (-10:00)',
        'Pacific/Guam'           => 'Guam (+10:00)',
        'Pacific/Tarawa'         => 'Kiribati (+12:00)',
        'Pacific/Majuro'         => 'Marshall Islands (+12:00)',
        'Pacific/Chuuk'          => 'Micronesia (+10:00)',
        'Pacific/Nauru'          => 'Nauru (+12:00)',
        'Pacific/Noumea'         => 'New Caledonia (+11:00)',
        'Pacific/Auckland'       => 'New Zealand (+12:00)',
        'Pacific/Niue'           => 'Niue (-11:00)',
        'Pacific/Norfolk'        => 'Norfolk Island (+11:30)',
        'Pacific/Saipan'         => 'Northern Mariana Islands (+10:00)',
        'Pacific/Palau'          => 'Palau (+09:00)',
        'Pacific/Port_Moresby'   => 'Papua New Guinea (+10:00)',
        'Pacific/Pitcairn'       => 'Pitcairn (-08:00)',
        'Pacific/Apia'           => 'Samoa (+13:00)',
        'Pacific/Guadalcanal'    => 'Solomon Islands (+11:00)',
        'Pacific/Fakaofo'        => 'Tokelau (+14:00)',
        'Pacific/Tongatapu'      => 'Tonga (+13:00)',
        'Pacific/Funafuti'       => 'Tuvalu (+12:00)',
        'Pacific/Johnston'       => 'United States Minor Outlying Islands (-10:00)',
        'Pacific/Efate'          => 'Vanuatu (+11:00)',
        'Pacific/Wallis'         => 'Wallis and Futuna (+12:00)',
        'UTC'                    => 'UTC',
    ];
}
