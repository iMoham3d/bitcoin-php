<?php

namespace BitWasp\Bitcoin\Signature;

use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Math\Math;
use BitWasp\Bitcoin\Serializer\Signature\DerSignatureSerializer;
use BitWasp\Bitcoin\Serializer\Transaction\TransactionSignatureSerializer;

class TransactionSignatureFactory
{
    /**
     * @param Math $math
     * @return DerSignatureSerializer
     */
    public static function getSerializer(Math $math = null)
    {
        $math = $math ?: Bitcoin::getMath();
        $serializer = new TransactionSignatureSerializer(new DerSignatureSerializer($math));
        return $serializer;
    }

    /**
     * @param $string
     * @param Math $math
     * @return Signature
     */
    public static function fromHex($string, Math $math = null)
    {
        $serializer = self::getSerializer($math);
        $signature = $serializer->parse($string);
        return $signature;
    }
}
