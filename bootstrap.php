<?php

use Flarum\Event\ConfigureLocales;
use Illuminate\Contracts\Events\Dispatcher;

return function (Dispatcher $events) {
    $events->listen(ConfigureLocales::class, function (ConfigureLocales $event) {
        $event->loadLanguagePackFrom(__DIR__);
        if (file_exists($file = $localeDir.'/config.js')) {
            $event->locales->addJsFile($locale, $file);
        }
    });
};