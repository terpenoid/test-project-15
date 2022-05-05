<?php

namespace Payments;

abstract class Enum
{
    public const PRODUCT_TYPE_BOOK = 'book';
    public const PRODUCT_TYPE_REWARD = 'reward';
    public const PRODUCT_TYPE_WALLET_REFILL = 'walletRefill';

    public const LANG_EN = 'en';
    public const LANG_ES = 'es';
    public const LANG_UK = 'uk';

    public const COUNTRY_UA = 'UA';
    public const COUNTRY_KZ = 'KZ';
    public const COUNTRY_PL = 'PL';

    public const USER_OS_WINDOWS = 'windows';
    public const USER_OS_ANDROID = 'android';
    public const USER_OS_IOS = 'ios';

    //

    public const FILTER_APPLY_TYPE_INCLUDE = 'include';
    public const FILTER_APPLY_TYPE_EXCLUDE = 'exclude';

    public const FILTER_CONDITION_GLUE_AND = 'and';
    public const FILTER_CONDITION_GLUE_OR = 'or';
}
