FROM php-on-docker_php

RUN apk add --update apk-cron

CMD ["/usr/sbin/crond" "-f", "-d", "8"]
