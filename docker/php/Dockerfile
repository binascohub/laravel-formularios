FROM centos:centos7

LABEL maintainer="Mayron Thomas Ceccon <mayron.ceccon@tecnorisk.com.br>"

RUN yum update -y && yum install -y https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
RUN yum update -y && yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum update -y && yum install -y yum-utils

RUN yum update -y && yum-config-manager --enable remi-php74

RUN yum update -y && yum -y install wget git iproute at curl crontabs git httpd gcc \
make gcc-c++ autoconf automake unzip

RUN yum update -y && yum install -y php php-curl php-cli php-gd php-pgsql php-mysql php-xmlrpc \
php-odbc php-pecl php-pear php-devel php-mbstring php-zip php-json

RUN pecl install mongodb

#COMPOSER
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

#TIMEZOME
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN git clone https://github.com/xdebug/xdebug.git xdebug
RUN cd xdebug && sh rebuild.sh

COPY config/php_settings.ini /etc/php.d/
COPY config/v-host.conf /etc/httpd/conf.d/

RUN rpm -Uvh http://www.city-fan.org/ftp/contrib/yum-repo/city-fan.org-release-2-1.rhel7.noarch.rpm
RUN yum --enablerepo=city-fan.org update -y curl

RUN yum clean all

EXPOSE 80

WORKDIR /var/www/html

RUN systemctl enable httpd

CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
