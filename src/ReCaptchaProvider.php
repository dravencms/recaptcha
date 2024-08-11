<?php declare(strict_types = 1);

namespace Dravencms\ReCaptcha;

use Contributte\ReCaptcha\ReCaptchaProvider as ReCaptchaReCaptchaProvider;
use Dravencms\Captcha\Forms\ICaptchaField;
use Dravencms\Captcha\Forms\ReCaptchaField;

class ReCaptchaProvider extends ReCaptchaReCaptchaProvider implements ICaptchaProvider
{
    public function prepareField(string $label, ?string $message = null): ICaptchaField {
        return new ReCaptchaField($this, $label, $message);
    }
}
