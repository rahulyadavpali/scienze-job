<?php

namespace App\Http\Controllers\Admin;

use URL;
use App\Websites;
use App\Scraping;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class ScraperController extends Controller
{
    public function index()
    {
        $website = Websites::all();
        $web_id = 0;

        foreach($website as $web)
        {
            $web_id = $web->id;
            $web_name = $web->name;
            $url = $web->link;
            $main_url = $web->main_url;

            $client = new Client();
            $crawler = $client->request('GET', $url);
            $all_links = [];

            // NCDIR : National Centre for Disease Informatics and Research
            if($web_id == 2)
            {
                $table = $crawler->filter('.table')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td')->each(function ($td, $i){
                        return trim($td->text());
                    });
                });
        
                $link = $crawler->filter('.table')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td > a')->each(function ($td, $i){
                        return $td->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    if($key > 0)
                    {
                        $scrap = new Scraping();
                        $scrap->website_id = $web_id;
                        $scrap->website_name = $web_name;
                        $scrap->web_url = $main_url;
                        $scrap->title = $tables[3];
                        $scrap->url = $link[$key][0];
                        $scrap->start_date = $tables[2];
                        $scrap->end_date = $tables[4];

                        $path = $main_url.''.$link[$key][0];
                        $extension = 'pdf';
                        $filename = rand(1,9999999999).".".$extension;
                        Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                        $scrap->pdf = $filename;

                        $scrap->save();
                    }
                }
            }

            // National Jalma Institute For Leprosy
            if($web_id == 5)
            {
                $table = $crawler->filter('.table')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('th')->each(function ($th, $i){
                        return trim($th->text());
                    });
                });
                $link = $crawler->filter('.table')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td > a')->each(function ($td, $i){
                        return $td->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    if($key > 0)
                    {
                        $scrap = new Scraping();
                        $scrap->website_id = $web_id;
                        $scrap->website_name = $web_name;
                        $scrap->web_url = $main_url;
                        $scrap->title = $tables[0];
                        $scrap->url = $link[$key][0];

                        $path = $main_url.''.$link[$key][0];
                        $extension = 'pdf';
                        $filename = rand(1,9999999999).".".$extension;
                        Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                        $scrap->pdf = $filename;

                        $scrap->save();
                    }
                }
            }

            // ICMR - National Institute of Nutrition
            if($web_id == 6)
            {
                $table = $crawler->filter('.facultycards')->filter('.item-description')->each(function($span, $i){
                    return $span->filter('b')->each(function ($b, $i){
                        return trim($b->text());
                    });
                });
                $link = $crawler->filter('.facultycards')->filter('.col-md-12')->each(function($div, $i){
                    return $div->filter('a')->each(function ($hrf, $i){
                        return $hrf->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    if($key > 0)
                    {
                        $scrap = new Scraping();
                        $scrap->website_id = $web_id;
                        $scrap->website_name = $web_name;
                        $scrap->web_url = $main_url;
                        $scrap->title = $tables[0];
                        $scrap->url = $link[$key][0];

                        $path = $main_url.''.$link[$key][0];
                        $extension = 'pdf';
                        $filename = rand(1,9999999999).".".$extension;
                        Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                        $scrap->pdf = $filename;

                        $scrap->save();
                    }
                }
            }

            // National Institute For Implimentation Research On Non-Communicable Disease, Jodhpur
            if($web_id == 7)
            {
                $table = $crawler->filter('.table > tbody')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td')->each(function ($td, $i){
                        return trim($td->text());
                    });
                });
                $link = $crawler->filter('.table > tbody')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td > a')->each(function ($td, $i){
                        return $td->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    if($key > 0)
                    {
                        $scrap = new Scraping();
                        $scrap->website_id = $web_id;
                        $scrap->website_name = $web_name;
                        $scrap->web_url = $main_url;
                        $scrap->title = $tables[1];
                        $scrap->url = $link[$key][0];
                        $scrap->start_date = $tables[2];
                        $scrap->end_date = $tables[5];

                        $path = $main_url.''.$link[$key][0];
                        $extension = 'pdf';
                        $filename = rand(1,9999999999).".".$extension;
                        Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                        $scrap->pdf = $filename;

                        $scrap->save();
                    }
                }
            }

            // KGMU
            if($web_id == 8)
            {
                $table = $crawler->filter('#customers')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td')->each(function ($td, $i){
                        return trim($td->text());
                    });
                });
                $link = $crawler->filter('#customers')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td > a')->each(function ($td, $i){
                        return $td->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    if($key > 0)
                    {
                        $scrap = new Scraping();
                        $scrap->website_id = $web_id;
                        $scrap->website_name = $web_name;
                        $scrap->web_url = $main_url;
                        $scrap->title = $tables[2];
                        $scrap->url = $link[$key][0];
                        $scrap->start_date = $tables[1];
                        $scrap->end_date = $tables[4];

                        $path = $main_url.''.$link[$key][0];
                        $extension = 'pdf';
                        $filename = rand(1,9999999999).".".$extension;
                        Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                        $scrap->pdf = $filename;

                        $scrap->save();
                    }
                }
            }

            // ICMR - Gorakhpur
            if($web_id == 9)
            {
                $table = $crawler->filter('.table > tbody')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td')->each(function ($td, $i){
                        return trim($td->text());
                    });
                });
                $link = $crawler->filter('.table > tbody')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('a')->each(function ($td, $i){
                        return $td->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    if($key > 0)
                    {
                        $scrap = new Scraping();
                        $scrap->website_id = $web_id;
                        $scrap->website_name = $web_name;
                        $scrap->web_url = $main_url;
                        $scrap->title = $tables[1];
                        $scrap->url = $link[$key][0];

                        $path = $main_url.''.$link[$key][0];
                        $extension = 'pdf';
                        $filename = rand(1,9999999999).".".$extension;
                        Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                        $scrap->pdf = $filename;

                        $scrap->save();
                    }
                }
            }

            // Vigyan Prasar
            if($web_id == 11)
            {
                $table = $crawler->filter('.table > tbody')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td')->each(function ($td, $i){
                        return trim($td->text());
                    });
                });
                $link = $crawler->filter('.table > tbody')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td > a')->each(function ($td, $i){
                        return $td->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    if($key > 0)
                    {
                        $scrap = new Scraping();
                        $scrap->website_id = $web_id;
                        $scrap->website_name = $web_name;
                        $scrap->web_url = $main_url;
                        $scrap->title = $tables[0];
                        $scrap->url = $link[$key][0];

                        $path = $main_url.''.$link[$key][0];
                        $extension = 'pdf';
                        $filename = rand(1,9999999999).".".$extension;
                        Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                        $scrap->pdf = $filename;

                        $scrap->save();
                    }
                }
            }

            // NCCS
            if($web_id == 13)
            {
                $table = $crawler->filter('.responsiveTable')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('td')->each(function ($td, $i){
                        return trim($td->text());
                    });
                });
                $link = $crawler->filter('.responsiveTable')->filter('tr')->each(function($tr, $i){
                    return $tr->filter('a')->each(function ($td, $i){
                        return $td->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    if($key > 0)
                    {
                        $scrap = new Scraping();
                        $scrap->website_id = $web_id;
                        $scrap->website_name = $web_name;
                        $scrap->web_url = $main_url;
                        $scrap->title = $tables[1];
                        $scrap->url = $link[$key][0];

                        $path = $main_url.''.$link[$key][0];
                        $extension = 'pdf';
                        $filename = rand(1,9999999999).".".$extension;
                        Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                        $scrap->pdf = $filename;

                        $scrap->save();
                    }
                }
            }

            // RGCB
            if($web_id == 14)
            {
                $table = $crawler->filter('#content')->filter('h4')->each(function($tr, $i){
                    return $tr->filter('a')->each(function ($td, $i){
                        return trim($td->text());
                    });
                });
                $link = $crawler->filter('#content')->filter('h4')->each(function($tr, $i){
                    return $tr->filter('a')->each(function ($td, $i){
                        return $td->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    $scrap = new Scraping();
                    $scrap->website_id = $web_id;
                    $scrap->website_name = $web_name;
                    $scrap->web_url = $main_url;
                    $scrap->title = $tables[0];
                    $scrap->url = $link[$key][0];

                    $path = $main_url.''.$link[$key][0];
                    $extension = 'pdf';
                    $filename = rand(1,9999999999).".".$extension;
                    Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                    $scrap->pdf = $filename;

                    $scrap->save();
                }
            }

            // Thsti
            if($web_id == 16)
            {
                $table = $crawler->filter('.custom_openings')->filter('li')->each(function($tr, $i){
                    return $tr->filter('h4')->each(function ($td, $i){
                        return trim($td->text());
                    });
                });
                $link = $crawler->filter('.custom_openings')->filter('li')->each(function($tr, $i){
                    return $tr->filter('a')->each(function ($td, $i){
                        return $td->attr('href');
                    });
                });

                foreach($table as $key => $tables)
                {
                    $scrap = new Scraping();
                    $scrap->website_id = $web_id;
                    $scrap->website_name = $web_name;
                    $scrap->web_url = $main_url;
                    $scrap->title = $tables[0];
                    $scrap->url = $link[$key][0];

                    $path = $link[$key][0];
                    $extension = 'pdf';
                    $filename = rand(1,9999999999).".".$extension;
                    Storage::disk('website-pdf')->put($filename, file_get_contents($path));
                    $scrap->pdf = $filename;

                    $scrap->save();
                }
            }

        }

        // ICMR : National Institute Of Occupational Health
        if($web_id == 4)
        {
            $table = $crawler->filter('#ID1651672972850_accordion')->filter('.itemcontentck')->each(function($div, $i){
                return $div->filter('p')->each(function ($p, $i){
                    return trim($p->text());
                });
            });
            $link = $crawler->filter('#ID1651672972850_accordion')->filter('.itemcontentck')->each(function($div, $i){
                return $div->filter('p > a')->each(function ($p, $i){
                    return $p->attr('href');
                });
            });

            // echo '<pre>'; print_r($table[0]); exit;

            foreach($table as $key => $tables)
            {
                if($key > 0)
                {}
            }
        }

        // InStem
        if($web_id == 15)
        {
            $table = $crawler->filter('.views-table > tbody')->filter('tr')->each(function($tr, $i){
                return $tr->filter('td')->each(function ($td, $i){
                    return trim($td->text());
                });
            });
            $link = $crawler->filter('.views-table > tbody')->filter('tr')->each(function($tr, $i){
                return $tr->filter('td > a')->each(function ($td, $i){
                    return $td->attr('href');
                });
            });

            // echo '<pre>'; print_r($link); exit;
        }

        // National Institute of Biomedical Genomics
        if($web_id == 17)
        {
            $table = $crawler->filter('.table > tbody')->filter('tr')->each(function($tr, $i){
                return $tr->filter('td > strong > a')->each(function ($td, $i){
                    return trim($td->text());
                });
            });
            $link = $crawler->filter('.custom_openings')->filter('li')->each(function($tr, $i){
                return $tr->filter('a')->each(function ($td, $i){
                    return $td->attr('href');
                });
            });

            // echo '<pre>'; print_r($table); exit;
        }

        // CIAB
        if($web_id == 18)
        {
            $table = $crawler->filter('table > tbody')->filter('tr')->each(function($tr, $i){
                return $tr->filter('td')->each(function ($td, $i){
                    return trim($td->text());
                });
            });
            $link = $crawler->filter('.custom_openings')->filter('li')->each(function($tr, $i){
                return $tr->filter('a')->each(function ($td, $i){
                    return $td->attr('href');
                });
            });

            // echo '<pre>'; print_r($table); exit;
        }

        // echo 'Saved'; exit;

    }

}
