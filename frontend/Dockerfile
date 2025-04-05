FROM node:22.14.0-alpine

COPY . /app
WORKDIR /app

RUN yarn install

EXPOSE 80
EXPOSE 2222 

CMD ["yarn", "dev", "--port=80", "--host"]