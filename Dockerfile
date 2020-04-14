FROM abiosoft/caddy:1.0.3-php

COPY Caddyfile /etc/Caddyfile

WORKDIR /srv/app

COPY composer.json composer.lock ./

RUN composer install --no-scripts

COPY hook.php ./
COPY *.html ./
