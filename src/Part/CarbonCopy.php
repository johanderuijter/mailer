<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use JDR\Mailer\Email\Address;

class CarbonCopy implements EmailPart
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
