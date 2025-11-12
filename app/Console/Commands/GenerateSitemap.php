<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'generate:sitemap';
    protected $description = 'Command description';

    public function handle()
    {
        $filePath = 'sitemap.xml';
        $sitemap = Sitemap::create();

        $this->addStaticRoutes($sitemap);
        $this->addBlogPages($sitemap);
        $sitemap->writeToFile($filePath);

        $this->info("✅ Sitemap generated successfully at: {$filePath}");
    }

    private function addStaticRoutes(Sitemap $sitemap)
    {
        $staticRoutes = [
            ['route' => route('web.home'), 'priority' => 1.0],
            ['route' => route('web.about-us'), 'priority' => 0.9],
            ['route' => route('web.packages'), 'priority' => 0.8],
            ['route' => route('web.services'), 'priority' => 0.7],
            ['route' => route('web.terms-condition'), 'priority' => 0.6],
            ['route' => route('web.return-refund'), 'priority' => 0.5],
            ['route' => route('web.privacy-policy'), 'priority' => 0.4],
            ['route' => route('web.blogs'), 'priority' => 0.9],
            ['route' => route('web.gallery'), 'priority' => 0.9],
            ['route' => route('web.contact'), 'priority' => 0.9],
            ['route' => route('web.booking'), 'priority' => 0.9],
            ['route' => route('web.login'), 'priority' => 0.9],

        ];

        foreach ($staticRoutes as $route) {
            $sitemap->add(
                Url::create($route['route'])
                    ->setLastModificationDate(now())
                    ->setChangeFrequency('daily')
                    ->setPriority($route['priority'])
            );
        }
        $this->info('Added static routes to sitemap.');
    }
    private function addBlogPages(Sitemap $sitemap)
    {
        $blogs = Blog::where('status', 'Active')->get();
        foreach ($blogs as $blog) {
            $url = route('web.blog.detail', $blog->slug);
            $sitemap->add(Url::create($url)
                ->setLastModificationDate($blog->updated_at)
                ->setChangeFrequency('weekly')
                ->setPriority(0.9));
        }
    }
}
