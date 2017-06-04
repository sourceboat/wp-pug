<?php

namespace WpPug;

use Pug\Pug;

class Renderer
{
    /**
     * The current globally available instance.
     *
     * @var static
     */
    protected static $instance;

    /**
     * The pug instance.
     *
     * @var array
     */
    protected $pug;

    /**
     * Set the globally available instance of the container.
     *
     * @return static
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
            static::$instance->init();
        }

        return self::$instance;
    }

    /**
     * Deny duplication of the instance.
     *
     * @return void
     */
    protected function __clone()
    {
    }

    /**
     * Deny external instanciation.
     *
     * @return void
     */
    protected function __construct()
    {
    }

    /**
      * Init pug renderer.
      *
      * @return void
      */
    protected function init()
    {
        // init pug instance
        $this->pug = new Pug([
            'cache' => $this->getCacheDir(),
            'prettyprint' => true,
            'expressionLanguage' => 'php',
            'extension' => '.pug',
            'basedir' => $this->getBaseDir(),
        ]);

        // enable cache in non-development environemnts
        if (getenv('WP_ENV') !== 'development') {
            $this->pug->setOption('cache', $this->getCacheDir());
        }

        // create cache directory
        wp_mkdir_p($this->getCacheDir());
    }

    /**
     * Render given template.
     *
     * @param string $name
     * @param array $data
     * @return string
     */
    public function render($name, $data = [])
    {
        $file = sprintf('%s/%s.pug', $this->getBaseDir(), $name);
        return $this->pug->render($file, $data);
    }

    /**
     * Get Pug instance.
     *
     * @return Pug\Pug
     */
    public function getPug()
    {
        return $this->pug;
    }

    /**
     * Get cache dir.
     *
     * @return string
     */
    public function getBaseDir()
    {
        return get_template_directory() . '/views';
    }

    /**
     * Get cache dir.
     *
     * @return string
     */
    public function getCacheDir()
    {
        return wp_upload_dir()['basedir'] . '/wp-pug/cache';
    }
}
