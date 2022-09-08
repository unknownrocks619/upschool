<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;

/**
 * 
 */
class Sms
{

    public function dikshit_form()
    {
        $phone_number = [
            // 9845637322,
            // 9860394224,
            // 9846171696,
            // 9843048346,
            // 9846083794,
            // 9869075915,
            // 9841732905,
            // 9841581141,
            // 9860734969,
            // 9849008866,
            // 9841322982,
            // 9843809788,
            // 9841883780,
            // 9814045729,
            // 9807242548,
            // 9845086096,
            // 9848028637,
            // 9868169923,
            // 9864735455,
            // 9856060273,
            // 9848037523,
            // 9845152024,
            // 9847100689,
            // 9842634465,
            // 9848246974,
            // 9846306389,
            // 9848771512,
            // 9851085581,
            // 9841697373,
            // 9856029326,
            // 9846049745,
            // 9827154104,
            // 9845436855,
            // 9851163992,
            // 9861239753,
            // 9841541865,
            // 9841731410,
            // 9851201523,
            // 9847398056,
            // 9851183388,
            // 9841538482,
            // 9851010779,
            // 9845975892,
            // 9843748226,
            // 9841713388,
            // 9860467325,
            // 9846260120,
            // 9841342262,
            // 9849899533,
            // 9849665027,
            // 9823727339,
            // 9818696532,
            // 9818991355,
            // 9841342585,
            // 9803970446,
            // 9861555955,
            // 9861497196,
            // 9847023771,
            // 9749755390,
            // 9842310799,
            // 9748338351,
            // 9848051888,
            // 9848160248,
            // 9866493400,
            // 9848928800,
            // 9810285526,
            // 9841129828,
            // 9843022369,
            // 9841252225,
            // 9849833292,
            // 9844061135,
            // 9815582544,
            // 9865268147,
            // 9816783873,
            // 9841147874,
            // 9856040093,
            // 9849595466,
            // 9845234095,
            // 9848037523,
            // 9856060273,
            // 9807242548,
            // 9845086096,
            // 9848121952,
            // 9843048346,
            // 9843769444,
            // 9818254767,
            // 9819546435,
            // 9857038238,
            // 9848689821,
            // 9804107592,
            // 9841385772,
            // 9847261583,
            // 9867877664,
            // 9813931073,
            // 9828892327,
            // 9823237793,
            // 9846102300,
            // 9860923154,
            // 9840031543,
            // 9847093988,
            // 9808845231,
            // 9805206654,
            // 9816181576,
            // 9851158577,
            // 9843934410,
            // 9843934410,
            // 9748401992,
            // 9841842701,
            // 9846260120,
            // 9851105006,
            // 9851188293,
            // 9851188293,
            // 9845667590,
            // 9841527875,
            // 9841456563,
            // 9844700627,
            // 9867604465,
            // 9841527875,
            // 9842030256,
            // 9861200498,
            // 9851009405,
            // 9841456563,
            // 9843019721,
            // 9863034907,
            // 9807760519,
            // 9866636854,
            // 9742992266,
            // 9841370698,
            // 9827102768,
            // 9841446540,
            // 9863899820,
            // 9843034823,
            // 9805838778,
            // 9810065358,
            // 9843198292,
            // 9816622706,
            // 9841227080,
            // 9848352702,
            // 9841572456,
            // 9817550444,
            // 9841342585,
            // 9841150470,
            // 9846740835,
            // 9849227116,
            // 9851331047,
            // 9844182430,
            // 9861606678,
            // 9849722272,
            9841607114,
            9860181830,
            9818965570,
            9858053585,
            9866086593,
            9842206443,
            9862977257,
            9843522077,
            9841096430,
            9818689952,
            9840305574,
            9841906101,
            9808015717,
            9841407266,
            9864265854,
            9860298791,
            9865122806,
            9849913919,
            9847384653,
            9856039893,
            9841196963,
            9852060809,
            9851236141
        ];
        // dd($phone_number);
        $message = "सीताराम। अतिरुद्र महायज्ञमा दीक्षित सम्पूर्ण भाग्यशालीहरुलाई आज मिति २०७९/०५/०९ गते बेलुकी ७:३० बजे  सद्गुरुदेवबाट आशिर्वचन प्रदान गर्ने जानकारी गराउँदै निम्न प्रस्तुत लिङ्कमा गएर सहभागी हुनुहोस।\nshorturl.at/hijOX\n\nZOOM Meeting ID: 822 6465 6973\nPasscode: 380126";
        foreach ($phone_number as $user) {
            $request_query = [
                "to" => $user,
                "text" => $message
            ];
            $this->send_sms($request_query);
        }
    }



