<?php

namespace WpPug\CLI\Cache;

use WP_CLI;
use WpPug\Renderer;

class ClearCommand
{
    public function __invoke()
    {
        $renderer = Renderer::getInstance();
        $cacheDir = $renderer->getCacheDir();

        $success = 0;

        $files = glob($cacheDir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
                $success++;
            }
        }

        WP_CLI::success(sprintf('%s %s been deleted.', $success, _n('file has', 'files have', $success)));
    }
}
