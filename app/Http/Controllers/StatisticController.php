<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use App\Models\Listing;
use App\Models\PaymentHistory;
use App\Models\Profile;
use App\Models\Review;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class StatisticController extends Controller
{
    //

    private function getParamsForPeriod($from, $to){

        /*
         * Пользователей за период: верифицированных и нет
         * Количество созданных заказов
         * Колличество оплаченных заказов
         * Сумма оплаченных заказов
         * Комментариев за период
         * Отзывы по типу за период
         */


        $verifiedUsers = User::whereNotNull("email_verified_at")
            ->whereBetween("created_at",[$from, $to])
            ->get()->count();

        $notVerifiedUsers = User::whereNull("email_verified_at")
            ->whereBetween("created_at",[$from, $to])
            ->get()->count();

        $usersCount = User::whereBetween("created_at",[$from, $to])
            ->get()->count();

        $transporters = Profile::where("type", "transporter")
            ->whereBetween("created_at",[$from, $to])
            ->get()->count();

        $customers = Profile::where("type", "customer")
            ->whereBetween("created_at",[$from, $to])
            ->get()->count();

        $notPayedListings = Listing::where("status","<>","payed")
            ->whereBetween("created_at",[$from, $to])
            ->get()->count();

        $payedListings = Listing::where("status","payed")
            ->whereBetween("created_at",[$from, $to])
            ->get()->count();

        $blogComments = BlogComment::whereBetween("created_at",[$from, $to])
            ->get()->count();

        $reviews = Review::whereBetween("created_at",[$from, $to])
            ->get()->count();

        $payments = PaymentHistory::whereBetween("created_at",[$from, $to])
            ->get()->count();

        $paymentsSuccess = PaymentHistory::whereBetween("created_at",[$from, $to])
            ->where("success",1)
            ->get()->count();

        $paymentsFailed = PaymentHistory::whereBetween("created_at",[$from, $to])
            ->where("success",0)
            ->get()->count();

        $sum = PaymentHistory::whereBetween("created_at",[$from, $to])
            ->where("success",0)
            ->get()->sum("amount");

        return (object)[
          "verified_users_count"=>$verifiedUsers,
          "not_verified_users_count"=>$notVerifiedUsers,
          "users_count"=>$usersCount,
          "transporters_count"=>$transporters,
          "not_payed_listings_count"=>$notPayedListings,
          "payed_listings_count"=>$payedListings,
          "blog_comments_count"=>$blogComments,
          "customers_count"=>$customers,
          "reviews_count"=>$reviews,
          "all_payments_count"=>$payments,
          "success_payments_count"=>$paymentsSuccess,
          "failed_payments_count"=>$paymentsFailed,
          "payments_sum"=>$sum,
        ];
    }
    public function getCurrentDayStatistic(Request $request){


        $tmp = $this->getParamsForPeriod(
            Carbon::now()->startOfDay()->hour(0)->minute(0)->second(0),
            Carbon::now()->endOfDay()->hour(23)->minute(59)->second(59)
        );


        return response()->json($tmp);

    }

    public function getAnyPeriodStatistic(Request $request){
        $request->validate([
            "from"=>"required",
            "to"=>"required"
        ]);

        $dateStart = Carbon::parse($request->from . " 00:00:00");
        $dateEnd = Carbon::parse($request->to. " 23:59:59")->addSeconds(1);

        $tmp = $this->getParamsForPeriod(
            $dateStart,
            $dateEnd
        );

        return response()->json($tmp);

    }
}
