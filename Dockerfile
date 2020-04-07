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

########################################################################################################################
## PHP Settings
########################################################################################################################
RUN    	sed -i "s|;*date.timezone =.*|date.timezone = ${TIMEZONE}|i" /etc/php7/php.ini && \
    	sed -i "s|;*memory_limit =.*|memory_limit = ${PHP_MEMORY_LIMIT}|i" /etc/php7/php.ini && \
        sed -i "s|;*upload_max_filesize =.*|upload_max_filesize = ${MAX_UPLOAD}|i" /etc/php7/php.ini && \
        sed -i "s|;*max_file_uploads =.*|max_file_uploads = ${PHP_MAX_FILE_UPLOAD}|i" /etc/php7/php.ini && \
        sed -i "s|;*post_max_size =.*|post_max_size = ${PHP_MAX_POST}|i" /etc/php7/php.ini && \
        sed -i "s|;*cgi.fix_pathinfo=.*|cgi.fix_pathinfo= 0|i" /etc/php7/php.ini

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

#######################################################################################################################
# Default ENVS
#######################################################################################################################
ENV DB_ADAPTER          "mysql"
ENV DB_HOST             "api"
ENV DB_PORT             "3306"
ENV DB_USERNAME         "root"
ENV DB_NAME             "foreweather"
ENV DB_PASSWORD         "Fore@123"

ENV OAUTH_ACCESS_TOKEN_LIFETIME             86400
ENV OAUTH_REFRESH_TOKEN_LIFETIME            2419200
ENV OAUTH_ALWAYS_ISSUE_NEW_REFRESH_TOKEN    true
ENV OAUTH_UNSET_REFRESH_TOKEN_AFTER_USE     false

#######################################################################################################################
# APIDOC
#######################################################################################################################
RUN apk --update add nodejs npm && npm install apidoc -g && \
            cd /www && apidoc -i application/service -o public/documentation
