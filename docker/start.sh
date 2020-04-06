#!/bin/bash

## Update PHP Environments
grep -l '###DB_ADAPTER###' /www/application/config/env.php | xargs sed -e 's,###DB_ADAPTER###,'${DB_ADAPTER}',g' -i
grep -l '###DB_HOST###' /www/application/config/env.php | xargs sed -e 's,###DB_HOST###,'${DB_HOST}',g' -i
grep -l '###DB_PORT###' /www/application/config/env.php | xargs sed -e 's,###DB_PORT###,'${DB_PORT}',g' -i
grep -l '###DB_USERNAME###' /www/application/config/env.php | xargs sed -e 's,###DB_USERNAME###,'${DB_USERNAME}',g' -i
grep -l '###DB_NAME###' /www/application/config/env.php | xargs sed -e 's,###DB_NAME###,'${DB_NAME}',g' -i
grep -l '###DB_PASSWORD###' /www/application/config/env.php | xargs sed -e 's,###DB_PASSWORD###,'${DB_PASSWORD}',g' -i

grep -l '###OAUTH_ACCESS_TOKEN_LIFETIME###' /www/application/config/env.php | xargs sed -e 's,###OAUTH_ACCESS_TOKEN_LIFETIME###,'${OAUTH_ACCESS_TOKEN_LIFETIME}',g' -i
grep -l '###OAUTH_REFRESH_TOKEN_LIFETIME###' /www/application/config/env.php | xargs sed -e 's,###OAUTH_REFRESH_TOKEN_LIFETIME###,'${OAUTH_REFRESH_TOKEN_LIFETIME}',g' -i
grep -l '###OAUTH_ALWAYS_ISSUE_NEW_REFRESH_TOKEN###' /www/application/config/env.php | xargs sed -e 's,###OAUTH_ALWAYS_ISSUE_NEW_REFRESH_TOKEN###,'${OAUTH_ALWAYS_ISSUE_NEW_REFRESH_TOKEN}',g' -i
grep -l '###OAUTH_UNSET_REFRESH_TOKEN_AFTER_USE###' /www/application/config/env.php | xargs sed -e 's,###OAUTH_UNSET_REFRESH_TOKEN_AFTER_USE###,'${OAUTH_UNSET_REFRESH_TOKEN_AFTER_USE}',g' -i

########################################################################################################################
# Start fpm background
########################################################################################################################
php-fpm7 -D

########################################################################################################################
# Start ssh
########################################################################################################################
/usr/sbin/sshd -D &

########################################################################################################################
# Start nginx
########################################################################################################################
NGINX=/usr/sbin/nginx
NGINX_CONF=/etc/nginx/nginx.conf
RESTART_COMMAND="/usr/sbin/nginx -s reload"

${NGINX} -c ${NGINX_CONF} -t && ${NGINX} -c ${NGINX_CONF} -g "daemon off;"
