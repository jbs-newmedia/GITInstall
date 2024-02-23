# GITInstall

GITInstall is a PHP package developed by Juergen Schwind of JBS New Media GmbH. This package is designed to simplify the process of installing or updating software directly from a Git repository. It supports GitHub and GitLab repositories, allowing for automated downloading and installation of software releases.

## Features

- **Easy Installation**: Automate the download and installation of software from Git repositories.
- **Support for GitHub and GitLab**: Compatible with both major Git hosting services.
- **Configurable**: Customize aspects like cache time, ignored files/directories, and more.
- **Secure**: Supports basic authentication for private repositories.
- **Flexible**: Allows specifying which release to install, supporting stable and prerelease versions.

## Requirements

- PHP 8.0 or higher
- curl extension for PHP
- zip extension for PHP

## Installation

To use GITInstall, include it in your project manually by downloading the package and including `Installer.php` in your PHP script.

## Usage

1. **Initialization**: Create an instance of the `JBSNewMedia\GitInstall\Installer` class.

```php
use JBSNewMedia\GitInstall\Installer;

$installer = new Installer();
```

2. **Configuration**: Set the necessary parameters such as Git type (GitHub or GitLab), repository details, authentication credentials (if needed), and the desired action (e.g., install, update, remove).

```php
$installer->setGit('github'); // or 'gitlab'
$installer->setName('Your Project Name');
$installer->setRelease('stable'); // or 'prerelease', 'commit (only github yet)'
$installer->setReleaseUrl('https://api.github.com/repos/username/repository/releases');
// For private repositories
$installer->setUser('username');
$installer->setPassword('password');
// Set action
$installer->setAction('execute'); // Possible values: execute, info, remove
```

3. **Execution**: Call the `runEngine` method to perform the specified action.

```php
$result = $installer->runEngine();
print_r($result);
```

## Options and Methods

This section describes all available options and methods you can use with the Installer class to configure and run the installation process.

### Options
* `cache_time`: Duration in seconds to cache the data fetched from Git repositories.
* `action`: The action to perform. Can be execute, info, or remove.
* `useragent`: Custom user agent string for making HTTP requests.
* `name`: The name of the software to install.
* `git`: Type of Git service, github or gitlab.
* `release_url`: URL to fetch release information from the Git repository.
* `download_url`: URL to download the release archive.
* `release`: Specify the release type, stable, prerelease or commit.
* `user`, `password`, `token`: Authentication credentials for private repositories.
* `remote_path`: Path within the Git repository to install from.
* `ignored_files`, `ignored_directories`: Files or directories to ignore during installation.
* `chmod_file`, `chmod_dir`: File and directory permissions to apply.
* `executable`: Flag to determine if the current version is executable.

### Methods
* `setCacheTime(int $cache_time)`: Set the cache duration.
* `setAction(string $action)`: Define the action to perform.
* `setUseragent(string $useragent)`: Set a custom user agent for HTTP requests.
* `setName(string $name)`: Set the software name.
* `setGit(string $git)`: Specify the Git service type.
* `setReleaseUrl(string $release_url)`: Set the URL for fetching release information.
* `setDownloadUrl(string $download_url)`: Set the download URL for the release archive.
* `setRelease(string $release)`: Define the release type.
* `setUser(string $user)`, `setPassword(string $password)`, `setToken(string $token)`: Set authentication credentials.
* `setRemotePath(string $remote_path)`: Specify a path within the repository for installation.
* `setIgnoredFiles(array $ignored_files)`, `setIgnoredDirectories(array $ignored_directories)`: Specify files or directories to ignore.
* `setChmodFile(int $chmod_file)`, `setChmodDir(int $chmod_dir)`: Set file and directory permissions.
* `setExecutable(bool $executable)`: Set the executable flag.
* `runEngine()`: Execute the defined action with the current configuration.

## Contributing

Contributions are welcome! Please feel free to submit pull requests or create issues for bugs, feature requests, or documentation improvements.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

If you have any questions, feature requests, or issues, please open an issue on our [GitHub repository](https://github.com/jbs-newmedia/gitinstall/issues) or submit a pull request.

Thank you for considering GITInstall for your project!
