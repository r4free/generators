<?php
namespace Generators\Commands;

use Generators\APIResourceGenerator;
use Generators\FileAlreadyExistsException;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class EntityCommand
 * @package Prettus\Repository\Generators\Commands
 * @author Anderson Andrade <contato@andersonandra.de>
 */
class APIResourceCommand extends Command
{

    /**
     * The name of command.
     *
     * @var string
     */
    protected $name = 'make:apiresource';

    protected $type = 'Resource';

    /**
     * The description of command.
     *
     * @var string
     */
    protected $description = 'Create a new resource.';

    /**
     * @var Collection
     */
    protected $generators = null;

    /**
     * Execute the command.
     *
     * @see fire()
     * @return void
     */
    public function handle(){
        $this->laravel->call([$this, 'fire'], func_get_args());
    }

    /**
     * Execute the command.
     *
     * @return bool
     */
    public function fire()
    {
        try {
            $resource_args = [
                'name'    => $this->argument('name')
            ];

            (new APIResourceGenerator([
                'name' => $this->argument('name'),
            ]))->run();

            $this->info($this->type . ' created successfully.');


        } catch (FileAlreadyExistsException $e) {
            $this->error($this->type . ' already exists!');

            return false;
        }

    }


    /**
     * The array of command arguments.
     *
     * @return array
     */
    public function getArguments()
    {
        return [
            [
                'name',
                InputArgument::REQUIRED,
                'The name of class being generated.',
                null
            ],
        ];
    }


    /**
     * The array of command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            [
                'fillable',
                null,
                InputOption::VALUE_OPTIONAL,
                'The fillable attributes.',
                null
            ],

        ];
    }
}
