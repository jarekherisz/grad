<?php

namespace Grad\CoreBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Helper;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Kernel;
use Symfony\Component\HttpKernel\KernelInterface;

class AboutCommand extends Command
{
    public function __construct(string $name = null)
   {
       $this->setDescription("Display information about the current project");
       parent::__construct("about");

   }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        /** @var KernelInterface $kernel */
        $kernel = $this->getApplication()->getKernel();

        if (method_exists($kernel, 'getBuildDir')) {
            $buildDir = $kernel->getBuildDir();
        } else {
            $buildDir = $kernel->getCacheDir();
        }

        $rows = [
            ['<info>Grad</>'],
            ['Version', Kernel::GRAD_VERSION],
            new TableSeparator(),
            ['<info>Symfony</>'],
            ['Version', Kernel::VERSION],
            new TableSeparator(),
            ['<info>PHP</>'],
            ['Version', \PHP_VERSION],
            ['Architecture', (\PHP_INT_SIZE * 8).' bits'],
            ['Intl locale', class_exists(\Locale::class, false) && \Locale::getDefault() ? \Locale::getDefault() : 'n/a'],
            ['Timezone', date_default_timezone_get().' (<comment>'.(new \DateTime())->format(\DateTime::W3C).'</>)'],
            ['OPcache', \extension_loaded('Zend OPcache') && filter_var(ini_get('opcache.enable'), \FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false'],
            ['APCu', \extension_loaded('apcu') && filter_var(ini_get('apc.enabled'), \FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false'],
            ['Xdebug', \extension_loaded('xdebug') ? 'true' : 'false'],
        ];

        $io->table([], $rows);

        return 0;
    }
}