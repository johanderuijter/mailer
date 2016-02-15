# mailer

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package aims to simplify sending emails.

Emails are send with swift mailer though the [SwiftMailerBridge][link-swift-mailer-bridge], however, you can implement your own if you want. As long as it implements the [Mailer](src/Mailer.php).

For now, using (twig) templates is only supported with the [MailerBundle][link-bundle].

## Install

Via Composer

``` bash
$ composer require jdr/mailer
```

## Usage

``` php
<?php

use JDR\Mailer\EmailType;
use JDR\Mailer\Email\Address;
use JDR\Mailer\Part;

/**
 * The EmailType defines the message.
 */
class WelcomeEmail implements EmailType
{
    /**
     * @var User
     */
    private $user;

    /**
     * Constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public function buildEmail(EmailBuilder $builder)
    {
        $builder
            ->add(new Part\Sender(
                new Address('hello@example.com', 'Hello Example')
            ))
            ->add(new Part\Recipients(
                new Address($this->user->getEmail(), $this->user->getUsername())
            ))
            ->add(new Part\Subject(
                'Welcome {{ username }}',
                [
                    '{{ username }}' => $this->user->getUsername(),
                ]
            ))
            ->add(new Part\Message(
                'text/html',
                <<<EOT
Welcome {{ username }},
Thank you for choosing jdr/mailer, enjoy your stay.
EOT
                ,
                [
                    '{{ username }}' => $this->user->getUsername(),
                ]
            ))
        ;
    }
}

// Create a new Mailer (i.e. SwiftMailer)
$mailer = new SwiftMailer();
$mailer->sendEmail(new WelcomeEmail($user));

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email dev@johanderuijter.nl instead of using the issue tracker.

## Credits

- [Johan de Ruijter][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jdr/mailer.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/johanderuijter/mailer/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/johanderuijter/mailer.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/johanderuijter/mailer.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jdr/mailer.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jdr/mailer
[link-travis]: https://travis-ci.org/johanderuijter/mailer
[link-scrutinizer]: https://scrutinizer-ci.com/g/johanderuijter/mailer/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/johanderuijter/mailer
[link-downloads]: https://packagist.org/packages/jdr/mailer
[link-author]: https://github.com/johanderuijter
[link-contributors]: ../../contributors

[link-swift-mailer-bridge]: https://github.com/johanderuijter/mailer-swift-mailer-bridge
[link-bundle]: https://github.com/johanderuijter/mailer-bundle
