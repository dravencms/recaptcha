# DravenCMS reCAPTCHA

Google reCAPTCHA provider for `dravencms/captcha`, implemented on top of Contributte reCAPTCHA.

## Installation

```bash
composer require dravencms/captcha dravencms/recaptcha
```

The package configuration adds Google's reCAPTCHA client script to both the admin and frontend WebLoader bundles.

## Configuration

```neon
dravencms.recaptcha:
    siteKey: your-site-key
    secretKey: your-secret-key
    minimalScore: 0.5

dravencms.captcha:
    provider: @dravencms.recaptcha.provider
```

Keep the secret key in local or environment-specific configuration. `minimalScore` accepts a value from `0` to `1` and defaults to `0`.

## Usage

```php
$form->addCaptcha(
    name: 'captcha',
    label: 'Verification',
    required: true,
    message: 'The CAPTCHA verification failed.',
);
```

The field uses the standard DravenCMS CAPTCHA contract, so application forms do not need to depend directly on Contributte reCAPTCHA classes.

## License

This package is licensed under the LGPL-3.0 license.
