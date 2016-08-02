<?php declare(strict_types = 1);

namespace JDR\Mailer\Email;

interface Email
{
    /**
     * Set the From addresses.
     *
     * @param Address[] $addresses
     */
    public function setFrom(array $addresses): Email;

    /**
     * Get the From addresses for this message.
     *
     * @return Address[]
     */
    public function getFrom(): array;

    /**
     * Set the Reply-To addresses.
     *
     * Any replies from the receiver will be sent to this address.
     *
     * @param Address[] $addresses
     */
    public function setReplyTo(array $addresses): Email;

    /**
     * Get the Reply-To addresses for this message.
     *
     * @return Address[]
     */
    public function getReplyTo(): array;

    /**
     * Set the To addresses.
     *
     * Recipients set in this field will receive a copy of this message.
     *
     * @param Address[] $addresses
     */
    public function setTo(array $addresses): Email;

    /**
     * Get the To addresses for this message.
     *
     * @return Address[]
     */
    public function getTo(): array;

    /**
     * Set the Cc addresses.
     *
     * Recipients set in this field will receive a 'carbon-copy' of this message.
     *
     * @param Address[] $addresses
     */
    public function setCc(array $addresses): Email;

    /**
     * Get the Cc addresses for this message.
     *
     * @return Address[]
     */
    public function getCc(): array;

    /**
     * Set the Bcc addresses.
     *
     * Recipients set in this field will receive a 'blind-carbon-copy' of this message.
     *
     * @param Address[] $addresses
     */
    public function setBcc(array $addresses): Email;

    /**
     * Get the Bcc addresses for this message.
     *
     * @return Address[]
     */
    public function getBcc(): array;

    /**
     * Set the sender of this message.
     *
     * @param Address $address
     */
    public function setSender(Address $address): Email;

    /**
     * Get the sender address for this message.
     *
     * @return Address|null
     */
    public function getSender();

    /**
     * Set the bounce address for this message.
     *
     * @param Address $address
     */
    public function setBounce(Address $address): Email;

    /**
     * Get the bounce address for this message.
     *
     * @return Address|null
     */
    public function getBounce();

    /**
     * Set the subject of the message.
     *
     * @param string $subject
     */
    public function setSubject($subject): Email;

    /**
     * Get the subject of the message.
     *
     * @return string
     */
    public function getSubject(): string;

    /**
     * Add message body to email.
     *
     * @param Message $message
     *
     * @return self
     */
    public function addMessage(Message $message): Email;

    /**
     * Get all message body parts from the email.
     *
     * @return Message[]
     */
    public function getMessages(): array;
}
