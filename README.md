## heroku and Parse.com

1. create heroku apps
```
$ heroku apps:create
```
1. deploy apps
```
$ heroku push heroku master
```
1. add scheduler addon
```
$ heroku addons:add scheduler:standard
```
1. setting scheduler
```
$ heroku addons:open scheduler
```
1. setting environment variable for Parse.com
```
$ heroku config:set PARSE_APP_ID="<Parse Application ID>"
$ heroku config:set PARSE_REST_KEY="<Parse REST API Key>"
$ heroku config:set PARSE_MASTER_KEY="<Parse Master Key>" 
```
1. run crawler
```
$ heroku run php bin/crawler.php
```
