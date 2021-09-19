<?php


namespace App\Classes;


use Illuminate\Support\Facades\Log;
use Telegram\Bot\Exceptions\TelegramResponseException;
use Telegram\Bot\Laravel\Facades\Telegram;
use Yandex\Geocode\Exception;
use Yandex\Geocode\Facades\YandexGeocodeFacade;

trait Utilites
{
    public function sendToTelegram($id, $message, $keyboard = [])
    {
        try {
            $this->sendMessageToTelegramChannel($id, $message, $keyboard);
            $this->sendMessageToTelegramChannel(env("TELEGRAM_FASTORAN_ADMIN_CHANNEL"), $message);
        } catch (TelegramResponseException $e) {
            Log::error(sprintf("%s:%s %s",
                $e->getLine(),
                $e->getFile(),
                $e->getMessage()
            ));
        }

    }


    /**
     * @param $id
     * @param $message
     * @param array $keyboard
     */
    protected function sendMessageToTelegramChannel($id, $message, $keyboard = [])
    {
        try {
            Telegram::sendMessage([
                'chat_id' => $id,
                'parse_mode' => 'HTML',
                'text' => $message,
                'reply_markup' => json_encode([
                    'inline_keyboard' => $keyboard
                ])
            ]);
        } catch (\Exception $e) {
            Log::error(sprintf("%s:%s %s",
                $e->getLine(),
                $e->getFile(),
                $e->getMessage()
            ));
        }

    }

    public function prepareChannelId($channelName)
    {
        try {
            $content = file_get_contents("https://api.telegram.org/bot" . env("TELEGRAM_BOT_TOKEN") . "/getChat?chat_id=@$channelName");
        } catch (\Exception $e) {
            $content = [];
        }

        return json_decode($content)->result->id ?? null;
    }
}
