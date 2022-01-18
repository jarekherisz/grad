<?php

namespace Grad\CoreBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Grad\CoreBundle\Component\HttpKernel\GradBundle\GradBundle;
use Symfony\Component\Console\Style\StyleInterface;

class ModuleListCommand extends Command
{
    public function __construct(string $name = null)
    {
        $this->setDescription("List of modules");
        parent::__construct("module:list");

    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $title = 'Grad modules list';
        $headers = ['Bundle name', 'Extension alias', 'Class', 'Version'];
        $rows = [];

        $bundles = $this->getApplication()->getKernel()->getBundles();

        foreach ($bundles as $bundle) {
            if($bundle instanceof GradBundle)
            {
                $extension = $bundle->getContainerExtension();
                $rows[] = [$bundle->getName(), $extension ? $extension->getAlias() : '', get_class($bundle), $bundle->getVersion()];
            }
        }

        if ($output instanceof StyleInterface) {
            $output->title($title);
            $output->table($headers, $rows);
        } else {
            $output->writeln($title);
            $table = new Table($output);
            $table->setHeaders($headers)->setRows($rows)->render();
        }
        return 0;
    }
}