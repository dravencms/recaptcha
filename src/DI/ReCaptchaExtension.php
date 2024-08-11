<?php declare(strict_types = 1);

namespace Dravencms\ReCaptcha\DI;

use Dravencms\Captcha\Forms\CaptchaBinding;
use Dravencms\Captcha\CaptchaManager;
use Dravencms\Captcha\ReCaptchaProvider;
use Nette\DI\CompilerExtension;
use Nette\PhpGenerator\ClassType;
use Nette\Schema\Expect;
use Nette\Schema\Schema;

final class ReCaptchaExtension extends CompilerExtension
{

	public function getConfigSchema(): Schema
	{
		return Expect::structure([
			'siteKey' => Expect::string()->required()->dynamic(),
			'secretKey' => Expect::string()->required()->dynamic(),
			'minimalScore' => Expect::anyOf(Expect::float()->min(0)->max(1), Expect::int()->min(0)->max(1))->default(0),
		]);
	}

	/**
	 * Register services
	 */
	public function loadConfiguration(): void
	{
		$config = (array) $this->getConfig();
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('provider'))
			->setFactory(ReCaptchaProvider::class, [$config['siteKey'], $config['secretKey'], $config['minimalScore']]);
	}










}
