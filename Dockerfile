FROM php:8.2-apache

# Installer les dépendances système et MongoDB
RUN apt-get update && apt-get install -y \
    libssl-dev \
    git \
    unzip \
    zip \
    curl \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer Symfony CLI (binaire direct pour Docker stable)
RUN curl -Lo /usr/local/bin/symfony https://github.com/symfony/cli/releases/latest/download/symfony_linux_amd64 \
    && chmod +x /usr/local/bin/symfony

# Définir le dossier de travail pour ton projet Symfony
WORKDIR /var/www/html