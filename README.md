View profiler data outside the project you recorded it.

To see debug output in another place, you can redirect [the dump output to a dump
server](https://symfony.com/doc/current/components/var_dumper.html#var-dumper-dump-server).

But to see more profiler data outside the app it was recorded in, this app can
be used. Or to see output logged in APP_ENV=prod.

# usage

Set PROFILER_VIEWER_PROFILER_PATH in .env.local (or as real environment
variable) to the path you want to see.  
Example: `PROFILER_VIEWER_PROFILER_PATH=/mendia/from_your_system/project/var/cache/prod/profiler/`

Serve the app (`symfony local:serve --no-tls --allow-http --daemon --port=8765`
or [any method you like](https://symfony.com/doc/current/setup/web_server_configuration.html)).

Navigate to the page http://your-app-base-url:8765/pview/. Use the profiler as usual.

When the data can not be displayed and you get an error message, then follow
[the instruction about missing classes](#Missing Classes).

# installation

select the version matching to your app:

[master](https://github.com/SimonHeimberg/profiler-viewer/tree/master): symfony 5
[sy4](https://github.com/SimonHeimberg/profiler-viewer/tree/sy4): symfony 4.4
[sy3](https://github.com/SimonHeimberg/profiler-viewer/tree/sy3): symfony 3.4

## install with git and composer

git clone --single-branch --branch master ssh://git@github.com/SimonHeimberg/profiler-viewer profiler-viewer
cd ./profiler-viewer
composer install

# problems
## Missing Classes
Copy the missing classes into `profiler-viewer/external_src/` with the full
namespace. So the class `App\Some\Data.class` is copied to
`profiler-viewer/external_src/App/Some/Data.class`. To find out which class is
missing, run `bin/console profiler-viewer:check-classes some/project/var/cache/prod/profiler/02/b1/18b102`
to see the classes missing for profile 18b102 (path is
`last two chars`/`previews two chars`/`profile id`).

This may happen when you have classes in your app implementing the interface
[Serializable](https://www.php.net/manual/de/class.serializable.php). This
should rarely happen in new symfony versions because the
[DataCollectors](https://github.com/symfony/symfony/blob/master/src/Symfony/Component/HttpKernel/DataCollector/DataCollector.php)
were improved.

In complex cases, use the bundle
[simon-heimberg/profiler-viewer-bundle](https://github.com/SimonHeimberg/profiler-viewer-bundle)
directly in your app (only in dev mode, and with proper firewall).
