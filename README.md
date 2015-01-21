## heroku and Parse.com

1.Create heroku apps

    $ heroku apps:create

2.Deploy apps

    $ heroku push heroku master

3.Add scheduler addon

    $ heroku addons:add scheduler:standard

4.Setting scheduler

    $ heroku addons:open scheduler

5.Setting environment variable for Parse.com

    $ heroku config:set PARSE_APP_ID="<Parse Application ID>"
    $ heroku config:set PARSE_REST_KEY="<Parse REST API Key>"
    $ heroku config:set PARSE_MASTER_KEY="<Parse Master Key>" 

6.Run crawler

    $ heroku run php bin/crawler.php

