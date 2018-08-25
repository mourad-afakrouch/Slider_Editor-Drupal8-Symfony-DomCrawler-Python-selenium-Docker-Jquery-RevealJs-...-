  <?php

            require_once __DIR__.'/vendor/autoload.php';

            use Symfony\Component\DomCrawler\Crawler;

            use Symfony\Component\CssSelector\CssSelectorConverter;

            $client = new \GuzzleHttp\Client();

            $res = $client->request('GET', 'http://188.138.56.214:8888/mono');

            $html = ''.$res->getBody();

            $crawler = new Crawler();
            $crawler->addHtmlContent($html,"utf-8");

            //echo $crawler->html();
            


            $nodeValues = $crawler->filter(' .monographie-row-for-filter > span > span')->each(function (Crawler $node, $i) {

                 //$content = $node->html();
                 print html_entity_decode($node->html());

            //     $content = $node->html();

           

                 // echo $content;
               
            });
            
            ?>