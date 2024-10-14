FROM php:8.1-fpm

WORKDIR /var/www/html

COPY local.ini /usr/local/etc/php/conf.d/local.ini

RUN apt-get update && apt-get install -y --no-install-recommends \
    build-essential \
    curl \
    git \
    jpegoptim optipng pngquant gifsicle \
    locales \
    unzip \
    vim \
    zip \
    nano \
    sudo \
    ca-certificates \
    procps  \
    libfontconfig  \
    tini \
    software-properties-common

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions
RUN install-php-extensions openssl
RUN install-php-extensions PDO
RUN install-php-extensions mbstring
RUN install-php-extensions bcmath
RUN install-php-extensions xml
RUN install-php-extensions json
RUN install-php-extensions pdo_mysql
RUN install-php-extensions mysqli
RUN install-php-extensions tokenizer
RUN install-php-extensions ctype
RUN install-php-extensions sqlite3
RUN install-php-extensions soap
RUN install-php-extensions mongodb
#RUN install-php-extensions gd
RUN install-php-extensions opcache
RUN install-php-extensions redis
RUN install-php-extensions sockets
RUN install-php-extensions tidy
RUN install-php-extensions zip
RUN install-php-extensions yaml
RUN install-php-extensions xsl
RUN install-php-extensions xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer global require laravel/installer

# Install specific version of Node.js with npm through nvm
# Users in the sudoers group can sudo as root without password.
RUN useradd -ms /bin/bash docker && adduser docker sudo
RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers
RUN apt-get update &&\
    apt-get install -y --no-install-recommends gnupg &&\
    curl -sL https://deb.nodesource.com/setup_18.x | bash - &&\
    apt-get update &&\
    apt-get install -y --no-install-recommends nodejs
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - &&\
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list &&\
    apt-get update &&\
    apt-get install -y --no-install-recommends yarn
ENV PATH="$PATH:./node_modules/.bin"
RUN ln -s ~/.composer/vendor/bin/laravel /usr/local/bin/laravel
RUN chmod +x /usr/local/bin/laravel
RUN sed -i 's#/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin#/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:./node_modules/.bin:~/.composer/vendor/bin#g' /etc/sudoers

RUN apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && chown -R www-data:www-data /var/www/html
