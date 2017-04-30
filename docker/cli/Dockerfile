FROM ubuntu:xenial
ENV LANG C.UTF-8
RUN apt-get update && apt-get install -y \
  apt-utils \
  apt-transport-https \
  curl \
  software-properties-common
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN add-apt-repository ppa:ondrej/php
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update && apt-get install -y \
  libpq-dev \
  npm \
  php7.1 \
  php7.1-curl \
  php7.1-dom \
  php7.1-pgsql \
  php7.1-mbstring \
  php7.1-mysql \
  php7.1-sqlite3 \
  php7.1-xml \
  vim \
  yarn
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    php composer-setup.php \
    php -r "unlink('composer-setup.php');" \
    mv composer.phar /usr/local/bin/composer
