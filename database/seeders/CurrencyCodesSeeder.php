<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $string_json = '[
            {
                "countryCode": "AD",
                "countryName": "Andorra",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "AE",
                "countryName": "United Arab Emirates",
                "currencyCode": "AED",


                "continentName": "Asia"
            },
            {
                "countryCode": "AF",
                "countryName": "Afghanistan",
                "currencyCode": "AFN",


                "continentName": "Asia"
            },
            {
                "countryCode": "AG",
                "countryName": "Antigua and Barbuda",
                "currencyCode": "XCD",


                "continentName": "North America"
            },
            {
                "countryCode": "AI",
                "countryName": "Anguilla",
                "currencyCode": "XCD",


                "continentName": "North America"
            },
            {
                "countryCode": "AL",
                "countryName": "Albania",
                "currencyCode": "ALL",


                "continentName": "Europe"
            },
            {
                "countryCode": "AM",
                "countryName": "Armenia",
                "currencyCode": "AMD",


                "continentName": "Asia"
            },
            {
                "countryCode": "AO",
                "countryName": "Angola",
                "currencyCode": "AOA",


                "continentName": "Africa"
            },
            {
                "countryCode": "AQ",
                "countryName": "Antarctica",
                "currencyCode": "",


                "continentName": "Antarctica"
            },
            {
                "countryCode": "AR",
                "countryName": "Argentina",
                "currencyCode": "ARS",


                "continentName": "South America"
            },
            {
                "countryCode": "AS",
                "countryName": "American Samoa",
                "currencyCode": "USD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "AT",
                "countryName": "Austria",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "AU",
                "countryName": "Australia",
                "currencyCode": "AUD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "AW",
                "countryName": "Aruba",
                "currencyCode": "AWG",


                "continentName": "North America"
            },
            {
                "countryCode": "AX",
                "countryName": "??land",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "AZ",
                "countryName": "Azerbaijan",
                "currencyCode": "AZN",


                "continentName": "Asia"
            },
            {
                "countryCode": "BA",
                "countryName": "Bosnia and Herzegovina",
                "currencyCode": "BAM",


                "continentName": "Europe"
            },
            {
                "countryCode": "BB",
                "countryName": "Barbados",
                "currencyCode": "BBD",


                "continentName": "North America"
            },
            {
                "countryCode": "BD",
                "countryName": "Bangladesh",
                "currencyCode": "BDT",


                "continentName": "Asia"
            },
            {
                "countryCode": "BE",
                "countryName": "Belgium",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "BF",
                "countryName": "Burkina Faso",
                "currencyCode": "XOF",


                "continentName": "Africa"
            },
            {
                "countryCode": "BG",
                "countryName": "Bulgaria",
                "currencyCode": "BGN",


                "continentName": "Europe"
            },
            {
                "countryCode": "BH",
                "countryName": "Bahrain",
                "currencyCode": "BHD",


                "continentName": "Asia"
            },
            {
                "countryCode": "BI",
                "countryName": "Burundi",
                "currencyCode": "BIF",


                "continentName": "Africa"
            },
            {
                "countryCode": "BJ",
                "countryName": "Benin",
                "currencyCode": "XOF",


                "continentName": "Africa"
            },
            {
                "countryCode": "BL",
                "countryName": "Saint Barth??lemy",
                "currencyCode": "EUR",


                "continentName": "North America"
            },
            {
                "countryCode": "BM",
                "countryName": "Bermuda",
                "currencyCode": "BMD",


                "continentName": "North America"
            },
            {
                "countryCode": "BN",
                "countryName": "Brunei",
                "currencyCode": "BND",


                "continentName": "Asia"
            },
            {
                "countryCode": "BO",
                "countryName": "Bolivia",
                "currencyCode": "BOB",


                "continentName": "South America"
            },
            {
                "countryCode": "BQ",
                "countryName": "Bonaire",
                "currencyCode": "USD",


                "continentName": "North America"
            },
            {
                "countryCode": "BR",
                "countryName": "Brazil",
                "currencyCode": "BRL",


                "continentName": "South America"
            },
            {
                "countryCode": "BS",
                "countryName": "Bahamas",
                "currencyCode": "BSD",


                "continentName": "North America"
            },
            {
                "countryCode": "BT",
                "countryName": "Bhutan",
                "currencyCode": "BTN",


                "continentName": "Asia"
            },
            {
                "countryCode": "BV",
                "countryName": "Bouvet Island",
                "currencyCode": "NOK",


                "continentName": "Antarctica"
            },
            {
                "countryCode": "BW",
                "countryName": "Botswana",
                "currencyCode": "BWP",


                "continentName": "Africa"
            },
            {
                "countryCode": "BY",
                "countryName": "Belarus",
                "currencyCode": "BYR",


                "continentName": "Europe"
            },
            {
                "countryCode": "BZ",
                "countryName": "Belize",
                "currencyCode": "BZD",


                "continentName": "North America"
            },
            {
                "countryCode": "CA",
                "countryName": "Canada",
                "currencyCode": "CAD",


                "continentName": "North America"
            },
            {
                "countryCode": "CC",
                "countryName": "Cocos [Keeling] Islands",
                "currencyCode": "AUD",


                "continentName": "Asia"
            },
            {
                "countryCode": "CD",
                "countryName": "Democratic Republic of the Congo",
                "currencyCode": "CDF",


                "continentName": "Africa"
            },
            {
                "countryCode": "CF",
                "countryName": "Central African Republic",
                "currencyCode": "XAF",


                "continentName": "Africa"
            },
            {
                "countryCode": "CG",
                "countryName": "Republic of the Congo",
                "currencyCode": "XAF",


                "continentName": "Africa"
            },
            {
                "countryCode": "CH",
                "countryName": "Switzerland",
                "currencyCode": "CHF",


                "continentName": "Europe"
            },
            {
                "countryCode": "CI",
                "countryName": "Ivory Coast",
                "currencyCode": "XOF",


                "continentName": "Africa"
            },
            {
                "countryCode": "CK",
                "countryName": "Cook Islands",
                "currencyCode": "NZD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "CL",
                "countryName": "Chile",
                "currencyCode": "CLP",


                "continentName": "South America"
            },
            {
                "countryCode": "CM",
                "countryName": "Cameroon",
                "currencyCode": "XAF",


                "continentName": "Africa"
            },
            {
                "countryCode": "CN",
                "countryName": "China",
                "currencyCode": "CNY",


                "continentName": "Asia"
            },
            {
                "countryCode": "CO",
                "countryName": "Colombia",
                "currencyCode": "COP",


                "continentName": "South America"
            },
            {
                "countryCode": "CR",
                "countryName": "Costa Rica",
                "currencyCode": "CRC",


                "continentName": "North America"
            },
            {
                "countryCode": "CU",
                "countryName": "Cuba",
                "currencyCode": "CUP",


                "continentName": "North America"
            },
            {
                "countryCode": "CV",
                "countryName": "Cape Verde",
                "currencyCode": "CVE",


                "continentName": "Africa"
            },
            {
                "countryCode": "CW",
                "countryName": "Curacao",
                "currencyCode": "ANG",


                "continentName": "North America"
            },
            {
                "countryCode": "CX",
                "countryName": "Christmas Island",
                "currencyCode": "AUD",


                "continentName": "Asia"
            },
            {
                "countryCode": "CY",
                "countryName": "Cyprus",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "CZ",
                "countryName": "Czechia",
                "currencyCode": "CZK",


                "continentName": "Europe"
            },
            {
                "countryCode": "DE",
                "countryName": "Germany",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "DJ",
                "countryName": "Djibouti",
                "currencyCode": "DJF",


                "continentName": "Africa"
            },
            {
                "countryCode": "DK",
                "countryName": "Denmark",
                "currencyCode": "DKK",


                "continentName": "Europe"
            },
            {
                "countryCode": "DM",
                "countryName": "Dominica",
                "currencyCode": "XCD",


                "continentName": "North America"
            },
            {
                "countryCode": "DO",
                "countryName": "Dominican Republic",
                "currencyCode": "DOP",


                "continentName": "North America"
            },
            {
                "countryCode": "DZ",
                "countryName": "Algeria",
                "currencyCode": "DZD",


                "continentName": "Africa"
            },
            {
                "countryCode": "EC",
                "countryName": "Ecuador",
                "currencyCode": "USD",


                "continentName": "South America"
            },
            {
                "countryCode": "EE",
                "countryName": "Estonia",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "EG",
                "countryName": "Egypt",
                "currencyCode": "EGP",


                "continentName": "Africa"
            },
            {
                "countryCode": "EH",
                "countryName": "Western Sahara",
                "currencyCode": "MAD",


                "continentName": "Africa"
            },
            {
                "countryCode": "ER",
                "countryName": "Eritrea",
                "currencyCode": "ERN",


                "continentName": "Africa"
            },
            {
                "countryCode": "ES",
                "countryName": "Spain",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "ET",
                "countryName": "Ethiopia",
                "currencyCode": "ETB",


                "continentName": "Africa"
            },
            {
                "countryCode": "FI",
                "countryName": "Finland",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "FJ",
                "countryName": "Fiji",
                "currencyCode": "FJD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "FK",
                "countryName": "Falkland Islands",
                "currencyCode": "FKP",


                "continentName": "South America"
            },
            {
                "countryCode": "FM",
                "countryName": "Micronesia",
                "currencyCode": "USD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "FO",
                "countryName": "Faroe Islands",
                "currencyCode": "DKK",


                "continentName": "Europe"
            },
            {
                "countryCode": "FR",
                "countryName": "France",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "GA",
                "countryName": "Gabon",
                "currencyCode": "XAF",


                "continentName": "Africa"
            },
            {
                "countryCode": "GB",
                "countryName": "United Kingdom",
                "currencyCode": "GBP",


                "continentName": "Europe"
            },
            {
                "countryCode": "GD",
                "countryName": "Grenada",
                "currencyCode": "XCD",


                "continentName": "North America"
            },
            {
                "countryCode": "GE",
                "countryName": "Georgia",
                "currencyCode": "GEL",


                "continentName": "Asia"
            },
            {
                "countryCode": "GF",
                "countryName": "French Guiana",
                "currencyCode": "EUR",


                "continentName": "South America"
            },
            {
                "countryCode": "GG",
                "countryName": "Guernsey",
                "currencyCode": "GBP",


                "continentName": "Europe"
            },
            {
                "countryCode": "GH",
                "countryName": "Ghana",
                "currencyCode": "GHS",


                "continentName": "Africa"
            },
            {
                "countryCode": "GI",
                "countryName": "Gibraltar",
                "currencyCode": "GIP",


                "continentName": "Europe"
            },
            {
                "countryCode": "GL",
                "countryName": "Greenland",
                "currencyCode": "DKK",


                "continentName": "North America"
            },
            {
                "countryCode": "GM",
                "countryName": "Gambia",
                "currencyCode": "GMD",


                "continentName": "Africa"
            },
            {
                "countryCode": "GN",
                "countryName": "Guinea",
                "currencyCode": "GNF",


                "continentName": "Africa"
            },
            {
                "countryCode": "GP",
                "countryName": "Guadeloupe",
                "currencyCode": "EUR",


                "continentName": "North America"
            },
            {
                "countryCode": "GQ",
                "countryName": "Equatorial Guinea",
                "currencyCode": "XAF",


                "continentName": "Africa"
            },
            {
                "countryCode": "GR",
                "countryName": "Greece",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "GS",
                "countryName": "South Georgia and the South Sandwich Islands",
                "currencyCode": "GBP",


                "continentName": "Antarctica"
            },
            {
                "countryCode": "GT",
                "countryName": "Guatemala",
                "currencyCode": "GTQ",


                "continentName": "North America"
            },
            {
                "countryCode": "GU",
                "countryName": "Guam",
                "currencyCode": "USD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "GW",
                "countryName": "Guinea-Bissau",
                "currencyCode": "XOF",


                "continentName": "Africa"
            },
            {
                "countryCode": "GY",
                "countryName": "Guyana",
                "currencyCode": "GYD",


                "continentName": "South America"
            },
            {
                "countryCode": "HK",
                "countryName": "Hong Kong",
                "currencyCode": "HKD",


                "continentName": "Asia"
            },
            {
                "countryCode": "HM",
                "countryName": "Heard Island and McDonald Islands",
                "currencyCode": "AUD",


                "continentName": "Antarctica"
            },
            {
                "countryCode": "HN",
                "countryName": "Honduras",
                "currencyCode": "HNL",


                "continentName": "North America"
            },
            {
                "countryCode": "HR",
                "countryName": "Croatia",
                "currencyCode": "HRK",


                "continentName": "Europe"
            },
            {
                "countryCode": "HT",
                "countryName": "Haiti",
                "currencyCode": "HTG",


                "continentName": "North America"
            },
            {
                "countryCode": "HU",
                "countryName": "Hungary",
                "currencyCode": "HUF",


                "continentName": "Europe"
            },
            {
                "countryCode": "ID",
                "countryName": "Indonesia",
                "currencyCode": "IDR",


                "continentName": "Asia"
            },
            {
                "countryCode": "IE",
                "countryName": "Ireland",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "IL",
                "countryName": "Israel",
                "currencyCode": "ILS",


                "continentName": "Asia"
            },
            {
                "countryCode": "IM",
                "countryName": "Isle of Man",
                "currencyCode": "GBP",


                "continentName": "Europe"
            },
            {
                "countryCode": "IN",
                "countryName": "India",
                "currencyCode": "INR",


                "continentName": "Asia"
            },
            {
                "countryCode": "IO",
                "countryName": "British Indian Ocean Territory",
                "currencyCode": "USD",


                "continentName": "Asia"
            },
            {
                "countryCode": "IQ",
                "countryName": "Iraq",
                "currencyCode": "IQD",


                "continentName": "Asia"
            },
            {
                "countryCode": "IR",
                "countryName": "Iran",
                "currencyCode": "IRR",


                "continentName": "Asia"
            },
            {
                "countryCode": "IS",
                "countryName": "Iceland",
                "currencyCode": "ISK",


                "continentName": "Europe"
            },
            {
                "countryCode": "IT",
                "countryName": "Italy",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "JE",
                "countryName": "Jersey",
                "currencyCode": "GBP",


                "continentName": "Europe"
            },
            {
                "countryCode": "JM",
                "countryName": "Jamaica",
                "currencyCode": "JMD",


                "continentName": "North America"
            },
            {
                "countryCode": "JO",
                "countryName": "Jordan",
                "currencyCode": "JOD",


                "continentName": "Asia"
            },
            {
                "countryCode": "JP",
                "countryName": "Japan",
                "currencyCode": "JPY",


                "continentName": "Asia"
            },
            {
                "countryCode": "KE",
                "countryName": "Kenya",
                "currencyCode": "KES",


                "continentName": "Africa"
            },
            {
                "countryCode": "KG",
                "countryName": "Kyrgyzstan",
                "currencyCode": "KGS",


                "continentName": "Asia"
            },
            {
                "countryCode": "KH",
                "countryName": "Cambodia",
                "currencyCode": "KHR",


                "continentName": "Asia"
            },
            {
                "countryCode": "KI",
                "countryName": "Kiribati",
                "currencyCode": "AUD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "KM",
                "countryName": "Comoros",
                "currencyCode": "KMF",


                "continentName": "Africa"
            },
            {
                "countryCode": "KN",
                "countryName": "Saint Kitts and Nevis",
                "currencyCode": "XCD",


                "continentName": "North America"
            },
            {
                "countryCode": "KP",
                "countryName": "North Korea",
                "currencyCode": "KPW",


                "continentName": "Asia"
            },
            {
                "countryCode": "KR",
                "countryName": "South Korea",
                "currencyCode": "KRW",


                "continentName": "Asia"
            },
            {
                "countryCode": "KW",
                "countryName": "Kuwait",
                "currencyCode": "KWD",


                "continentName": "Asia"
            },
            {
                "countryCode": "KY",
                "countryName": "Cayman Islands",
                "currencyCode": "KYD",


                "continentName": "North America"
            },
            {
                "countryCode": "KZ",
                "countryName": "Kazakhstan",
                "currencyCode": "KZT",


                "continentName": "Asia"
            },
            {
                "countryCode": "LA",
                "countryName": "Laos",
                "currencyCode": "LAK",


                "continentName": "Asia"
            },
            {
                "countryCode": "LB",
                "countryName": "Lebanon",
                "currencyCode": "LBP",


                "continentName": "Asia"
            },
            {
                "countryCode": "LC",
                "countryName": "Saint Lucia",
                "currencyCode": "XCD",


                "continentName": "North America"
            },
            {
                "countryCode": "LI",
                "countryName": "Liechtenstein",
                "currencyCode": "CHF",


                "continentName": "Europe"
            },
            {
                "countryCode": "LK",
                "countryName": "Sri Lanka",
                "currencyCode": "LKR",


                "continentName": "Asia"
            },
            {
                "countryCode": "LR",
                "countryName": "Liberia",
                "currencyCode": "LRD",


                "continentName": "Africa"
            },
            {
                "countryCode": "LS",
                "countryName": "Lesotho",
                "currencyCode": "LSL",


                "continentName": "Africa"
            },
            {
                "countryCode": "LT",
                "countryName": "Lithuania",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "LU",
                "countryName": "Luxembourg",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "LV",
                "countryName": "Latvia",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "LY",
                "countryName": "Libya",
                "currencyCode": "LYD",


                "continentName": "Africa"
            },
            {
                "countryCode": "MA",
                "countryName": "Morocco",
                "currencyCode": "MAD",


                "continentName": "Africa"
            },
            {
                "countryCode": "MC",
                "countryName": "Monaco",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "MD",
                "countryName": "Moldova",
                "currencyCode": "MDL",


                "continentName": "Europe"
            },
            {
                "countryCode": "ME",
                "countryName": "Montenegro",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "MF",
                "countryName": "Saint Martin",
                "currencyCode": "EUR",


                "continentName": "North America"
            },
            {
                "countryCode": "MG",
                "countryName": "Madagascar",
                "currencyCode": "MGA",


                "continentName": "Africa"
            },
            {
                "countryCode": "MH",
                "countryName": "Marshall Islands",
                "currencyCode": "USD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "MK",
                "countryName": "Macedonia",
                "currencyCode": "MKD",


                "continentName": "Europe"
            },
            {
                "countryCode": "ML",
                "countryName": "Mali",
                "currencyCode": "XOF",


                "continentName": "Africa"
            },
            {
                "countryCode": "MM",
                "countryName": "Myanmar [Burma]",
                "currencyCode": "MMK",


                "continentName": "Asia"
            },
            {
                "countryCode": "MN",
                "countryName": "Mongolia",
                "currencyCode": "MNT",


                "continentName": "Asia"
            },
            {
                "countryCode": "MO",
                "countryName": "Macao",
                "currencyCode": "MOP",


                "continentName": "Asia"
            },
            {
                "countryCode": "MP",
                "countryName": "Northern Mariana Islands",
                "currencyCode": "USD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "MQ",
                "countryName": "Martinique",
                "currencyCode": "EUR",


                "continentName": "North America"
            },
            {
                "countryCode": "MR",
                "countryName": "Mauritania",
                "currencyCode": "MRO",


                "continentName": "Africa"
            },
            {
                "countryCode": "MS",
                "countryName": "Montserrat",
                "currencyCode": "XCD",


                "continentName": "North America"
            },
            {
                "countryCode": "MT",
                "countryName": "Malta",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "MU",
                "countryName": "Mauritius",
                "currencyCode": "MUR",


                "continentName": "Africa"
            },
            {
                "countryCode": "MV",
                "countryName": "Maldives",
                "currencyCode": "MVR",


                "continentName": "Asia"
            },
            {
                "countryCode": "MW",
                "countryName": "Malawi",
                "currencyCode": "MWK",


                "continentName": "Africa"
            },
            {
                "countryCode": "MX",
                "countryName": "Mexico",
                "currencyCode": "MXN",


                "continentName": "North America"
            },
            {
                "countryCode": "MY",
                "countryName": "Malaysia",
                "currencyCode": "MYR",


                "continentName": "Asia"
            },
            {
                "countryCode": "MZ",
                "countryName": "Mozambique",
                "currencyCode": "MZN",


                "continentName": "Africa"
            },
            {
                "countryCode": "NA",
                "countryName": "Namibia",
                "currencyCode": "NAD",


                "continentName": "Africa"
            },
            {
                "countryCode": "NC",
                "countryName": "New Caledonia",
                "currencyCode": "XPF",


                "continentName": "Oceania"
            },
            {
                "countryCode": "NE",
                "countryName": "Niger",
                "currencyCode": "XOF",


                "continentName": "Africa"
            },
            {
                "countryCode": "NF",
                "countryName": "Norfolk Island",
                "currencyCode": "AUD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "NG",
                "countryName": "Nigeria",
                "currencyCode": "NGN",


                "continentName": "Africa"
            },
            {
                "countryCode": "NI",
                "countryName": "Nicaragua",
                "currencyCode": "NIO",


                "continentName": "North America"
            },
            {
                "countryCode": "NL",
                "countryName": "Netherlands",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "NO",
                "countryName": "Norway",
                "currencyCode": "NOK",


                "continentName": "Europe"
            },
            {
                "countryCode": "NP",
                "countryName": "Nepal",
                "currencyCode": "NPR",


                "continentName": "Asia"
            },
            {
                "countryCode": "NR",
                "countryName": "Nauru",
                "currencyCode": "AUD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "NU",
                "countryName": "Niue",
                "currencyCode": "NZD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "NZ",
                "countryName": "New Zealand",
                "currencyCode": "NZD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "OM",
                "countryName": "Oman",
                "currencyCode": "OMR",


                "continentName": "Asia"
            },
            {
                "countryCode": "PA",
                "countryName": "Panama",
                "currencyCode": "PAB",


                "continentName": "North America"
            },
            {
                "countryCode": "PE",
                "countryName": "Peru",
                "currencyCode": "PEN",


                "continentName": "South America"
            },
            {
                "countryCode": "PF",
                "countryName": "French Polynesia",
                "currencyCode": "XPF",


                "continentName": "Oceania"
            },
            {
                "countryCode": "PG",
                "countryName": "Papua New Guinea",
                "currencyCode": "PGK",


                "continentName": "Oceania"
            },
            {
                "countryCode": "PH",
                "countryName": "Philippines",
                "currencyCode": "PHP",


                "continentName": "Asia"
            },
            {
                "countryCode": "PK",
                "countryName": "Pakistan",
                "currencyCode": "PKR",


                "continentName": "Asia"
            },
            {
                "countryCode": "PL",
                "countryName": "Poland",
                "currencyCode": "PLN",


                "continentName": "Europe"
            },
            {
                "countryCode": "PM",
                "countryName": "Saint Pierre and Miquelon",
                "currencyCode": "EUR",


                "continentName": "North America"
            },
            {
                "countryCode": "PN",
                "countryName": "Pitcairn Islands",
                "currencyCode": "NZD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "PR",
                "countryName": "Puerto Rico",
                "currencyCode": "USD",


                "continentName": "North America"
            },
            {
                "countryCode": "PS",
                "countryName": "Palestine",
                "currencyCode": "ILS",


                "continentName": "Asia"
            },
            {
                "countryCode": "PT",
                "countryName": "Portugal",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "PW",
                "countryName": "Palau",
                "currencyCode": "USD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "PY",
                "countryName": "Paraguay",
                "currencyCode": "PYG",


                "continentName": "South America"
            },
            {
                "countryCode": "QA",
                "countryName": "Qatar",
                "currencyCode": "QAR",


                "continentName": "Asia"
            },
            {
                "countryCode": "RE",
                "countryName": "R??union",
                "currencyCode": "EUR",


                "continentName": "Africa"
            },
            {
                "countryCode": "RO",
                "countryName": "Romania",
                "currencyCode": "RON",


                "continentName": "Europe"
            },
            {
                "countryCode": "RS",
                "countryName": "Serbia",
                "currencyCode": "RSD",


                "continentName": "Europe"
            },
            {
                "countryCode": "RU",
                "countryName": "Russia",
                "currencyCode": "RUB",


                "continentName": "Europe"
            },
            {
                "countryCode": "RW",
                "countryName": "Rwanda",
                "currencyCode": "RWF",


                "continentName": "Africa"
            },
            {
                "countryCode": "SA",
                "countryName": "Saudi Arabia",
                "currencyCode": "SAR",


                "continentName": "Asia"
            },
            {
                "countryCode": "SB",
                "countryName": "Solomon Islands",
                "currencyCode": "SBD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "SC",
                "countryName": "Seychelles",
                "currencyCode": "SCR",


                "continentName": "Africa"
            },
            {
                "countryCode": "SD",
                "countryName": "Sudan",
                "currencyCode": "SDG",


                "continentName": "Africa"
            },
            {
                "countryCode": "SE",
                "countryName": "Sweden",
                "currencyCode": "SEK",


                "continentName": "Europe"
            },
            {
                "countryCode": "SG",
                "countryName": "Singapore",
                "currencyCode": "SGD",


                "continentName": "Asia"
            },
            {
                "countryCode": "SH",
                "countryName": "Saint Helena",
                "currencyCode": "SHP",


                "continentName": "Africa"
            },
            {
                "countryCode": "SI",
                "countryName": "Slovenia",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "SJ",
                "countryName": "Svalbard and Jan Mayen",
                "currencyCode": "NOK",


                "continentName": "Europe"
            },
            {
                "countryCode": "SK",
                "countryName": "Slovakia",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "SL",
                "countryName": "Sierra Leone",
                "currencyCode": "SLL",


                "continentName": "Africa"
            },
            {
                "countryCode": "SM",
                "countryName": "San Marino",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "SN",
                "countryName": "Senegal",
                "currencyCode": "XOF",


                "continentName": "Africa"
            },
            {
                "countryCode": "SO",
                "countryName": "Somalia",
                "currencyCode": "SOS",


                "continentName": "Africa"
            },
            {
                "countryCode": "SR",
                "countryName": "Suriname",
                "currencyCode": "SRD",


                "continentName": "South America"
            },
            {
                "countryCode": "SS",
                "countryName": "South Sudan",
                "currencyCode": "SSP",


                "continentName": "Africa"
            },
            {
                "countryCode": "ST",
                "countryName": "S??o Tom?? and Pr??ncipe",
                "currencyCode": "STD",


                "continentName": "Africa"
            },
            {
                "countryCode": "SV",
                "countryName": "El Salvador",
                "currencyCode": "USD",


                "continentName": "North America"
            },
            {
                "countryCode": "SX",
                "countryName": "Sint Maarten",
                "currencyCode": "ANG",


                "continentName": "North America"
            },
            {
                "countryCode": "SY",
                "countryName": "Syria",
                "currencyCode": "SYP",


                "continentName": "Asia"
            },
            {
                "countryCode": "SZ",
                "countryName": "Swaziland",
                "currencyCode": "SZL",


                "continentName": "Africa"
            },
            {
                "countryCode": "TC",
                "countryName": "Turks and Caicos Islands",
                "currencyCode": "USD",


                "continentName": "North America"
            },
            {
                "countryCode": "TD",
                "countryName": "Chad",
                "currencyCode": "XAF",


                "continentName": "Africa"
            },
            {
                "countryCode": "TF",
                "countryName": "French Southern Territories",
                "currencyCode": "EUR",


                "continentName": "Antarctica"
            },
            {
                "countryCode": "TG",
                "countryName": "Togo",
                "currencyCode": "XOF",


                "continentName": "Africa"
            },
            {
                "countryCode": "TH",
                "countryName": "Thailand",
                "currencyCode": "THB",


                "continentName": "Asia"
            },
            {
                "countryCode": "TJ",
                "countryName": "Tajikistan",
                "currencyCode": "TJS",


                "continentName": "Asia"
            },
            {
                "countryCode": "TK",
                "countryName": "Tokelau",
                "currencyCode": "NZD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "TL",
                "countryName": "East Timor",
                "currencyCode": "USD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "TM",
                "countryName": "Turkmenistan",
                "currencyCode": "TMT",


                "continentName": "Asia"
            },
            {
                "countryCode": "TN",
                "countryName": "Tunisia",
                "currencyCode": "TND",


                "continentName": "Africa"
            },
            {
                "countryCode": "TO",
                "countryName": "Tonga",
                "currencyCode": "TOP",


                "continentName": "Oceania"
            },
            {
                "countryCode": "TR",
                "countryName": "Turkey",
                "currencyCode": "TRY",


                "continentName": "Asia"
            },
            {
                "countryCode": "TT",
                "countryName": "Trinidad and Tobago",
                "currencyCode": "TTD",


                "continentName": "North America"
            },
            {
                "countryCode": "TV",
                "countryName": "Tuvalu",
                "currencyCode": "AUD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "TW",
                "countryName": "Taiwan",
                "currencyCode": "TWD",


                "continentName": "Asia"
            },
            {
                "countryCode": "TZ",
                "countryName": "Tanzania",
                "currencyCode": "TZS",


                "continentName": "Africa"
            },
            {
                "countryCode": "UA",
                "countryName": "Ukraine",
                "currencyCode": "UAH",


                "continentName": "Europe"
            },
            {
                "countryCode": "UG",
                "countryName": "Uganda",
                "currencyCode": "UGX",


                "continentName": "Africa"
            },
            {
                "countryCode": "UM",
                "countryName": "U.S. Minor Outlying Islands",
                "currencyCode": "USD",


                "continentName": "Oceania"
            },
            {
                "countryCode": "US",
                "countryName": "United States",
                "currencyCode": "USD",


                "continentName": "North America"
            },
            {
                "countryCode": "UY",
                "countryName": "Uruguay",
                "currencyCode": "UYU",


                "continentName": "South America"
            },
            {
                "countryCode": "UZ",
                "countryName": "Uzbekistan",
                "currencyCode": "UZS",


                "continentName": "Asia"
            },
            {
                "countryCode": "VA",
                "countryName": "Vatican City",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "VC",
                "countryName": "Saint Vincent and the Grenadines",
                "currencyCode": "XCD",


                "continentName": "North America"
            },
            {
                "countryCode": "VE",
                "countryName": "Venezuela",
                "currencyCode": "VEF",


                "continentName": "South America"
            },
            {
                "countryCode": "VG",
                "countryName": "British Virgin Islands",
                "currencyCode": "USD",


                "continentName": "North America"
            },
            {
                "countryCode": "VI",
                "countryName": "U.S. Virgin Islands",
                "currencyCode": "USD",


                "continentName": "North America"
            },
            {
                "countryCode": "VN",
                "countryName": "Vietnam",
                "currencyCode": "VND",


                "continentName": "Asia"
            },
            {
                "countryCode": "VU",
                "countryName": "Vanuatu",
                "currencyCode": "VUV",


                "continentName": "Oceania"
            },
            {
                "countryCode": "WF",
                "countryName": "Wallis and Futuna",
                "currencyCode": "XPF",


                "continentName": "Oceania"
            },
            {
                "countryCode": "WS",
                "countryName": "Samoa",
                "currencyCode": "WST",


                "continentName": "Oceania"
            },
            {
                "countryCode": "XK",
                "countryName": "Kosovo",
                "currencyCode": "EUR",


                "continentName": "Europe"
            },
            {
                "countryCode": "YE",
                "countryName": "Yemen",
                "currencyCode": "YER",


                "continentName": "Asia"
            },
            {
                "countryCode": "YT",
                "countryName": "Mayotte",
                "currencyCode": "EUR",


                "continentName": "Africa"
            },
            {
                "countryCode": "ZA",
                "countryName": "South Africa",
                "currencyCode": "ZAR",


                "continentName": "Africa"
            },
            {
                "countryCode": "ZM",
                "countryName": "Zambia",
                "currencyCode": "ZMW",


                "continentName": "Africa"
            },
            {
                "countryCode": "ZW",
                "countryName": "Zimbabwe",
                "currencyCode": "ZWL",


                "continentName": "Africa"
            }
        ]';
        $currencies = json_decode($string_json, true);

        DB::table('currency_codes')->insert($currencies);
    }
}
