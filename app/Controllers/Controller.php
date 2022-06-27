<?php

namespace SYRADEV\AutoEncheres\Controller;

class Controller
{
    const VIEWPATH = __DIR__ . '/../../views/';
    const EXT = '.tmpl.php';
    const PAGETITLE = 'Auto-Enchères';

    public function render($layout, $view, $data = null)
    {
        // Récupère le layout
        $layout_ar = explode('.', $layout);
        ob_start();
        require(self::VIEWPATH . ucfirst($layout_ar[0]) . '/' . $layout_ar[1] . self::EXT);
        $layout_content = ob_get_contents();
        ob_end_clean();
        $template = str_replace('{pageTitle}', self::PAGETITLE, $layout_content);

        // Récupère le template de contenus
        $view_ar = explode('.', $view );
        ob_start();
        require(self::VIEWPATH . ucfirst($view_ar[0]) . '/' . $view_ar[1] . self::EXT);
        $view_content = ob_get_contents();
        ob_end_clean();
        $contents = str_replace('{pageContent}', $view_content, $template);
        return $contents;
    }
}