#Xentral Trial

### Installation
```bash
1. Clone
  git clone git@github.com:zeshan77/xentral.git ./{localdirectory}
  cd {localdirectory}
  composer install
```

### Setup
```bash
  cp .env.example .env
  Change URL and DB credentials in .env file accordingly
  Import db dump located in ./docs/xentral.sql
  Create an author in db.authors table manually
```
### Little bit about the architecture
All codebase is under `/src` directory.

`/vendor` directory is used for third party packages. Package installation is done by `composer install` command.

### HTTP request
`index.php` is the entry point for all the incoming HTTP requests.

The request is then forwarded to `Routes` class located under `/src` directory.

`/Routes` class is responsible for calling the corresponding controller in order to serve the request.

Controller is then send back the response to `index.php` inorder to show it in the browser.

### Tech stack
- Blade is used as templating engine
- PDO is used for communicating with database
- Composer is used for third party package management
- Bootstrap is used ass css framework