<?php

namespace WpPug\CLI\Cache;

use WP_CLI;
use WpPug\Renderer;

class WarmupCommand
{
    public function __invoke()
    {
        $renderer = Renderer::getInstance();
        $pug = $renderer->getPug();
        $baseDir = $renderer->getBaseDir();

        $pug->setOption('cache', $renderer->getCacheDir());
        list($success, $errors) = $pug->cacheDirectory($baseDir);

        if ($errors > 0) {
            WP_CLI::error(sprintf('%s %s occured', $errors, _n('error', 'errors', $errors)));
        }

        WP_CLI::success(sprintf('%s %s been cached.', $success, _n('file has', 'files have', $success)));
    }
}
