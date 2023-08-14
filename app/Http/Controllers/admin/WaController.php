<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PesanWa;
use Twilio\Rest\Client;

class WaController extends Controller
{

    public function index()
    {
        $pesan = PesanWa::latest()->paginate(15);
        return view('admin.wa.index', compact("pesan"));
    }

    public function send(Request $request)
    {

        $users = User::where('status', true)->get();
        $numbers = $users->pluck('no_hp')->toArray();

        $twilioSID = $_ENV['TWILIO_SID'];
        $twilioToken = $_ENV['TWILIO_TOKEN'];
        $twilioPhoneNumber = $_ENV['TWILIO_PHONE_NUMBER'];
        $twilio = new Client($twilioSID, $twilioToken);

        $message = $request->pesan;

        // $mediaUrl = "https://disk.mediaindonesia.com/files/news/2022/12/30/WhatsApp%20Image%202022-12-22%20at%2017.06.28.jpg";

        foreach ($numbers as $number) {
            $tes = $twilio->messages->create("whatsapp:$number", [
                'from' => "whatsapp:{$twilioPhoneNumber}",
                "body" => $message,
                // "mediaUrl" => [$mediaUrl],
            ]);
        }
        PesanWa::create([
            'sid' => "0",
            'from' => $twilioPhoneNumber,
            'pesan' => $message,
        ]);

        return redirect()->back();
    }
}
