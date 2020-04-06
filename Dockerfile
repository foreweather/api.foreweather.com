FROM alpine:edge

RUN apk add --update


#######################################################################################################################
# NGINX
#######################################################################################################################
RUN apk add --update && apk add --update curl jq
RUN apk add --update && apk add --update openssl nginx tzdata bash
RUN mkdir -p /etc/nginx/certificates
RUN openssl req -x509 -newkey rsa:2048 -keyout /etc/nginx/certificates/key.pem -out /etc/nginx/certificates/cert.pem -days 365 -nodes -subj /CN=localhost
RUN apk del tzdata && rm -rf /var/cache/apk/*

ADD ./docker/conf/nginx /etc/nginx

#######################################################################################################################
# PHP Settings
#######################################################################################################################
ENV TIMEZONE            Europe/Istanbul
ENV PHP_MEMORY_LIMIT    512M
ENV MAX_UPLOAD          50M
ENV PHP_MAX_FILE_UPLOAD 200
ENV PHP_MAX_POST        100M

#######################################################################################################################
# FPM Settings
# ERROR_LOG /var/log/php-fpm.log
#######################################################################################################################
ENV ERROR_LOG           log/php-fpm.log
ENV LOG_LEVEL           notice
ENV SYSLOG_FACILITY     daemon
ENV SYSLOG_IDENT        php-fpm

RUN apk --update add bash git curl php7-fpm php7-phalcon php7-phar php7-openssl php7-json \
                 php7-gd php7-memcached php7-session php7-curl php7-pdo php7-pdo_mysql php7-tokenizer \
                 && rm -rf /var/cache/apk/*
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN echo short_open_tag = On >> /etc/php7/php.ini
RUN mkdir -p /etc/php7/fpm.d/ && touch /etc/php7/fpm.d/default.conf && mkdir -p /www

ADD ./src /www
RUN cd /www && composer update

#######################################################################################################################
# Start Script
#######################################################################################################################
ADD docker/start.sh /start.sh
RUN chmod +x start.sh && sed -i 's/\r//' start.sh
CMD ["/start.sh"]

#######################################################################################################################
# Setup sshd_config
#######################################################################################################################
RUN apk --update add git openssh && rm -rf /var/cache/apk/*
RUN sed -i "s/UsePrivilegeSeparation.*/UsePrivilegeSeparation no/g" /etc/ssh/sshd_config
RUN sed -i "s/UsePAM.*/UsePAM no/g" /etc/ssh/sshd_config
RUN sed -i "s/#PermitRootLogin.*/PermitRootLogin yes/g" /etc/ssh/sshd_config
RUN ssh-keygen -A
RUN echo 'root:Fore@123' | chpasswd
EXPOSE 22