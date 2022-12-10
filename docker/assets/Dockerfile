FROM node:lts

RUN mkdir -p /home/node/app

WORKDIR /home/node/app

COPY . .

RUN npm install && npm run build

