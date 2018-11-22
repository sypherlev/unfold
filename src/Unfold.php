<?php

namespace SypherLev\Unfold;

class Unfold
{
    public function build($argv) {
        if(empty($argv)) {
            echo "No section specified. Aborting build...\n\n";
            die;
        }
        $section = ucfirst(array_shift($argv));

        if(empty($argv)) {
            echo "No type specified. You must choose one of [cli, api, web]. Aborting build...\n\n";
            die;
        }

        $type = strtolower(array_shift($argv));

        $servicefile = __DIR__.'/ClassTemplates/Service.php.tpl';
        switch ($type) {
            case 'cli' :
                $actionfile = __DIR__.'/ClassTemplates/CliAction.php.tpl';
                $responderfile = __DIR__.'/ClassTemplates/CliResponder.php.tpl';
                break;
            case 'web' :
                $actionfile = __DIR__.'/ClassTemplates/WebAction.php.tpl';
                $responderfile = __DIR__.'/ClassTemplates/WebResponder.php.tpl';
                break;
            default :
                $actionfile = __DIR__.'/ClassTemplates/WebAction.php.tpl';
                $responderfile = __DIR__.'/ClassTemplates/ApiResponder.php.tpl';
        }

        try {
            $actionfile = file_get_contents($actionfile);
            $this->storeFile($actionfile, $section."Action", $section);

            $servicefile = file_get_contents($servicefile);
            $this->storeFile($servicefile, $section."Service", $section);

            $responderfile = file_get_contents($responderfile);
            $this->storeFile($responderfile, $section."Responder", $section);

            echo "Build complete.\n\n";
        }
        catch (\Exception $e) {
            echo "Could not create files:\n";
            echo $e->getMessage()."\n";
            echo "Aborting build...";
            die;
        }
    }

    private function storeFile($template_string, $target, $section_name) {
        $targetFile = 'src'.DIRECTORY_SEPARATOR.'Domain'.DIRECTORY_SEPARATOR.$section_name.DIRECTORY_SEPARATOR.$target.'.php';
        if(!file_exists('src')) {
            mkdir('src');
        }
        if(!file_exists('src'.DIRECTORY_SEPARATOR.'Domain')) {
            mkdir('src'.DIRECTORY_SEPARATOR.'Domain');
        }
        if(!file_exists('src'.DIRECTORY_SEPARATOR.'Domain'.DIRECTORY_SEPARATOR.$section_name)) {
            mkdir('src'.DIRECTORY_SEPARATOR.'Domain'.DIRECTORY_SEPARATOR.$section_name);
        }
        touch($targetFile);
        if(file_exists($targetFile)) {
            $template_string = str_replace('{sectionName}', $section_name, $template_string);
            file_put_contents($targetFile, $template_string);
            echo "File generated at $targetFile.\n";
        }
    }
}