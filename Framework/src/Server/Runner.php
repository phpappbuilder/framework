<?php
namespace Centurion\Server;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Runner extends Command
{
    protected function configure()
    {
        $this
            // имя команды (часть после "bin/console")
            ->setName('run')

            // краткое описание, отображающееся при запуске "php bin/console list"
            ->setDescription('Run dev server')

            // полное описание команды, отображающееся при запуске команды
            // с опцией "--help"
            ->setHelp('Run dev server')

            // создать аргумент
            ->addArgument('port', InputArgument::OPTIONAL, 'server port', '8000')
        ;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Run dev server',
            'Url - ["http://127.0.0.1:'.$input->getArgument('port').'/"]'
        ]);
        exec('notify-send "Run centurion dev-server"');
        exec('php -S 127.0.0.1:'.$input->getArgument('port').' -t Public/');
    }
}