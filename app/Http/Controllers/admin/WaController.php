<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Twilio\Rest\Client;

class WaController extends Controller
{

    public function index()
    {
        return view('admin.wa.index');
    }


    public function send(Request $request)
    {

        $users = User::where('status', true)->get();
        $numbers = $users->pluck('no_hp')->toArray();
        // $numbers = "085760557702";

        $twilioSID = 'ACab89c8d440c9e1a6d703df8a67049dc2';
        $twilioToken = '1570dce4e41667395fe9a6c3ac7381d4';
        $twilioPhoneNumber = '+14155238886';

        $twilio = new Client($twilioSID, $twilioToken);

        $message = $request->pesan;

        // $mediaUrl = "https://disk.mediaindonesia.com/files/news/2022/12/30/WhatsApp%20Image%202022-12-22%20at%2017.06.28.jpg";

        foreach ($numbers as $number) {
            $twilio->messages->create("whatsapp:$number", [
                'from' => "whatsapp:{$twilioPhoneNumber}",
                "body" => $message,
                // "mediaUrl" => [$mediaUrl],
            ]);
        }



        // $key = 'test-arifapp-1234567890';

        // $message = $request->pesan;

        // $response = Http::post('https://api.arif.app/api/send', ['key' => $key, 'no' => $numbers, 'pesan' => $message]);

        return "Pesan WhatsApp telah dikirim ke " . count($numbers) . " nomor.";
    }
}
