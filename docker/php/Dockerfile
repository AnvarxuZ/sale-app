FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
        postgresql-client \
        cron \
        git \
        libzip-dev \
        zip \
        unzip \
        # - for soap
        # libxml2-dev \
        # for GD
        libwebp-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libpq-dev \
        libfreetype6-dev \
        # for intld
        libicu-dev \
    && docker-php-ext-configure gd \
            --with-webp \
            --with-jpeg \
            --with-freetype \
    && docker-php-ext-configure intl \
	&& docker-php-ext-install \
	     zip \
	     bcmath \
	     gd \
	     intl \
	     pdo \
	     pgsql \
	     pdo_pgsql \
#	     mysqli \
	     # soap \
	&& curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs 
# RUN npm install
# for supervisor & redis
# RUN apt-get install -y supervisor && pecl install -o -f redis && rm -rf /tmp/pear && docker-php-ext-enable redis

RUN useradd -m -G www-data,root -s /bin/bash laravel

WORKDIR /var/www/html

COPY cron-file /etc/cron.d/cron-file
# COPY run-daemons.sh /run-daemons.sh

# ENTRYPOINT /bin/bash /run-daemons.sh
