<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Scrape;
use Weidner\Goutte\GoutteFacade;

class ScrapePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $crawler = GoutteFacade::request('GET', 'https://onsports.vn/danh-muc/viet-nam');
        $linkPost = $crawler->filter('article.space-box div.hidden a')->each(function ($node) {
            return $node->attr("href");
        });

        foreach ($linkPost as $link) {
            $this->scrapeData($link);
        }
    }

    public function scrapeData($url)
    {
        $crawler = GoutteFacade::request('GET', $url);

        $title = $this->crawlData('h1.font-semibold', $crawler);

        $description = $this->crawlData('div.react-page-cell div.react-page-cell-inner div div p strong', $crawler);

        $content = $crawler->filter('div.react-page-cell-inner.react-page-cell-inner-leaf.slate div div p')->each(function($node){
            $node->attr("p");
        });

        $dataPost = [
            'title' => $title,
            'content' => $content,
            'description' => $description,
        ];

        Scrape::create($dataPost);
    }

    protected function crawlData(string $type, $crawler)
    {
        $result = $crawler->filter($type)->each(function ($node) {
            return $node->text();
        });

        if(!empty($result)) {
            return $result[0];
        }

        return '';
    }
}
