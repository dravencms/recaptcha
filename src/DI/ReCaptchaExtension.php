<?php declare(strict_types = 1);

namespace Dravencms\ReCaptcha\DI;

use Dravencms\ReCaptcha\ReCaptchaProvider;
use Nette\DI\CompilerExtension;
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
