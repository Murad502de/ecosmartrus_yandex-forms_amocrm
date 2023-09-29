#!/bin/bash

if ! [ -x "$(command -v docker-compose)" ]; then
  echo 'Error: docker-compose is not installed.' >&2
  exit 1
fi

domains=(family.evalite.io)
rsa_key_size=4096
data_path="./docker/images/certbot"
email="itwelt.integration@gmail.com" # Adding a valid address is strongly recommended
staging=0 # Set to 1 if you're testing your setup to avoid hitting request limits

docker-compose run --rm --entrypoint "\
  certbot renew" certbot
echo

echo "### Reloading nginx ..."
docker-compose exec nginx nginx -s reload
