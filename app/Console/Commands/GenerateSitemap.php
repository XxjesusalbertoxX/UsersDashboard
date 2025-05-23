<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Tournament;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Genera el sitemap.xml en /public';

    public function handle(): int
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/'));

        // Puedes agregar más rutas dinámicas aquí...

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap generado exitosamente.');
        return Command::SUCCESS;
    }
}