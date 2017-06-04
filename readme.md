# WP Pug

[![Packagist](https://img.shields.io/packagist/v/sourceboat/wp-pug.svg?style=flat-square)](https://packagist.org/packages/sourceboat/wp-pug)
[![Packagist Downloads](https://img.shields.io/packagist/dt/sourceboat/wp-pug.svg?style=flat-square)](https://packagist.org/packages/sourceboat/wp-pug)
[![Build Status](https://img.shields.io/travis/sourceboat/wp-pug.svg?style=flat-square)](https://travis-ci.org/sourceboat/wp-pug)

## Installation

To use this plugin you need to setup your WordPress installation via a Composer setup like [Bedrock](https://github.com/roots/bedrock). Then you can install it via:

```
$ composer require sourceboat/wp-pug
```

## Usage

### Template Directory

The Plugin expects your templates to be under a `views` folder in your active theme.

### Helper

The plugin exposes the following helper functions:

- `render_template($name, $data = [])` - renders a template and prints the output.
- `get_template_content($name, $data = [])` - renders a template and returns the output as string.

**Arguments:**

- `$name` - the template name relative to the template directory without file extension.
- `$data` *(optional)* - array with local variables wich get passed to the template.


### WP-CLI

The plugin supports [WP-CLI](http://wp-cli.org/). The following commands are available:

```
$ wp pug cache warmup // caches all template files.
$ wp pug cache clear // clears all cached template files.
```
