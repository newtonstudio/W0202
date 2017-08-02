<?php

$dataPOST = trim(file_get_contents('php://input'));
$xml = new SimpleXMLElement($dataPOST);
$json_string = json_encode($xml);    
$json = json_decode($json_string, TRUE);

$requestorIDAttr = $json['POS']['Source']['RequestorID']['@attributes'];

$url = $requestorIDAttr['URL'];
$type = $requestorIDAttr['Type'];
$ID = $requestorIDAttr['ID'];
$MessagePassword = $requestorIDAttr['MessagePassword'];

echo $url;

/*
{"@attributes":{"EchoToken":"b25f8616-de81-4e75-5213-4f25d1db13bf","TimeStamp":"2014-7-20T13:30:31","Target":"Production","Version":"1.0"},"POS":{"Source":{"RequestorID":{"@attributes":{"URL":"www.hotelnabe.com.tw","Type":"18","ID":"username","MessagePassword":"password"}}}},"HotelReservations":{"HotelReservation":{"@attributes":{"CreateDateTime":"2014-07-20T13:30:00","LastModifyDateTime":"2014-07-20T13:30:00","ResStatus":"Book"},"POS":{"Source":{"BookingChannel":{"@attributes":{"Type":"7"},"CompanyName":{"@attributes":{"CompanyShortName":"Agoda","TravelSector":"3","Code":"agoda"}}}}},"RoomStays":{"RoomStay":{"@attributes":{"IndexNumber":"1"},"RoomTypes":{"RoomType":{"@attributes":{"RoomTypeCode":"AVVDD","Quantity":"1"}}},"RoomRates":{"RoomRate":[{"@attributes":{"RatePlanCode":"EARLYBIRD"},"Rates":{"Rate":[{"@attributes":{"EffectiveDate":"2014-8-30"},"Base":{"@attributes":{"AmountAfterTax":"200000","CurrencyCode":"TWD","DecimalPlaces":"2"}},"AdditionalGuestAmounts":{"@attributes":{"AmountAfterTax":"50000","CurrencyCode":"TWD","DecimalPlaces":"2"}},"Total":{"@attributes":{"AmountAfterTax":"250000","CurrencyCode":"TWD","DecimalPlaces":"2"}}},{"@attributes":{"EffectiveDate":"2014-8-31"},"Base":{"@attributes":{"AmountAfterTax":"200000","CurrencyCode":"TWD","DecimalPlaces":"2"}},"AdditionalGuestAmounts":{"@attributes":{"AmountAfterTax":"50000","CurrencyCode":"TWD","DecimalPlaces":"2"}},"Total":{"@attributes":{"AmountAfterTax":"250000","CurrencyCode":"TWD","DecimalPlaces":"2"}}}]},"Total":{"@attributes":{"AmountAfterTax":"500000","CurrencyCode":"TWD","DecimalPlaces":"2"}}},{"@attributes":{"RatePlanCode":"LASTMIN"},"Rates":{"Rate":{"@attributes":{"EffectiveDate":"2014-9-1"},"Base":{"@attributes":{"AmountAfterTax":"150000","CurrencyCode":"TWD","DecimalPlaces":"2"}},"AdditionalGuestAmounts":{"@attributes":{"AmountAfterTax":"50000","CurrencyCode":"TWD","DecimalPlaces":"2"}},"Total":{"@attributes":{"AmountAfterTax":"200000","CurrencyCode":"TWD","DecimalPlaces":"2"}}}},"Total":{"@attributes":{"AmountAfterTax":"200000","CurrencyCode":"TWD","DecimalPlaces":"2"}}}],"TPA_Extensions":{}},"GuestCounts":{"GuestCount":[{"@attributes":{"AgeQualifyingCode":"8","Count":"1","ResGuestRPH":"1"}},{"@attributes":{"AgeQualifyingCode":"10","Count":"2","ResGuestRPH":"2"}}]},"TimeSpan":{"@attributes":{"Start":"2014-8-30","End":"2014-9-2"}},"Total":{"@attributes":{"AmountAfterTax":"700000","CurrencyCode":"TWD","DecimalPlaces":"2"}},"SpecialRequests":{"SpecialRequest":[{"Text":"No Smoking please"},{"Text":"I dont want to pay money"}]}}},"ResGuests":{"ResGuest":[{"@attributes":{"ResGuestRPH":"1","AgeQualifyingCode":"8"},"Profiles":{"Profile":{"Customer":{"@attributes":{"Gender":"Female"},"PersonName":{"GivenName":"Shiloh","MiddleName":"Nouvel","Surname":"Jolie-Pitt"},"CitizenCountryName":{"@attributes":{"Code":"TW"}}}}}},{"@attributes":{"ResGuestRPH":"2","AgeQualifyingCode":"10"},"Profiles":{"Profile":[{"Customer":{"@attributes":{"Gender":"Male"},"PersonName":{"GivenName":"Brad","Surname":"Pitt"},"Telephone":{"PhoneTechType":"1","CountryAccessCode":"886","AreaCityCode":"2","PhoneNumber":"66087639","Extension":"206"},"Email":"brad@surehigh.com.tw","CitizenCountryName":{"@attributes":{"Code":"TW"}}}},{"Customer":{"@attributes":{"Gender":"Female"},"PersonName":{"GivenName":"Angelina","Surname":"Jolie"},"Telephone":{"PhoneTechType":"5","CountryAccessCode":"886","PhoneNumber":"912345678"},"Email":"angelina@surehigh.com.tw","CitizenCountryName":{"@attributes":{"Code":"US"}}}}]}}]},"ResGlobalInfo":{"BasicPropertyInfo":{"@attributes":{"HotelCode":"1"}},"HotelReservationIDs":{"HotelReservationID":[{"@attributes":{"ResID_Value":"1213312321","ResID_Source":"Hotelnabe"}},{"@attributes":{"ResID_Value":"45654564","ResID_Source":"Booking","ResID_Date":"2014-07-20T13:29:37"}}]},"Guarantee":{"GuaranteesAccepted":{"GuaranteeAccepted":{"PaymentCard":{"@attributes":{"CardCode":"MC","EffectiveDate":"0115","ExpireDate":"0118"},"CardHolderName":"Brad Pitt","CardNumber":{"@attributes":{"EncryptionMethod":"AES-CBC","EncryptedValue":"AbTxuObcUvT0FeMs6+zoa9sZIzkaR1zaDbTMy9WdBDw="}},"SeriesCode":{"PlainText":"123"}}}}},"Total":{"@attributes":{"AmountAfterTax":"700000","DecimalPlaces":"2","CurrencyCode":"TWD"}},"SpecialRequests":{"SpecialRequest":[{"Text":"No Smoking please"},{"Text":"I dont want to pay money"}]}}}}}
*/








?>