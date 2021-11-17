<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class NotificationObjectType extends Enum
{
    const Empty =   0;
    const Message =   1;
    const Listing = 2;
    const Quote = 3;
    const Order = 4;
    const Customer = 5;
    const Transporter = 6;
    const Review = 7;
    const Notification = 8;
    const Payment = 9;
}
