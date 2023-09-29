FROM ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y locales \
    && locale-gen en_US.UTF-8

ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

RUN apt-get update \
    && apt-get install -y curl zip unzip git software-properties-common supervisor \
    && add-apt-repository -y ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y php8.2-cli php8.2-mcrypt php8.2-gd php8.2-pgsql php8.2-pdo-mysql\
    php8.2-imap php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-soap\
    && apt-get remove -y --purge software-properties-common \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./php.ini /etc/php/8.2/cli
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD ["/usr/bin/supervisord"]

