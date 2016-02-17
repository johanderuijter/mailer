<?php declare(strict_types = 1);

namespace JDR\Mailer\Email;

class Address
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $name;

    public function __construct(string $email, string $name = null)
    {
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * Get email address.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get display name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }
}
