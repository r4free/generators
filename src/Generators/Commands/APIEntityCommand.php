<?php
namespace Generators\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class EntityCommand
 * @package Prettus\Repository\Generators\Commands
 * @author Anderson Andrade <contato@andersonandra.de>
 */
class APIEntityCommand extends Command
{

    /**
     * The name of command.
     *
     * @var string
     */
    protected $name = 'make:apientity';

    /**
     * The description of command.
     *
     * @var string
     */
    protected $description = 'Create a new entity.';

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
     * @return void
     */
    public function fire()
    {

        if ($this->confirm('Would you like to create a Controller? [y|N]')) {

            $resource_args = [
                'name'    => $this->argument('name')
            ];

            // Generate a controller resource
            $this->call("make:apicontroller", $resource_args);
        }

        if ($this->confirm('Would you like to create a Resource? [y|N]')) {

            $resource_args = [
                'name'    => $this->argument('name')
            ];

            // Generate a controller resource
            $this->call("make:apiresource", $resource_args);
        }

        if ($this->confirm('Would you like to create a model ? [y|N]')) {

            $resource_args = [
                'name'    => $this->argument('name')
            ];

            // Generate a controller resource
            $this->call("make:apimodel", $resource_args);
        }


        if ($this->confirm('Would you like to create a migration ? [y|N]')) {

            $resource_args = [
                'name'    => "create_".str_plural(strtolower($this->argument('name')))."_table"
            ];

            // Generate a controller resource
            $this->call("make:migration", $resource_args);
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
            [
                'rules',
                null,
                InputOption::VALUE_OPTIONAL,
                'The rules of validation attributes.',
                null
            ],
            [
                'validator',
                null,
                InputOption::VALUE_OPTIONAL,
                'Adds validator reference to the repository.',
                null
            ],
            [
                'force',
                'f',
                InputOption::VALUE_NONE,
                'Force the creation if file already exists.',
                null
            ]
        ];
    }
}
