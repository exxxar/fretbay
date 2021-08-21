<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class QuoteStatusEnum extends Enum
{
    const NewBid =   0;
    const Expired =   1;
    const Accepted = 2;
    const Declined = 3;

}
