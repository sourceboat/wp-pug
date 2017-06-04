<?php

function render_template($name, $data = [])
{
    $renderer = \WpPug\Renderer::getInstance();
    echo $renderer->render($name, $data);
}

function get_template_content($name, $data = [])
{
    $renderer = \WpPug\Renderer::getInstance();
    return $renderer->render($name, $data);
}
