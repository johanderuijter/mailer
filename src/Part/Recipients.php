<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use InvalidArgumentException;
use JDR\Mailer\Email\Address;

class Recipients implements EmailPart
{
    /**
     * @var Address[]
     */
    private $addresses;

    /**
     * Constructor.
     *
     * @param Address ...$addresses
     */
    public function __construct(Address ...$addresses)
    {
        if (empty($addresses)) {
            throw new InvalidArgumentException('At least one address must be supplied');
        }

        $this->addresses = $addresses;
    }

    /**
     * Get all the addresses the email should be sent to.
     *
     * @return Address[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }
}
