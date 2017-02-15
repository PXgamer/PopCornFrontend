# PopCornFrontend

Frontend for [PopCornMovie-App][originalBackend].

### Setting up the API backend

To set this up, there are 2 things required.

1. In Config, set the `base_url` and `backend_url` parameters (requires a trailing slash)
2. Add the database content from [`database/*.sql`](database/)
3. Open the app to the location you set.

The config parameters are near the top and look like:

```
$config['base_url'] = 'http://localhost/PopCornFrontend/';
$config['backend_url'] = 'http://localhost/PopCornMovies/';
```

The backend can be downloaded from [Assimilationstheorie/PopCornMovies][originalBackend].

[originalFrontend]: https://github.com/Assimilationstheorie/PopCornFrontend
[originalBackend]: https://github.com/Assimilationstheorie/PopCornMovies