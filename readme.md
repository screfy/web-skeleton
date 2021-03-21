# Web Skeleton

## Installation

Install this project:

```sh
$ composer create-project screfy/web-skeleton web-skeleton
```

Go to the directory:

```sh
$ cd web-skeleton
```

And make directories `temp` and `log` writable. For Linux, macOS or any other Unix based system:

```sh
$ chmod -R a+rw temp log
```

## Development

For development, you can start built-in PHP server in the root directory of your project:

```sh
$ php -S localhost:80 -t www
```

And then you can visit `http://localhost` in your browser to see welcome page.
