#### Script for project building in local ####
FROM test-build as release

LABEL app=meals

ARG GITHUB_LAST_COMMIT
ENV LAST_COMMIT_REFERENCE=$GITHUB_LAST_COMMIT

COPY --chown=$NGINX_USER:$NGINX_USER . ./

# Install required dependencies
RUN apt update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends git openssh-client \
    && apt-get clean

RUN --mount=type=ssh composer install --no-dev --prefer-dist --no-scripts --optimize-autoloader --apcu-autoloader \
    && composer clear-cache

## IMPORTANT: Execute after: touch main.php >> php_init(2000); 