<?php
    require ("vendor/autoload.php");
    use GuzzleHttp\Client;
    /**
     * Help to get data and images from the json file.
     * 
     */
    class apicaller {
        /**
         *  Stores all the data elements.
         */
        public $arr; 

        /**
         *  $client creates an object of GuzzleHTTP.
         *  $host stores the hostname. 
         *  $response stores response after making GET request.
         *  $body  
         *  $arr stores the response in array format.
         */
        function __construct() {
            $client = new \GuzzleHttp\Client();                                    
            $host = 'https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services';  
            $response = $client->request('GET', $host);
            $body = $response->getBody();
            $arr = json_decode($body,TRUE);
            $this->arr = $arr;
            
        }

        /**
         * Gives the count of data items present in json file.
         * 
         * @return int 
         *    number of data items.
         */
        function arrLength() {
            return count($this->arr['data']);
        }

        /**
         * Takes the list items from the json file .
         * 
         *   @var int $num data element that is being accessed.
         * 
         *   @return string
         *     the list from json file.
         */
        function list(int $num) {
            return $this->arr['data'][$num]['attributes']['field_services']['processed'];
        }

        /**
         * Takes the image from the json file .
         * 
         *   @param int $num data element that is being accessed.
         * 
         *   @return string 
         *      returns image.
         */
        function image(int $num) {
            $img = $this->arr['data'][$num]['relationships']['field_image']['links']['related']['href'];
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $img);
            $body = $response->getBody();
            $img_link = json_decode($body, TRUE);
            $img_arr = $img_link['data']['attributes']['uri']['url'];
            return $img_arr;
        }

        /**
         * Takes the title from the json file . 
         *  
         *   @param int $num data element that is being accessed.
         * 
         *   @return string
         *     the title from json file.  
         */
        function title(int $num) {
            return $this->arr['data'][$num]['attributes']['title'];
        }

        /**
         * Takes the icons from the json file . 
         *  
         *   @param int $num data element that is being accessed.
         * 
         *   @return array
         *     the icons from json file.  
         */
        function icons(int $num){
            $icon = $this->arr['data'][$num]['relationships']['field_service_icon']['links']['related']['href'];
            $client = new \GuzzleHttp\Client();
            $response1 = $client->get($icon);
            $icon_link1 = json_decode($response1->getBody(), TRUE);
            $count=count($icon_link1['data']);
            for($j=0;$j<$count;$j++){
                $icon_arr = $icon_link1['data'][$j]['relationships']['thumbnail']['links']['related']['href'];
                $client2 = new \GuzzleHttp\Client();
                $response2 = $client2->request('GET', $icon_arr);
                $icon_link2 = json_decode($response2->getBody(), TRUE);
                $img_arr[] = $icon_link2['data']['attributes']['uri']['url'];
                if ($j==$count-1){
                    return $img_arr;
                }
            }
        }
    }

?>