<?php
declare(strict_types=1);

namespace ValueObjects\Web;

use ValueObjects\Exception\InvalidNativeArgumentException;
use Zend\Validator\Hostname as Validator;

/**
 * Class Hostname
 */
class Hostname extends Domain
{
    /**
     * Returns a Hostname
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $validator = new Validator(array('allow' => Validator::ALLOW_DNS | Validator::ALLOW_LOCAL));

        if (false === $validator->isValid($value)) {
            throw new InvalidNativeArgumentException($value, array('string (valid hostname)'));
        }

        $this->value = $value;
    }
}
