<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use JDR\Mailer\Email\Address;

class Bounce implements EmailPart
{
    /**
     * @var Address
     */
    private $address;

    /**
     * Constructor.
     *
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    /**
     * The email addres the email should be sent from.
     *
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }
}
