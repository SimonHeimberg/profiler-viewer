View profiler data outside the project you recorded it.

# usage

Set PROFILER_VIEWER_PROFILER_PATH in .env.local (or as real environment
variable) to the path you want to see.  
Example: `PROFILER_VIEWER_PROFILER_PATH=/mendia/from_your_system/project/var/cache/prod/profiler/`

Serve the app (`symfony local:serve --no-tls --allow-http --daemon --port=8765`
or [any method you like](https://symfony.com/doc/current/setup/web_server_configuration.html)).

Navigate to the page http://your-app-base-url:8765/pview/. Use the profiler as usual.

When the data can not be displayed and you get an error message, then copy the files TODO

This may happen when you have classes in your app implementing the interface
[Serializable](https://www.php.net/manual/de/class.serializable.php).

In complex cases, use the bundle
[simon_heimberg/profiler_viewer_bundle](https://github.com/SimonHeimberg/profiler_viewer_bundle)
directly in your app (only in dev mode, and with proper firewall).
