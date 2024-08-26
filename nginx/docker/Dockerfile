FROM nginx:1.25

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}
RUN addgroup --system --gid ${GID} identifier
RUN adduser --system --home /bin/sh --no-create-home --uid ${UID} --ingroup identifier --disabled-login --disabled-password identifier
RUN sed -i 's/user  nginx/user identifier/g' /etc/nginx/nginx.conf

COPY . /var/www/html

RUN chown -R ${UID}:${GID} /var/www/html
