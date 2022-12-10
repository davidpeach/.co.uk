FROM node:lts as node
FROM php:8.1.12-fpm

COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /usr/local/bin/node /usr/local/bin/node
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

RUN mkdir -p /home/node/app

WORKDIR /home/node/app

COPY . .

RUN npm install && npm run build