    public function volunteer_sms()
    {
        $all_users = [];
        $text_message = "सीताराम। आज मिति २०७९/०४/२९ बाट नियमित सत्सङ्ग साँझ ७:१५ बजे र वेदान्त दर्शनको बाँकी कक्षा साँझ ७:५० बजे बाट सुरु हुने जानकारी गराउँदछौँ। \nवेदान्त कक्षा संचालक समिति";
        foreach ($all_users as $user) {
            $request_query = [
                "to" => $user,
                "text" => $text_message
            ];
            $this->send_sms($request_query);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user_sms()
    {
        $phone_number = [];

        $first_four = [];
        $link = "bit.ly/3bSmCkH";
        // $message = "सीताराम। कृपया यहाँहरुले तल दिईएको लिङ्कमा गएर आफ्नो फारम भर्दाको कोड नं वा मोबाइल नं राखेर Zoom session मा आउन सक्नुहुनेछ। Zoom session को link को लागि यहाँ थिच्नुहोस।";
        $message = "सीताराम।आज 8:45 मा हुने अभिषेकात्मकातिरुद्रमहायज्ञम्  Zoom Session मा सहभागीताको लागि तल दिइएको लिङ्कमा थिच्नुहोस।" . $link;
        // $message = "Sitaram.Please write your name with the code on the deposit slip. Your seat for atirudri will only be confirmed after we receive the photo of your deposit voucher on\nWhatsApp.Whatsapp:9852066009\nBank:Nepal Bangladesh bank\nA/C name: Mahayogi Siddhababa Spiritual Academy\nA/C no. 024004571C";
        foreach ($first_four as $send_sms) {
            $request_query = [
                "to" => $send_sms,
                "text" => $message
            ];
            $this->send_sms($request_query);
        }
        // // now let's make sure we send generate appropirate password and than make changes to db.
        // $random_text = \Str::random(6);
        // // get user phone number
        // $request_query = [
        //     'to' => $userDetail->phone_number,
        //     'text' => "सद्गुरदेवबाट प्रदत्त वेदान्त दर्शन साधनामा स्वागत छ।\nसहभागी हुने लिंक\n https://sadhak.siddhamahayog.org \n ID:{$userDetail->phone_number}\n पासवर्ड: {$random_text}\n समस्या परेमा संपर्क गर्ने नं 9852066009"
        // ];
        // $userLogin->password = Hash::make($random_text);
        // // return $this->send_sms($request_query);
        // if ($this->send_sms($request_query)) {
        //     $userLogin->save();
        // }
    }


    private function send_sms($send_param)
    {
        $auth_token =  "aa640550af64b95f7b68122b24ea10f6a0ef305ff18d0c1c5102facf51d00d76";
        $send_param["auth_token"] = $auth_token;
        $url = "https://sms.aakashsms.com/sms/v3/send/";
        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1); ///
        curl_setopt($ch, CURLOPT_POSTFIELDS, $send_param);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Response
        $response = curl_exec($ch);
        curl_close($ch);
        $response_param = json_decode($response);
        return ($response_param->error) ? false : true;
    }
}
