<?php

namespace App\Http\Controllers;

use App\Classes\Utilites;
use App\Models\Listing;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Order;
use App\Models\PaymentHistory;
use App\Models\Quote;
use App\Models\Review;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Telegram\Bot\Laravel\Facades\Telegram;

class HomeController extends Controller
{

    use Utilites;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function singlePage($part, $id)
    {
        return view("desktop.pages.single", ["type" => $part, "id" => $id]);
    }

    public function loadData($part, $id){
        $item = null;
        $payload = null;
        switch ($part){
            case "message":
                $item = Message::find($id);
                $payload = $id;
                $item = Listing::with(['category', 'subcategory', 'thing', 'messages', 'quotes'])->find($item->listing_id);
                break;
            case "quote":
                $item = Quote::find($id);
                break;
            case "order":
                $item = Order::find($id);
                break;
            case "listing":
                $item =Listing::with(['category', 'subcategory', 'thing', 'messages', 'quotes'])->find($id);
                break;
            case "review":
                $item =  Review::with(["transporter", "transporter.profile", "review"])->find($id);
                break;
            case "notification":
                $item = Notification::find($id);
                break;
            case "payment":
                $item = PaymentHistory::find($id);
                break;

        }

        return response()->json([
            "item"=>$item,
            "payload"=>$payload
        ]);
    }

    public function setLocale($lang)
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function sendMessage(Request $request)

    {
        $request->validate([
            'phone' => "required",
            'email' => "nullable|email",
            "from" => "string|required",
            "message" => "required"
        ]);

        $phone = $request->get("phone") ?? '';
        $email = $request->get("email") ?? '';
        $from = $request->get("from") ?? '';
        $address = $request->get("address") ?? '';
        $message = $request->get("message") ?? '';


        $tmp_message = sprintf("<b>Заявка:</b>\nТелефон: %s\nПочта: %s\nФ.И.О.: %s\nАдресс: %s\nСообщение: %s",
            $phone,
            $email,
            $from,
            $address,
            $message
        );

        $this->sendMessageToTelegramChannel(env("TELEGRAM_ALLOTRANS_CHANNEL"), $tmp_message);
        if ($request->ajax())
            return response()
                ->json([
                    "message" => "success",
                    "status" => 200
                ]);

        return redirect()
            ->back()
            ->with("message", "Сообщение отправлено!");

    }

    public function sendVoice(Request $request)
    {

        $phone = $request->phone ?? "+380710000000";
        $username = $request->name ?? "-";

        $files = $request->file('files');

        array_map('unlink', glob(storage_path("app/public/uploads/*")));

        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                $name = "record-allotrans-" . time() . ".mp3";
                $file->storeAs("/public/uploads/", $name);
                Telegram::sendAudio([
                    'chat_id' => env("TELEGRAM_ALLOTRANS_CHANNEL"),
                    "caption" => "<b>Голосовая заявка от пользователя [$username]</b>\nНомер телефона:<i> $phone </i>",
                    'parse_mode' => 'HTML',
                    'audio' => \Telegram\Bot\FileUpload\InputFile::create(storage_path('app/public') . "/uploads/$name"),
                ]);

                Storage::delete("/uploads/$name");
            }
        }


        return "success";
    }

}
